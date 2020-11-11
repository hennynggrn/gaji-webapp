<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_keluarga');
	}

	public function index()
	{
		$this->template->load('index');
	}

	public function table_keluarga()
	{
		$data['tampil']= $this->M_keluarga->get_keluarga()->result_array();
		$this->template->load('index','keluarga/table_keluarga',$data);

		// var_dump($data['tampil']);
	}

	public function edit_keluarga()
	{
		$id= $this->uri->segment(3);
		$data['pegawai']= $this->M_keluarga->edit_keluarga($id)->row_array();
		$this->template->load('index','keluarga/edit_keluarga',$data);

		// var_dump($data['pegawai']);
	}

	public function edit_keluarga_proses()
	{
		$id_keluarga=$this->input->post('id_keluarga');
		$nama=$this->input->post('nama');
		$s_hidup=$this->input->post('s_hidup');
		$gender=$this->input->post('gender');
		$id_pegawai=$this->input->post('id_pegawai');

		$data= array(
			'nama' => $nama,
			's_hidup' => $s_hidup,
			'gender' => $gender,
			'id_pegawai'=>$id_pegawai
		);
		$where = array(
			'id_pegawai' => $id_pegawai
		);
		//print_r($data);
		$this->M_keluarga->edit_keluarga_proses($where, $data,'keluarga');
		redirect('keluarga/table_keluarga');	
	}
	
}