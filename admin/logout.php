<?php
// Aktifkan session
session_start();

// Hapus semua variabel session
$_SESSION = array();

// Hancurkan session
session_destroy();

// Arahkan kembali ke halaman login dengan pesan
header("location:login.php?pesan=logout");
?>