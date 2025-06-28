<?php 
session_start();
include 'koneksi.php';

//jika tidak ada session pelanggan (belom login). maka dilarikan ke login.php
if(!isset($_SESSION["pelanggan"])){
    echo "<script>alert('Silahkan Login !!!');</script>";
    echo "<script>location='login.php';</script>";
}
if(empty($_SESSION['beli'])){
    echo "<script>alert('tidak ada produk! silahkan pilih produk dan selamat berbelanja');</script>";
    echo "<script>location='index.php'</script>";
  }
?>

<?php require_once 'Navbar/navbar.php';?>
<section class="konten">
    <div class="col-md-7">
        <h1>Keranjang Belanja</h1>
        <hr>
        <table class="table table-bordered">
            <thrad>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Harga</th>
                </tr>
            </thrad>
            <tbody>
                <?php $nomor=1; ?> 
                <?php $totalbelanja = 0; ?>
                <!--Menampilkan Produk berdasarkan id_produk-->
                <?php foreach($_SESSION["beli"] as $id_produk => $jumlah): ?>
                <?php
                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $pecah = $ambil->fetch_assoc();
                $subharga = (float)$pecah['harga_produk'] * (int)$jumlah;
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["nama_produk"];?></td>
                    <td>Rp. <?php echo number_format ($pecah["harga_produk"]);?></td>
                    <td><?php echo $jumlah;?></td>
                    <td>Rp. <?php echo number_format ($subharga);?></td>
                </tr>
                <?php $nomor++;?>
                <?php $totalbelanja+=$subharga; ?>
                <?php endforeach?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-md-4">
        <form method="post" >
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" value="<?= $_SESSION['pelanggan']['nama_pelanggan'];?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="<?= $_SESSION['pelanggan']['email_pelanggan'];?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">No. Telepon</label>
                <input type="email" class="form-control" id="email" value="<?= $_SESSION['pelanggan']['telpon_pelanggan'];?>" readonly>
            </div>
            <!--ALAMAT-->
            <div class="form-group">
                <label for="tot">Total Tagihan</label>
                <input type="email" class="form-control bg-info text-white" id="tot" value="Rp. <?= number_format($totalbelanja);?>" readonly>
            </div>
            <label><i class="fa fa-exclamation"></i> Pilih Ongkos Kirim</label>
            <select class="form-control" name="id_ongkir" required>
                <option value="">Pilih Ongkos Kirim</option>
                <?php 
                $ambil = $koneksi->query("SELECT * FROM ongkir");
                while($perongkir = $ambil->fetch_assoc()){
                ?>
                <option value="<?= $perongkir['id_ongkir'];?>">
                    <?= $perongkir['nama_kota']?> 
                    Rp.<?= number_format($perongkir['tarif'])?>
                </option>
                <?php }?>
            </select> <br>
            <div class="form-group">
                <label>Alamat Pengiriman</label>
                <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan Alamat Lengkap Pengiriman" required></textarea>
            </div>
            <button class="btn btn-success btn-block" name="checkout">Checkout</button>
            <a href="index.php" class="btn btn-default btn-block">Back</a>
        </form>

        <?php 
            if (isset($_POST["checkout"])){
                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                $id_ongkir = $_POST["id_ongkir"];
                $tanggal_pembelian = date("Y-m-d");
                $alamat_pengiriman = $_POST['alamat_pengiriman'];

                $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                $arrayongkir = $ambil->fetch_assoc();
                $nama_kota = $arrayongkir['nama_kota'];
                $tarif = $arrayongkir['tarif'];

                $total_pembelian = $totalbelanja + $tarif;

                // menyimpan data ke tabel pembelian
                $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif', '$alamat_pengiriman')");
            
                //mendapatkan id_pembelian yang telah terjadi 
                $id_pembelian_barusan = $koneksi->insert_id;

                foreach ($_SESSION["beli"] as $id_produk => $jumlah) {

                    //mendapatkan data produk berdasarkan id_produk
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $perproduk = $ambil->fetch_assoc();

                    $nama = $perproduk['nama_produk'];
                    $harga = $perproduk['harga_produk'];
                    $berat = $perproduk['berat_produk'];

                    $subharga = $perproduk['harga_produk']*$jumlah;
                    $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah_produk,nama,harga,berat,subharga) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah','$nama','$harga','$berat','$subharga')");

                    //skript update stok
                    $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah WHERE id_produk='$id_produk'");
                }

                //mengkosongkan keranjang belanja
                unset($_SESSION["beli"]);

                //tampilan dialihka ke halaman nota
                echo"<script>alert('Pembelian Sukses!');</script>";
                echo"<script>location='nota.php?id=$id_pembelian_barusan';</script>";
            }

        ?>

    </div>
</section>

