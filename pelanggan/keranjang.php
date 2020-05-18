<?php
include('koneksi2.php');

if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang Kosong');</script>";
    echo "<script>location='index.php';</script>";
}
?>

<head>
    <title>Template</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4accff97b9.js" crossorigin="anonymous"></script>
</head>

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
                    <span class="sr-only"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="keranjang.php">
                    <i class="fa fa-shopping-cart">
                        <span class="badge badge-warning">(current)</span>
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

<!--SHOPPING CART-->
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CART</h1>
    </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col" class="text-center">Jumlah</th>
                            <th scope="col" class="text-right">Subtotal</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($_SESSION['keranjang'] as $id_barang => $jumlah) :
                            $query = "SELECT * FROM produk WHERE idbarang = $id_barang";
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

                                <tr>
                                    <td>
                                        <div class="img-wrap">
                                            <img src="image/<?php echo $row['foto']; ?>" style="width: 120px;" />

                                        </div>
                                    </td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td>Rp.<?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                                    <td><input class="form-control" type="text" value="<?php echo $jumlah; ?>" /></td>
                                    <td class="text-right">Rp.<?php echo number_format($row['harga'] * $jumlah, 0, ',', '.'); ?></td>
                                    <td class="text-right"><button class="btn btn-sm btn-danger"><a href="hapuskeranjang.php?id=<?php echo $id_barang ?>"><i class="fa fa-trash"></i> </a></button> </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light"><a href="index.php"> Belanja Lagi</a></button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase"><a href="checkout.php"> Checkout</a></button>
                </div>
            </div>
        </div>
    </div>
</div>