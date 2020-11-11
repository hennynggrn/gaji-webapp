<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunjangan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_tunjangan');
	}
	
	public function index()
	{
		$this->template->load('index');
	}

	public function table()
	{
		$this->load->model('M_tunjangan');
		$data['tampil']= $this->M_tunjangan->get_tunjangan()->row_array();
		$data['masakerja']= $this->M_tunjangan->get_masakerja()->result_array();
		$this->template->load('index','tunjangan/table_tunjangan',$data);

		// var_dump($data['tampil']);
	}

	public function edit_tunjangan()
	{
		$this->load->model('M_tunjangan');
		$data['tampil']= $this->M_tunjangan->get_tunjangan()->row_array();
		$data['masakerja']= $this->M_tunjangan->get_masakerja()->result_array();
		$this->template->load('index','tunjangan/edit_tunjangan',$data);
	}

	public function edit_tunjangan_proses()
	{
		$beras=$this->input->post('beras');
		$klg_psg=$this->input->post('klg_psg');
		$klg_anak=$this->input->post('klg_anak');
		$jamsostek=$this->input->post('jamsostek');
		$jabatan=$this->input->post('jabatan');
		// $t_masakerja=$this->input->post('t_masakerja');

		$data = array(
			'beras' => $beras,
			'klg_psg' => $klg_psg,
			'klg_anak' => $klg_anak,
			'jamsostek' => $jamsostek,
			'jabatan' => $jabatan,
			// 't_masakerja' => $t_masakerja
			);
		$where = array(
			'id_tunjangan' => 1
		);
		$this->M_tunjangan->edit_tunjangan_proses($where, $data,'tunjangan');
		redirect('tunjangan/table');
	}

	public function detail_tunjangan()
	{
		$this->template->load('index','tunjangan/detail_tunjangan');
	}
	
}