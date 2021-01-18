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
}
?>
 