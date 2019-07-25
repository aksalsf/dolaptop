<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' AND password='$password'");
 
// menghitung jumlah data yang ditemukan
$check = mysqli_num_rows($login);
 
if($check > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:../index.php");
}else{
	header("location:../view/login.php?pesan=gagal");
}
?>