<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lomba</title>
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-5 mb-5">
        <div class="text-center mb-4"><h1>Prestasi Siswa</h1><hr></div>
        <div class="row g-4 mt-3">
            <?php
            include 'koneksi.php';
            $query = "SELECT * FROM lomba ORDER BY id_lomba DESC";
            $result = mysqli_query($koneksi, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <img src="<?php echo htmlspecialchars($data['path_foto']); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo htmlspecialchars($data['judul_kegiatan']); ?></h5>
                                <a href="#" class="btn btn-primary mt-auto" 
                                   data-bs-toggle="modal" 
                                   data-bs-target="#detailLombaModal"
                                   data-judul="<?php echo htmlspecialchars($data['judul_kegiatan']); ?>"
                                   data-nama="<?php echo htmlspecialchars($data['daftar_peserta']); ?>"
                                   data-foto="<?php echo htmlspecialchars($data['path_foto']); ?>"
                                   data-youtube="<?php echo htmlspecialchars($data['link_youtube']); ?>"
                                   data-gdrive="<?php echo htmlspecialchars($data['link_gdrive']); ?>">
                                   Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<div class="col-12"><p class="text-center">Belum ada data prestasi.</p></div>';
            }
            ?>
        </div>
    </div>

    <div class="modal fade" id="detailLombaModal" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="detailLombaModalLabel">Judul Lomba</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <img id="modalFoto" src="" class="img-fluid rounded mb-3" alt="Foto Prestasi">
              </div>
              <div class="col-md-6">
                <h4>Peserta:</h4>
                <p id="modalNama">Nama Siswa</p>
                <div id="modalYoutubeWrapper" class="ratio ratio-16x9 mb-3" style="display:none;">
                  <iframe id="modalYoutube" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div id="modalGdriveWrapper" style="display:none;">
                    <a id="modalGdrive" href="#" class="btn btn-success" target="_blank">
                        <i class="fab fa-google-drive"></i> Lihat di Google Drive
                    </a>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    
    <footer class="bg-dark text-white mt-5">
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const detailLombaModal = document.getElementById('detailLombaModal');
        if (detailLombaModal) {
            detailLombaModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const judul = button.getAttribute('data-judul');
                const nama = button.getAttribute('data-nama');
                const foto = button.getAttribute('data-foto');
                const youtube = button.getAttribute('data-youtube');
                const gdrive = button.getAttribute('data-gdrive');

                const modalTitle = detailLombaModal.querySelector('.modal-title');
                const modalFoto = detailLombaModal.querySelector('#modalFoto');
                const modalNama = detailLombaModal.querySelector('#modalNama');
                const modalYoutube = detailLombaModal.querySelector('#modalYoutube');
                const modalYoutubeWrapper = detailLombaModal.querySelector('#modalYoutubeWrapper');
                const modalGdrive = detailLombaModal.querySelector('#modalGdrive');
                const modalGdriveWrapper = detailLombaModal.querySelector('#modalGdriveWrapper');

                modalTitle.textContent = judul;
                modalFoto.src = foto;
                modalNama.innerHTML = nama.replace(/\n/g, '<br>'); // Mengganti baris baru dengan <br>
                
                if (youtube) {
                    modalYoutube.src = youtube;
                    modalYoutubeWrapper.style.display = 'block';
                } else {
                    modalYoutubeWrapper.style.display = 'none';
                }
                
                if (gdrive) {
                    modalGdrive.href = gdrive;
                    modalGdriveWrapper.style.display = 'block';
                } else {
                    modalGdriveWrapper.style.display = 'none';
                }
            });

            detailLombaModal.addEventListener('hidden.bs.modal', () => {
                const modalYoutube = detailLombaModal.querySelector('#modalYoutube');
                modalYoutube.src = "";
            });
        }
    </script>
</body>
</html>