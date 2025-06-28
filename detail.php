<?php session_start(); ?>
<?php 
include 'Navbar/navbar.php';
include 'koneksi.php';
?>
<?php
// Mendapatkan id_produk dari url
$id_produk = $_GET["id"];

// query ambil data 
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil -> fetch_assoc();

//echo "<pre>";
//print_r($detail);
//echo "</pre>";
?>
<!DOCTYPE html>
<html >
<head>
    <title>Product Details</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/css/price-range.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">
         
    <link rel="shortcut icon" href="images/ico/favicon.ico">
</head><!--/head-->

<body>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-4">
							<div class="view-product">
								<img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="" />
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/new.jpg" class="newarrival" alt="" />
								<h1><?php echo $detail["nama_produk"] ?></h1>
								<img src="images/" alt="" /><br>
								<h4><b>Stok:</b> <?= $detail['stok_produk'];?></h4>
								<h4><b>Berat:</b> <?= $detail['berat_produk'];?> Gram</h4>
								<span>
									<span>Rp. <?php echo number_format ($detail["harga_produk"]); ?></span>
									<form method="post">
										<div class="form-group">
											<div class="input-group">
												<label>Jumlah:</label>
												<input type="number" min="1" class="form-control" name="jumlah" autofocus="on" max="<?= $detail['stok_produk'];?>" placeholder="Min 1"/>
											</div>
										</div>
									<center><button type="submit" class="btn btn-primary" name="beli">
										<i class="fa fa-shopping-cart"></i>
										Tambahkan Keranjang!
									</button></center>
									</form>

									<?php 
									//Jika Ada Tombol Beli
									if (isset($_POST["beli"])){
										//Mendapatkan Jumlah Yang Di inputkan
										$jumlah = $_POST["jumlah"];
										//Masukan Di Keranjang Belanja
										$_SESSION["beli"][$id_produk] = $jumlah;

										echo "<script>alert('Produk Telah Masuk ke Keranjang');</script>";
										echo "<script>location='index.php';</script>";
									}

									if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
										{
    										echo "<script>alert('Silahkan Login !!!');</script>";
    										echo "<script>location='login.php';</script>";
										}
									?>
								</span><br>
                                <h3>Deskripsi:</h3>
								<p><?php echo $detail["deskripsi_produk"]; ?></p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
			</div>
		</div>
	</section>
			
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2021 SyaraHijab</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/price-range.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>