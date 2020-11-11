<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

	public function index()
	{
		$this->template->load('index');
	}

	public function rekap()
	{
		$this->template->load('index','laporan/rekap');
	}

	public function cetak_gaji()
	{
		$this->template->load('index','laporan/cetak_gaji');
	}
	
}
