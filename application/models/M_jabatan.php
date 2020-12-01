<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model{

	public function get_jabatan($id = TRUE)
	{
		if ($id != NULL) {
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
		$this->db->select('jbt.id_jabatan, jabatan, jml_jam, id_pegawai');
		$this->db->join('jbt_pegawai jp', 'jp.id_jabatan = jbt.id_jabatan', 'LEFT');
		return $this->db->get_where('jabatan jbt', array('id_pegawai' => $id));
	}

	public function get_jabatan_pegawai_selected($id = TRUE)
	{
		$this->db->select(' p.*, jbt.id_jabatan, jabatan, jml_jam');
		$this->db->join('jbt_pegawai jp', 'jp.id_pegawai = p.id_pegawai AND jp.id_jabatan ='.$id, 'LEFT');
		$this->db->join('jabatan jbt', 'jbt.id_jabatan = jp.id_jabatan', 'LEFT');
		return $this->db->get('pegawai p');
	}

	public function get_jabatan_detail($id = TRUE)
	{
		$this->db->select('*');
		return $this->db->get_where('jabatan', array('id_jabatan' => $id));
	}

	public function get_pegawai_jabatan($id = TRUE)
	{
		$this->db->select('p.*, jbt.*, GROUP_CONCAT(CONCAT(if(jp.id_jabatan='.$id.',jp.id_jabatan,"")) SEPARATOR "") jbt_id,
						   GROUP_CONCAT(DISTINCT CONCAT(jbt.jabatan, "</span>&nbsp;<span>") ORDER BY p.nama SEPARATOR "</span>&nbsp;<span>") as result_list');
		$this->db->order_by('p.nama');
		$this->db->join('jbt_pegawai jp', 'jp.id_jabatan = jbt.id_jabatan', 'LEFT');
		$this->db->join('pegawai p', 'p.id_pegawai = jp.id_pegawai', 'LEFT');
		$this->db->group_by('jp.id_pegawai');
		return $this->db->get('jabatan jbt');
		
// 		SELECT p.nama, p.id_pegawai, jp.*, jbt.*,
// 	 GROUP_CONCAT(DISTINCT CONCAT(jp.id_jabatan, "</span>&nbsp;<span>") ORDER BY p.nama SEPARATOR "</span>&nbsp;<span>") as result_list

// FROM jabatan jbt
// LEFT JOIN jbt_pegawai jp ON jp.id_jabatan = jbt.id_jabatan
// LEFT JOIN pegawai p ON jp.id_pegawai = p.id_pegawai

// GROUP BY jp.id_pegawai

	}
	public function add_jabatan()
	{
		$jabatan = $this->input->post('jabatan');
		$jml_jam = $this->input->post('jml_jam');

		$data = array(
			'jabatan' => $jabatan,
			'jml_jam' => $jml_jam
		);
		$this->db->insert("jabatan", $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function add_jabatan_pegawai($last_id)
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

	public function add_pegawai_jabatan($last_id)
	{
		$id_pegawai = $this->input->post('id_pegawai');

		foreach ($id_pegawai as $i => $value) {
			$data = array(
				'id_pegawai' => $id_pegawai[$i],
				'id_jabatan' => $last_id
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

	public function update_jabatan()
	{
		
		$id_jabatan = $this->input->post('id_jabatan');
		$jabatan = $this->input->post('jabatan');
		$jml_jam = $this->input->post('jml_jam');

		$data = array(
			'jabatan' => $jabatan,
			'jml_jam' => $jml_jam
		);
		$this->db->where("id_jabatan", $id_jabatan);
		return $this->db->update("jabatan", $data);
	}

	public function update_pegawai_jabatan()
	{
		$id_jabatan = $this->input->post('id_jabatan');
		$id_pegawai = $this->input->post('id_pegawai');
		
		$pegawai = $this->db->get_where('jbt_pegawai', array('id_jabatan' => $id_jabatan))->result_array();
		$old_pegawai = array();
		foreach ($pegawai as $key => $value) {
			$old_pegawai[] = $pegawai[$key]['id_pegawai'];
		}
		$add_list = array_diff($id_pegawai, $old_pegawai);
		$del_list = array_diff($old_pegawai, $id_pegawai);

		// add new pegawai
		foreach ($add_list as $i => $value) {
			$data = array(
				'id_pegawai' => $id_pegawai[$i],
				'id_jabatan' => $id_jabatan
			);
			$this->db->insert("jbt_pegawai", $data);
		}
		
		// delete pegawai
		foreach ($del_list as $i => $value) {
			$this->db->where("id_pegawai", $del_list[$i]);
			$this->db->where("id_jabatan", $id_jabatan);
			$this->db->delete("jbt_pegawai");
		}
	}

	public function delete_jabatan($id)
	{
		$this->db->where('id_jabatan', $id);
		return $this->db->delete('jabatan');
	}
}
