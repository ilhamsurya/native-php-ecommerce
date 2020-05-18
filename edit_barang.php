<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi2.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['idbarang'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["idbarang"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM produk WHERE idbarang='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='views/index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='views/index.php';</script>";
  }      
  $filename='image/' . $data['foto'];
  unlink($filename);  
  ?>
<!DOCTYPE html>
<html>
  <head>
  
    <link href="assets/css/style.css" rel="stylesheet"> 
  </head>
  <body>
      <center>
        <h1>Edit Produk <?php echo $data['nama']; ?></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['idbarang']; ?>"  hidden />
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" value="<?php echo $data['nama']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Harga Beli</label>
         <input type="text" name="harga_beli" required=""value="<?php echo $data['harga']; ?>" />
        </div>
        <div>
          <label>Gambar Produk</label>
          <img src="image/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar_produk" />
        
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>