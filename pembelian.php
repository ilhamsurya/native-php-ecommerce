<?php
include('koneksi2.php');
require_once('cart.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>

<!DOCTYPE html>
<html>

<head>
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>


  <br>

  <table>
    <thead>
      <tr style="background-color: #f5f5f5;">
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
          " - " . mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while ($row = mysqli_fetch_assoc($result)) {
      ?>

        <tr style="background-color: #f5f5f5;">
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_pelanggan']; ?></td>
          <td><?php echo $row['tanggal_pembelian']; ?></td>
          <td>Rp <?php echo number_format($row['total_pembelian'], 0, ',', '.'); ?></td>


          <td>
            <a href="template.php?content=<?php echo 'detail_pembelian.php' ?>&id=<?php echo $row['id_pembelian']; ?>">Detail</a> |
            <a href="proses_hapus.php?idbarang=<?php echo $row['idbarang']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a> |


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