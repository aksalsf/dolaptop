<?php 
	session_start(); 
	if($_GET['pesan'] == "logout"){
			echo "<script type='text/javascript'>
	        alert('Anda berhasil logout!');
	        history.back(self);
	        </script>";
		} elseif($_SESSION['status']!="admin"){
			session_destroy();
			header("location:view/login.php?pesan=belum_login");
		}
?>