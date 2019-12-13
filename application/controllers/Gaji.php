<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function index()
	{
		$this->template->load('index','gaji/tabel');
	}

	public function table()
	{
		$this->load->model('M_gaji');
		$data['tampil']= $this->M_gaji->get_gaji()->result_array();
		$data['tahun'] = $this->M_tahun->get_tahun()->result_array();
		$this->template->load('index','gaji/table',$data);
	}

	public function detail_gaji()
	{
		$this->load->model('M_gaji');
		$where = array('id_gaji');
		$data['lihat']= $this->M_gaji->get_gaji_detail($where,'gaji')->result();
		$this->template->load('index','gaji/detail_gaji',$data);
	}

	  public function laporan_surat()
	  {
	    $id_kategori = $this->input->post('id_kategori');
	    if ($id_kategori==1){
	      $data['status'] = 'MASUK';
	    } else {
	      $data['status'] = 'KELUAR';
	    }
	    
		$id_tahun = $this->input->post('id_tahun');
	    $urutan = $this->input->post('urutan');
	    if ($this->input->post('bulan')==0){
	      $data['surat'] = $this->m_surat->get_surat($id_kategori,$id_tahun,$urutan)->result_array();
	    } else{
	      $bulan = $this->input->post('bulan');
	      $data['surat'] = $this->m_surat->get_surat($id_kategori,$id_tahun,$urutan,$bulan)->result_array();
	    }
	    $this->load->view('laporan_surat',$data);
	  }
	
}
