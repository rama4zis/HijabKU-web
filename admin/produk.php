=<h2>Data Produk</h2>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

</head>

<body>
<p><a href="dashboard.php?halaman=tambahproduk" class="btn btn-primary"> Tambah Data </a> <p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Berat</th>
            <th>Stok</th>
            <th>Foto Produk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
        <?php while($pecah = $ambil ->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td>Rp. <?php echo number_format ($pecah['harga_produk']); ?></td>
            <td><?php echo $pecah['berat_produk']; ?> Kg</td>
            <td><?php echo $pecah['stok_produk'];?></td>
            <td>
                <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="250px">
            </td>
            <td>
                <a href="dashboard.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-danger"><i class="fa fa-trash-o "></i> Hapus</a>
                <a href="dashboard.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>

    </tbody>
</table>

</body>
</html>
