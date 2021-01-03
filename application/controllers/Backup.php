<?php

class Backup extends CI_Controller
{
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			getDateZone();
			if (authUserLevel() == TRUE){
				$id_tunjangan = $this->M_backup->backup_tunjangan();
				$res['potongan'] = $this->M_backup->backup_potongan();
				$res['jabatan'] = $this->M_backup->backup_jabatan();
				$res['jabatans_pgw'] = $this->M_backup->backup_jabatan_pegawai();
				$res['masakerja'] = $this->M_backup->backup_masakerja();
				$res['pegawais'] = $this->M_backup->backup_pegawai($id_tunjangan);
				$res['keluargas'] = $this->M_backup->backup_keluarga();
				$gaji = $this->gaji_pegawai_all($id_pegawai = NULL);
				$res['gaji'] = $this->M_backup->backup_gaji($gaji);
				if ($res) {
					$this->session->set_flashdata('message_success', 'Laporan berhasil dibuat! Cek di menu laporan');
					redirect('table');
				} else {
					$this->session->set_flashdata('message_failed', 'Laporan gagal dibuat! Silahkan coba lagi');
					redirect('table');
				}
			} else {
				redirect('table');
			}
		}
	} 
	
	private function gaji_pegawai_all($id_pegawai)
	{
		// Tunjangan
		$data['tunjangan'] = $this->M_tunjangan->get_tunjangan()->row_array();
		$data['pegawais'] = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
		$data['keluargas'] = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
		$jabatan_val = $data['tunjangan']['jabatan'];
		$data['jabatans'] = $this->M_gaji->get_jabatan($id_pegawai, $jabatan_val)->result_array();
		
		// Potongan
		$data['potongan']= $this->M_potongan->get_potongan()->row_array();
		
		$data['pinjaman_kop'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP', $status = TRUE)->result_array();
		$data['pinjaman_bank'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'BANK')->result_array();

		foreach ($data['pegawais'] as $key => $value) {
			// Keluarga
			if ($data['keluargas'][$key]['id_pegawai'] == $data['pegawais'][$key]['id_pegawai']) {
				$data['pegawais'][$key]['klg_hidup'] = $data['keluargas'][$key]['klg_hidup'];
				$data['pegawais'][$key]['keluarga'] = $data['keluargas'][$key]['keluarga'];
				$data['pegawais'][$key]['status_klg'] = explode('-', $data['keluargas'][$key]['keluarga']);
			}
			// Jabatan
			if ($data['jabatans'][$key]['id_pegawai'] == $data['pegawais'][$key]['id_pegawai']) {
				$data['pegawais'][$key]['jabatan'] = $data['jabatans'][$key]['nominal_jbt'];
			}
			// KOP
			if ($data['pinjaman_kop'] != NULL) {
				foreach ($data['pinjaman_kop'] as $i => $kop) {
					if ($data['pinjaman_kop'][$i]['id_pegawai'] == $data['pegawais'][$key]['id_pegawai']) {
						$data['pegawais'][$key]['nominal_kop'] = $data['pinjaman_kop'][$i]['nominal'];
					}
				}
			}
			// BANK
			if ($data['pinjaman_bank'] != NULL) {
				foreach ($data['pinjaman_bank'] as $j => $bank) {
					if ($data['pinjaman_bank'][$j]['id_pegawai'] == $data['pegawais'][$key]['id_pegawai']) {
						$data['pegawais'][$key]['nominal_bank'] = $data['pinjaman_bank'][$j]['nominal'];
					}
				}
			}
		}
		if (authUserLevel() == TRUE){
			$data['hide'] = FALSE;
		} else {
			$data['hide'] = TRUE;
		}
		
		$data_output = array();
		foreach ($data['pegawais'] as $key => $pegawai) {
			if (($pegawai['honor'] != NULL) && ($pegawai['honor'] == 0)) {
				$honor_val = 0;
			} else if (($pegawai['honor'] != NULL) && ($pegawai['honor'] != 0)) {
				$honor_val = $pegawai['honor'];
			} else {
				$honor_val = 0;
			}

			$pasangan = 0;
			$anak_pertama = 0;
			$anak_kedua = 0;
			if ($pegawai['klg_hidup'] != NULL) {
				if (in_array('1', $pegawai['status_klg'])){
					$pasangan = 1;
				} 
				if (in_array('2', $pegawai['status_klg'])) {
					$anak_pertama = 1;
				} 
				if (in_array('3', $pegawai['status_klg'])) {
					$anak_kedua = 1;
				}
			}
			$keluarga_val = ($pegawai['honor']*$pasangan*$data['tunjangan']['klg_psg'])+($pegawai['honor']*$anak_pertama*$data['tunjangan']['klg_anak'])+($pegawai['honor']*$anak_kedua*$data['tunjangan']['klg_anak']);
			$tunjangan_val = $data['tunjangan']['beras']+$data['tunjangan']['jamsostek']+$keluarga_val+$pegawai['jabatan']+$pegawai['nominal_mk'];

			($pegawai['status_pegawai'] != 'P') ? $aisiyah_val = 0 : $aisiyah_val = $data['potongan']['aisiyah'];
			(!empty($pegawai['nominal_kop'])) ? $pjm_kop = $pegawai['nominal_kop'] : $pjm_kop = 0;
			(!empty($pegawai['nominal_bank'])) ? $pjm_bank = $pegawai['nominal_bank'] : $pjm_bank = 0;
			$pinjaman = $pjm_kop+$pjm_bank;
			$potongan_val = $data['potongan']['sosial']+$data['potongan']['infaq']+$data['potongan']['jsr']+$aisiyah_val+$data['potongan']['jamsostek']+$pinjaman;
			$gaji = $honor_val+$tunjangan_val-$potongan_val;

			$data_output[$key]['honor_val'] = $honor_val;
			$data_output[$key]['tunjangan_val'] = $tunjangan_val;
			$data_output[$key]['potongan_val'] = $potongan_val;
			$data_output[$key]['gaji'] = $gaji;
			$data_output[$key]['id_pegawai'] = $pegawai['id_pegawai'];
		} 
		return $data_output;
	}
}

?>
