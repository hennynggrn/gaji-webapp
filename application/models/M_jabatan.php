<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model{

	public function get_jabatan()
	{
		$this->db->JOIN('pegawai','pegawai.id_pegawai = jabatan.id_pegawai');
		 $query = $this->db->get('jabatan');
		 return $query;
	}

	public function get_pegawai()
	{

		return $this->db->get('pegawai');
	}

	public function get_jabatan_detail($where, $table)
	{

		return $this->db->get_where($table, $where);
	}

	public function add_jabatan($data)
	{
		$this->db->insert("jabatan",$data);
	}

	public function detail_jabatan($data)
	{
		$this->db->insert("jabatan",$data);
	}

	public function edit_jabatan($data)
	{
		$this->db->JOIN('pegawai','pegawai.id_pegawai = jabatan.id_pegawai');
		$this->db->where('jabatan.id_jabatan',$data);
		 $query = $this->db->get('jabatan');
		 return $query;
	}

	public function edit_jabatan_proses($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}