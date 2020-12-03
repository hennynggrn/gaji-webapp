<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keluarga extends CI_Model{

	public function get_keluarga($id = TRUE)
	{
		if ($id == TRUE) {
			return $this->db->get_where('keluarga', array('id_anggota_klg' => $id));
		} else {
			$this->db->SELECT('k.*, p.nama nama_pegawai, p.gender gender_pegawai');
			$this->db->ORDER_BY('k.nama');
			$this->db->JOIN('pegawai p','p.id_pegawai = k.id_pegawai', 'LEFT');
			return $this->db->get('keluarga k');
		}
	}
	
	 public function get_keluarga_pegawai($id, $table)
	{
		$this->db->order_by('id_status', 'ASC');
		return $this->db->get_where($table, array('id_pegawai'=>$id));
	}

	public function get_anggota_keluarga($id_pegawai)
	{
		$this->db->SELECT('k.*, p.nama nama_pegawai, p.gender gender_pegawai');
		$this->db->ORDER_BY('k.id_status');
		$this->db->JOIN('pegawai p','p.id_pegawai = k.id_pegawai', 'LEFT OUTER');
		return $this->db->get_where('keluarga k', array('k.id_pegawai' => $id_pegawai));
	}

	public function add_keluarga()
	{
		$id_pegawai=$this->input->post('id_pegawai');
		$id_status=$this->input->post('anggota');
		$nama_anggota=$this->input->post('nama_anggota');
		$s_hidup_anggota=$this->input->post('s_hidup_anggota');
		$gender_anggota=$this->input->post('gender_anggota');

		for ($i=0; $i <= 2 ; $i++) {
			if (!empty($id_status[$i] && $nama_anggota[$i])) {
				$data = array(
					'id_pegawai' => $id_pegawai,
					'id_status' => $id_status[$i],
					'nama' => $nama_anggota[$i],
					's_hidup' => $s_hidup_anggota[$i],
					'gender' => $gender_anggota[$i]
				);
				$this->db->insert("keluarga",$data);
			}
		}
	}

	private function update_old_klg()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$id_anggota_klg = $this->input->post('id_anggota_klg');
		$id_status = $this->input->post('anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$s_hidup_anggota = $this->input->post('s_hidup_anggota');
		$gender_anggota = $this->input->post('gender_anggota');
		// update keluarga yang sudah terdaftar
		if (!empty($id_anggota_klg)) {
			foreach ($id_anggota_klg as $i => $value) {
				if ((!empty($id_anggota_klg[$i])) && ($nama_anggota[$i] != NULL)) {
					$data = array(
						'nama' => $nama_anggota[$i],
						's_hidup' => $s_hidup_anggota[$i],
						'gender' => $gender_anggota[$i]
					);
					$this->db->where('id_pegawai', $id_pegawai);
					// $this->db->where('id_anggota_klg' != NULL);
					$this->db->update('keluarga', $data, array('id_anggota_klg' => $id_anggota_klg[$i]));
				}
			}
		} else {
			foreach ($nama_anggota as $i => $value) {
				if (!empty($id_status[$i] && $nama_anggota[$i])) {
					$data = array(
						'id_pegawai' => $id_pegawai,
						'id_status' => $id_status[$i],
						'nama' => $nama_anggota[$i],
						's_hidup' => $s_hidup_anggota[$i],
						'gender' => $gender_anggota[$i]
					);
					return $this->db->insert("keluarga", $data);
				}
			}
		}
	}

	private function add_new_klg()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$id_anggota_klg = $this->input->post('id_anggota_klg');
		$id_status = $this->input->post('anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$s_hidup_anggota = $this->input->post('s_hidup_anggota');
		$gender_anggota = $this->input->post('gender_anggota');

		// tambah anggota baru
		// check dulu siapa yang sudah ada 
		$keluarga = $this->db->get_where('keluarga k', array('id_pegawai' => $id_pegawai))->result_array();
		$old_id_status = array();
		foreach ($keluarga as $key => $value) {
			$old_id_status[] = $keluarga[$key]['id_status'];			
		}
		$deff = array_diff($id_status, $old_id_status);

		foreach ($deff as $i => $value) {
			if ((!empty($id_anggota_klg[$i])) || ((isset($nama_anggota[$i])) && ($nama_anggota[$i] != NULL))) {
				$data = array(
					'id_pegawai' => $id_pegawai,
					'id_status' => $id_status[$i],
					'nama' => $nama_anggota[$i],
					's_hidup' => $s_hidup_anggota[$i],
					'gender' => $gender_anggota[$i]
				);
				return $this->db->insert('keluarga', $data);
			}
		}
	}

	private function del_old_klg()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$id_anggota_klg = $this->input->post('id_anggota_klg');
		$id_status = $this->input->post('anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$s_hidup_anggota = $this->input->post('s_hidup_anggota');
		$gender_anggota = $this->input->post('gender_anggota');

		foreach ($nama_anggota as $i => $value) {
			if ((($nama_anggota[$i] == NULL) || (empty($nama_anggota[$i]))) && !empty($id_anggota_klg[$i])) {
				$this->db->where('id_anggota_klg', $id_anggota_klg[$i]);
				return $this->db->delete('keluarga');
			}
		}
	}
	
	public function update_keluarga_pegawai()
	{		
		$res['old'] = $this->update_old_klg();
		$res['new'] = $this->add_new_klg();
		$res['del'] = $this->del_old_klg();
		return $res;
	}

	public function update_keluarga()
	{		
		$id_anggota = $this->input->post('id_anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$s_hidup_anggota = $this->input->post('s_hidup_anggota');
		$data = array(
			'nama' => $nama_anggota,
			's_hidup' => $s_hidup_anggota,
		);
		$this->db->where('id_anggota_klg', $id_anggota);
		return $this->db->update('keluarga', $data);
	}

	public function delete_keluarga_pegawai()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$status = $this->input->post('status');
		if ($status == 0) {
			$this->db->where('id_pegawai', $id_pegawai);
			return $this->db->delete('keluarga');
		}
	}
}


