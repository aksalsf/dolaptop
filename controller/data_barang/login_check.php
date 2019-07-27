<?php 
	session_start();
	if($_SESSION['status']!="admin"){
			session_destroy();
			header("location:../../admin/view/login.php?pesan=belum_login");
		}
?>