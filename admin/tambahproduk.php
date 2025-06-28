<?php 
$dat_kategori = array();

$kat = $koneksi->query("SELECT * FROM kategori ORDER BY kategori ASC");
while ($kat_prod = $kat->fetch_assoc())
{
    $dat_kategori[] = $kat_prod;
}
?>
<h2>Tambah Produk</h2>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

</head>
<body>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label >Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control form-control-sm" name="kategori_produk">
            <option>-Pilih Kategori-</option>
            <?php foreach($dat_kategori as $key => $value):?>
            <option value="<?= $value['kategori'];?>">
            <?= $value['kategori'];?>
            </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <label >Berat (Gram)</label>
        <input type="number" class="form-control" name="berat">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" min="1" class="form-control" name="stok_produk">
    </div>
    <div class="form-group">
        <label >Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label >Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <button class="btn btn-primary btn-block" name="save">Simpan</button><br>
    <center><a href="dashboard.php?halaman=produk" class="btn btn-danger btn-block" type="button">Kembali</a></center>
</form>
</body>
</html>

<?php
if (isset($_POST['save'])){
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi,"../foto_produk/".$nama);
    $koneksi->query("INSERT INTO produk (kat_produk,nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stok_produk)VALUES('$_POST[kategori_produk]','$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[stok_produk]')");

    echo "<div class='alert alert-info'>Data Berhasil Disimpan!!!</div>";
    echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=produk'>";
}
?>
