<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index($id_pegawai = NULL)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			// $data = $this->gaji_pegawai($id_pegawai);
			$data = $this->gaji_pegawai->get_data($id_pegawai);
			$data['title'] = 'Dashboard';
			$data['honor'] = 0;
			$data['tunjangan'] = 0;
			$data['potongan'] = 0;
			$data['gaji'] = 0;
			foreach ($data['pegawais'] as $key => $value) {
				$data['honor'] += $value['honor'];
				$data['tunjangan'] += $value['tunjangan_val'];
				$data['potongan'] += $value['potongan_val'];
				$data['gaji'] += $value['gaji_bersih'];
			}
			$this->template->load('index','pages/home', $data);
			// var_dump($data['pegawais']);
		}
	}	
}

