<?php 

	include '../config.php';

	$id_transaksi = $_POST['id_transaksi'];
	$kode_barang = $_POST['kode_barang'];
	$jumlah = $_POST['jumlah'];

	$barang = mysqli_query($conn, "SELECT jumlah FROM barang WHERE kode_barang = '$kode_barang'");
	foreach ($barang as $stok) {
		$sisa = $stok['jumlah'] - $jumlah;
		mysqli_query($conn, "UPDATE barang SET jumlah = '$sisa' WHERE kode_barang = '$kode_barang'");
	}

	mysqli_query($conn, "UPDATE transaksi SET kode_barang = '$kode_barang', jumlah = '$jumlah' WHERE id_transaksi = '$id_transaksi'");

	header('location: ../../view/order/index.php');

 ?>