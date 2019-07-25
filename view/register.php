<?php include '../controller/config.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dol Laptop</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="../assets/js/jquery-3.3.1.slim.min.js"></script>
		<script src="../assets/js/popper.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
	</head>
	<body class="bg-primary">
		<!-- Form -->
		<div class="card mx-auto col-md-5 m-5 p-5 shadow-sm">
			<h1 class="text-primary text-capitalize text-center">daftar</h1>
			<hr>
			<!-- Form Start -->
			<form action="../controller/customer/register.php" method="POST">
				<div class="form-group">
					<label for="nama" class="font-weight-bold text-capitalize">nama</label>
					<input type="text" name="nama" class="form-control" autocomplete="off" autofocus="on" required placeholder="John Doe">
				</div>
				<div class="form-group">
					<label for="alamat" class="font-weight-bold text-capitalize">alamat</label>
					<textarea type="text" name="alamat" class="form-control" autocomplete="off" autofocus="on" required placeholder="West Street 2nd, West City."></textarea>
				</div>
				<div class="form-group">
					<label for="telepon" class="font-weight-bold text-capitalize">telepon</label>
					<input type="number" name="telepon" class="form-control" autocomplete="off" autofocus="on" required placeholder="6285647216632">
				</div>
				<div class="form-group">
					<label for="email" class="font-weight-bold text-capitalize">email</label>
					<input type="email" name="email" class="form-control" autocomplete="off" autofocus="on" required placeholder="cs@dolaptop.co.id">
				</div>
				<div class="form-group">
					<label for="password" class="font-weight-bold text-capitalize">password</label>
					<input type="password" name="password" class="form-control" autocomplete="off" autofocus="on" required>
				</div>
				<div class="form-group">
					<small>Dengan ini Anda menyetujui seluruh ketentuan dan kebijakan data kami.</small>
				</div>
				<button type="submit" class="btn btn-primary text-capitalize">daftar</button>
			</form>
		</div>
		<!-- Form End -->
	</body>
</html>