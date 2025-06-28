<?php
session_start();
include 'koneksi.php';
?>

<?php require_once 'Navbar/navbar.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Nota Pembelian</title>
</head>

<body>



    <section class="konten">
        <div class="container">

            <!--nota disini copas dari detail admin-->
            <h2>Informasi Pembelian</h2>
            <?php
            $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            $tanggal = $detail['tanggal_pembelian'];
            ?>

            <!--Jika Pelanggan Yang Beli Tidak Sama Dengan Yang Login, Maka dilarikan ke riwayat-->
            <?php
            $idpelbeli = $detail["id_pelanggan"];
            $idpellogin = $_SESSION["pelanggan"]["id_pelanggan"];
            if ($idpelbeli !== $idpellogin) {
                echo "<script>alert('Your Page Error!');</script>";
                echo "<script>location='riwayat.php'</script>";
                exit();
            }
            ?>


            <div class="row">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>No.Pembelian: <?= $detail['id_pembelian'] ?></strong><br>
                    Tanggal Pembelian : <?php echo date('d-m-Y', strtotime($tanggal)); ?><br>
                    Total Pembayaran : Rp. <?= number_format($detail['total_pembelian']) ?>
                </div>
                <div class="col-md-4">
                    <h3>user</h3>
                    <strong><?= $detail['nama_pelanggan']; ?></strong> <br>
                    Email : <?= $detail['email_pelanggan']; ?> <br>
                    No. Telepon : <?= $detail['telpon_pelanggan']; ?>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    <strong><?= $detail['nama_kota']; ?></strong><br>
                    Ongkos Kirim: Rp. <?= number_format($detail['tarif']); ?><br>
                    Alamat Pengiriman: <?= $detail['alamat_pengiriman']; ?><br>
                    No.Resi : <?php echo $detail['resi_pengiriman']; ?>
                </div>
            </div>
            <hr>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <center><?php echo $nomor; ?></center>
                            </td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo $pecah['berat']; ?>Gram</td>
                            <td><?php echo number_format($pecah['jumlah_produk']); ?></td>
                            <td>Rp. <?php echo number_format($pecah['subharga']) ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>


            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                        Note : <strong>Abaikan Jika Sudah Melakukan Pembayaran!</strong>
                        <p>
                            Silahkan melakukan pembayaran Rp. <?= number_format($detail['total_pembelian']); ?> <br> <strong> BANK BCA 8113543002 AN. Sarah Fanny</strong>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

</body>

</html>