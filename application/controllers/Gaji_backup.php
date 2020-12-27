<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function index($id_pegawai = NULL) 
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$date_today = date('Y-m-d'); // tanggal sekarang
			$month_today = date('Y-m'); // bulan & tahun ini
			$data['title'] = 'Detail Gaji';
			$data['desc'] = month($date_today).' '.date('Y', strtotime($date_today));
			$data['month'] = $month_today;

			// Tunjangan
			$data['tunjangan'] = $this->M_tunjangan->get_tunjangan()->row_array();
			$data['pegawais'] = $this->M_pegawai->get_pegawai($id_pegawai)->result_array();
			$data['keluargas'] = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
			$jabatan_val = $data['tunjangan']['jabatan'];
			$data['jabatans'] = $this->M_gaji->get_jabatan_all($id_pegawai, $jabatan_val)->result_array();
			
			// Potongan
			$data['potongan']= $this->M_potongan->get_potongan()->row_array();
			$data['pinjaman_kop'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP')->result_array();
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
				// // KOP
				// if ($data['pinjaman_kop'][$key]['id_pegawai'] == $data['pegawais'][$key]['id_pegawai']) {
				// 	$data['pegawais'][$key]['nominal_kop'] = $data['pinjaman_kop'][$key]['nominal'];
				// }
				// // BANK
				// if ($data['pinjaman_bank'][$key]['id_pegawai'] == $data['pegawais'][$key]['id_pegawai']) {
				// 	$data['pegawais'][$key]['nominal_bank'] = $data['pinjaman_bank'][$key]['nominal'];
				// }
			}
			
			// var_dump($month_today);
			// var_dump($data['pegawais']);
			// var_dump($data['jabatans']);
			// var_dump($data['keluargas']);
			// var_dump($data['anggotas']);
			// var_dump($data['count_klg_hidup']);
			// var_dump($data['keluargas']);
			// var_dump($list_klg);
			// var_dump($complete_klg);
			// var_dump($deff);
			// var_dump('honor: '.$honor);
			// var_dump('pasangan: '.$data['pasangan']);
			// var_dump('anak1: '.$data['anak1']);
			// var_dump('anak2: '.$data['anak2']);
			// var_dump('tunjangan jbt: '.$data['tunjangan_keluarga']);
			// var_dump($data['jabatans']);
			// var_dump($data['jabatan']);
			// var_dump($data['potongan']);
			// var_dump($data['pinjaman_kop']);
			// var_dump($data['pinjaman_bank']);
			// var_dump($data['angsuran_kop']);
			// var_dump($data['angsuran_bank']);

			if (authUserLevel() == TRUE){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$this->template->load('index','gaji/table_gaji',$data);
		}
	}

	public function detail_gaji($id_pegawai = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$date_today = date('Y-m-d'); // tanggal sekarang
			$month_today = date('Y-m'); // bulan & tahun ini
			$data['title'] = 'Detail Gaji';
			$data['desc'] = month($date_today).' '.date('Y', strtotime($date_today));
			$data['month'] = $month_today;
			// Tunjangan
			$data['pegawai'] = $this->M_pegawai->get_pegawai($id_pegawai)->row_array();
			$data['keluargas_fetch'] = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
			$data['tunjangan'] = $this->M_tunjangan->get_tunjangan()->row_array();
			// Tunjangan Keluarga
			// cari dan hitung keluarga yang berstatus hidup 
			$data['keluargas'] = array();
			$list_klg = array();
			foreach ($data['keluargas_fetch'] as $key => $keluarga) {
				if (($data['keluargas_fetch'] != NULL) && ($keluarga['s_hidup'] == 1)) {
					$data['keluargas'][$key]['id_anggota_klg'] = $keluarga['id_anggota_klg'];														
					$data['keluargas'][$key]['id_status'] = $keluarga['id_status'];														
					$data['keluargas'][$key]['nama'] = $keluarga['nama'];	
					$list_klg[] = $keluarga['id_status'];	
				} 
			} 
			$data['count_klg_hidup'] = count($data['keluargas']); // anggota yang hidup
			// hitung tunjangan sesuai status anggota keluarga
			$complete_klg = array(0 => '1', 1 => '2', 2 => '3');
			$deff = array_diff($complete_klg, $list_klg);
			$honor = ($data['pegawai']['honor'] != NULL) ? $data['pegawai']['honor'] : 0;
			$data['anggotas'] = array();
			if (!empty($data['keluargas'])) {
				// set anggota keluarga yang berstatus hidup di kali honor
				foreach ($list_klg as $i => $value) {
					switch ($value) {
						case '1':
							$data['pasangan'] = $honor*$data['tunjangan']['klg_psg'];
							$data['anggotas'][0] = 'Pasangan';
							break;
						case '2':
							$data['anak1'] = $honor*$data['tunjangan']['klg_anak'];
							$data['anggotas'][1] = 'Anak Pertama';
							break;
						case '3':
							$data['anak2'] = $honor*$data['tunjangan']['klg_anak'];
							$data['anggotas'][2] = 'Anak Kedua';
							break;
					}
					// echo $value;
				}
				// set anggota keluargga meningggal sebagai NULL
				foreach ($deff as $j => $value) {
					switch ($complete_klg[$j]) {
						case '1':
							$data['pasangan'] = 0;
							break;
						case '2':
							$data['anak1'] = 0;
							break;
						case '3':
							$data['anak2'] = 0;
							break;
					}
				}
			} else {
				$data['pasangan'] = 0;
				$data['anak1'] = 0;
				$data['anak2'] = 0;
			}
			$data['tunjangan_keluarga'] = $data['pasangan']+$data['anak1']+$data['anak2'];
			// Tunjangan Jabatan
			$jabatan_val = $data['tunjangan']['jabatan']; // nilai potongan jabatan
			$data['jabatans'] = $this->M_gaji->get_jabatan($id_pegawai, $jabatan_val, $detail = TRUE)->result_array();
			$data['jabatan'] = $this->M_gaji->get_jabatan($id_pegawai, $jabatan_val, $detail = FALSE)->row_array();
			
			// Potongan
			$data['potongan']= $this->M_potongan->get_potongan()->row_array();
			$data['pinjaman_kop'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP')->row_array();
			$data['pinjaman_bank'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'BANK')->row_array();
			// cek pinjaman kop ada atau tidak
			if ($data['pinjaman_kop'] != NULL) {
				$id_pinjaman_kop = $data['pinjaman_kop']['id_pinjaman'];
				$data['angsuran_kop'] = $this->M_gaji->get_angsuran($id_pinjaman = $id_pinjaman_kop, $kode = 'KOP')->result_array();
				// ambil angsuran kop bulan ini
				foreach ($data['angsuran_kop'] as $key => $kop) {
					if (date('Y-m', strtotime($kop['tanggal_kembali'])) == $month_today) {
						// if ($kop['payOff_byGaji'] == 1) {
							$data['angsuran_kop'] = $data['angsuran_kop'][$key];
						// }
					}
				}
				
			} else {
				// $data['angsuran_bank'] = $this->M_gaji->get_angsuran_payOff_byGaji($id_pegawai, $kode = 'BANK')->result_array();
				$data['angsuran_kop'] = NULL;

			}
			// cek pinjaman bank ada atau tidak
			if ($data['pinjaman_bank'] != NULL) {
				$id_pinjaman_bank = $data['pinjaman_bank']['id_pinjaman'];
				$data['angsuran_bank'] = $this->M_gaji->get_angsuran($id_pinjaman = $id_pinjaman_bank, $kode = 'BANK')->result_array();
				// ambil angsuran bank bulan ini
				foreach ($data['angsuran_bank'] as $key => $bank) {
					if (date('Y-m', strtotime($bank['tanggal_kembali'])) == $month_today) {
						// if ($kop['payOff_byGaji'] == 1) {
							$data['angsuran_bank'] = $data['angsuran_bank'][$key];
						// }
					}
				}
			} else {
				// $data['angsuran_bank'] = $this->M_gaji->get_angsuran_payOff_byGaji($id_pegawai, $kode = 'BANK')->result_array();
				$data['angsuran_bank'] = NULL;
			}
			
			var_dump($month_today);
			// var_dump($data['anggotas']);
			// var_dump($data['count_klg_hidup']);
			// var_dump($data['keluargas']);
			// var_dump($list_klg);
			// var_dump($complete_klg);
			// var_dump($deff);
			// var_dump('honor: '.$honor);
			// var_dump('pasangan: '.$data['pasangan']);
			// var_dump('anak1: '.$data['anak1']);
			// var_dump('anak2: '.$data['anak2']);
			// var_dump('tunjangan jbt: '.$data['tunjangan_keluarga']);
			// var_dump($data['pegawai']);
			// var_dump($data['keluargas_fetch']);
			// var_dump($data['tunjangan']);
			// var_dump($data['jabatans']);
			// var_dump($data['jabatan']);
			// var_dump($data['potongan']);
			// var_dump($data['pinjaman_kop']);
			// var_dump($data['pinjaman_bank']);
			// var_dump($data['angsuran_kop']);
			// var_dump($data['angsuran_bank']);

			// $res = array(
			// 	'' => 
			// )
			if (authUserLevel() == TRUE){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$this->template->load('index','gaji/detail_gaji',$data);
		}
	}

	public function pay_print_gaji($id_pegawai, $id_angsuran)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLevel() == TRUE){
				$explode = explode('-', $id_angsuran);
				$id_kop = $explode[0];
				$id_bank = $explode[1];

				var_dump($id_pegawai);
				var_dump($id_kop);
				var_dump($id_bank);

				$res['repay'] = $this->M_gaji->repay($id_kop, $id_bank);
				if ($res) {
					redirect('detail/'.$id_pegawai);
				} else {
					echo "<h2> Gagal Memproses Data </h2>";
				}
			} else {
				redirect('detail/'.$id_pegawai);
			}
		}
		
		
		 
		// $this->load->model('M_gaji');
		// $data['tampil']= $this->M_gaji->get_gaji()->result_array();

		// $this->template->load('index','gaji/print_det_gaji',$data);
	}

	public function print_gaji($id_pegawai){
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$date_today = date('Y-m-d'); // tanggal sekarang
			$month_today = date('Y-m'); // bulan & tahun ini
			$data['title'] = 'Print Gaji';
			$data['desc'] = month($date_today).' '.date('Y', strtotime($date_today));
			$data['month'] = $month_today;

			// Tunjangan
			$data['tunjangan'] = $this->M_tunjangan->get_tunjangan()->row_array();
			$data['pegawai'] = $this->M_pegawai->get_pegawai($id_pegawai)->row_array();
			$data['keluargas'] = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
			$jabatan_val = $data['tunjangan']['jabatan'];
			$data['jabatans'] = $this->M_gaji->get_jabatan_all($id_pegawai, $jabatan_val)->result_array();
			
			// Potongan
			$data['potongan']= $this->M_potongan->get_potongan()->row_array();
			$data['pinjaman_kop'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP')->row_array();
			$data['pinjaman_bank'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'BANK')->row_array();

			foreach ($data['keluargas'] as $key => $value) {
				// Keluarga
				if ($data['keluargas'][$key]['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['klg_hidup'] = $data['keluargas'][$key]['klg_hidup'];
					$data['pegawai']['keluarga'] = $data['keluargas'][$key]['keluarga'];
					$data['pegawai']['status_klg'] = explode('-', $data['keluargas'][$key]['keluarga']);
				}
			}
			foreach ($data['jabatans'] as $key => $value) {
				// Jabatan
				if ($data['jabatans'][$key]['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['jabatan'] = $data['jabatans'][$key]['nominal_jbt'];
				}
			}

			if ($data['pinjaman_kop'] != NULL) {
				// KOP
				if ($data['pinjaman_kop']['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['nominal_kop'] = $data['pinjaman_kop']['nominal'];
				}
			}
			if ($data['pinjaman_bank'] != NULL) {
				// BANK
				if ($data['pinjaman_bank']['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['nominal_bank'] = $data['pinjaman_bank']['nominal'];
				}
			}
			
			
			
			// var_dump($month_today);
			var_dump($data['pegawai']);
			// var_dump($data['jabatans']);
			// var_dump($data['keluargas']);
			// var_dump($data['anggotas']);
			// var_dump($data['count_klg_hidup']);
			// var_dump($data['keluargas']);
			// var_dump($list_klg);
			// var_dump($complete_klg);
			// var_dump($deff);
			// var_dump('honor: '.$honor);
			// var_dump('pasangan: '.$data['pasangan']);
			// var_dump('anak1: '.$data['anak1']);
			// var_dump('anak2: '.$data['anak2']);
			// var_dump('tunjangan jbt: '.$data['tunjangan_keluarga']);
			// var_dump($data['jabatans']);
			// var_dump($data['jabatan']);
			// var_dump($data['potongan']);
			// var_dump($data['pinjaman_kop']);
			// var_dump($data['pinjaman_bank']);
			// var_dump($data['angsuran_kop']);
			// var_dump($data['angsuran_bank']);

			if (authUserLevel() == TRUE){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$this->template->load('index','gaji/table_gaji',$data);
		}

	}
}
