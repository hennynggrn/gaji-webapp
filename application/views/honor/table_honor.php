<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> 
						<a href="<?php echo site_url('honor/add');?>" class='btn btn-primary' >
							<i class="fa fa-plus-square-o"></i> Tambah Data 
						</a>
					</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered table-hover responsive text-center">
						<thead>
							<th style="width: 10px">No</th>
							<th>Honorarium</th>
							<th>Jumlah Pegawai</th>
							<th>Jenis Jabatan Pegawai</th>
							<th>Menu</th>
						</thead>
						<tbody>
						<?php
							$no=1; foreach ($honors as $key => $honor) : ?>
							<tr>
								<td style="width: 10px"><?php echo $no++;?></td>
								<td style="text-align: left; padding-left: 50px;"><?php echo 'Rp. &nbsp;&nbsp;'.number_format($honor['honor'],2,',','.');?></td>
								<td><?php echo $honor['ids'];?></td>
								<td><?php echo $honor['ids'];?></td>
								<td>
									<a href="<?php echo site_url('honor/detail/'.$honor['honor']);?>" title="Detail" data-toggle="tooltip" data-placement="left">
										<span class="badge bg-green"><i class="fa fa-fw fa-info-circle"></i></span>
									</a>
									<a href="<?php echo site_url('honor/edit/'.$honor['honor']);?>" title="Edit" data-toggle="tooltip" data-placement="top">
										<span class="badge bg-orange"><i class="fa fa-fw fa-pencil-square-o"></i></span>
									</a>
									<a href="<?php echo site_url('honor/delete/'.$honor['honor']);?>" title="Hapus" data-toggle="tooltip" data-placement="right">
										<span class="badge bg-red"><i class="fa fa-fw fa-trash-o"></i></span>
									</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
				<div class="box-footer clearfix">
					<ul class="pagination pagination-sm no-margin pull-right">
						<li><a href="#">&laquo;</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">&raquo;</a></li>
					</ul>
				</div>
			</div>
			<!-- /.box -->
</section>
<!-- /.content -->
</div>
