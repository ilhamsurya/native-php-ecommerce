<?php

session_start();
ob_start();
  // konfigurasi server
  define('SERVER','localhost');
  define('USER','root');
  define('PASSWORD','');
  define('DATABASE','tokoonline');

// koneksi ke server
$koneksi = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);

// cek apakah koneksi berhasil
if (mysqli_connect_errno()){
 echo "gagal konek" . mysqli_connect_error();
}
?>