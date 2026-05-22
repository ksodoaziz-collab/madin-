<?php

include 'koneksi.php';

$data = mysqli_query($koneksi,
"SELECT * FROM tb_jadwal");

?>

<!DOCTYPE html>
<html>
<head>

    <title>Jadwal Pelajaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

<div class="d-flex">

<?php include 'sidebar.php'; ?>

<div class="container p-4">

    <h2 class="mb-4">
        Jadwal Pelajaran
    </h2>

    <a href="tambah_jadwal.php"
       class="btn btn-primary mb-3">

       Tambah Jadwal

    </a>

    <table class="table table-bordered table-striped">

        <tr>

            <th>No</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Mapel</th>
            <th>Guru</th>
            <th>Kelas</th>
            <th>Aksi</th>

        </tr>

        <?php $no = 1; ?>

        <?php while($row = mysqli_fetch_assoc($data)) : ?>

        <tr>

            <td><?= $no++; ?></td>

            <td><?= $row['hari']; ?></td>

            <td><?= $row['jam']; ?></td>

            <td><?= $row['mapel']; ?></td>

            <td><?= $row['guru']; ?></td>

            <td><?= $row['kelas']; ?></td>

            <td>
    <a href="edit_jadwal.php?id=<?= $row['id']; ?>"
       class="btn btn-warning btn-sm">
       Edit
    </a>
    <a href="hapus_jadwal.php?id=<?= $row['id']; ?>"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Yakin?')">
       Hapus
    </a>
</td>

        </tr>

        <?php endwhile; ?>

    </table>

</div>

</div>

</body>
</html>