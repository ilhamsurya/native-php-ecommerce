<?php
  include('koneksi2.php'); 
  
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
<label>Filter</label>

<div class="form-price-range-filter">
      <form method="post" action="filter_produk.php">      
        <div class="row mb-3">

          <div class="col-sm-4">
             <input type="text" id="min" name="min_price"
                  value="<?php echo $min; ?>">
              <div id="slider-range"></div>
              <input type="text" id="max" name="max_price"
                  value="<?php echo $max; ?>">
              <button type="submit" name="submit_range" class="btn-submit"
                  value="Filter Product" class="btn-submit" > Filter </button>

          </div>
        </div>
      </form>
</div>

<?php



$result = mysqli_query($koneksi, "select * from produk where harga BETWEEN '$min' AND '$max'");

$count = mysqli_num_rows($result);
if ($count > 0) {
    ?>
<hr>
    <div class="container">
        <table class="tutorial-table" cellspacing="1px" width="100%">
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Gambar</th>
          <th>Jumlah</th>
          <th>Action</th>
        </tr>
     <?php
    while ($row = mysqli_fetch_array($result)) {
        ?>
    
    <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama']; ?></td>
          <td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td>
          <td style="text-align: center;"><img src="image/<?php echo $row['foto']; ?>" style="width: 120px;"></td>
          <td><?php echo $row['quantity']; ?></td>
          <td>
              <a href="edit_barang.php?idbarang=<?php echo $row['idbarang']; ?>">Edit</a> |
              <a href="proses_hapus.php?idbarang=<?php echo $row['idbarang']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a> |
              <a href="tampil_barang.php?add=<?php echo $row['idbarang']; ?> ">Beli</a>
              
  
          </td>
      </tr>
<?php
    } // end while
} else {
    ?>
<div class="no-result">No Results</div>

<?php
}

mysqli_free_result($result);

mysqli_close($koneksi);
echo $output;

?>
</table>
    </div>
</body>
<a href="tampil_barang.php"><button>&laquo; Kembali</button></a>
</html>