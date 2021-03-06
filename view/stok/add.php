<?php include '../../controller/config.php'; ?>
<?php 
	
	session_start();
	if ($_SESSION['status'] != "admin") {
		session_destroy();
	}
?>
<!DOCTYPE html>
<html>
    <head>
		<title>Tambah Data Barang DoLaptop</title>
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
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm "> <!--fixed-top-->
			<div class="container">
				<!-- Brand -->
				<a class="navbar-brand" href="#">Dolaptop</a>
				<!-- Toggler -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Content Nav -->
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Beranda</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php">Stok Barang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Transaksi</a>
					</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Navbar End -->
		<!-- div Form -->
		<div class="container" style="padding-top: 30px";>
			<!-- start form -->
			<form action="../../controller/data_barang/insert.php" method="POST";>
				<div class="form_group col-md-6 mx-auto border p-5 rounded text-capitalize";>
					<h1 class="text-center">Tambah Stok Barang</h1>
					<hr>
					<label class="font-weight-bold">kode barang</label>
					<input type="text" name="kode_barang" class="form-control" required>
					<br>
					<label class="font-weight-bold">nama barang</label>
					<input type="text" name="nama_barang" class="form-control" required>
					<br>
					<label class="font-weight-bold">spesifikasi</label>
					<input type="text" name="spesifikasi" class="form-control" required>
					<br>
					<label class="font-weight-bold">jumlah</label>
					<input type="number" name="jumlah" class="form-control" required>
					<br>
					<label class="font-weight-bold">harga</label>
					<input type="number" name="harga" class="form-control" required>
					<br>
					<button type="submit" class="btn btn-success mt-2 text-capitalize">tambah</button>
				</div>
			</form>
			<!-- end form -->
		</div>
		<!-- End Div Form -->
	</body>
</html>