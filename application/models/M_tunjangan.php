<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tunjangan extends CI_Model{

	public function get_tunjangan()
	{
		$this->db->JOIN('pegawai','pegawai.id_pegawai = tunjangan.id_pegawai');
		 $query = $this->db->get('tunjangan');
		 return $query;
	}

	public function get_pegawai()
	{

		return $this->db->get('pegawai');
	}

	public function get_masakerja()
	{

		return $this->db->get('masakerja');
	}

	public function add_tunjangan($data)
	{
		$this->db->insert("tunjangan",$data);
	}	

	public function detail_tunjangan($data)
	{
		$this->db->insert("tunjangan",$data);
	}

	public function edit_tunjangan($data)
	{
		$this->db->JOIN('pegawai','pegawai.id_pegawai = tunjangan.id_pegawai');
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