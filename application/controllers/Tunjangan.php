<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunjangan extends CI_Controller {
	
	public function index()
	{
		$data['title'] = 'Table Tunjangan';

		$data['tunjangan']= $this->M_tunjangan->get_tunjangan()->row_array();
		$data['masakerjas']= $this->M_masakerja->get_masakerja()->result_array();
		
		$this->template->load('index', 'tunjangan/table_tunjangan', $data);
	}

	public function edit_tunjangan()
	{
		$data['title'] = 'Edit Tunjangan';

		$data['tunjangan']= $this->M_tunjangan->get_tunjangan()->row_array();
		$data['masakerjas']= $this->M_masakerja->get_masakerja()->result_array();

		$this->template->load('index', 'tunjangan/edit_tunjangan', $data);
	}

	public function update_tunjangan()
	{
		var_dump($_POST);
		$res['tunjangan'] = $this->M_tunjangan->update_tunjangan();
		$res['masakerja'] = $this->M_masakerja->update_masakerja();
		
		if ($res) {
			redirect('tunjangan');
		} else {
			echo "<h2> Gagal Edit Data Tunjangan </h2>";
		}
	}	
}
