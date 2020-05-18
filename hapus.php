<?php

  require('koneksi.php');

  if (isset($_GET['Nim'])) {

    $nim     = $_GET['Nim'];
    // query SQL menghapus data berdasarkan id yg dipilih
    $sql    = "DELETE from mahasiswa WHERE Nim='".$nim."'";
    // hapus data pada database
    $query  = mysqli_query($conn,$sql);

    if(mysqli_affected_rows($conn)) {
 
      header('Location:template.php');
   } else {

    header('Location:template.php');
    }
  }
 ?>