<?php
include 'koneksi.php';

$total_siswa = mysqli_num_rows(
mysqli_query($koneksi, "SELECT * FROM tb_siswa")
);

$total_guru = mysqli_num_rows(
mysqli_query($koneksi, "SELECT * FROM tb_guru")
);
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background: #f5f6fa;
}

.card-dashboard{
    border: none;
    border-radius: 15px;
}

</style>

</head>

<body>

<div class="d-flex">

<?php include 'sidebar.php'; ?>

<div class="container p-4">

    <h1 class="mb-4">
        Dashboard Admin
    </h1>

    <div class="row">

        <div class="col-md-4">

            <div class="card bg-primary text-white shadow card-dashboard">

                <div class="card-body">

                    <h5>Total Siswa</h5>

                    <h1><?= $total_siswa; ?></h1>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card bg-success text-white shadow card-dashboard">

                <div class="card-body">

                    <h5>Total Guru</h5>

                    <h1><?= $total_guru; ?></h1>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

</body>
</html>