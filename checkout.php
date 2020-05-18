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
		
		</div>

		<div id="sidebar">
			<div class="title">&raquo; Keranjang Belanja</div>
			<div class="body">
				<?php cart(); ?>
			</div>

	
		</div>

		<div id="content">
		
			
			Harap isi data pengiriman barang / produk di bawah ini:
			<br>
			<form action="finish.php" method="post">
				<input type="hidden" name="total" value="<?php echo abs((int)$_GET['total']); ?>">
				
				<p><input type="text" name="nama" size="30" placeholder="Nama Lengkap" required></p>
				<p><textarea name="alamat" rows="3" cols="40" placeholder="Alamat Lengkap" required></textarea></p>
				<p><input type="submit" name="finish" value="Finish"></p>
			</form>
		</div>

		<div class="clear"></div>

	

	</div>

</body>
</html>