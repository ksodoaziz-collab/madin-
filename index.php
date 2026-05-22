<?php
include 'koneksi.php';

$keyword = "";

if(isset($_POST['cari'])) {

    $keyword = $_POST['keyword'];

    $data = mysqli_query($koneksi, "SELECT * FROM tb_siswa
    WHERE

    nama LIKE '%$keyword%'
    OR nis LIKE '%$keyword%'
    OR kelas LIKE '%$keyword%'
    ");

} else {

    $data = mysqli_query($koneksi, "SELECT * FROM tb_siswa");

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa Madin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="d-flex">
<?php include 'sidebar.php'; ?>
<div class="container mt-4">
<div class="container mt-5">

    <h2 class="mb-4">Data Siswa Madin</h2>

    <a href="tambah.php" class="btn btn-primary mb-3">
        Tambah Data
    </a>
    <form method="POST" class="mb-3">
    <div class="row">
        <div class="col-md-4">
            <input type="text"
                   name="keyword"
                   class="form-control"
                   placeholder="Cari nama, NIS, kelas..."
                   value="<?= $keyword; ?>">
        </div>
        <div class="col-md-2">
            <button type="submit"
                    name="cari"
                    class="btn btn-success">
                Cari
            </button>
            <a href="index.php"
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
            <th>NIS</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Alamat</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>

        <?php if(mysqli_num_rows($data) > 0) : ?>

        <?php while($row = mysqli_fetch_assoc($data)) : ?>

        <tr>

            <td><?= $no++; ?></td>

            <td>
                <img src="upload/<?= $row['foto']; ?>" width="80">
            </td>

            <td><?= $row['nis']; ?></td>

            <td><?= $row['nama']; ?></td>

            <td><?= $row['jk']; ?></td>

            <td><?= $row['alamat']; ?></td>

            <td><?= $row['kelas']; ?></td>

            <td>

                <a href="edit.php?id=<?= $row['id']; ?>"
                   class="btn btn-warning btn-sm">
                   Edit
                </a>

                <a href="hapus.php?id=<?= $row['id']; ?>"
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
        Data tidak ditemukan
    </td>
</tr>
<?php endif; ?>

    </table>

</div>
</div>

</div>

</body>
</html>