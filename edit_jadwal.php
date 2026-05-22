<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM tb_jadwal WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])) {

    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $mapel = $_POST['mapel'];
    $guru = $_POST['guru'];
    $kelas = $_POST['kelas'];

    mysqli_query($koneksi,
    "UPDATE tb_jadwal SET

    hari='$hari',
    jam='$jam',
    mapel='$mapel',
    guru='$guru',
    kelas='$kelas'

    WHERE id='$id'
    ");

    header("Location: jadwal.php");

}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Jadwal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

    <h2>Edit Jadwal</h2>

    <form method="POST">

        <div class="mb-3">

            <label>Hari</label>

            <select name="hari"
                    class="form-control">

                <option <?= $row['hari'] == 'Senin' ? 'selected' : ''; ?>>
                    Senin
                </option>

                <option <?= $row['hari'] == 'Selasa' ? 'selected' : ''; ?>>
                    Selasa
                </option>

                <option <?= $row['hari'] == 'Rabu' ? 'selected' : ''; ?>>
                    Rabu
                </option>

                <option <?= $row['hari'] == 'Kamis' ? 'selected' : ''; ?>>
                    Kamis
                </option>

                <option <?= $row['hari'] == 'Jumat' ? 'selected' : ''; ?>>
                    Jumat
                </option>

                <option <?= $row['hari'] == 'Sabtu' ? 'selected' : ''; ?>>
                    Sabtu
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Jam</label>

            <input type="text"
                   name="jam"
                   class="form-control"
                   value="<?= $row['jam']; ?>">

        </div>

        <div class="mb-3">

            <label>Mata Pelajaran</label>

            <input type="text"
                   name="mapel"
                   class="form-control"
                   value="<?= $row['mapel']; ?>">

        </div>

        <div class="mb-3">

            <label>Guru</label>

            <input type="text"
                   name="guru"
                   class="form-control"
                   value="<?= $row['guru']; ?>">

        </div>

        <div class="mb-3">

            <label>Kelas</label>

            <input type="text"
                   name="kelas"
                   class="form-control"
                   value="<?= $row['kelas']; ?>">

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