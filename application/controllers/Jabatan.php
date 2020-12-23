<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function index($id = NULL)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
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
		}
	}

	public function add_jabatan($id_pegawai = NULL)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLevel() == TRUE){
				$data['title'] = 'Tambah Jabatan';
				$data['pegawais'] = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
				$this->template->load('index','jabatan/add_jabatan', $data);
			} else {
				redirect('jabatan');
			}
		}
	}
	
	public function insert_jabatan()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLevel() == TRUE){
				$res['jabatan'] = $this->M_jabatan->add_jabatan();
				$last_id = $res['jabatan'];
				$res['pegawai'] = $this->M_jabatan->add_pegawai_jabatan($last_id);

				if ($res) {
					redirect('jabatan');
				} else {
					echo "<h2> Gagal Tambah Jabatan </h2>";
				}
			} else {
				redirect('jabatan');
			}
		}
	}

	public function detail_jabatan($id)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
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
		}
	}

	public function edit_jabatan($id)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLevel() == TRUE){
				$data['title'] = 'Edit Jabatan';
				$data['pegawais'] = $this->M_jabatan->get_jabatan_pegawai_selected($id)->result_array();
				$data['id'] = $this->M_jabatan->get_jabatan_detail($id)->row_array();

				$this->template->load('index','jabatan/edit_jabatan', $data);
			} else {
				redirect('jabatan');
			}
		}
	}

	public function update_jabatan()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		}else {
			if (authUserLevel() == TRUE){
				$res['jabatan'] = $this->M_jabatan->update_jabatan();
				$res['pegawai'] = $this->M_jabatan->update_pegawai_jabatan();
				if ($res) {
					redirect('jabatan');
				} else {
					echo "<h2> Gagal Edit Jabatan </h2>";
				}
			} else {
				redirect('jabatan');
			}
		}
	}

	public function delete_jabatan($id)
	{		
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLevel() == TRUE){
				$res['jabatan'] = $this->M_jabatan->delete_jabatan($id);

				if ($res) {
					redirect('jabatan');
				} else {
					echo "<h2> Gagal Hapus Jabatan  </h2>";
				}
			} else {
				redirect('jabatan');
			}
		}
	}

	public function delete_pegawai()
	{		
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			$id_jabatan = $this->uri->segment(3);
			$id_pegawai = $this->uri->segment(4);
			if (authUserLevel() == TRUE){
				$res['pegawai'] = $this->M_jabatan->delete_pegawai($id_jabatan, $id_pegawai);

				if ($res) {
					redirect('jabatan/detail/'.$id_jabatan);
				} else {
					echo "<h2> Gagal Hapus Jabatan  </h2>";
				}
			} else {
				redirect('jabatan/detail/'.$id_jabatan);
			}
		}
	}
}
