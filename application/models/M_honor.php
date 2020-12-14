<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_honor extends CI_Model{

	public function get_honor($honor = TRUE)
	{
		if ($honor != NULL) {
			if ($honor == 'null') {
				$this->db->select('p.*, GROUP_CONCAT(DISTINCT jbt.jabatan) jbt_list, 
								   GROUP_CONCAT(DISTINCT CONCAT(jbt.jabatan, "</span>&nbsp;<span>") ORDER BY p.nama SEPARATOR "</span>&nbsp;<span>") as result_list');
				$this->db->join('jbt_pegawai jp', 'jp.id_pegawai = p.id_pegawai', 'LEFT');
				$this->db->join('jabatan jbt', 'jbt.id_jabatan = jp.id_jabatan', 'LEFT');
				$this->db->group_by('p.id_pegawai');
				return $this->db->get_where('pegawai p', array('p.honor' => NULL));
			} else {
				$this->db->select('p.*, GROUP_CONCAT(DISTINCT jbt.jabatan) jbt_list, 
								   GROUP_CONCAT(DISTINCT CONCAT(jbt.jabatan, "</span>&nbsp;<span>") ORDER BY p.nama SEPARATOR "</span>&nbsp;<span>") as result_list');
				$this->db->join('jbt_pegawai jp', 'jp.id_pegawai = p.id_pegawai', 'LEFT');
				$this->db->join('jabatan jbt', 'jbt.id_jabatan = jp.id_jabatan', 'LEFT');
				$this->db->group_by('p.id_pegawai');
				return $this->db->get_where('pegawai p', array('p.honor' => $honor));
			}
		} else {
			$this->db->select('p.honor, p.status_pegawai, p.id_pegawai, GROUP_CONCAT(DISTINCT p.id_pegawai) pegawai,
							   GROUP_CONCAT(DISTINCT jbt.jabatan) jbt_list,
							   GROUP_CONCAT(DISTINCT CONCAT(jbt.jabatan, "</span>&nbsp;<span>") ORDER BY p.nama SEPARATOR "</span>&nbsp;<span>") as result_list');
			$this->db->order_by('p.honor', 'DESC');
			$this->db->join('jbt_pegawai jp', 'jp.id_pegawai = p.id_pegawai', 'LEFT');
			$this->db->join('jabatan jbt', 'jbt.id_jabatan = jp.id_jabatan', 'LEFT');
			$this->db->group_by('honor');
			return $this->db->get('pegawai p');
			// echo 'wrong';
		}
	}

	public function update_honor($id, $id_honor)
	{
		$honor = $this->input->post('honor');
		if ($id_honor != NULL) {
			$this->db->where('honor', $id_honor);
			return $this->db->update('pegawai', array('honor' => $honor));
		} else {
			$this->db->where('id_pegawai', $id);
			return $this->db->update('pegawai', array('honor' => $honor));
		}
		
		
	}

	public function delete_honor($id)
	{
		$honor = 0;
		$this->db->where('id_pegawai', $id);
		return $this->db->update('pegawai', array('honor' => $honor));
	}

}
