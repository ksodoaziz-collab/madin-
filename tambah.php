<?php
include 'koneksi.php';

if(isset($_POST['submit'])) {

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];

    $namaFile = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp, 'upload/' . $namaFile);

    mysqli_query($koneksi, "INSERT INTO tb_siswa
    VALUES(
    NULL,
    '$nis',
    '$nama',
    '$jk',
    '$alamat',
    '$kelas',
    '$namaFile'
)");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Tambah Data Siswa</h2>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>

            <select name="jk" class="form-control">
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>

            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Kelas</label>

            <input type="text" name="kelas" class="form-control">
        </div>

        <div class="mb-3">
            <label>Foto</label>

            <input type="file" name="foto" class="form-control">
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