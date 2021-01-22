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
			if (authUserLevel() == TRUE){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$data['pages'] = count($data['pegawais']);
			$this->template->load('index', 'pegawai/table_pegawai', $data);
		}
	}

	public function add_pegawai($id = NULL)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLevel() == TRUE){
				$data['title'] = 'Tambah Pegawai';
				$data['id_pgw'] = $this->M_pegawai->get_id_pegawai()->row_array();
				$data['id_pegawai'] = $data['id_pgw']['id_pegawai'];
				$data['jabatans'] = $this->M_jabatan->get_jabatan($id)->result_array();
				$data['masakerjas']= $this->M_masakerja->get_masakerja()->result_array();
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
			if (authUserLevel() == TRUE){
				$config['upload_path'] = 'assets/dist/img/upload';
				$config['allowed_types'] = 'jpeg|jpg|gif|png';
				$config['max_size'] = 100000*1024;
				$config['max_width'] = 2000;
				$config['max_height'] = 2000;
				
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto_diri')) {
					$errors = array('error' => $this->upload->display_errors());
					$upload_img = 'noimage.png';
				}else {
					$data = array('upload_data' => $this->upload->data());
					$upload_img = $_FILES['foto_diri']['name'];        
				}
				
				$res['pegawai'] = $this->M_pegawai->add_pegawai($upload_img);
				if (!empty($this->input->post('jabatan'))) {
					$res['jabatan'] = $this->M_jabatan->add_jabatan_pegawai();
				};
				if ($this->input->post('status') == 1) {
					$res['keluarga']=$this->M_keluarga->add_keluarga(); 
				};
				if ($res) {
					$this->session->set_flashdata('message_success', 'Data pegawai berhasil ditambahkan');
					redirect('pegawai');
				} else {
					$this->session->set_flashdata('message_failed', 'Data pegawai gagal ditambahkan');
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
			$data['pegawai'] = $this->M_pegawai->get_pegawai_detail($where)->row_array();
			
			$data['keluargas'] = $this->M_keluarga->get_keluarga_pegawai($id)->result_array();
			$data['jabatans'] = $this->M_jabatan->get_jabatan_pegawai($id)->result_array();
			if (authUserLevel() == TRUE){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			// var_dump($data['keluargas']);
			$this->template->load('index', 'pegawai/detail_pegawai', $data);
		}
	}

	public function edit_pegawai($id  = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLevel() == TRUE){
				$data['title'] = 'Edit Pegawai';
				$where = array('id_pegawai' => $id);
				$data['pegawai'] = $this->M_pegawai->get_pegawai_detail($where,'pegawai')->row_array();
				$data['masakerjas']= $this->M_masakerja->get_masakerja()->result_array();
				$data['keluargas'] = $this->M_keluarga->get_keluarga_pegawai($id,'keluarga')->result_array();
				$data['jabatans'] = $this->M_jabatan->get_jabatan($id)->result_array();

				$data['id_status'] = array();
				foreach ($data['keluargas'] as $key => $value) {
					$data['id_status'][] = $data['keluargas'][$key]['id_status'];			
				}
				// var_dump($data['pegawai']);
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
			if (authUserLevel() == TRUE){
				$config['upload_path'] = 'assets/dist/img/upload';
				$config['allowed_types'] = 'jpeg|jpg|gif|png';
				$config['max_size'] = 100000*1024;
				$config['max_width'] = 2000;
				$config['max_height'] = 2000;
				
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto_diri')) {
					$errors = array('error' => $this->upload->display_errors());
					if (empty($_POST['foto_diri_old'])) {
						$foto = 'noimage.png';
					} else {
						$foto = $this->input->post('foto_diri_old');
					}
					$upload_img = $foto;
				}else {
					$data = array('upload_data' => $this->upload->data());
					$upload_img = $_FILES['foto_diri']['name'];        
				}
				$res['pegawai'] = $this->M_pegawai->update_pegawai($upload_img);
				if (!empty($this->input->post('jabatan'))) {
					$res['jabatan'] = $this->M_jabatan->update_jabatan_pegawai();
				} else {
					$res['jabatan'] = $this->M_jabatan->delete_all_jabatan_pegawai();
				}
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
						$this->session->set_flashdata('message_success', 'Data anggota keluarga pegawai berhasil diedit');
						redirect('keluarga/detail/'.$id_anggota_keluarga);
					} else if ((isset($edit_honor)) && ($edit_honor == 1)) {
						$this->session->set_flashdata('message_success', 'Data honor pegawai berhasil diedit');
						if ($pegawai['honor'] != NULL) {
							redirect('honor/detail/'.$pegawai['honor']);
						} else {
							redirect('honor/detail/null');
						}
					} else {
						$this->session->set_flashdata('message_success', 'Data pegawai berhasil diedit');
						redirect('pegawai/detail/'.$id);
					}
				} else {
					$this->session->set_flashdata('message_failed', 'Data gagal diedit');
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
			if (authUserLevel() == TRUE){
				$res['pegawai'] = $this->M_pegawai->delete_pegawai($id);
				if ($res) {
					$this->session->set_flashdata('message_success', 'Data pegawai berhasil dihapus');
					redirect('pegawai');
				} else {
					$this->session->set_flashdata('message_failed', 'Data pegawai gagal dihapus');
				}
			} else {
				redirect('pegawai');
			}
		}
	}
}
