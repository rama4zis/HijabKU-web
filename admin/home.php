<?php
require_once 'dashboard.php'; ?>

<?php

// mengambil data barang
$data_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");

// menghitung data barang
$jumlah_pelanggan = mysqli_num_rows($data_pelanggan);

//mengambil data produk
$data_produk = mysqli_query($koneksi, "SELECT * FROM produk");

// menghitung data barang
$jumlah_produk = mysqli_num_rows($data_produk);

//mengambil data pembelian
$data_pembelian = mysqli_query($koneksi, "SELECT * FROM pembelian");

// menghitung data barang
$jumlah_pembelian = mysqli_num_rows($data_pembelian);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <h2>Selamat Datang, Admin Syarahijab :)</h2>
        </div>
    </div>
    <!-- /. ROW  -->
    <hr />
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fas fa-cubes"></i>
                </span>
                <div class="text-box">
                    <p align="center" class="main-text"><?php echo $jumlah_produk ?></p>
                    <p align="center"><a class="text-muted" href="http://localhost:8000/syarahijab/admin/dashboard.php?halaman=produk">PRODUK</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fas fa-shopping-cart"></i>
                </span>
                <div class="text-box">
                    <p align="center" class="main-text"><?php echo $jumlah_pembelian ?></p>
                    <p align="center"><a class="text-muted" href="http://localhost:8080/syarahijab/admin/dashboard.php?halaman=pembelian"> PEMBELIAN</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fas fa-user-alt"></i>
                </span>
                <div class="text-box">
                    <p align="center" class="main-text"><?php echo $jumlah_pelanggan ?></p>
                    <p align="center"><a class="text-muted" href="http://localhost:8080/syarahijab/admin/dashboard.php?halaman=pelanggan"> PELANGGAN</a></p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->





</body>

</html>