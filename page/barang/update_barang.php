<?php
$id = $_POST['id'];
$kode_barang= $_POST['kode_barang'];
$nama_barang= $_POST['nama_barang'];
$kondisi= $_POST['kondisi'];
$merk= $_POST['merk'];
$tgl_rekam = $_POST['tgl_rekam'];
$tgl_perolehan = $_POST['tgl_perolehan'];
$nilai_perolehan = $_POST['nilai_perolehan'];
$ruangan = $_POST['ruangan'];

 $mysqli->query("UPDATE inventory SET kode_barang = '$kode_barang',
                                      nama_barang = '$nama_barang',
                                      kondisi	  = '$kondisi',
                                      merk 		  = '$merk',
                                      tgl_rekam   = '$tgl_rekam',
                                      tgl_perolehan = '$tgl_perolehan',
                                      nilai_perolehan = '$nilai_perolehan',
                                      ruangan = '$ruangan',
                                      WHERE id = '$id'");

 echo "<script>alert('Data Berhasil Dirubah')</script>";
     echo "<script type='text/javascript'> document.location = 'index.php?page=data_barang'; </script>";

?>