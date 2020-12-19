	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-success">
					<div class="box-header with-border"> <br>
						<table class="" style="font-size: 20px" width="100%">
							<tr>
								<th>Gaji Bersih</th>
								<th class="text-right">Rp. &nbsp;<?php echo number_format($pegawai['honor'],0,',','.');?></th>
							</tr>
						</table> <br>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-hover text-center">
							<thead>
								<th>Honorarium</th>
								<th>Jumlah Tunjangan</th>
								<th>Jumlah Potongan</th>
							</thead>
							<tbody>
								<tr>
									<td>Rp. &nbsp;<?php echo number_format($pegawai['honor'],0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="box-tittle">Tunjangan</h4>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-hover text-center">
							<thead>
								<th>Beras</th>
								<th>Jamsostek</th>
								<th>Keluarga</th>
								<th>Jabatan</th>
								<th>Masa Kerja</th>
							</thead>
							<tbody>
								<tr>
									<td>Rp. &nbsp;<?php echo number_format($tunjangan['beras'],0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format($tunjangan['jamsostek'],0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format($tunjangan['beras'],0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format($tunjangan['beras'],0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<!-- Profile Image -->
				<div class="box box-warning">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>assets/dist/img/person2.jpg" alt="User profile picture">

						<h3 class="profile-username text-center"><?php echo $pegawai['nama'];?></h3>

						<p class="text-muted text-center"><?php echo $pegawai['nbm'];?></p>
						<table class="table table-hover responsive" style="font-size: 14px;">
							<tbody>
								<tr>
									<td class="text-left text-bold" style="width: 200px;">Jenis Pegawai</td>
									<td class="text-right text-muted">
										<?php echo ($pegawai['jns_pegawai'] == 'G') ? 'Guru' : 'Karyawan';?>
									</td>
								</tr>
								<tr>
									<td class="text-left text-bold">Jabatan</td>
									<td class="text-right text-muted">
										<?php foreach ($jabatans as $key => $jabatan) { ?>
											<span class="badge bg-grey"><?php echo $jabatan['jabatan'];?></span>
										<?php } ?>
									</td>
								</tr>
								<tr>
									<td class="text-left text-bold">Masa Kerja</td>
									<td class="text-right text-muted">
										<?php echo ($pegawai['tahun'] != 0) ? $pegawai['tahun'].' tahun' : '<small>(belum genap 1 tahun)</small>';?> 
									</td>
								</tr>
								<tr>
									<td class="text-left text-bold">Jumlah Anggota Keluarga 
										<i class="fa fa-fw fa-info-circle text-info" title="tunjangan untuk anggota keluarga berstatus hidup" data-tooltip="tooltip" data-placement="top"></i>
									</td>
									<td class="text-right text-muted">
										<?php 
											$keluarga_tunjangan = array();
											foreach ($keluargas as $key => $keluarga) {
												if (($keluargas != NULL) && ($keluarga['tunjangan'] == 1)) {
													$keluarga_tunjangan[] = $keluarga['tunjangan'];														
												} 
											} 
											if (empty($keluargas)) {
												echo '- &nbsp;&nbsp;<small>(belum menikah)</small>';
											} else {
												if ((count($keluarga_tunjangan) != 0) && (count($keluargas) != count($keluarga_tunjangan))) {
													echo count($keluarga_tunjangan).' (dari '.count($keluargas).') anggota';
												} else if ((count($keluarga_tunjangan) != 0) && (count($keluargas) == count($keluarga_tunjangan))) {
													echo count($keluarga_tunjangan).' anggota';
												} else {
													echo '-';
												}
											}
										?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="box-tittle">Potongan</h4>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-hover text-center">
							<thead>
								<th>Infaq</th>
								<th>Sosial</th>
								<th>Jasa Raharja</th>
								<th>Jamsostek</th>
								<th>Aisiyah</th>
								<th>Koperasi Murni</th>
								<th>Bank Bina Drajat Warga</th>
							</thead>
							<tbody>
								<tr>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
									<td>Rp. &nbsp;<?php echo number_format(1000,0,',','.');?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="box-footer clearfix">
						<ul class="pagination pagination-sm no-margin pull-right">
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<a href="<?php echo base_url('table')?>" class="pull-left btn btn-default">Kembali</a>
				<a href="<?php echo base_url('gaji/print/1')?>" class="edit-keluarga pull-right btn bg-blue edit-btn">Cetak</a></td>
			</div>
	</div>
				<!-- /.box -->
	</section>
	<!-- /.content -->
</div>
