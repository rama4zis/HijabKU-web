<?php
session_start();
// Mendapatkan Id_produk dari URL
$id_produk = $_GET['id'];

if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script>alert('Silahkan Login !!!');</script>";
    echo "<script>location='login.php';</script>";
}
// Jika Sudah ada Produk Dikeranjang Maka Jumlahnya +1
if(isset($_SESSION['beli'][$id_produk])){
    $_SESSION['beli'][$id_produk]+=1;
}

// Selain itu (belum ada di keranjang) maka produk itu dianggap dibeli 1
else{
    $_SESSION['beli'][$id_produk] = 1;
}


//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

//larikan ke halaman keranjang
echo "<script>alert('Produk Berhasil Dibeli');</script>";
echo "<script>location='index.php';</script>";
?>