<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model{

	public function get_pegawai()
	{
		$this->db->SELECT('p.*');
		// $this->db->JOIN('status_pgw sp','sp.id_status = p.id_status');
		// $this->db->JOIN('honor h','h.id_honor = p.id_honor');
		return $this->db->get('pegawai p');
	}

	// public function get_status_pgw()
	// {
	// 	return $this->db->get('status_pgw');
	// }

	public function get_id_pegawai()
	{
		$this->db->select_max('id_pegawai');
		return $this->db->get_where('pegawai');
	}

	public function add_pegawai()
	{
		$id_pegawai=$this->input->post('id_pegawai');
		$nbm=$this->input->post('nbm');
		$nama=$this->input->post('nama');
		$tempat_lahir=$this->input->post('tempat_lahir');
		$tgl_lahir=$this->input->post('tgl_lahir');
		$agama=$this->input->post('agama');
		$umur=$this->input->post('umur');
		$gender=$this->input->post('gender');
		$email=$this->input->post('email');
		$telepon=$this->input->post('telepon');
		$status=$this->input->post('status');
		$jns_pegawai=$this->input->post('jns_pegawai');
		$status_pegawai = $this->input->post('status_pgw');
		switch ($status_pegawai) {
			case 'guru_PNS':
				$status_pgw = 'P';
				break;
			case 'guru_T1':
				$status_pgw = 'T1';
				break;
			case 'guru_T0':
				$status_pgw = 'T0';
				break;
			case 'karyawan_T1':
				$status_pgw = 'T1';
				break;
			case 'karyawan_T0':
				$status_pgw = 'T0';
				break;
		}		
		// $status_pgw=$this->input->post('status_pgw');
		$honor = $this->input->post('honor');
		if (empty($honor)) {
			$honor = 0;
		}
		// var_dump($status_pgw);
		$data = array(
			'id_pegawai' => $id_pegawai,
			'nbm' => $nbm,
			'nama' => $nama,
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
			'honor' => $honor
		);
		$this->db->insert("pegawai",$data);
	}

	public function add_jabatan()
	{
		$id_pegawai=$this->input->post('id_pegawai');
		$id_jabatan=$this->input->post('jabatan');

		foreach ($id_jabatan as $i => $value) {
			$data = array(
				'id_pegawai' => $id_pegawai,
				'id_jabatan' => $id_jabatan[$i]
			);
				$this->db->insert("jbt_pegawai",$data);
			}
	}

	public function detail_pegawai($data)
	{
		$this->db->insert("pegawai",$data);
	}

	public function get_pegawai_detail($where, $table)
	{
		$this->db->select($table.'.*');
		// $this->db->JOIN('honor h','h.id_honor = '.$table.'.id_honor');
		// $this->db->JOIN('status_pgw sp','sp.id_status = '.$table.'.id_status');
		return $this->db->get_where($table, $where);
	}

}
