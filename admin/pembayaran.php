<h2>Data Pembayaran</h2>

<?php
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();
$tanggal = $detail['tanggal'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
</head>
<body>
<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <td><?php echo $detail['nama']?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?php echo $detail['bank']?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>Rp. <?php echo number_format($detail['jumlah'])?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?php echo date('d-m-Y',strtotime($tanggal)); ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="../bukti_pembayaran/<?php echo $detail['bukti']?>" alt="" class="mr-2" style="width:200px;">
    </div>
</div>

<form method="post" class="mt-4">    
    <div class="form-group">
        <label>No Resi Pengiriman</label>
        <input type="text" class="form-control" name="resi">
    </div>    
    <div class="form-group">
        <label>status</label>
        <select class="form-control" name="status">
            <option value="">Pilih Status</option>
            <option value="LUNAS">Lunas</option>
            <option value="BARANG DIKIRIM">Barang Dikirim</option>
            <option value="BATAL">Batal</option>
        </select>
    </div>
    <button class="btn btn-primary btn-sm" name="proses">Proses</button>
    <a href="dashboard.php?halaman=pembelian" class="btn btn-primary btn-sm" type="button">Kembali</a>
</form>
<?php 
        if(isset($_POST['proses']))
        {
            $resi = $_POST['resi'];
            $status = $_POST['status'];
            $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

            echo "<script> alert('Data Telah Diperbarui');</script>";
            echo "<script> location = 'dashboard.php?halaman=pembelian';</script>";
        }

        ?>
</body>
</html>

