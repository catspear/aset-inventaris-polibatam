<?php
	error_reporting( error_reporting() & ~E_NOTICE );
	include "config/koneksi.php";

if ($_GET['page']=="data_user") {
    include "page/user/data_user.php";
}
if ($_GET['page']=="create_user") {
    include "page/user/create_user.php";
}
if ($_GET['page']=="edit_user") {
    include "page/user/edit_user.php";
}
if ($_GET['page']=="update_user") {
    include "page/user/update_user.php";
}
if ($_GET['page']=="delete_user") {
    include "page/user/delete_user.php";
}
if ($_GET['page']=="import_data") {
    include "page/user/form_import.php";
}




else if ($_GET['page']=="data_barang") {
    include "page/barang/data_barang.php";
}
else if ($_GET['page']=="create_barang"){
    include "page/barang/create_barang.php";
}
else if ($_GET['page']=="delete_barang"){
    include "page/barang/delete_barang.php";
}
else if ($_GET['page']=="edit_barang"){
    include "page/barang/edit_barang.php";
}
else if ($_GET['page']=="update_barang"){
    include "page/barang/update_barang.php";
}
else if ($_GET['page']=="export_barang"){
    include "page/barang/export_barang.php";
}
else if ($_GET['page']=="import_barang"){
    include "page/barang/import_barang.php";
}
else if ($_GET['page']=="data_transaksi") {
    include "page/transaksi/data_transaksi.php";
}else{
    include "page/dashboard.php";
}
?>