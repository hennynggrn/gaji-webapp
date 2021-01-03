<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<?php if ($hide == FALSE) { ?>
				<div class="box-header with-border">
					<h3 class="box-title">
						<a href="<?php echo site_url('jabatan/add');?>" class='btn btn-primary'>
						<i class="fa fa-plus-square-o"></i>&nbsp;&nbsp; Tambah Data </a>
					</h3>
				</div>
				<?php } ?>
				<div class="box-body">
					<table class="table table-bordered text-center table-hover">
						<thead>
							<th>No</th>
							<th>Nama Jabatan</th>
							<th>Jumlah Jam</th>
							<th>Jumlah Pegawai</th>
							<th style="width: 200px">Menu</th>
						</thead>
						<tbody>
							<?php
								$no=1; 
								foreach ($jabatans as $key => $jabatan) { ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td style="text-align: left; padding-left: 50px;"><?php echo $jabatan['jabatan']; ?></td>
								<td><?php echo $jabatan['jml_jam']; ?></td>
								<td><?php echo ($jabatan['result'] != NULL) ? $jabatan['result'].' orang' : '-';?></td>
								<td>
									<a href="<?php echo site_url('jabatan/detail/'.$jabatan['id_jabatan']);?>" title="Detail" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<?php if ($hide == FALSE) { ?>
										<a href="<?php echo site_url('jabatan/edit/'.$jabatan['id_jabatan']);?>" title="Edit" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
										</a>
										<a href="" data-toggle="modal" data-target="#deleteJabatan<?php echo $jabatan['id_jabatan'];?>" title="Hapus" data-tooltip="tooltip" data-placement="top">
											<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
										</a>
									<?php } ?>
								</td>
							</tr>
							<!-- Modal Delete Honor per Pegawai-->
							<div class="modal fade modal-danger" id="deleteJabatan<?php echo $jabatan['id_jabatan'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Hapus Data Jabatan</h4>
										</div>
										<div class="modal-body">
											<p>
												Anda yakin menghapus jabatan <b><?php echo $jabatan['jabatan'];?></b> ?
											</p>
											</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default pull-left edit-btn" data-dismiss="modal">Batal</button>
											<a href="<?php echo site_url('jabatan/delete/'.$jabatan['id_jabatan']);?>" class="btn btn-outline pull-right edit-btn">Hapus</a>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal -->
							<?php } ?>
						</tbody>
					</table>
				</div>
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
	</div>
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
