<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
					<table class="table table-bordered table-hover responsive text-center">
						<thead>
							<th>No</th>
							<th width="200px">Honorarium</th>
							<th width="150px">Status Pegawai</th>
							<th width="150px">Jumlah Pegawai</th>
							<th>Jenis Jabatan</th>
							<th>Menu</th>
						</thead>
						<tbody>
							<?php
							$no=1; foreach ($honors as $key => $honor) : 
							if ($honor['honor'] != null) {
								$id_honor = $honor['honor'];
							} else {
								$id_honor = 'null';
							}?>
							<tr>
								<td><?php echo $no++;?></td>
								<td style="text-align: left; padding-left: 20px;">
								<?php if ($honor['honor'] == null) {
									echo '(kosong)';
								} else if ($honor['honor'] == 0) {
									echo 'Rp. &nbsp;&nbsp;0 &nbsp;&nbsp;<small>(belum ditentukan)</small>';
								} else {
									echo 'Rp. &nbsp;&nbsp;'.number_format($honor['honor'],0,',','.');
								} ?>
								</td>
								<td><?php echo ($honor['status_pegawai'] == 'T1') ? 'Tetap' : 'PNS/Tidak Tetap';?></td>
								<td><?php echo $honor['result'].' orang';?></td>
								<td class="badge-edit"><span><?php echo $honor['result_list'];?></span>
								<?php if (empty($honor['result_list'])) echo '-';?></td>
								<td>
									<a href="<?php echo site_url('honor/detail/'.$id_honor);?>" title="Detail" data-toggle="tooltip" data-placement="top">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<?php 
									if ($hide == FALSE) {
										if ($id_honor != 'null') { ?>
											<a href="" title="Edit" data-tooltip="tooltip" data-toggle="modal" data-target="#editHonor<?php echo $id_honor;?>" data-placement="top">
												<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
											</a>
									<?php } } ?>
								</td>
							</tr>
							<!-- Modal Edit Honor-->
							<div class="modal fade" id="editHonor<?php echo $id_honor;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Edit Data Honor <b class="text-primary">Rp. <?php echo number_format($honor['honor'],0,',','.');?></b></h4>
										</div>
										<form role="form" method="post" action="<?php echo site_url('honor/update_honor');?>">
											<div class="modal-body">
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon">Rp.</span>
														<input type="hidden" class="form-control" name="id_honor" value="<?php echo $honor['honor'];?>">
														<input type="number" class="form-control" name="honor" placeholder="0" value="<?php echo $honor['honor'];?>">
														<span class="input-group-addon">.00</span>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Tutup</button>
												<button type="submit" class="btn btn-primary pull-right edit-btn">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- End Modal -->
							<?php endforeach; ?>
						</tbody>
					</table>
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
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
