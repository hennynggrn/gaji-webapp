<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Tabel Laporan';
		$this->template->load('index','laporan/table_laporan', $data);
	}

	public function detail_laporan()
	{
		
	}
	
	public function print_laporan()
	{

	}
}
