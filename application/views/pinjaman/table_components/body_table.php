<tr>
	<td><?php echo $no++;?></td>
	<td style="text-align:left;"><?php echo $pinjaman['nama'];?></td>
	<td><?php echo $pinjaman['start_date_IDN'];?></td>
	<td><?php echo $pinjaman['end_date_IDN'];?></td>
	<td style="text-align:left;"><?php echo 'Rp. '.number_format($pinjaman['total_pinjaman'],0,',','.');?></td>
	<td><?php echo $pinjaman['jml_angsuran'].' kali';
			if (($pinjaman['status_ang'] != 0) && ($pinjaman['status_ang'] != $pinjaman['jml_angsuran'])) {
				echo ' <br><small class="text-green">('.$pinjaman['status_ang'].' angsuran terbayar)</small>';
			}?></td>
	<td><?php echo ($pinjaman['status_pjm'] == 1) ? '<span class="badge bg-green">Lunas</span>' : '<span class="badge bg-red">Belum Lunas</span>';?></td>
	<td>
		<a href="<?php echo site_url('pinjaman/detail/'.$pinjaman['id_pinjaman']);?>" title="Detail" data-tooltip="tooltip" data-placement="top">
			<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
		</a> 
		<a href="<?php echo site_url('pinjaman/edit/'.$pinjaman['id_pinjaman']);?>" title="Edit" data-tooltip="tooltip" data-placement="top">
			<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
		</a>
		<a href="" data-toggle="modal" data-target="#deletePinjaman<?php echo $i++;?>" title="Hapus" data-tooltip="tooltip" data-placement="top">
			<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
		</a>
	</td>
</tr>
<!-- Modal Delete Honor per Pegawai-->
<div class="modal fade modal-danger" id="deletePinjaman<?php echo $j++;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Hapus Data Pinjaman</h4>
			</div>
			<div class="modal-body">
				<p>
					Anda yakin akan menghapus data pinjaman <b><?php echo $pinjaman['nama'];?></b> ?
				</p>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Batal</button>
				<a href="<?php echo site_url('pinjaman/delete/'.$pinjaman['id_pinjaman']);?>" class="btn btn-outline pull-right edit-btn">Hapus</a>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
