<?php


include 'koneksi.php';

$id = $_GET['id'];

// AMBIL DATA GURU
$dataGuru = mysqli_query($koneksi,
"SELECT * FROM tb_guru");

// AMBIL DATA KELAS
$dataKelas = mysqli_query($koneksi,
"SELECT * FROM tb_kelas");

$data = mysqli_query($koneksi,
"SELECT * FROM tb_jadwal WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])) {

    $hari = $_POST['hari'];
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];

$jam = $jam_mulai . " - " . $jam_selesai;

if($jam_selesai <= $jam_mulai) {
    echo "
    <script>
        alert('Jam selesai harus lebih besar!');
        window.location='edit_jadwal.php?id=$id';
    </script>
    ";
    exit;
}

    $mapel = $_POST['mapel'];
    $guru = $_POST['guru'];
    $kelas = $_POST['kelas'];

// CEK JADWAL BENTROK
$cek = mysqli_query($koneksi,
"SELECT * FROM tb_jadwal
WHERE hari='$hari'
AND jam='$jam'
AND (
    guru='$guru'
    OR kelas='$kelas'
)
AND id != '$id'
");

if(mysqli_num_rows($cek) > 0) {

    echo "
    <script>
        alert('Jadwal bentrok!');
        window.location='edit_jadwal.php?id=$id';
    </script>
    ";

    exit;
}

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

            <input type="time"
       name="jam_mulai"
       class="form-control"
       required>

<br>

<input type="time"
       name="jam_selesai"
       class="form-control"
       required>
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

            <select name="guru"
class="form-control"
required>

<?php while($g = mysqli_fetch_assoc($dataGuru)) : ?>

<option value="<?= $g['nama_guru']; ?>"

<?php
if($row['guru'] == $g['nama_guru']) {
    echo "selected";
}
?>

>

<?= $g['nama_guru']; ?>

</option>

<?php endwhile; ?>

</select>
        </div>

        <div class="mb-3">

            <label>Kelas</label>

            <select name="kelas"
class="form-control"
required>

<?php while($k = mysqli_fetch_assoc($dataKelas)) : ?>

<option value="<?= $k['nama_kelas']; ?>"

<?php
if($row['kelas'] == $k['nama_kelas']) {
    echo "selected";
}
?>

>

<?= $k['nama_kelas']; ?>

</option>

<?php endwhile; ?>

</select>
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