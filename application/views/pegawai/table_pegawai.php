<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> 
						<a href="<?php echo site_url('pegawai/add');?>" class='btn btn-primary' >
							<i class="fa fa-plus-square-o"></i> Tambah Data 
						</a>
					</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered table-hover responsive text-center">
						<thead>
							<th style="width: 10px">No</th>
							<th>NBM</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>E-mail</th>
							<th>Telepon</th>
							<th>Jenis Pegawai</th>
							<th>Status Pegawai</th>
							<th>Honorarium</th>
							<th>Menu</th>
						</thead>
						<tbody>
						<?php
							$no=1; foreach ($pegawais as $pegawai) {
						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $pegawai['nbm'] ?></td>
								<td><?php echo $pegawai['nama'] ?></td>
								<td><?php echo ($pegawai['gender'] == 'P') ? 'Perempuan' : 'Laki-laki';?></td>
								<td><?php echo $pegawai['email'] ?></td>
								<td><?php echo ($pegawai['telepon'] != 0) ? $pegawai['telepon'] : '-';?></td>
								<td><?php echo ($pegawai['jns_pegawai'] == 0) ? 'Guru' : 'Karyawan';?></td>
								<td>
									<?php switch ($pegawai['status_pegawai']) {
										case 'P':
											echo 'PNS';
											break;
										case 'T0':
											echo 'Tidak Tetap';
											break;
										case 'T1':
											echo 'Tetap';
											break;
									}?>
								</td>
								<td><?php echo 'Rp. '.$pegawai['honor'] ?></td>
								<td>
									<a href="<?php echo base_url('pegawai/detail/'.$pegawai['id_pegawai']);?>" title="Detail" data-toggle="tooltip" data-placement="left">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<a href="<?php echo base_url('pegawai/edit/'.$pegawai['id_pegawai']);?>" title="Edit" data-toggle="tooltip" data-placement="top">
										<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
									</a>
									<a href="<?php echo base_url('pegawai/delete/'.$pegawai['id_pegawai']);?>" title="Hapus" data-toggle="tooltip" data-placement="right">
										<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
									</a>
								</td>
							</tr>
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
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
