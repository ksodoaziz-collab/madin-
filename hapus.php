<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

$foto = $row['foto'];

unlink("upload/$foto");

mysqli_query($koneksi, "DELETE FROM tb_siswa WHERE id='$id'");

header("Location: data_siswa.php");

?>