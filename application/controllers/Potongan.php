<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongan extends CI_Controller {

	public function index()
	{
		$this->template->load('index');
	}

	public function table()
	{
		$this->load->model('M_potongan');
		$data['tampil']= $this->M_potongan->get_potongan()->result_array();
		$this->template->load('index','potongan/table_potongan',$data);
	}

	public function add_potongan()
	{
		$this->template->load('index','potongan/add_potongan');
	}
	
	public function add_potongan_proses()
	{
		$id_potongan=$this->input->post('id_potongan');
		$nama=$this->input->post('nama');
		$jml_potongan=$this->input->post('jml_potongan');

		$this->load->model('M_potongan');
		$res=$this->M_potongan->add_potongan(array(
			'id_potongan' => $id_potongan,
			'nama' => $nama,
			'jml_potongan' => $jml_potongan
			));
		if($res=1){
			redirect('potongan/table');
		} else {
			echo "<h2> Gagal Tambah Data </h2>";
		}
	}

	public function detail_potongan()
	{
		$this->template->load('index','potongan/detail_potongan');
	}
}
