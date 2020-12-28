<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function index($id_pegawai = NULL) 
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$data = $this->gaji_pegawai_all($id_pegawai);
			$data['title'] = 'Tabel Gaji';
			$month_today = date('Y-m'); // bulan & tahun ini
			$date_today = date('Y-m-d'); // tanggal sekarang
			$data['desc'] = month($date_today).' '.date('Y', strtotime($date_today));
			$data['month'] = $month_today;
			$this->template->load('index','gaji/table_gaji', $data);
		}
	}

	public function detail_gaji($id_pegawai = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$data = $this->gaji_pegawai($id_pegawai);
			$data['title'] = 'Detail Gaji';
			$month_today = date('Y-m'); // bulan & tahun ini
			$date_today = date('Y-m-d'); // tanggal sekarang
			$data['desc'] = month($date_today).' '.date('Y', strtotime($date_today));
			$data['month'] = $month_today;
			// var_dump($data);
			$this->template->load('index','gaji/detail_gaji',$data);
		}
	}

	public function print_gaji($id_pegawai)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$data = $this->gaji_pegawai($id_pegawai);
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

				var_dump($id_pegawai);
				var_dump($id_angsuran);
				var_dump($id_kop);
				var_dump($id_bank);

				$res['repay'] = $this->M_gaji->repay($id_kop, $id_bank);
				if ($res) {
					redirect('detail/'.$id_pegawai);
				} else {
					echo "<h2> Gagal Memproses Data </h2>";
				}
			} else {
				redirect('detail/'.$id_pegawai);
			}
		}
		
		
		 
		// $this->load->model('M_gaji');
		// $data['tampil']= $this->M_gaji->get_gaji()->result_array();

		// $this->template->load('index','gaji/print_det_gaji',$data);
	}

	public function search_gaji($id_pegawai = NULL) 
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			// $data_output = array();
			$data = $this->gaji_pegawai_all($id_pegawai);
			$output = '';
			$query = '';
			$no = 1;
			$data_output = array();
			if($this->input->post('query'))
			{
				$query = $this->input->post('query'); 
			}
			// $input = preg_quote($query, '~');
			if (!empty($data)) {
				$output .= '
					<div class="box box-primary">
						<div class="box-body">
							<table class="table table-bordered table-hover text-center">
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

				foreach ($data['pegawais'] as $key => $pegawai) {
					if (($pegawai['honor'] != NULL) && ($pegawai['honor'] == 0)) {
						$honor = 'Rp. &nbsp;&nbsp; 0 &nbsp;&nbsp;<small>(belum ditentukan)</small>';
						$honor_val = 0;
					} else if (($pegawai['honor'] != NULL) && ($pegawai['honor'] != 0)) {
						$honor = 'Rp. &nbsp;&nbsp;'.number_format($pegawai['honor'],0,',','.');
						$honor_val = $pegawai['honor'];
					} else {
						$honor = '-';
						$honor_val = 0;
					}

					if ($pegawai['klg_hidup'] != NULL) {
						$pasangan = 0;
						$anak_pertama = 0;
						$anak_kedua = 0;
						for ($i=0; $i < $pegawai['klg_hidup']; $i++) { 
							if (in_array('1', $pegawai['status_klg'])) {
								$pasangan = 1;
							} else if (in_array('2', $pegawai['status_klg'])) {
								$anak_pertama = 1;
							} else {
								$anak_kedua = 1;
							}
						}
					} else {
						$pasangan = 0;
						$anak_pertama = 0;
						$anak_kedua = 0;
					}
					$keluarga_val = ($pegawai['honor']*$pasangan*$data['tunjangan']['klg_psg'])+($pegawai['honor']*$anak_pertama*$data['tunjangan']['klg_anak'])+($pegawai['honor']*$anak_kedua*$data['tunjangan']['klg_anak']);
					$tunjangan_val = $data['tunjangan']['beras']+$data['tunjangan']['jamsostek']+$keluarga_val+$pegawai['jabatan']+$pegawai['nominal_mk'];

					(!empty($pegawai['nominal_kop'])) ? $pjm_kop = $pegawai['nominal_kop'] : $pjm_kop = 0;
					(!empty($pegawai['nominal_bank'])) ? $pjm_bank = $pegawai['nominal_bank'] : $pjm_bank = 0;
					$pinjaman = $pjm_kop+$pjm_bank;
					$potongan_val = $data['potongan']['sosial']+$data['potongan']['infaq']+$data['potongan']['jsr']+$data['potongan']['aisiyah']+$data['potongan']['jamsostek']+$pinjaman;
					$gaji = $honor_val+$tunjangan_val-$potongan_val;

					if ((stripos($pegawai['nama'], $query) !== FALSE) || stripos($pegawai['nbm'], $query) !== FALSE) {
						$data_output[$key] = $data['pegawais'][$key];
						$data_output[$key]['honor_val'] = $honor;
						$data_output[$key]['tunjangan_val'] = $tunjangan_val;
						$data_output[$key]['potongan_val'] = $potongan_val;
						$data_output[$key]['gaji'] = $gaji;
					} 

					if ($query == '') {
						$output .= '
							<tr>
								<td>'.$no++.'</td>
								<td style="text-align: left; padding-left: 15px;">'.$pegawai['nama'].'</td>
								<td style="text-align: left; padding-left: 15px;">'.$honor.'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($tunjangan_val,0,',','.').'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($potongan_val,0,',','.').'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($gaji,0,',','.').'</td>
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
								<td style="text-align: left; padding-left: 15px;">'.$output_val['honor_val'].'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($output_val['tunjangan_val'],0,',','.').'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($output_val['potongan_val'],0,',','.').'</td>
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
						</div>
					</div">
					';
			}
			
			// var_dump($output);
			
			echo $output;
		}
	}

	private function gaji_pegawai_all($id_pegawai)
	{
			date_default_timezone_set('Asia/Jakarta');
			$month_today = date('Y-m'); // bulan & tahun ini
			$date_today = date('Y-m-d'); // tanggal sekarang
			$data['desc'] = month($date_today).' '.date('Y', strtotime($date_today));
			$data['month'] = $month_today;

			// Tunjangan
			$data['tunjangan'] = $this->M_tunjangan->get_tunjangan()->row_array();
			$data['pegawais'] = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
			$data['keluargas'] = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
			$jabatan_val = $data['tunjangan']['jabatan'];
			$data['jabatans'] = $this->M_gaji->get_jabatan($id_pegawai, $jabatan_val)->result_array();
			
			// Potongan
			$data['potongan']= $this->M_potongan->get_potongan()->row_array();
			$data['pinjaman_kop'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP')->result_array();
			$data['pinjaman_bank'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'BANK')->result_array();

			foreach ($data['pegawais'] as $key => $value) {
				// Keluarga
				if ($data['keluargas'][$key]['id_pegawai'] == $data['pegawais'][$key]['id_pegawai']) {
					$data['pegawais'][$key]['klg_hidup'] = $data['keluargas'][$key]['klg_hidup'];
					$data['pegawais'][$key]['keluarga'] = $data['keluargas'][$key]['keluarga'];
					$data['pegawais'][$key]['status_klg'] = explode('-', $data['keluargas'][$key]['keluarga']);
				}
				// Jabatan
				if ($data['jabatans'][$key]['id_pegawai'] == $data['pegawais'][$key]['id_pegawai']) {
					$data['pegawais'][$key]['jabatan'] = $data['jabatans'][$key]['nominal_jbt'];
				}
				// KOP
				if ($data['pinjaman_kop'][$key]['id_pegawai'] == $data['pegawais'][$key]['id_pegawai']) {
					$data['pegawais'][$key]['nominal_kop'] = $data['pinjaman_kop'][$key]['nominal'];
				}
				// BANK
				if ($data['pinjaman_bank'][$key]['id_pegawai'] == $data['pegawais'][$key]['id_pegawai']) {
					$data['pegawais'][$key]['nominal_bank'] = $data['pinjaman_bank'][$key]['nominal'];
				}
			}
			if (authUserLevel() == TRUE){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			return $data;
	}

	private function gaji_pegawai($id_pegawai = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			date_default_timezone_set('Asia/Jakarta');
			$date_today = date('Y-m-d'); // tanggal sekarang
			$month_today = date('Y-m'); // bulan & tahun ini
			$data['desc'] = month($date_today).' '.date('Y', strtotime($date_today));
			$data['today_date'] = fullConvertIDN(date('Y-m-d'), $short = NULL, $day = FALSE);

			// Tunjangan
			$data['tunjangan'] = $this->M_tunjangan->get_tunjangan()->row_array();
			$data['bendahara'] = $this->M_jabatan->get_bendahara($id_jabatan = '2', $jabatan = 'Bendahara')->row_array();
			$data['pegawai'] = $this->M_pegawai->get_pegawai($id_pegawai)->row_array();
			$data['keluargas'] = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
			$jabatan_val = $data['tunjangan']['jabatan'];
			$data['jabatan'] = $this->M_gaji->get_jabatan($id_pegawai, $jabatan_val)->row_array();
			$data['jabatans'] = $this->M_gaji->get_jabatan_detail($id_pegawai, $jabatan_val)->result_array();
			
			// Potongan
			$data['potongan']= $this->M_potongan->get_potongan()->row_array();
			$data['pinjaman_kop'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP')->row_array();
			$data['pinjaman_bank'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'BANK')->row_array();

			foreach ($data['keluargas'] as $key => $value) {
				// Keluarga
				if ($data['keluargas'][$key]['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['klg_hidup'] = $data['keluargas'][$key]['klg_hidup'];
					$data['pegawai']['keluarga'] = $data['keluargas'][$key]['keluarga'];
					$data['pegawai']['status_klg'] = explode('-', $data['keluargas'][$key]['keluarga']);
				}
			}

			// Jabatan
			if (!empty($data['jabatan'])) {
				if ($data['jabatan']['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['jabatan'] = $data['jabatan']['nominal_jbt'];
				}
			}

			if ($data['pinjaman_kop'] != NULL) {
				// KOP
				if ($data['pinjaman_kop']['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['nominal_kop'] = $data['pinjaman_kop']['nominal'];
					$data['pegawai']['id_kop'] = $data['pinjaman_kop']['id_angsuran'];
				}
			}
			if ($data['pinjaman_bank'] != NULL) {
				// BANK
				if ($data['pinjaman_bank']['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['nominal_bank'] = $data['pinjaman_bank']['nominal'];
					$data['pegawai']['id_bank'] = $data['pinjaman_kop']['id_angsuran'];
				}
			}
			if (authUserLevel() == TRUE){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			return $data;
		}
	}
}
