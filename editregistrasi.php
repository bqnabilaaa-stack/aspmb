<?php

session_start();

include "../koneksi.php";

$id=$_GET['id'];

$data=mysqli_query($koneksi,"
SELECT *
FROM tbl_registrasi
WHERE idRegis='$id'
");

$d=mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

$namaDepan=$_POST['namaDepan'];
$namaBelakang=$_POST['namaBelakang'];
$tempatLahir=$_POST['tempatLahir'];
$tglLahir=$_POST['tglLahir'];
$jenisKelamin=$_POST['jenisKelamin'];
$NISN=$_POST['NISN'];
$agama=$_POST['agama'];
$sekolahAsal=$_POST['sekolahAsal'];
$alamat=$_POST['alamat'];
$telpon=$_POST['telpon'];

mysqli_query($koneksi,"
UPDATE tbl_registrasi
SET

namaDepan='$namaDepan',
namaBelakang='$namaBelakang',
tempatLahir='$tempatLahir',
tglLahir='$tglLahir',
jenisKelamin='$jenisKelamin',
NISN='$NISN',
agama='$agama',
sekolahAsal='$sekolahAsal',
alamat='$alamat',
telpon='$telpon'

WHERE idRegis='$id'

");

echo "<script>

alert('Data berhasil diupdate');

document.location='../panitia/indexpanitia.php';

</script>";

}

?>

<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" href="../assets/style.css">

<title>Edit Data</title>

</head>

<body>

<div class="container">

<div class="card">

<h2>Edit Registrasi</h2>

<form method="POST">

<input type="text" name="namaDepan" value="<?= $d['namaDepan']; ?>">

<input type="text" name="namaBelakang" value="<?= $d['namaBelakang']; ?>">

<input type="text" name="tempatLahir" value="<?= $d['tempatLahir']; ?>">

<input type="date" name="tglLahir" value="<?= $d['tglLahir']; ?>">

<input type="text" name="jenisKelamin" value="<?= $d['jenisKelamin']; ?>">

<input type="text" name="NISN" value="<?= $d['NISN']; ?>">

<input type="text" name="agama" value="<?= $d['agama']; ?>">

<input type="text" name="sekolahAsal" value="<?= $d['sekolahAsal']; ?>">

<textarea name="alamat"><?= $d['alamat']; ?></textarea>

<input type="text" name="telpon" value="<?= $d['telpon']; ?>">

<button name="update">

Update Data

</button>

</form>

</div>

</div>

</body>

</html>