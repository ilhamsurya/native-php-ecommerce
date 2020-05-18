<?php
    if(!isset ($_GET['content'])){
        $vcontent = 'views/home.php';
    }else{
        $vcontent = $_GET['content'];
    }


?>
<!DOCTYPE html>
<html lang="id" dir="ltr">

<head >

    <title>Template</title>
         <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--BOOTSTRAP CDN-->


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
    
    <table width="800" border="1" align="center" class="table table-striped table-responsive" background-color="red">
        <tr height="100" >
            <td colspan="3"><div align="center"> <img src="assets/logo2.png" alt="logo" align="left"/></div></div></td>
        </tr>
        <tr height="50">
            <td>
                <a href="template.php?content=<?php echo 'views/home.php'?>">HOME</a>
                <a href="template.php?content=<?php echo 'tampil_barang.php'?>">KATEGORI</a>
                <a href="template.php?content=<?php echo 'pelanggan.php'?>">PELANGGAN</a>
                <a href="template.php?content=<?php echo 'pembelian.php'?>">PEMBELIAN</a>
                <a href="template.php?content=<?php echo 'logout.php'?>">LOGOUT</a>

            </td>
        </tr>
            <td>
           
                <?php include $vcontent;?>
            </td>

     
    </table>

</body>
              <!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">

      <div class="credits">
        ILHAMSURYA/181511025
      </div>
    </div>
  </footer><!-- End Footer -->