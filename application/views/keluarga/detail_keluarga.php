<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
					<table class="table table-bordered table-hover responsive text-center">
						<thead>
							<th style="width: 10px">No</th>
							<th>Nama</th>
							<th>Status Anggota</th>
							<th>Jenis Kelamin</th>
							<th>Status Hidup</th>
						</thead>
						<tbody>
							<tr>
								<td style="width: 10px">1</td>
								<td style="text-align: left; padding-left: 15px;"><?php echo $pegawai['nama'];?> &nbsp;
									<span class="badge bg-gray"><i class="fa fa-fw fa-user"></i> Pegawai</span>
								</td>
								<td><?php echo ($pegawai['gender'] == 'L') ? 'Suami' : 'Istri';?></td>
								<td><?php echo ($pegawai['gender'] == 'L') ? 'Laki-laki' : 'Perempuan';?></td>
								<td>Hidup</td>
							</tr>
						<?php
							$no=2; foreach ($keluargas as $key => $keluarga) : ?>
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
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<a href="<?php echo base_url('keluarga')?>" class="pull-left btn btn-default"><i class="fa fa-fw fa-arrow-left"></i>&nbsp;&nbsp; Kembali</a>
			<?php if ($hide == FALSE) { ?>
				<a href="<?php echo base_url('keluarga/edit/'.$pegawai['id_pegawai'])?>" class="edit-keluarga pull-right btn btn-warning"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp; Edit</a>
			<?php } ?>
		</div>
	</div>
</section>
<!-- /.content -->
</div>
