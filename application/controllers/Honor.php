<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Honor extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_honor');
	}

	public function index()
	{
		$this->template->load('index');
	}

	public function table_honor()
	{
		$data['tampil']= $this->M_honor->get_honor()->result();
		$this->template->load('index','honor/table_honor',$data);
	}

	public function add_honor()
	{
		$data['pegawai']= $this->M_honor->get_pegawai()->result();
		$this->template->load('index','honor/add_honor',$data);
	}

	public function add_honor_proses()
	{
		$id_pegawai=$this->input->post('id_pegawai');
		$honor=$this->input->post('honor');

		$res=$this->M_honor->add_honor(array(
			'id_pegawai' => $id_pegawai,
			'honor' => $honor
			));
		if($res=1){
			redirect('honor/table_honor');
		} else {
			echo "<h2> Gagal Tambah Data </h2>";
		}
	}

	public function edit_honor()
	{
		$id= $this->uri->segment(3);
		$data['pegawai']= $this->M_honor->edit_honor($id)->result();
		$this->template->load('index','honor/edit_honor',$data);
	}

	public function edit_honor_proses()
	{
		$id_honor=$this->input->post('id_honor');
		$honor=$this->input->post('honor');
		$id_pegawai=$this->input->post('id_pegawai');

		$data= array(
			'honor' => $honor,
			'id_pegawai'=>$id_pegawai
		);
		$where = array(
			'id_pegawai' => $id_pegawai
			);
		//print_r($data);
		 $this->M_honor->edit_honor_proses($where, $data,'honor');
		 redirect('honor/table_honor');	
	}
}