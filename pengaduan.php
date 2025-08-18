<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- bar navbar -->
    <?php include 'navbar.php'; ?>
    <!-- ===== Form Pengaduan ===== -->
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-sm rounded-4">
        <div class="card-body p-4">
          <h3 class="fw-bold mb-3">Form Pengaduan</h3>
          <p class="text-muted mb-4">Silakan isi data berikut dengan benar.</p>

          <form action="proses_pengaduan.php"
            id="open"
            class="needs-validation"
            autocomplete="on"
            method="post"
            accept-charset="utf-8"
            novalidate>
            <!-- Hidden fields (sesuai permintaan) -->
            <input type="hidden" name="form_name" value="complain">
            <input type="hidden" name="email_title" value="New Inquiry from Complain">

            <!-- Nama -->
            <div class="mb-3">
              <label for="name" class="form-label">Nama *</label>
              <input type="text"
                     class="form-control"
                     id="name"
                     name="name"
                     placeholder="Masukkan nama Anda"
                     required>
              <div class="invalid-feedback">Nama wajib diisi.</div>
            </div>

            <!-- Surel -->
            <div class="mb-3">
              <label for="email" class="form-label">Surel *</label>
              <input type="email"
                     class="form-control"
                     id="email"
                     name="email"
                     placeholder="nama@contoh.com"
                     required>
              <div class="invalid-feedback">Masukkan alamat email yang valid.</div>
            </div>

            <!-- Nomor Kontak -->
            <div class="mb-3">
              <label for="contact_no" class="form-label">Nomor Kontak *</label>
              <input type="text"
                     class="form-control"
                     id="contact_no"
                     name="contact_no"
                     placeholder="08xxxxxxxxxx"
                     required>
              <div class="invalid-feedback">Nomor kontak wajib diisi.</div>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
              <label for="description" class="form-label">Deskripsi *</label>
              <textarea class="form-control"
                        id="description"
                        name="description"
                        rows="6"
                        placeholder="Tuliskan detail pengaduan Anda"
                        required></textarea>
              <div class="invalid-feedback">Deskripsi wajib diisi.</div>
            </div>

            <!-- Submit -->
            <div class="d-flex justify-content-end">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

          <!-- Catatan privasi (opsional) -->
          <small class="text-muted d-block mt-3">Data Anda hanya digunakan untuk keperluan tindak lanjut pengaduan.</small>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Validasi Bootstrap 5 (opsional, tanpa library tambahan) -->
    
    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>