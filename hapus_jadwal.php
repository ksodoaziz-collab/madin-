<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,
"DELETE FROM tb_jadwal WHERE id='$id'");

header("Location: jadwal.php");

?>