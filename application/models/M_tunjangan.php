<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tunjangan extends CI_Model{

	public function get_tunjangan()
	{
		$this->db->where('id_tunjangan', 1);
		return $this->db->get('tunjangan');
	}

	public function update_tunjangan()
	{
		$beras = $this->input->post('beras');
		$jamsostek = $this->input->post('jamsostek');
		$psg = $this->input->post('klg_psg');
		$klg_psg = $psg/(100);
		$anak = $this->input->post('klg_anak');
		$klg_anak = $anak/(100);
		$jabatan = $this->input->post('jabatan');

		$data = array(
			'beras' => $beras,
			'jamsostek' => $jamsostek,
			'klg_psg' => $klg_psg,
			'klg_anak' => $klg_anak,
			'jabatan' => $jabatan,
		);

		$this->db->where('id_tunjangan', 1);
		return $this->db->update('tunjangan', $data);
	}
}
