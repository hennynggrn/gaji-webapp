<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakerja extends CI_Controller {

	public function index()
	{
		$this->template->load('index','masakerja/tabel_mk');
	}

	public function table()
	{
		$this->load->model('M_masakerja');
		$data['pegawai']= $this->M_masakerja->get_pegawai()->result_array();
		// $data['tampil']= $this->M_masakerja->get_masakerja()->result_array();
		$this->template->load('index','masakerja/table_mk',$data);

		// var_dump($data['pegawai']);
	}

	public function detail_masakerja()
	{
		$this->load->model('M_masakerja');
		$where = array('id_masakerja');
		$data['lihat']= $this->M_masakerja->get_masakerja_detail($where,'masakerja')->result();
		$this->template->load('index','masakerja/detail_masakerja',$data);
	}

	public  function kirim_form()
	{
		if(isset($_POST['formMKSubmit']) && !empty($_POST['nama'])){
		    // data form yang dikirimkan
		    $nama   = $_POST['nama'];
		    // $email  
		    echo $status;die;
		}
	}
	
}
