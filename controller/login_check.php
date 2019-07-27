<?php 
	session_start(); 
	if($_SESSION['status']!="login"){
			session_destroy();
			header("location:../../index.php?pesan=belum_login");
		}
?>