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

    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: #f5f6fa;
        }

        .sidebar{
            width: 250px;
            min-height: 100vh;
            background: #212529;
        }

        .sidebar a{
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
            transition: 0.3s;
        }

        .sidebar a:hover{
            background: #0d6efd;
        }

        .card-dashboard{
            border: none;
            border-radius: 15px;
        }

    </style>

</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR -->

    <div class="sidebar">

        <h3 class="text-white text-center py-4">
            MADIN APP
        </h3>

        <a href="dashboard.php">
            Dashboard
        </a>

        <a href="index.php">
            Data Siswa
        </a>

        <a href="data_guru.php">
            Data Guru
        </a>

    </div>

    <!-- CONTENT -->

    <div class="container p-4">

        <h2 class="mb-4">
            Dashboard Admin
        </h2>

        <div class="row">

            <!-- TOTAL SISWA -->

            <div class="col-md-4 mb-4">

                <div class="card card-dashboard shadow bg-primary text-white">

                    <div class="card-body">

                        <h5>Total Siswa</h5>

                        <h1><?= $total_siswa; ?></h1>

                    </div>

                </div>

            </div>

            <!-- TOTAL GURU -->

            <div class="col-md-4 mb-4">

                <div class="card card-dashboard shadow bg-success text-white">

                    <div class="card-body">

                        <h5>Total Guru</h5>

                        <h1><?= $total_guru; ?></h1>

                    </div>

                </div>

            </div>

        </div>

        <!-- WELCOME -->

        <div class="card shadow">

            <div class="card-body">

                <h4>
                    Selamat Datang di Aplikasi Madin
                </h4>

                <p>
                    Kelola data siswa dan guru dengan mudah menggunakan sistem ini.
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>