<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
    header("Location: dashboard.php");
    exit; 
} else {
    // Jika BELUM login, arahkan ke halaman login
    header("Location: login.php");
    exit; 
}
?>