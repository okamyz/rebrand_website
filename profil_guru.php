<?php 
    include 'koneksi.php';
    include 'data_dummy.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Guru</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <section class="content-wrapper">
    <div class="team-section">
        <div class="header">
            <h1>Profil Guru</h1>
        </div>

        <div class="team-grid">
        <?php
            $sql = "SELECT * FROM guru";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Ubah data BLOB ke base64
                    $foto = base64_encode($row['foto']);
                    $tipe = "image/jpeg"; // sesuaikan kalau png → "image/png"

                    echo '
                    <div class="team-card">
                        <img src="data:'.$tipe.';base64,'.$foto.'" alt="'.$row['nama'].'">
                        <h3>'.$row['nama'].'</h3>
                        <p class="jabatan">'.$row['jabatan'].'</p>
                    </div>
                    ';
                }
            } else {
                echo "<p>Belum ada data guru.</p>";
            }
            ?>

        </div>
    </div>

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
</section>

    <footer class="bg-dark text-white mt-5">
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
