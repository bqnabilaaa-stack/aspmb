<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include "../koneksi.php";

$data = mysqli_query($koneksi,"
SELECT *
FROM tbl_registrasi
ORDER BY idRegis DESC
");

?>

<!DOCTYPE html>
<html>

<head>

<title>Data Pelamar</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<div class="card">

<h2>Data Pelamar</h2>

<table>

<tr>

<th>No</th>

<th>Nama</th>

<th>NISN</th>

<th>Sekolah</th>

<th>Telepon</th>

<th>Aksi</th>

</tr>

<?php

$no=1;

while($d=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['namaDepan']." ".$d['namaBelakang']; ?></td>

<td><?= $d['NISN']; ?></td>

<td><?= $d['sekolahAsal']; ?></td>

<td><?= $d['telpon']; ?></td>

<td>

<a href="../pelamar/editregistrasi.php?id=<?= $d['idRegis']; ?>">
Edit
</a>

|

<a href="hapus.php?id=<?= $d['idRegis']; ?>"
onclick="return confirm('Yakin ingin menghapus?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</table>

<br>

<a href="../logout.php">

Logout

</a>

</div>

</div>

</body>

</html>