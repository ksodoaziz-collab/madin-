<?php

include 'koneksi.php';

if(isset($_POST['submit'])) {

    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $mapel = $_POST['mapel'];
    $guru = $_POST['guru'];
    $kelas = $_POST['kelas'];

    mysqli_query($koneksi,
    "INSERT INTO tb_jadwal
    VALUES(
    NULL,
    '$hari',
    '$jam',
    '$mapel',
    '$guru',
    '$kelas'
    )");

    header("Location: jadwal.php");

}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Tambah Jadwal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

    <h2>Tambah Jadwal</h2>

    <form method="POST">

        <div class="mb-3">

            <label>Hari</label>

            <select name="hari"
                    class="form-control">

                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>

            </select>

        </div>

        <div class="mb-3">

            <label>Jam</label>

            <input type="text"
                   name="jam"
                   class="form-control"
                   placeholder="07:00 - 08:00">

        </div>

        <div class="mb-3">

            <label>Mata Pelajaran</label>

            <input type="text"
                   name="mapel"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Guru</label>

            <input type="text"
                   name="guru"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Kelas</label>

            <input type="text"
                   name="kelas"
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