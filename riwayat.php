<?php 
session_start();
include 'koneksi.php';
include 'Navbar/navbar.php';

if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script>alert('Silahkan Login !!!');</script>";
    echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    
</head>
<body>
    

<!--<pre><?php print_r($_SESSION["pelanggan"])?></pre>-->
<section class="riwayat">
    <div class="container">
        <h3> Riwayat Belanja Anda </h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                //Mendapatkan id_pelanggan yang login dari sesion
                $id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];

                $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                while($pecah = $ambil->fetch_assoc()){?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $pecah["tanggal_pembelian"];?></td>
                        <td><span style="font-weight:bold;"><?php echo $pecah['status_pembelian'];?></span></td>
                        <td>Rp. <?php echo number_format( $pecah["total_pembelian"]);?></td>
                        <td>
                            <a href="nota.php?id=<?php echo $pecah['id_pembelian'];?> " class="btn btn-info">Nota</a>
                            <?php if ($pecah['status_pembelian']=="PENDING"):?>

                                <a href="pembayaran.php?id=<?php echo $pecah['id_pembelian'];?>" class="btn btn-success">Pembayaran</a>
                            <?php else :?>
                                <a href="lihat_pembayaran.php?id=<?php echo $pecah['id_pembelian'];?>" class="btn btn-warning">Lihat Pembayaran</a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $no++;?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
</body>
</html>