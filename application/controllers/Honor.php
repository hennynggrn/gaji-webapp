<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Honor extends CI_Controller {

	// function __construct() {
	// 	parent::__construct();
	// }

	public function index()
	{
		$data['title']= 'Tabel Honorium';

		$data['honors']= $this->M_honor->get_honor()->result_array();
		$this->template->load('index','honor/table_honor', $data);
		var_dump($data['honors']);
	}

	public function detail_honor($honor)
	{
		$data['title'] = 'Tabel Honorium Pegawai';
		$data['desc' ]= 'Rp. '.number_format($honor,2,',','.');

		$data['honors']= $this->M_honor->get_honor()->result_array();
		$this->template->load('index','honor/table_honor', $data);
		var_dump($data['honors']);
	}

	// public function add_honor()
	// {
	// 	$this->template->load('index','honor/add_honor');
	// }

	// public function add_honor_proses()
	// {
	// 	$kode_hr=$this->input->post('kode_hr');
	// 	$honor=$this->input->post('honor');

	// 	$res=$this->M_honor->add_honor(array(
	// 		'kode_hr' => $kode_hr,
	// 		'honor' => $honor
	// 		));
	// 	if($res=1){
	// 		redirect('honor/table_honor');
	// 	} else {
	// 		echo "<h2> Gagal Tambah Data </h2>";
	// 	}
	// }

	// public function edit_honor()
	// {
	// 	$id= $this->uri->segment(3);
	// 	$data['tampil']= $this->M_honor->edit_honor($id)->row_array();
	// 	$this->template->load('index','honor/edit_honor',$data);

	// 	var_dump($data['tampil']);
	// }

	// public function edit_honor_proses()
	// {
	// 	$id_honor=$this->input->post('id_honor');
	// 	$kode_hr=$this->input->post('kode_hr');
	// 	$honor=$this->input->post('honor');

	// 	$data= array(
	// 		'kode_hr'=>$kode_hr,
	// 		'honor' => $honor
	// 	);
	// 	$where = array(
	// 		'id_honor' => $id_honor
	// 		);
	// 	//print_r($data);
	// 	 $this->M_honor->edit_honor_proses($where, $data,'honor');
	// 	 redirect('honor/table_honor');	
	// }
}
