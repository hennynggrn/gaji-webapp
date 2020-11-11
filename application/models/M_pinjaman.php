<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pinjaman extends CI_Model{

	public function get_pjm_kop()
	{
		$this->db->SELECT('pk.*,p.*');
		$this->db->JOIN('pegawai p','p.id_pegawai = pk.id_pegawai');
		return $this->db->get('pjm_kop pk');
	}

	public function get_pjm_bank()
	{
		return $this->db->get('pjm_bank');
	}
	public function get_angsuran()
	{
		return $this->db->get('angsuran');
	}

	public function get_pegawai()
	{

		return $this->db->get('pegawai');
	}

	public function add_pjm_kop($data)
	{
		$this->db->insert("pjm_kop",$data);
	}

	public function get_pinjaman_detail($where, $table)
	{

		return $this->db->get_where($table, $where);
	}
}