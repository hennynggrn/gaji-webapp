<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pinjaman extends CI_Model{ 

	public function add_pinjaman()
	{
		$pegawai = $this->input->post('pegawai');
		$kode = $this->input->post('kode');
		$tgl_pjm = $this->input->post('tgl_pjm');
		$total_pjm = $this->input->post('total_pjm');
		$jml_angsuran = $this->input->post('jml_angsuran');
		$ket_pjm = $this->input->post('ket_pjm');
		// var_dump($_POST);
		$data = array(
			'id_pegawai' => $pegawai,
			'kode_pinjaman' => $kode,
			'start_date' => $tgl_pjm,
			'total_pinjaman' => $total_pjm,
			'jml_angsuran' => $jml_angsuran,
			'ket_pinjaman' => $ket_pjm,
			'status_pinjaman' => '0'
		);
		$this->db->insert("pinjaman", $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function add_angsuran_pinjaman($last_id)
	{
		$ids = $this->input->post('ids');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$nominal = $this->input->post('nominal');
		$no = 1;
		foreach ($ids as $i => $value) {
			$data = array(
				'id_pinjaman' => $last_id,
				'no_angsuran' => $no++,
				'tanggal_kembali' => $tgl_kembali[$i],
				'nominal' => $nominal[$i],
				'status' => '0'
			);
			$this->db->insert("angsuran", $data);
		}
	}

	public function insert_pinjaman($last_id){
		return $this->db->get_where('angsuran', array('id_pinjaman' => $last_id))->result_array();
	}
}
