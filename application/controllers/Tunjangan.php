<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunjangan extends CI_Controller {
	
	public function index()
	{
		$data['title'] = 'Tabel Tunjangan';

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
		$res['tunjangan'] = $this->M_tunjangan->update_tunjangan();
		$res['masakerja'] = $this->M_masakerja->update_masakerja();
		
		if ($res) {
			redirect('tunjangan');
		} else {
			echo "<h2> Gagal Edit Data Tunjangan </h2>";
		}
	}	

	public function masakerja_pegawai($id_pegawai = NULL)
	{
		$data['title'] = 'Tunjangan Masa Kerja Pegawai';

		$data['pegawais']= $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
		$data['masakerjas']= $this->M_masakerja->get_masakerja()->result_array();
		// var_dump($data['masakerjas']);

		$this->template->load('index', 'tunjangan/table_mk_pegawai', $data);
	}

	public function update_mk_pegawai()
	{
		$res['pegawai'] = $this->M_masakerja->update_mk_pegawai();
		// var_dump($_POST);
		if ($res) {
			redirect('tunjangan/masakerja/pegawai');
		} else {
			echo "<h2> Gagal Edit Data Masa Kerja Pegawai </h2>";
		}
	}
}
