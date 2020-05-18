<?php require_once("cart.php"); ?>
<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div id="container">

		<div id="header">

		</div>

		<div id="menu">
			<a class="selected" href="template.php">Home</a>
			<a href="testimonial.php">Testimonial</a>
		</div>

		<div id="sidebar">
	
		</div>

		<div id="content">
			<div class="title">&raquo; Proses Belanja Selesai</div>
			
			<?php
			if($_POST['finish']){
				session_destroy();
				echo 'Terima kasih telah  berbelanja di LolShop kami. Dan berikut ini adalah data yang perlu Anda catat.';
                echo '<p>Total biaya untuk pembelian Produk adalah Rp.'.$_POST['total'].'</p>';
				echo '<p>Dan barang akan kami kirim ke alamat di bawah ini:</p>';
				echo '<p>Nama Lengkap : '.$_POST['nama'].'<br>';
				echo 'Alamat Lengkap : '.$_POST['alamat'].'</p>';

			}else{
				header("Location: template.php");
			}
			?>

		</div>

		<div class="clear"></div>


	</div>

</body>
</html>