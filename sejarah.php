<?php
// Mengimpor data dari file data.php
include 'data_dummy.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah - <?php echo $nama_sekolah; ?></title>
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
            <h1>Sejarah</h1>
            <p class="breadcrumbs"><?php echo $nama_sekolah; ?> / Sejarah</p>
        </div>
    </section>

    <main class="main-content">
        <div class="container content-layout">
            
            <div class="content-column">
                <article class="content-card">
                    <h2>Sejarah</h2>
                    <?php foreach ($sejarah as $paragraf): ?>
                        <p><?php echo nl2br($paragraf); ?></p>
                    <?php endforeach; ?>
                </article>
            </div>

            <aside class="sidebar-column">
                <nav class="sidebar-nav">
                    <?php
                    // Looping untuk menampilkan tombol sidebar
                    foreach ($menu_sidebar as $nama_menu => $url) {
                        // Tandai tombol 'Visi dan Misi' sebagai aktif
                        $kelas_aktif = ($nama_menu == "Visi dan Misi") ? "active" : "";
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