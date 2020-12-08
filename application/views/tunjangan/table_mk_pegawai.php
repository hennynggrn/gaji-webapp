<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<!-- <div class="box-header with-border">
					<h3 class="box-title">
						<a href="<?php echo site_url('pegawai/add');?>" class='btn btn-primary' >
						<i class="fa fa-plus-square-o"></i> Tambah Data </a>
					</h3>
				</div> -->
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered text-center table-hover">
						<thead>
							<th>No</th>
							<th>Nama pegawai</th>
							<th>Masa Kerja (Tahun)</th>
							<th>Jumlah Tunjangan</th>
							<th>Menu</th>
						</thead>
						<tbody>
							<?php
								$no=1; 
								foreach ($pegawais as $key => $pegawai) { ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td style="text-align: left; padding-left: 10px;"><?php echo $pegawai['nama']; ?></td>
								<td><?php echo ($pegawai['masa_kerja'] != 0) ? $pegawai['tahun'] : '<small>(belum genap 1 tahun)</small>';?></td>
								<td style="text-align: left; padding-left: 100px;"><?php echo ($pegawai['masa_kerja'] != 0) ? 'Rp. &nbsp;&nbsp;'.number_format($pegawai['jml_mk'],0,',','.') : '-';?></td>
								<td>
									<a href="" data-toggle="modal" data-target="#editPegawai<?php echo $pegawai['id_pegawai'];?>" title="Edit" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
									</a>
							</tr>
							<!-- Modal Delete Honor per Pegawai-->
							<div class="modal fade" id="editPegawai<?php echo $pegawai['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Edit Masa Kerja <span class="text-primary"><?php echo $pegawai['nama'];?></span></h4>
										</div>
										<form role="form" method="post" action="<?php echo site_url('tunjangan/update_mk_pegawai');?>">
											<div class="modal-body">
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon">Masa Kerja</span>
														<input type="hidden" value="<?php echo $pegawai['id_pegawai'];?>" name="pegawai">
														<select class="form-control" name="masa_kerja" placeholder="Pilih tahun masa kerja" style="width: 100%; background-color: white;" required>
															<option disabled>Pilih Tahun Masa Kerja</option>
															<?php foreach ($masakerjas as $key => $masakerja) : ?>
															<option value=<?php echo '"'.$masakerja['id_masakerja'].'"'; echo ($masakerja['id_masakerja'] == $pegawai['masa_kerja']) ? 'selected' : '';?>>
																<?php echo ($masakerja['id_masakerja'] == 0) ? '(belum genap 1 tahun)' : $masakerja['tahun'].' tahun';?>
															</option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</form>
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
			<a href="<?php echo site_url('tunjangan')?>" class="pull-left btn btn-default">Kembali</a>
		</div>
	</div>
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
