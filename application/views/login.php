<!DOCTYPE html>
<html>
<head>
  <title>Halaman Login</title>
  <link rel="stylesheet" href="<?php echo base_url()."assets/bootstrap/css/bootstrap.css" ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url()."assets/dist/css/AdminLTE.min.css" ?>" type="text/css"> 
  <style>
    .loginbox{
      margin : 100px auto;
      width : 500px;
      position : center;
      border-radius: 15px;
      background: #ffffff;
    }
    body{
      background-color: rgb(109, 209, 209);
    }
  </style>
</head>
<body>
<div class="box box-info loginbox">
            <div class="box-header with-border">
              
            <center><img src="<?php echo base_url();?>assets/dist/img/magelang.png"/ height="200px" width="250px"> <br> <br>
              <h3>Sistem Informasi Gaji Guru dan Karyawan</h3> 
              <h3 class="box-title">SMP Muhammadiyah 9 Yogyakarta</h3>
            </center>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url('login/aksi_login'); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" placeholder="Username" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Login</button>
              </div>
</body>
</html>
