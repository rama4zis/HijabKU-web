<?php 
include 'koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="shortcut icon" href="foto_produk/logo-syara.png">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <center><h2 class="form-title">Daftar</h2></center>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label class="form-control" for="nama"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama" id="nama" placeholder="Nama Anda" required/>
                            </div>
                            <div class="form-group">
                                <label class="form-control" for="telepon"><i class="zmdi zmdi-smartphone-android"></i></label>
                                <input type="text" name="telepon" id="telepon" placeholder="Masukan Nomor Telepon" required/>
                            </div>
                            <div class="form-group">
                                <label class="form-control" for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email Anda" required />
                            </div>
                            <div class="form-group">
                                <label class="form-control" for="pass" ><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required minlength="6" oninvalid="this.setCustomValidity('Password Minimal 6 Karakter')" oninput="setCustomValidity('')"/>
                            </div>
                            <div class="form-group">
                                <label class="form-control" for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Ulangi Password" required/>
                            </div>
<///div  onClick="alert('Anda Sukses Login!')" class="form-group form-button">
                                <input type="submit" name="daftar" id="daftar" class="form-submit" value="Daftar"/>
                            </div>
                        </form>
                        <script type="text/javascript">
                            window.onload = function () {
                                document.getElementById("pass").onchange = validatePassword;
                                document.getElementById("re_pass").onchange = validatePassword;
                            }

                            function validatePassword(){
                            var pass2=document.getElementById("re_pass").value;
                            var pass1=document.getElementById("pass").value;
                            if(pass1!=pass2)
                                document.getElementById("re_pass").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
                            else
                                document.getElementById("re_pass").setCustomValidity('');
                            }
                        </script>
                        <?php
                        // Jika ada tombol daftar (ditekan tombol daftar)
                        if (isset($_POST["daftar"])){
                            // mengambil isian data 
                            $nama = $_POST["nama"];
                            $telepon = $_POST["telepon"];
                            $email = $_POST["email"];
                            $password = $_POST["pass"];

                            //cek apakah email sudah pernah digunakan
                            $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok==1){
                                echo "<script>alert('Email Telah Digunakan');</script>";
                                echo "<script>location='daftar1.php'</script>";
                            }
                            else {
                                $koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telpon_pelanggan) VALUES ('$email','$password','$nama','$telepon')");
                                echo "<script>alert('Pendaftaran Berhasil, Silahkan Login!');</script>";
                                echo "<script>location='login.php'</script>";
                            }
                        }
                        ?>

                        <div class="signup-image">
                        <figure><img src="foto_produk/logo_syara.png" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">Saya sudah punya akun!</a>
                    </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/maindaftar.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>