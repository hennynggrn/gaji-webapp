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
			$data['jabatans'] = $this->M_gaji->get_jabatan($id_pegawai, $jabatan_val)->result_array();
			
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
				// KOP
				if ($data['pinjaman_kop'][$key]['id_pegawai'] == $data['pegawais'][$key]['id_pegawai']) {
					$data['pegawais'][$key]['nominal_kop'] = $data['pinjaman_kop'][$key]['nominal'];
				}
				// BANK
				if ($data['pinjaman_bank'][$key]['id_pegawai'] == $data['pegawais'][$key]['id_pegawai']) {
					$data['pegawais'][$key]['nominal_bank'] = $data['pinjaman_bank'][$key]['nominal'];
				}
			}
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
			$data['title'] = 'Print Gaji';
			$data['desc'] = month($date_today).' '.date('Y', strtotime($date_today));
			$data['month'] = $month_today;

			// Tunjangan
			$data['tunjangan'] = $this->M_tunjangan->get_tunjangan()->row_array();
			$data['pegawai'] = $this->M_pegawai->get_pegawai($id_pegawai)->row_array();
			$data['keluargas'] = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
			$jabatan_val = $data['tunjangan']['jabatan'];
			$data['jabatan'] = $this->M_gaji->get_jabatan($id_pegawai, $jabatan_val)->row_array();
			$data['jabatans'] = $this->M_gaji->get_jabatan_detail($id_pegawai, $jabatan_val)->result_array();
			
			// Potongan
			$data['potongan']= $this->M_potongan->get_potongan()->row_array();
			$data['pinjaman_kop'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'KOP')->row_array();
			$data['pinjaman_bank'] = $this->M_gaji->get_pinjaman($id_pegawai, $kode = 'BANK')->row_array();

			// Keluarga
			foreach ($data['keluargas'] as $key => $value) {
				if ($data['keluargas'][$key]['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['klg_hidup'] = $data['keluargas'][$key]['klg_hidup'];
					$data['pegawai']['keluarga'] = $data['keluargas'][$key]['keluarga'];
					$data['pegawai']['status_klg'] = explode('-', $data['keluargas'][$key]['keluarga']);
				}
			}

			// Jabatan
			if (!empty($data['jabatan'])) {
				if ($data['jabatan']['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['jabatan'] = $data['jabatan']['nominal_jbt'];
				}
			}

			if ($data['pinjaman_kop'] != NULL) {
				// KOP
				if ($data['pinjaman_kop']['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['nominal_kop'] = $data['pinjaman_kop']['nominal'];
					$data['pegawai']['id_kop'] = $data['pinjaman_kop']['id_angsuran'];
				}
			}
			if ($data['pinjaman_bank'] != NULL) {
				// BANK
				if ($data['pinjaman_bank']['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['nominal_bank'] = $data['pinjaman_bank']['nominal'];
					$data['pegawai']['id_bank'] = $data['pinjaman_bank']['id_angsuran'];
				}
			}
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
			$data['month'] = month($date_today).' '.date('Y', strtotime($date_today));

			// Tunjangan
			$data['tunjangan'] = $this->M_tunjangan->get_tunjangan()->row_array();
			$data['bendahara'] = $this->M_jabatan->get_bendahara($id_jabatan = '2', $jabatan = 'Bendahara')->row_array();
			$data['pegawai'] = $this->M_pegawai->get_pegawai($id_pegawai)->row_array();
			$data['keluargas'] = $this->M_keluarga->get_anggota_keluarga($id_pegawai)->result_array();
			$jabatan_val = $data['tunjangan']['jabatan'];
			$data['jabatan'] = $this->M_gaji->get_jabatan($id_pegawai, $jabatan_val)->row_array();
			$data['jabatans'] = $this->M_gaji->get_jabatan_detail($id_pegawai, $jabatan_val)->result_array();
			
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

			// Jabatan
			if (!empty($data['jabatan'])) {
				if ($data['jabatan']['id_pegawai'] == $data['pegawai']['id_pegawai']) {
					$data['pegawai']['jabatan'] = $data['jabatan']['nominal_jbt'];
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
			if (authUserLevel() == TRUE){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$this->load->view('gaji/paycheck_output', $data);
		}
	}
}
