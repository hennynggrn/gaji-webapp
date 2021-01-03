<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function index($id = NULL)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLimited() != TRUE) {
				$data['title'] = 'Tabel Jabatan';
				$data['jabatans']= $this->M_jabatan->get_jabatan($id)->result_array();

				$pegawai = array();
				foreach ($data['jabatans'] as $key => $value) {
					$pegawai[] = $data['jabatans'][$key]['pegawai'];
				}

				$explode = array();
				foreach ($pegawai as $key => $value) {
					$explode[] = explode(',', $pegawai[$key]);
				}

				$data['result'] = array();
				foreach ($explode as $i => $value) {
					$data['result'][] = count(array_filter($explode[$i], function($x) { return !empty($x); }));
				}

				foreach ($data['jabatans'] as $key => $value) {
					$data['jabatans'][$key]['result'] = $data['result'][$key];
				}

				if (authUserLevel() == TRUE){
					$data['hide'] = FALSE;
				} else {
					$data['hide'] = TRUE;
				}
				$this->template->load('index','jabatan/table_jabatan',$data);
			} else {
				redirect(base_url());
			}
		}
	}

	public function add_jabatan($id_pegawai = NULL)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLimited() != TRUE) {
				if (authUserLevel() == TRUE){
					$data['title'] = 'Tambah Jabatan';
					$data['pegawais'] = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
					$this->template->load('index','jabatan/add_jabatan', $data);
				} else {
					redirect('jabatan');
				}
			} else {
				redirect(base_url());
			}
		}
	}
	
	public function insert_jabatan()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLimited() != TRUE) {
				if (authUserLevel() == TRUE){
					$res['jabatan'] = $this->M_jabatan->add_jabatan();
					$last_id = $res['jabatan'];
					$res['pegawai'] = $this->M_jabatan->add_pegawai_jabatan($last_id);

					if ($res) {
						$this->session->set_flashdata('message_success', 'Data jabatan berhasil ditambahkan');
						redirect('jabatan');
					} else {
						$this->session->set_flashdata('message_failed', 'Data jabatan gagal ditambahkan');
					}
				} else {
					redirect('jabatan');
				}
			} else {
				redirect(base_url());
			}
		}
	}

	public function detail_jabatan($id)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLimited() != TRUE) {
				$data['title'] = 'Detail Jabatan';
				$result = $this->M_jabatan->get_pegawai_jabatan($id)->result_array();
				$data['id'] = $this->M_jabatan->get_jabatan_detail($id)->row_array();
				$data['desc'] = $data['id']['jabatan'].' ('.$data['id']['jml_jam'].' jam)';
				$this_id = $id;

				$data['pegawais'] = array();
				foreach ($result as $key => $value) {
					if ($result[$key]['jbt_id'] == $id) {
						$data['pegawais'][] = $result[$key];
					}
				}
				if (authUserLevel() == TRUE){
					$data['hide'] = FALSE;
				} else {
					$data['hide'] = TRUE;
				}
				$this->template->load('index','jabatan/detail_jabatan', $data);
			} else {
				redirect(base_url());
			}
		}
	}

	public function edit_jabatan($id)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLimited() != TRUE) {
				if (authUserLevel() == TRUE){
					$data['title'] = 'Edit Jabatan';
					$data['pegawais'] = $this->M_jabatan->get_jabatan_pegawai_selected($id)->result_array();
					$data['id'] = $this->M_jabatan->get_jabatan_detail($id)->row_array();

					$this->template->load('index','jabatan/edit_jabatan', $data);
				} else {
					redirect('jabatan');
				}
			} else {
				redirect(base_url());
			}
		}
	}

	public function update_jabatan()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		}else {
			if (authUserLimited() != TRUE) {
				if (authUserLevel() == TRUE){
					$res['jabatan'] = $this->M_jabatan->update_jabatan();
					$res['pegawai'] = $this->M_jabatan->update_pegawai_jabatan();
					if ($res) {
						$this->session->set_flashdata('message_success', 'Data jabatan berhasil diedit');
						redirect('jabatan');
					} else {
						$this->session->set_flashdata('message_failed', 'Data jabatan gagal diedit');
					}
				} else {
					redirect('jabatan');
				}
			} else {
				redirect(base_url());
			}
		}
	}

	public function delete_jabatan($id)
	{		
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLimited() != TRUE) {
				if (authUserLevel() == TRUE){
					$res['jabatan'] = $this->M_jabatan->delete_jabatan($id);
					if ($res) {
						$this->session->set_flashdata('message_success', 'Data jabatan berhasil dihapus');
						redirect('jabatan');
					} else {
						$this->session->set_flashdata('message_failed', 'Data jabatan gagal dihapus');
					}
				} else {
					redirect('jabatan');
				}
			} else {
				redirect(base_url());
			}
		}
	}

	public function delete_pegawai()
	{		
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLimited() != TRUE) {
				$id_jabatan = $this->uri->segment(3);
				$id_pegawai = $this->uri->segment(4);
				if (authUserLevel() == TRUE){
					$res['pegawai'] = $this->M_jabatan->delete_pegawai($id_jabatan, $id_pegawai);
					if ($res) {
						$this->session->set_flashdata('message_success', 'Data pegawai berhasil dihapus dari jabatan');
						redirect('jabatan/detail/'.$id_jabatan);
					} else {
						$this->session->set_flashdata('message_failed', 'Data pegawai gagal dihapus dari jabatan');
					}
				} else {
					redirect('jabatan/detail/'.$id_jabatan);
				}
			} else {
				redirect(base_url());
			}
		}
	}
}
