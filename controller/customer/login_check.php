<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header('location: ../../index.php');
	} elseif($_GET['pesan'] == "logout"){
			echo "<script type='text/javascript'>
	        alert('Anda berhasil logout!');
	        history.back(self);
	        </script>";
		}
?>