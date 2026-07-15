<?php
session_start();

include "koneksi.php";

if(isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];

$data=mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username='$username'");

$user=mysqli_fetch_assoc($data);

if($user){

if(password_verify($password,$user['password'])){

$_SESSION['login']=true;

$_SESSION['username']=$user['username'];

$_SESSION['role']=$user['role'];

if($user['role']=="panitia"){

header("Location: panitia/indexpanitia.php");

}else{

header("Location: pelamar/indexpelamar.php");

}

exit;

}

}

echo "<script>alert('Username atau Password salah');</script>";

}

?>

<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" href="assets/style.css">

<title>Login</title>

</head>

<body>

<div class="container">

<div class="card">

<h2>Login</h2>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">

Login

</button>

</form>

<br>

<center>

Belum punya akun?

<a href="buatakun.php">

Daftar

</a>

</center>

</div>

</div>

</body>

</html>