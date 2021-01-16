<?php

class M_laporan extends CI_Model
{
	public function get_gaji($id_date)
	{
		if ($id_date != NULL) {
			$date = explode('-', $id_date);
			$month = $date[1];
			$year = year($id_date);
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
		return $data;
	}

	public function get_tunjangan($id_date, $tunjangan)
	{
		$date = explode('-', $id_date);
		$month = $date[1];
		$year = year($id_date);
		if ($tunjangan != NULL) {
			$this->db->select('bt.*');
			$this->db->where('(month(bt.created_at) = "'.$month.'" AND year(bt.created_at) = "'.$year.'")');
		} else {
			$this->db->select('bt.*, max(created_at)');
		}
		return $this->db->get('b_tunjangan bt');
	}
}

?>
