<?php require_once("cart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mini Toko Online by TUTORIALWEB.NET</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div id="container">

		<div id="header">
			<h1>Mini Toko Online</h1>
			<span>Create and Design by TUTORIALWEB.NET</span>
		</div>

		<div id="menu">
			<a href="index.php">Home</a>
			<a class="selected" href="testimonial.php">Testimonial</a>
		</div>

		<div id="sidebar">
			<div class="title">&raquo; Keranjang Belanja</div>
			<div class="body">
				<?php cart(); ?>
			</div>

			<div class="title">&raquo; Tentang</div>
			<div class="body">
				Mini Toko Online di buat dengan PHP berdatabase MySQL.<br>
				Keranjang di buat dengan menggunakan SESSION bukan Table Database untuk lebih mudah dan efisien.<br>
				Mini Toko Online Design and Create by TUTORIALWEB.NET.
			</div>
		</div>

		<div id="content">
			<div class="title">&raquo; Testimonial</div>
			Tulis Testimonial Anda di bawah ini:
			<form action="" method="post">
				<p><input type="text" name="nama" placeholder="Nama Lengkap" required></p>
				<p><input type="text" name="mail" placeholder="Email Valid" required></p>
				<p><textarea name="pesan" rows="5" cols="40" placeholder="Testimonial Anda" required></textarea></p>
				<p><input type="submit" name="submit" value="Proses"></p>
			</form>
		</div>

		<div class="clear"></div>

		<div id="footer">
			Copyright &copy; 2013 TUTORIALWEB.NET<br>Thanks to phpacademy.org
		</div>

	</div>

</body>
</html>