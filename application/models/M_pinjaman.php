<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pinjaman extends CI_Model{ 

	public function get_pinjaman($id = TRUE)
	{
		if ($id != NULL) {
			$this->db->select('*');
			$this->db->join('angsuran a', 'a.id_pinjaman = pjm.id_pinjaman', 'LEFT');
			$this->db->join('pegawai p', 'p.id_pegawai = pjm.id_pegawai', 'LEFT');
			$this->db->group_by('pjm.id_pinjaman');
			return $this->db->get_where('pinjaman pjm', array('pjm.id_pinjaman' => $id));
		} else {
			$this->db->select('*');
			$this->db->join('angsuran a', 'a.id_pinjaman = pjm.id_pinjaman', 'LEFT');
			$this->db->join('pegawai p', 'p.id_pegawai = pjm.id_pegawai', 'LEFT');
			$this->db->group_by('pjm.id_pinjaman');
			return $this->db->get('pinjaman pjm');
		}
	}

	public function get_angsuran($id = TRUE)
	{
		$this->db->select('*');
		$this->db->order_by('a.no_angsuran');
		return $this->db->get_where('angsuran a', array('a.id_pinjaman' => $id));
		
	}
	
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

	// private function update_rest_pinjaman($last_id){
	// 	$this->db->select('max(tanggal_kembali) end_date');
	// 	$end_date = $this->db->get_where('angsuran', array('id_pinjaman' => $last_id))->result_array();
	// 	$result = $this->db->get_where('angsuran', array('id_pinjaman' => $last_id))->result_array();
	// 	$jml_angsuran = count($result);
	// 	$data = array(
	// 		'end_date' => $end_date[0]['end_date'],
	// 		'jml_angsuran' => $jml_angsuran
	// 	);
	// 	$this->db->where('id_pinjaman', $last_id);
	// 	return $this->db->update('pinjaman', $data);
	// }

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
			return $this->db->insert("angsuran", $data);
		}
	}

	public function update_repay()
	{
		$repay = $this->input->post('repay');
		$id_angsuran = $this->input->post('id_angsuran');
		
		$this->db->where('id_angsuran', $id_angsuran);
		return $this->db->update('angsuran', array('status' => $repay));
	}
}
