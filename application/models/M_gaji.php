<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gaji extends CI_Model{

	public function get_jabatan($id_pegawai = TRUE, $jabatan_val, $detail = TRUE)
	{
		if ($detail != FALSE) {
			$this->db->select('jb.id_jabatan, jabatan, jml_jam, id_pegawai, CONCAT(jml_jam*'.$jabatan_val.') nominal_jbt');
			$this->db->join('jbt_pegawai jp', 'jp.id_jabatan = jb.id_jabatan', 'LEFT');
			return $this->db->get_where('jabatan jb', array('jp.id_pegawai' => $id_pegawai));
		} else {
			$this->db->select('jb.id_jabatan, jabatan, jml_jam, id_pegawai, COUNT(jp.id_jabatan) jml_jabatan, SUM(CONCAT(jml_jam*'.$jabatan_val.')) total_nom_jbt');
			$this->db->join('jbt_pegawai jp', 'jp.id_jabatan = jb.id_jabatan', 'LEFT');
			return $this->db->get_where('jabatan jb', array('jp.id_pegawai' => $id_pegawai));
		}
	}

	public function get_pinjaman($id_pegawai = TRUE, $kode)
	{
		switch ($kode) {
			case 'KOP':
				$this->db->select('*, count(a.id_angsuran) jml_angsuran, max(a.tanggal_kembali) end_date, 
								sum(a.status) status_ang, pjm.status status_pjm');
				$this->db->order_by('pjm.start_date', 'DESC');
				$this->db->join('angsuran a', 'a.id_pinjaman = pjm.id_pinjaman', 'LEFT');
				$this->db->join('pegawai p', 'p.id_pegawai = pjm.id_pegawai', 'LEFT');
				$this->db->group_by('pjm.id_pinjaman');
				return $this->db->get_where('pinjaman pjm', array('pjm.id_pegawai' => $id_pegawai, 'pjm.kode_pinjaman' => $kode, 'pjm.status' => 0));
				break;

			case 'BANK':
				$this->db->select('*, count(a.id_angsuran) jml_angsuran, max(a.tanggal_kembali) end_date, 
								sum(a.status) status_ang, pjm.status status_pjm');
				$this->db->order_by('pjm.start_date', 'DESC');
				$this->db->join('angsuran a', 'a.id_pinjaman = pjm.id_pinjaman', 'LEFT');
				$this->db->join('pegawai p', 'p.id_pegawai = pjm.id_pegawai', 'LEFT');
				$this->db->group_by('pjm.id_pinjaman');
				return $this->db->get_where('pinjaman pjm', array('pjm.id_pegawai' => $id_pegawai, 'pjm.kode_pinjaman' => $kode, 'pjm.status' => 0));
				break;
		}
	}

	public function get_angsuran($id_pinjaman, $kode)
	{
		switch ($kode) {
			case 'KOP':
				$this->db->select('*');
				$this->db->order_by('tanggal_kembali');
				return $this->db->get_where('angsuran a', array('a.id_pinjaman' => $id_pinjaman));
				break;

			case 'BANK':
				$this->db->select('*');
				$this->db->order_by('tanggal_kembali');
				return $this->db->get_where('angsuran a', array('a.id_pinjaman' => $id_pinjaman));
				break;
		}
	}

	public function get_keluarga($id_pegawai)
	{
		$this->db->select('k.*');
		$this->db->order_by('id_status', 'ASC');
		$this->db->join('pegawai p','p.id_pegawai = k.id_pegawai', 'LEFT');
		return $this->db->get_where('keluarga k', array('k.id_pegawai' => $id_pegawai));
	}
}
