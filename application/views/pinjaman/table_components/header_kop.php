<div class="box-header with-border">
	<div class="box-title pull-left">
		<h4	class="text-bold"><i class="fa fa-fw fa-bank"></i> Peminjaman Koperasi Murni</h4>
	</div>
	<div class="box-title pull-right">
		<div class="btn-group">
			<div class="btn-group">
				<button type="button" class="category btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				Peminjam Bulan Ini &nbsp;<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li class="thisMonth_BorrowerKop active"><a  href="#kop" data-toggle="tab">Peminjam Bulan Ini</a></li>
					<li class="history_BorrowerKop"><a  href="#oldkop" data-toggle="tab">Riwayat Peminjam</a></li>
					<li class="lunas_BorrowerKop"><a  href="#lunas_kop" data-toggle="tab">Sudah Lunas</a></li>
					<li class="belumLunas_BorrowerKop"><a  href="#belum_lunas_kop" data-toggle="tab">Belum Lunas</a></li>
				</ul>
			</div>
		</div>
		<div class="btn-group">
			<a href="<?php echo site_url('pinjaman/add');?>" class='btn btn-primary' >
				<i class="fa fa-plus-square-o"></i> Tambah Data 
			</a>
		</div>
	</div>
</div>
