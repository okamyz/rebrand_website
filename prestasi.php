<?php
// Mengimpor data dari file data.php
include 'data_dummy.php';

// KUNCI UTAMA: Beri tahu halaman ini bahwa "Prestasi" adalah yang aktif
$halaman_sekarang = "Prestasi"; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $halaman_sekarang; ?> - <?php echo $nama_sekolah; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <section class="page-banner">
        <div class="container">
            <h1><?php echo strtoupper($halaman_sekarang); ?></h1>
            <p class="breadcrumbs"><?php echo $nama_sekolah; ?> / <?php echo $halaman_sekarang; ?></p>
        </div>
    </section>

    <main class="main-content">
        <div class="container content-layout">
            
            <div class="content-column">
                <article class="content-card">
                    <h2>Daftar Prestasi Sekolah</h2>
                    <ul>
                        <?php
                        // Memastikan variabel $prestasi ada sebelum melakukan looping
                        if (isset($prestasi) && is_array($prestasi) && !empty($prestasi)) {
                            foreach ($prestasi as $item_prestasi) {
                                echo "<ol>" . $item_prestasi . "</ol>";
                            }
                        } else {
                            echo "<li>Belum ada data prestasi yang dimasukkan.</li>";
                        }
                        ?>
                    </ul>
                </article>
            </div>

            <aside class="sidebar-column">
                <nav class="sidebar-nav">
                    <?php
                    // Looping untuk menampilkan tombol sidebar dari data.php
                    foreach ($menu_sidebar as $nama_menu => $url) {
                        // Cek apakah nama menu saat ini sama dengan $halaman_sekarang
                        $kelas_aktif = ($nama_menu == $halaman_sekarang) ? "active" : "";
                        echo "<a href='{$url}' class='sidebar-button {$kelas_aktif}'>{$nama_menu}</a>";
                    }
                    ?>
                </nav>
            </aside>

        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>