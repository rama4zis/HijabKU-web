<h2>Detail Pembelian</h2>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

</head>
<body>
<?php 
    $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambil->fetch_assoc();
?>
<!--<pre><?php print_r($detail); ?></pre>-->

<div class="row">
    <div class="col-md-4">
        <h3>PEMBELIAN</h3>
        <strong>No.Pembelian: <?= $detail['id_pembelian'] ?></strong><br>
           Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
           Total : Rp. <?php echo number_format ($detail['total_pembelian']); ?><br>
           Status : <?php echo $detail['status_pembelian']; ?>
    </div>
    <div class="col-md-4">
        <h3>PELANGGAN</h3>
        <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
           Telpon : <?php echo $detail['telpon_pelanggan']; ?> <br>
            Email : <?php echo $detail['email_pelanggan']; ?>
    </div>
    <div class="col-md-4">
        <h3>PENGIRIMAN</h3>
        <strong><?php echo $detail['nama_kota']; ?></strong> <br>
           Tarif : Rp. <?php echo number_format ($detail['tarif']); ?><br>
           Alamat : <?php echo $detail['alamat_pengiriman']; ?>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Jumlah</th>
            <th>Sub Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON 
        pembelian_produk.id_produk=produk.id_produk 
        WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
        <?php while ($pecah=$ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td>Rp. <?php echo number_format ($pecah['harga_produk']); ?></td>
            <td><?php echo $pecah['jumlah_produk']; ?></td>
            <td>
                Rp. <?php echo number_format ($pecah['harga_produk']*$pecah['jumlah_produk']); ?>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
<center><a href="dashboard.php?halaman=pembelian" class="btn btn-danger" type="button">Kembali</a></center>
</body>
</html>