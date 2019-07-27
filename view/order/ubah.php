<?php include '../../controller/config.php'; ?>
<?php include '../../controller/login_check.php'; ?>
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
		        alert('Anda berhasil logout');
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
		            <a class="nav-link" href="../../index.php">Beranda</a>
		          </li>
		          <li class="nav-item">
		          	<a class="nav-link text-capitalize" href="index.php">pesanan saya</a>
		          </li>
		        </ul>
		        <!-- Menampilkan button login, register atau logout -->
		        <?php
		        	if (empty($_SESSION)) {
		        ?>
		        <!-- Button sebelum login -->
		        <form class="form-inline my-2 my-lg-0">
	       			<button type="button" class="btn btn-success text-capitalize" data-toggle="modal" data-target="#modal">login</button>
	       			<a href="view/register.php" class="btn btn-primary text-capitalize ml-1">daftar</a>
		        </form>
		        <!-- Button setelah login -->
		    	<?php } else { 
		        	if ($_SESSION['status'] != "login") {
		        	 	session_destroy();
		        	}
		        ?>
		    	<a href="" class="btn btn-outline-primary text-capitalize"><?= $_SESSION['nama']; ?></a>
		    	<a href="../../controller/customer/logout.php" class="btn btn-danger text-capitalize ml-2">logout</a>
		    	<?php } ?>
		    	<!-- Button End -->
		      </div>
		    </div>
	    </nav>
	    <!-- Navbar End -->

		<!-- Entri Data -->
		<div class="container" style="margin-top: 100px;">
			<div class="row">
				<!-- Looping Data Sekarang Start -->
				<?php 
					$username = $_SESSION['username'];
					$id_transaksi = $_GET['id_transaksi'];
					$query = mysqli_query($conn, "SELECT barang.kode_barang, barang.nama_barang, transaksi.jumlah, barang.harga FROM transaksi INNER JOIN barang ON transaksi.kode_barang = barang.kode_barang WHERE username = '$username'");
					foreach ($query as $value) {
				 ?>
				<div class="col-6" style="border-right: 1px solid #eee;">
					<div class="card shadow-sm">
						<div class="card-header text-capitalize">pesanan saya</div>
						<img src="../../assets/img/laptop.png" class="card-img img-fluid">
						<div class="card-body">
							<h5 class="card-title text-uppercase"><?= $value['nama_barang'];  ?></h5>
							<p class="text-warning text-capitalize">
								<?= 'rp.&nbsp' . number_format($value['harga'], 2, ",", ".") ?>
								<small>(harga satuan)</small>
							</p>
						</div>
						<div class="card-footer">
							<form action="../../controller/order/ubah.php" method="POST" class="form-inline">
								<input type="hidden" name="id_transaksi" value="<?= $id_transaksi; ?>">
								<input type="hidden" name="kode_barang" value="<?= $value['kode_barang']; ?>">
								<input type="number" name="jumlah" class="form-control" value="<?= $value['jumlah']; ?>">
								<button type="submit" class="btn btn-success text-capitalize ml-auto">Ubah</button>
							</form>
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- Looping Data Sekarang End -->

				<!-- Entri Data Baru -->
				<div class="col-6 container">
					<h2 class="text-primary">Mau pilih yang lain?</h2>
					<hr>
					<div class="row">
						<!-- Looping Start -->
						<?php 
							$query = mysqli_query($conn, "SELECT kode_barang, nama_barang, harga FROM barang");
							foreach ($query as $value) {
						 ?>
						<div class="col-md-6 mb-3">
							<div class="card shadow-sm">
								<img src="../../assets/img/laptop.png" class="card-img img-fluid">
								<div class="card-body">
									<h5 class="card-title text-uppercase"><?= $value['nama_barang'];  ?></h5>
									<p class="text-warning text-capitalize">
										rp. <?= number_format($value['harga'], 2, ",", ".") ?>
									</p>
								</div>
								<div class="card-footer">
									<form action="../../controller/order/ubah.php" method="POST">
										<input type="hidden" name="id_transaksi" value="<?= $id_transaksi; ?>">
										<input type="hidden" name="kode_barang" value="<?= $value['kode_barang']; ?>">
										<input type="number" name="jumlah" class="form-control" value="1">
										<button type="submit" class="btn btn-success text-capitalize float-right mt-3">beli ini</button>
									</form>
								</div>
							</div>
						</div>
						<?php } ?>
						<!-- Looping End -->
					</div>
				</div>
				<!-- Entri Data Baru End -->
			</div>
		</div>
		<!-- Entri Data End -->






</body>
</html>