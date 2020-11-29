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
		$data['desc' ] = 'Rp. '.number_format($honor,0,',','.');

		$data['honors'] = $this->M_honor->get_honor($honor)->result_array();
		$data['honor_val'] = $data['honors'][0]['honor'];
		// var_dump($data['honors']);

		$this->template->load('index','honor/detail_honor', $data);
		
	}

	public function update_honor()
	{	
		$id = $this->input->post('id_pegawai');	
		$id_honor = $this->input->post('id_honor');	
		$honor = $this->input->post('honor');
		$res['honor'] = $this->M_honor->update_honor($id, $id_honor);
		
		if ($res) {
			redirect('honor');
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
