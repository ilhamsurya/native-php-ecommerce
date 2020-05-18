<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "dbakademik";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM mahasiswa";
if( isset($_GET['search']) ){
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM mahasiswa WHERE Nama LIKE '%$name%'";
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
<button class="btn btn-sm btn-primary" >Tambah</button>


<h2>Daftar Mahasiswa Hasil Search</h2>
<table class="table table-striped table-responsive">
<tr>
<th>NIM</th>
<th>Nama</th>
<th>Umur</th>
<th>Email</th>
<th>Hp</th>
<th>Gender</th>
</tr>
<?php
while($row = $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['Nim']; ?></td>
    <td><?php echo $row['Nama']; ?></td>
    <td><?php echo $row['Umur']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['hp']; ?></td>
    <td><?php echo $row['gender']; ?></td>
    
    

    </tr>
    <?php
}
?>
</table>
</div>
</body>
<p><a href="template.php">Kembali ke menu utama</a></p>
</html>