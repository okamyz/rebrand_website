<?php
include 'koneksi.php';  
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- bar navbar -->
    <?php include 'navbar.php'; ?>
    <!-- ====== GALERI 3 KOLOM (UPDATED) ====== -->

  <!-- tampilin item dari database -->
  <div class="container my-5">
  <div class="row g-4">
    <?php
      include 'koneksi.php';

      $query = "SELECT * FROM galeri ORDER BY id_foto DESC"; 
      $result = mysqli_query($koneksi, $query);

      while ($data = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-12 col-md-4">
      <div class="card border-0 shadow-sm gallery-item"
           data-title="<?php echo htmlspecialchars($data['judul_foto']); ?>"
           data-text="<?php echo htmlspecialchars($data['keterangan_foto']); ?>"
           data-img="img/galeri/<?php echo $data['nama_file_gambar']; ?>">
        <div class="position-relative rounded-3 overflow-hidden gallery-click">
          <img src="img/galeri/<?php echo $data['nama_file_gambar']; ?>" alt="<?php echo htmlspecialchars($data['judul_foto']); ?>"
               class="w-100 d-block gallery-img" style="aspect-ratio:16/10; object-fit:cover;">
          <div class="position-absolute bottom-0 start-0 end-0 p-2"
               style="background:linear-gradient(180deg, rgba(0,0,0,0), rgba(0,0,0,.6));">
            <span class="text-white fw-semibold small d-block text-truncate"><?php echo htmlspecialchars($data['judul_foto']); ?></span>
          </div>
        </div>
      </div>
    </div>
    <?php
      } 
    ?>
</div>
</div>

    <!-- ===== MODAL GALERI ===== -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-body p-0">
            <div class="row g-0">
            <!-- Gambar besar -->
            <div class="col-lg-7">
                <img id="modalImg" alt="" class="w-100 h-100 d-block"
                    style="object-fit:contain; aspect-ratio:16/12;">
            </div>
            <!-- Teks kanan -->
            <div class="col-lg-5 p-4">
                <h5 id="modalTitle" class="fw-bold mb-2"></h5>
                <div id="modalText" class="text-muted small"></div>
            </div>
            </div>
        </div>
        <div class="modal-footer py-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
        </div>
    </div>
    </div>

    
    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4">
            <div class="row">
                <!-- Kolom 1: Tautan -->
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold">Tautan</h5>
                    <br>
                    <p>
                        <i class="fas fa-angle-right me-2"></i>
                        <a href="https://kemendikdasmen.go.id/" class="footer-link">Kemendikdasmen</a>
                    </p>
                    <p>
                        <i class="fas fa-angle-right me-2"></i>
                        <a href="https://disdiksmg.semarangkota.go.id/" class="footer-link">Dinas Pendidikan</a>
                    </p>
                </div>

                <!-- Kolom 2: Kontak -->
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold text-decoration-underline">Kontak</h5>
                    <br>
                    <p><i class="fas fa-map-marker-alt me-2"></i>Jalan Raya Gondoriyo Beringin, Ngaliyan, Kota Semarang</p>
                    <p><i class="fas fa-phone me-2"></i>(024) 76631105</p>
                    <p><i class="fas fa-envelope me-2"></i>sdnbringin01@gmail.com</p>
                </div>

                <!-- Kolom 3: Sosial Media -->
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold text-decoration-underline">Sosial Media</h5>
                    <br>
                    <a href="#" class="footer-link me-3"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="footer-link me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="footer-link"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <hr class="border-light">
            <div class="text-center">
                <small>© 2025 SD Negeri Bringin 01 Semarang. All rights reserved.</small>
            </div>
        </div>
    </footer>
    <script>
    // Event binding untuk setiap item galeri
    document.querySelectorAll('.gallery-item').forEach(function (card) {
        card.addEventListener('click', function () {
        const title = this.dataset.title || '';
        const text  = this.dataset.text  || '';
        const img   = this.dataset.img   || '';

        // Set isi modal
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalText').textContent  = text;
        const imgEl = document.getElementById('modalImg');
        imgEl.src = img;
        imgEl.alt = title;

        // Tampilkan modal (butuh Bootstrap JS sudah ter-include)
        const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
        modal.show();
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</body>
</html>