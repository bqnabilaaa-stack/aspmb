<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include "../koneksi.php";

if(isset($_POST['simpan'])){

    $username = $_SESSION['username'];

    $namaDepan = $_POST['namaDepan'];
    $namaBelakang = $_POST['namaBelakang'];
    $tempatLahir = $_POST['tempatLahir'];
    $tglLahir = $_POST['tglLahir'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $NISN = $_POST['NISN'];
    $agama = $_POST['agama'];
    $sekolahAsal = $_POST['sekolahAsal'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];

    mysqli_query($koneksi,"INSERT INTO tbl_registrasi
    VALUES(
    '',
    '$username',
    '$namaDepan',
    '$namaBelakang',
    '$tempatLahir',
    '$tglLahir',
    '$jenisKelamin',
    '$NISN',
    '$agama',
    '$sekolahAsal',
    '$alamat',
    '$telpon'
    )");

    $idRegis = mysqli_insert_id($koneksi);

    $namaAyah = $_POST['namaAyah'];
    $pekerjaanAyah = $_POST['pekerjaanAyah'];
    $penghasilanAyah = $_POST['penghasilanAyah'];

    $namaIbu = $_POST['namaIbu'];
    $pekerjaanIbu = $_POST['pekerjaanIbu'];
    $penghasilanIbu = $_POST['penghasilanIbu'];

    mysqli_query($koneksi,"INSERT INTO tbl_orangtua
    VALUES(
    '',
    '$idRegis',
    '$namaAyah',
    '$pekerjaanAyah',
    '$penghasilanAyah',
    '$namaIbu',
    '$pekerjaanIbu',
    '$penghasilanIbu'
    )");

    $pasfoto = $_FILES['pasfoto']['name'];
    $ijazah = $_FILES['ijazah']['name'];

    move_uploaded_file(
        $_FILES['pasfoto']['tmp_name'],
        "../upload/pasfoto/".$pasfoto
    );

    move_uploaded_file(
        $_FILES['ijazah']['tmp_name'],
        "../upload/ijazah/".$ijazah
    );

    mysqli_query($koneksi,"INSERT INTO tbl_dokumen
    VALUES(
    '',
    '$idRegis',
    '$pasfoto',
    '$ijazah'
    )");

    echo "<script>
    alert('Data berhasil disimpan');
    document.location='indexpelamar.php';
    </script>";

}
?>
<!DOCTYPE html>
<html>

<head>

<title>Registrasi Pelamar</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<div class="card">

<h2>Form Registrasi</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="namaDepan" placeholder="Nama Depan" required>

<input type="text" name="namaBelakang" placeholder="Nama Belakang" required>

<input type="text" name="tempatLahir" placeholder="Tempat Lahir" required>

<input type="date" name="tglLahir" required>

<select name="jenisKelamin">

<option value="laki-laki">Laki-laki</option>

<option value="perempuan">Perempuan</option>

</select>

<input type="text" name="NISN" placeholder="NISN">

<input type="text" name="agama" placeholder="Agama">

<input type="text" name="sekolahAsal" placeholder="Sekolah Asal">

<textarea
name="alamat"
placeholder="Alamat">
</textarea>

<input type="text" name="telpon" placeholder="Nomor Telepon">

<h3>Data Orang Tua</h3>

<input type="text" name="namaAyah" placeholder="Nama Ayah">

<input type="text" name="pekerjaanAyah" placeholder="Pekerjaan Ayah">

<input type="number" name="penghasilanAyah" placeholder="Penghasilan Ayah">

<input type="text" name="namaIbu" placeholder="Nama Ibu">

<input type="text" name="pekerjaanIbu" placeholder="Pekerjaan Ibu">

<input type="number" name="penghasilanIbu" placeholder="Penghasilan Ibu">

<h3>Upload Dokumen</h3>

<label>Pas Foto</label>

<input type="file" name="pasfoto">

<label>Ijazah</label>

<input type="file" name="ijazah">

<button
type="submit"
name="simpan">

Simpan Data

</button>

</form>

</div>

</div>

</body>

</html>