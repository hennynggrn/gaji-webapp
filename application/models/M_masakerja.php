<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_masakerja extends CI_Model{

	public function get_pegawai()
	{
		$this->db->SELECT('p.*,sp.ket, mk.jml_mk');
		$this->db->order_by('nama');
		$this->db->JOIN('status_pgw sp','sp.id_status = p.id_status');
		$this->db->JOIN('masakerja mk','mk.id_pegawai = p.id_pegawai', 'LEFT OUTER');
		return $this->db->get('pegawai p');
	}

	public function get_masakerja()
	{

		return $this->db->get('masakerja');
	}

	public function add_masakerja($data)
	{
		$this->db->insert("masakerja",$data);
	}

	public function detail_masakerja($data)
	{
		$this->db->insert("masakerja",$data);
	}

	public function get_masakerja_detail($where, $table)
	{

		return $this->db->get_where($table, $where);
	}
}