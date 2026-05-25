<style>

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
}

.sidebar a:hover{
    background: #0d6efd;
}

</style>

<div class="bg-dark text-white p-3"
     style="width:250px; min-height:100vh;">

    <h3 class="text-center mb-4 fw-bold">
        MADIN APP
    </h3>

    <ul class="nav flex-column gap-2">

        <li class="nav-item">

            <a href="dashboard.php"
               class="nav-link text-white sidebar-link">

               <i class="bi bi-speedometer2 me-2"></i>
               Dashboard

            </a>

        </li>

        <li class="nav-item">

            <a href="data_siswa.php"
               class="nav-link text-white sidebar-link">

               <i class="bi bi-people-fill me-2"></i>
               Data Siswa

            </a>

        </li>

        <li class="nav-item">

            <a href="data_guru.php"
               class="nav-link text-white sidebar-link">

               <i class="bi bi-person-badge-fill me-2"></i>
               Data Guru

            </a>

        </li>

        <li class="nav-item">

            <a href="jadwal.php"
               class="nav-link text-white sidebar-link">

               <i class="bi bi-calendar-week-fill me-2"></i>
               Jadwal

            </a>

        </li>

    </ul>
    <hr class="text-secondary">

<a href="logout.php"
   class="btn btn-danger w-100 rounded-3">

   <i class="bi bi-box-arrow-right me-2"></i>
   Logout

</a>

</div>
<style>

.sidebar-link {

    border-radius: 10px;

    transition: 0.3s;

}

.sidebar-link:hover {

    background: #0d6efd;

    padding-left: 10px;

}

</style>