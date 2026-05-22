<?php
include 'koneksi.php';

$keyword = "";

if(isset($_POST['cari'])) {

    $keyword = $_POST['keyword'];

    $data = mysqli_query($koneksi,
    "SELECT * FROM tb_guru

    WHERE

    nama_guru LIKE '%$keyword%'
    OR nip LIKE '%$keyword%'
    OR mapel LIKE '%$keyword%'
    ");

} else {

    $data = mysqli_query($koneksi,
    "SELECT * FROM tb_guru");

}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Data Guru</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="d-flex">
<?php include 'sidebar.php'; ?>
<div class="container mt-4">
<div class="container mt-5">
    <h2 class="mb-4">Data Guru Madin</h2>
    <a href="tambah_guru.php"
       class="btn btn-primary mb-3">
       Tambah Guru
    </a>
    <form method="POST" class="mb-3">
    <div class="row">
        <div class="col-md-4">
            <input type="text"
                   name="keyword"
                   class="form-control"
                   placeholder="Cari nama guru, NIP, mapel..."
                   value="<?= $keyword; ?>">
        </div>
        <div class="col-md-3">
            <button type="submit"
                    name="cari"
                    class="btn btn-success">
                Cari
            </button>
            <a href="data_guru.php"
               class="btn btn-secondary">
               Reset
            </a>
        </div>
    </div>
</form>

    <table class="table table-bordered table-striped">

        <tr>

            <th>No</th>
            <th>Foto</th>
            <th>NIP</th>
            <th>Nama Guru</th>
            <th>Mapel</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>

        </tr>

        <?php $no = 1; ?>
        <?php if(mysqli_num_rows($data) > 0) : ?>

        <?php while($row = mysqli_fetch_assoc($data)) : ?>

        <tr>

            <td><?= $no++; ?></td>

            <td>

                <img src="upload/<?= $row['foto']; ?>"
                     width="80">

            </td>

            <td><?= $row['nip']; ?></td>

            <td><?= $row['nama_guru']; ?></td>

            <td><?= $row['mapel']; ?></td>

            <td><?= $row['alamat']; ?></td>

            <td><?= $row['no_hp']; ?></td>

            <td>

                <a href="edit_guru.php?id=<?= $row['id']; ?>"
                   class="btn btn-warning btn-sm">

                   Edit

                </a>

                <a href="hapus_guru.php?id=<?= $row['id']; ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin?')">

                   Hapus

                </a>

            </td>

        </tr>

        <?php endwhile; ?>
        <?php else : ?>
<tr>
    <td colspan="8" class="text-center">
        Data guru tidak ditemukan
    </td>
</tr>
<?php endif; ?>

    </table>

</div>
</div>
</div>
</body>
</html>