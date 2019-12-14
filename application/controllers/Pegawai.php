<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function index()
	{
		$this->template->load('index','pegawai/table_pegawai');
	}

	public function table_pegawai()
	{
		$this->load->model('M_pegawai');
		$data['tampil']= $this->M_pegawai->get_pegawai()->result_array();
		$this->template->load('index','pegawai/table_pegawai',$data);
	}

	public function add_pegawai()
	{
		$this->load->model('M_pegawai');
		$data['id_pgw']= $this->M_pegawai->get_id_pegawai()->row_array();
		$data['id_pegawai']= $data['id_pgw']['id_pegawai'];
		$data['jabatan']= $this->M_pegawai->get_jabatan()->result();
		$data['status_pgw']= $this->M_pegawai->get_status_pgw()->result();
		$this->template->load('index','pegawai/add_pegawai',$data);
		// var_dump($data['id_pegawai']);
	}

	public function add_pegawai_proses()
	{
		var_dump($_POST);

		$this->load->model('M_pegawai');
		$config['upload_path'] = 'assets/img/foto_pegawai';
		$config['allowed_types'] = 'jpeg|jpg|gif|png';
		$config['max_size'] = 100000*1024;
		$config['max_width'] = 2000;
		$config['max_height'] = 2000;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$errors = array('error' => $this->upload->display_errors());
			$upload_foto = 'noimage.png';
		}else {
			$data = array('upload_data' => $this->upload->data());
			$upload_foto = $_FILES['foto']['name'];
		}

		$res['pegawai']=$this->M_pegawai->add_pegawai($upload_foto);
		$res['jabatan']=$this->M_pegawai->add_jabatan();
		if($this->input->post('status') == 1) {
			$res['keluarga']=$this->M_pegawai->add_keluarga(); };

		if($res){
			redirect('pegawai/table_pegawai');
		} else {
			echo "<h2> Gagal Tambah Data </h2>";
		}
	}
		
	public function detail_pegawai($id)
	{
		$this->load->model('M_pegawai');
		$where = array('id_pegawai'=>$id);
		$data['lihat']= $this->M_pegawai->get_pegawai_detail($where,'pegawai')->result();
		$this->template->load('index','pegawai/detail_pegawai',$data);
	}
}
