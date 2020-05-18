
<?php
session_start();

session_destroy();
echo "<script>alert('logout berhasil')</script>";
echo "<script>location='index.php';</script>";

?>