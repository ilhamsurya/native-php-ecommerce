<?php
include('koneksi2.php'); 
$query = "SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian</title>
    <link href="assets/css/style.css" rel="stylesheet"> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <strong><?php echo $row['nama_pelanggan']?></strong>
    <p>
    <?php echo $row['hp_pelanggan']?> <br>
    <?php echo $row['email_pelanggan']?>
    </p>
    <p>
    <?php echo $row['tanggal_pembelian']?> <br>
    <?php echo $row['total_pembelian']?>
    </p>
    <table>
      <thead>
        <tr style="background-color: #f5f5f5;">
          <th>No</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
     
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.idbarang WHERE pembelian_produk.id_pembelian = '$_GET[id]'";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }
      
      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
    
       <tr style="background-color: #f5f5f5;">
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama']; ?></td>
          <td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td>
          <td><?php echo $row['jumlah']; ?></td>
          <td>
          Rp <?php echo number_format($row['harga']*$row['jumlah'],0,',','.');?>
          </td>
         
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>

    
    </tbody>
    </table>
</body>
</html>