<?php
session_start();
//koneksi database
include '../koneksi.php';

if (!isset($_SESSION['adm'])) {
    echo "<script>location='login_adm.php'</script>";
    header('location=login_adm.php');
    exit();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="https://kit.fontawesome.com/8ea99c527e.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../images/logo_syara.png">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">SyaraHijab</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="http://localhost:8080/syarahijab/admin/dashboard.php?halaman=logout" class="btn btn-default square-btn-adjust"> Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="../images/logo-syara.png" width="100" height="100" class="d-inline-block align-top" alt="" />
                    </li>

                    <li>
                        <a href="dashboard.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="dashboard.php?halaman=produk"><i class="fas fa-cubes fa-2x"></i> Produk</a>
                    </li>

                    <li>
                        <a href="dashboard.php?halaman=pembelian"><i class="fas fa-shopping-cart fa-2x"></i> Pembelian</a>
                    </li>

                    <li>
                        <a href="dashboard.php?halaman=laporan_pembelian"><i class="fas fa-receipt fa-2x"></i> Laporan Pembelian</a>
                    </li>

                    <li>
                        <a href="dashboard.php?halaman=kategori"><i class="fas fa-list-alt fa-2x"></i> Katagori</a>
                    </li>

                    <li>
                        <a href="dashboard.php?halaman=pelanggan"><i class="fas fa-user-alt fa-2x"></i> Pelanggan</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == "produk") {
                        include 'produk.php';
                    } elseif ($_GET['halaman'] == "kategori") {
                        include 'kategori.php';
                    } elseif ($_GET['halaman'] == "pembelian") {
                        include 'pembelian.php';
                    }
                    if ($_GET['halaman'] == "pelanggan") {
                        include 'pelanggan.php';
                    } elseif ($_GET['halaman'] == "detail") {
                        include 'detail.php';
                    } elseif ($_GET['halaman'] == "tambahproduk") {
                        include 'tambahproduk.php';
                    } elseif ($_GET['halaman'] == "hapusproduk") {
                        include 'hapusproduk.php';
                    } elseif ($_GET['halaman'] == "ubahproduk") {
                        include 'ubahproduk.php';
                    } elseif ($_GET['halaman'] == "logout") {
                        include 'logout.php';
                    } elseif ($_GET['halaman'] == "dashboard") {
                        include 'dashboard.php';
                    } elseif ($_GET['halaman'] == "pembayaran") {
                        include 'pembayaran.php';
                    } elseif ($_GET['halaman'] == "laporan_pembelian") {
                        include 'laporan_pembelian.php';
                    } elseif ($_GET['halaman'] == "hapusdata") {
                        include 'hapusdata.php';
                    }
                } else {
                    include 'home.php';
                }
                ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>

</body>

</html>