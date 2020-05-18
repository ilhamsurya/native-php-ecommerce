<?php
include('koneksi2.php');


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
                        (current)
                    </i>
                    Nota
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

<body>
    <?php
    $query = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
    $detail = $query->fetch_assoc();
    //mengecek apakah ada error ketika menjalankan query
    if (!$detail) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }
    ?>
    <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
    <p>
        <?php echo $detail['hp_pelanggan']; ?> <br>
        <?php echo $detail['email_pelanggan']; ?>
        <?php echo $detail['alamat_pelanggan']; ?>
    </p>
    <p>
        Tanggal: <?php echo $detail['tanggal_pembelian']; ?><br>
        Total: <?php echo $detail['total_pembelian']; ?>
    </p>
    <table>
        <thead>
            <tr style="background-color: #f5f5f5;">
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
            $query = "SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.idbarang WHERE pembelian_produk.id_pembelian = '$_GET[id]'";
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

                <tr style="background-color: #f5f5f5;">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['jumlah']; ?></td>
                    <td>Rp <?php echo number_format($row['harga'] * $row['jumlah'], 0, ',', '.'); ?></td>

                </tr>

            <?php
                $no++; //untuk nomor urut terus bertambah 1
            }
            ?>


        </tbody>
    </table>
</body>