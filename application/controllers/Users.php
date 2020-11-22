<?php

class Users extends CI_Controller
{
	public function index()
	{
		$data["tittle"] = "Login";
		$this->load->view('login', $data);
	}
	
}

?>
