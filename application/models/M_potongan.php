<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_potongan extends CI_Model{

	public function get_potongan()
	{
		return $this->db->get_where('potongan', array('id_potongan' => 1));
	}

	public function update_potongan()
	{
		$infaq = $this->input->post('infaq');
		$sosial = $this->input->post('sosial');
		$aisiyah = $this->input->post('aisiyah');
		$jsr = $this->input->post('jsr');
		$jamsostek = $this->input->post('jamsostek');
		$ket = $this->input->post('ket');

		$data = array(
			'infaq' => $infaq,
			'sosial' => $sosial,
			'aisiyah' => $aisiyah,
			'jsr' => $jsr,
			'jamsostek' => $jamsostek,
			'ket' => $ket
		);

		$this->db->where('id_potongan', 1);
		return $this->db->update('potongan', $data);
	}
} 
