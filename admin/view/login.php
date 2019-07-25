<?php include '../controller/config.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dol Laptop</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="../../assets/js/jquery-3.3.1.slim.min.js"></script>
		<script src="../../assets/js/popper.min.js"></script>
		<script src="../../assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="mx-auto mt-5 col-md-5 p-5 border rounded shadow-sm">
			<h1 class="text-center text-uppercase text-primary">login admin</h1>
			<hr>
			<form action="../controller/login.php" method="POST">
				<div class="form-group row">
					<label for="username" class="col-md-3 font-weight-bold text-capitalize">email</label>
					<input type="text" name="username" class="form-control col-md-9" autocomplete="off" autofocus="on" required>
				</div>
				<div class="form-group row">
					<label for="password" class="col-md-3 font-weight-bold text-capitalize">password</label>
					<input type="password" name="password" class="form-control col-md-9" autocomplete="off" autofocus="on" required>
				</div>
				<small class="text-danger">
				    <!-- Menampilkan notifikasi login -->
				    <?php 
					if(isset($_GET['pesan'])){
						if($_GET['pesan'] == "gagal"){
							echo "Login gagal! username dan password salah!";
						}else if($_GET['pesan'] == "logout"){
							echo "Anda telah berhasil logout";
						}else if($_GET['pesan'] == "belum_login"){
							echo "Anda harus login untuk mengakses halaman admin";
						}
					}
					?>
				</small>
				<div class="form-group mb-5">
					<button type="submit" class="btn btn-primary text-capitalize float-right">login</button>
				</div>
			</form>
		</div>
	</body>
</html>