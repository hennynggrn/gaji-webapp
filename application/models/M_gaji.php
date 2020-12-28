<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gaji extends CI_Model{

	public function get_jabatan_detail($id_pegawai = TRUE, $jabatan_val)
	{
		$this->db->select('jb.id_jabatan, jabatan, jml_jam, id_pegawai, CONCAT(jml_jam*'.$jabatan_val.') nominal_jbt');
		$this->db->join('jbt_pegawai jp', 'jp.id_jabatan = jb.id_jabatan', 'LEFT');
		return $this->db->get_where('jabatan jb', array('jp.id_pegawai' => $id_pegawai));
	}

	public function get_jabatan($id_pegawai, $jabatan_val)
	{
		if ($id_pegawai != NULL) { 
			$this->db->select('jbt.id_jabatan, jabatan, jml_jam, p.id_pegawai,
							GROUP_CONCAT(DISTINCT CONCAT(jabatan, jml_jam) SEPARATOR "|") jabatan,
							sum('.$jabatan_val.'*jml_jam) nominal_jbt');
			$this->db->order_by('p.nama');
			$this->db->join('jbt_pegawai jp', 'jp.id_pegawai = p.id_pegawai', 'LEFT');
			$this->db->join('jabatan jbt', 'jp.id_jabatan = jbt.id_jabatan', 'LEFT');
			$this->db->group_by('p.id_pegawai');
			return $this->db->get_where('pegawai p', array('jp.id_pegawai' => $id_pegawai));
		} else {
			$this->db->select('jbt.id_jabatan, jabatan, jml_jam, p.id_pegawai,
							GROUP_CONCAT(DISTINCT CONCAT(jabatan, jml_jam) SEPARATOR "|") jabatan,
							sum('.$jabatan_val.'*jml_jam) nominal_jbt');
			$this->db->order_by('p.nama');
			$this->db->join('jbt_pegawai jp', 'jp.id_pegawai = p.id_pegawai', 'LEFT');
			$this->db->join('jabatan jbt', 'jp.id_jabatan = jbt.id_jabatan', 'LEFT');
			$this->db->group_by('p.id_pegawai');
			return $this->db->get('pegawai p');
		}
	}

	public function get_pinjaman($id_pegawai = TRUE, $kode)
	{
		$month = date('m');
		$year = date('Y');
		if ($id_pegawai != NULL) {
			switch ($kode) {
				case 'KOP':
					$this->db->select('*, pjm.status status_pjm');
					$this->db->order_by('p.nama');
					$this->db->join('pinjaman pjm', 'p.id_pegawai = pjm.id_pegawai AND (pjm.status = 0 AND pjm.kode_pinjaman = "'.$kode.'")', 'LEFT OUTER');
					$this->db->join('angsuran a', 'a.id_pinjaman = pjm.id_pinjaman AND (month(a.tanggal_kembali) = "'.$month.'" AND year(a.tanggal_kembali) = "'.$year.'")', 'LEFT OUTER');
					$this->db->group_by('p.id_pegawai');
					return $this->db->get_where('pegawai p', array('pjm.id_pegawai' => $id_pegawai));
					break;

				case 'BANK':
					$this->db->select('*, pjm.status status_pjm');
					$this->db->order_by('p.nama');
					$this->db->join('pinjaman pjm', 'p.id_pegawai = pjm.id_pegawai AND (pjm.status = 0 AND pjm.kode_pinjaman = "'.$kode.'")', 'LEFT OUTER');
					$this->db->join('angsuran a', 'a.id_pinjaman = pjm.id_pinjaman AND (month(a.tanggal_kembali) = "'.$month.'" AND year(a.tanggal_kembali) = "'.$year.'")', 'LEFT OUTER');
					$this->db->group_by('p.id_pegawai');
					return $this->db->get_where('pegawai p', array('pjm.id_pegawai' => $id_pegawai));
					break;
			}
		} else {
			switch ($kode) {
				case 'KOP':
					$this->db->select('*, pjm.status status_pjm');
					$this->db->order_by('p.nama');
					$this->db->join('pinjaman pjm', 'p.id_pegawai = pjm.id_pegawai AND (pjm.status = 0 AND pjm.kode_pinjaman = "'.$kode.'")', 'LEFT OUTER');
					$this->db->join('angsuran a', 'a.id_pinjaman = pjm.id_pinjaman AND (month(a.tanggal_kembali) = "'.$month.'" AND year(a.tanggal_kembali) = "'.$year.'")', 'LEFT OUTER');
					$this->db->group_by('p.id_pegawai');
					return $this->db->get('pegawai p');
					break;

				case 'BANK':
					$this->db->select('*, pjm.status status_pjm');
					$this->db->order_by('p.nama');
					$this->db->join('pinjaman pjm', 'p.id_pegawai = pjm.id_pegawai AND (pjm.status = 0 AND pjm.kode_pinjaman = "'.$kode.'")', 'LEFT OUTER');
					$this->db->join('angsuran a', 'a.id_pinjaman = pjm.id_pinjaman AND (month(a.tanggal_kembali) = "'.$month.'" AND year(a.tanggal_kembali) = "'.$year.'")', 'LEFT OUTER');
					$this->db->group_by('p.id_pegawai');
					return $this->db->get('pegawai p');
					break;
			}
		}
	}

	public function get_angsuran($id_pinjaman, $kode)
	{
		switch ($kode) {
			case 'KOP':
				$this->db->select('*');
				$this->db->order_by('tanggal_kembali');
				return $this->db->get_where('angsuran a', array('a.id_pinjaman' => $id_pinjaman));
				break;

			case 'BANK':
				$this->db->select('*');
				$this->db->order_by('tanggal_kembali');
				return $this->db->get_where('angsuran a', array('a.id_pinjaman' => $id_pinjaman));
				break;
		}
	}

	public function repay($id_kop, $id_bank)
	{
		$data = array('payOff_byGaji' => 1, 'status' => 1);
		if ($id_kop != 0) {
			$this->db->where('id_angsuran', $id_kop);
			$db['kop'] = $this->db->update('angsuran', $data);
		}
		if ($id_bank != 0) {
			$this->db->where('id_angsuran', $id_bank);
			$db['bank'] = $this->db->update('angsuran', $data);
		}
		return $db;
	}
}
 