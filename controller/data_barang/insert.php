 <?php
    include '../config.php';
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $spesifikasi = $_POST['spesifikasi'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    $query = "INSERT INTO barang  SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', spesifikasi = '$spesifikasi', jumlah = '$jumlah', harga = '$harga'";

    mysqli_query($conn, $query);
    header('location: ../../view/stok/index.php');
?>