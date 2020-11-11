<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_honor extends CI_Model{

	public function get_honor()
	{
		return $this->db->get('honor');
	}

	public function get_honor_detail($where, $table)
	{

		return $this->db->get_where($table, $where);
	}

	public function add_honor($data)
	{
		$this->db->insert("honor",$data);
	}

	public function edit_honor($data)
	{
		$this->db->where('id_honor',$data);
		 $query = $this->db->get('honor');
		 return $query;
	}

	public function edit_honor_proses($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}