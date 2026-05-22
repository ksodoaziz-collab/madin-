<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_madin"
);

if (!$koneksi) {
    die("Koneksi gagal");
}

?>