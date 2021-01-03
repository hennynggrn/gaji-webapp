<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header"></div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-12">
						<table class="table table-hover text-left">
							<tbody>
								<tr>
									<th width="120px">Infaq</th>
									<td width="20px" style="padding-right: 20px">:</td>
									<td class=""><?php echo 'Rp. &nbsp;&nbsp;'.number_format($potongan['infaq'],0,',','.');?></td>
								</tr>
								<tr>
									<th>Sosial</th>
									<td>:</td>
									<td><?php echo 'Rp. &nbsp;&nbsp;'.number_format($potongan['sosial'],0,',','.');?></td>
								</tr>
								<tr>
									<th>Aisiyah</th>
									<td>:</td>
									<td><?php echo 'Rp. &nbsp;&nbsp;'.number_format($potongan['aisiyah'],0,',','.');?></td>
								</tr>
								<tr>
									<th>Jasa Raharja</th>
									<td>:</td>
									<td><?php echo 'Rp. &nbsp;&nbsp;'.number_format($potongan['jsr'],0,',','.');?></td>
								</tr>
								<tr>
									<th>Jamsostek</th>
									<td>:</td>
									<td><?php echo 'Rp. &nbsp;&nbsp;'.number_format($potongan['jamsostek'],0,',','.');?></td>
								</tr>
								<tr>
									<th>Pinjaman</th>
									<td>:</td>
									<td>
										Koperasi Murni dan Bank Bina Drajat Warga (BDW) <a href="<?php echo site_url('pinjaman');?>" class="badge bg-blue">Lihat Pinjaman Pegawai <i class="fa fa-fw fa-arrow-circle-right"></i></a>
									</td>
								</tr>
								<tr>
									<th>Catatan</th>
									<td>:</td>
									<td><?php echo ($potongan['ket'] != NULL) ?  $potongan['ket'] : '-';?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="<?php echo site_url('potongan/edit')?>" class="pull-right btn btn-warning edit-btn btn-block"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Edit</a>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</section>
<!-- /.content -->
</div>
