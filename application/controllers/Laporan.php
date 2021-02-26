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
		// getDateZone();
		// $id_date = $this->uri->segment(3);
		// $date = explode('-', $id_date);
		// $month = $date[1];
		// $year = year($id_date);
		// $data['id_date'] = $id_date;
		$data = $this->data_laporan();
		$data['title'] = 'Detail Laporan';
		$data['desc'] = month($data['id_date']).' '.year($data['id_date']);
		// $data['gajis'] = $this->M_laporan->get_gaji($month, $year)->result_array();
		// $data['tunjangan'] = $this->M_laporan->get_tunjangan($month, $year)->row_array();
		// $data['potongan'] = $this->M_laporan->get_potongan($month, $year)->row_array();
		$this->template->load('index','laporan/detail_laporan', $data);
		// var_dump($id_date);
		// var_dump($data['gajis']);
		// var_dump($data['potongan']);
	}

	public function print()
	{
		$data = $this->data_laporan();
		$this->load->view('laporan/print_laporan', $data);
		// var_dump($id_date);
		// var_dump($data['gajis']);
		// var_dump($data['potongan']);
	}

	public function preview()
	{
		$data = $this->data_laporan();
		$data['title'] = 'Pratinjau Laporan';
		$data['desc'] = month($data['id_date']).' '.year($data['id_date']);
		$this->template->load('index','laporan/preview_laporan', $data);
		// var_dump($id_date);
		// var_dump($data['gajis']);
		// var_dump($data['potongan']);
	}

	public function delete_laporan($id_date)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if (authUserLevel() == TRUE){
				$date = explode('-', $id_date);
				$month = $date[1];
				$year = year($id_date);
				$res['laporan'] = $this->M_laporan->delete_laporan($month, $year);
				if ($res) {
					$this->session->set_flashdata('message_success', 'Laporan berhasil dihapus');
					redirect('laporan');
				} else {
					$this->session->set_flashdata('message_failed', 'Laporan gagal dihapus');
					redirect('laporan');
				}
				// var_dump($month);
				// var_dump($year);
			} else {
				redirect('laporan');
			}
		}
	} 

	private function data_laporan()
	{
		getDateZone();
		$id_date = $this->uri->segment(3);
		$date = explode('-', $id_date);
		$month = $date[1];
		$year = year($id_date);
		$data['id_date'] = $id_date;
		$data['month'] = month(date('Y-m-d')).' '.date('Y', strtotime(date('Y-m-d')));
		$data['today_date'] = fullConvertIDN(date('Y-m-d'), $short = NULL, $day = FALSE);
		$data['kepsek'] = $this->M_jabatan->get_pegawai_auth($id_jabatan = '1', $jabatan = 'Kepala Sekolah')->row_array();
		$data['bendahara'] = $this->M_jabatan->get_pegawai_auth($id_jabatan = '2', $jabatan = 'Bendahara')->row_array();
		$data['gajis'] = $this->M_laporan->get_gaji($month, $year)->result_array();
		$data['tunjangan'] = $this->M_laporan->get_tunjangan($month, $year)->row_array();
		$data['masakerjas']= $this->M_laporan->get_masakerja()->result_array();
		$data['potongan'] = $this->M_laporan->get_potongan($month, $year)->row_array();
		$data['honor_total'] = 0;
		$data['tunjangan_total'] = 0;
		$data['potongan_total'] = 0;
		$data['gaji_total'] = 0;
		foreach ($data['gajis'] as $key => $gaji) {
			$data['honor_total'] += $gaji['honor'];
			$data['tunjangan_total'] += $gaji['tunjangan'];
			$data['potongan_total'] += $gaji['potongan'];
			$data['gaji_total'] += $gaji['gaji'];
		}
		// $this->load->view('laporan/print_laporan', $data);
		// var_dump($id_date);
		// var_dump($data['gajis']);
		// var_dump($data['potongan']);
		return $data;
	}
}
?>
 