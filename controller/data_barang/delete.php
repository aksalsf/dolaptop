<?php
include '../config.php';

$kode_barang = $_GET['kode_barang'];

$query = mysqli_query($conn, "DELETE FROM barang WHERE kode_barang = '$kode_barang'");

// mysqli_query($conn, $query);

header('location: ../../data_barang/index.php');
?>