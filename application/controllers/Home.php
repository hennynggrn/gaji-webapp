<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} 
		$data['title'] = 'Dashboard';
		// $data['onload'] = 'mySnackBar(this);';
		$this->template->load('index','pages/home', $data);
	}	
}
