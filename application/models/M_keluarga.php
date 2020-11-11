<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keluarga extends CI_Model{

	public function get_keluarga()
	{
		$this->db->SELECT('k.*, k.id_keluarga id, k.nama nama_anggota, sk.*, p.*');
		$this->db->ORDER_BY('p.id_pegawai');
		$this->db->ORDER_BY('sk.id_status');
		$this->db->JOIN('pegawai p','p.id_pegawai = k.id_pegawai', 'RIGHT');
		$this->db->JOIN('status_klg sk','sk.id_status = k.id_status', 'RIGHT');
		 $query = $this->db->get('keluarga k');
		 return $query;
	}

	public function get_pegawai()
	{

		return $this->db->get('pegawai');
	}

	public function get_keluarga_detail($where, $table)
	{

		return $this->db->get_where($table, $where);
	}

	public function add_keluarga($data)
	{
		$this->db->insert("keluarga",$data);
	}

	public function detail_keluarga($data)
	{
		$this->db->insert("keluarga",$data);
	}

	public function edit_keluarga($data)
	{
		$this->db->SELECT('k.*, k.nama nama_pasangan, p.*');
		$this->db->JOIN('pegawai p','p.id_pegawai = k.id_pegawai','LEFT');
		$this->db->where('k.id_keluarga',$data);
		 $query = $this->db->get('keluarga k');
		 // var_dump($data);
		 return $query;
	}

	public function edit_keluarga_proses($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}