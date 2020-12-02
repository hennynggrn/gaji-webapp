<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

	public function index()
	{
		$data['title']= 'Tabel Pinjaman';
		$this->template->load('index','pinjaman/table_pinjaman', $data);
	}

	public function add_pinjaman($id_pegawai = NULL)
	{
		$data['title']= 'Tambah Pinjaman';
		$data['pegawais'] = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
		$this->template->load('index','pinjaman/add_pinjaman',$data);
	}

	public function insert_pinjaman()
	{
		// $res['pinjaman'] = $this->M_pinjaman->add_pinjaman();
		// $last_id = $res['pinjaman'];
		$last_id = 7;
		// var_dump($last_id);
		$res['angsuran'] = $this->M_pinjaman->insert_pinjaman($last_id);
		var_dump($res['angsuran']);
		// $res['angsuran'] = $this->M_pinjaman->add_angsuran_pinjaman($last_id);
		
		// if ($res) {
		// 	redirect('pinjaman');
		// } else {
		// 	echo "<h2> Gagal Tambah Data Pinjaman </h2>";
		// }
	}

}

