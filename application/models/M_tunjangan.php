<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tunjangan extends CI_Model{

	public function get_tunjangan()
	{
		$this->db->where('id_tunjangan',1);
		$query = $this->db->get('tunjangan');
		return $query;
	}

	public function get_masakerja()
	{

		return $this->db->get('masakerja');
	}

	public function edit_tunjangan($data)
	{
		$this->db->where('id_tunjangan',$data);
		 $query = $this->db->get('tunjangan');
		 return $query;
	}

	public function edit_tunjangan_proses($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}