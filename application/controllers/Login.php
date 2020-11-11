<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function logiinn()
	{
		$this->load->view('logiinn');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	public function register()
	{
		$this->load->view('register');
	}
}