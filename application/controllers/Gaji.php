<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function index($id_pegawai = NULL) 
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$data = $this->gaji_pegawai_all($id_pegawai);
			$this->template->load('index','gaji/table_gaji', $data);
		}
	}

	public function detail_gaji($id_pegawai = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$data = $this->gaji_pegawai($id_pegawai);
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
			$output = '';
			$query = '';
			$data = $this->gaji_pegawai_all($id_pegawai);
			$no = 1;
			
			if($this->input->post('query'))
			{
				$query = $this->input->post('query'); 
			}

			// if (($pegawai['honor'] != NULL) && ($pegawai['honor'] == 0)) {
			// 	$honor = 'Rp. &nbsp;&nbsp; 0 &nbsp;&nbsp;<small>(belum ditentukan)</small>';
			// 	$honor_val = 0;
			// } else if (($pegawai['honor'] != NULL) && ($pegawai['honor'] != 0)) {
			// 	$honor = 'Rp. &nbsp;&nbsp;'.$pegawai['honor'];
			// 	$honor_val = $pegawai['honor'];
			// } else {
			// 	$honor = '-';
			// 	$honor_val = 0;
			// }

			// if ($pegawai['klg_hidup'] != NULL) {
			// 	$pasangan = 0;
			// 	$anak_pertama = 0;
			// 	$anak_kedua = 0;
			// 	for ($i=0; $i < $pegawai['klg_hidup']; $i++) { 
			// 		if (in_array('1', $pegawai['status_klg'])) {
			// 			$pasangan = 1;
			// 		} else if (in_array('2', $pegawai['status_klg'])) {
			// 			$anak_pertama = 1;
			// 		} else {
			// 			$anak_kedua = 1;
			// 		}
			// 	}
			// } else {
			// 	$pasangan = 0;
			// 	$anak_pertama = 0;
			// 	$anak_kedua = 0;
			// }
			// $keluarga_val = ($pegawai['honor']*$pasangan*$tunjangan['klg_psg'])+($pegawai['honor']*$anak_pertama*$tunjangan['klg_anak'])+($pegawai['honor']*$anak_kedua*$tunjangan['klg_anak']);
			// $tunjangan_val = $tunjangan['beras']+$tunjangan['jamsostek']+$keluarga_val+$pegawai['jabatan']+$pegawai['nominal_mk'];

			// (!empty($pegawai['nominal_kop'])) ? $pjm_kop = $pegawai['nominal_kop'] : $pjm_kop = 0;
			// (!empty($pegawai['nominal_bank'])) ? $pjm_bank = $pegawai['nominal_bank'] : $pjm_bank = 0;
			// $pinjaman = $pjm_kop+$pjm_bank;
			// $potongan_val = $potongan['sosial']+$potongan['infaq']+$potongan['jsr']+$potongan['aisiyah']+$potongan['jamsostek']+$pinjaman;
			// $gaji = $honor_val+$tunjangan_val-$potongan_val;

			// $output .= '
			// 	<tr>
			// 		<td>'.$no++.'</td>
			// 		<td style="text-align: left; padding-left: 15px;">'.$pegawai['nama'].'</td>
			// 		<td style="text-align: left; padding-left: 15px;">'.number_format($honor,0,',','.').'</td>
			// 		<td style="text-align: left; padding-left: 15px;">'.number_format($tunjangan_val,0,',','.').'</td>
			// 		<td style="text-align: left; padding-left: 15px;">'.number_format($tunjangan_val,0,',','.').'</td>
			// 		<td style="text-align: left; padding-left: 15px;">'.number_format($gaji,0,',','.').'</td>
			// 		<td>
			// 			<a href="'.site_url('detail/'.$pegawai['id_pegawai']).'" title="Detail" data-tooltip="tooltip" data-placement="top">
			// 				<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
			// 			</a>
			// 			<a href="'.site_url('print/'.$pegawai['id_pegawai']).'" target="_BLANK" title="Cetak" data-tooltip="tooltip" data-placement="top">
			// 				<span class="badge bg-blue"><i class="fa fa-fw fa-print"></i></span>
			// 			</a>
			// 		</td>
			// 	</tr>
			// 	';
			var_dump($data);
			
			echo $output;
		}
	}

	private function gaji_pegawai_all($id_pegawai)
	{
		$date_today = date('Y-m-d'); // tanggal sekarang
			$month_today = date('Y-m'); // bulan & tahun ini
			$data['title'] = 'Detail Gaji';
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
			$date_today = date('Y-m-d'); // tanggal sekarang
			$month_today = date('Y-m'); // bulan & tahun ini
			$data['title'] = 'Print Gaji';
			$data['desc'] = month($date_today).' '.date('Y', strtotime($date_today));

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
