<?php 
include 'cek_login.php'; 
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php include 'admin_navbar.php'; ?>

    <div class="container mt-4">
        <h2>Data Pengaduan Masuk</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Pengirim</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM pengaduan ORDER BY tanggal_masuk DESC";
                        $result = mysqli_query($koneksi, $query);
                        $no = 1;
                        while($data = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d M Y, H:i', strtotime($data['tanggal_masuk'])); ?></td>
                        <td><?php echo htmlspecialchars($data['nama']); ?></td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm detail-btn" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#detailPengaduanModal"
                                    data-nama="<?php echo htmlspecialchars($data['nama']); ?>"
                                    data-email="<?php echo htmlspecialchars($data['email']); ?>"
                                    data-kontak="<?php echo htmlspecialchars($data['nomor_kontak']); ?>"
                                    data-tanggal="<?php echo date('d M Y, H:i', strtotime($data['tanggal_masuk'])); ?>"
                                    data-deskripsi="<?php echo htmlspecialchars($data['deskripsi']); ?>">
                                <i class="bi bi-eye"></i> Lihat Detail
                            </button>
                            <a href="hapus_pengaduan.php?id=<?php echo $data['id_pengaduan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pengaduan ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="detailPengaduanModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Detail Pengaduan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-3">Tanggal Masuk</dt>
                <dd class="col-sm-9" id="detail-tanggal"></dd>

                <dt class="col-sm-3">Nama Pengirim</dt>
                <dd class="col-sm-9" id="detail-nama"></dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9" id="detail-email"></dd>
                
                <dt class="col-sm-3">Nomor Kontak</dt>
                <dd class="col-sm-9" id="detail-kontak"></dd>

                <dt class="col-sm-3">Isi Pengaduan</dt>
                <dd class="col-sm-9">
                    <p style="white-space: pre-wrap;" id="detail-deskripsi"></p>
                </dd>
            </dl>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    // JavaScript untuk mengirim data ke modal detail
    document.addEventListener('DOMContentLoaded', function () {
        var detailButtons = document.querySelectorAll('.detail-btn');
        
        detailButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Ambil data dari atribut data-*
                var nama = this.getAttribute('data-nama');
                var email = this.getAttribute('data-email');
                var kontak = this.getAttribute('data-kontak');
                var tanggal = this.getAttribute('data-tanggal');
                var deskripsi = this.getAttribute('data-deskripsi');
                
                // Masukkan data ke dalam elemen di modal
                document.getElementById('detail-tanggal').textContent = tanggal;
                document.getElementById('detail-nama').textContent = nama;
                document.getElementById('detail-email').textContent = email;
                document.getElementById('detail-kontak').textContent = kontak;
                document.getElementById('detail-deskripsi').textContent = deskripsi;
            });
        });
    });
    </script>
</body>
</html>