<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function index($id_pegawai = NULL) 
	{
		$data['title'] = 'Tabel Gaji';
		$data['pegawais'] = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
		
		

		$this->template->load('index','gaji/table_gaji', $data);
	}

	public function detail_gaji($id_pegawai = TRUE)
	{
		$date_today = date('Y-m-d'); // tanggal sekarang
		$month_today = date('Y-m'); // bulan & tahun ini
		$data['title'] = 'Detail Gaji';
		$data['desc'] = month($date_today).' '.date('Y', strtotime($date_today));
		
		$data['pegawai'] = $this->M_pegawai->get_pegawai($id_pegawai)->row_array();
		$data['keluargas'] = $this->M_gaji->get_keluarga($id_pegawai)->result_array();
		foreach ($data['keluargas'] as $key => $value) {
			if ($data['keluargas'][$key]['s_hidup'] != 0) {
				$data['keluargas'][$key]['tunjangan'] = '1';
			} else {
				$data['keluargas'][$key]['tunjangan'] = '0';
			}
		}
		$data['tunjangan'] = $this->M_tunjangan->get_tunjangan()->row_array();
		$jabatan_val = $data['tunjangan']['jabatan']; // nilai potongan jabatan
		$data['jabatans'] = $this->M_gaji->get_jabatan($id_pegawai, $jabatan_val, $detail = TRUE)->result_array();
		$data['jabatan'] = $this->M_gaji->get_jabatan($id_pegawai, $jabatan_val, $detail = FALSE)->result_array();
		
		$data['potongan']= $this->M_potongan->get_potongan()->row_array();
		$data['pinjaman_kop'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP')->row_array();
		$data['pinjaman_bank'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'BANK')->row_array();
		// cek pinjaman ada atau tidak
		if (($data['pinjaman_kop'] !== NULL) && ($data['pinjaman_bank'] !== NULL)) {
			// jika pinjaman ada
			$id_pinjaman_kop = $data['pinjaman_kop']['id_pinjaman'];
			$id_pinjaman_bank = $data['pinjaman_bank']['id_pinjaman'];

			$data['angsuran_kop'] = $this->M_gaji->get_angsuran($id_pinjaman = $id_pinjaman_kop, $kode = 'KOP')->result_array();
			$data['angsuran_bank'] = $this->M_gaji->get_angsuran($id_pinjaman = $id_pinjaman_bank, $kode = 'BANK')->result_array();
			// ambil angsuran kop bulan ini
			foreach ($data['angsuran_kop'] as $key => $value) {
				if (date('Y-m', strtotime($data['angsuran_kop'][$key]['tanggal_kembali'])) == $month_today) {
					$data['angsuran_kop'][$key]['repay'] = '1';
				} else {
					$data['angsuran_kop'][$key]['repay'] = '0';
				}
			}
			// ambil angsuran bank bulan ini
			foreach ($data['angsuran_bank'] as $key => $value) {
				if (date('Y-m', strtotime($data['angsuran_bank'][$key]['tanggal_kembali'])) == $month_today) {
					$data['angsuran_bank'][$key]['repay'] = '1';
				} else {
					$data['angsuran_bank'][$key]['repay'] = '0';
				}
			}
		} else {
			// jika pinjaman tidak ada
			$data['angsuran_kop'] = NULL;
			$data['angsuran_bank'] = NULL;
		}
		



		var_dump($month_today);
		var_dump($data['pegawai']);
		var_dump($data['keluargas']);
		var_dump($data['tunjangan']);
		var_dump($data['jabatans']);
		var_dump($data['jabatan']);
		var_dump($data['potongan']);
		var_dump($data['pinjaman_kop']);
		var_dump($data['pinjaman_bank']);
		var_dump($data['angsuran_kop']);
		var_dump($data['angsuran_bank']);
		$this->template->load('index','gaji/detail_gaji',$data);
	}

	// public function print_gaji()
	// {
	// 	$this->load->model('M_gaji');
	// 	$data['tampil']= $this->M_gaji->get_gaji()->result_array();

	// 	$this->template->load('index','gaji/print_det_gaji',$data);
	// }
}
