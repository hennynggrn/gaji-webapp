<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

	public function index($id = NULL)
	{
		$data['title']= 'Tabel Pinjaman';

		$data['pinjamans'] = $this->M_pinjaman->get_pinjaman($id)->result_array();
		var_dump($data['pinjamans']);
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
		$res['pinjaman'] = $this->M_pinjaman->add_pinjaman();
		$last_id = $res['pinjaman'];
		$res['angsuran'] = $this->M_pinjaman->add_angsuran_pinjaman($last_id);

		if ($res) {
			redirect('pinjaman');
		} else {
			echo "<h2> Gagal Tambah Data Pinjaman </h2>";
		}
	}

	public function detail_pinjaman($id = TRUE)
	{
		$data['title'] = 'Detail Pinjaman';

		$data['pinjamans'] = $this->M_pinjaman->get_pinjaman($id)->result_array();
		$data['angsurans'] = $this->M_pinjaman->get_angsuran($id)->result_array();
		var_dump($data['angsurans']);
		$this->template->load('index','pinjaman/detail_pinjaman', $data);
	}

	public function update_repay()
	{
		$res['angsuran'] = $this->M_pinjaman->update_repay();
		$id_pinjaman = $this->input->post('id_pinjaman');
		
		if ($res) {
			redirect('pinjaman/detail/'.$id_pinjaman);
		} else {
			echo "<h2> Gagal Tambah Data Pinjaman </h2>";
		}
	}

	public function edit_pinjaman($id_pegawai)
	{
		$data['title']= 'Edit Pinjaman';

		$data['pegawais'] = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();

		$this->template->load('index','pinjaman/edit_pinjaman', $data);
	}
}

