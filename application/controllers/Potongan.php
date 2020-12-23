<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongan extends CI_Controller {
	
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			$data['title'] = 'Tabel Potongan';
			$data['potongan']= $this->M_potongan->get_potongan()->row_array();
			if (authUserLevel() == TRUE){	
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$this->template->load('index', 'potongan/table_potongan', $data);
		}
	}

	public function edit_potongan()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLevel() == TRUE){	
				$data['title'] = 'Edit Potongan';
				$data['potongan']= $this->M_potongan->get_potongan()->row_array();
				$this->template->load('index', 'potongan/edit_potongan', $data);
			} else {
				redirect('potongan');
			}
		}
	}

	public function update_potongan()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLevel() == TRUE){	
				$res['potongan'] = $this->M_potongan->update_potongan();
				if ($res) {
					redirect('potongan');
				} else {
					echo "<h2> Gagal Edit Data Potongan </h2>";
				}
			} else {
				redirect('potongan');
			}
		}
	}	
}
