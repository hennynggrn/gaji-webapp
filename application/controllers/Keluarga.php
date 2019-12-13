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
		$data['tampil']= $this->M_keluarga->get_keluarga()->result();
		$this->template->load('index','keluarga/table_keluarga',$data);
	}

	public function add_keluarga()
	{
		$data['pegawai']= $this->M_keluarga->get_keluarga()->result();
		$this->template->load('index','keluarga/add_keluarga',$data);
	}

	public function add_keluarga_proses()
	{
		$id_pegawai=$this->input->post('id_pegawai');
		$nama_pasangan=$this->input->post('nama_pasangan');
		$nama_anaksatu=$this->input->post('nama_anaksatu');
		$nama_anakdua=$this->input->post('nama_anakdua');

		$res=$this->M_keluarga->add_keluarga(array(
			'id_pegawai' => $id_pegawai,
			'nama_pasangan' => $nama_pasangan,
			'nama_anaksatu' => $nama_anaksatu,
			'nama_anakdua' => $nama_anakdua
			));
		if($res=1){
			redirect('keluarga/table_keluarga');
		} else {
			echo "<h2> Gagal Tambah Data </h2>";
		}
	}

	public function edit_keluarga()
	{
		$id= $this->uri->segment(3);
		$data['pegawai']= $this->M_keluarga->edit_keluarga($id)->result();
		$this->template->load('index','keluarga/edit_keluarga',$data);
	}

	public function edit_keluarga_proses()
	{
		$id_keluarga=$this->input->post('id_keluarga');
		$nama_pasangan=$this->input->post('nama_pasangan');
		$nama_anaksatu=$this->input->post('nama_anaksatu');
		$nama_anakdua=$this->input->post('nama_anakdua');
		$id_pegawai=$this->input->post('id_pegawai');

		$data= array(
			'nama_pasangan' => $nama_pasangan,
			'nama_anaksatu' => $nama_anaksatu,
			'nama_anakdua' => $nama_anakdua,
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