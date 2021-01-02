<?php

class M_setting extends CI_Model
{
	public function get_data()
	{
		return $this->db->get_where('setting', array('id' => 1));
	}

	public function updated_data()
	{
		$data = array(
			'backup_date' => $this->input->post('date'),
			'updated_by' => $this->session->userdata('user_id')
		);
		$this->db->where('id', 1);
		return $this->db->update('setting', $data);
	}

}

?>
