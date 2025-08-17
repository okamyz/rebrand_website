<?php 
include 'cek_login.php'; 
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php include 'admin_navbar.php'; ?>
    <div class="container mt-4">
        <h2>Kelola Galeri</h2>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahGaleriModal">
            Tambah Foto Baru
        </button>
        
        <div class="row">
            <?php
                $query = "SELECT * FROM galeri ORDER BY id_foto DESC";
                $result = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../img/galeri/<?php echo $data['nama_file_gambar']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($data['judul_foto']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($data['keterangan_foto']); ?></p>
                        <a href="hapus_galeri.php?id=<?php echo $data['id_foto']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus foto ini?')">Hapus</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="modal fade" id="tambahGaleriModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Foto Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="proses_galeri.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul_foto" class="form-label">Judul Foto</label>
                    <input type="text" class="form-control" id="judul_foto" name="judul_foto" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan_foto" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan_foto" name="keterangan_foto" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Pilih Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="gambar" required>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>