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
            .hidden { display: none; }
        </style>
    </head>
    <body class="d-flex flex-column min-vh-100">
    <?php 
        include 'navbar.php'; 
        include 'koneksi.php'; 
    ?>

    <main class="flex-grow-1">
        <div class="container mt-5">
        <div class="row card shadow-sm p-4 rounded-4">
            <div id="news-list" class="col-md-12 news-list">
                <h4>Daftar Berita</h4>
                <ul class="list-group">
                    <?php
                        // Query untuk mengambil judul dan id dari database
                        $query_list = "SELECT id_berita, judul FROM berita ORDER BY tanggal_publikasi DESC";
                        $result_list = mysqli_query($koneksi, $query_list);

                        if(mysqli_num_rows($result_list) > 0) {
                            while($row = mysqli_fetch_assoc($result_list)) {
                    ?>
                    <li class="list-group-item">
                        <a onclick="showContent(<?php echo $row['id_berita']; ?>)"><?php echo htmlspecialchars($row['judul']); ?></a>
                    </li>
                    <?php
                            }
                        } else {
                            echo '<li class="list-group-item">Belum ada berita yang dipublikasikan.</li>';
                        }
                    ?>
                </ul>
            </div>

            <div id="content-area" class="col-md-12 hidden">
                </div>
        </div>
        </div>
    </main>

    <footer class="bg-dark text-white mt-5">
        <?php include 'footer.php'; ?>
    </footer>

    <script>
        <?php
            // Ambil SEMUA data berita untuk dimasukkan ke JavaScript
            $query_js = "SELECT id_berita, judul, isi_berita, gambar_berita FROM berita";
            $result_js = mysqli_query($koneksi, $query_js);
            
            // Siapkan object JavaScript
            echo "const berita = {";
            while($data = mysqli_fetch_assoc($result_js)){
                // json_encode digunakan agar teks dari PHP aman untuk dimasukkan ke string JavaScript
                $js_title = json_encode($data['judul']);
                $js_content = json_encode($data['isi_berita']);
                $js_image = json_encode("img/berita/" . $data['gambar_berita']);


                // Cetak setiap item berita sebagai properti object
                echo "'{$data['id_berita']}': { title: {$js_title}, content: {$js_content}, image: {$js_image}, },";
            }
            echo "};";
        ?>

        // Fungsi JavaScript ini TIDAK PERLU DIUBAH SAMA SEKALI
        // karena sekarang object 'berita' sudah berisi data dari database
        function showContent(id) {
            const list = document.getElementById("news-list");
            const area = document.getElementById("content-area");

            list.classList.add("hidden");
            area.classList.remove("hidden");

            area.innerHTML = `
                <h3>${berita[id].title}</h3>
                <img src="${berita[id].image}" class="img-fluid rounded-5">
                <div>${berita[id].content}</div>
                <button class="btn btn-primary mt-3" onclick="goBack()">Kembali ke Daftar Berita</button>
            `;
        }

        function goBack() {
            const list = document.getElementById("news-list");
            const area = document.getElementById("content-area");
            
            area.classList.add("hidden");
            list.classList.remove("hidden");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    </body>
</html>