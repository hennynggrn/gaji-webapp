<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_potongan extends CI_Model{

	public function get_potongan()
	{
		$this->db->where('id_potongan',1);
		$query = $this->db->get('potongan');
		return $query;
	}

	public function add_potongan($data)
	{
		$this->db->insert("potongan",$data);
	}
}