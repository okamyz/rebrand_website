<?php
session_start();
// Jika sudah login, redirect ke dashboard
if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
    header("location:dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="card shadow-sm login-card">

            <div class="card-body p-4">
                <a class="navbar-brand" href="#">
                    <img src="../img/logo.png" alt="logo sd" width="200" height="200" class="d-block mx-auto mb-3">

                </a>
                <h3 class="card-title text-center mb-4">Admin Login</h3>

                <?php

                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo '<div class="alert alert-danger" role="alert">Username atau password salah!</div>';
                    } else if ($_GET['pesan'] == "logout") {
                        echo '<div class="alert alert-success" role="alert">Anda telah berhasil logout.</div>';
                    } else if ($_GET['pesan'] == "belum_login") {
                        echo '<div class="alert alert-warning" role="alert">Anda harus login untuk mengakses halaman admin.</div>';
                    }
                }
                ?>

                <form action="proses_login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>