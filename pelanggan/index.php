<?php

include('koneksi2.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Template</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4accff97b9.js" crossorigin="anonymous"></script>
</head>

<body>

  <!--NAVBAR SECTION-->
  <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fa fa-home"></i>
            Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="keranjang.php">
            <i class="fa fa-shopping-cart">
              <span class="badge badge-warning">11</span>
            </i>
            Keranjang
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="checkout.php">
            <i class="fa fa-credit-card"></i>
            Checkout
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ">
        <li class="nav-item">
          <?php
          if (isset($_SESSION["pelanggan"])) :
          ?>
            <a class="nav-link" href="logout.php">
              <i class="fa fa-sign-out-alt">

              </i>
              Logout
            </a>

          <?php
          else :
          ?>
            <a class="nav-link" href="login.php">
              <i class="fa fa-sign-in-alt">

              </i>
              Login
            </a>
          <?php
          endif;
          ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fa fa-globe">

            </i>
            Test
          </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <br>
  <br>
  <br>

  <div class="container">
    <div class="row">
      <!-- CONTENT SECTION -->
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM produk ORDER BY idbarang ASC";
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

        <div class="col-md-3">
          <figure class="card card-product">
            <div class="img-wrap">
              <img src="image/<?php echo $row['foto']; ?>" style="width: 120px;" />
              <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
            </div>
            <figcaption class="info-wrap">
              <h6 class="title text-dots"><a href="#"><?php echo $row['nama']; ?></a></h6>
              <div class="action-wrap">
                <a href="beli.php?id=<?php echo $row['idbarang']; ?>" class="btn btn-primary btn-sm float-right"> Beli </a>
                <div class="price-wrap h5">
                  <span class="price-new">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></span>
                </div> <!-- price-wrap.// -->
              </div> <!-- action-wrap -->
            </figcaption>
          </figure> <!-- card // -->
        </div> <!-- col // -->
        <!--CONTEINER END-->
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </div>
  </div>

</body>

<!-- Footer -->
<footer class="text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-lg-4 col-xl-3">
        <h5>About</h5>
        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
        <p class="mb-0">
          Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
        </p>
      </div>

      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
        <h5>Informations</h5>
        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
        <ul class="list-unstyled">
          <li><a href="">Link 1</a></li>
          <li><a href="">Link 2</a></li>
          <li><a href="">Link 3</a></li>
          <li><a href="">Link 4</a></li>
        </ul>
      </div>

      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
        <h5>Others links</h5>
        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
        <ul class="list-unstyled">
          <li><a href="">Link 1</a></li>
          <li><a href="">Link 2</a></li>
          <li><a href="">Link 3</a></li>
          <li><a href="">Link 4</a></li>
        </ul>
      </div>

      <div class="col-md-4 col-lg-3 col-xl-3">
        <h5>Contact</h5>
        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
        <ul class="list-unstyled">
          <li><i class="fa fa-home mr-2"></i> My company</li>
          <li><i class="fa fa-envelope mr-2"></i> email@example.com</li>
          <li><i class="fa fa-phone mr-2"></i> + 33 12 14 15 16</li>
          <li><i class="fa fa-print mr-2"></i> + 33 12 14 15 16</li>
        </ul>
      </div>
      <div class="col-12 copyright mt-3">
        <p class="float-left">
          <a href="#">Back to top</a>
        </p>
        <p class="text-right text-muted">created with <i class="fa fa-heart"></i> by <a href="https://t-php.fr/43-theme-ecommerce-bootstrap-4.html"><i>t-php</i></a> | <span>v. 1.0</span></p>
      </div>
    </div>
  </div>
</footer>

</html>