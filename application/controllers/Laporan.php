<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index($id_date = NULL)
	{
		getDateZone();
		$data['title'] = 'Tabel Laporan';
		$data['laporans'] = $this->M_laporan->get_gaji($id_date)->result_array();
		$this->template->load('index','laporan/table_laporan', $data);
		// var_dump($data);
	}

	public function detail()
	{
		getDateZone();
		$id_date = $this->uri->segment(3);
		$data['id_date'] = $id_date;
		$data['title'] = 'Detail Laporan';
		$data['desc'] = month($id_date).' '.year($id_date);
		$data['gajis'] = $this->M_laporan->get_gaji($id_date)->result_array();
		$data['tunjangan'] = $this->M_laporan->get_tunjangan($id_date)->row_array();
		$this->template->load('index','laporan/detail_laporan', $data);
		// var_dump($data['gajis']);
	}
}
?>
 