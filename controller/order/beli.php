<?php 
	
	include '../config.php';
	session_start();

	if (empty($_SESSION)) {
		header('location:../../view/order/index.php');
		die();
	}

	$username = $_SESSION['username'];
	$kode_barang = $_POST['kode_barang'];
	$jumlah = $_POST['jumlah'];

	mysqli_query($conn, "INSERT INTO transaksi SET kode_barang = '$kode_barang', username = '$username', jumlah = '$jumlah'");

	$stok = mysqli_query($conn, "SELECT jumlah FROM barang WHERE kode_barang = '$kode_barang'");
	foreach ($stok as $value) {
		$sisa = $value['jumlah'] - $jumlah;
		mysqli_query($conn, "UPDATE barang SET jumlah = '$sisa' WHERE kode_barang = '$kode_barang'");
	}
	header('location:../../view/order/index.php');

 ?>