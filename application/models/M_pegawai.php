<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model{

	public function get_pegawai()
	{
		$this->db->SELECT('p.*,sp.ket');
		$this->db->JOIN('status_pgw sp','sp.id_status = p.id_status');
		return $this->db->get('pegawai p');
	}

	public function get_jabatan()
	{
		return $this->db->get('jabatan');
	}

	public function get_status_pgw()
	{
		return $this->db->get('status_pgw');
	}

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
		$jns_klmn=$this->input->post('jns_klmn');
		$email=$this->input->post('email');
		$telepon=$this->input->post('telepon');
		$status=$this->input->post('status');
		$jns_pegawai=$this->input->post('jns_pegawai');
		$status_pgw=$this->input->post('status_pgw');

		$data = array(
			'id_pegawai' => $id_pegawai,
			'nbm' => $nbm,
			'nama' => $nama,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' => $tgl_lahir,
			'agama' => $agama,
			'umur' => $umur,
			'jns_klmn' => $jns_klmn,
			'email' => $email,
			'telepon' => $telepon,
			'status' => $status,
			'jns_pegawai' => $jns_pegawai,
			'id_status' => $status_pgw
		);
		$this->db->insert("pegawai",$data);
	}

	public function add_keluarga()
	{
		$id_pegawai=$this->input->post('id_pegawai');
		$id_status=$this->input->post('anggota');
		$nama_anggota=$this->input->post('nama_anggota');
		$s_hidup_anggota=$this->input->post('s_hidup_anggota');
		$gender_anggota=$this->input->post('gender_anggota');

		for ($i=0; $i <= 2 ; $i++) {
				if (!empty($id_status[$i] && $nama_anggota[$i])) {
					$data = array(
						'id_pegawai' => $id_pegawai,
						'id_status' => $id_status[$i],
						'nama' => $nama_anggota[$i],
						's_hidup' => $s_hidup_anggota[$i],
						'gender' => $gender_anggota[$i]
					);
					$this->db->insert("keluarga",$data);
				}
		}
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

		return $this->db->get_where($table, $where);
	}

}