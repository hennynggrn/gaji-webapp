<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_jabatan');
	}

	public function index()
	{
		$this->template->load('index');
	}

	public function table_jabatan()
	{
		$data['tampil']= $this->M_jabatan->get_jabatan()->result();
		$this->template->load('index','jabatan/table_jabatan',$data);
	}

	public function add_jabatan()
	{
		$data['pegawai']= $this->M_jabatan->get_pegawai()->result();
		$this->template->load('index','jabatan/add_jabatan',$data);
	}
	
	public function add_jabatan_proses()
	{
		$id_pegawai=$this->input->post('id_pegawai');
		$nama_jabatan=$this->input->post('nama_jabatan');
		$jml_jam=$this->input->post('jml_jam');

		$res=$this->M_jabatan->add_jabatan(array(
			'id_pegawai' => $id_pegawai,
			'nama_jabatan' => $nama_jabatan,
			'jml_jam' => $jml_jam
			));
		if($res=1){
			redirect('jabatan/table_jabatan');
		} else {
			echo "<h2> Gagal Tambah Data </h2>";
		}
	}

	public function edit_jabatan()
	{
		$id= $this->uri->segment(3);
		$data['pegawai']= $this->M_jabatan->edit_jabatan($id)->result();
		$this->template->load('index','jabatan/edit_jabatan',$data);
	}

	public function edit_jabatan_proses()
	{
		$id_jabatan=$this->input->post('id_jabatan');
		$nama_jabatan=$this->input->post('nama_jabatan');
		$jml_jam=$this->input->post('jml_jam');
		$id_pegawai=$this->input->post('id_pegawai');

		$data= array(
			'nama_jabatan' => $nama_jabatan,
			'jml_jam' => $jml_jam,
			'id_pegawai'=>$id_pegawai
		);
		$where = array(
			'id_pegawai' => $id_pegawai
		);
		//print_r($data);
		$this->M_jabatan->edit_jabatan_proses($where, $data,'jabatan');
		redirect('jabatan/table_jabatan');	
	}
}