<?php

class M_laporan extends CI_Model
{
	public function get_gaji($month, $year)
	{
		if (($month != NULL) && ($year != NULL)) {
			
			$this->db->select('bg.*, p.nama');
			$this->db->join('pegawai p', 'p.id_pegawai = bg.id_pegawai', 'LEFT');
			$data = $this->db->get_where('b_gaji bg', array('month(bg.created_at)' => $month, 'year(bg.created_at)' => $year));
		} else {
			$data = $this->db->query('
				SELECT *, count(id_gaji) jml_gaji
				FROM b_gaji
				GROUP BY 
					CAST(YEAR(created_at) AS VARCHAR(4)) + "-" + CAST(MONTH(created_at) AS VARCHAR(2))
				ORDER BY 
					created_at DESC
			');
			// CAST(YEAR(created_at) AS VARCHAR(4)) + "-" + right("00" + CAST(MONTH(created_at) AS VARCHAR(2)), 2)
		}
		// var_dump($month);
		// var_dump($year);
		return $data;
	}

	public function get_tunjangan($month, $year)
	{
		$data = $this->db->query('
			
			SELECT *
			FROM b_tunjangan
			WHERE 
			year(created_at) * 12 + month(created_at) <= '.$year.' * 12 + '.$month.'
			GROUP BY id_tunjangan
			ORDER BY 
				created_at DESC
		');
		return $data;
	}

	public function get_potongan($month, $year)
	{
		$data = $this->db->query('
			
			SELECT *
			FROM b_potongan
			WHERE 
			year(created_at) * 12 + month(created_at) <= '.$year.' * 12 + '.$month.'
			GROUP BY id_potongan
			ORDER BY 
				created_at DESC
		');
		return $data;
	}
}

?>
