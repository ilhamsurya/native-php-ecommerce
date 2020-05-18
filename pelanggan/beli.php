<?php
include('koneksi2.php');
$id_barang = $_GET['id'];

if (isset($_SESSION['keranjang'][$id_barang])) {
    $_SESSION['keranjang'][$id_barang] += 1;
} else {
    $_SESSION['keranjang'][$id_barang] = 1;
}

echo "<script>alert['produk masuk ke keranjang']</script>";
echo "<script>location='keranjang.php';</script>";
?>

<div class=""></div>