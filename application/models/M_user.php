<?php
	class  M_user extends CI_Model 
	{
		public function get_user($user_id = TRUE)
		{
			if ($user_id != NULL) {
				$this->db->select('*, u.id, u.email, u.id_pegawai, u.created_at, p.foto,
							   GROUP_CONCAT(DISTINCT CONCAT(jbt.jabatan, "</span>&nbsp;<span>") ORDER BY p.nama SEPARATOR "</span>&nbsp;<span>") as result_list');
				$this->db->order_by('fullname');
				$this->db->join('user_level ul', 'ul.id = u.level_id', 'LEFT');
				$this->db->join('pegawai p', 'p.id_pegawai = u.id_pegawai', 'LEFT');
				$this->db->join('jbt_pegawai jp', 'jp.id_pegawai = p.id_pegawai', 'LEFT');
				$this->db->join('jabatan jbt', 'jbt.id_jabatan = jp.id_jabatan', 'LEFT');
				$this->db->group_by('u.id');
				return $this->db->get_where('users u', array('u.id' => $user_id));
			} else {
				$this->db->select('*, u.id, u.email, u.id_pegawai, u.created_at, p.foto,
							   GROUP_CONCAT(DISTINCT CONCAT(jbt.jabatan, "</span>&nbsp;<span>") ORDER BY p.nama SEPARATOR "</span>&nbsp;<span>") as result_list');
				$this->db->order_by('fullname');
				$this->db->join('user_level ul', 'ul.id = u.level_id', 'LEFT');
				$this->db->join('pegawai p', 'p.id_pegawai = u.id_pegawai', 'LEFT');
				$this->db->join('jbt_pegawai jp', 'jp.id_pegawai = p.id_pegawai', 'LEFT');
				$this->db->join('jabatan jbt', 'jbt.id_jabatan = jp.id_jabatan', 'LEFT');
				$this->db->group_by('u.id');
				return $this->db->get('users u');
			}
		}

		public function unlink_pegawai($id)
		{
			$this->db->where('id', $id);
			return $this->db->update('users', array('id_pegawai' => NULL));
		}

		public function update_user($enc_password, $id)
        {
			if (empty($this->input->post('id_pegawai'))) {
				$id_pegawai = NULL;
			} else {
				$id_pegawai = $this->input->post('id_pegawai');
			}
            $data = array(
                'level_id' => $this->input->post('level_id'),
                'fullname' => $this->input->post('fullname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'id_pegawai' => $id_pegawai,
                'password' => $enc_password
            );
			$this->db->where('id', $id);
			$this->db->update('users', $data);
			return $user;
		}
		
		public function delete_user($id)
		{
			$this->db->where('id', $id);
			return $this->db->delete('users');
		}
	}	
?>
