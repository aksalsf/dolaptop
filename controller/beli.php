<?php 

	include 'config.php';
	
	session_start();

	$_SESSION['username'] = $username;
	// Cek validasi session
	// menyeleksi data admin dengan username dan password yang sesuai
	$data = mysqli_query($conn,"SELECT * FROM customer WHERE username='$username'");
	 
	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($data);
	 
	if($cek > 0){
		$_SESSION['username'] = $username;
	}else{
		header("location:../index.php?pesan=belum_login");

}
?>