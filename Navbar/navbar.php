<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SyaraHijab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/logo-syara.png">
</head>
<body>
    


    <!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="images/logo_syara.png" alt="" width="90px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" style="color:grey;" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:grey;" href="keranjang.php"><i class=""></i> Keranjang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="color:grey;" href="checkout.php">Chekout</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="color:grey;" href="riwayat.php"><i class=""></i> Riwayat</a>
                </li>

                <?php if (isset($_SESSION["pelanggan"])):  ?>
                <li>
                    <a class="nav-link" style="color:grey;" href="logout.php"><i class=""></i> Logout</a>
                </li>
                <?php else: ?>
                <li>
                    <a class="nav-link" style="color:grey;" href="login.php"><i class=""></i> Login</a>
                </li>
                <?php endif ?>

                
            </ul>
        </div>
        <div class="col-sm-30">
        <div class="social-icons pull-right">
            <ul class="nav navbar-nav">
                <button class="btn btn-outline-success my-2 my-sm-0" style="color:grey;" name="cari" type="submit"><i class="fa fa-search"></i></button>
                <li>
                    <form method="get" action="pencarian.php" class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari produk di SyaraHijab" name="keyword" aria-label="Search">
                    </form>
                </li>
            </ul>
        </div>
        </div>
    </div>
</nav>
<!--SCRIPT-->
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>