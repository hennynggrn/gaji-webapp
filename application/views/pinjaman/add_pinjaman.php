  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Pinjaman Koperasi
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            </div>

            <div class="box-body">
              <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'index.php/pinjaman/add_pjm_kop_proses' ?>" >

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Pegawai</label>
                  <div class="col-sm-10">
                    <input type="varchar" class="form-control" name="nama" placeholder="Nama Pegawai">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kode Pinjaman</label>
                  <div class="col-sm-10">
                    <input type="varchar" class="form-control" name="kd_pjm" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Total Pinjaman</label>
                  <div class="col-sm-10">
                    <input type="varchar" class="form-control" name="ttl_pjm" placeholder="">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Pinjam</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl_pjm" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Jumlah Angsuran</label>
                  <div class="col-sm-10">
                    <input type="text" value="0" class="form-control" id="jumlahAng" name="jml_angsuran" disabled placeholder="">
                  </div>
                </div>

                <!-- <div class="form-group">
                  <label class="col-sm-2 control-label">ID</label>
                  <div class="col-sm-10">
                    <input type="number" value="" class="form-control" name="id_borrower" placeholder="ID Peminjam">
                  </div>
                </div> -->

                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <table class="table tableAngsuran table-bordered text-center">
                      <thead>
                        <tr> 
                          <td>No</td>
                          <td>Tanggal Kembali</td>
                          <td>Nominal Angsuran</td>
                          <td>Aksi</td>
                        </tr>
                        <?php $no=1; ?>
                      </thead>
                      <!-- <tr>
                        <td><input type="number" class="form-control" name="nomor" placeholder="nomor"></td>
                        <td><input type="date" class="form-control" name="tgl_kembali" placeholder="Tanggal Kembali"></td>
                        <td><input type="int" class="form-control" name="nom_angsuran" placeholder="Nilai Angsuran"></td>
                        <td>
                          <div id="btnAdd" class="btn-group">
                            <a href="#" class='btn btn-primary' >
                              <i class="fa fa-plus"></i></a>
                          </div>
                        </td>
                      </tr> -->
                      <tbody id="angsuranTable">
                        <tr></tr>
                        <!-- <tr> 
                          <td>1</td>
                          <td><input type="date" class="form-control" name="tgl_kembali" placeholder="Tanggal Kembali"></td>
                          <td>
                            <div class="input-group">
                              <span class="input-group-addon">Rp.</span>
                              <input type="text" class="form-control" name="nom_angsuran" placeholder="Nilai Angsuran">
                              <span class="input-group-addon">.00</span>
                            </div>
                          </td>
                          <td>
                            <div class="remove btn-group">
                              <a href="#" class='btn btn-danger' >
                                <i class="fa fa-close"></i></a>
                            </div>
                          </td>
                        </tr> -->
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="4">
                            <div id="btnAdd" class="btn-group">
                              <a href="#" class='btn btn-primary'>Tambah Angsuran</a>
                            </div>
                          </td>
                        </tr>
                      </tfoot>
                  </table>

                  </div>
                  
                  <!-- <div class="col-sm-10">
                    <label class="col-sm-3 control-label">
                    <span>1 </span>Tanggal Kembali</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control" name="jml_jam">
                  </div>
                  <label class="col-sm-3 control-label">Nilai Angsuran</label>
                  <div class="col-sm-2">
                    <input type="int" class="form-control" name="jml_jam" placeholder="Nilai Angsuran I">
                  </div>
                  </div> -->
                </div>

                

                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan Pinjam</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="ket_pjm_kop">
                      <option value='0'>Belum Lunas</option>
                      <option value='1'>Lunas</option>
                    </select>
                  </div>
                </div>

                <!-- <section class="container">
                <div class="table table-responsive">
                <table class="table table-responsive table-striped table-bordered">
                <thead>
                  <tr>
                      <td>Tanggal Kembali</td>
                      <td>Nilai Angsuran</td>
                      <td>BTN</td>
                    </tr>
                </thead>
                <tbody id="TextBoxContainer">
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="5">
                    <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add more controls"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add&nbsp;</button></th>
                  </tr>
                </tfoot>
                </table>
                </div>
                </section> -->



               <!--  <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah Angsuran</label>

                  <div class="col-sm-2">
                    <output type="int" class="form-control" name="jml_jam" disabled></output>
                  </div>
                  <label class="col-sm-3 control-label">Total Nominal Angsuran</label>

                  <div class="col-sm-2">
                    <output type="int" class="form-control" name="jml_jam" disabled></output>
                  </div>
                </div> -->

                <div class="form-group" id="angsuran">
                  
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">                  
                    <input type="submit" class="btn btn-info pull-left" value="Tambah">
                  </div>
                </div>

              </form>
            </div>

          </div>
        </div>
        
       </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>