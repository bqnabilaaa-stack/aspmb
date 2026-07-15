<?php

session_start();

if(!isset($_SESSION['login'])){

header("Location: ../login.php");

exit;

}

?>

<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<div class="card">

<h2>

Selamat Datang

</h2>

<p>

Halo,

<b>

<?php echo $_SESSION['username']; ?>

</b>

</p>

<br>

<a href="../registrasi.php">

<button>

Isi Form Registrasi

</button>

</a>

<br><br>

<a href="../logout.php">

Logout

</a>

</div>

</div>

</body>

</html>