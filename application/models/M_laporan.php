<?php

class M_laporan extends CI_Model
{
	public function get_gaji()
	{
		$data = $this->db->query('
			SELECT *, count(id_gaji) jml_gaji
			FROM b_gaji
			GROUP BY 
				CAST(YEAR(created_at) AS VARCHAR(4)) + "-" + right("00" + CAST(MONTH(created_at) AS VARCHAR(2)), 2)
			ORDER BY created_at DESC
		');
		return $data;
	}
}

?>
