<?php


include 'koneksi.php';

// AMBIL DATA GURU
$guru = mysqli_query($koneksi,
"SELECT * FROM tb_guru");

// AMBIL DATA KELAS
$dataKelas = mysqli_query($koneksi,
"SELECT * FROM tb_kelas");

if(isset($_POST['submit'])) {

    $hari = $_POST['hari'];
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];
$jam = $jam_mulai . " - " . $jam_selesai;
if($jam_selesai <= $jam_mulai) {
    echo "
    <script>
        alert('Jam selesai harus lebih besar dari jam mulai!');
        window.location='tambah_jadwal.php';
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
)");

if(mysqli_num_rows($cek) > 0) {

    echo "
    <script>
        alert('Jadwal bentrok!');
        window.location='tambah_jadwal.php';
    </script>
    ";

    exit;
}

// INSERT DATA
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
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Guru</label>

            <select name="guru"
            class="form-control"
                    required>

    <option value="">
        -- Pilih Guru --
    </option>

    <?php while($g = mysqli_fetch_assoc($guru)) : ?>

        <option value="<?= $g['nama_guru']; ?>">

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

        <option value="">
            -- Pilih Kelas --
        </option>

        <?php while($k = mysqli_fetch_assoc($dataKelas)) : ?>

            <option value="<?= $k['nama_kelas']; ?>">

                <?= $k['nama_kelas']; ?>

            </option>

        <?php endwhile; ?>

    </select>

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