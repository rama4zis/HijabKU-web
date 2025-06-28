<?php 
session_start();
include 'koneksi.php';
require_once 'Navbar/navbar.php';

$id_kat = $_GET['kategori'];
$kat = $koneksi->query("SELECT produk.*, produk.kat_produk FROM produk, kategori WHERE produk.kat_produk=kategori.kategori AND produk.kat_produk = '$id_kat' ");


?>
<script src="https://kit.fontawesome.com/8ea99c527e.js" crossorigin="anonymous"></script>
<div id="main bg-light" >
<div class="container lht bg-light">
    <ul class="nav justify-content-center bg-light">
            <form action="kategori.php" method="get">
            <div class="btn-group mr-4">
                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kategori Produk
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                <?php $kate = $koneksi->query("SELECT * FROM kategori ORDER BY id_kategori ASC"); ?>
                <?php if (mysqli_num_rows($kate)){?>
                        <?php while ($rowkat = mysqli_fetch_array($kate)){?>
                            <a href="kategori.php?kategori=<?= $rowkat['kategori'];?>" class="dropdown-item"><?= $rowkat['kategori'];?></a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </form>
    </ul><hr>
    
        <h5 class="kat_capt"><i class="fas fa-tags text-capitalize"></i> KATEGORI '<?= $id_kat ?>'</h5><hr>
    <div class="row mt-4 ">
        
    <!-- NAMPILIN KATEGORI -->
            <?php if (mysqli_num_rows($kat)){?>
            <?php while ($value = mysqli_fetch_array($kat)){?>
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
            <?php } ?>
            <?php } ?>
    </div>
</div>
