<?php
include "koneksi.php";

if(isset($_POST['daftar'])){

    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($koneksi,$_POST['email']);
    $role = $_POST['role'];

    $cek = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username='$username'");

    if(mysqli_num_rows($cek)>0){
        echo "<script>alert('Username sudah digunakan!');</script>";
    }else{

        mysqli_query($koneksi,"INSERT INTO tbl_user(username,password,email,role)
        VALUES('$username','$password','$email','$role')");

        echo "<script>
        alert('Akun berhasil dibuat');
        document.location='login.php';
        </script>";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/style.css">
<title>Buat Akun</title>
</head>

<body>

<div class="container">

<div class="card">

<h2>Buat Akun</h2>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Password" required>

<select name="role">

<option value="pelamar">Pelamar</option>

<option value="panitia">Panitia</option>

</select>

<button type="submit" name="daftar">
Daftar
</button>

</form>

<br>

<center>

Sudah punya akun?

<a href="login.php">
Login
</a>

</center>

</div>

</div>

</body>

</html>