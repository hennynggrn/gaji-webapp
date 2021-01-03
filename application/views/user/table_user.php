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
									<a href="" title="Detail" data-tooltip="tooltip" data-toggle="modal" data-target="#detail<?php echo $user['id'];?>" data-placement="top">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<a href="" title="Edit" data-tooltip="tooltip" data-toggle="modal" data-target="#edit<?php echo $user['id'];?>" data-placement="top">
										<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
									</a>
									<?php 
										if ($user['level_id'] == 1) { 
											if ($hide == FALSE) { ?>
												<a href="" title="Hapus" data-tooltip="tooltip" data-toggle="modal" data-target="#delete<?php echo $user['id'];?>" data-placement="top">
													<span class="badge bg-red"><i class="fa fa-fw fa-trash"></i></span>
												</a>
									<?php }} else { 
										if (($user['level_id'] != 0)) { ?>
											<a href="" title="Hapus" data-tooltip="tooltip" data-toggle="modal" data-target="#delete<?php echo $user['id'];?>" data-placement="top">
												<span class="badge bg-red"><i class="fa fa-fw fa-trash"></i></span>
											</a>
									<?php }} ?>
								</td>
							</tr>

							<!-- Modal Detail user-->
							<div class="modal fade" id="detail<?php echo $user['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Detail Data Pengguna <?php echo $user['fullname'];?></h4>
										</div>
										<div class="modal-body">
											<div class="box-body">
												<ul class="list-group list-group-unbordered">
													<li class="list-group-item" style="background-color:#fafafa;">
														<b>Nama Lengkap</b> <span class="pull-right"><?php echo $user['fullname'];?></span>
													</li>
													<li class="list-group-item">
														<b>Username</b> <span class="pull-right"><?php echo $user['username'];?></span>
													</li>
													<li class="list-group-item" style="background-color:#fafafa;">
														<b>Email</b> <span class="pull-right"><?php echo $user['email'];?></span>
													</li>
													<li class="list-group-item">
														<b>No. Hp/telfon</b> <span class="pull-right"><?php echo $user['phone'];?></span>
													</li>
													<li class="list-group-item" style="background-color:#fafafa;">
														<b>Level Pengguna</b> <span class="pull-right"><?php echo $user['level'];?></span>
													</li>
													<li class="list-group-item">
														<b>Alamat Tinggal</b> <span class="pull-right"><?php echo (!empty($user['address'])) ? $user['address'] : '-';?></span>
													</li>
													<li class="list-group-item" style="background-color:#fafafa;">
														<b>Tanggal Bergabung</b> 
														<span class="pull-right">
															<?php echo fullConvertIDN(date('Y-m-d', strtotime($user['created_at'])), $short = NULL, $day = FALSE);?>
														</span>
													</li>
													<li class="list-group-item">
														<b>Status Online</b> 
														<span class="pull-right">
															<?php 
																$last_date = date('Y-m-d', strtotime($user['last_online']));
																$last_time = date('h:i:s', strtotime($user['last_online']));
																echo ($user['online_status'] == 1) ? '<b class="text-green">Online</b>' :  '<small class="text-danger">(last seen) </small>'.fullConvertIDN($last_date , $short = FALSE,  $day = TRUE).' pukul '.$last_time;
															?>
														</span>
													</li>
													<li class="list-group-item" style="background-color:#fafafa;">
														<b>Hubungkan Pegawai</b> 
														<span class="pull-right">
															<?php 
																if (!empty($user['id_pegawai'])) {
																	echo '
																		<small class="text-success">(terhubung) </small>
																		<a href="" title="Hapus Link" data-tooltip="tooltip" data-placement="top"
																		data-toggle="modal" data-target="#unlink'.$user['id'].'">
																			<i class="text-green fa fa-fw fa-check"></i>
																		</a>';
																} else {
																	echo '
																		<small class="text-danger">(belum terhubung) </small>
																		<a href="" title="Hubungkan" data-tooltip="tooltip" onclick="return focusLinkPegawai();"
																			data-toggle="modal" data-target="#edit'.$user['id'].'" data-placement="top">
																			<i class="text-blue fa fa-fw fa-link"></i>
																		</a>';
																}
																
															?>
														</span>
													</li>
												</ul>
												<?php if (!empty($user['id_pegawai'])) { ?>
													<ul class="text-green">
														<li>
															<b>Nama</b> <span class="pull-right"><?php echo $user['nama'];?></span>
														</li><hr>
														<li>
															<b>NBM</b> <span class="pull-right"><?php echo $user['nbm'];?></span>
														</li><hr>
														<li>
															<b>Jabatan</b> 
															<span class="badge-edit pull-right" style="max-width:200px; word-wrap:break-word; text-align: right;"><span class=""><?php echo $user['result_list'];?></span></span>
														</li>
													</ul>
												<?php }	?>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-fw fa-close"></i>&nbsp;&nbsp; Tutup</button>
											<a href="" title="Edit" class="btn btn-warning pull-right" data-tooltip="tooltip" data-toggle="modal" data-target="#edit<?php echo $user['id'];?>" data-placement="top"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp; Edit</a>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal -->
							<!-- Modal Edit user-->
							<div class="modal fade" id="edit<?php echo $user['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Edit Data Pengguna <?php echo $user['fullname'];?></h4>
										</div>
										<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('user/update_user');?>">
											<div class="modal-body">
												<div class="form-group">
													<label for="">Nama Lengkap</label>
													<input type="hidden" class="form-control" name="id" value="<?php echo $user['id'];?>">
													<input type="text" class="form-control" name="fullname" placeholder="Budi Sanjono" value="<?php echo $user['fullname'];?>" required>
												</div>
												<div class="form-group">
													<label for="">Username</label>
													<input type="text" class="form-control" name="username" placeholder="budi_sanjono" value="<?php echo $user['username'];?>" required>
												</div>
												<div class="form-group">
													<label for="">Password Baru </label>
													<input type="hidden" name="old_password" value="<?php echo $user['password'];?>">
													<input type="text" class="form-control" name="password" placeholder="budi_mon0198/W" value="">
													<small class="text-danger"><i class="fa fa-fw fa-warning"></i> Password lama akan dihapus. Pastikan untuk mengingat password baru Anda.</small>
												</div>
												<div class="form-group">
													<label for="">Email</label>
													<input type="email" class="form-control" name="email" placeholder="budi@gmail.com" value="<?php echo $user['email'];?>" required>
												</div>
												<div class="form-group">
													<label for="">Hubungkan Pegawai</label>
													<select class="form-control" name="id_pegawai" id="id_pegawai">
														<option disabled>Pilih Pegawai</option>
														<option value="">Tidak Ada</option> 
														<?php if (empty($user['id_pegawai'])) {
															foreach ($pegawais as $key => $pegawai) { ?>
																<option value="<?php echo $pegawai['id_pegawai'];?>"><?php echo $pegawai['nama'].' ('.$pegawai['nbm'].')';?></option> 
														<?php }} else {
															foreach ($pegawais as $key => $pegawai) { ?>
																<option value="<?php echo $pegawai['id_pegawai'];?>" <?php echo ($user['id_pegawai'] == $pegawai['id_pegawai'] ) ? 'selected': '';?>><?php echo $pegawai['nama'].' ('.$pegawai['nbm'].')';?></option> 
														<?php }} ?>
													</select>
												</div>
												<div class="form-group">
													<label for="">No. Hp/telfon</label>
													<input type="number" class="form-control" name="phone" placeholder="08xxxxxxxx" value="<?php echo $user['phone'];?>" required>
												</div>
												<?php if (($user['level_id'] != 0)) {
														if ($user['level_id'] == 1) { 
															if ($hide == FALSE) { ?>
																<div class="form-group">
																	<label for="">Level User asda</label>
																	<select class="form-control" name="level_id" required>
																		<option disabled>Pilih Level User</option>
																		<option value="1" <?php echo ($user['level_id'] == 1) ? 'selected': '';?>>Administrator</option> 
																		<option value="2" <?php echo ($user['level_id'] == 2) ? 'selected': '';?>>Bendahara</option>
																		<option value="3" <?php echo ($user['level_id'] == 3) ? 'selected': '';?>>Kepala Sekolah</option>
																		<option value="4" <?php echo ($user['level_id'] == 4) ? 'selected': '';?>>Operator</option>
																	</select>
																</div>
												<?php } else { ?>
													<input type="hidden" name="level_id" value="<?php echo $user['level_id'];?>">
												<?php }} else { ?>
													<div class="form-group">
														<label for="">Level User</label>
														<select class="form-control" name="level_id" required>
															<option disabled>Pilih Level User</option>
															<option value="1" <?php echo ($user['level_id'] == 1) ? 'selected': '';?>>Administrator</option> 
															<option value="2" <?php echo ($user['level_id'] == 2) ? 'selected': '';?>>Bendahara</option>
															<option value="3" <?php echo ($user['level_id'] == 3) ? 'selected': '';?>>Kepala Sekolah</option>
															<option value="4" <?php echo ($user['level_id'] == 4) ? 'selected': '';?>>Operator</option>
														</select>
													</div>
												<?php }} ?>
												<div class="form-group">
													<label for="">Alamat Tinggal</label>
													<textarea class="form-control" name="address" placeholder="Jl. Taman"><?php echo $user['address'];?></textarea>
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
							<!-- Modal Delete user-->
							<div class="modal fade modal-danger" id="delete<?php echo $user['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Hapus Pengguna <?php echo $user['fullname'];?></h4>
										</div>
										<div class="modal-body">
											<p>
												Anda yakin menghapus data pengguna <b><?php echo $user['fullname'];?></b> ?
											</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Batal</button>
											<a type="button" href="<?php echo site_url('delete/'.$user['id']);?>" class="btn btn-outline pull-right edit-btn">Hapus</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal Unlink user-->
							<div class="modal fade modal-danger" id="unlink<?php echo $user['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Hapus Link Pegawai Pengguna <?php echo $user['fullname'];?></h4>
										</div>
										<div class="modal-body">
											<p>
												Anda yakin menghapus link pegawai <b><?php echo $user['nama'];?></b> ?
											</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Batal</button>
											<a type="button" href="<?php echo site_url('unlink/'.$user['id']);?>" class="btn btn-outline pull-right edit-btn">Hapus</a>
										</div>
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
