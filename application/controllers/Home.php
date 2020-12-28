<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} 
		$data = $this->gaji_pegawai_all($id_pegawai = NULL);
		$data['title'] = 'Dashboard';
		$this->template->load('index','pages/home', $data);
	}	

	private function gaji_pegawai_all($id_pegawai)
	{
		date_default_timezone_set('Asia/Jakarta');
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
}

