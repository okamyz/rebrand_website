<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
    <!-- bar navbar -->
    <?php include 'navbar.php'; ?>

    

    <!-- Carousel -->
    <div class="carousel-container">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/carousel1.jpg" class="d-block w-100 carousel-img" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/carousel2.jpg" class="d-block w-100 carousel-img" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/carousel3.jpg" class="d-block w-100 carousel-img" alt="...">
                </div>
            </div>

            <!-- Overlay hitam transparan -->
            <div class="carousel-overlay"></div>
        </div>

    <!-- Teks overlay tetap -->
        <div class="carousel-text">
            <h2>SD Negeri Bringin 01 Semarang</h2>
            <p>SD Negeri Bringin 01, BISA!!, "Bersih, Indah, Sehat, dan Asri"</p>
        </div>
    </div>

    <!-- Card Lebar di Bawah Carousel -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg rounded-4">
                    <img src="img/ucapanselamat.jpeg" class="card-img-top rounded-4" alt="Gambar Featured">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Selamat Datang di SD Negeri Bringin 01</h5>
                        <p class="card-text text-muted">Website resmi sekolah kami menyediakan informasi terbaru dan kegiatan sekolah.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section sambutan & pengumuman -->
    <div class="container my-5">
        <div class="row">
        <!-- Kolom kiri: Sambutan Kepala Sekolah -->
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm p-4 h-100">
                    
                    <h2 class="fw-bold mb-4 text-center">Sambutan Kepala Sekolah</h2>
                    
                    <!-- Foto Kepala Sekolah -->
                    <img src="img/kepsek.jpeg" alt="foto kepala sekolah sdn bringin 01 semarang" class="rounded-5 mx-auto d-block mb-3" width="200">
                    
                    <!-- Isi Sambutan -->
                    <p class="text-muted text-justify">
                        Assalamualaikum warohmatullahi wabarokatuh.<br><br>

                        Salam sehat, salam semangat untuk kita semua.<br><br>

                        Puji Syukur kami panjatkan kehadirat Allah Swt atas segala limpahan rahmat dan karunia-Nya. Sehingga SD NEGERI BRINGIN 01 berhasil membangun website sekolah. Kehadiran website SD NEGERI BRINGIN 01 diharapkan dapat memudahkan penyampaian informasi secara terbuka kepada warga sekolah, alumni, dan masyarakat serta instansi lain yang terkait.<br><br>

                        Semoga dengan kehadiran website sekolah ini akan terjalin informasi dan komunikasi dengan cepat sehingga semuanya dapat mengikuti perkembangan kegiatan yang ada di SD NEGERI BRINGIN 01 Kecamatan Ngaliyan Kota Semarang.<br><br>

                        Di era global dan pesatnya teknologi informasi dan komunikasi ini, tidak dipungkiri bahwa keberadaan website untuk suatu organisasi, termasuk SD NEGERI BRINGIN 01 sangatlah penting. Wahana website dapat digunakan sebagai media penyebarluasan informasi-informasi dari sekolah yang harus diketahui oleh stakeholder secara luas. Disamping itu website juga dapat menjadi sarana promosi sekolah yang cukup efektif.<br><br>

                        Oleh karena itu, kami sangat berharap, melalui website ini SD NEGERI BRINGIN 01 akan semakin berkembang lebih maju dan solid.<br><br>

                        Wassalamualaikum warohmatullahi wabarokatuh.
                    </p>

                    <hr>
                    <h6 class="fw-bold mb-0 text-center">Muh Hasan Rifai, S.Pd.I, M.Pd</h6>
                    <small class="text-muted text-center">Kepala Sekolah SDN Bringin 01 Semarang</small>
                </div>
            </div>


        <!-- Kolom kanan: Berita -->
        <div class="col-md-4 mb-4 informasi">
            <h3 class="mb-3 font-weight-bold">Berita</h3>

            <?php
                include 'koneksi.php';

                // Ambil 3 berita terbaru
                $query_berita = "SELECT id_berita, judul, tanggal_publikasi 
                                FROM berita 
                                ORDER BY tanggal_publikasi DESC 
                                LIMIT 5";
                $result_berita = mysqli_query($koneksi, $query_berita);

                if(mysqli_num_rows($result_berita) > 0) {
                    while($row = mysqli_fetch_assoc($result_berita)) {
                        $tanggal = date("d-m-Y", strtotime($row['tanggal_publikasi']));
                        echo '
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body p-3">
                                    <h6>📢 ' . $tanggal . '</h6>
                                    <a href="berita.php?id=' . $row['id_berita'] . '">' . htmlspecialchars($row['judul']) . '</a>
                                </div>
                            </div>
                        ';
                    }
                } else {
                    echo '<p>Belum ada berita terbaru.</p>';
                }
            ?>
        </div>
        </div>
    </div>

    <!-- Section Kontak & Peta -->
    <div class="container my-5" id="kontak">
        <div class="row g-4 align-items-center">
            <!-- Kolom Kontak -->
            <div class="col-lg-4">
                <div class="card shadow-sm p-4 h-100 rounded-4">
                    <h4 class="fw-bold mb-4">Informasi Kontak</h4>
                    
                    <p class="mb-3">
                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                        <strong>Alamat</strong><br>
                        Jalan Raya Gondoriyo Beringin, Ngaliyan, Kota Semarang
                    </p>

                    <p class="mb-3">
                        <i class="fas fa-phone text-primary me-2"></i>
                        <strong>Telepon</strong><br>
                        (024) 76631105
                    </p>

                    <p class="mb-3">
                        <i class="fas fa-envelope text-primary me-2"></i>
                        <strong>Email</strong><br>
                        sdnbringin01@gmail.com
                    </p>

                    <a href="https://maps.app.goo.gl/WyXxCjha5Na6h9os6" target="_blank" class="btn btn-primary mt-3">
                        <i class="fas fa-external-link-alt me-2"></i> Lihat di Google Maps
                    </a>
                </div>
            </div>

            <!-- Kolom Peta -->
            <div class="col-lg-8">
                <div id="map" style="width: 100%; height: 400px;" class="rounded-4 shadow-sm"></div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-6.998228055668104, 110.32836675160301], 15); // Ganti koordinat sesuai lokasi
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        L.marker([-6.998228055668104, 110.32836675160301]).addTo(map)
            .bindPopup("SD Negeri Bringin 01 Semarang")
            .openPopup();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>