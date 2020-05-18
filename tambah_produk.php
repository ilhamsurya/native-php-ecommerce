<?php
  include('koneksi2.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
  <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
      <center>
        <h1>FORM UPLOAD BARANG</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" autofocus="" required="" />
        </div>
        <div>
          <label>Harga</label>
         <input type="text" name="harga_beli" required="" />
        </div>
        <div>
          <label>Berat</label>
         <input type="number" name="berat" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" name="deskripsi" required="" />
        </div>
        <div>
          <label>Gambar Produk</label>
         <input type="file" name="gambar_produk" required="" />
        </div>
        <div>
         <button type="submit">Simpan Produk</button>
        </div>
        </section>
      </form>
  </body>
</html>