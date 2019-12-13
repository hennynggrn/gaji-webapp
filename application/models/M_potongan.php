<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_potongan extends CI_Model{

	public function get_potongan()
	{
		return $this->db->get('potongan');
	}

	public function add_potongan($data)
	{
		$this->db->insert("potongan",$data);
	}
}