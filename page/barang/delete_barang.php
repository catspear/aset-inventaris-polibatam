<?php

$mysqli->query("DELETE FROM inventory WHERE id = '$_GET[kode]'");


echo "<script>alert('Data Berhasil Dihapus')</script>";
echo "<script type='text/javascript'> document.location = 'index.php?page=data_barang'; </script>"; 


?>