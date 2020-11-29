<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<!-- <div class="box-header with-border">
					<h3 class="box-title"> 
						<a href="<?php echo site_url('keluarga/add');?>" class='btn btn-primary' >
							<i class="fa fa-plus-square-o"></i> Tambah Data 
						</a>
					</h3>
				</div> -->
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered table-hover responsive text-center">
						<thead>
							<th style="width: 10px">No</th>
							<th>Nama Anggota</th>
							<th>Status Anggota</th>
							<th>Jenis Kelamin</th>
							<th>Status Hidup</th>
							<th>Nama Pegawai</th>
							<th>Menu</th>
						</thead>
						<tbody>
						<?php
							$no=1; foreach ($keluargas as $key => $keluarga) : ?>
							<tr>
								<td style="width: 10px"><?php echo $no++;?></td>
								<td style="text-align: left; padding-left: 15px;"><?php echo $keluarga['nama'];?></td>
								<td class="badge-edit"><?php switch ($keluarga['id_status']) {
									case '1':
										echo ($keluarga['gender_pegawai'] == 'L') ? 'Istri' : 'Suami';
										break;
									case '2':
										echo 'Anak Pertama';
										break;
									case '3':
										echo 'Anak Kedua';
										break;
								}?></td>
								<td class="badge-edit"><?php echo ($keluarga['gender'] == 'L') ? 'Laki-laki' : 'Perempuan';?></td>
								<td class="badge-edit"><?php switch ($keluarga['s_hidup']) {
									case '0':
										echo 'Meninggal';
										break;
									case '1':
										echo 'Hidup';
										break;
								}?></td>
								<td style="text-align: left; padding-left: 15px;"><?php echo $keluarga['nama_pegawai'];?></td>
								<td>
									<a href="<?php echo site_url('keluarga/detail/'.$keluarga['id_anggota_klg']);?>" title="Detail" data-toggle="tooltip" data-placement="left">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<a href="" title="Edit" data-tooltip="tooltip" data-toggle="modal" data-target="#editkeluarga<?php echo $keluarga['id_anggota_klg'];?>" data-placement="right">
										<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
									</a>
								</td>
							</tr>

							<!-- Modal Edit keluarga-->
							<div class="modal fade" id="editkeluarga<?php echo $keluarga['id_anggota_klg'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Edit Data <?php echo $keluarga['nama'];?></h4>
										</div>
										<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('keluarga/update_keluarga');?>">
											<div class="modal-body">
												<div class="form-group">
													<label for="">Nama</label>
													<input type="hidden" class="form-control" name="id_anggota" value="<?php echo $keluarga['id_anggota_klg'];?>">
													<input type="text" class="form-control" name="nama_anggota" placeholder="Budi Sanjono" value="<?php echo $keluarga['nama'];?>">
												</div>
												<div class="form-group">
													<label for="">Status Hidup</label>
													<select class="form-control" name="s_hidup_anggota">
														<option disabled>Pilih Status Hidup</option>
														<option value="1" <?php echo ($keluarga['s_hidup'] == 1) ? 'selected': '';?>>Hidup</option>
														<option value="0" <?php echo ($keluarga['s_hidup'] == 0) ? 'selected': '';?>>Meninggal</option>
													</select>
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
