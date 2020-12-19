<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#kop" data-toggle="tab">Koperasi Murni</a></li>
					<li><a href="#bank" data-toggle="tab">Bank Bina Drajat Warga</a></li>
				</ul>
				<div class="tab-content">
					<?php 
					$thead = '<thead>
								<th>No</th>                                  
								<th>Nama Peminjam</th>
								<th>Tanggal Pinjam</th>
								<th>Batas Pengembalian</th>
								<th>Total Pinjaman</th>
								<th>Jumlah Angsuran</th>
								<th>Status</th>
								<th>Menu</th>
							</thead>';
					$i = 0; $j = 0; $t = 0;
					include 'table_components/table_kop.php';
					include 'table_components/table_bank.php';
					?>
				</div>
				<!-- /.tab-content -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
			</div>
		</div>
	</div>
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
