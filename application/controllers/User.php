<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index($id_pegawai = NULL, $user_id = NULL)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		} else {
			getDateZone();
			if (authUserAdmin() == TRUE) {
				$data['title'] = 'Tabel Pengguna';
				$data['pegawais'] = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
				if (authUserDeveloper() == TRUE) {
					$data['users'] = $this->M_user->get_user($user_id)->result_array();
					$admins = array();
					foreach ($data['users']  as $key => $user) {
						if ($data['users'][$key]['level_id'] == 1) { 
							$admins[$key] = $data['users'][$key]['level_id'];
						}
					}
					$admins = count($admins);
				} else {
					$users = $this->M_user->get_user($user_id)->result_array();
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
				// var_dump($data['users']);
				// var_dump($admins);
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

	public function profile_user($user_id, $id_pegawai = NULL)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		} else {
			if ($this->session->userdata('user_id') != $user_id) {
				redirect(base_url());
			} else {
				$data['title'] = 'Profile Pengguna';
				$data['pegawais'] = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
				$data['user'] = $this->M_user->get_user($user_id)->row_array();

				$users = $this->M_user->get_user($user_id = NULL)->result_array();
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
				if ($admins < 2) {
					$data['hide'] = TRUE;
				} else {
					$data['hide'] = FALSE;
				}
				
				// var_dump($data['user']);
				$this->template->load('index','user/profile_user', $data);
			}
		}
	}

	public function update_user()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		} else {
			$id = $this->input->post('id');
			if (($this->session->userdata('user_id') == $id) || (authUserAdmin() == TRUE)) {
				if (empty($this->input->post('password'))) {
					$enc_password = $this->input->post('old_password');
				} else {
					$enc_password = md5($this->input->post('password'));
				}
				$res['user'] = $this->M_user->update_user($enc_password, $id);
				$view = $this->input->post('view');
				if ($res) {
					$this->session->set_flashdata('message_success', 'Data pengguna berhasil diedit');
					if ($view == 'profile') {
						redirect('profile/'.$id);
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message_failed', 'Data pengguna gagal diedit');
				}
			} else {
				redirect(base_url());
			}
		}
	}

	public function unlink_pegawai($id)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		} else {
			if (($this->session->userdata('user_id') == $id) || (authUserAdmin() == TRUE)) {
				$res['unlink'] = $this->M_user->unlink_pegawai($id);
				$view = $this->uri->segment(1);
				if ($res) {
					$this->session->set_flashdata('message_success', 'Link data pegawai berhasil dihapus');
					if ($view == 'profile') {
						redirect('profile/'.$id);
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message_failed', 'Data pegawai gagal dihubungkan');
				}
			} else {
				redirect(base_url());
			}
		}
	}

	public function delete_user($id)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		} else {
			if (authUserAdmin() == TRUE) {
				$res['delete'] = $this->M_user->delete_user($id);
				if ($res) {
					$this->session->set_flashdata('message_success', 'Data pengguna berhasil dihapus');
					redirect('user');
				} else {
					$this->session->set_flashdata('message_failed', 'Data pengguna gagal dihapus');
				}
			} else {
				redirect(base_url());
			}
		}
	}

}
