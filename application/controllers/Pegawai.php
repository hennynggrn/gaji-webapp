<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller { 

	public function index()
	{
		$data['title'] = 'Table Pegawai';

		$data['pegawais'] = $this->M_pegawai->get_pegawai()->result_array();
		$this->template->load('index', 'pegawai/table_pegawai', $data);
	}

	public function add_pegawai($id = NULL)
	{
		$data['title'] = 'Tambah Pegawai';

		$data['id_pgw'] = $this->M_pegawai->get_id_pegawai()->row_array();
		$data['id_pegawai'] = $data['id_pgw']['id_pegawai'];
		$data['jabatans'] = $this->M_jabatan->get_jabatan($id)->result_array();
		$this->template->load('index', 'pegawai/add_pegawai', $data);
	}

	public function insert_pegawai()
	{
		$res['pegawai'] = $this->M_pegawai->add_pegawai();
		$res['jabatan'] = $this->M_jabatan->add_jabatan();
		if ($this->input->post('status') == 1) {
			$res['keluarga']=$this->M_keluarga->add_keluarga(); 
		};

		if ($res) {
			redirect('pegawai');
		} else {
			echo "<h2> Gagal Tambah Data </h2>";
		}
	}
		
	public function detail_pegawai($id = TRUE)
	{
		$data['title'] = 'Detail Pegawai';

		$where = array('id_pegawai' => $id);
		$data['pegawais'] = $this->M_pegawai->get_pegawai_detail($where,'pegawai')->result_array();
		$data['keluargas'] = $this->M_keluarga->get_keluarga_pegawai($id,'keluarga')->result_array();
		$data['jabatans'] = $this->M_jabatan->get_jabatan_pegawai($id)->result_array();
		// var_dump($data['jabatan']);
		$this->template->load('index', 'pegawai/detail_pegawai', $data);
	}

	public function edit_pegawai($id  = TRUE)
	{
		$data['title'] = 'Edit Pegawai';

		$where = array('id_pegawai'=>$id);
		$data['pegawai'] = $this->M_pegawai->get_pegawai_detail($where,'pegawai')->row_array();
		$data['keluargas'] = $this->M_keluarga->get_keluarga_pegawai($id,'keluarga')->result_array();
		$data['jabatans'] = $this->M_jabatan->get_jabatan($id)->result_array();

		$data['id_status'] = array();
		foreach ($data['keluargas'] as $key => $value) {
			$data['id_status'][] = $data['keluargas'][$key]['id_status'];			
		}
		$this->template->load('index','pegawai/edit_pegawai', $data);
	}

	public function update_pegawai()
	{		
		$res['pegawai'] = $this->M_pegawai->update_pegawai();
		$res['jabatan'] = $this->M_jabatan->update_jabatan_pegawai();
		if ($this->input->post('status') == 1) {
			$res['keluarga'] = $this->M_keluarga->update_keluarga_pegawai(); 
		} else {
			$res['keluarga'] = $this->M_keluarga->delete_keluarga_pegawai(); 
		}

		if ($res) {
			redirect('pegawai/detail');
		} else {
			echo "<h2> Gagal Edit Data </h2>";
		}
	}

	public function delete_pegawai($id = TRUE)
	{		
		$res['pegawai'] = $this->M_pegawai->delete_pegawai($id);

		if ($res) {
			redirect('pegawai');
		} else {
			echo "<h2> Gagal Hapus Data </h2>";
		}
	}
}
