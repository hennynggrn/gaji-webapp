<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_masakerja extends CI_Model{

	public function get_masakerja()
	{
		return $this->db->get('masakerja');
	}

	public function update_masakerja()
	{
		$id_masakerja = $this->input->post('id_masakerja');
		$jml_mk = $this->input->post('jml_mk');
		foreach ($id_masakerja as $i => $value) {
			$data = array(
				'jml_mk' => $jml_mk[$i]
			);
			$this->db->where('id_masakerja', $id_masakerja[$i]);
			$this->db->update('masakerja', $data);
		}
	}
}
