<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> 
						<a href="" data-toggle="modal" data-target="#editHonor<?php echo $honor_val;?>" class='btn btn-warning'>
							<i class="fa fa-pencil-square-o"></i> Edit Honorium 
						</a>
					</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered table-hover responsive text-center">
						<thead>
							<th style="width: 10px">No</th>
							<th>Nama</th>
							<th>Jenis Pegawai</th>
							<th>Status Pegawai</th>
							<th>Jabatan</th>
							<th>Menu</th>
						</thead>
						<tbody>
						<?php
							$no=1; foreach ($honors as $key => $honor) : ?>
							<tr>
								<td style="width: 10px"><?php echo $no++;?></td>
								<td style="text-align: left; padding-left: 10px;"><?php echo $honor['nama'];?></td>
								<td><?php echo ($honor['jns_pegawai'] == 0) ? 'Guru' : 'Karyawan';?></td>
								<td><?php switch ($honor['status_pegawai']) {
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
								<td class="badge-edit"><span><?php echo $honor['result_list'];?></span></td>
								<td>
									<a href="" data-toggle="modal" data-target="#editHonorPegawai<?php echo $honor['id_pegawai'];?>" title="Edit" data-tooltip="tooltip" data-placement="left">
										<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
									</a>
									<?php if($honor['honor'] != 0) { ?>
										<a href="" data-toggle="modal" data-target="#deleteHonorPegawai<?php echo $honor['id_pegawai'];?>" title="Hapus" data-tooltip="tooltip" data-placement="right">
											<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
										</a>
									<?php } ?>
								</td>
							</tr>
							<!-- Modal Edit Honor per Pegawai-->
							<div class="modal fade" id="editHonorPegawai<?php echo $honor['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Edit Data Honor Pegawai <b class="text-primary"><?php echo $honor['nama'];?></b></h4>
										</div>
										<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('honor/update_honor');?>">
											<div class="modal-body">
												<div class="input-group">
													<span class="input-group-addon">Rp.</span>
													<input type="hidden" class="form-control" name="id_pegawai" value="<?php echo $honor['id_pegawai'];?>">
													<input type="number" class="form-control" name="honor" placeholder="0" value="<?php echo $honor['honor'];?>">
													<span class="input-group-addon">.00</span>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- End Modal -->
							<!-- Modal Delete Honor per Pegawai-->
							<div class="modal fade" id="deleteHonorPegawai<?php echo $honor['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Hapus Data Honor</h4>
										</div>
										<div class="modal-body">
											<p>
												<?php if ($honor['status_pegawai'] == "T1") {
													echo '<b class="text-red">Peringatan! </b>'.$honor['nama'].' adalah pegawai <b class="text-red">tetap</b>.<br><br>';
												}?>
												Menghapus akan mengatur honor <b class="text-primary"><?php echo $honor['nama'];?></b> menjadi <b class="text-primary">Rp. 0</b>. Lanjutkan ?
											</p>
											</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
											<a href="<?php echo site_url('honor/delete/'.$honor['id_pegawai']);?>" class="btn btn-primary">Hapus</a>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal -->
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!-- Modal Edit Honor-->
				<div class="modal fade" id="editHonor<?php echo $honor_val;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Edit Data Honor <b class="text-primary"> Rp. <?php echo number_format($honor_val,0,',','.');?></b></h4>
							</div>
							<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('honor/update_honor');?>">
								<div class="modal-body">
									<div class="input-group">
										<span class="input-group-addon">Rp.</span>
										<input type="hidden" class="form-control" name="id_honor" value="<?php echo $honor_val;?>">
										<input type="number" class="form-control" name="honor" placeholder="0" value="<?php echo $honor_val;?>">
										<span class="input-group-addon">.00</span>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- End Modal -->
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
			<a href="<?php echo site_url('honor')?>" class="pull-left btn btn-default">Kembali</a>
		</div>
	</div>
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
