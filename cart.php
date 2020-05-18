<?php
require_once("koneksi2.php");

if (isset($_GET['add'])) {
	$id = mysqli_real_escape_string(mysqli_connect(SERVER, USER, PASSWORD, DATABASE), (int) $_GET['add']);
	$qt = mysqli_query(mysqli_connect(SERVER, USER, PASSWORD, DATABASE), "SELECT idbarang, quantity FROM produk WHERE idbarang='$id'");
	while ($qt_row =  mysqli_fetch_assoc($qt)) {
		if ($qt_row['quantity'] != $_SESSION['cart_' . $_GET['add']] && $qt_row['quantity'] > 0) {
			$_SESSION['cart_' . $_GET['add']] += '1';
			header("Location: tampil_barang.php");
		} else {
			echo '<script language="javascript">alert("Stok produk tidak mencukupi!"); document.location="tampil_barang.php";</script>';
		}
	}
}

function cart()
{
	foreach ($_SESSION as $name => $value) {
		if ($value > 0) {
			if (substr($name, 0, 5) == 'cart_') {
				$id = substr($name, 5, (strlen($name) - 5));
				$get = mysqli_query(mysqli_connect(SERVER, USER, PASSWORD, DATABASE), "SELECT * FROM produk WHERE idbarang='$id'");
				while ($get_row = mysqli_fetch_assoc($get)) {
					$sub = $get_row['harga'] * $value;
					echo '<div style="font-size:11px; margin-bottom:-10px" color:white>&raquo; ' . $get_row['nama'] . ' => Rp. ' . $get_row['harga'] . ' X ' . $value . ' = Rp. ' . $sub . '</div><br>';

					echo '	<a href="tampil_barang.php?remove=' . $get_row['produk_id'] . '">[-]</a> 
					<a href="tampil_barang.php?add=' . $get_row['produk_id'] . '">[+]</a> 
					<a href="tampil_barang.php?delete=' . $get_row['produk_id'] . '" onclick="return confirm(\'Anda Yakin?\');">[x]</a><br>';
					echo '<br>';
				}
			}
			$total += $sub;
		}
	}
	if ($total == 0) {
		echo 'Keranjang Belanja Kosong!';
	} else {
		echo '<br>';
		echo '<div style="text-align:right; font-size:11px;"><a href="detail.php">&raquo; Detail &laquo;</a></div>';
	}
}

if (isset($_GET['remove'])) {
	$_SESSION['cart_' . $_GET['remove']]--;
	header("Location: detail.php");
}

//PROSES HAPUS SEMUA ITEM PRODUK//
if (isset($_GET['delete'])) {
	$_SESSION['cart_' . $_GET['delete']] = '0';
	header("Location: detail.php");
}

?>
<div class=""></div>