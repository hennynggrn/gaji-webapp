<?php
	class  M_user extends CI_Model
	{
		public function get_user()
		{
			$this->db->select('*, u.id');
			$this->db->order_by('fullname');
			$this->db->join('user_level ul', 'ul.id = u.level_id', 'LEFT');
			return $this->db->get('users u');
		}
	}
	
?>
