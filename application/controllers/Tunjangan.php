<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunjangan extends CI_Controller {

	public function index()
	{
		$this->template->load('index');
	}

	public function table()
	{
		$this->load->model('M_tunjangan');
		$data['tampil']= $this->M_tunjangan->get_pegawai()->result();
		$this->template->load('index','tunjangan/table_tunjangan',$data);
	}

	public function add_tunjangan()
	{
		$this->load->model('M_tunjangan');
		$data['pegawai']= $this->M_tunjangan->get_pegawai()->result();
		$this->template->load('index','tunjangan/add_tunjangan',$data);
	}

	public function add_tunjangan_proses()
	{
		$id_pegawai=$this->input->post('id_pegawai');
		$t_beras=$this->input->post('t_beras');
		$t_keluarga=$this->input->post('t_keluarga');
		$t_jamsostek=$this->input->post('t_jamsostek');
		$t_jabatan=$this->input->post('t_jabatan');
		$t_masakerja=$this->input->post('t_masakerja');

		$res=$this->M_tunjangan->add_tunjangan(array(
			'id_pegawai' => $id_pegawai,
			'tunjangan' => $tunjangan
			));
		if($res=1){
			redirect('tunjangan/table_tunjangan');
		} else {
			echo "<h2> Gagal Tambah Data </h2>";
		}
	}

	public function detail_tunjangan()
	{
		$this->template->load('index','tunjangan/detail_tunjangan');
	}
	
}