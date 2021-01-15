<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function index($id_pegawai = NULL) 
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else { 
			$data = $this->gaji_pegawai->get_data($id_pegawai);
			$data['title'] = 'Tabel Gaji';
			$data['setting'] = $this->M_setting->get_data()->row_array();
			$date_backup = $data['setting']['backup_date'];
			if ((date('d') >= $date_backup) && (date('Y-m') == $data['month'])) {
				$data['backup'] = TRUE;
			} else {
				$data['backup'] = FALSE;
			}
			// var_dump($data);
			$this->template->load('index','gaji/table_gaji', $data);
		}
	}

	public function detail_gaji($id_pegawai = TRUE)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$data = $this->gaji_pegawai->get_data($id_pegawai);
			$data['title'] = 'Detail Gaji';
			// var_dump($data);
			$this->template->load('index','gaji/detail_gaji',$data);
		}
	}

	public function print_gaji($id_pegawai)
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$data = $this->gaji_pegawai->get_data($id_pegawai);
			$this->load->view('gaji/paycheck_output', $data);
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
				$res['repay'] = $this->M_gaji->repay($id_kop, $id_bank);

				$kop = $this->M_pinjaman->get_angsuran($id = NULL, $id_kop)->row_array();
				$bank = $this->M_pinjaman->get_angsuran($id = NULL, $id_bank)->row_array();

				if ($kop != NULL) {
					$pinjaman_kop = $this->M_pinjaman->get_pinjaman($kop['id_pinjaman'])->row_array();
					if ($pinjaman_kop) {
						if ($pinjaman_kop['jml_angsuran']-$pinjaman_kop['status_ang'] == 0) {
							$status = 1;
						} else {
							$status = 0;
						}
						$res['pinjaman_kop'] = $this->M_pinjaman->update_status_pinjaman($pinjaman_kop['id_pinjaman'], $status);
					}
				}
				if ($bank != NULL) {
					$pinjaman_bank = $this->M_pinjaman->get_pinjaman($bank['id_pinjaman'])->row_array();
					if ($pinjaman_bank) {
						if ($pinjaman_bank['jml_angsuran']-$pinjaman_bank['status_ang'] == 0) {
							$status = 1;
						} else {
							$status = 0;
						}
						$res['pinjaman_bank'] = $this->M_pinjaman->update_status_pinjaman($pinjaman_bank['id_pinjaman'], $status);
					}
				}
				
				if ($res) {
					$this->session->set_flashdata('message_success', 'Pinjaman berhasil dibayar');
					$data = $this->gaji_pegawai($id_pegawai);
					$this->load->view('gaji/paycheck_output', $data);
				} else {
					$this->session->set_flashdata('message_failed', 'Pinjaman gagal dibayar');
					redirect('detail/'.$id_pegawai);
				}
			} else {
				redirect('detail/'.$id_pegawai);
			}
		}
	}

	public function search_gaji($id_pegawai = NULL) 
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        } else {
			$data = $this->gaji_pegawai->get_data($id_pegawai);
			$output = '';
			$query = '';
			$no = 1;
			$data_output = array();
			if($this->input->post('query'))
			{
				$query = $this->input->post('query'); 
			}
			if (!empty($data)) {
				$output .= '
							<table class="table table-bordered table-hover text-center" style="background-color: white;">
								<thead>
									<th>No</th>
									<th>Nama</th>
									<th>Honorarium</th>
									<th>Jumlah Tunjangan</th>
									<th>Jumlah Potongan</th>
									<th>Gaji Bersih</th>
									<th>Menu</th>
								</thead>
								<tbody>
					';
				// var_dump($data['pegawais']);
				foreach ($data['pegawais'] as $key => $pegawai) {
					if (($pegawai['honor'] != NULL) && ($pegawai['honor'] == 0)) {
						$honor = 'Rp. &nbsp;&nbsp; 0 &nbsp;&nbsp;<small>(belum ditentukan)</small>';
						$honor_val = 0;
					} else if (($pegawai['honor'] != NULL) && ($pegawai['honor'] != 0)) {
						$honor = 'Rp. &nbsp;&nbsp;'.number_format($pegawai['honor'],0,',','.');
						$honor_val = $pegawai['honor'];
					} else {
						$honor = 'Rp. &nbsp;&nbsp; 0';
						$honor_val = 0;
					}

					if ((stripos($pegawai['nama'], $query) !== FALSE) || stripos($pegawai['nbm'], $query) !== FALSE) {
						$data_output[$key] = $data['pegawais'][$key];
						$data_output[$key]['honor'] = $honor;
						$data_output[$key]['tunjangan'] = $pegawai['tunjangan_val'];
						$data_output[$key]['potongan'] = $pegawai['potongan_val'];
						$data_output[$key]['gaji'] = $pegawai['gaji_bersih'];
					} 

					if ($query == '') {
						$output .= '
							<tr>
								<td>'.$no++.'</td>
								<td style="text-align: left; padding-left: 15px;">'.$pegawai['nama'].'</td>
								<td style="text-align: left; padding-left: 15px;">'.$honor.'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($pegawai['tunjangan_val'],0,',','.').'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($pegawai['potongan_val'],0,',','.').'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($pegawai['gaji_bersih'],0,',','.').'</td>
								<td>
									<a href="'.site_url('detail/'.$pegawai['id_pegawai']).'" title="Detail" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<a href="'.site_url('print/'.$pegawai['id_pegawai']).'" target="_BLANK" title="Cetak" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-blue"><i class="fa fa-fw fa-print"></i></span>
									</a>
								</td>
							</tr>
						';
					}
				}

				if ((empty($data_output)) && ($query != '')) {
					$output .= '
						<tr>
							<td colspan="7" class="text-danger">Tidak ada data ditemukan.</td>
						</tr>
					';
				}
				
				foreach ($data_output as $key => $output_val) {
					if ($query != '') {
						$output .= '
							<tr>
								<td>'.$no++.'</td>
								<td style="text-align: left; padding-left: 15px;">'.$output_val['nama'].'</td>
								<td style="text-align: left; padding-left: 15px;">'.$output_val['honor'].'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($output_val['tunjangan'],0,',','.').'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($output_val['potongan'],0,',','.').'</td>
								<td style="text-align: left; padding-left: 15px;">Rp. &nbsp;&nbsp;'.number_format($output_val['gaji'],0,',','.').'</td>
								<td>
									<a href="'.site_url('detail/'.$output_val['id_pegawai']).'" title="Detail" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<a href="'.site_url('print/'.$output_val['id_pegawai']).'" target="_BLANK" title="Cetak" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-blue"><i class="fa fa-fw fa-print"></i></span>
									</a>
								</td>
							</tr>
						';
					}
				}
				
				$output .= '
								</tbody>
							</table">
					';
			}
			echo $output;
		}
	}
}
