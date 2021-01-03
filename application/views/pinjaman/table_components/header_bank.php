<div class="box-header with-border">
	<div class="box-title pull-left">
		<h4	class="text-bold"><i class="fa fa-fw fa-bank"></i>  Pinjaman Bank Bina Drajat Warga (BDW)</h4>
	</div>
	<div class="box-title pull-right">
		<div class="btn-group">
			<div class="btn-group">
				<button type="button" class="category btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				Pinjaman Bulan Ini &nbsp;<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li class="thisMonth_BorrowerBank active"><a  href="#bank" data-toggle="tab">Pinjaman Bulan Ini</a></li>
					<li class="history_BorrowerBank"><a  href="#oldbank" data-toggle="tab">Riwayat Pinjaman</a></li>
					<li class="lunas_BorrowerBank"><a  href="#lunas_bank" data-toggle="tab">Sudah Lunas</a></li>
					<li class="belumLunas_BorrowerBank"><a  href="#belum_lunas_bank" data-toggle="tab">Belum Lunas</a></li>
				</ul>
			</div>
		</div>
		<?php if ($hide == FALSE) { ?>
			<div class="btn-group">
				<a href="<?php echo site_url('pinjaman/add');?>" class='btn btn-primary' >
					<i class="fa fa-plus-square-o"></i>&nbsp;&nbsp; Tambah Data 
				</a>
			</div>
		<?php } ?>
	</div>
</div>
