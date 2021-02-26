<?php

function switch_status_pegawai($status_pegawai)
{
	switch ($status_pegawai) {
		case 'P':
		// pns
			$switch = array(
				// tunjangan
				'beras' => 0,
				'jamsostek_tj' => 0,
				'keluarga' => 0,
				'jabatan' => 1,
				'mk' => 1,
				// potongan
				'infaq' => 1,
				'sosial' => 1,
				'aisiyah' => 1,
				'pgri' => 0,
				'jamsostek_pt' => 0,
				'jsr' => 1
			);
			break;
		case 'T0':
		// tidak tetap
			$switch = array(
				// tunjangan
				'beras' => 1,
				'jamsostek_tj' => 0,
				'keluarga' => 0,
				'jabatan' => 1,
				'mk' => 1,
				// potongan
				'infaq' => 1,
				'sosial' => 1,
				'aisiyah' => 0,
				'pgri' => 1,
				'jamsostek_pt' => 0,
				'jsr' => 0
			);
			break;
		case 'T1':
		// tetap
			$switch = array(
				// tunjangan
				'beras' => 1,
				'jamsostek_tj' => 1,
				'keluarga' => 1,
				'jabatan' => 1,
				'mk' => 1,
				// potongan
				'infaq' => 1,
				'sosial' => 1,
				'aisiyah' => 0,
				'pgri' => 1,
				'jamsostek_pt' => 1,
				'jsr' => 1
			);
			break;
	}
	return $switch;
}

?>
