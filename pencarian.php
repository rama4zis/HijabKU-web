<?php
session_start();
include 'koneksi.php';
require_once 'Navbar/navbar.php';
// Pengambilan Data Pencarian
$keyword = $_GET["keyword"];

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR kat_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc())
{
    $semuadata[]=$pecah;
}
// Pengambilan Data Drop Down Kategori
$kat = $koneksi->query("SELECT * FROM kategori ORDER BY id_kategori ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/8ea99c527e.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- KATEGORI / SEARCH -->
<ul class="nav justify-content-center mt-4">
    <div class="btn-group mr-4">
        <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Kategori Produk
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <?php if (mysqli_num_rows($kat)){?>
                <?php while ($rowkat = mysqli_fetch_array($kat)){ ?>
                    <a href="kategori.php?kategori=<?= $rowkat['kategori'];?>" class="dropdown-item"><?= $rowkat['kategori'];?></a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    
</ul>
<hr>
<!-- endd -->

<!-- BODY -->
<div class="container lht bg-light">
    <h5><i class="fas fa-search"></i> Hasil pencarian untuk '<?= $keyword ?>'</h5><hr>
    <div class="row">
    <section class="konten">
    <div class="container">
        <div class="features_items">
            <h2 class="title text-center">Daftar Produk</h2>
    <?php if(empty($semuadata)): ?>
        <div class="alert alert-danger"> Pencarian Tidak Ditemukan!</div>
    <?php endif ?>

        <div class="row">
        
<!--TAMPILKAN PRODUK-->
        <?php foreach($semuadata as $key => $value):?>
            <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="productinfo text-center">
                        <img src="foto_produk/<?php echo $value['foto_produk']; ?>" class="card-img-top" alt="">
                            <h3><?php echo $value['nama_produk']; ?></h2>
                            <h5>Rp. <?php echo number_format($value['harga_produk']); ?></h5>
                            <a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Tambah Ke Keranjang</a>
                            <a  href="detail.php?id=<?php echo $value["id_produk"];?>" class= "btn btn-default add-to-cart">Detail</a>
                        </div>
                    </div>
                </div>
        <?php endforeach?>
<!--TAMPILKAN PRODUK-->
           

        </div>
        </div>
    </div>
</section>
    </div>
</div>
</body>
</html>