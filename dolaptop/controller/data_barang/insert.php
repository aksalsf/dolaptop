 <?php
    include '../config.php';
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $spesifikasi = $_POST['spesifikasi'];
    $jumlah = $_POST['jumlah'];

    $query = "INSERT INTO barang  SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', spesifikasi = '$spesifikasi', jumlah = '$jumlah'";

    mysqli_query($conn, $query);
    header('location: ../../data_barang/index.php');
?>