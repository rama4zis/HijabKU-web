<?php
$koneksi = mysqli_connect("localhost", "hijab", "hijab123", "hijabku_db");
// Check connection
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
