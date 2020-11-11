<!DOCTYPE html>
<html>
<head>
  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
    <thead>
      <tr>
        <td>
          <img src="<?php echo base_url();?>assets/dist/img/magelang.png"/ height="100px" width="150px">
        </td>
        <td>PEMERINTAH DESA PANDANRETNO KECAMATAN SRUMBUNG <br> RINCIAN ANGGARAN BIAYA (RAB) <br> Belanja Barang dan Jasa</td>
      </tr>
  </table>
</head>
<br>
<body onload="window.print()">

<table border='1' id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
  <thead>              
  <tr>
    <th>No</th>
    <th>Uraian</th>
    <th>Volume</th>
    <th>Harga Satuan</th>
    <th>Jumlah</th>
  </tr>
  </thead>                             
  <?php
    $total = 0;
    $no=1; 
    if(isset($rabbj)){
    foreach ($rabbj as $key) {
  ?>
  <tr>
    <td height="40" width="50"><?php  echo $no++; ?>
    <td height="40" width="300"><?php echo $key['uraian'] ?></td>
    <td align="center" height="40" width="300"><?php echo $key['volume'] ?></td>

    <?php $jumlah = $key['volume'] * $key['harga_satuan'];
    $total += $jumlah;
    ?>
    
    <td align="right" height="40" width="300"><?php echo "Rp. " . number_format($key['harga_satuan'],2,',','.'); ?></td>
    <td align="right" height="40" width="300"><?php echo "Rp. " . number_format($jumlah,2,',','.');?></td>
  </tr>
  <?php } }else {
  }?>  
</table>

<br>
<br>

<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
  <thead>
      <tr>
        <td height="10" width="350">Kepala Desa</td>
        <td height="10" width="350" style="text-align: right;">Bendahara</td>
      </tr>
      <tr>
        <td height="150" width="350">Uwata</td>
        <td height="150" width="350" style="text-align: right;">Nurkholis</td>
      </tr>
</table>

</body>
</html>