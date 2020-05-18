<?php
  include('koneksi2.php'); 
  require_once('cart.php');//agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  $min = 0;
  $max = 100000;

if (! empty($_POST['min_price'])) {
    $min = $_POST['min_price'];
}

if (! empty($_POST['max_price'])) {
    $max = $_POST['max_price'];
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link href="assets/css/style.css" rel="stylesheet"> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet"
    href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script type="text/javascript">
      
      $(function() {
        $( "#slider-range" ).slider({
          range: true,
          min: 0,
          max: 1000000,
          values: [ <?php echo $min; ?>, <?php echo $max; ?> ],
          slide: function( event, ui ) {
            $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        $( "#min" ).val(ui.values[ 0 ]);
        $( "#max" ).val(ui.values[ 1 ]);
          }
          });
        $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#slider-range" ).slider( "values", 1 ) );
      });
      </script>
  </head>
  <body>


  <div class="form-price-range-filter">
    <label>Filter & Search</label>
        <form method="post" action="filter_produk.php">      
        

      
               <input type="text" id="min" name="min_price"
                    value="<?php echo $min; ?>">
                <div id="slider-range"></div>
                <input type="text" id="max" name="max_price"
                    value="<?php echo $max; ?>">
                <button type="submit" name="submit_range" class="btn-submit"
                    value="Filter Product" class="btn-submit" > Filter </button>
  
     
        
        </form>
    
        <form method="GET" action="search_produk.php">
       
            <input type="text" placeholder="Type the name here" name="search" style="width: 200px; padding-left:300px;">&nbsp;
		   
		        <button type="submit" value="Search" name="btn" class="btn btn-sm btn-warning">Cari</button>
		    
		</div>
	</form>
  </div>
  
  

  <br>
    <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a><center>
    <br/>
    <table>
      <thead>
        <tr style="background-color: #f5f5f5;">
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Gambar</th>
          <th>Jumlah</th><input type="hidden" name="update">
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM produk ORDER BY idbarang ASC";
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
          <td style="text-align: center;"><img src="image/<?php echo $row['foto']; ?>" style="width: 120px;"></td>
         
          <td>
              <a href="edit_barang.php?idbarang=<?php echo $row['idbarang']; ?>">Edit</a> |
              <a href="proses_hapus.php?idbarang=<?php echo $row['idbarang']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a> |
              <a href="tampil_barang.php?add=<?php echo $row['idbarang']; ?> ">Beli</a>
              
  
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