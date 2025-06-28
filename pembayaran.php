<?php 
session_start();
include 'koneksi.php';
include 'Navbar/navbar.php';

if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script>alert('Silahkan Login !!!');</script>";
    echo "<script>location='login.php';</script>";
}

//mendapatkan id_pembelian Dari URL
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil -> fetch_assoc();

//mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if($id_pelanggan_login !== $id_pelanggan_beli)
{
    echo"<script> alert('Your Page Error!');</script>";
    echo"<script>location='riwayat.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
</head>
<body>
    <div class="container">
            <h2>Konfirmasi Pembayaran</h2>
            <p>Kirim bukti pembayaran anda disini</p>
            <div class="alert alert-info">total tagihan anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?> </strong>Bayarkan Ke rekening -------- A/N ------</div>

        <form method="post" enctype="multipart/form-data" >
            <div class="form-group">
                <label>Nama Penyetor</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Nama Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah">
            </div>
            <div class="form-group">
                <label>Foto Bukti</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger">Upload Bukti Disini</p>
            </div>
            <button class="btn btn-primary "name="kirim"> Kirim</button>
            <a href="riwayat.php" class="btn btn-primary " > Batal</a>
        </form>
    </div>

<?php 
    if( isset($_POST['kirim']))
    {
        $namabukti = $_FILES['bukti']['name'];
        $lokasibukti = $_FILES['bukti']['tmp_name'];
        $namafiks = date("YmdHis").$namabukti;
        move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

        $nama = $_POST['nama'];
        $bank = $_POST['bank'];
        $jumlah = $_POST['jumlah'];
        $tanggal = date("y-m-d");

        // Simpan Pembayaran
        $koneksi->query("INSERT INTO pembayaran (id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

        // Perubahan Status 
        $koneksi->query("UPDATE pembelian SET status_pembelian='SUCCESS' WHERE id_pembelian='$idpem'");
        
        echo"<script> alert('Pembayaran Sukses!');</script>";
        echo"<script>location='riwayat.php';</script>";
    }
?>
</body>
</html>