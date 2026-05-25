<?php
session_start();

if(!isset($_SESSION['login'])) {

    header("Location: login.php");

    exit;

}

include 'koneksi.php';

$keyword = "";

if(isset($_GET['cari'])) {

    $keyword = $_GET['cari'];

    $data = mysqli_query($koneksi, "
        SELECT * FROM tb_guru
        WHERE
        nama LIKE '%$keyword%'
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
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body class="bg-light">

<div class="d-flex">

    <?php include 'sidebar.php'; ?>

    <div class="container-fluid p-4">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h2 class="fw-bold">
                        Data Guru
                    </h2>

                    <a href="tambah_guru.php"
                       class="btn btn-primary rounded-3">
                       + Tambah Guru
                    </a>

                </div>

                <!-- SEARCH -->
                <form method="GET" class="mb-4">

<div class="input-group shadow-sm" style="max-width:400px;">
        <span class="input-group-text bg-white border-0">

            <i class="bi bi-search text-primary"></i>

        </span>

        <input type="text"
               name="cari"
               class="form-control border-0"
               placeholder="Cari data siswa..."
               value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">

        <button type="submit"
                class="btn btn-primary">

            Cari

        </button>

        <a href="data_guru.php"
           class="btn btn-secondary">

           Reset

        </a>

    </div>

</form>

                <!-- TABLE -->
                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-dark">

                            <tr>

                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Guru</th>
                                <th>Mata Pelajaran</th>
                                <th>No HP</th>
                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php $no = 1; ?>

                        <?php while($row = mysqli_fetch_assoc($data)) : ?>

                        <tr>

                            <td><?= $no++; ?></td>
                            <td><img src="upload/<?= $row['foto']; ?>"
                                      width="70"
                                     class="rounded">
                                                        </td>

                            <td><?= $row['nama_guru']; ?></td>

                            <td><?= $row['mapel']; ?></td>

                            <td><?= $row['no_hp']; ?></td>

                            <td>

                                <a href="edit_guru.php?id=<?= $row['id']; ?>"
                                   class="btn btn-warning btn-sm rounded-3">
                                   Edit
                                </a>

                                <a href="hapus_guru.php?id=<?= $row['id']; ?>"
                                   class="btn btn-danger btn-sm rounded-3"
                                   onclick="return confirm('Yakin ingin hapus data guru ini?')">
                                   Hapus
                                </a>

                            </td>

                        </tr>

                        <?php endwhile; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>