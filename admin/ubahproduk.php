<h2>Ubah Produk</h2>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
</head>
<body>
<?php
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

//Kategori Produk
$dat_kategori = array();

$kat = $koneksi->query("SELECT * FROM kategori");
while ($kat_prod = $kat->fetch_assoc())
{
    $dat_kategori[] = $kat_prod;
}
//--------------------------------
//echo "<pre>";
//print_r($pecah);
//echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label >Nama Produk</label>
        <select type="text" class="form-control" name="nama">
                @foreach ($ambil as $pecah)
                        <option value="<?php echo $pecah['nama_produk'];?>">
                            Jangan Ubah
                        </option>                            
                @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control form-control-sm" name="kategori" >
            <option value="">-Pilih Kategori-</option>
            <?php foreach($dat_kategori as $key => $value):?>
            <option value="<?= $value['kategori'];?>" <?php if ($pecah["kat_produk"]==$value["kategori"]){ echo "selected"; }?>>
            <?= $value['kategori'];?>
            </option>
            <?php endforeach ?>
            
        </select>
    </div>

    <div class="form-group">
    <label>Harga</label>
        <input type="number" class="form-control" name="harga" value="<?= $pecah['harga_produk'];?>">
    </div>
    <div class="form-group">
        <label >Berat (Gram)</label>
        <input type="number" class="form-control" name="berat" value="<?= $pecah['berat_produk'];?>">
    </div>
    <div class="form-group">
        <label>Ubah Foto Produk</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" min="1" class="form-control"  name="stok_produk" value="<?= $pecah['stok_produk'];?>" >
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="5">
        <?=$pecah['deskripsi_produk'];?>
        </textarea>
    </div>
    <button class="btn btn-primary btn-block" name="ubah">Ubah</button> <br>
    <center><a href="dashboard.php?halaman=produk" class="btn btn-danger btn-block" type="button">Kembali</a></center>
</form>

<?php
if (isset($_POST['ubah'])){

    $namafoto=$_FILES['foto']['name'];
    $lokasifoto=$_FILES['foto']['tmp_name'];

    //jika foto dirubah
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "../admin/assets/foto_produk/$namafoto");

        $koneksi->query("UPDATE produk SET kat_produk='$_POST[kategori]',harga_produk='$_POST[harga]', berat_produk='$_POST[berat]',
          foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok_produk]'
           WHERE id_produk='$_GET[id]'");
    }
    else{
        $koneksi->query("UPDATE produk SET kat_produk='$_POST[kategori]',harga_produk='$_POST[harga]', berat_produk='$_POST[berat]',
        foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok_produk]' WHERE id_produk='$_GET[id]'");
    }
    echo "<script>alert('Data Produk Telah Diubah');</script>";
    echo "<script>location='dashboard.php?halaman=produk'</script>";
}
?>
</body>
</html>
