<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-5">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Biodata Pegawai</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-md-12">
						<table class="table table-hover">
							<tbody>
								<?php
									$id = $pegawai['id_pegawai'];
									$gender = $pegawai['gender'];
								?>
								<tr>
									<td colspan="3">
										<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/dist/img/upload/'.$pegawai['foto']); ?>" 
										alt="<?php echo 'Foto '.$pegawai['nama'];?>">
									</td>
								</tr>
								<tr>
									<td style="width: 100px">NBM</td>
									<td style="width: 20px">:</td>
									<td><?php echo $pegawai['nbm']; ?></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?php echo $pegawai['nama']; ?></td>
								</tr>
								<tr>
									<td>Tempat Lahir</td>
									<td>:</td>
									<td><?php echo $pegawai['tempat_lahir']; ?></td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td>:</td>
									<td><?php echo fullConvertIDN($pegawai['tgl_lahir'], $short = FALSE, $day = FALSE); ?></td>
								</tr>
								<tr>
									<td>Agama</td>
									<td>:</td>
									<td><?php echo $pegawai['agama']; ?></td>
								</tr>
								<tr>
									<td>Umur</td>
									<td>:</td>
									<td><?php echo $pegawai['umur']; ?>&nbsp; tahun</td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td>:</td>
									<td><?php echo $pegawai['gender'] == 'L' ? 'Laki-laki':'Perempuan'; ?></td>
								</tr>
								<tr>
									<td>E-mail</td>
									<td>:</td>
									<td><?php echo $pegawai['email']; ?></td>
								</tr>
								<tr>
									<td>No Telepon</td>
									<td>:</td>
									<td><?php echo ($pegawai['telepon'] != 0) ? $pegawai['telepon'] : '-'; ?></td>
								</tr>
								<tr>
									<td>Status Nikah</td>
									<td>:</td>
									<td><?php echo $pegawai['status'] == 0 ? 'Belum Menikah':'Menikah'; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Informasi Pekerjaan Pegawai</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-md-12">
						<table class="table table-hover">
							<tbody>
								<tr>
									<td style="width: 150px">Jabatan Pegawai</td>
									<td style="width: 20px">:</td>
									<td>
									<?php 
										if (!empty($jabatans)) {
											foreach ($jabatans as $key => $jabatan) { ?>
												<span class="badge bg-grey"><?php echo $jabatan['jabatan'];?></span>
									<?php }} else { echo '-';} ?>
									</td>
								</tr>
								<tr>
									<td style="width: 150px">Masa Kerja</td>
									<td style="width: 20px">:</td>
									<td><?php echo ($pegawai['masa_kerja'] != 0) ? $pegawai['tahun'].' tahun' : '<small>(belum genap 1 tahun)</small>';?></td>
								</tr>
								<tr>
									<td>Jenis Pegawai</td>
									<td>:</td>
									<td><?php echo ($pegawai['jns_pegawai'] == 'G') ? 'Guru' : 'Karyawan'; ?></td>
								</tr>
								<tr>
									<td width="3">Status Pegawai</td>
									<td>:</td>
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
											case NULL:
												echo '-';
												break;
										}?>
									</td>
								</tr>
								<?php if($pegawai['status_pegawai'] == 'T1'):?>
								<tr>
									<td width="1">Honorarium</td>
									<td>:</td>
									<td><?php echo 'Rp. '.number_format($pegawai['honor'],2,',','.');
									echo '<small class="text-bold">'; if($pegawai['honor'] == 0) echo ' (belum ditentukan) </small>';?></td>
								</tr>
								<?php endif;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php if($pegawai['status'] == 1) :?>
		<div class="col-md-7">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Data Anggota Keluarga Pegawai</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-md-12">
						<table class="table text-center table-bordered table-hover">
							<thead>
								<th>Status Anggota</th>
								<th>Nama</th>
								<th>Status Hidup</th>
								<th>Gender</th>
							</thead>
							<tbody>
							<?php foreach ($keluargas as $key => $keluarga) : ?>
								<tr>
									<td class="text-bold">
										<?php switch ($keluarga['id_status']) {
											case '1':
												echo ($gender == 'L') ? 'Istri' : 'Suami';
												break;
											case '2':
												echo 'Anak Pertama';
												break;
											case '3':
												echo 'Anak Kedua';
												break;
										}?>
									</td>
									<td style="text-align: left; padding-left: 10px;"><?php echo (!empty($keluarga['nama'])) ? $keluarga['nama'] : '-';?></td>
									<td><?php echo ($keluarga['gender'] == 'P') ? 'Perempuan' : 'Laki-laki';?></td>
									<td><?php echo ($keluarga['s_hidup'] == 1) ? 'Hidup' : 'Meninggal';?></td>
								</tr>
							<?php endforeach;?>										
							</tbody>
						</table>
					</div>
				</div>
				<div class="box-footer text-info">
					<h5 class="text-bold"><i class="fa fa-fw fa-info-circle"></i>&nbsp;&nbsp; Info :</h5>
					<ul>
						<li>Edit untuk menambahkan/mengubah anggota keluarga</li>
					</ul>
				</div>
			</div>
		</div>
		<?php endif;?>
		<div class="col-md-12">
			<a href="<?php echo site_url('pegawai')?>" class="pull-left btn btn-default"><i class="fa fa-fw fa-arrow-left"></i>&nbsp;&nbsp; Kembali</a>
			<?php if ($hide == FALSE) { ?>
				<a href="<?php echo site_url('pegawai/edit/'.$id)?>" class="pull-right btn btn-warning"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp; Edit</a></td>
			<?php } ?>
		</div>
	</div>
</section>
<!-- /.content -->
</div>

