<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

	public function index()
	{
		$data['title']= 'Tabel Pinjaman';
		$this->template->load('index','pinjaman/table_pinjaman', $data);
	}

	public function table_pjm_kop()
	{
		$data['tampil']= $this->M_pinjaman->get_pjm_kop()->result_array();
		$data['pegawai']= $this->M_pinjaman->get_pegawai()->result_array();
		$this->template->load('index','pinjaman/table',$data);

		// var_dump($data['tampil']);
	}

	public function add_pjm_kop()
	{
		$data['pegawai']= $this->M_pinjaman->get_pegawai()->result();
		$this->template->load('index','pinjaman/add_pinjaman',$data);
	}

	public function add_pjm_kop_proses()
	{
		$kode_pjm_kop=$this->input->post('kode_pjm_kop');
		$total_pjm_kop=$this->input->post('total_pjm_kop');
		$jml_asr_kop=$this->input->post('jml_asr_kop');
		$start_date=$this->input->post('start_date');
		$end_date=$this->input->post('end_date');
		$ket_pjm_kop=$this->input->post('ket_pjm_kop');
		$id_pegawai=$this->input->post('id_pegawai');

		$res=$this->M_pinjaman->add_pjm_kop(array(
			'kode_pjm_kop' => $kode_pjm_kop,
			'total_pjm_kop' => $total_pjm_kop,
			'jml_asr_kop' => $jml_asr_kop,
			'start_date' => $start_date,
			'end_date' => $end_date,
			'id_pegawai' => $id_pegawai,
			'ket_pjm_kop' => $ket_pjm_kop,
			'id_pegawai' => $id_pegawai
			));
		if($res=1){
			redirect('pinjaman/table_pjm_kop');
		} else {
			echo "<h2> Gagal Tambah Data </h2>";
		}
	}

}

