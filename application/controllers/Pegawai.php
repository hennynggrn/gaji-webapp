<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller { 

	public function index($id_pegawai = NULL)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			$data['title'] = 'Tabel Pegawai';
			$data['pegawais'] = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$this->template->load('index', 'pegawai/table_pegawai', $data);
		}
	}

	public function add_pegawai($id = NULL)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$data['title'] = 'Tambah Pegawai';
				$data['id_pgw'] = $this->M_pegawai->get_id_pegawai()->row_array();
				$data['id_pegawai'] = $data['id_pgw']['id_pegawai'];
				$data['jabatans'] = $this->M_jabatan->get_jabatan($id)->result_array();
				$this->template->load('index', 'pegawai/add_pegawai', $data);
			} else {
				redirect('pegawai');
			}
		}
	}

	public function insert_pegawai()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$res['pegawai'] = $this->M_pegawai->add_pegawai();
				$res['jabatan'] = $this->M_jabatan->add_jabatan_pegawai();
				if ($this->input->post('status') == 1) {
					$res['keluarga']=$this->M_keluarga->add_keluarga(); 
				};

				if ($res) {
					redirect('pegawai');
				} else {
					echo "<h2> Gagal Tambah Data Pegawai </h2>";
				}
			} else {
				redirect('pegawai');
			}
		}
	}
		
	public function detail_pegawai($id = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			$data['title'] = 'Detail Pegawai';
			$where = array('id_pegawai' => $id);
			$data['pegawai'] = $this->M_pegawai->get_pegawai_detail($where,'pegawai')->row_array();
			$data['keluargas'] = $this->M_keluarga->get_keluarga_pegawai($id,'keluarga')->result_array();
			$data['jabatans'] = $this->M_jabatan->get_jabatan_pegawai($id)->result_array();
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$this->template->load('index', 'pegawai/detail_pegawai', $data);
		}
	}

	public function edit_pegawai($id  = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$data['title'] = 'Edit Pegawai';
				$where = array('id_pegawai' => $id);
				$data['pegawai'] = $this->M_pegawai->get_pegawai_detail($where,'pegawai')->row_array();
				$data['keluargas'] = $this->M_keluarga->get_keluarga_pegawai($id,'keluarga')->result_array();
				$data['jabatans'] = $this->M_jabatan->get_jabatan($id)->result_array();

				$data['id_status'] = array();
				foreach ($data['keluargas'] as $key => $value) {
					$data['id_status'][] = $data['keluargas'][$key]['id_status'];			
				}

				$this->template->load('index','pegawai/edit_pegawai', $data);
			} else {
				redirect('pegawai');
			}
		}
	}

	public function update_pegawai()
	{		
		
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$res['pegawai'] = $this->M_pegawai->update_pegawai();
				$res['jabatan'] = $this->M_jabatan->update_jabatan_pegawai();
				if ($this->input->post('status') == 1) {
					$res['keluarga'] = $this->M_keluarga->update_keluarga_pegawai(); 
				} else {
					$res['keluarga'] = $this->M_keluarga->delete_keluarga_pegawai(); 
				}

				$id = $this->input->post('id_pegawai');
				$where = array('id_pegawai' => $id);
				$pegawai = $this->M_pegawai->get_pegawai_detail($where,'pegawai')->row_array();
				$id_anggota_keluarga = $this->input->post('id_anggota_keluarga');
				$edit_keluarga = $this->input->post('edit_keluarga');
				$edit_honor = $this->input->post('edit_honor');
				
				if ($res) {
					if ((isset($edit_keluarga)) && ($edit_keluarga == 1)) {
						redirect('keluarga/detail/'.$id_anggota_keluarga);
					} else if ((isset($edit_honor)) && ($edit_honor == 1)) {
						if ($pegawai['honor'] != NULL) {
							redirect('honor/detail/'.$pegawai['honor']);
						} else {
							redirect('honor/detail/null');
						}
					} else {
						redirect('pegawai/detail/'.$id);
					}
				} else {
					echo "<h2> Gagal Edit Data Pegawai </h2>";
				}
			} else {
				redirect('pegawai/detail/'.$id);
			}
		}
	}

	public function delete_pegawai($id = TRUE)
	{		
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				
				$res['pegawai'] = $this->M_pegawai->delete_pegawai($id);

				if ($res) {
					redirect('pegawai');
				} else {
					echo "<h2> Gagal Hapus Data Pegawai </h2>";
				}
			} else {
				redirect('pegawai');
			}
		}
	}
}
