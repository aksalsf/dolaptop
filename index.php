<?php include 'controller/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dol Laptop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- cek pesan notifikasi -->
    <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "<script type='text/javascript'>
	        alert('username atau password salah');
	        history.back(self);
	        </script>";
		}else if($_GET['pesan'] == "logout"){
			echo "<script type='text/javascript'>
	        alert('Anda berhasil');
	        history.back(self);
	        </script>";
		}else if($_GET['pesan'] == "belum_login"){
			echo "<script type='text/javascript'>
	        alert('Anda belum login!');
	        history.back(self);
	        </script>";
		}
	}
	?>
	<!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm fixed-top">
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
	          	<a class="nav-link" href="#">Stok Barang</a>
	          </li>
	          <li class="nav-item">
	          	<a class="nav-link" href="#">Order</a>
	          </li>
	        </ul>
	        <!-- Menampilkan button login, register atau logout -->
	        <?php
	        	session_start();
	        	if (empty($_SESSION)) { 
	        ?>
	        <!-- Button sebelum login -->
	        <form class="form-inline my-2 my-lg-0">
       			<button type="button" class="btn btn-success text-capitalize" data-toggle="modal" data-target="#modal">login</button>
       			<a href="view/register.php" class="btn btn-primary text-capitalize ml-1">daftar</a>
	        </form>
	        <!-- Button setelah login -->
	    	<?php } else { ?>
	    	<a href="view/customer/profil.php" class="btn btn-outline-primary"><?= $_SESSION['username']; ?></a>
	    	<a href="controller/customer/logout.php" class="btn btn-danger text-capitalize ml-2">logout</a>
	    	<?php } ?>
	    	<!-- Button End -->
	      </div>
	    </div>
    </nav>
    <!-- Navbar End -->
	<!-- Entri Data -->
	<div class="container" style="margin-top: 100px;">
		<div class="row">
			<!-- Looping Start -->
			<?php 
				$query = mysqli_query($conn, "SELECT nama_barang, harga FROM barang");
				foreach ($query as $value) {
			 ?>
			<div class="col-md-4">
				<div class="card shadow-sm">
					<img src="assets/img/laptop.png" class="card-img img-fluid">
					<div class="card-body">
						<h5 class="card-title text-uppercase"><?= $value['nama_barang'];  ?></h5>
						<p class="text-warning text-capitalize">
							rp. <?= number_format($value['harga'], 2, ",", ".") ?>
						</p>
					</div>
					<div class="card-footer">
						<form action="controller/beli.php" method="POST" class="form-inline">
							<input type="number" name="jumlah" class="form-control" placeholder="1">
							<button type="submit" class="btn btn-success text-capitalize ml-auto">beli</button>
						</form>
					</div>
				</div>
			</div>
			<?php } ?>
			<!-- Looping End -->
		</div>
	</div>
	<!-- Entri Data End -->
    <!-- Modal -->
	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="controller/customer/login.php" method="POST">
					<div class="form-group">
						<label for="email" class="font-weight-bold text-capitalize">email</label>
						<input type="email" class="form-control" name="email" autocomplete="off" autofocus="on">
					</div>
					<div class="form-group">
						<label for="password" class="font-weight-bold">Password</label>
						<input type="password" class="form-control" name="password">
					</div>
					<small class="text-muted">
						Anda belum punya akun? <a href="view/register.php">Daftar sekarang!</a>
					</small>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal End -->
</body>
</html>