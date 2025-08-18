<?php 
include 'cek_login.php'; 
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php include 'admin_navbar.php'; ?>

    <div class="container mt-4">
        <h2>Kelola Berita</h2>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahBeritaModal">
            Tambah Berita Baru
        </button>
        
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
              <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Isi Berita</th>
                  <th>Gambar Berita</th>
                  <th>Tanggal Publikasi</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
            <?php
                $query = "SELECT * FROM berita ORDER BY tanggal_publikasi DESC";
                $result = mysqli_query($koneksi, $query);
                $no = 1;
                while($data = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($data['judul']); ?></td>
                <td><?php echo nl2br(htmlspecialchars(substr($data['isi_berita'], 0, 100))) . '...'; ?></td>
                <td>
                    <?php if(!empty($data['gambar_berita'])) { ?>
                      <img src="../img/berita/<?php echo $data['gambar_berita']; ?>" alt="Gambar Berita" width="120" class="img-thumbnail">
                    <?php } else { ?>
                      <span class="text-muted">Tidak ada gambar</span>
                    <?php } ?>
                </td>
                <td><?php echo date('d M Y, H:i', strtotime($data['tanggal_publikasi'])); ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal"
                    data-bs-target="#editBeritaModal" data-id="<?php echo $data['id_berita']; ?>" data-judul="<?php echo htmlspecialchars($data['judul']); ?>" data-isi="<?php echo htmlspecialchars($data['isi_berita']); ?>" data-gambar="<?php echo $data['gambar_berita']; ?>">Edit</button>
                    
                    <a href="hapus_berita.php?id=<?php echo $data['id_berita']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</a>
                </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
    </div>

        <!-- Modal Tambah -->
    <div class="modal fade" id="tambahBeritaModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Berita Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- WAJIB pakai enctype -->
            <form action="proses_berita.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="isi_berita" class="form-label">Isi Berita</label>
                    <textarea class="form-control" id="isi_berita" name="isi_berita" rows="10" required></textarea>
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

    <!-- Modal Edit -->
    <div class="modal fade" id="editBeritaModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Berita</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- WAJIB pakai enctype -->
            <form action="proses_berita.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_berita" id="edit-id">
                <input type="hidden" name="gambar_lama" id="edit-gambar-lama">

                <div class="mb-3">
                    <label for="edit-judul" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="edit-judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="edit-isi" class="form-label">Isi Berita</label>
                    <textarea class="form-control" id="edit-isi" name="isi_berita" rows="10" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="edit-gambar" class="form-label">Gambar Berita (opsional)</label>
                  <input type="file" class="form-control" id="edit-gambar" name="gambar_berita">
                  <div class="mt-2">
                      <img id="preview-gambar" src="" alt="Preview Gambar" width="120" class="img-thumbnail" style="display:none;">
                  </div>
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
    document.addEventListener('DOMContentLoaded', function () {
        var editButtons = document.querySelectorAll('.edit-btn');
        
        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.getAttribute('data-id');
                var judul = this.getAttribute('data-judul');
                var isi = this.getAttribute('data-isi');
                var gambar = this.getAttribute('data-gambar');
                
                // isi form edit
                document.getElementById('edit-id').value = id;
                document.getElementById('edit-judul').value = judul;
                document.getElementById('edit-isi').value = isi;
                document.getElementById('edit-gambar-lama').value = gambar;

                // tampilkan preview gambar
                if (gambar) {
                    document.getElementById('preview-gambar').src = "../img/berita/" + gambar;
                    document.getElementById('preview-gambar').style.display = "block";
                } else {
                    document.getElementById('preview-gambar').style.display = "none";
                }
            });
        });

        // preview gambar baru sebelum upload
        document.getElementById('edit-gambar').addEventListener('change', function (e) {
            if (e.target.files && e.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function (ev) {
                    document.getElementById('preview-gambar').src = ev.target.result;
                    document.getElementById('preview-gambar').style.display = "block";
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    });
    </script>
</body>
</html>