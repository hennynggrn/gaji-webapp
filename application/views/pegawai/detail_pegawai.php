  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Pegawai
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
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">

              <div class="col-md-12">Data Pegawai
                <table class="table table-hover">
                  <tbody>
                    <?php foreach ($lihat as $key => $value) {
                     ?>

                    <tr>
                      <td style="width: 150px">NIP</td>
                      <td style="width: 20px">:</td>
                      <td><?php echo $value->nbm; ?></td>
                    </tr>
                    <tr>
                      <td style="width: 150px">Nama</td>
                      <td style="width: 20px">:</td>
                      <td><?php echo $value->nama; ?></td>
                    </tr>
                    <tr>
                      <td width="1">Tempat Lahir</td>
                      <td>:</td>
                      <td><?php echo $value->tempat_lahir; ?></td>
                    </tr>
                    <tr>
                      <td width="1">Tanggal Lahir</td>
                      <td>:</td>
                      <td><?php echo $value->tgl_lahir; ?></td>
                    </tr>
                    <tr>
                      <td width="1">Agama</td>
                      <td>:</td>
                      <td><?php echo $value->agama; ?></td>
                    </tr>
                    <tr>
                      <td width="1">Umur</td>
                      <td>:</td>
                      <td><?php echo $value->umur; ?></td>
                    </tr>
                    <tr>
                      <td width="1">Jenis Kelamin</td>
                      <td>:</td>
                      <td><?php echo $value->jns_klmn; ?></td>
                    </tr>
                    <tr>
                      <td width="1">E-mail</td>
                      <td>:</td>
                      <td><?php echo $value->email; ?></td>
                    </tr>
                    <tr>
                      <td width="1">No Telepon</td>
                      <td>:</td>
                      <td><?php echo $value->telepon; ?></td>
                    </tr>
                    <tr>
                      <td width="1">Status</td>
                      <td>:</td>
                      <td><?php echo $value->status; ?></td>
                    </tr>
                    <tr>
                      <td width="1">Jenis Karyawan</td>
                      <td>:</td>
                      <td><?php echo $value->jns_pegawai; ?></td>
                    </tr>
                    <tr>
                      <td width="1">StatusKaryawan</td>
                      <td>:</td>
                      <td><?php echo $value->status_pegawai; ?></td>
                    </tr>

                    <?php } ?>
                    
                  </tbody>
                </table>
              </div>

              <div class="col-md-12">
                <td>
                  <a href = "<?php echo base_url('index.php/pegawai/table_pegawai');?>">
                    <span class="badge bg-yellow">  <i class="fa fa-fw fa-info-circle"></i>Kembali</span>
                  </a>
                    <span class="badge bg-blue"> <i class="fa fa-fw fa-pencil-square-o"></i>Edit</span>
                  </td>
              </div>

            </div>
          </div>

          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>