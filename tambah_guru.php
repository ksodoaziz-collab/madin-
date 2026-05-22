<?php

include 'koneksi.php';

if(isset($_POST['submit'])) {

    $nip = $_POST['nip'];
    $nama_guru = $_POST['nama_guru'];
    $mapel = $_POST['mapel'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp, 'upload/' . $foto);

    mysqli_query($koneksi, "INSERT INTO tb_guru
    VALUES(
    NULL,
    '$nip',
    '$nama_guru',
    '$mapel',
    '$alamat',
    '$no_hp',
    '$foto'
    )");

    header("Location: data_guru.php");

}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Tambah Guru</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

    <h2>Tambah Data Guru</h2>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">

            <label>NIP</label>

            <input type="text"
                   name="nip"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Nama Guru</label>

            <input type="text"
                   name="nama_guru"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Mata Pelajaran</label>

            <input type="text"
                   name="mapel"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Alamat</label>

            <textarea name="alamat"
                      class="form-control"></textarea>

        </div>

        <div class="mb-3">

            <label>No HP</label>

            <input type="text"
                   name="no_hp"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Foto</label>

            <input type="file"
                   name="foto"
                   class="form-control">

        </div>

        <button type="submit"
                name="submit"
                class="btn btn-primary">

            Simpan

        </button>

    </form>

</div>

</body>
</html>