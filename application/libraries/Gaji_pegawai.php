<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gaji_pegawai {
    
	function get_data($id_pegawai)
	{               
		$this->CI =& get_instance();

		getDateZone();			
		$month_today = date('Y-m'); // bulan & tahun ini
		$date_today = date('Y-m-d'); // tanggal sekarang
		$data['desc'] = month($date_today).' '.date('Y', strtotime($date_today));
		$data['month'] = $month_today;
		$data['today_date'] = fullConvertIDN(date('Y-m-d'), $short = NULL, $day = FALSE);
		$potongan = $this->CI->M_potongan->get_potongan()->row_array();
		$tunjangan = $this->CI->M_tunjangan->get_tunjangan()->row_array();
		$jabatan_val = $tunjangan['jabatan'];

		if ($id_pegawai != NULL) {
			$data['bendahara'] = $this->CI->M_jabatan->get_bendahara($id_jabatan = '2', $jabatan = 'Bendahara')->row_array();
			$data['pegawai'] = $this->CI->M_pegawai->get_pegawai($id_pegawai)->row_array();
			$keluargas = $this->CI->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
			$data['jabatans'] = $this->CI->M_gaji->get_jabatan_detail($id_pegawai, $jabatan_val)->result_array();
			$nominal_jbt = 0;
			foreach ($data['jabatans'] as $key => $jabatan) {
				$nominal_jbt += $jabatan['nominal_jbt'];
			}
			$pinjaman_kop = $this->CI->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP')->row_array();
			$pinjaman_bank = $this->CI->M_gaji->get_pinjaman($id_pegawai, $kode = 'BANK')->row_array();
			foreach ($keluargas as $key => $value) {
				// Keluarga
				if ($keluargas[$key]['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['keluarga']['klg_hidup'] = $keluargas[$key]['klg_hidup'];
					$data['keluarga']['status_klg'] = explode('-', $keluargas[$key]['keluarga']);
				}
			}
			if (empty($data['keluarga']['klg_hidup'])) {
				$keluarga_val = 0;
			} else {
				$pasangan = 0;
				$anak_pertama = 0;
				$anak_kedua = 0;
				if ($data['keluarga']['klg_hidup'] != NULL) {
					if (in_array('1', $data['keluarga']['status_klg'])){
						$pasangan = 1;
					} 
					if (in_array('2', $data['keluarga']['status_klg'])) {
						$anak_pertama = 1;
					} 
					if (in_array('3', $data['keluarga']['status_klg'])) {
						$anak_kedua = 1;
					}
				}
				$keluarga_val = ($data['pegawai']['honor']*$pasangan*$tunjangan['klg_psg'])+($data['pegawai']['honor']*$anak_pertama*$tunjangan['klg_anak'])+($data['pegawai']['honor']*$anak_kedua*$tunjangan['klg_anak']);
			}
			// 
			$status_pegawai = $data['pegawai']['status_pegawai'];
			$switch = switch_status_pegawai($status_pegawai);
			// var_dump($switch);
			// Tunjangan
			$data['tunjangan']['beras'] = $tunjangan['beras']*$switch['beras'];
			$data['tunjangan']['jamsostek'] = $tunjangan['jamsostek']*$switch['jamsostek_tj'];
			$data['tunjangan']['keluarga'] = $keluarga_val*$switch['keluarga'];
			$data['tunjangan']['jabatan'] = $nominal_jbt*$switch['jabatan'];
			$data['tunjangan']['masakerja'] = $data['pegawai']['nominal_mk']*$switch['mk'];

			// Potongan
			$data['potongan']['infaq'] = $potongan['infaq']*$switch['infaq'];
			$data['potongan']['sosial'] = $potongan['sosial']*$switch['sosial'];
			$data['potongan']['aisiyah'] = $potongan['aisiyah']*$switch['aisiyah'];
			$data['potongan']['pgri'] = $potongan['pgri']*$switch['pgri'];
			$data['potongan']['jamsostek'] = $potongan['jamsostek']*$switch['jamsostek_pt'];
			$data['potongan']['jsr'] = $potongan['jsr']*$switch['jsr'];
			// potongan pinjaman exist
			if ($pinjaman_kop != NULL) {
				// KOP
				if ($pinjaman_kop['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['potongan']['nominal_kop'] = $pinjaman_kop['nominal'];
					$data['potongan']['id_kop'] = $pinjaman_kop['id_angsuran'];
					$data['potongan']['payOff_byGaji_Kop'] = $pinjaman_kop['payOff_byGaji'];
				}
			} else {
				$data['potongan']['pinjaman_kop'] = 0;
			}
			if ($pinjaman_bank != NULL) {
				// BANK
				if ($pinjaman_bank['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['potongan']['nominal_bank'] = $pinjaman_bank['nominal'];
					$data['potongan']['id_bank'] = $pinjaman_bank['id_angsuran'];
					$data['potongan']['payOff_byGaji_Bank'] = $pinjaman_bank['payOff_byGaji'];
				}
			} else {
				$data['potongan']['pinjaman_bank'] = 0;
			}
			// var_dump($jabatans);
		} else {
			$pegawais = $this->CI->M_pegawai->get_pegawai($id_pegawai)->result_array();
			$keluargas = $this->CI->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
			$jabatans = $this->CI->M_gaji->get_jabatan($id_pegawai, $jabatan_val)->result_array();
			$pinjaman_kop = $this->CI->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP')->result_array();
			$pinjaman_bank = $this->CI->M_gaji->get_pinjaman($id_pegawai, $kode = 'BANK')->result_array();
			// var_dump($pinjaman_kop);
			// var_dump($pinjaman_bank);
			foreach ($pegawais as $key => $pegawai) {
				$data['pegawais'][$key]['id_pegawai'] = $pegawais[$key]['id_pegawai'];
				$data['pegawais'][$key]['nama'] = $pegawais[$key]['nama'];
				$data['pegawais'][$key]['nbm'] = $pegawais[$key]['nbm'];
				$data['pegawais'][$key]['honor'] = $pegawais[$key]['honor'];

				if ($keluargas[$key]['id_pegawai'] == $pegawais[$key]['id_pegawai']) {
					$data['pegawais'][$key]['keluarga']['klg_hidup'] = $keluargas[$key]['klg_hidup'];
					$data['pegawais'][$key]['keluarga']['status_klg'] = explode('-', $keluargas[$key]['keluarga']);
				}
				if (empty($data['pegawais'][$key]['keluarga']['klg_hidup'])) {
					$keluarga_val = 0;
				} else {
					$pasangan = 0;
					$anak_pertama = 0;
					$anak_kedua = 0;
					if ($data['pegawais'][$key]['keluarga']['klg_hidup'] != NULL) {
						if (in_array('1', $data['pegawais'][$key]['keluarga']['status_klg'])){
							$pasangan = 1;
						} 
						if (in_array('2', $data['pegawais'][$key]['keluarga']['status_klg'])) {
							$anak_pertama = 1;
						} 
						if (in_array('3', $data['pegawais'][$key]['keluarga']['status_klg'])) {
							$anak_kedua = 1;
						}
					}
					$keluarga_val = ($pegawai['honor']*$pasangan*$tunjangan['klg_psg'])+($pegawai['honor']*$anak_pertama*$tunjangan['klg_anak'])+($pegawai['honor']*$anak_kedua*$tunjangan['klg_anak']);
				}
				$nominal_jbt = 0;
				if ($jabatans[$key]['id_pegawai'] == $pegawais[$key]['id_pegawai']) {
					$nominal_jbt = $jabatans[$key]['nominal_jbt'];
				}
				// var_dump($jabatans);
				$status_pegawai = $pegawai['status_pegawai'];
				$switch = switch_status_pegawai($status_pegawai);
				// Tunjangan
				$data['pegawais'][$key]['tunjangan']['beras'] = $tunjangan['beras']*$switch['beras'];
				$data['pegawais'][$key]['tunjangan']['jamsostek'] = $tunjangan['jamsostek']*$switch['jamsostek_tj'];
				$data['pegawais'][$key]['tunjangan']['keluarga'] = $keluarga_val*$switch['keluarga'];
				$data['pegawais'][$key]['tunjangan']['jabatan'] = $nominal_jbt*$switch['jabatan'];
				$data['pegawais'][$key]['tunjangan']['masakerja'] = $pegawai['nominal_mk']*$switch['mk'];

				// Potongan
				$data['pegawais'][$key]['potongan']['infaq'] = $potongan['infaq']*$switch['infaq'];
				$data['pegawais'][$key]['potongan']['sosial'] = $potongan['sosial']*$switch['sosial'];
				$data['pegawais'][$key]['potongan']['aisiyah'] = $potongan['aisiyah']*$switch['aisiyah'];
				$data['pegawais'][$key]['potongan']['pgri'] = $potongan['pgri']*$switch['pgri'];
				$data['pegawais'][$key]['potongan']['jamsostek'] = $potongan['jamsostek']*$switch['jamsostek_pt'];
				$data['pegawais'][$key]['potongan']['jsr'] = $potongan['jsr']*$switch['jsr'];
				$data['pegawais'][$key]['potongan']['pinjaman_kop'] = 0;
				if ($pinjaman_kop != NULL) {
					foreach ($pinjaman_kop as $i => $kop) {
						if ($pinjaman_kop[$i]['id_pegawai'] == $pegawais[$key]['id_pegawai']) {
							$data['pegawais'][$key]['potongan']['pinjaman_kop'] = $pinjaman_kop[$i]['nominal'];
						} 
					}
				}
				$data['pegawais'][$key]['potongan']['pinjaman_bank'] = 0;
				if ($pinjaman_bank != NULL) {
					foreach ($pinjaman_bank as $j => $bank) {
						if ($pinjaman_bank[$j]['id_pegawai'] == $pegawais[$key]['id_pegawai']) {
							$data['pegawais'][$key]['potongan']['pinjaman_bank'] = $pinjaman_bank[$j]['nominal'];
						}
					}
				}
				foreach ($data['pegawais'] as $key => $pegawai) {
					$data['pegawais'][$key]['tunjangan_val'] = array_sum($pegawai['tunjangan']);
					$data['pegawais'][$key]['potongan_val'] = array_sum($pegawai['potongan']);
					$data['pegawais'][$key]['gaji_bersih'] = ($pegawai['honor'] + array_sum($pegawai['tunjangan'])) - array_sum($pegawai['potongan']);
				}
			}
		}
		if (authUserLevel() == TRUE){
			$data['hide'] = FALSE;
		} else {
			$data['hide'] = TRUE;
		}
		return $data;
	}
		
}
?>
