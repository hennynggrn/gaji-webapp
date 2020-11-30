<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model{

	public function get_jabatan($id = TRUE)
	{
		if ($id == TRUE) {
			$this->db->select('jb.id_jabatan, jabatan, jml_jam, id_pegawai');
			$this->db->join('jbt_pegawai jp', 'jp.id_jabatan = jb.id_jabatan AND jp.id_pegawai ='.$id, 'LEFT OUTER');
			return $this->db->get('jabatan jb');
		} else{
			$this->db->select('jbt.*, p.id_pegawai, GROUP_CONCAT(DISTINCT p.id_pegawai) pegawai, GROUP_CONCAT(DISTINCT jbt.jabatan) jbt_list');
			$this->db->order_by('jbt.id_jabatan', 'ASC');
			$this->db->join('jbt_pegawai jp', 'jp.id_jabatan = jbt.id_jabatan', 'LEFT');
			$this->db->join('pegawai p', 'p.id_pegawai = jp.id_pegawai', 'LEFT');
			$this->db->group_by('jbt.jabatan');
			return $this->db->get('jabatan jbt');
		}
	}

	public function get_jabatan_pegawai($id = TRUE)
	{
		$this->db->SELECT('jb.id_jabatan, jabatan, jml_jam, id_pegawai');
		$this->db->JOIN('jbt_pegawai jp', 'jp.id_jabatan = jb.id_jabatan', 'LEFT');
		return $this->db->get_where('jabatan jb', array('id_pegawai' => $id));
	}

	public function add_jabatan()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$id_jabatan = $this->input->post('jabatan');

		foreach ($id_jabatan as $i => $value) {
			$data = array(
				'id_pegawai' => $id_pegawai,
				'id_jabatan' => $id_jabatan[$i]
			);
			$this->db->insert("jbt_pegawai", $data);
		}
	}

	public function update_jabatan_pegawai()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$id_jabatan = $this->input->post('jabatan');

		// var_dump($_POST);
		
		$jabatan = $this->db->get_where('jbt_pegawai', array('id_pegawai' => $id_pegawai))->result_array();
		$old_jabatan = array();
		foreach ($jabatan as $key => $value) {
			$old_jabatan[] = $jabatan[$key]['id_jabatan'];
		}
		$add_list = array_diff($id_jabatan, $old_jabatan);
		$del_list = array_diff($old_jabatan, $id_jabatan);
		// var_dump($add_list);
		// var_dump($del_list);
		// add
		foreach ($add_list as $i => $value) {
			$data = array(
				'id_pegawai' => $id_pegawai,
				'id_jabatan' => $id_jabatan[$i]
			);
			$this->db->insert("jbt_pegawai", $data);
		}
		
		// del
		foreach ($del_list as $i => $value) {
			$this->db->where("id_pegawai", $id_pegawai);
			$this->db->where("id_jabatan", $del_list[$i]);
			$this->db->delete("jbt_pegawai");
		}

	}





	// public function get_pegawai()
	// {
		
	// 	return $this->db->get('pegawai');
	// }

	// public function get_jabatan_detail($where, $table)
	// {

	// 	return $this->db->get_where($table, $where);
	// }

	

	// public function detail_jabatan($data)
	// {
	// 	$this->db->insert("jabatan",$data);
	// }

	// public function edit_jabatan($data)
	// {
	// 	$this->db->where('jabatan.id_jabatan',$data);
	// 	 $query = $this->db->get('jabatan');
	// 	 return $query;
	// }

	// public function edit_jabatan_proses($where, $data, $table)
	// {
	// 	$this->db->where($where);
	// 	$this->db->update($table,$data);
	// }

}
