<?php

include 'koneksi.php';

$keyword = "";

if(isset($_GET['cari'])) {

    $keyword = $_GET['cari'];

    $data = mysqli_query($koneksi, "
        SELECT * FROM tb_siswa
        WHERE
        nama LIKE '%$keyword%'
        OR nis LIKE '%$keyword%'
        OR kelas LIKE '%$keyword%'
    ");

} else {

    $data = mysqli_query($koneksi,
    "SELECT * FROM tb_siswa");

}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Data Siswa</title>

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
                        Data Siswa
                    </h2>

                    <a href="tambah.php"
                       class="btn btn-primary rounded-3">
                       + Tambah Data
                    </a>

                </div>

                <!-- SEARCH -->
                <form method="GET" class="row g-2 mb-4">

                    <div class="col-md-4">

                        <input type="text"
                               name="cari"
                               class="form-control rounded-3"
                               placeholder="Cari nama / NIS / kelas"
                               value="<?= $keyword; ?>">

                    </div>

                    <div class="col-auto">

                        <button type="submit"
                                class="btn btn-success rounded-3">
                            Cari
                        </button>

                        <a href="data_siswa.php"
                           class="btn btn-secondary rounded-3">
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
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>JK</th>
                                <th>Alamat</th>
                                <th>Kelas</th>
                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php $no = 1; ?>

                        <?php while($row = mysqli_fetch_assoc($data)) : ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td>
                                <img src="upload/<?= $row['foto']; ?>"
                                     width="70"
                                     class="rounded">
                            </td>

                            <td><?= $row['nis']; ?></td>

                            <td><?= $row['nama']; ?></td>

                            <td><?= $row['jk']; ?></td>

                            <td><?= $row['alamat']; ?></td>

                            <td><?= $row['kelas']; ?></td>

                            <td>

                                <a href="edit.php?id=<?= $row['id']; ?>"
                                   class="btn btn-warning btn-sm rounded-3">
                                   Edit
                                </a>

                                <a href="hapus.php?id=<?= $row['id']; ?>"
                                   class="btn btn-danger btn-sm rounded-3"
                                   onclick="return confirm('Yakin ingin hapus data ini?')">
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