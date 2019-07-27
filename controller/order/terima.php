<?php 

	include '../config.php';

	$id_transaksi = $_GET['id_transaksi'];

	mysqli_query($conn, "UPDATE transaksi SET status = 'sukses' WHERE id_transaksi = '$id_transaksi'");

	header('location: ../../view/order/index.php');
 ?>