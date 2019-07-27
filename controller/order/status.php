<?php 

	include '../config.php';
	session_start();
	if ($_SESSION['status'] != "admin") {
		die();
		header('location: ../../admin/index.php');
	}

	$id_transaksi = $_GET['id_transaksi'];

	mysqli_query($conn, "UPDATE transaksi SET status = 'kirim' WHERE id_transaksi = '$id_transaksi'");

	header('location: ../../view/transaksi/index.php');
 ?>