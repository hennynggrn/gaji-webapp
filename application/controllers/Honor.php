<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Honor extends CI_Controller {

	// function __construct() {
	// 	parent::__construct();
	// }

	public function index($honor = NULL)
	{
		$data['title']= 'Tabel Honorium';

		$data['honors']= $this->M_honor->get_honor($honor)->result_array();
		$pegawai = array();
		foreach ($data['honors'] as $key => $value) {
			$pegawai[] = $data['honors'][$key]['pegawai'];
		}
		$explode = array();
		foreach ($pegawai as $key => $value) {
			$explode[] = explode(',', $pegawai[$key]);
		}
		$data['result'] = array();
		for ($i=0;  $i < count($explode) ; $i++) { 
			$data['result'][] = count($explode[$i]);
		}
		foreach ($data['honors'] as $key => $value) {
			$data['honors'][$key]['result'] = $data['result'][$key];
		}

		$this->template->load('index','honor/table_honor', $data);
	}

	public function detail_honor($honor = TRUE)
	{
		$data['title'] = 'Tabel Honorium Pegawai';
		if ($this->uri->segment(3) == 'null'){
			$honor = 'null';
		} else {
			$honor;
			$data['desc' ] = 'Rp. '.number_format($honor,0,',','.');
		}
		
		$data['honors'] = $this->M_honor->get_honor($honor)->result_array();
		$data['honor_val'] = $honor;

		$this->template->load('index','honor/detail_honor', $data);
		
	}

	public function edit_pegawai($id = TRUE)
	{
		$data['title'] = 'Edit Data Pegawai';
		// $data['anggota'] = $this->M_keluarga->get_keluarga($id)->row_array();
		// $id_pegawai = $data['anggota']['id_pegawai'];
		$where = array('id_pegawai' => $id);
		$data['pegawai'] = $this->M_pegawai->get_pegawai_detail($where,'pegawai')->row_array();
		$data['keluargas'] = $this->M_keluarga->get_keluarga_pegawai($id,'keluarga')->result_array();
		$data['jabatans'] = $this->M_jabatan->get_jabatan($id)->result_array();
		$data['edit_honor'] = TRUE;

		$data['id_status'] = array();
		foreach ($data['keluargas'] as $key => $value) {
			$data['id_status'][] = $data['keluargas'][$key]['id_status'];			
		}
		$data['onload'] = 'focusPegawai(this);';
		echo '<script type="text/javascript">focusPegawai(this);</script>';
		$this->template->load('index','pegawai/edit_pegawai', $data);
		
	}

	public function update_honor()
	{	
		// var_dump($_POST);
		$id = $this->input->post('id_pegawai');	
		$id_honor = $this->input->post('id_honor');	
		$honor = $this->input->post('honor');
		$detail_honor = $this->input->post('detail_honor');
		$res['honor'] = $this->M_honor->update_honor($id, $id_honor);
		
		if ($res) {
			if ((isset($detail_honor)) && ($detail_honor == 1)) {
				redirect('honor/detail/'.$honor);
			} else {
				redirect('honor');
			}
		} else {
			echo "<h2> Gagal Edit Data Honor </h2>";
		}
	}
	
	public function delete_honor($id)
	{		
		$res['honor'] = $this->M_honor->delete_honor($id);

		if ($res) {
			redirect('honor');
		} else {
			echo "<h2> Gagal Hapus Data Honor </h2>";
		}
	}

}
