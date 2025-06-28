<?php
session_start();
$id_produk = $_GET['id'];
unset($_SESSION['beli'][$id_produk]);

echo "<script>location = 'keranjang.php'</script>";

?>