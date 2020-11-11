<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function index()
	{
		$this->template->load('index','gaji/table');
	}

	public function table()
	{
		$this->load->model('M_gaji');
		$data['tampil']= $this->M_gaji->get_gaji()->result_array();
		// $data['tahun'] = $this->M_tahun->get_tahun()->result_array();
		$this->template->load('index','gaji/table',$data);
	}

	public function detail_gaji()
	{
		$this->load->model('M_gaji');
		$where = array('id_gaji');
		$data['lihat']= $this->M_gaji->get_gaji_detail($where,'gaji')->result();
		$this->template->load('index','gaji/detail_gaji',$data);
	}

	public function print_det_gaji()
	{
		$this->load->model('M_gaji');
		$data['tampil']= $this->M_gaji->get_gaji()->result_array();
		$this->template->load('index','gaji/print_det_gaji',$data);
	}
}
