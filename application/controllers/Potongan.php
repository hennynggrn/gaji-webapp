<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongan extends CI_Controller {
	
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLimited() != TRUE) {
				$data['title'] = 'Tabel Potongan';
				$data['potongan']= $this->M_potongan->get_potongan()->row_array();
				if (authUserLevel() == TRUE){	
					$data['hide'] = FALSE;
				} else {
					$data['hide'] = TRUE;
				}
				$this->template->load('index', 'potongan/table_potongan', $data);
			} else {
				redirect(base_url());
			}
		}
	}

	public function edit_potongan()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLimited() != TRUE) {
				if (authUserLevel() == TRUE){	
					$data['title'] = 'Edit Potongan';
					$data['potongan']= $this->M_potongan->get_potongan()->row_array();
					$this->template->load('index', 'potongan/edit_potongan', $data);
				} else {
					redirect('potongan');
				}
			} else {
				redirect(base_url());
			}
		}
	}

	public function update_potongan()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLimited() != TRUE) {
				if (authUserLevel() == TRUE){	
					$res['potongan'] = $this->M_potongan->update_potongan();
					if ($res) {
						$this->session->set_flashdata('message_success', 'Data potongan berhasil diedit');
						redirect('potongan');
					} else {
						$this->session->set_flashdata('message_failed', 'Data potongan gagal diedit');
					}
				} else {
					redirect('potongan');
				}
			} else {
				redirect(base_url());
			}
		}
	}	
}
