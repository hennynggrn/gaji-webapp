<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<?php 
				if ($hide == FALSE) {
					if ($honor_val != 'null') { ?>
						<div class="box-header with-border">
						<h3 class="box-title"> 
							<a href="" data-toggle="modal" data-target="#editHonor<?php echo $honor_val;?>" class='btn btn-warning'>
								<i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp; Edit Honorarium 
							</a>
						</h3>
					</div>
				<?php } } ?>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered table-hover responsive text-center">
						<thead>
							<th style="width: 10px">No</th>
							<th>Nama</th>
							<th>Jenis Pegawai</th>
							<th>Status Pegawai</th>
							<th>Jabatan</th>
							<?php echo ($hide == FALSE) ? '<th>Menu</th>': '';?>
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
								<td class="badge-edit"><span><?php echo $honor['result_list'];?></span>
								<?php if (empty($honor['result_list'])) echo '-';?></td>
								<?php if ($hide == FALSE) { ?>
									<td>
										<a href="" data-toggle="modal" data-target="#editHonorPegawai<?php echo $honor['id_pegawai'];?>" title="Edit" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
										</a>
										<?php if($honor['honor'] != 0) { ?>
											<a href="" data-toggle="modal" data-target="#deleteHonorPegawai<?php echo $honor['id_pegawai'];?>" title="Hapus" data-tooltip="tooltip" data-placement="top">
												<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
											</a>
										<?php } ?>
									</td>
								<?php } ?>
							</tr>
							<?php if ($honor['honor'] != NULL) : ?>
								<!-- Modal Edit Honor per Pegawai-->
								<div class="modal fade" id="editHonorPegawai<?php echo $honor['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Edit Data Honorarium Pegawai <b class="text-primary"><?php echo $honor['nama'];?></b></h4>
											</div>
											<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('honor/update_honor');?>">
												<div class="modal-body">
													<div class="input-group">
														<span class="input-group-addon">Rp.</span>
														<input type="hidden" class="form-control" name="id_pegawai" value="<?php echo $honor['id_pegawai'];?>">
														<input type="hidden" class="form-control" name="id_honor" placeholder="0" value="<?php echo $honor['honor'];?>">
														<input type="number" class="form-control" name="honor" placeholder="0" value="<?php echo $honor['honor'];?>">
														<span class="input-group-addon">.00</span>
													</div><br>
													<p class="text-info"><i class="fa fa-fw fa-info-circle"></i>&nbsp;&nbsp; Info : <br>
														<ul class="text-info">
															<li>untuk mengubah <b>Jenis</b> atau <b>Status Pegawai</b>&nbsp;&nbsp;
																<a class="badge bg-orange" href="<?php echo site_url('honor/edit/'.$honor['id_pegawai']);?>">
																	Edit data pegawai<i class="fa fa-fw fa-arrow-circle-right"></i>
																</a>
															</li>
														</ul>
													</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Batal</button>
													<button type="submit" class="btn btn-primary pull-right edit-btn">Simpan</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							<!-- End Modal -->
							<?php else:?>
								<!-- Modal Edit Honor per Pegawai-->
								<div class="modal fade modal-info" id="editHonorPegawai<?php echo $honor['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Edit Data Honorarium Pegawai <b><?php echo $honor['nama'];?></b></h4>
											</div>
											<div class="modal-body">
												<p>Untuk menambah honorarium Anda perlu mengubah <b>Jenis</b> atau <b>Status Pegawai <?php echo $honor['nama'];?></b>&nbsp;&nbsp;
													<a class="badge bg-orange" href="<?php echo site_url('honor/edit/'.$honor['id_pegawai']);?>">
														Edit data pegawai<i class="fa fa-fw fa-arrow-circle-right"></i>
													</a>
												</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-right edit-btn" data-dismiss="modal">Batal</button>
											</div>
										</div>
									</div>
								</div>
								<!-- End Modal -->
							<?php endif;?>
							<!-- Modal Delete Honor per Pegawai-->
							<div class="modal fade modal-danger" id="deleteHonorPegawai<?php echo $honor['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Hapus Data Honorarium</h4>
										</div>
										<div class="modal-body">
											<p>
												<?php if ($honor['status_pegawai'] == "T1") {
													echo '<b>Peringatan! </b><br>'.$honor['nama'].' adalah pegawai <b>tetap</b>.<br><br>';
												}?>
												Menghapus akan mengatur honorarium <b><?php echo $honor['nama'];?></b> menjadi <b>Rp. 0</b>. Lanjutkan ?
											</p>
											</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Batal</button>
											<a href="<?php echo site_url('honor/delete_honor/'.$honor['id_pegawai'].'/'.$honor['honor']);?>" class="btn btn-outline pull-right edit-btn">Hapus</a>
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
								<h4 class="modal-title" id="myModalLabel">Edit Data Honorarium <b class="text-primary"> Rp. <?php echo number_format($honor_val,0,',','.');?></b></h4>
							</div>
							<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('honor/update_honor');?>">
								<div class="modal-body">
									<div class="input-group">
										<span class="input-group-addon">Rp.</span>
										<input type="hidden" class="form-control" name="detail_honor" value="1">
										<input type="hidden" class="form-control" name="id_honor" value="<?php echo $honor_val;?>">
										<input type="number" class="form-control" name="honor" placeholder="0" value="<?php echo $honor_val;?>">
										<span class="input-group-addon">.00</span>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-primary pull-right edit-btn">Simpan</button>
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
			<a href="<?php echo site_url('honor')?>" class="pull-left btn btn-default"><i class="fa fa-fw fa-arrow-left"></i>&nbsp;&nbsp; Kembali</a>
		</div>
	</div>
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
