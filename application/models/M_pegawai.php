<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model{

	public function get_pegawai($id_pegawai = TRUE)
	{
		if ($id_pegawai != NULL) {
			$this->db->select('p.*, honor, mk.*');
			$this->db->join('masakerja mk', 'p.masa_kerja = mk.id_masakerja', 'LEFT');
			return $this->db->get_where('pegawai p', array('id_pegawai' => $id_pegawai));
		} else {
			$this->db->select('p.*, mk.*');
			$this->db->order_by('p.nama', 'ASC');
			$this->db->join('masakerja mk', 'p.masa_kerja = mk.id_masakerja', 'LEFT');
			return $this->db->get('pegawai p');
		}
	}

	public function get_id_pegawai()
	{
		$this->db->select_max('id_pegawai');
		return $this->db->get_where('pegawai');
	}

	public function add_pegawai($upload_img)
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$nbm = $this->input->post('nbm');
		$nama = $this->input->post('nama');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$agama = $this->input->post('agama');
		$umur = $this->input->post('umur');
		$gender = $this->input->post('gender');
		$email = $this->input->post('email');
		$telepon = $this->input->post('telepon');
		$status = $this->input->post('status');
		$masakerja = $this->input->post('masa_kerja');
		$jns_pegawai = $this->input->post('jns_pegawai');
		$status_pegawai   = $this->input->post('status_pgw');
		switch ($status_pegawai) {
			case 'P':
				$status_pgw = 'P';
				break;
			case 'T1':
				$status_pgw = 'T1';
				break;
			case 'T0':
				$status_pgw = 'T0';
				break;
		}		
		$honor = $this->input->post('honor');
		if (empty($honor)) {
			switch ($status_pegawai) {
				case 'P':
					$honor = NULL;
					break;
				case 'T1':
					$honor = 0;
					break;
				case 'T0':
					$honor = NULL;
					break;
			}	
		}

		$data = array(
			'id_pegawai' => $id_pegawai,
			'nbm' => $nbm,
			'nama' => $nama,
			'foto' => $upload_img,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' => $tgl_lahir,
			'agama' => $agama,
			'umur' => $umur,
			'gender' => $gender,
			'email' => $email,
			'telepon' => $telepon,
			'status' => $status,
			'jns_pegawai' => $jns_pegawai,
			'status_pegawai' => $status_pgw,
			'honor' => $honor,
			'masa_kerja' => $masakerja
		);
		return $this->db->insert("pegawai", $data);
	}

	public function get_pegawai_detail($where)
	{
		$this->db->select('*');
		$this->db->join('masakerja m', 'm.id_masakerja = p.masa_kerja', 'LEFT');
		return $this->db->get_where('pegawai p', $where);
	}

	public function update_pegawai($upload_img)
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$nbm = $this->input->post('nbm');
		$nama = $this->input->post('nama');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$agama = $this->input->post('agama');
		$umur = $this->input->post('umur');
		$gender = $this->input->post('gender');
		$email = $this->input->post('email');
		$telepon = $this->input->post('telepon');
		$status = $this->input->post('status');
		$masakerja = $this->input->post('masa_kerja');
		$jns_pegawai = $this->input->post('jns_pegawai');
		$status_pegawai = $this->input->post('status_pgw');
		switch ($status_pegawai) {
			case 'P':
				$status_pgw = 'P';
				break;
			case 'T1':
				$status_pgw = 'T1';
				break;
			case 'T0':
				$status_pgw = 'T0';
				break;
		}		
		$honor = $this->input->post('honor');
		if (empty($honor)) {
			switch ($status_pegawai) {
				case 'P':
					$honor = NULL;
					break;
				case 'T1':
					$honor = 0;
					break;
				case 'T0':
					$honor = NULL;
					break;
			}	
		}

		$data = array(
			'nbm' => $nbm,
			'nama' => $nama,
			'foto' => $upload_img,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' => $tgl_lahir,
			'agama' => $agama,
			'umur' => $umur,
			'gender' => $gender,
			'email' => $email,
			'telepon' => $telepon,
			'status' => $status,
			'jns_pegawai' => $jns_pegawai,
			'status_pegawai' => $status_pgw,
			'honor' => $honor,
			'masa_kerja' => $masakerja
		);
		return $this->db->update("pegawai", $data, array('id_pegawai' => $id_pegawai));
	}

	public function delete_pegawai($id = TRUE)
	{
		$this->db->where('id_pegawai', $id);
		return $this->db->delete('pegawai');
	}
}
