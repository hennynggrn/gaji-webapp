<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pinjaman extends CI_Model{ 

	public function get_pinjaman($id = TRUE)
	{
		if ($id != NULL) {
			$this->db->select('*, pjm.id_pinjaman, count(a.id_angsuran) jml_angsuran, max(a.tanggal_kembali) end_date, max(a.paid_date) paid_date,
							   sum(a.status) status_ang, pjm.status status_pjm');
			$this->db->join('angsuran a', 'a.id_pinjaman = pjm.id_pinjaman', 'LEFT');
			$this->db->join('pegawai p', 'p.id_pegawai = pjm.id_pegawai', 'LEFT');
			$this->db->group_by('pjm.id_pinjaman');
			return $this->db->get_where('pinjaman pjm', array('pjm.id_pinjaman' => $id));
		} else {
			$this->db->select('*, pjm.id_pinjaman, count(a.id_angsuran) jml_angsuran, max(a.tanggal_kembali) end_date, 
							   sum(a.status) status_ang, pjm.status status_pjm');
			$this->db->order_by('pjm.start_date', 'DESC');
			$this->db->join('angsuran a', 'a.id_pinjaman = pjm.id_pinjaman', 'LEFT');
			$this->db->join('pegawai p', 'p.id_pegawai = pjm.id_pegawai', 'LEFT');
			$this->db->group_by('pjm.id_pinjaman');
			return $this->db->get('pinjaman pjm');
		}
	}

	public function get_pegawai_pinjaman($id = TRUE)
	{
		if ($id != NULL) {
			$this->db->select('*, p.id_pegawai, pjm.id_pegawai pegawai');
			$this->db->join('pinjaman pjm', 'p.id_pegawai = pjm.id_pegawai AND pjm.id_pinjaman ='.$id, 'LEFT');
			return $this->db->get('pegawai p');
		} else {
			$this->db->select('*, p.id_pegawai, pjm.id_pegawai pegawai, 
							   GROUP_CONCAT(DISTINCT CONCAT(pjm.kode_pinjaman, pjm.status) ORDER BY pjm.status ASC SEPARATOR "") status_pjm');
			$this->db->join('pinjaman pjm', 'p.id_pegawai = pjm.id_pegawai', 'LEFT');
			$this->db->join('angsuran a', 'a.id_pinjaman = pjm.id_pinjaman', 'LEFT');
			$this->db->group_by('p.id_pegawai');
			return $this->db->get('pegawai p');
		}
	}

	public function get_angsuran($id = TRUE, $id_angsuran)
	{
		if ($id != NULL) {
			$this->db->select('*');
			$this->db->order_by('tanggal_kembali');
			return $this->db->get_where('angsuran a', array('a.id_pinjaman' => $id));
		} else {
			$this->db->select('*');
			$this->db->order_by('tanggal_kembali');
			return $this->db->get_where('angsuran a', array('a.id_angsuran' => $id_angsuran));
		}
		
	}
	
	public function add_pinjaman()
	{
		$pegawai = $this->input->post('pegawai');
		$kode = $this->input->post('kode');
		$tgl_pjm = $this->input->post('tgl_pjm');
		$total_pjm = $this->input->post('total_pjm');
		$ket_pjm = $this->input->post('ket_pjm');
		// var_dump($_POST);
		$data = array(
			'id_pegawai' => $pegawai,
			'kode_pinjaman' => $kode,
			'start_date' => $tgl_pjm,
			'total_pinjaman' => $total_pjm,
			'ket_pinjaman' => $ket_pjm,
		);
		$this->db->insert("pinjaman", $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function add_angsuran($last_id)
	{
		$ids = $this->input->post('ids');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$nominal = $this->input->post('nominal');
		foreach ($ids as $i => $value) {
			$data = array(
				'id_pinjaman' => $last_id,
				'tanggal_kembali' => $tgl_kembali[$i],
				'nominal' => $nominal[$i], 
				'status' => 0,
				'payOff_byGaji' => 0
			);
			$this->db->insert("angsuran", $data);
		}
	}

	public function update_repay()
	{
		$repay = $this->input->post('repay');
		$payOff_byGaji = $this->input->post('payOff_byGaji');
		$id_angsuran = $this->input->post('id_angsuran');
		$paid_date = NULL;
		$cancel_date = NULL;
		if ($repay == 1) {
			$paid_date = date('Y-m-d h:i:s');
		} else {
			$cancel_date = date('Y-m-d h:i:s');
		}
		$data = array(
			'status' => $repay, 
			'payOff_byGaji' => $payOff_byGaji,
			'paid_date' => $paid_date,
			'cancel_date' => $cancel_date
		);
		$this->db->where('id_angsuran', $id_angsuran);
		return $this->db->update('angsuran', $data);
	}

	public function update_pinjaman($id_pinjaman)
	{
		$pegawai = $this->input->post('pegawai');
		$kode = $this->input->post('kode');
		$tgl_pjm = $this->input->post('tgl_pjm');
		$total_pjm = $this->input->post('total_pjm');
		$ket_pjm = $this->input->post('ket_pjm');
		// var_dump($_POST);
		$data = array(
			'id_pegawai' => $pegawai,
			'kode_pinjaman' => $kode,
			'start_date' => $tgl_pjm,
			'total_pinjaman' => $total_pjm,
			'ket_pinjaman' => $ket_pjm,
		);
		
		$this->db->where('id_pinjaman', $id_pinjaman);
		return $this->db->update('pinjaman', $data);
	}

	public function update_status_pinjaman($id, $status)
	{
		// var_dump($id);
		// var_dump($status);
		$this->db->where('id_pinjaman', $id);
		return $this->db->update('pinjaman', array('status' => $status));
	}

	public function update_angsuran($id_pinjaman)
	{
		$res['del'] = $this->delete_old_angsuran($id_pinjaman);
		$res['old'] = $this->update_old_angsuran();
		$res['new'] = $this->add_new_angsuran($id_pinjaman);

		return $res;
	}

	private function update_old_angsuran()
	{
		$id_angsuran = $this->input->post('id_angsuran');
		$idsField = $this->input->post('idsField');
		$tgl_kembaliField = $this->input->post('tgl_kembaliField');
		$nominalField = $this->input->post('nominalField');

		foreach ($idsField as $i => $value) {
			$data = array(
				'tanggal_kembali' => $tgl_kembaliField[$i],
				'nominal' => $nominalField[$i],
			);
			$this->db->update('angsuran', $data, array('id_angsuran' => $id_angsuran[$i]));
		}
	}

	private function add_new_angsuran($id_pinjaman)
	{
		$ids = $this->input->post('ids');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$nominal = $this->input->post('nominal');
		var_dump($ids);
		if (isset($ids)) {
			foreach ($ids as $i => $value) {
				if (($tgl_kembali[$i] != NULL) && ($nominal[$i] != NULL)) {
					$data = array(
						'id_pinjaman' => $id_pinjaman,
						'tanggal_kembali' => $tgl_kembali[$i],
						'nominal' => $nominal[$i],
						'status' => 0,
						'payOff_byGaji' => 0
					);
					$this->db->insert('angsuran', $data);
				}
			}
		}
	}

	private function delete_old_angsuran($id_pinjaman)
	{
		$id_angsuran = $this->input->post('id_angsuran');
		
		$angsuran = $this->db->get_where('angsuran', array('id_pinjaman' => $id_pinjaman))->result_array();
		$old_angsuran = array();
		foreach ($angsuran as $key => $value) {
			$old_angsuran[] = $angsuran[$key]['id_angsuran'];			
		}
		if (!empty($id_angsuran)) {
			$deff = array_diff($old_angsuran, $id_angsuran);
		} else {
			$deff = $old_angsuran;
		}
		
		foreach ($deff as $i => $value) {
			$this->db->where('id_angsuran', $value);
			$this->db->delete('angsuran');
		}
		// var_dump($deff);
	}

	public function delete_pinjaman($id_pinjaman)
	{
		$this->db->where('id_pinjaman', $id_pinjaman);
		return $this->db->delete('pinjaman');
	}
}
