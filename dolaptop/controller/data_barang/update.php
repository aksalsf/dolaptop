<?php
include '../config.php';

$kode_barang =$_POST['kode_barang'];
$nama_barang =$_POST['nama_barang'];
$spesifikasi =$_POST['spesifikasi'];
$jumlah =$_POST['jumlah'];

$query="UPDATE barang SET nama_barang='$nama_barang', spesifikasi='$spesifikasi', jumlah='$jumlah' WHERE kode_barang='$kode_barang'";
mysqli_query($conn, $query);

header('location: ../../data_barang/index.php');
?>