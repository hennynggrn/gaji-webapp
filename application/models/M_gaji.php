<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gaji extends CI_Model{

	public function get_gaji()
	{

		return $this->db->get('gaji');
	}

	public function add_gaji($data)
	{
		$this->db->insert("gaji",$data);
	}

	public function detail_gaji($data)
	{
		$this->db->insert("gaji",$data);
	}

	public function get_gaji_detail($where, $table)
	{

		return $this->db->get_where($table, $where);
	}
}