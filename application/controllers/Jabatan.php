<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Tabel Jabatan';
		$data['jabatans']= $this->M_jabatan->get_jabatan()->result_array();
		$this->template->load('index','jabatan/table_jabatan',$data);
	}

	public function add_jabatan()
	{
		$data['pegawai']= $this->M_jabatan->get_pegawai()->result();
		$this->template->load('index','jabatan/add_jabatan',$data);
	}
	
	public function add_jabatan_proses()
	{
		$jabatan=$this->input->post('jabatan');
		$jml_jam=$this->input->post('jml_jam');

		$res=$this->M_jabatan->add_jabatan(array(
			'jabatan' => $jabatan,
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
		$data['jabatan']= $this->M_jabatan->edit_jabatan($id)->row_array();
		$this->template->load('index','jabatan/edit_jabatan',$data);

		// var_dump($data['jabatan']);
	}

	public function edit_jabatan_proses()
	{
		$id_jabatan=$this->input->post('id_jabatan');
		$jabatan=$this->input->post('jabatan');
		$jml_jam=$this->input->post('jml_jam');
		// var_dump($id_jabatan);
		$data= array(
			'jabatan' => $jabatan,
			'jml_jam' => $jml_jam
		);
		$where = array(
			'id_jabatan' => $id_jabatan
		);
		//print_r($data);
		$this->M_jabatan->edit_jabatan_proses($where, $data,'jabatan');
		redirect('jabatan/table_jabatan');	
	}
}
