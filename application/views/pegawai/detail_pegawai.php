  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Detail Pegawai<small>preview of simple tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

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
										<?php foreach ($lihat as $key => $value) {
										?>
										<tr>
											<td colspan="3">
												<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/dist/img/user1-128x128.jpg" alt="">
											</td>
										</tr>
										<tr>
											<td style="width: 100px">NIP</td>
											<td style="width: 20px">:</td>
											<td><?php echo $value->nbm; ?></td>
										</tr>
										<tr>
											<td>Nama</td>
											<td>:</td>
											<td><?php echo $value->nama; ?></td>
										</tr>
										<tr>
											<td>Tempat Lahir</td>
											<td>:</td>
											<td><?php echo $value->tempat_lahir; ?></td>
										</tr>
										<tr>
											<td>Tanggal Lahir</td>
											<td>:</td>
											<td><?php echo $value->tgl_lahir; ?></td>
										</tr>
										<tr>
											<td>Agama</td>
											<td>:</td>
											<td><?php echo $value->agama; ?></td>
										</tr>
										<tr>
											<td>Umur</td>
											<td>:</td>
											<td><?php echo $value->umur; ?></td>
										</tr>
										<tr>
											<td>Jenis Kelamin</td>
											<td>:</td>
											<td><?php echo $value->gender == 'L' ? 'Laki-laki':'Perempuan'; ?></td>
										</tr>
										<tr>
											<td>E-mail</td>
											<td>:</td>
											<td><?php echo $value->email; ?></td>
										</tr>
										<tr>
											<td>No Telepon</td>
											<td>:</td>
											<td><?php echo $value->telepon; ?></td>
										</tr>
										<tr>
											<td>Status Nikah</td>
											<td>:</td>
											<td><?php echo $value->status == 0 ? 'Belum Menikah':'Menikah'; ?></td>
										</tr>
										<?php } ?>
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
									<i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="col-md-12">
								<table class="table table-hover">
									<tbody>
										<?php foreach ($lihat as $key => $value) {
										?>
										<tr>
											<td style="width: 150px">Jenis Pegawai</td>
											<td style="width: 20px">:</td>
											<td><?php echo $value->jns_pegawai; ?></td>
										</tr>
										<tr>
											<td width="3">Status Pegawai</td>
											<td>:</td>
											<td><?php echo $value->status_pegawai; ?></td>
										</tr>
										<tr>
											<td width="1">Honorarium</td>
											<td>:</td>
											<td><?php echo 'Rp. '.$value->honor; ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
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
										<th>Anggota Keluarga</th>
										<th>Nama</th>
										<th>Status</th>
										<th>Gender</th>
									</thead>
									<tbody>
										<tr>
											<td>Istri</td>
											<td>edsedwerfawr dAFASAHSDJDFKDF VZDFASDFAGAWSFA</td>
											<td>value</td>
											<td>value</td>
										</tr>
										<tr>
											<td>Anak Pertama</td>
											<td>value</td>
											<td>value</td>
											<td>value</td>
										</tr>
										<tr>
											<td>Anak Kedua</td>
											<td>value</td>
											<td>value</td>
											<td>value</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
						<a href="<?php echo base_url('pegawai/table_pegawai')?>" class="btn btn-default">Kembali</a>
						<a href="<?php echo base_url('pegawai/edit_pegawai')?>" class="pull-right btn btn-warning edit-btn">Edit</a></td>
				</div>
			</div>
    </section>
    <!-- /.content -->
  </div>

