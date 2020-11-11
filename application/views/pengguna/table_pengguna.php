  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Pengguna
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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> 
                <a href="<?php echo site_url('pegawai/add_pegawai');?>" class='btn btn-primary' >
                  <i class="fa fa-plus-square-o"></i> Tambah Data 
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>Status Online</th>
                  <th>Member at</th>
                  <th>Level</th>
                  <th style="width: 200px">Menu</th>
                </tr>
                <!-- <?php
                  $no=1; foreach ($tampil as $key) {
                ?> -->
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <!-- <td>
                    <a href = "<?php echo base_url('index.php/gaji/detail_gaji');?>/<?php echo $key['id_gaji']?>">
                      <span class="badge bg-green">  <i class="fa fa-fw fa-info-circle"></i>Detail</span>
                    </a>
                    <span class="badge bg-blue"> <i class="fa fa-pencil-square-o"> Edit </i></span>
                    <span class="badge bg-red"> <i class="fa fa-trash-o"> Hapus </i></span>
                  </td> -->
                </tr>
                <!-- <?php } ?> -->
              </table>
              
            </div>
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>