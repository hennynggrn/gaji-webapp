<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header"></div>
				<!-- /.box-header -->
				<form role="form" method="post" action="<?php echo site_url('potongan/update_potongan')?>">
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Infaq</label>
									<div class="input-group">
										<span class="input-group-addon">Rp.</span>
										<input class="form-control" name="infaq" value="<?php echo $potongan['infaq'];?>" style="width: 100%;">
									</div>
								</div>
								<div class="form-group">
									<label>Sosial</label>
									<div class="input-group">
										<span class="input-group-addon">Rp.</span>
										<input class="form-control"  name="sosial" value="<?php echo $potongan['sosial'];?>" style="width: 100%;">
									</div>
								</div>
								<div class="form-group">
									<label>Aisiyah</label>
									<div class="input-group">
										<span class="input-group-addon">Rp.</span>
										<input class="form-control"  name="aisiyah" value="<?php echo $potongan['aisiyah'];?>" style="width: 100%;">
									</div>
								</div>
								<div class="form-group">
									<label>Jasa Raharja</label>
									<div class="input-group">
										<span class="input-group-addon">Rp.</span>
										<input class="form-control"  name="jsr" value="<?php echo $potongan['jsr'];?>" style="width: 100%;">
									</div>
								</div>
								<div class="form-group">
									<label>Jamsostek</label>
									<div class="input-group">
										<span class="input-group-addon">Rp.</span>
										<input class="form-control"  name="jamsostek" value="<?php echo $potongan['jamsostek'];?>" style="width: 100%;">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Catatan</label>
									<div class="input-group">
										<textarea class="textarea" name="ket" placeholder="Keterangan tambahan potongan.." style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $potongan['ket'];?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<a href="<?php echo site_url('potongan')?>" class="pull-left btn btn-default edit-btn">Batal</a>
						<button type="submit" class="pull-right btn btn-primary edit-btn">Simpan</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</section>
<!-- /.content -->
</div>
