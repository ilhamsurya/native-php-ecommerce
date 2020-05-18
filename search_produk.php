<?php
error_reporting(0);
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "dbakademik";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM produk";
if( isset($_GET['search']) ){
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM produk WHERE nama LIKE '%$name%'";
}
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
<label>Search</label>
<form action="search.php" method="GET">
<input type="text" placeholder="Type the name here" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
<br>


<h2>Daftar Produk Hasil Search</h2>
<table class="table table-striped table-responsive">
<tr>
<th>Idbarang</th>
<th>Nama</th>
<th>Harga</th>
<th>Gambar</th>
<th>Jumlah</th>
</tr>
<?php
while($row = $result->fetch_assoc()){
    ?>
       <tr>
          <td><?php echo $row['idbarang']; ?></td>
          <td><?php echo $row['nama']; ?></td>
          <td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td>
          <td style="text-align: center;"><img src="image/<?php echo $row['foto']; ?>" style="width: 120px;"></td>
          <td><?php echo $row['quantity']; ?></td>
      </tr>
    <?php
}
?>

</table>
</div>
</body>
<br><br><br>
<p><a href="template.php">Kembali ke menu utama</a></p>
</html>