<?php include 'controller/config.php'; ?>
<?php include 'controller/login_check.php';?>
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
<body>
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
	          	<a class="nav-link" href="#">Transaksi</a>
	          </li>
	        </ul>
	        <form class="form-inline my-2 my-lg-0">
	        	<p class="text-muted my-auto mr-2">Hai, <?= $_SESSION['username']; ?></p>
	        	<a href="controller/logout.php" class="btn btn-danger text-capitalize">logout</a>
	        </form>
	      </div>
	    </div>
    </nav>
    <!-- Navbar End -->
</body>
</html>