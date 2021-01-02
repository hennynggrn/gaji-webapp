<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
					<div class="col-md-12">
						<table class="table table-hover text-left">
							<tbody>
								<tr>
									<th width="200px">Nama Lengkap</th>
									<td>:</td>
									<td><?php echo $user['fullname'];?></td>
								</tr>
								<tr>
									<th>Username</th>
									<td>:</td>
									<td><?php echo $user['username'];?></td>
								</tr>
								<tr>
									<th>Email</th>
									<td>:</td>
									<td><?php echo $user['email'];?></td>
								</tr>
								<tr>
									<th>No. Hp/telfon</th>
									<td>:</td>
									<td><?php echo $user['phone'];?></td>
								</tr>
								<tr>
									<th>Level Pengguna</th>
									<td>:</td>
									<td><?php echo $user['level'];?></td>
								</tr>
								<tr>
									<th>Alamat Tinggal</th>
									<td>:</td>
									<td><?php echo ($user['address'] != NULL) ? $user['address'] : '-';?></td>
								</tr>
								<tr>
									<th>Status Online</th>
									<td>:</td>
									<td><?php 
										$last_date = date('Y-m-d', strtotime($user['last_online']));
										$last_time = date('h:i:s', strtotime($user['last_online']));
										echo ($user['online_status'] == 1) ? '<b class="text-green">Online</b>' :  fullConvertIDN($last_date , $short = FALSE,  $day = TRUE).' pukul '.$last_time.'<small class="text-danger"> (last seen)</small>';
									?></td>
								</tr>
								<tr>
									<th>Hubungkan Pegawai</th>
									<td>:</td>
									<td>
										<?php 
											if (!empty($user['id_pegawai'])) {
												echo '
													<a href="" title="Hapus Link" data-tooltip="tooltip" data-placement="top"
													data-toggle="modal" data-target="#unlink'.$user['id'].'">
														<i class="text-green fa fa-fw fa-check"></i>
													</a><small class="text-success">(terhubung) </small>';
											} else {
												echo '
													<a href="" title="Hubungkan" data-tooltip="tooltip" onclick="return focusLinkPegawai();"
														data-toggle="modal" data-target="#edit'.$user['id'].'" data-placement="top">
														<i class="text-blue fa fa-fw fa-link"></i>
													</a><small class="text-danger">(belum terhubung) </small>';
											}
											
										?>	
									</td>
								</tr>
							</tbody>
						</table>
						<?php if (!empty($user['id_pegawai'])) { ?>
							<div class="pull-left col-md-12"> 
								<table class="table text-left text-green table-hover">
									<thead>
										<th colspan="3" class="text-green text-center">Data Pegawai</th>
									</thead>
									<tbody>
										<tr>
											<td width="200px" style="padding-left:200px"><b>Nama</b></td>
											<td width="20px">:</td>
											<td><span class="pull-left"><?php echo $user['nama'];?></span></td>
										</tr>
										<tr>
											<td style="padding-left:200px"><b>NBM</b></td>
											<td>:</td>
											<td><span class="pull-left"><?php echo $user['nbm'];?></span></td>
										</tr>
										<tr>
											<td style="padding-left:200px"><b>Jabatan</b></td>
											<td>:</td>
											<td><span class="badge-edit"><span class=""><?php echo $user['result_list'];?></span> <?php if ($user['result_list'] == NULL) {echo '-';}?></span></td>
										</tr>
									</tbody>
								</table>
							</div>
						<?php }	?>
						
					</div>
				</div>
			</div>
		</div>
		<!-- Modal Edit user-->
		<div class="modal fade" id="edit<?php echo $user['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Edit Data Pengguna <?php echo $user['fullname'];?></h4>
					</div>
					<form role="form" method="post" action="<?php echo site_url('user/update_user');?>">
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
							<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary pull-right edit-btn">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End Modal -->
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
						<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Tutup</button>
						<a type="button" href="<?php echo site_url('profile/unlink/'.$user['id']);?>" class="btn btn-outline pull-right edit-btn">Hapus</a>
					</div>
				</div>
			</div>
		</div>
		<!-- End Modal -->
		<div class="col-md-12">
			<a href="<?php echo base_url()?>" class="pull-left btn btn-default">Kembali</a>
			<a href="" data-toggle="modal" data-target="#edit<?php echo $user['id'];?>" class="pull-right btn btn-warning edit-btn">Edit</a></td>
		</div>
	</div>
</section>
<!-- /.content -->
</div>

