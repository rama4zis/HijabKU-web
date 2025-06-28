<h2>Data Pembelian</h2>
<?php
    include '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

</head>
<body>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Status Pembelian</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
            <?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
            <?php while($pecah = $ambil ->fetch_assoc()){ ?>
            <?php $tanggal = $pecah['tanggal_pembelian']?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_pelanggan']; ?></td>
                <td><?php echo date('d-m-Y',strtotime($tanggal)); ?></td>
                <td><?php echo $pecah['status_pembelian']; ?></td>
                <td>Rp. <?php echo number_format ($pecah['total_pembelian']); ?></td>
                <td>
                    <a href="dashboard.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"> Detail</i></a>
                    <a href="dashboard.php?halaman=hapusdata&id=<?php echo $pecah['id_pembelian'];?>" class="btn btn-danger"><i class="fa fa-trash-o "></i> Hapus</a>
                    <?php 
                        if($pecah ['status_pembelian']!=="PENDING"): ?>
                    <a href="dashboard.php?halaman=pembayaran&id=<?= $pecah['id_pembelian'];?>" class="btn btn-success"><i class="fa fa-money" aria-hidden="true"> Pembayaran</i></a>
                    <?php endif ?>
                </td>
            </tr>
            <?php $nomor++; ?>
            <?php } ?>
    </tbody>
</table>
</body>
</html>