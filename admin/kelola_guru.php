<?php
include '../koneksi.php';
include 'cek_login.php';

// CREATE
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $foto = null;

    if (!empty($_FILES['foto']['tmp_name'])) {
        $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    }

    $sql = "INSERT INTO guru (nama, jabatan, foto) VALUES ('$nama', '$jabatan', '$foto')";
    $koneksi->query($sql);
    header("Location: kelola_guru.php");
}

// DELETE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $koneksi->query("DELETE FROM guru WHERE id=$id");
    header("Location: kelola_guru.php");
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    if (!empty($_FILES['foto']['tmp_name'])) {
        $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
        $sql = "UPDATE guru SET nama='$nama', jabatan='$jabatan', foto='$foto' WHERE id=$id";
    } else {
        $sql = "UPDATE guru SET nama='$nama', jabatan='$jabatan' WHERE id=$id";
    }
    $koneksi->query($sql);
    header("Location: kelola_guru.php");
}

// READ
$data = $koneksi->query("SELECT * FROM guru");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Kelola Guru</title>
</head>
<body class="bg-light">
    <?php include 'admin_navbar.php'; ?>

    <div class="container mt-4">
        <h2 class="mb-4">Kelola Data Guru</h2>

        <!-- Tombol Tambah Data -->
        <button class="btn btn-primary mb-3" data-bs-toggle="collapse" data-bs-target="#formTambah">
            Tambah Guru Baru
        </button>

        <!-- Form Tambah Data -->
        <div id="formTambah" class="collapse mb-3">
            <div class="card card-body">
                <form action="" method="post" enctype="multipart/form-data" class="row g-2">
                    <div class="col-md-4">
                        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required>
                    </div>
                    <div class="col-md-4">
                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>
                    <div class="col-12">
                        <button type="submit" name="tambah" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; while($row = $data->fetch_assoc()): ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['jabatan'] ?></td>
                        <td class="text-center">
                            <?php if (!empty($row['foto'])): ?>
                                <img src="data:image/jpeg;base64,<?= base64_encode($row['foto']) ?>" width="70" class="img-thumbnail" />
                            <?php else: ?>
                                <span class="text-muted">Tidak ada foto</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>">Edit</button>
                            <a href="?hapus=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">Edit Data Guru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" name="nama" value="<?= $row['nama'] ?>" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jabatan</label>
                                            <input type="text" name="jabatan" value="<?= $row['jabatan'] ?>" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Foto (opsional)</label>
                                            <input type="file" name="foto" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="update" class="btn btn-success">Simpan Perubahan</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
