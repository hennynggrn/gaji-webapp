<?php

class M_backup extends CI_Model
{
	public function backup_tunjangan()
	{
		/* Backup tunjangan akan melakukan insert record (1 row) yang terupdate
		dan return last id sebagai foreign key di b_pegawai
		*/
		$month = date('m');
		$year = date('Y');
		$user = $this->session->userdata('user_id');
		$this->db->query('
			INSERT INTO b_tunjangan (beras, jamsostek, klg_psg, klg_anak, jabatan, created_by)
			SELECT beras, jamsostek, klg_psg, klg_anak, jabatan, '.$user.'
			FROM tunjangan t
			WHERE month(t.updated_at) = '.$month.' AND year(t.updated_at) = '.$year
			);
		$id_tunjangan = $this->db->insert_id();
		return $id_tunjangan;
	}

	public function backup_potongan()
	{
		/* Backup potongan akan melakukan insert record (1 row) yang terupdate
		*/
		$month = date('m');
		$year = date('Y');
		$user = $this->session->userdata('user_id');
		$data =  $this->db->query('
			INSERT INTO b_potongan (sosial, infaq, jsr, aisiyah, jamsostek, ket, created_by)
			SELECT sosial, infaq, jsr, aisiyah, jamsostek, ket, '.$user.'
			FROM potongan po
			WHERE month(po.updated_at) = '.$month.' AND year(po.updated_at) = '.$year
			);
		return $data;
	}

	public function backup_jabatan()
	{
		/* Backup jabatan akan melakukan insert records terbaru ditandai dengan bulan dan tahun saat ini.
		Sehingga tidak menginsert data yg tidak updated pada waktu terkini.
		*/
		$month = date('m');
		$year = date('Y');
		$user = $this->session->userdata('user_id');
		$data = $this->db->query('
			INSERT INTO b_jabatan (id_jabatan, jabatan, jml_jam, created_by)
			SELECT id_jabatan, jabatan, jml_jam, '.$user.'
			FROM jabatan j
			WHERE month(j.updated_at) = '.$month.' AND year(j.updated_at) = '.$year
		);
		return $data;
	}

	public function backup_jabatan_pegawai()
	{
		/* Backup jabatan pegawai akan melakukan insert records terbaru ditandai dengan bulan dan tahun saat ini.
		Sehingga tidak menginsert data yg tidak updated pada waktu terkini. Table akan berelasi dengan table jabatan
		dan pegawai
		*/
		$month = date('m');
		$year = date('Y');
		$user = $this->session->userdata('user_id');
		$data = $this->db->query('
			INSERT INTO b_jbt_pegawai (id_jbt_pegawai, id_jabatan, id_pegawai, created_by)
			SELECT id_jbt_pegawai, id_jabatan, id_pegawai, '.$user.'
			FROM jbt_pegawai jp
			WHERE month(jp.updated_at) = '.$month.' AND year(jp.updated_at) = '.$year
		);
		return $data;
	}

	public function backup_masakerja()
	{
		/* Backup masakerja akan melakukan insert records terbaru ditandai dengan bulan dan tahun saat ini.
		Sehingga tidak menginsert data yg tidak updated pada waktu terkini. Table akan berelasi dengan table 
		pegawai
		*/
		$month = date('m');
		$year = date('Y');
		$user = $this->session->userdata('user_id');
		$data = $this->db->query('
			INSERT INTO b_masakerja (id_masakerja, tahun, nominal_mk, created_by)
			SELECT id_masakerja, tahun, nominal_mk, '.$user.'
			FROM masakerja mk
			WHERE month(mk.updated_at) = '.$month.' AND year(mk.updated_at) = '.$year
		);
		return $data;
	}
	
	public function backup_pegawai($id_tunjangan)
	{
		/* Backup pegawai akan jadi lead untuk 1 bulk backup (dalam 1x aksi)
		*/
		$month = date('m');
		$year = date('Y');
		$user = $this->session->userdata('user_id');
		$data = $this->db->query('
			INSERT INTO b_pegawai (id_pegawai, nbm, nama, foto, tempat_lahir, tgl_lahir, telepon, jns_pegawai, gender, email, status_pegawai, status,
				   agama, umur, honor, masa_kerja, created_by, id_tunjangan)
			SELECT id_pegawai, nbm, nama, foto, tempat_lahir, tgl_lahir, telepon, jns_pegawai, gender, email, status_pegawai, status,
				   agama, umur, honor, masa_kerja, '.$user.', '.$id_tunjangan.'
			FROM pegawai p
			WHERE month(p.updated_at) = '.$month.' AND year(p.updated_at) = '.$year
		);
		return $data;
	}

	public function backup_keluarga()
	{
		/* Backup keluarga insert records terupdated sesuai bulan dan tahun terkini
		*/
		$month = date('m');
		$year = date('Y');
		$user = $this->session->userdata('user_id');
		$data = $this->db->query('
			INSERT INTO b_keluarga (id_anggota_klg, nama, id_status, s_hidup, gender, id_pegawai, created_by)
			SELECT id_anggota_klg, nama, id_status, s_hidup, gender, id_pegawai, '.$user.'
			FROM keluarga k
			WHERE month(k.updated_at) = '.$month.' AND year(k.updated_at) = '.$year
		);
		return $data;
	}

	public function backup_gaji($gaji)
	{
		/* Backup gaji insert records monthly
		*/
		$user = $this->session->userdata('user_id');
		// var_dump($gaji);
		foreach ($gaji as $key => $value) {
			$data = array(
				'honor' => $value['honor_val'],
				'tunjangan' => $value['tunjangan_val'],
				'potongan' => $value['potongan_val'],
				'gaji' => $value['gaji'],
				'id_pegawai' => $value['id_pegawai'],
				'created_by' => $user,
			);
			$this->db->insert('b_gaji', $data);
			// var_dump($data);
		}
		
	}
}

?>
