<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Berita</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <style>
            body { font-family: 'Poppins', sans-serif; }
            .news-list a { cursor: pointer; }
            .hidden { display: none; } /* helper class untuk sembunyi/tampil */
        </style>
    </head>
    <body class="d-flex flex-column min-vh-100">
    <?php include 'navbar.php'; ?>

    <!-- Wrapper konten utama -->
    <main class="flex-grow-1">
        <div class="container mt-5">
        <div class="row card shadow-sm p-4 rounded-4">
            <!-- List Berita -->
            <div id="news-list" class="col-md-12 news-list">
            <h4>Daftar Berita</h4>
            <ul class="list-group">
                <li class="list-group-item">
                <a onclick="showContent('berita1')">Selamat dan Sukses Atas Dilantinya Hevearita G. Rahayu (Mbak Ita) Sebagai Pelantikan Wali Kota Semarang Tahun 2021-2026</a>
                </li>
                <li class="list-group-item">
                <a onclick="showContent('berita2')">DAYA TAMPUNG SD NEGERI BRINGIN 01</a>
                </li>
                <li class="list-group-item">
                <a onclick="showContent('berita3')">PANDUAN PPD KOTA SEMARANG TAHUN 2022</a>
                </li>
                <li class="list-group-item">
                <a onclick="showContent('berita4')">ALUR PPD SD KOTA SEMARANG TAHUN 2022</a>
                </li>
                <li class="list-group-item">
                <a onclick="showContent('berita5')">INFORMASI PENDAFTARAN PPD KOTA SEMARANG TAHUN 2022</a>
                </li>
                <li class="list-group-item">
                <a onclick="showContent('berita6')">ZONASI SD NEGERI BRINGIN 01</a>
                </li>
            </ul>
            </div>

            <!-- Konten Berita -->
            <div id="content-area" class="col-md-12 hidden">
            <!-- isi berita akan dimasukkan lewat JS -->
            </div>
        </div>
        </div>
    </main>

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
        // Data berita bisa di-hardcode atau ambil dari server via AJAX
        const berita = {
        berita1: {
            title: "Selamat dan Sukses Atas Dilantinya Hevearita G. Rahayu (Mbak Ita) Sebagai Pelantikan Wali Kota Semarang Tahun 2021-2026",
            content: "SDN Bringin 01 Mengucapkan Selamat dan Sukses atas dilantiknya Hevearita G. Rahayu (Mbak Ita) sebagai Wali Kota Semarang Tahun 2021-2026."
        },
        berita2: {
            title: "DAYA TAMPUNG SD NEGERI BRINGIN 01",
            content: "Jumlah Daya Tampung Peserta Didik Baru untuk SD Negeri Bringin 01 adalah 28 Peserta Didik"
        },
        berita3: {
            title: "PANDUAN PPD KOTA SEMARANG TAHUN 2022",
            content: "Daftar Panduan Pendaftaran SD Tahun Pelajaran 2022/2023 <br><a href='https://ppd.semarangkota.go.id/assets/content_upload/files/Panduan%20Pra%20Pendaftaran%20SD%202022.pdf'>1. Download Panduan Pra Pendaftaran</a><br><a href='https://ppd.semarangkota.go.id/assets/content_upload/files/Panduan%20Pendaftaran%20SD%202022.pdf'>2. Download Panduan Pengisian Formulir Pendaftaran</a><br><a href='https://ppd.semarangkota.go.id/assets/content_upload/files/Panduan%20Daftar%20Ulang%20SD%202022.pdf'>3. Download Panduan Daftar Ulang</a>"
        },
        berita4: {
            title: "ALUR PPD SD KOTA SEMARANG TAHUN 2022",
            content: "PENTING!! Perhatikan Alur PPD SD Negeri Tahun 2022 dengan cermat!<br><img src='img/berita/Alur Pendaftaran GLOBAL - SD.png' alt='Alur Pendaftaran' style='max-width:50vh'>"
        },
        berita5: {
            title: "INFORMASI PENDAFTARAN PPD KOTA SEMARANG TAHUN 2022",
            content: "<span style='color: orange; font-weight:bold;'>WAJIB DICATAT!! Jangan Sampai Kelewatan</span><br><img src='img/berita/Alur Pendaftaran GLOBAL - SD.png' alt='Alur Pendaftaran' style='max-width:50vh'><br>Cara Pra Pendaftaran Online baca di <a href='https://ppd.semarangkota.go.id/assets/content_upload/files/Panduan%20Pra%20Pendaftaran%20SD%202022.pdf'>Panduan Pengisian Formulir Pra Pendftaran</a><br>Cara Pendaftaran Online baca di <a href='https://ppd.semarangkota.go.id/assets/content_upload/files/Panduan%20Pendaftaran%20SD%202022.pdf'>Panduan Pengisian Formulir Pendaftaran</a>"
        },
        berita6: {
            title: "ZONASI SD NEGERI BRINGIN 01",
            content: "<a href='http://sdnbringin01.dikdas.semarangkota.go.id/uploads/gallery/media/daya%20tampung%20bringin%202022.png'>Bringin, Podorejo, Wates adalah Wilayah Kelurahan Zonasi SD Negeri Bringin 01</a><br><img src='img/berita/daya tampung bringin 2022.png' alt='Alur Pendaftaran' style='max-width:50vh'>"
        }
        };

        function showContent(id) {
        const list = document.getElementById("news-list");
        const area = document.getElementById("content-area");

        // sembunyikan daftar, tampilkan konten
        list.classList.add("hidden");
        area.classList.remove("hidden");

        // isi konten berita + tombol kembali
        area.innerHTML = `
            <h3>${berita[id].title}</h3>
            <p>${berita[id].content}</p>
            <button class="btn btn-primary mt-3" onclick="goBack()">Kembali ke Daftar Berita</button>
        `;
        }

        function goBack() {
        const list = document.getElementById("news-list");
        const area = document.getElementById("content-area");

        // sembunyikan konten, tampilkan daftar
        area.classList.add("hidden");
        list.classList.remove("hidden");
        }
        </script>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="fontawesome/js/all.min.js"></script>
    </body>
</html>
