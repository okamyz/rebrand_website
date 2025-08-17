<?php
include 'cek_login.php';
include '../koneksi.php';

// Proses Tambah Berita
if(isset($_POST['tambah'])){
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi_berita']);

    $query = "INSERT INTO berita (judul, isi_berita) VALUES ('$judul', '$isi')";
    mysqli_query($koneksi, $query);
    header("location:kelola_berita.php");
}

// Proses Edit Berita
if(isset($_POST['edit'])){
    $id = $_POST['id_berita'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi_berita']);

    $query = "UPDATE berita SET judul='$judul', isi_berita='$isi' WHERE id_berita='$id'";
    mysqli_query($koneksi, $query);
    header("location:kelola_berita.php");
}
?>