<?php

include("koneksi2.php");
$id_barang = $_GET["id"];
unset($_SESSION["keranjang"][$id_barang]);

echo "<script>alert('produk berhasil dihapus');</script>";
echo "<script>location='keranjang.php';</script>";
?>
<div class=""></div>