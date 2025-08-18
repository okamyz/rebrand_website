<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../img/logo.png" alt="logo sd" width="30" height="30">
        </a>
        <a class="navbar-brand" href="dashboard.php">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kelola_berita.php">Kelola Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kelola_galeri.php">Kelola Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kelola_guru.php">Kelola Guru</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="lihat_pengaduan.php">Lihat Pengaduan</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Selamat datang, <?php echo $_SESSION['nama_lengkap']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>