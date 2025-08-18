<?php
include 'data_dummy.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi dan Misi - <?php echo $nama_sekolah; ?></title>
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
            <h1>TUJUAN, VISI, DAN MISI</h1>
            <p class="breadcrumbs"><?php echo $nama_sekolah; ?> / Tujuan, Visi, dan Misi</p>
        </div>
    </section>

    <main class="main-content">
    <div class="container content-layout">
        <!-- Kolom Kiri: Konten -->
        <div class="content-column">
            <!-- Tujuan -->
            <div class="section-container">
                <div class="text-box">
                    <h2>Tujuan</h2>
                    <p><?php echo $tujuan; ?></p>
                </div>
                <div class="image-box">
                    <img src="img/kegiatan3.jpg" alt="Tujuan">
                </div>
            </div>

            <!-- Visi -->
            <div class="section-container">
                <div class="image-box">
                    <img src="img/tim paskibra 2019 sdn bringin 01.jpg" alt="Visi">
                </div>
                <div class="text-box">
                    <h2>Visi</h2>
                    <p><?php echo $visi; ?></p>
                </div>
            </div>

            <!-- Misi -->
            <div class="section-container">
                <div class="text-box">
                    <h2>Misi</h2>
                    <ul>
                        <?php
                        foreach ($misi as $item_misi) {
                            echo "<li>" . $item_misi . "</li>";
                        }
                        ?>
                    </ul>
                </div>
                <div class="image-box">
                    <img src="img/kegiatan2.jpg" alt="Misi">
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Sidebar -->
        <aside class="sidebar-column">
            <nav class="sidebar-nav">
                <?php
                foreach ($menu_sidebar as $nama_menu => $url) {
                    $kelas_aktif = ($nama_menu == "Visi dan Misi") ? "active" : "";
                    echo "<a href='{$url}' class='sidebar-button {$kelas_aktif}'>{$nama_menu}</a>";
                }
                ?>
            </nav>
        </aside>
    </div>
</main>
    
    <footer class="bg-dark text-white mt-5">
        <?php include 'footer.php'; ?>
    </footer>
    
</body>
</html>