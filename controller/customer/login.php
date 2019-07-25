<?php 

	session_start();

	include '../config.php';

	$username = $_POST['email'];
	$password = $_POST['password'];

	$login = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$username' AND password = '$password' ");

	$check = mysqli_num_rows($login);

	if ($check > 0) {
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";
		header('location: ../../index.php');
	} else {
		header('location: ../../index.php?pesan=gagal');
	}
 ?>