<?php 
session_start();
include 'koneksi.php';
include 'Navbar/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Pelanggan</title>
    <!-- CSS LOGIN-->
    <link href="assets/css/loginusr.css" rel="stylesheet">
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!--Icon CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    
</head>
<body>
<!--LOGIN-->
<div class="login">
    <div class="login-header">
        <h1>Login</h1>
    </div>
    <form method="post">
    <div class="login-form">
        <h3>Email:</h3>
            <input type="text" placeholder="Email" name="email"/><br>
        <h3>Password:</h3>
            <input type="password" placeholder="Password" name="password"/>
        <br>
            <button class="btn-login" type="submit" name="login">Login</button>
        <br> <br>
        <a href="daftar1.php" class="sign-up">Daftar Sekarang!</a>
    </div>
    </form>
</div>

<?php 
// Jika ada tombol login(tombol login ditekan)
if (isset($_POST["login"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    //lakukan cek query akun ditabel pelanggan di database
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

    //menghitung akun yang terambil
    $akunyangcocok = $ambil->num_rows;

    //jika 1 akun yang cocok maka di loginkan atau dijalankan 
    if ($akunyangcocok==1){
        //anda sukses login
        $akun = $ambil->fetch_assoc();
        //simpan di session pelanggan
        $_SESSION["pelanggan"] = $akun;
        echo "<script>alert('Anda Sukses Login!')</script>";
        echo "<script>location='index.php'</script>";
    }
    else{
        //anda gagal login
        echo "<script>window.alert('Anda Gagal Login, Periksa Akun Anda!')</script>";
        echo "<script>location='login.php'</script>";
    }
}

?>

</body>
</html>