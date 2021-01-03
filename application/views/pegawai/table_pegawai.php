<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<?php if ($hide == FALSE) { ?>
					<div class="box-header with-border">
						<h3 class="box-title"> 
							<a href="<?php echo site_url('pegawai/add');?>" class='btn btn-primary' >
								<i class="fa fa-plus-square-o"></i>&nbsp;&nbsp; Tambah Data 
							</a>
						</h3>
					</div>
				<?php } ?>
				<div class="box-body">
					<table class="table table-bordered table-hover responsive text-center">
						<thead>
							<th>No</th>
							<th>NBM</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>Masa Kerja</th>
							<th>Jenis Pegawai</th>
							<th>Status Pegawai</th>
							<th>Honorarium</th>
							<th>Menu</th>
						</thead>
						<tbody>
							<?php
							$no=1; 
							foreach ($pegawais as $pegawai) {
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $pegawai['nbm'] ?></td>
								<td style="text-align: left; padding-left: 5px;"><?php echo $pegawai['nama'] ?></td>
								<td><?php echo ($pegawai['gender'] == 'P') ? 'Perempuan' : 'Laki-laki';?></td>
								<td><?php echo ($pegawai['masa_kerja'] != 0) ? $pegawai['tahun'].' tahun' : '<small>(belum genap 1 tahun)</small>';?></td>
								<td><?php echo ($pegawai['jns_pegawai'] == 0) ? 'Guru' : 'Karyawan';?></td>
								<td>
									<?php switch ($pegawai['status_pegawai']) {
										case 'P':
											echo 'PNS';
											break;
										case 'T0':
											echo 'Tidak Tetap';
											break;
										case 'T1':
											echo 'Tetap';
											break;
									}?>
								</td>
								<td style="text-align: left; padding-left: 5px;"><?php 
									if ($pegawai['honor'] == NULL) {
										echo 'Rp. &nbsp;&nbsp; 0'; 
									} else if ($pegawai['honor'] == 0) {
										echo 'Rp. &nbsp;&nbsp; 0 <small>(belum ditentukan)</small>';
									} else {
										echo 'Rp. &nbsp;&nbsp;'.number_format($pegawai['honor'],0,',','.');
									}?>
								</td>
								<td>
									<a href="<?php echo site_url('pegawai/detail/'.$pegawai['id_pegawai']);?>" title="Detail" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<?php if ($hide == FALSE) { ?>
										<a href="<?php echo site_url('pegawai/edit/'.$pegawai['id_pegawai']);?>" title="Edit" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
										</a>
										<a href="" data-toggle="modal" data-target="#deletePegawai<?php echo $pegawai['id_pegawai'];?>" title="Hapus" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
										</a>
									<?php } ?>
								</td>
							</tr>
							<!-- Modal Delete Honor per Pegawai-->
							<div class="modal fade modal-danger" id="deletePegawai<?php echo $pegawai['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Hapus Data Pegawai</h4>
										</div>
										<div class="modal-body">
											<p>
												Anda yakin menghapus data pegawai <b><?php echo $pegawai['nama'];?></b> ?
											</p>
											</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Batal</button>
											<a href="<?php echo site_url('pegawai/delete/'.$pegawai['id_pegawai']);?>" class="btn btn-outline pull-right edit-btn">Hapus</a>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal -->
							<?php } ?> 
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
				<div class="box-footer clearfix">
					<ul class="pagination pagination-sm no-margin pull-right" id="pagination">
						<!-- <li><a href="#">&laquo;</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">&raquo;</a></li> -->
					</ul>
				</div>
			</div>
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
