<?php
session_start();
include 'koneksi.php';
$kat = $koneksi->query("SELECT * FROM kategori ORDER BY id_kategori ASC");
include 'Navbar/navbar.php';
?>


<section id="slider">
	<!--slider-->
	<div class="container" style="background-color:	GhostWhite;">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li>
					</ol>

					<div class="carousel-inner">
						<div class="item active">
							<div class="col-sm-6"> 
								<h1><span>SyaraHijab</span> your daily look!</h1>
								<h2>Hijab Paris Premium Cream</h2>
								<p>Hijab segi empat yang cocok untuk segala bentuk wajah dan bisa kamu gunakan untuk daily look atau acara formal.</p>
								<a class="btn btn-default get" style="border:2px solid Black;" href="http://localhost:8080/syarahijab/detail.php?id=28">Beli Sekarang</a>
							</div>
							<div class="col-sm-6">
								<img src="foto_produk/HD1.jpg" class="girl img-responsive" alt="" />
							</div>
						</div>
						<div class="item">
							<div class="col-sm-6">
								<h1><span>SyaraHijab</span></h1>
								<h2>Turkish Shawl Lavender</h2>
								<p>Model hijab dengan bahan yang lembut, bertekstur, dan mudah diatur ketika di pakai. Buruan checkout produk ini best seller lhoo!</p>
								<a class="btn btn-default get" style="border:2px solid Black;" href="http://localhost:8080/syarahijab/detail.php?id=36">Beli Sekarang</a>
							</div>
							<div class="col-sm-6">
								<img src="foto_produk/HD2.jpg" class="girl img-responsive" alt="" />
							</div>
						</div>

					</div>

					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>

			</div>
		</div>
	</div>
</section>
<!--/slider-->


<!--Konten-->
<section class="konten">
	<div class="container">
		<div class="features_items">
			<h2 class="title text-center">Daftar Produk</h2>

			<!--KATEGORI-->
			<ul class="nav justify-content-center mt-4">
				<form action="kategori.php" method="get"></form>
				<div class="btn-group mr-4">
					<button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Kategori Produk
					</button>
					<div class="dropdown-menu dropdown-menu-right">
						<!--MENAMPILKAN KATEGORI DARI DATABASE-->
						<?php if (mysqli_num_rows($kat)) { ?>
							<?php while ($rowkat = mysqli_fetch_array($kat)) { ?>
								<a href="kategori.php?kategori=<?= $rowkat['kategori']; ?>" class="dropdown-item"><?= $rowkat['kategori']; ?></a>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
				</form>
			</ul>
			<br>
			<div class="row">

				<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
				<?php while ($perproduk = $ambil->fetch_assoc()) { ?>
					<div class="col-md-3">
						<div class="thumbnail">
							<div class="productinfo text-center">
								<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top" alt="">
								<h3><?php echo $perproduk['nama_produk']; ?></h2>
									<h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
									<a style="border:2px solid Black;" href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Tambah Ke Keranjang</a>
									<a style="border:2px solid Black;" href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-default add-to-cart">Detail</a>
							</div>
						</div>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
</section>

<!--Footer-->
<footer id="footer">
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
			</div>
		</div>
	</div>

</footer>