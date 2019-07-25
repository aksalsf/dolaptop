<?php include '../controller/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Data Barang DoLaptop	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
 

</head>
<body>
	<!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm fixed-top">
	    <div class="container">
	    <!-- Brand -->
	      <a class="navbar-brand" href="../index.php">Dolaptop</a>
	    <!-- Toggler -->
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>
	    <!-- Content Nav -->
	      <div class="collapse navbar-collapse" id="navbar">
	        <ul class="navbar-nav mr-auto">
	          <li class="nav-item">
	            <a class="nav-link" href="../index.php">Beranda</a>
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
	<div class="container" style="margin-top: 100px;">
		<h1 class="text-center">Daftar Produk</h1>
		<hr>
		<a href="add.php" class="btn btn-primary mb-2 text-right">Tambah</a>
		<!-- Tabel -->
		<table class="table table-bordered table-striped table-hover text-center">
			<thead class="thead-dark text-uppercase">
				<tr>
					<th>no</th>
					<th>kode barang</th>
					<th>nama barang</th>
					<th>spesifikasi</th>
					<th>jumlah</th>
					<th>opsi</th>
				</tr>
			</thead>
			<tbody class="text-capitalize">
			<!-- PHP -->
			<?php 
				$query = "SELECT * FROM barang";
				$result = mysqli_query($conn, $query);
				$no = 1;
				foreach ($result as $value) { ?>
			<!-- PHP End-->

				<!-- Loop Konten -->
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $value['kode_barang'] ?></td>
					<td><?= $value['nama_barang'] ?></td>
					<td><?= $value['spesifikasi'] ?></td>
					<td><?= $value['jumlah'] ?></td>
					<td>
						<a href="edit.php?kode_barang=<?= $value['kode_barang'] ?>" class="btn btn-warning">Edit</a>
						<a href="../controller/data_barang/delete.php?kode_barang=<?= $value['kode_barang'] ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<!-- Loop Konten End -->
			<!-- PHP -->
			<?php } ?>
			<!-- PHP End -->
			</tbody>
		</table>
		<!-- Tabel End -->
	</div>
	<!-- Konten End -->
</body>
</html>