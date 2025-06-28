<?php 
session_start();
include 'koneksi.php';

if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script>alert('Silahkan Login !!!');</script>";
    echo "<script>location='login.php';</script>";
}


if(empty($_SESSION['beli']) OR !isset($_SESSION['beli'])){
    echo "<script>alert('tidak ada produk! silahkan pilih produk dan selamat berbelanja');</script>";
    echo "<script>location='index.php'</script>";
  }
?>
<?php require_once 'Navbar/navbar.php';?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>

</head>
<body>

<!--keranjang-->
<section class="konten">
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <hr>
        <table class="table table-bordered">
            <thrad>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Harga</th>
                    <th>Opsi</th>
                </tr>
            </thrad>
            <tbody>
                <?php $nomor=1; ?>
                <!--Menampilkan Produk berdasarkan id_produk-->
                <?php foreach($_SESSION["beli"] as $id_produk => $jumlah): ?>
                <?php
                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $pecah = $ambil->fetch_assoc();
                $subharga = floatval($pecah['harga_produk']) * intval($jumlah);
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["nama_produk"];?></td>
                    <td>Rp. <?php echo number_format ($pecah["harga_produk"]);?></td>
                    <td><?php echo $jumlah;?></td>
                    <td>Rp. <?php echo number_format ($subharga);?></td>
                    <td class="cart_delete">
						<a href="delete_keranjang.php?id=<?php echo $id_produk; ?>" button type="button" class="cart_quantity_delete" ><i class="fa fa-times"></i></a>
					</td>
                </tr>
                <?php $nomor++;?>
                <?php endforeach?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
        <a href="checkout.php" class="btn btn-warning">Checkout</a>
    </div>
</section>


</body>
</html>