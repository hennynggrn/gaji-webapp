<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function index()
	{
		$this->template->load('index','pegawai/table_pegawai');
	}

	public function table_pegawai()
	{
		$this->load->model('M_pegawai');
		$data['tampil']= $this->M_pegawai->get_pegawai()->result_array();
		$this->template->load('index','pegawai/table_pegawai',$data);
	}

	public function add_pegawai()
	{
		$this->load->model('M_pegawai');
		$data['id_pgw']= $this->M_pegawai->get_id_pegawai()->row_array();
		$data['id_pegawai']= $data['id_pgw']['id_pegawai'];
		$data['jabatan']= $this->M_pegawai->get_jabatan()->result();
		// $data['status_pgw']= $this->M_pegawai->get_status_pgw()->result();
		$this->template->load('index','pegawai/add_pegawai',$data);
		// var_dump($data['id_pegawai']);
	}

	public function add_pegawai_proses()
	{
		$this->load->model('M_pegawai');
		$res['pegawai']=$this->M_pegawai->add_pegawai();
		$res['jabatan']=$this->M_pegawai->add_jabatan();
		if($this->input->post('status') == 1) {
			$res['keluarga']=$this->M_pegawai->add_keluarga(); };

		if($res){
			redirect('pegawai/table_pegawai');
		} else {
			echo "<h2> Gagal Tambah Data </h2>";
		}
	}
		
	public function detail_pegawai($id)
	{
		$this->load->model('M_pegawai');
		$where = array('id_pegawai'=>$id);
		$data['lihat']= $this->M_pegawai->get_pegawai_detail($where,'pegawai')->result();
		$this->template->load('index','pegawai/detail_pegawai',$data);
	}

	public function edit_pegawai($id)
	{
		$this->load->model('M_pegawai');
		$where = array('id_pegawai'=>$id);
		$data['pegawai']= $this->M_pegawai->get_pegawai_detail($where,'pegawai')->row_array();
		$this->template->load('index','pegawai/edit_pegawai', $data);
	}
}
