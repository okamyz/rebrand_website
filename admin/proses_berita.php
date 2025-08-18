<?php
include 'cek_login.php';
include '../koneksi.php';

// Proses Tambah Berita
if (isset($_POST['tambah'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi   = mysqli_real_escape_string($koneksi, $_POST['isi_berita']);

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    if (!empty($gambar)) {
        $nama_baru = time() . "_" . preg_replace("/[^a-zA-Z0-9\.\-_]/", "", $gambar);
        move_uploaded_file($tmp, '../img/berita/' . $nama_baru);
    } else {
        $nama_baru = "";
    }

    $query = "INSERT INTO berita (judul, isi_berita, gambar_berita) VALUES ('$judul', '$isi', '$nama_baru')";
    mysqli_query($koneksi, $query);
    header("location:kelola_berita.php");
    exit;
}

// Proses Edit Berita
if (isset($_POST['edit'])) {
    $id    = $_POST['id_berita'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi   = mysqli_real_escape_string($koneksi, $_POST['isi_berita']);
    $gambar_lama = $_POST['gambar_lama']; // hidden input dari form

    $gambar_baru = $_FILES['gambar_berita']['name'];
    $tmp         = $_FILES['gambar_berita']['tmp_name'];

    if (!empty($gambar_baru)) {
        // buat nama file baru biar unik
        $nama_baru = time() . "_" . preg_replace("/[^a-zA-Z0-9\.\-_]/", "", $gambar_baru);
        move_uploaded_file($tmp, '../img/berita/' . $nama_baru);

        // hapus file lama kalau ada
        if (!empty($gambar_lama) && file_exists("../img/berita/" . $gambar_lama)) {
            unlink("../img/berita/" . $gambar_lama);
        }
    } else {
        // tidak upload gambar baru, pakai yang lama
        $nama_baru = $gambar_lama;
    }

    $query = "UPDATE berita SET judul='$judul', isi_berita='$isi', gambar_berita='$nama_baru' WHERE id_berita='$id'";
    mysqli_query($koneksi, $query);
    header("location:kelola_berita.php");
    exit;
}
?>
