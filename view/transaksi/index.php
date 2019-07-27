<?php include '../../controller/config.php'; ?>
<?php include '../../controller/data_barang/login_check.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Transaksi | Dolaptop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../../assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="../../assets/js/popper.min.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>
 

</head>
<body class="bg-dark">
	<!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light shadow-sm fixed-top">
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
	            <a class="nav-link text-white" href="../../admin/index.php">Beranda</a>
	          </li>
	          <li class="nav-item">
	          	<a class="nav-link text-white" href="../stok/index.php">Stok Barang</a>
	          </li>
	          <li class="nav-item">
	          	<a class="nav-link text-white" href="index.php">Transaksi</a>
	          </li>
	        </ul>
	      </div>
	    </div>
    </nav>
    <!-- Navbar End -->
	<div class="container" style="margin-top: 100px;">
		<h1 class="text-center text-primary">Transaksi</h1>
		<hr>
		<table class="table table-dark table-striped table-hover text-center">
			<thead>
				<tr>
					<th class="text-uppercase">nama pembeli</th>
					<th class="text-uppercase">barang</th>
					<th class="text-uppercase">spesifikasi</th>
					<th class="text-uppercase">jumlah</th>
					<th class="text-uppercase">total</th>
					<th class="text-uppercase">alamat</th>
					<th class="text-uppercase">telepon</th>
					<th class="text-uppercase">status</th>
					<th class="text-uppercase">aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				// Loop PHP Start
				$query = mysqli_query($conn, "SELECT id_transaksi, nama_customer, nama_barang, spesifikasi, transaksi.jumlah, harga, address, phone, status FROM transaksi
					INNER JOIN barang ON transaksi.kode_barang = barang.kode_barang INNER JOIN customer ON transaksi.username = customer.username");
				foreach ($query as $value) { ?>
				<tr>
					<td class="text-capitalize"><?= $value['nama_customer']; ?></td>
					<td class="text-uppercase"><?= $value['nama_barang']; ?></td>
					<td class="text-uppercase"><?= $value['spesifikasi']; ?></td>
					<td><?= $value['jumlah']; ?></td>
					<td class="text-capitalize"><?= "rp.&nbsp " . number_format($value['harga'] * $value['jumlah'], 0, ",", "."); ?></td>
					<td class="text-capitalize"><?= $value['address']; ?></td>
					<td><?= "+" . $value['phone']; ?></td>
					<td class="text-capitalize"><?= $value['status']; ?></td>
					<td>
						<a href="../../controller/order/status.php?id_transaksi=<?= $value['id_transaksi']; ?>" class="btn btn-outline-success text-capitalize">kirim</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
</body>
</html>