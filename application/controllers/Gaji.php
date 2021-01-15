<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function index($id_pegawai = NULL) 
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$data = $this->gaji_pegawai->get_data($id_pegawai);
			$data['title'] = 'Tabel Gaji';
			$data['setting'] = $this->M_setting->get_data()->row_array();
			$date_backup = $data['setting']['backup_date'];
			if ((date('d') >= $date_backup) && (date('Y-m') == $data['month'])) {
				$data['backup'] = TRUE;
			} else {
				$data['backup'] = FALSE;
			}
			// var_dump($data);
			$this->template->load('index','gaji/table_gaji', $data);
		}
	}

	public function detail_gaji($id_pegawai = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$data = $this->gaji_pegawai->get_data($id_pegawai);
			$data['title'] = 'Detail Gaji';
			// var_dump($data);
			$this->template->load('index','gaji/detail_gaji',$data);
		}
	}

	public function print_gaji($id_pegawai)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$data = $this->gaji_pegawai->get_data($id_pegawai);
			$this->load->view('gaji/paycheck_output', $data);
		}
	}
 
	public function pay_print_gaji($id_pegawai, $id_angsuran)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLevel() == TRUE){
				$explode = explode('-', $id_angsuran);
				$id_kop = $explode[0];
				$id_bank = $explode[1];
				$res['repay'] = $this->M_gaji->repay($id_kop, $id_bank);

				$kop = $this->M_pinjaman->get_angsuran($id = NULL, $id_kop)->row_array();
				$bank = $this->M_pinjaman->get_angsuran($id = NULL, $id_bank)->row_array();

				if ($kop != NULL) {
					$pinjaman_kop = $this->M_pinjaman->get_pinjaman($kop['id_pinjaman'])->row_array();
					if ($pinjaman_kop) {
						if ($pinjaman_kop['jml_angsuran']-$pinjaman_kop['status_ang'] == 0) {
							$status = 1;
						} else {
							$status = 0;
						}
						$res['pinjaman_kop'] = $this->M_pinjaman->update_status_pinjaman($pinjaman_kop['id_pinjaman'], $status);
					}
				}
				if ($bank != NULL) {
					$pinjaman_bank = $this->M_pinjaman->get_pinjaman($bank['id_pinjaman'])->row_array();
					if ($pinjaman_bank) {
						if ($pinjaman_bank['jml_angsuran']-$pinjaman_bank['status_ang'] == 0) {
							$status = 1;
						} else {
							$status = 0;
						}
						$res['pinjaman_bank'] = $this->M_pinjaman->update_status_pinjaman($pinjaman_bank['id_pinjaman'], $status);
					}
				}
				
				if ($res) {
					$this->session->set_flashdata('message_success', 'Pinjaman berhasil dibayar');
					$data = $this->gaji_pegawai($id_pegawai);
					$this->load->view('gaji/paycheck_output', $data);
				} else {
					$this->session->set_flashdata('message_failed', 'Pinjaman gagal dibayar');
					redirect('detail/'.$id_pegawai);
				}
			} else {
				redirect('detail/'.$id_pegawai);
			}
		}
	}

	public function search_gaji($id_pegawai = NULL) 
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$data = $this->gaji_pegawai->get_data($id_pegawai);
			$output = '';
			$query = '';
			$no = 1;
			$data_output = array();
			if($this->input->post('query'))
			{
				$query = $this->input->post('query'); 
			}
			if (!empty($data)) {
				$output .= '
							<table class="table table-bordered table-hover text-center" style="background-color: white;">
								<thead>
									<th>No</th>
									<th>Nama</th>
									<th>Honorarium</th>
									<th>Jumlah Tunjangan</th>
									<th>Jumlah Potongan</th>
									<th>Gaji Bersih</th>
									<th>Menu</th>
								</thead>
								<tbody>
					';
				// var_dump($data['pegawais']);
				foreach ($data['pegawais'] as $key => $pegawai) {
					if (($pegawai['honor'] != NULL) && ($pegawai['honor'] == 0)) {
						$honor = 'Rp. &nbsp;&nbsp; 0 &nbsp;&nbsp;<small>(belum ditentukan)</small>';
						$honor_val = 0;
					} else if (($pegawai['honor'] != NULL) && ($pegawai['honor'] != 0)) {
						$honor = 'Rp. &nbsp;&nbsp;'.number_format($pegawai['honor'],0,',','.');
						$honor_val = $pegawai['honor'];
					} else {
						$honor = 'Rp. &nbsp;&nbsp; 0';
						$honor_val = 0;
					}

					if ((stripos($pegawai['nama'], $query) !== FALSE) || stripos($pegawai['nbm'], $query) !== FALSE) {
						$data_output[$key] = $data['pegawais'][$key];
						$data_output[$key]['honor'] = $honor;
						$data_output[$key]['tunjangan'] = $pegawai['tunjangan_val'];
						$data_output[$key]['potongan'] = $pegawai['potongan_val'];
						$data_output[$key]['gaji'] = $pegawai['gaji_bersih'];
					} 

					if ($query == '') {
						$output .= '
							<tr>
								<td>'.$no++.'</td>
								<td style="text-align: left; padding-left: 15px;">'.$pegawai['nama'].'</td>
								<td style="text-align: left; padding-left: 15px;">'.$honor.'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($pegawai['tunjangan_val'],0,',','.').'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($pegawai['potongan_val'],0,',','.').'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($pegawai['gaji_bersih'],0,',','.').'</td>
								<td>
									<a href="'.site_url('detail/'.$pegawai['id_pegawai']).'" title="Detail" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<a href="'.site_url('print/'.$pegawai['id_pegawai']).'" target="_BLANK" title="Cetak" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-blue"><i class="fa fa-fw fa-print"></i></span>
									</a>
								</td>
							</tr>
						';
					}
				}

				if ((empty($data_output)) && ($query != '')) {
					$output .= '
						<tr>
							<td colspan="7" class="text-danger">Tidak ada data ditemukan.</td>
						</tr>
					';
				}
				
				foreach ($data_output as $key => $output_val) {
					if ($query != '') {
						$output .= '
							<tr>
								<td>'.$no++.'</td>
								<td style="text-align: left; padding-left: 15px;">'.$output_val['nama'].'</td>
								<td style="text-align: left; padding-left: 15px;">'.$output_val['honor'].'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($output_val['tunjangan'],0,',','.').'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($output_val['potongan'],0,',','.').'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($output_val['gaji'],0,',','.').'</td>
								<td>
									<a href="'.site_url('detail/'.$output_val['id_pegawai']).'" title="Detail" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<a href="'.site_url('print/'.$output_val['id_pegawai']).'" target="_BLANK" title="Cetak" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-blue"><i class="fa fa-fw fa-print"></i></span>
									</a>
								</td>
							</tr>
						';
					}
				}
				
				$output .= '
								</tbody>
							</table">
					';
			}
			echo $output;
		}
	}

	// private function gaji_pegawai($id_pegawai)
	// {
	// 	getDateZone();			
	// 	$month_today = date('Y-m'); // bulan & tahun ini
	// 	$date_today = date('Y-m-d'); // tanggal sekarang
	// 	$data['desc'] = month($date_today).' '.date('Y', strtotime($date_today));
	// 	$data['month'] = $month_today;
	// 	$data['today_date'] = fullConvertIDN(date('Y-m-d'), $short = NULL, $day = FALSE);
	// 	$potongan = $this->M_potongan->get_potongan()->row_array();
	// 	$tunjangan = $this->M_tunjangan->get_tunjangan()->row_array();
	// 	$jabatan_val = $tunjangan['jabatan'];

	// 	if ($id_pegawai != NULL) {
	// 		$data['bendahara'] = $this->M_jabatan->get_bendahara($id_jabatan = '2', $jabatan = 'Bendahara')->row_array();
	// 		$data['pegawai'] = $this->M_pegawai->get_pegawai($id_pegawai)->row_array();
	// 		$keluargas = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
	// 		$data['jabatans'] = $this->M_gaji->get_jabatan_detail($id_pegawai, $jabatan_val)->result_array();
	// 		$nominal_jbt = 0;
	// 		foreach ($data['jabatans'] as $key => $jabatan) {
	// 			$nominal_jbt += $jabatan['nominal_jbt'];
	// 		}
	// 		$pinjaman_kop = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP')->row_array();
	// 		$pinjaman_bank = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'BANK')->row_array();
	// 		foreach ($keluargas as $key => $value) {
	// 			// Keluarga
	// 			if ($keluargas[$key]['id_pegawai'] == $data['pegawai']['id_pegawai']) {
	// 				$data['keluarga']['klg_hidup'] = $keluargas[$key]['klg_hidup'];
	// 				$data['keluarga']['status_klg'] = explode('-', $keluargas[$key]['keluarga']);
	// 			}
	// 		}
	// 		if (empty($data['keluarga']['klg_hidup'])) {
	// 			$keluarga_val = 0;
	// 		} else {
	// 			$pasangan = 0;
	// 			$anak_pertama = 0;
	// 			$anak_kedua = 0;
	// 			if ($data['keluarga']['klg_hidup'] != NULL) {
	// 				if (in_array('1', $data['keluarga']['status_klg'])){
	// 					$pasangan = 1;
	// 				} 
	// 				if (in_array('2', $data['keluarga']['status_klg'])) {
	// 					$anak_pertama = 1;
	// 				} 
	// 				if (in_array('3', $data['keluarga']['status_klg'])) {
	// 					$anak_kedua = 1;
	// 				}
	// 			}
	// 			$keluarga_val = ($data['pegawai']['honor']*$pasangan*$tunjangan['klg_psg'])+($data['pegawai']['honor']*$anak_pertama*$tunjangan['klg_anak'])+($data['pegawai']['honor']*$anak_kedua*$tunjangan['klg_anak']);
	// 		}
	// 		// 
	// 		$status_pegawai = $data['pegawai']['status_pegawai'];
	// 		$switch = switch_status_pegawai($status_pegawai);
	// 		// var_dump($switch);
	// 		// Tunjangan
	// 		$data['tunjangan']['beras'] = $tunjangan['beras']*$switch['beras'];
	// 		$data['tunjangan']['jamsostek'] = $tunjangan['jamsostek']*$switch['jamsostek_tj'];
	// 		$data['tunjangan']['keluarga'] = $keluarga_val*$switch['keluarga'];
	// 		$data['tunjangan']['jabatan'] = $nominal_jbt*$switch['jabatan'];
	// 		$data['tunjangan']['masakerja'] = $data['pegawai']['nominal_mk']*$switch['mk'];

	// 		// Potongan
	// 		$data['potongan']['infaq'] = $potongan['infaq']*$switch['infaq'];
	// 		$data['potongan']['sosial'] = $potongan['sosial']*$switch['sosial'];
	// 		$data['potongan']['aisiyah'] = $potongan['aisiyah']*$switch['aisiyah'];
	// 		$data['potongan']['pgri'] = $potongan['pgri']*$switch['pgri'];
	// 		$data['potongan']['jamsostek'] = $potongan['jamsostek']*$switch['jamsostek_pt'];
	// 		$data['potongan']['jsr'] = $potongan['jsr']*$switch['jsr'];
	// 		// potongan pinjaman exist
	// 		if ($pinjaman_kop != NULL) {
	// 			// KOP
	// 			if ($pinjaman_kop['id_pegawai'] == $data['pegawai']['id_pegawai']) {
	// 				$data['potongan']['nominal_kop'] = $pinjaman_kop['nominal'];
	// 				$data['potongan']['id_kop'] = $pinjaman_kop['id_angsuran'];
	// 				$data['potongan']['payOff_byGaji_Kop'] = $pinjaman_kop['payOff_byGaji'];
	// 			}
	// 		} else {
	// 			$data['potongan']['pinjaman_kop'] = 0;
	// 		}
	// 		if ($pinjaman_bank != NULL) {
	// 			// BANK
	// 			if ($pinjaman_bank['id_pegawai'] == $data['pegawai']['id_pegawai']) {
	// 				$data['potongan']['nominal_bank'] = $pinjaman_bank['nominal'];
	// 				$data['potongan']['id_bank'] = $pinjaman_bank['id_angsuran'];
	// 				$data['potongan']['payOff_byGaji_Bank'] = $pinjaman_bank['payOff_byGaji'];
	// 			}
	// 		} else {
	// 			$data['potongan']['pinjaman_bank'] = 0;
	// 		}
	// 		// var_dump($jabatans);
	// 	} else {
	// 		$pegawais = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
	// 		$keluargas = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
	// 		$jabatans = $this->M_gaji->get_jabatan($id_pegawai, $jabatan_val)->result_array();
	// 		$pinjaman_kop = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP')->result_array();
	// 		$pinjaman_bank = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'BANK')->result_array();
	// 		// var_dump($pinjaman_kop);
	// 		// var_dump($pinjaman_bank);
	// 		foreach ($pegawais as $key => $pegawai) {
	// 			$data['pegawais'][$key]['id_pegawai'] = $pegawais[$key]['id_pegawai'];
	// 			$data['pegawais'][$key]['nama'] = $pegawais[$key]['nama'];
	// 			$data['pegawais'][$key]['nbm'] = $pegawais[$key]['nbm'];
	// 			$data['pegawais'][$key]['honor'] = $pegawais[$key]['honor'];

	// 			if ($keluargas[$key]['id_pegawai'] == $pegawais[$key]['id_pegawai']) {
	// 				$data['pegawais'][$key]['keluarga']['klg_hidup'] = $keluargas[$key]['klg_hidup'];
	// 				$data['pegawais'][$key]['keluarga']['status_klg'] = explode('-', $keluargas[$key]['keluarga']);
	// 			}
	// 			if (empty($data['pegawais'][$key]['keluarga']['klg_hidup'])) {
	// 				$keluarga_val = 0;
	// 			} else {
	// 				$pasangan = 0;
	// 				$anak_pertama = 0;
	// 				$anak_kedua = 0;
	// 				if ($data['pegawais'][$key]['keluarga']['klg_hidup'] != NULL) {
	// 					if (in_array('1', $data['pegawais'][$key]['keluarga']['status_klg'])){
	// 						$pasangan = 1;
	// 					} 
	// 					if (in_array('2', $data['pegawais'][$key]['keluarga']['status_klg'])) {
	// 						$anak_pertama = 1;
	// 					} 
	// 					if (in_array('3', $data['pegawais'][$key]['keluarga']['status_klg'])) {
	// 						$anak_kedua = 1;
	// 					}
	// 				}
	// 				$keluarga_val = ($pegawai['honor']*$pasangan*$tunjangan['klg_psg'])+($pegawai['honor']*$anak_pertama*$tunjangan['klg_anak'])+($pegawai['honor']*$anak_kedua*$tunjangan['klg_anak']);
	// 			}
	// 			$nominal_jbt = 0;
	// 			if ($jabatans[$key]['id_pegawai'] == $pegawais[$key]['id_pegawai']) {
	// 				$nominal_jbt = $jabatans[$key]['nominal_jbt'];
	// 			}
	// 			// var_dump($jabatans);
	// 			$status_pegawai = $pegawai['status_pegawai'];
	// 			$switch = switch_status_pegawai($status_pegawai);
	// 			// Tunjangan
	// 			$data['pegawais'][$key]['tunjangan']['beras'] = $tunjangan['beras']*$switch['beras'];
	// 			$data['pegawais'][$key]['tunjangan']['jamsostek'] = $tunjangan['jamsostek']*$switch['jamsostek_tj'];
	// 			$data['pegawais'][$key]['tunjangan']['keluarga'] = $keluarga_val*$switch['keluarga'];
	// 			$data['pegawais'][$key]['tunjangan']['jabatan'] = $nominal_jbt*$switch['jabatan'];
	// 			$data['pegawais'][$key]['tunjangan']['masakerja'] = $pegawai['nominal_mk']*$switch['mk'];

	// 			// Potongan
	// 			$data['pegawais'][$key]['potongan']['infaq'] = $potongan['infaq']*$switch['infaq'];
	// 			$data['pegawais'][$key]['potongan']['sosial'] = $potongan['sosial']*$switch['sosial'];
	// 			$data['pegawais'][$key]['potongan']['aisiyah'] = $potongan['aisiyah']*$switch['aisiyah'];
	// 			$data['pegawais'][$key]['potongan']['pgri'] = $potongan['pgri']*$switch['pgri'];
	// 			$data['pegawais'][$key]['potongan']['jamsostek'] = $potongan['jamsostek']*$switch['jamsostek_pt'];
	// 			$data['pegawais'][$key]['potongan']['jsr'] = $potongan['jsr']*$switch['jsr'];
	// 			$data['pegawais'][$key]['potongan']['pinjaman_kop'] = 0;
	// 			if ($pinjaman_kop != NULL) {
	// 				foreach ($pinjaman_kop as $i => $kop) {
	// 					if ($pinjaman_kop[$i]['id_pegawai'] == $pegawais[$key]['id_pegawai']) {
	// 						$data['pegawais'][$key]['potongan']['pinjaman_kop'] = $pinjaman_kop[$i]['nominal'];
	// 					} 
	// 				}
	// 			}
	// 			$data['pegawais'][$key]['potongan']['pinjaman_bank'] = 0;
	// 			if ($pinjaman_bank != NULL) {
	// 				foreach ($pinjaman_bank as $j => $bank) {
	// 					if ($pinjaman_bank[$j]['id_pegawai'] == $pegawais[$key]['id_pegawai']) {
	// 						$data['pegawais'][$key]['potongan']['pinjaman_bank'] = $pinjaman_bank[$j]['nominal'];
	// 					}
	// 				}
	// 			}
	// 			foreach ($data['pegawais'] as $key => $pegawai) {
	// 				$data['pegawais'][$key]['tunjangan_val'] = array_sum($pegawai['tunjangan']);
	// 				$data['pegawais'][$key]['potongan_val'] = array_sum($pegawai['potongan']);
	// 				$data['pegawais'][$key]['gaji_bersih'] = ($pegawai['honor'] + array_sum($pegawai['tunjangan'])) - array_sum($pegawai['potongan']);
	// 			}
	// 		}
	// 	}
	// 	if (authUserLevel() == TRUE){
	// 		$data['hide'] = FALSE;
	// 	} else {
	// 		$data['hide'] = TRUE;
	// 	}
	// 	return $data;
	// }
}
