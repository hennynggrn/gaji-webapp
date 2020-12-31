<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} 
		$data['value'] = $this->gaji_pegawai_all($id_pegawai = NULL);
		date_default_timezone_set('Asia/Jakarta');
		$date_today = date('Y-m-d'); // tanggal sekarang
		$data['month'] = month($date_today);
		$data['title'] = 'Dashboard';
		$data['honor'] = 0;
		$data['tunjangan'] = 0;
		$data['potongan'] = 0;
		$data['gaji'] = 0;
		foreach ($data['value'] as $key => $value) {
			$data['honor'] += $value['honor_val'];
			$data['tunjangan'] += $value['tunjangan_val'];
			$data['potongan'] += $value['potongan_val'];
			$data['gaji'] += $value['gaji'];
		}
		// var_dump($data);
		$this->template->load('index','pages/home', $data);
	}	

	private function gaji_pegawai_all($id_pegawai)
	{
		// Tunjangan
		$data['tunjangan'] = $this->M_tunjangan->get_tunjangan()->row_array();
		$data['pegawais'] = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
		$data['keluargas'] = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
		$jabatan_val = $data['tunjangan']['jabatan'];
		$data['jabatans'] = $this->M_gaji->get_jabatan($id_pegawai, $jabatan_val)->result_array();
		
		// Potongan
		$data['potongan']= $this->M_potongan->get_potongan()->row_array();
		
		$data['pinjaman_kop'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP', $status = TRUE)->result_array();
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
		
		$data_output = array();
		foreach ($data['pegawais'] as $key => $pegawai) {
			if (($pegawai['honor'] != NULL) && ($pegawai['honor'] == 0)) {
				$honor_val = 0;
			} else if (($pegawai['honor'] != NULL) && ($pegawai['honor'] != 0)) {
				$honor_val = $pegawai['honor'];
			} else {
				$honor_val = 0;
			}

			$pasangan = 0;
			$anak_pertama = 0;
			$anak_kedua = 0;
			if ($pegawai['klg_hidup'] != NULL) {
				if (in_array('1', $pegawai['status_klg'])){
					$pasangan = 1;
				} 
				if (in_array('2', $pegawai['status_klg'])) {
					$anak_pertama = 1;
				} 
				if (in_array('3', $pegawai['status_klg'])) {
					$anak_kedua = 1;
				}
			}
			$keluarga_val = ($pegawai['honor']*$pasangan*$data['tunjangan']['klg_psg'])+($pegawai['honor']*$anak_pertama*$data['tunjangan']['klg_anak'])+($pegawai['honor']*$anak_kedua*$data['tunjangan']['klg_anak']);
			$tunjangan_val = $data['tunjangan']['beras']+$data['tunjangan']['jamsostek']+$keluarga_val+$pegawai['jabatan']+$pegawai['nominal_mk'];

			($pegawai['status_pegawai'] != 'P') ? $aisiyah_val = 0 : $aisiyah_val = $data['potongan']['aisiyah'];
			(!empty($pegawai['nominal_kop'])) ? $pjm_kop = $pegawai['nominal_kop'] : $pjm_kop = 0;
			(!empty($pegawai['nominal_bank'])) ? $pjm_bank = $pegawai['nominal_bank'] : $pjm_bank = 0;
			$pinjaman = $pjm_kop+$pjm_bank;
			$potongan_val = $data['potongan']['sosial']+$data['potongan']['infaq']+$data['potongan']['jsr']+$aisiyah_val+$data['potongan']['jamsostek']+$pinjaman;
			$gaji = $honor_val+$tunjangan_val-$potongan_val;

			$data_output[$key]['honor_val'] = $honor_val;
			$data_output[$key]['tunjangan_val'] = $tunjangan_val;
			$data_output[$key]['potongan_val'] = $potongan_val;
			$data_output[$key]['gaji'] = $gaji;
		} 
		return $data_output;
	}
}

