<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} 
		$data['title'] = 'Dashboard';
		$this->template->load('index','pages/home', $data);
	}	
}
