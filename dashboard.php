<?php

include 'koneksi.php';

// TOTAL SISWA
$siswa = mysqli_query($koneksi,
"SELECT * FROM tb_siswa");

$total_siswa = mysqli_num_rows($siswa);

// TOTAL GURU
$guru = mysqli_query($koneksi,
"SELECT * FROM tb_guru");

$total_guru = mysqli_num_rows($guru);

// TOTAL JADWAL
$jadwal = mysqli_query($koneksi,
"SELECT * FROM tb_jadwal");

$total_jadwal = mysqli_num_rows($jadwal);
$queryChart = mysqli_query($koneksi,
"SELECT kelas, COUNT(*) as jumlah
FROM tb_siswa
GROUP BY kelas");

$kelas = [];
$jumlah = [];

while($chart = mysqli_fetch_assoc($queryChart)) {

    $kelas[] = $chart['kelas'];
    $jumlah[] = $chart['jumlah'];

}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
.hover-card {
    transition: 0.3s ease;
}
.hover-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}
</style>
</head>

<body class="bg-light">

<div class="d-flex">

    <!-- SIDEBAR -->
    <?php include 'sidebar.php'; ?>

    <!-- CONTENT -->
<div class="container-fluid p-4 bg-light min-vh-100">
        <!-- JUDUL -->
        <h2 class="fw-bold mb-4">
            Dashboard Madin
        </h2>

        <!-- CARD -->
       <div class="row g-4 mb-4">

    <!-- TOTAL SISWA -->
    <div class="col-md-4">

<div class="card hover-card bg-primary text-white border-0 shadow-lg rounded-4 h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h6 class="fw-light mb-2">
                            Total Siswa
                        </h6>

                        <h1 class="fw-bold">
                            <?= $total_siswa; ?>
                        </h1>

                    </div>

                    <i class="bi bi-people-fill text-white"
                       style="font-size:60px;">
                    </i>

                </div>

            </div>

        </div>

    </div>

    <!-- TOTAL GURU -->
    <div class="col-md-4">

<div class="card hover-card bg-success text-white border-0 shadow-lg rounded-4 h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h6 class="fw-light mb-2">
                            Total Guru
                        </h6>

                        <h1 class="fw-bold">
                            <?= $total_guru; ?>
                        </h1>

                    </div>

                    <i class="bi bi-person-badge-fill text-white"
                       style="font-size:60px;">
                    </i>

                </div>

            </div>

        </div>

    </div>

    <!-- TOTAL JADWAL -->
    <div class="col-md-4">

<div class="card hover-card bg-warning text-dark border-0 shadow-lg rounded-4 h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h6 class="fw-light mb-2">
                            Total Jadwal
                        </h6>

                        <h1 class="fw-bold">
                            <?= $total_jadwal; ?>
                        </h1>

                    </div>

                    <i class="bi bi-calendar-week-fill text-dark"
                       style="font-size:60px;">
                    </i>

                </div>

            </div>

        </div>

    </div>

</div>
        <!-- GRAFIK -->
<div class="card border-0 shadow rounded-4 mt-4">
    <div class="card-body">
        <h4 class="fw-bold mb-4">
            Grafik Siswa Per Kelas
        </h4>
<div style="max-width: 450px; height: 300px; margin:auto;">

    <canvas id="chartSiswa"></canvas>

</div>
    <hr>

<h4 class="fw-bold mt-4 mb-4">
    Persentase Siswa
</h4>

<div style="max-width: 450px; height: 300px; margin:auto;">
    <canvas id="pieChart"></canvas>
</div>
    <!-- SISWA TERBARU -->
<div class="card border-0 shadow rounded-4 mt-4">

    <div class="card-body">

        <h4 class="fw-bold mb-4">
            Siswa Terbaru
        </h4>

        <table class="table table-hover align-middle">

            <tr>

                <th>Nama</th>
                <th>Kelas</th>

            </tr>

            <?php

            $siswaBaru = mysqli_query($koneksi,
            "SELECT * FROM tb_siswa
            ORDER BY id DESC
            LIMIT 5");

            while($s = mysqli_fetch_assoc($siswaBaru)) :

            ?>

            <tr>

                <td><?= $s['nama']; ?></td>

                <td><?= $s['kelas']; ?></td>

            </tr>

            <?php endwhile; ?>

        </table>

    </div>

</div>
        <!-- WELCOME -->
        <div class="card border-0 shadow rounded-4 mt-4">

            <div class="card-body">

                <h4 class="fw-bold">
                    Selamat Datang 👋
                </h4>

                <p class="text-secondary">
                    Sistem Informasi Madrasah Diniyah
                </p>

            </div>

        </div>

    </div>

</div>
<script>

const ctx = document.getElementById('chartSiswa');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: <?= json_encode($kelas); ?>,

        datasets: [{

            label: 'Jumlah Siswa',

            data: <?= json_encode($jumlah); ?>,

            borderWidth: 1

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        scales: {

            y: {

                beginAtZero: true

            }

        }

    }

});

const pie = document.getElementById('pieChart');

new Chart(pie, {

    type: 'pie',

    data: {

        labels: <?= json_encode($kelas); ?>,

        datasets: [{

            label: 'Persentase Siswa',

            data: <?= json_encode($jumlah); ?>,

            borderWidth: 1

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false

    }

});

</script>
</body>
</html>