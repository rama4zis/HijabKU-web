<?php

$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM pembelian WHERE id_pembelian='$_GET[id]'");

echo "<script> alert('Produk Berhasil Dihapus!!!'); </script>";
echo "<script> location='dashboard.php?halaman=pembelian'; </script>";
?>