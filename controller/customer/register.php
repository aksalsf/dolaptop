<?php 

	include '../config.php';

	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = mysqli_query($conn, "INSERT INTO customer SET nama_customer = '$nama', username = '$email', password = '$password', address = '$alamat', phone = '$telepon' ");

	header('location: ../../index.php');
 ?>