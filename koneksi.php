<?php
  // konfigurasi server
    define('SERVER','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','dbakademik');

  // koneksi ke server
  $conn = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);

  // cek apakah koneksi berhasil
  if (mysqli_connect_errno()){
   echo "gagal konek" . mysqli_connect_error();
  }
?>