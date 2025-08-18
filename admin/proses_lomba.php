<?php
include 'cek_login.php'; 
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // LOGIKA TAMBAH DATA
    if (isset($_POST['tambah'])) {
        $judul = $_POST['judul_kegiatan'];
        $peserta = $_POST['daftar_peserta'];
        $youtube = $_POST['link_youtube'];
        $gdrive = $_POST['link_gdrive'];
        
        $foto_nama_asli = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $nama_file_unik = time() . '_' . $foto_nama_asli;
        $lokasi_upload = '../img/lomba/' . $nama_file_unik;
        
        if (move_uploaded_file($foto_tmp, $lokasi_upload)) {
            $path_foto_db = 'img/lomba/' . $nama_file_unik;

            $stmt = $koneksi->prepare("INSERT INTO lomba (judul_kegiatan, daftar_peserta, path_foto, link_youtube, link_gdrive) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $judul, $peserta, $path_foto_db, $youtube, $gdrive);
            $stmt->execute();
            header("Location: kelola_lomba.php?status=tambah_sukses");
        } else {
            header("Location: kelola_lomba.php?status=upload_gagal");
        }
    }

    // LOGIKA EDIT DATA
    if (isset($_POST['edit'])) {
        $id_lomba = $_POST['id_lomba'];
        $judul = $_POST['judul_kegiatan'];
        $peserta = $_POST['daftar_peserta'];
        $youtube = $_POST['link_youtube'];
        $gdrive = $_POST['link_gdrive'];
        $foto_lama = $_POST['foto_lama'];
        $path_foto_db = $foto_lama;

        if (!empty($_FILES['foto']['name'])) {
            $foto_nama_asli = $_FILES['foto']['name'];
            $foto_tmp = $_FILES['foto']['tmp_name'];
            $nama_file_unik = time() . '_' . $foto_nama_asli;
            $lokasi_upload = '../img/lomba/' . $nama_file_unik;
            
            if (move_uploaded_file($foto_tmp, $lokasi_upload)) {
                $path_foto_db = 'img/lomba/' . $nama_file_unik;
                if (file_exists('../' . $foto_lama)) {
                    unlink('../' . $foto_lama);
                }
            }
        }

        $stmt = $koneksi->prepare("UPDATE lomba SET judul_kegiatan=?, daftar_peserta=?, path_foto=?, link_youtube=?, link_gdrive=? WHERE id_lomba=?");
        $stmt->bind_param("sssssi", $judul, $peserta, $path_foto_db, $youtube, $gdrive, $id_lomba);
        $stmt->execute();
        header("Location: kelola_lomba.php?status=edit_sukses");
    }
}
?>