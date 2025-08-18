<?php 
include 'cek_login.php'; 
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Lomba</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'admin_navbar.php'; ?>

    <div class="container mt-4">
        <h2>Kelola Data Lomba</h2>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahLombaModal">
            <i class="fas fa-plus"></i> Tambah Lomba Baru
        </button>
        
        <table class="table table-bordered table-striped table-hover">
          <thead class="table-dark">
              <tr>
                  <th>#</th>
                  <th>Judul Kegiatan</th>
                  <th>Peserta</th>
                  <th style="width: 15%;">Aksi</th>
              </tr>
          </thead>
          <tbody>
            <?php
                // Query menjadi lebih sederhana, tidak perlu JOIN
                $query = "SELECT * FROM lomba ORDER BY id_lomba DESC";
                $result = mysqli_query($koneksi, $query);
                $no = 1;
                while($data = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($data['judul_kegiatan']); ?></td>
                <td><?php echo nl2br(htmlspecialchars($data['daftar_peserta'])); ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal"
                    data-bs-target="#editLombaModal" 
                    data-id="<?php echo $data['id_lomba']; ?>"
                    data-judul="<?php echo htmlspecialchars($data['judul_kegiatan']); ?>"
                    data-peserta="<?php echo htmlspecialchars($data['daftar_peserta']); ?>"
                    data-foto="<?php echo htmlspecialchars($data['path_foto']); ?>"
                    data-youtube="<?php echo htmlspecialchars($data['link_youtube']); ?>"
                    data-gdrive="<?php echo htmlspecialchars($data['link_gdrive']); ?>">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <a href="hapus_lomba.php?id=<?php echo $data['id_lomba']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
    </div>

    <div class="modal fade" id="tambahLombaModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header"><h5 class="modal-title">Tambah Lomba Baru</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
          <div class="modal-body">
            <form action="proses_lomba.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Judul Kegiatan</label>
                    <input type="text" class="form-control" name="judul_kegiatan" required>
                </div>
                <div class="mb-3">
                    <label>Nama Peserta</label>
                    <textarea class="form-control" name="daftar_peserta" rows="4" placeholder="Pisahkan setiap nama dengan baris baru (Enter)"></textarea>
                </div>
                <div class="mb-3">
                    <label>Foto Kegiatan</label>
                    <input class="form-control" type="file" name="foto" required>
                </div>
                <div class="mb-3">
                    <label>Link YouTube (Embed)</label>
                    <input type="text" class="form-control" name="link_youtube">
                </div>
                <div class="mb-3">
                    <label>Link Google Drive</label>
                    <input type="text" class="form-control" name="link_gdrive">
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

    <div class="modal fade" id="editLombaModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header"><h5 class="modal-title">Edit Data Lomba</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
          <div class="modal-body">
            <form action="proses_lomba.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_lomba" id="edit-id">
                <input type="hidden" name="foto_lama" id="edit-foto-lama">
                <div class="mb-3">
                    <label>Judul Kegiatan</label>
                    <input type="text" class="form-control" id="edit-judul" name="judul_kegiatan" required>
                </div>
                <div class="mb-3">
                    <label>Nama Peserta</label>
                    <textarea class="form-control" id="edit-peserta" name="daftar_peserta" rows="4" placeholder="Pisahkan setiap nama dengan baris baru (Enter)"></textarea>
                </div>
                <div class="mb-3">
                    <label>Ganti Foto (opsional)</label>
                    <input type="file" class="form-control" name="foto">
                </div>
                <div class="mb-3">
                    <label>Link YouTube (Embed)</label>
                    <input type="text" class="form-control" id="edit-youtube" name="link_youtube">
                </div>
                <div class="mb-3">
                    <label>Link Google Drive</label>
                    <input type="text" class="form-control" id="edit-gdrive" name="link_gdrive">
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" name="edit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    // Script untuk mengisi modal edit
    document.addEventListener('DOMContentLoaded', function () {
        var editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                document.getElementById('edit-id').value = this.getAttribute('data-id');
                document.getElementById('edit-judul').value = this.getAttribute('data-judul');
                document.getElementById('edit-peserta').value = this.getAttribute('data-peserta');
                document.getElementById('edit-foto-lama').value = this.getAttribute('data-foto');
                document.getElementById('edit-youtube').value = this.getAttribute('data-youtube');
                document.getElementById('edit-gdrive').value = this.getAttribute('data-gdrive');
            });
        });
    });
    </script>
</body>
</html>