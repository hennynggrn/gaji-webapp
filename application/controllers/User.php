<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		} else {
			if (authUserAdmin() == TRUE) {
				$data['title'] = 'Tabel Pengguna';
				if (authUserDeveloper() == TRUE) {
					$data['users'] = $this->M_user->get_user()->result_array();
					$admins = array();
					foreach ($data['users']  as $key => $user) {
						if ($data['users'][$key]['level_id'] == 1) { 
							$admins[$key] = $data['users'][$key]['level_id'];
						}
					}
					$admins = count($admins);
				} else {
					$users = $this->M_user->get_user()->result_array();
					$data['users'] = array();
					foreach ($users  as $key => $user) {
						if ($users[$key]['level_id'] != 0) { 
							$data['users'][$key] = $users[$key];
						}
					}
					$admins = array();
					foreach ($users  as $key => $user) {
						if ($users[$key]['level_id'] == 1) { 
							$admins[$key] = $users[$key]['level_id'];
						}
					}
					$admins = count($admins);
				}
				var_dump($data['users']);
				var_dump($admins);
				if ($admins < 2) {
					$data['hide'] = TRUE;
				} else {
					$data['hide'] = FALSE;
				}
				$this->template->load('index','user/table_user', $data);
			} else {
				redirect(base_url());
			}
		}
		
	}

}
