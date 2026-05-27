<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])) {

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $fotoLama = $row['foto'];

    $foto = $_FILES['foto']['name'];

if($foto != '') {

    $tmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp, 'upload/'.$foto);

} else {

    $foto = $fotoLama;

}

mysqli_query($koneksi,
"UPDATE tb_siswa SET

nis='$nis',
nama='$nama',
jk='$jk',
alamat='$alamat',
kelas='$kelas',
tanggal_lahir='$tanggal_lahir',
foto='$foto'

WHERE id='$id'
");

    header("Location: data_siswa.php");
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

    <h2>Edit Data Siswa</h2>

<form method="POST" enctype="multipart/form-data">
        <div class="mb-3">

            <label>NIS</label>

            <input type="text"
                   name="nis"
                   class="form-control"
                   value="<?= $row['nis']; ?>">

        </div>

        <div class="mb-3">

            <label>Nama</label>

            <input type="text"
                   name="nama"
                   class="form-control"
                   value="<?= $row['nama']; ?>">

        </div>

        <div class="mb-3">

            <label>Jenis Kelamin</label>

            <select name="jk" class="form-control">

                <option value="Laki-laki"
                <?= $row['jk'] == 'Laki-laki' ? 'selected' : ''; ?>>
                Laki-laki
                </option>

                <option value="Perempuan"
                <?= $row['jk'] == 'Perempuan' ? 'selected' : ''; ?>>
                Perempuan
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Alamat</label>

            <textarea name="alamat"
                      class="form-control"><?= $row['alamat']; ?></textarea>

        </div>

        <div class="mb-3">

            <label>Kelas</label>

            <input type="text"
                   name="kelas"
                   class="form-control"
                   value="<?= $row['kelas']; ?>">
        </div>
        <div class="mb-3">

    <label>Tanggal Lahir</label>

    <input type="date"
           name="tanggal_lahir"
           value="<?= $row['tanggal_lahir']; ?>"
           class="form-control">
</div>
<div class="mb-3">

    <label>Foto Lama</label>
    <br>

    <img src="upload/<?= $row['foto']; ?>"
         width="120"
         class="rounded shadow">

</div>

<div class="mb-3">

    <label>Ganti Foto</label>

    <input type="file"
           name="foto"
           class="form-control">

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