<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function index()
	{
		$this->template->load('index');
	}

	public function table_pengguna()
	{
		$this->template->load('index','pengguna/table_pengguna');
	}
	
	public function cetak_gaji()
	{
		$this->template->load('index','laporan/cetak_gaji');
	}
}
