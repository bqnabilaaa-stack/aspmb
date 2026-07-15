<?php

include "../koneksi.php";

$id=$_GET['id'];

mysqli_query($koneksi,"
DELETE FROM tbl_registrasi
WHERE idRegis='$id'
");

header("Location:indexpanitia.php");

?>