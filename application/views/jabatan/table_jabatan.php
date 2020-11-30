<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">
						<a href="<?php echo site_url('jabatan/add_jabatan');?>" class='btn btn-primary' >
						<i class="fa fa-plus-square-o"></i> Tambah Data </a>
				</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table class="table table-bordered text-center">
							<tr>
								<th style="width: 10px">No</th>
								<th>Nama Jabatan</th>
								<th>Jumlah Jam</th>
								<th>Jumlah Pegawai</th>
								<th style="width: 200px">Menu</th>
							</tr>
							<?php
								$no=1; 
								foreach ($jabatans as $key => $jabatan) { ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td style="text-align: left; padding-left: 50px;"><?php echo $jabatan['jabatan']; ?></td>
								<td><?php echo $jabatan['jml_jam']; ?></td>
								<td><?php echo ($jabatan['result'] != NULL) ? $jabatan['result'].' orang' : '-';?></td>
								<td>
									<a href="<?php echo site_url('pegawai/detail/'.$jabatan['id_jabatan']);?>" title="Detail" data-tooltip="tooltip" data-placement="left">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<a href="<?php echo site_url('pegawai/edit/'.$jabatan['id_jabatan']);?>" title="Edit" data-tooltip="tooltip" data-placement="top">
										<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
									</a>
									<a href="" data-toggle="modal" data-target="#deletePegawai<?php echo $jabatan['id_jabatan'];?>" title="Hapus" data-tooltip="tooltip" data-placement="right">
										<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
									</a>
							</tr>
							<?php } ?>
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
	</div>
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
