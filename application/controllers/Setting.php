<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function updated_data()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLevel() == TRUE){
				$res = $this->M_setting->updated_data();
				if ($res) {
					$this->session->set_flashdata('message_success', 'Pengaturan berhasil diedit');
					redirect('table');
				} else {
					$this->session->set_flashdata('message_failed', 'Pengaturan gagal diedit');
				}
			} else {
				redirect('table');
			}
		}
	}

}

?>
