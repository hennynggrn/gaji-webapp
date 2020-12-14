<div class="tab-pane" id="bank">
	<?php include 'header_bank.php'; ?>
	<div class="box-body">
		<h5 class="text-primary text-bold"> Daftar Pinjaman Bulan <?php echo $today_month.' '.$today_year;?></h5>
		<table class="table table-bordered text-center table-hover <?php echo 'table'.$t++;?>">
			<?php
				echo $thead;
				$no=1; 
				foreach ($pinjamans as $key => $pinjaman) :
					if($pinjaman['kode_pinjaman'] == 'BANK') {
						if (($pinjaman['start_month_IDN'] === $today_month) && ($pinjaman['start_year_IDN'] === $today_year)) {
							include 'body_table.php';
						} 
					} 
				endforeach;
			?>
		</table>
	</div>
</div>
<div class="tab-pane" id="oldbank">
	<?php include 'header_bank.php'; ?>
	<div class="box-body">
		<h5 class="text-primary text-bold"> Daftar Riwayat Pinjaman</h5>
		<table class="table table-bordered text-center table-hover <?php echo 'table'.$t++;?>">
			<?php
				echo $thead;
				$no=1; 
				foreach ($pinjamans as $key => $pinjaman) :
					if($pinjaman['kode_pinjaman'] == 'BANK') {
						include 'body_table.php';
					} 
				endforeach;
			?>
		</table>
	</div>
</div>
<div class="tab-pane" id="lunas_bank">
	<?php include 'header_bank.php'; ?>
	<div class="box-body">
		<h5 class="text-primary text-bold"> Daftar Pinjaman Sudah Lunas</h5>
		<table class="table table-bordered text-center table-hover <?php echo 'table'.$t++;?>">
			<?php
				echo $thead;
				$no=1; 
				foreach ($pinjamans as $key => $pinjaman) :
					if($pinjaman['kode_pinjaman'] == 'BANK') {
						if($pinjaman['jml_angsuran']-$pinjaman['status_ang'] == 0) {
							include 'body_table.php';
						}
					} 
				endforeach;
			?>
		</table>
	</div>
</div>
<div class="tab-pane" id="belum_lunas_bank">
	<?php include 'header_bank.php'; ?>
	<div class="box-body">
		<h5 class="text-primary text-bold"> Daftar Pinjaman Belum Lunas</h5>
		<table class="table table-bordered text-center table-hover <?php echo 'table'.$t++;?>">
			<?php
				echo $thead;
				$no=1; 
				foreach ($pinjamans as $key => $pinjaman) :
					if($pinjaman['kode_pinjaman'] == 'BANK') {
						if($pinjaman['jml_angsuran']-$pinjaman['status_ang'] != 0) {
							include 'body_table.php';
						} 
					} 
				endforeach;
			?>
		</table>
	</div>
</div>
