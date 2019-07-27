<?php 

	include '../config.php';

	$id_transaksi = $_GET['id_transaksi'];

	$jumlah_beli = mysqli_query($conn, "SELECT kode_barang, jumlah FROM transaksi WHERE id_transaksi = '$id_transaksi'");
	foreach ($jumlah_beli as $transaksi) {
		$kode_barang = $transaksi['kode_barang'];
		$barang = mysqli_query($conn, "SELECT jumlah FROM barang WHERE kode_barang = '$kode_barang'");
		foreach ($barang as $stok) {
			$sisa = $stok['jumlah'] + $transaksi['jumlah'];
			mysqli_query($conn, "UPDATE barang SET jumlah = '$sisa' WHERE kode_barang = '$kode_barang'");
		}
	}
	// Hapus
	mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");

	header('location:../../view/order/index.php');
 ?>