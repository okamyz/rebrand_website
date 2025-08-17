<?php
// Aktifkan session
session_start();

// Hubungkan ke database (perhatikan path '../')
include '../koneksi.php';

// Tangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari user berdasarkan username
$query = "SELECT * FROM admin WHERE username='$username'";
$result = mysqli_query($koneksi, $query);

// Cek jumlah user yang ditemukan
$cek = mysqli_num_rows($result);

if($cek > 0){
    $data = mysqli_fetch_assoc($result);
    
    // Verifikasi password yang diinput dengan hash di database
    if (password_verify($password, $data['password'])) {
        // Jika password cocok, buat session
        $_SESSION['id_admin'] = $data['id_admin'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        $_SESSION['status'] = "login";
        
        // Arahkan ke halaman dashboard
        header("location:dashboard.php");
    } else {
        // Jika password tidak cocok
        header("location:login.php?pesan=gagal");
    }
} else {
    // Jika username tidak ditemukan
    header("location:login.php?pesan=gagal");
}
?>