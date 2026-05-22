<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM tb_guru WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])) {

    $nip = $_POST['nip'];
    $nama_guru = $_POST['nama_guru'];
    $mapel = $_POST['mapel'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($koneksi, "UPDATE tb_guru SET

        nip='$nip',
        nama_guru='$nama_guru',
        mapel='$mapel',
        alamat='$alamat',
        no_hp='$no_hp'

        WHERE id='$id'
    ");

    header("Location: data_guru.php");

}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Guru</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

    <h2>Edit Data Guru</h2>

    <form method="POST">

        <div class="mb-3">

            <label>NIP</label>

            <input type="text"
                   name="nip"
                   class="form-control"
                   value="<?= $row['nip']; ?>">

        </div>

        <div class="mb-3">

            <label>Nama Guru</label>

            <input type="text"
                   name="nama_guru"
                   class="form-control"
                   value="<?= $row['nama_guru']; ?>">

        </div>

        <div class="mb-3">

            <label>Mata Pelajaran</label>

            <input type="text"
                   name="mapel"
                   class="form-control"
                   value="<?= $row['mapel']; ?>">

        </div>

        <div class="mb-3">

            <label>Alamat</label>

            <textarea name="alamat"
                      class="form-control"><?= $row['alamat']; ?></textarea>

        </div>

        <div class="mb-3">

            <label>No HP</label>

            <input type="text"
                   name="no_hp"
                   class="form-control"
                   value="<?= $row['no_hp']; ?>">

        </div>

        <button type="submit"
                name="submit"
                class="btn btn-primary">

            Update

        </button>

    </form>

</div>

</body>
</html>