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
$img_qrcode = $_POST['img_qrcode'];


$mysqli->query("INSERT INTO inventory VALUES ('$id','$kode_barang','$nama_barang','$kondisi','$merk','$tgl_rekam','$tgl_perolehan','$nilai_perolehan','$ruangan','$img_qrcode')");

    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script type='text/javascript'> document.location = 'index.php?page=data_barang'; </script>"; 
?>