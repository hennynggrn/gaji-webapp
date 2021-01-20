<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index($month = NULL, $year = NULL)
	{
		getDateZone();
		$data['title'] = 'Tabel Laporan';
		$data['laporans'] = $this->M_laporan->get_gaji($month, $year)->result_array();
		$this->template->load('index','laporan/table_laporan', $data);
		// var_dump($data);
	}

	public function detail()
	{
		getDateZone();
		$id_date = $this->uri->segment(3);
		$date = explode('-', $id_date);
		$month = $date[1];
		$year = year($id_date);
		$data['id_date'] = $id_date;
		$data['title'] = 'Detail Laporan';
		$data['desc'] = month($id_date).' '.year($id_date);
		$data['gajis'] = $this->M_laporan->get_gaji($month, $year)->result_array();
		$data['tunjangan'] = $this->M_laporan->get_tunjangan($month, $year)->row_array();
		$data['potongan'] = $this->M_laporan->get_potongan($month, $year)->row_array();
		$this->template->load('index','laporan/detail_laporan', $data);
		var_dump($id_date);
		// var_dump($data['gajis']);
		var_dump($data['potongan']);
	}

	public function print()
	{
		getDateZone();
		$id_date = $this->uri->segment(3);
		$date = explode('-', $id_date);
		$month = $date[1];
		$year = year($id_date);
		$data['id_date'] = $id_date;
		$data['title'] = 'Print Laporan';
		$data['desc'] = month($id_date).' '.year($id_date);
		$data['month'] = month(date('Y-m-d')).' '.date('Y', strtotime(date('Y-m-d')));
		$data['today_date'] = fullConvertIDN(date('Y-m-d'), $short = NULL, $day = FALSE);
		$data['kepsek'] = $this->M_jabatan->get_pegawai_auth($id_jabatan = '1', $jabatan = 'Kepala Sekolah')->row_array();
		$data['bendahara'] = $this->M_jabatan->get_pegawai_auth($id_jabatan = '2', $jabatan = 'Bendahara')->row_array();
		$data['gajis'] = $this->M_laporan->get_gaji($month, $year)->result_array();
		$data['tunjangan'] = $this->M_laporan->get_tunjangan($month, $year)->row_array();
		$data['potongan'] = $this->M_laporan->get_potongan($month, $year)->row_array();
		$data['honor'] = 0;
		$data['tunjangan'] = 0;
		$data['potongan'] = 0;
		$data['gaji_total'] = 0;
		foreach ($data['gajis'] as $key => $gaji) {
			$data['honor'] += $gaji['honor'];
			$data['tunjangan'] += $gaji['tunjangan'];
			$data['potongan'] += $gaji['potongan'];
			$data['gaji_total'] += $gaji['gaji'];
		}
		$this->load->view('laporan/print_laporan', $data);
		// var_dump($id_date);
		// var_dump($data['gajis']);
		// var_dump($data['potongan']);
	}

	public function preview()
	{
		getDateZone();
		$id_date = $this->uri->segment(3);
		$date = explode('-', $id_date);
		$month = $date[1];
		$year = year($id_date);
		$data['id_date'] = $id_date;
		$data['title'] = 'Pratinjau Laporan';
		$data['desc'] = month($id_date).' '.year($id_date);
		$data['month'] = month(date('Y-m-d')).' '.date('Y', strtotime(date('Y-m-d')));
		$data['today_date'] = fullConvertIDN(date('Y-m-d'), $short = NULL, $day = FALSE);
		$data['kepsek'] = $this->M_jabatan->get_pegawai_auth($id_jabatan = '1', $jabatan = 'Kepala Sekolah')->row_array();
		$data['bendahara'] = $this->M_jabatan->get_pegawai_auth($id_jabatan = '2', $jabatan = 'Bendahara')->row_array();
		$data['gajis'] = $this->M_laporan->get_gaji($month, $year)->result_array();
		$data['tunjangan'] = $this->M_laporan->get_tunjangan($month, $year)->row_array();
		$data['potongan'] = $this->M_laporan->get_potongan($month, $year)->row_array();
		$data['honor'] = 0;
		$data['tunjangan'] = 0;
		$data['potongan'] = 0;
		$data['gaji_total'] = 0;
		foreach ($data['gajis'] as $key => $gaji) {
			$data['honor'] += $gaji['honor'];
			$data['tunjangan'] += $gaji['tunjangan'];
			$data['potongan'] += $gaji['potongan'];
			$data['gaji_total'] += $gaji['gaji'];
		}
		$this->template->load('index','laporan/preview_laporan', $data);
		// var_dump($id_date);
		// var_dump($data['gajis']);
		// var_dump($data['potongan']);
	}
}
?>
 