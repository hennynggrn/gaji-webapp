<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> 
						<a href="<?php echo site_url('jabatan/edit/'.$id['id_jabatan']);?>" class='btn btn-warning'>
							<i class="fa fa-pencil-square-o"></i> Edit Jabatan 
						</a>
					</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<?php if(!empty($pegawais)) {?>
					<table class="table table-bordered table-hover responsive text-center">
						<thead>
							<th style="width: 10px">No</th>
							<th>Nama</th>
							<th>Jenis Pegawai</th>
							<th>Status Pegawai</th>
							<th>Rangkap Jabatan</th>
							<th>Menu</th>
						</thead>
						<tbody>
						<?php
							$no=1; foreach ($pegawais as $key => $pegawai) : ?>
							<tr>
								<td style="width: 10px"><?php echo $no++;?></td>
								<td style="text-align: left; padding-left: 10px;"><?php echo $pegawai['nama'];?></td>
								<td><?php echo ($pegawai['jns_pegawai'] == 0) ? 'Guru' : 'Karyawan';?></td>
								<td><?php switch ($pegawai['status_pegawai']) {
									case 'P':
										echo 'PNS';
										break;
									case 'T1':
										echo 'Tetap';
										break;
									case 'T0':
										echo 'Tidak Tetap';
										break;
								}?></td>
								<td class="badge-edit"><span><?php echo $pegawai['result_list'];?></span></td>
								<td>
									<a href="" data-toggle="modal" data-target="#deleteJabatanPegawai<?php echo $pegawai['id_pegawai'];?>" title="Hapus" data-tooltip="tooltip" data-placement="right">
										<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
									</a>
								</td>
							</tr>
							<!-- Modal Delete Honor per Pegawai-->
							<div class="modal fade" id="deleteJabatanPegawai<?php echo $pegawai['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Hapus Pegawai</h4>
										</div>
										<div class="modal-body">
											<p>
												Anda akan menghapus <b class="text-primary"><?php echo $pegawai['nama'];?></b> dari jabatan <b class="text-primary"><?php echo $pegawai['jabatan'];?></b>. Lanjutkan ?
											</p>
											</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
											<a href="<?php echo site_url('jabatan/delete_pegawai/'.$pegawai['id_pegawai']);?>" class="btn btn-primary">Hapus</a>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal -->
							<?php endforeach; ?>
						</tbody>
					</table>
					<?php } else {echo '<h5 class="text-center text-bold">Tidak ada pegawai dengan jabatan ini.</h5>';}?>
				</div>
				<!-- /.box-body -->
				<div class="box-footer clearfix">
					<ul class="pagination pagination-sm no-margin pull-right">
						<li><a href="#">&laquo;</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">&raquo;</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<a href="<?php echo site_url('jabatan')?>" class="pull-left btn btn-default">Kembali</a>
		</div>
	</div>
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
