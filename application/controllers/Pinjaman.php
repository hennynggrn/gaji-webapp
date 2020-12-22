<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

	public function index($id = NULL)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			$data['title']= 'Tabel Pinjaman';
			$today_date = date('Y-m-d');
			$data['today_month'] = month(date('Y-m-d'));
			$data['today_year'] = date('Y', strtotime($today_date));
			$data['pinjamans'] = $this->M_pinjaman->get_pinjaman($id)->result_array();
			foreach($data['pinjamans'] as $key => $value){
				$start_date = $data['pinjamans'][$key]['start_date'];
				$end_date = $data['pinjamans'][$key]['end_date'];

				$data['pinjamans'][$key]['start_date_IDN'] = fullConvertIDN($start_date, $short = NULL, $day = FALSE);
				$data['pinjamans'][$key]['s_start_date_IDN'] = fullConvertIDN($start_date, $short = TRUE,  $day = TRUE);
				$data['pinjamans'][$key]['f_start_date_IDN'] = fullConvertIDN($start_date, $short = FALSE,  $day = TRUE);
				$data['pinjamans'][$key]['start_month_IDN'] = month($start_date);
				$data['pinjamans'][$key]['start_day_IDN'] = day($start_date);
				$data['pinjamans'][$key]['start_year_IDN'] = date('Y', strtotime($start_date));

				$data['pinjamans'][$key]['end_date_IDN'] = fullConvertIDN($end_date, $short = NULL, $day = FALSE);
				$data['pinjamans'][$key]['s_end_date_IDN'] = fullConvertIDN($end_date, $short = TRUE,  $day = TRUE);
				$data['pinjamans'][$key]['f_end_date_IDN'] = fullConvertIDN($end_date, $short = FALSE,  $day = TRUE);
				$data['pinjamans'][$key]['end_month_IDN'] = month($end_date);
				$data['pinjamans'][$key]['end_day_IDN'] = day($end_date);
				$data['pinjamans'][$key]['end_year_IDN'] = date('Y', strtotime($end_date));
			}
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$this->template->load('index','pinjaman/table_pinjaman', $data);
		}
		// var_dump($data['pinjamans']);
	}

	public function add_pinjaman($id = NULL) 
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$data['title']= 'Tambah Pinjaman';
				$data['pegawais'] = $this->M_pinjaman->get_pegawai_pinjaman($id)->result_array();
				foreach ($data['pegawais'] as $key => $value) {
					if ($data['pegawais'][$key]['status_pjm'] == NULL) {
						$data['pegawais'][$key]['status_pjm'] = 'OpenLoan';
					} else if ((strpos($value['status_pjm'], 'BANK0') !== FALSE) && (strpos($value['status_pjm'], 'KOP0') !== FALSE)) {
						$data['pegawais'][$key]['status_pjm'] = 'OnBankKop';
					} else if (strpos($value['status_pjm'], 'BANK0') !== FALSE) {
						$data['pegawais'][$key]['status_pjm'] = 'OnBank';
					} else if (strpos($value['status_pjm'], 'KOP0') !== FALSE) {
						$data['pegawais'][$key]['status_pjm'] = 'OnKop';
					} 
				}
				$this->template->load('index','pinjaman/add_pinjaman',$data);
			} else {
				redirect('pinjaman');
			}
		}
	}

	public function insert_pinjaman()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$res['pinjaman'] = $this->M_pinjaman->add_pinjaman();
				$last_id = $res['pinjaman'];
				$res['angsuran'] = $this->M_pinjaman->add_angsuran($last_id);

				if ($res) {
					redirect('pinjaman');
				} else {
					echo "<h2> Gagal Tambah Data Pinjaman </h2>";
				}
			} else {
				redirect('pinjaman');
			}
		}
	}

	public function detail_pinjaman($id = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			$data['title'] = 'Detail Pinjaman';
			$data['pinjaman'] = $this->M_pinjaman->get_pinjaman($id)->row_array();
			$data['angsurans'] = $this->M_pinjaman->get_angsuran($id)->result_array();
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$data['hide'] = FALSE;
			} else {
				$data['hide'] = TRUE;
			}
			$this->template->load('index','pinjaman/detail_pinjaman', $data);
		}
	}

	public function pay_pinjaman($id = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$data['title'] = 'Bayar Angsuran Pinjaman';
				$data['pay'] = TRUE;
				$data['pinjaman'] = $this->M_pinjaman->get_pinjaman($id)->row_array();
				$data['angsurans'] = $this->M_pinjaman->get_angsuran($id)->result_array();
				$this->template->load('index','pinjaman/detail_pinjaman', $data);
			} else {
				redirect('pinjaman');
			}
		}
	}

	public function update_repay()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$res['angsuran'] = $this->M_pinjaman->update_repay();
				$id = $this->input->post('id_pinjaman');
				$pinjaman = $this->M_pinjaman->get_pinjaman($id)->row_array();
				if ($pinjaman['jml_angsuran']-$pinjaman['status_ang'] == 0) {
					$status = 1;
				} else {
					$status = 0;
				}
				$res['pinjaman'] = $this->M_pinjaman->update_status_pinjaman($id, $status);

				if ($res) {
					redirect('pinjaman/pay/'.$id);
				} else {
					echo "<h2> Gagal Tambah Data Pinjaman </h2>";
				}
			} else {
				redirect('pinjaman');
			}
		}
	}
	

	public function edit_pinjaman($id = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$data['title']= 'Edit Pinjaman';
				$data['pegawais'] = $this->M_pinjaman->get_pegawai_pinjaman($id)->result_array();
				$data['pinjaman'] = $this->M_pinjaman->get_pinjaman($id)->row_array();
				$data['angsurans'] = $this->M_pinjaman->get_angsuran($id)->result_array();
				$this->template->load('index','pinjaman/edit_pinjaman', $data);
			} else {
				redirect('pinjaman');
			}
		}
	}

	public function update_pinjaman()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$id_pinjaman = $this->input->post('id_pinjaman');
				$res['pinjaman'] = $this->M_pinjaman->update_pinjaman($id_pinjaman);
				$res['angsuran'] = $this->M_pinjaman->update_angsuran($id_pinjaman);
				
				if ($res) {
					redirect('pinjaman/pay/'.$id_pinjaman);
				} else {
					echo "<h2> Gagal Edit Data Pinjaman </h2>";
				}
			} else {
				redirect('pinjaman');
			}
		}
	}

	public function delete_pinjaman($id_pinjaman)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		} else {
			if($this->session->userdata('logged_in') && (($this->session->userdata('user_level_id') == 1) || ($this->session->userdata('user_level_id') == 2))){
				$res['pinjaman'] = $this->M_pinjaman->delete_pinjaman($id_pinjaman);
				if ($res) {
					redirect('pinjaman');
				} else {
					echo "<h2> Gagal Menghapus Data Pinjaman </h2>";
				}
			} else {
				redirect('pinjaman');
			}
		}
	}
}

