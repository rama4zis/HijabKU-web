<?php 
session_start();
include 'koneksi.php';
include 'Navbar/navbar.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran 
    LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
    WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();
$tanggal = $detbay['tanggal_pembelian'];

//echo "<pre>";
//print_r ($detbay);
//echo "</pre>";

//jika belum ada data pembayaran
if (empty($detbay)){
    echo "<script>alert('Data Pembayaran Belum Terverifikasi!')</script>";
    echo "<script>location='riwayat.php'</script>";
    exit();
}

//jika data pembayaran tidak sesuai dengan login
//echo "<pre>";
//print_r ($_SESSION);
//echo "</pre>";
if($_SESSION["pelanggan"]['id_pelanggan']!==$detbay["id_pelanggan"]){
    echo "<script>alert('Halaman Error!')</script>";
    echo "<script>location='riwayat.php'</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lihat Pembayaran</title>
</head>
<body>
    <div class="container">
        <h3>Lihat Pembayaran</h3>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $detbay["nama"];?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?php echo $detbay["bank"];?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo date('d-m-Y',strtotime($tanggal)); ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?php echo number_format ($detbay["jumlah"]);?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="bukti_pembayaran/<?php echo $detbay["bukti"]?>" alt="" style="width:180px;">
            </div>
        </div>
    </div>
</body>
</html>