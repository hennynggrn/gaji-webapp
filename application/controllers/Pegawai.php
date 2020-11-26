<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller { 

	public function index()
	{
		$data['tampil']= $this->M_pegawai->get_pegawai()->result_array();
		$this->template->load('index','pegawai/table_pegawai',$data);
	}

	public function add_pegawai($id = NULL)
	{
		$data['id_pgw']= $this->M_pegawai->get_id_pegawai()->row_array();
		$data['id_pegawai']= $data['id_pgw']['id_pegawai'];
		$data['jabatan']= $this->M_jabatan->get_jabatan($id)->result();
		// $data['status_pgw']= $this->M_pegawai->get_status_pgw()->result();
		$this->template->load('index','pegawai/add_pegawai',$data);
	}

	public function add_pegawai_proses()
	{
		$res['pegawai']=$this->M_pegawai->add_pegawai();
		$res['jabatan']=$this->M_pegawai->add_jabatan();
		if($this->input->post('status') == 1) {
			$res['keluarga']=$this->M_keluarga->add_keluarga(); };

		if($res){
			redirect('pegawai/table_pegawai');
		} else {
			echo "<h2> Gagal Tambah Data </h2>";
		}
	}
		
	public function detail_pegawai($id)
	{
		$where = array('id_pegawai'=>$id);
		$data['pegawai']= $this->M_pegawai->get_pegawai_detail($where,'pegawai')->result();
		$data['keluarga']= $this->M_keluarga->get_keluarga_pegawai($id,'keluarga')->result_array();
		$this->template->load('index','pegawai/detail_pegawai',$data);
	}

	public function edit_pegawai($id  = TRUE)
	{
		$where = array('id_pegawai'=>$id);
		$data['pegawai']= $this->M_pegawai->get_pegawai_detail($where,'pegawai')->row_array();
		$data['keluarga']= $this->M_keluarga->get_keluarga_pegawai($id,'keluarga')->result_array();
		$data['jabatan']= $this->M_jabatan->get_jabatan($id)->result_array();

		$data['id_status'] = array();
		foreach ($data['keluarga'] as $key => $value) {
			$data['id_status'][] = $data['keluarga'][$key]['id_status'];			
		}
		// var_dump($data['keluarga']);
		$this->template->load('index','pegawai/edit_pegawai', $data);
	}

	public function update_pegawai()
	{
		echo 'update';
		var_dump($_POST);
		
		// $res['pegawai']=$this->M_pegawai->add_pegawai();
		// $res['jabatan']=$this->M_pegawai->add_jabatan();
		// if($this->input->post('status') == 1) {
		// 	$res['keluarga']=$this->M_keluarga->add_keluarga(); };

		// if($res){
		// 	redirect('pegawai/table_pegawai');
		// } else {
		// 	echo "<h2> Gagal Tambah Data </h2>";
		// }
	}
}
