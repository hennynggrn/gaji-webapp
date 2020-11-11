  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Peminjaman
        <small>preview of simple tables</small>
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
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Koperasi Murni</a></li>
              <li><a href="#timeline" data-toggle="tab">Bank Bina Drajat Warga</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">

                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Peminjaman</button>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Daftar Peminjam</a></li>
                    <li><a href="#">Riwayat Peminjam</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <a href="<?php echo site_url('pinjaman/add_pjm_kop');?>" class='btn btn-primary' >
                    <i class="fa fa-plus-square-o"></i> Tambah Data </a>
                </div>

                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama Pegawai</th>
                      <th>Kode Pinjaman Koperasi</th>
                      <th>Total Pinjaman Koperasi</th>
                      <th>Jumlah Angsuran</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                      <th>Keterangan</th>
                      <th style="width: 160px">Menu</th>
                    </tr>
                    <?php
                      $no=1; 
                      foreach ($tampil as $key => $value) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value['nama']; ?></td>
                      <td><?php echo $value['kode_pjm_kop']; ?></td>
                      <td><?php echo $value['total_pjm_kop']; ?></td>
                      <td><?php echo $value['jml_asr_kop']; ?></td>
                      <td><?php echo $value['start_date']; ?></td>
                      <td><?php echo $value['end_date']; ?></td>
                      <td><?php if($value['ket_pjm_kop']==1) { echo 'Lunas';} else { echo 'Belum Lunas'; } ?></td>
                      <td>
                        <span class="badge bg-green">  <i class="fa fa-fw fa-info-circle"></i>Detail</span>
                        <span class="badge bg-blue">  <i class="fa fa-pencil-square-o"></i>Edit</span>
                        <span class="badge bg-red"> <i class="fa fa-trash-o"></i> Hapus </span>
                    </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <a href="<?php echo site_url('kopmurni/add_kopmurni');?>" class='btn btn-primary' >
                    <i class="fa fa-plus-square-o"></i> Tambah Data </a>
                </div>

                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama Pegawai</th>
                      <th>Kode Pinjaman Bank</th>
                      <th>Total Pinjaman Bank</th>
                      <th>Jumlah Angsuran</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                      <th>Status Pinjam</th>
                      <th>Keterangan</th>
                      <th style="width: 250px">Menu</th>
                    </tr>
                    <?php
                      $no=1; 
                      foreach ($tampil as $key => $value) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value['nama']; ?></td>
                      <td><?php echo $value['kode_pjm_bank']; ?></td>
                      <td><?php echo $value['total_pjm_bank']; ?></td>
                      <td><?php echo $value['jml_asr_bank']; ?></td>
                      <td><?php echo $value['start_date']; ?></td>
                      <td><?php echo $value['end_date']; ?></td>
                      <td><?php echo $value['status_pjm_bank']; ?></td>
                      <td><?php echo $value['ket_pjm_bank']; ?></td>
                      <td>
                        <span class="badge bg-green">  <i class="fa fa-fw fa-info-circle"></i>Detail</span>
                        <span class="badge bg-blue">  <i class="fa fa-pencil-square-o"></i>Edit</span>
                        <span class="badge bg-red"> <i class="fa fa-trash-o"></i> Hapus </span>
                    </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
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