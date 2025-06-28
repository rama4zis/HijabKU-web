<?php 
session_start();

//menggancurkan $_SESSION["pelanggan"]
session_destroy();

echo "<script>alert('anda telah Logout');</script>";
echo "<script>location='index.php';</script>";

?>