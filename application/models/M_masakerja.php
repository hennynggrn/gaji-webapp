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
		$nominal_mk = $this->input->post('nominal_mk');
		foreach ($id_masakerja as $i => $value) {
			$data = array(
				'nominal_mk' => $nominal_mk[$i]
			);
			$this->db->where('id_masakerja', $id_masakerja[$i]);
			$this->db->update('masakerja', $data);
		}
	}

	public function update_mk_pegawai()
	{
		$pegawai = $this->input->post('pegawai');
		$mk = $this->input->post('masa_kerja');
		$data = array(
			'masa_kerja' => $mk
		);
		$this->db->where('id_pegawai', $pegawai);
		return $this->db->update('pegawai', $data);
	}
}
