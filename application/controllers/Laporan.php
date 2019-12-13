<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		$this->template->load('index');
	}

	public function form_laporan()
	{
		$this->template->load('index','laporan/form_laporan');
	}
	
}
