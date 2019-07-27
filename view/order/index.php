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
		          	<a class="nav-link text-capitalize" href="view/order/index.php">pesanan saya</a>
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

	    <div class="container mt-5">
	    	<!-- Order -->
	    	<h1 class="text-primary text-capitalize text-center">pesanan saya</h1>
	    	<hr>
	    	<table class="table">
	    		<thead class="thead-dark">
	    			<tr>
	    				<th class="text-uppercase text-center">nama barang</th>
	    				<th class="text-uppercase text-center">spesifikasi</th>
	    				<th class="text-uppercase text-center">jumlah</th>
	    				<th class="text-uppercase text-center">total harga</th>
	    				<th class="text-uppercase text-center">status</th>
	    				<th class="text-uppercase text-center">opsi</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<!-- Loop -->
	    			<?php
	    				$username = $_SESSION['username'];
	    				$query = mysqli_query($conn, "SELECT id_transaksi, nama_barang, spesifikasi, transaksi.jumlah, harga, status FROM transaksi INNER JOIN barang ON transaksi.kode_barang = barang.kode_barang WHERE username = '$username'");
	    				foreach ($query as $value) {
	    			?>
	    			<tr>
	    				<td class="text-center text-uppercase"><?= $value['nama_barang']; ?></td>
	    				<td class="text-center text-capitalize"><?= $value['spesifikasi']; ?></td>
	    				<td class="text-center text-capitalize"><?= $value['jumlah']; ?></td>
	    				<td class="text-center text-capitalize">
	    					<?= 'rp.&nbsp' . number_format($value['harga'] * $value['jumlah'], 0, ",", "."); ?>
	    				</td>
	    				<td class="text-center text-capitalize"><?= $value['status']; ?></td>
	    				<td class="text-center text-capitalize">
	    					<a href="../../controller/order/terima.php?id_transaksi=<?= $value['id_transaksi']; ?>" class="btn btn-success">terima</a>
	    					<a href="ubah.php?id_transaksi=<?= $value['id_transaksi']; ?>" class="btn btn-warning">ubah</a>
	    					<a href="../../controller/order/batal.php?id_transaksi=<?= $value['id_transaksi']; ?>" class="btn btn-danger">batalkan</a>
	    				</td>
	    			</tr>
	    			<?php } ?>
	    			<!-- Loop End -->
	    		</tbody>
	    	</table>
	    	<!-- Order End -->
		    <!-- Info -->
		    <hr>
		    <marquee>
		    	<p class="">Perhatian: Bila Anda sudah menerima pesanan, harap klik tombol terima. Terima kasih.</p>
		    </marquee>
		    <!-- Info End -->
	    </div>


























	</body>
</html>