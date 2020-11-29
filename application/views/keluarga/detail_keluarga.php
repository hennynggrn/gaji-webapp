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
							<th>Nama</th>
							<th>Status</th>
							<th>Jenis Kelamin</th>
							<th>Status Hidup</th>
						</thead>
						<tbody>
							<tr>
								<td style="width: 10px">1</td>
								<td style="text-align: left; padding-left: 15px;"><?php echo $pegawai['nama'];?> &nbsp;
									<span class="badge bg-blue">pegawai</span>
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
			<a href="<?php echo base_url('keluarga')?>" class="pull-left btn btn-default">Kembali</a>
			<a href="<?php echo base_url('keluarga/edit/'.$id_keluarga)?>" class="edit-keluarga pull-right btn btn-warning edit-btn">Edit</a></td>
		</div>
	</div>
</section>
<!-- /.content -->
</div>
