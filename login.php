<?php

session_start();
include 'koneksi.php';

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($koneksi,
    "SELECT * FROM tb_user
    WHERE username='$username'
    AND password='$password'");

    $cek = mysqli_num_rows($data);

    if($cek > 0) {

        $_SESSION['login'] = true;

        header("Location: dashboard.php");

    } else {

        echo "
        <script>
        alert('Username atau Password salah!');
        </script>
        ";

    }

}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card shadow border-0 rounded-4 mt-5">

                <div class="card-body p-4">

                    <h3 class="text-center fw-bold mb-4">
                        Login MADIN
                    </h3>

                    <form method="POST">

                        <div class="mb-3">

                            <label>Username</label>

                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>Password</label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>

                        </div>

                        <button type="submit"
                                name="login"
                                class="btn btn-primary w-100">

                            Login

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>