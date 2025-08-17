<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    
    $nama = mysqli_real_escape_string($koneksi, $_POST['name']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $kontak = mysqli_real_escape_string($koneksi, $_POST['contact_no']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['description']);

    // query  memasukkan data
    $query = "INSERT INTO pengaduan (nama, email, nomor_kontak, deskripsi) VALUES ('$nama', '$email', '$kontak', '$deskripsi')";

    // Eksekusi 
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil
        echo "<script>alert('Pengaduan berhasil dikirim. Terima kasih!'); window.location.href='pengaduan.php';</script>";
    } else {
        // Jika gagal
        echo "<script>alert('Terjadi kesalahan. Silakan coba lagi.'); window.location.href='pengaduan.php';</script>";
    }
} else {
    // Jika file diakses langsung tanpa submit, kembalikan ke halaman pengaduan
    header('Location: pengaduan.php');
}
?>