<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {

	public function index($id = NULL)
	{
		$data['title']= 'Tabel Anggota Keluarga Pegawai';
		
		$data['keluargas']= $this->M_keluarga->get_keluarga($id)->result_array();
		$this->template->load('index','keluarga/table_keluarga',$data);
	}

	public function update_keluarga()
	{
		$id = $this->input->post('id_anggota_klg');
		$res['keluarga']= $this->M_keluarga->update_keluarga();
		if ($res) {
			redirect('keluarga');
		} else {
			echo "<h2> Gagal Edit Data Anggota Keluarga </h2>";
		}
	}

	public function detail_keluarga($id = TRUE)
	{
		$data['anggota'] = $this->M_keluarga->get_keluarga($id)->row_array();
		$id_pegawai = $data['anggota']['id_pegawai'];
		$data['pegawai'] = $this->M_pegawai->get_pegawai($id_pegawai)->row_array();
		$data['keluargas'] = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
		$data['id_keluarga'] = $id;
		$data['title'] = 'Detail Anggota Keluarga';
		$data['desc'] = $data['anggota']['nama'];
		$this->template->load('index','keluarga/detail_keluarga', $data);
	}
	
	public function edit_keluarga($id)
	{
		$data['title'] = 'Edit Keluarga Pegawai';
		$data['anggota'] = $this->M_keluarga->get_keluarga($id)->row_array();
		$id_pegawai = $data['anggota']['id_pegawai'];
		$where = array('id_pegawai' => $id_pegawai);
		$data['pegawai'] = $this->M_pegawai->get_pegawai_detail($where,'pegawai')->row_array();
		$data['keluargas'] = $this->M_keluarga->get_keluarga_pegawai($id_pegawai,'keluarga')->result_array();
		$data['jabatans'] = $this->M_jabatan->get_jabatan($id_pegawai)->result_array();
		$data['id_anggota_keluarga'] = $id;

		$data['id_status'] = array();
		foreach ($data['keluargas'] as $key => $value) {
			$data['id_status'][] = $data['keluargas'][$key]['id_status'];			
		}
		$this->template->load('index','pegawai/edit_pegawai', $data);
	}
	
}
