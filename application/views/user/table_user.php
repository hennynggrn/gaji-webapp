<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
					<table class="table table-bordered table-hover responsive text-center">
						<thead>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Email</th>
							<th>No Hp</th>
							<th>Level Pengguna</th>
							<th>Status Online <br><small class="text-danger">(last seen)</small></th>
							<th>Menu</th>
						</thead>
						<tbody>
							<?php
							$no=1; foreach ($users as $key => $user) : ?>
							<tr>
								<td><?php echo $no++;?></td>
								<td style="text-align: left;"><?php echo $user['fullname'];?></td>
								<td><?php echo $user['username'];?></td>
								<td><?php echo $user['email'];?></td>
								<td><?php echo $user['phone'];?></td>
								<td><?php echo $user['level'];?></td>
								<td><?php 
								$last_date = date('Y-m-d', strtotime($user['last_online']));
								$last_time = date('h:i:s', strtotime($user['last_online']));
								echo ($user['online_status'] == 1) ? '<b class="text-green">Online</b>' :  '<small class="text-danger">'.fullConvertIDN($last_date , $short = TRUE,  $day = TRUE).' <br>pukul '.$last_time.'</small>';?></td>
								<td>
									<a href="<?php echo site_url('user/detail/'.$user['id']);?>" title="Detail" data-toggle="tooltip" data-placement="top">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<a href="" title="Edit" data-tooltip="tooltip" data-toggle="modal" data-target="#edituser<?php echo $user['id'];?>" data-placement="top">
										<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
									</a>
									<?php 
										if ($user['level_id'] == 1) { 
											if ($hide == FALSE) { ?>
												<a href="" title="Hapus" data-tooltip="tooltip" data-toggle="modal" data-target="#deleteuser<?php echo $user['id'];?>" data-placement="top">
													<span class="badge bg-red"><i class="fa fa-fw fa-trash"></i></span>
												</a>
									<?php }} else { 
										if (($user['level_id'] != 0)) { ?>
											<a href="" title="Hapus" data-tooltip="tooltip" data-toggle="modal" data-target="#deleteuser<?php echo $user['id'];?>" data-placement="top">
												<span class="badge bg-red"><i class="fa fa-fw fa-trash"></i></span>
											</a>
									<?php }} ?>
								</td>
							</tr>

							<!-- Modal Edit user-->
							<div class="modal fade" id="edituser<?php echo $user['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Edit Data <?php echo $user['fullname'];?></h4>
										</div>
										<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('user/update_user');?>">
											<div class="modal-body">
												<div class="form-group">
													<label for="">Nama Lengkap</label>
													<input type="hidden" class="form-control" name="id" value="<?php echo $user['id'];?>">
													<input type="text" class="form-control" name="fullname" placeholder="Budi Sanjono" value="<?php echo $user['fullname'];?>">
												</div>
												<?php if (($user['level_id'] != 0)) {
														if ($user['level_id'] == 1) { 
															if ($hide == FALSE) { ?>
																<div class="form-group">
																	<label for="">Status Hidup</label>
																	<select class="form-control" name="s_hidup_anggota">
																		<option disabled>Level User</option>
																		
																		<option value="1" <?php echo ($user['level_id'] == 1) ? 'selected': '';?>>Administrator</option> 
																		<option value="2" <?php echo ($user['level_id'] == 2) ? 'selected': '';?>>Bendahara</option>
																		<option value="3" <?php echo ($user['level_id'] == 3) ? 'selected': '';?>>Kepala Sekolah</option>
																		<option value="4" <?php echo ($user['level_id'] == 4) ? 'selected': '';?>>Operator</option>
																	</select>
																</div>
												<?php }} else { ?>
													<div class="form-group">
														<label for="">Status Hidup</label>
														<select class="form-control" name="s_hidup_anggota">
															<option disabled>Level User</option>
															
															<option value="1" <?php echo ($user['level_id'] == 1) ? 'selected': '';?>>Administrator</option> 
															<option value="2" <?php echo ($user['level_id'] == 2) ? 'selected': '';?>>Bendahara</option>
															<option value="3" <?php echo ($user['level_id'] == 3) ? 'selected': '';?>>Kepala Sekolah</option>
															<option value="4" <?php echo ($user['level_id'] == 4) ? 'selected': '';?>>Operator</option>
														</select>
													</div>
												<?php }} ?>
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
