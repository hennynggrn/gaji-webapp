<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongan extends CI_Controller {
	
	public function index()
	{
		$data['title'] = 'Table Potongan';

		$data['potongan']= $this->M_potongan->get_potongan()->row_array();
		// $data['masakerjas']= $this->M_masakerja->get_masakerja()->result_array();
		
		$this->template->load('index', 'potongan/table_potongan', $data);
	}

	public function edit_potongan()
	{
		$data['title'] = 'Edit Potongan';

		$data['potongan']= $this->M_potongan->get_potongan()->row_array();

		$this->template->load('index', 'potongan/edit_potongan', $data);
	}

	public function update_potongan()
	{
		$res['potongan'] = $this->M_potongan->update_potongan();
		
		if ($res) {
			redirect('potongan');
		} else {
			echo "<h2> Gagal Edit Data Potongan </h2>";
		}
	}	
}
