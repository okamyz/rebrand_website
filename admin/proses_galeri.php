<?php
include 'cek_login.php';
include '../koneksi.php';

if(isset($_POST['tambah'])){
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul_foto']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan_foto']);


    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $ukuran = $_FILES['gambar']['size'];
    $tipe = $_FILES['gambar']['type'];


    $lokasi = "../img/galeri/";
    $nama_file_baru = uniqid() . '-' . $gambar;


    $tipe_diizinkan = array('image/jpeg', 'image/png', 'image/jpg');
    if(in_array($tipe, $tipe_diizinkan)){
        if(move_uploaded_file($tmp, $lokasi . $nama_file_baru)){
            // Simpan ke database
            $query = "INSERT INTO galeri (judul_foto, keterangan_foto, nama_file_gambar) VALUES ('$judul', '$keterangan', '$nama_file_baru')";
            mysqli_query($koneksi, $query);
            header("location:kelola_galeri.php");
        } else {
            echo "Upload gambar gagal.";
        }
    } else {
        echo "Tipe file tidak diizinkan. Harap upload gambar (JPG/PNG).";
    }
}
?>