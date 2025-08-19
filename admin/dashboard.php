<?php 
include 'cek_login.php'; 
include '../koneksi.php';

function get_total_count($koneksi, $tabel) {
    $query = "SELECT COUNT(*) as total FROM `$tabel`";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}
$total_berita = get_total_count($koneksi, 'berita');
$total_galeri = get_total_count($koneksi, 'galeri');
$total_guru = get_total_count($koneksi, 'guru');
$total_lomba = get_total_count($koneksi, 'lomba');
$total_pengaduan = get_total_count($koneksi, 'pengaduan');

$query_berita_terbaru = "SELECT * FROM berita ORDER BY tanggal_publikasi DESC LIMIT 5";
$result_berita_terbaru = mysqli_query($koneksi, $query_berita_terbaru);

$query_pengaduan_terbaru = "SELECT * FROM pengaduan ORDER BY tanggal_masuk DESC LIMIT 5";
$result_pengaduan_terbaru = mysqli_query($koneksi, $query_pengaduan_terbaru);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php include 'admin_navbar.php'; ?>

    <div class="container mt-4">
        <div class="p-4 mb-4 bg-light rounded-3">
            <div class="container-fluid">
                <h1 class="display-6 fw-bold">Selamat Datang, <?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?>! 👋</h1>
                <p class="col-md-8 fs-5">Ini adalah ringkasan aktivitas dan data terbaru dari website sekolah SD Beringin 01 Semarang.</p>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4 col-lg">
                <div class="card text-white bg-primary h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Total Berita</h5>
                            <p class="card-text fs-2 fw-bold"><?php echo $total_berita; ?></p>
                        </div>
                        <i class="bi bi-newspaper fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg">
                <div class="card text-white bg-success h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Total Guru</h5>
                            <p class="card-text fs-2 fw-bold"><?php echo $total_guru; ?></p>
                        </div>
                        <i class="bi bi-person-video3 fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg">
                <div class="card text-white bg-warning h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Kegiatan Lomba</h5>
                            <p class="card-text fs-2 fw-bold"><?php echo $total_lomba; ?></p>
                        </div>
                        <i class="bi bi-trophy-fill fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg">
                <div class="card text-white bg-info h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Foto Galeri</h5>
                            <p class="card-text fs-2 fw-bold"><?php echo $total_galeri; ?></p>
                        </div>
                        <i class="bi bi-images fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Pengaduan Masuk</h5>
                            <p class="card-text fs-2 fw-bold"><?php echo $total_pengaduan; ?></p>
                        </div>
                        <i class="bi bi-envelope-exclamation-fill fs-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header fw-bold">
                        <i class="bi bi-newspaper me-2"></i>Berita Terbaru
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php while($berita = mysqli_fetch_assoc($result_berita_terbaru)) { ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo htmlspecialchars($berita['judul']); ?>
                                <span class="badge bg-secondary rounded-pill"><?php echo date('d M Y', strtotime($berita['tanggal_publikasi'])); ?></span>
                            </li>
                        <?php } ?>
                         <li class="list-group-item text-center"><a href="kelola_berita.php">Lihat Semua Berita...</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header fw-bold">
                       <i class="bi bi-envelope-exclamation-fill me-2"></i>Pengaduan Terbaru
                    </div>
                    <ul class="list-group list-group-flush">
                         <?php while($pengaduan = mysqli_fetch_assoc($result_pengaduan_terbaru)) { ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Dari: <?php echo htmlspecialchars($pengaduan['nama']); ?>
                                <span class="badge bg-secondary rounded-pill"><?php echo date('d M Y', strtotime($pengaduan['tanggal_masuk'])); ?></span>
                            </li>
                        <?php } ?>
                        <li class="list-group-item text-center"><a href="lihat_pengaduan.php">Lihat Semua Pengaduan...</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>