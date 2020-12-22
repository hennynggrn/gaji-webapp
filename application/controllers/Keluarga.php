<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {

	public function index($id = NULL)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			$data['title']= 'Tabel Keluarga Pegawai';
			$data['keluargas']= $this->M_keluarga->get_keluarga($id)->result_array();
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$this->template->load('index','keluarga/table_keluarga',$data);
		}
	}

	public function update_keluarga()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$id = $this->input->post('id_anggota_klg');
				$res['keluarga']= $this->M_keluarga->update_keluarga();
				if ($res) {
					redirect('keluarga');
				} else {
					echo "<h2> Gagal Edit Data Anggota Keluarga </h2>";
				}
			} else {
				redirect('keluarga');
			}
		}
	}

	public function detail_keluarga($id_pegawai = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			$data['pegawai'] = $this->M_pegawai->get_pegawai($id_pegawai)->row_array();
			$data['keluargas'] = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
			$data['title'] = 'Detail Anggota Keluarga';
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$this->template->load('index','keluarga/detail_keluarga', $data);
		}
	}
	
	public function edit_keluarga($id_pegawai = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			$data['title'] = 'Edit Keluarga Pegawai';
			$where = array('id_pegawai' => $id_pegawai);
			$data['pegawai'] = $this->M_pegawai->get_pegawai_detail($where,'pegawai')->row_array();
			$data['keluargas'] = $this->M_keluarga->get_keluarga_pegawai($id_pegawai,'keluarga')->result_array();
			$data['jabatans'] = $this->M_jabatan->get_jabatan($id_pegawai)->result_array();
			$data['id_anggota_keluarga'] = $id_pegawai;
			$data['edit_keluarga'] = TRUE;

			$data['id_status'] = array();
			foreach ($data['keluargas'] as $key => $value) {
				$data['id_status'][] = $data['keluargas'][$key]['id_status'];			
			}
			$data['onload'] = 'focusKeluarga(this);';
			echo '<script type="text/javascript">focusKeluarga(this);</script>';
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$this->template->load('index','pegawai/edit_pegawai', $data);
		}
	}
	
}
