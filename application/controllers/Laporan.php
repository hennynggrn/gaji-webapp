<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		getDateZone();
		$data['title'] = 'Tabel Laporan';
		$data['gajis'] = $this->M_laporan->get_gaji()->result_array();
		$this->template->load('index','laporan/table_laporan', $data);
		// var_dump($data);
	}
}
?>
 