<?php
include("koneksi2.php");

if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Harap login');</script>";
    echo "<script>location='login.php';</script>";
}

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
                        <i class="fa fa-credit-card">(current)</i>
                        Checkout
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        <i class="fa fa-sign-in-alt">

                        </i>
                        Login
                    </a>
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
                                <th scope="col" class="text-right">Berat Total</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //buat perulangan untuk element tabel dari data mahasiswa
                            $no = 1; //variabel untuk membuat nomor urut
                            $totalbelanja = 0;
                            foreach ($_SESSION['keranjang'] as $id_barang => $jumlah) {
                                $query = $koneksi->query("SELECT * FROM produk WHERE idbarang = $id_barang");


                                $row = $query->fetch_assoc();
                                $subharga = $row["harga"] * $jumlah;
                                $berat = $row["berat"] * $jumlah;
                                // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                // kemudian dicetak dengan perulangan while
                            ?>
                                <tr>
                                    <td>
                                        <div class="img-wrap">
                                            <img src="image/<?php echo $row['foto']; ?>" style="width: 120px;" />

                                        </div>
                                    </td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                                    <td><input class="form-control" type="text" value="<?php echo $jumlah; ?>" /></td>
                                    <td class="text-right"><?php echo number_format($subharga, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($berat, 0, ',', '.'); ?></td>
                                </tr>
                                <?php
                                $no++; ?>
                                <?php
                                $totalbelanja += $subharga;
                                $totalberat += $berat;
                                ?>
                            <?php } ?>
                            <?php

                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td class="text-right"><strong>Rp.<?php echo number_format($totalbelanja, 0, ',', '.'); ?></strong></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total Berat</strong></td>
                                <td class="text-right"><strong><?php echo number_format($totalberat, 0, ',', '.'); ?> Kilogram</strong></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['hp_pelanggan'] ?>" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="id_ongkir">
                            <option value="">Pilih Ongkos Kirim</option>
                            <?php
                            $query = $koneksi->query("SELECT * FROM ongkir");
                            while ($row = $query->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['id_ongkir'] ?>"><?php echo $row['kota'] ?>
                                    - Rp.<?php echo $row['tarif'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12  col-md-6">
                            <button class="btn btn-block btn-danger" name="checkout">Checkout</button>
                            <button class="btn btn-block btn-light"><a href="keranjang.php"> Ubah Keranjang</a></button>

                        </div>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST["checkout"])) {
                $id_pelanggan =  $_SESSION["pelanggan"]["id_pelanggan"];
                $id_ongkir = $_POST["id_ongkir"];
                $tanggal_pembelian = date("Y-m-d");

                $totalongkir = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
                $result = $totalongkir->fetch_assoc();
                $tarif =  $result['tarif'] * $totalberat;
                $total_pembelian = $totalbelanja + $tarif;

                //Query ke DB Pembelian
                $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian') ");

                //Mendapatkan id pembelian
                $id_pembelian_baru = $koneksi->insert_id;
                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                    $koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah) VALUES ('$id_pembelian_baru', '$id_produk', '$jumlah') ");
                }

                //mengosongkan keranjang
                unset($_SESSION["keranjang"]);

                // Ke Halam Struk
                echo "<script>alert('Pembelian Berhasil');</script/>";
                echo "<script>location='nota.php?id=$id_pembelian_baru';</script>";
            }
            ?>

        </div>
    </div>

</body>

</html>