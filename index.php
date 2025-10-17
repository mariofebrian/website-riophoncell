<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include "koneksi.php";

$alert = ""; // untuk menyimpan status popup

// ==== PROSES FORM ====
if (isset($_POST['kirim'])) {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $pertanyaan = mysqli_real_escape_string($conn, $_POST['pertanyaan']);
  if (mysqli_query($conn, "INSERT INTO tb_tanya (nama, pertanyaan) VALUES ('$nama', '$pertanyaan')")) {
    $alert = "pertanyaan_ok";
  }
}

if (isset($_POST['update'])) {
  $id = (int)$_POST['id'];
  $jawaban = mysqli_real_escape_string($conn, $_POST['jawaban']);
  mysqli_query($conn, "UPDATE tb_tanya SET jawaban='$jawaban' WHERE id=$id");
}

if (isset($_POST['tambah_konsultasi'])) {
  $nama_pelanggan = mysqli_real_escape_string($conn, $_POST['nama_pelanggan']);
  $jenis_hp = mysqli_real_escape_string($conn, $_POST['jenis_hp']);
  $kerusakan = mysqli_real_escape_string($conn, $_POST['kerusakan']);
  $namaFile = $_FILES['gambar']['name'];
  $tmpFile = $_FILES['gambar']['tmp_name'];
  $folder = "gambar/" . basename($namaFile);

  if (!is_dir("gambar")) mkdir("gambar");
  if (move_uploaded_file($tmpFile, $folder)) {
    mysqli_query($conn, "INSERT INTO tb_konsultasi (nama_pelanggan, jenis_hp, kerusakan, gambar) 
                         VALUES ('$nama_pelanggan', '$jenis_hp', '$kerusakan', '$namaFile')");
    $alert = "konsultasi_ok";
  } else {
    $alert = "upload_fail";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Konter HP Digital Cell</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body { background-color: #1e293b; color: #f8fafc; scroll-behavior: smooth; }
    .navbar { background-color: #0f172a; }
    .card { background-color: #e2e8f0; border: none; border-radius: 15px; transition: transform 0.3s ease; }
    .card:hover { transform: scale(1.03); }
    .banner { height: 350px; background: url('gambar/banner-konter.jpg') center/cover no-repeat; border-radius: 15px; }
    a.text-white:hover { color: #38bdf8 !important; }
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">RIOPHONECELL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=service">Layanan</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=stok">Stok HP</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=aksesoris">Aksesoris</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=tanya">Konsultasi</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container py-5 mt-5">
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch($page) {

// ====================== HOME ==========================
case 'home':
?>
  <section class="text-center" data-aos="fade-up">

    <!-- Banner Carousel Otomatis Cepat -->
    <div id="bannerCarousel" class="carousel slide carousel-fade mb-4"
         data-bs-ride="carousel"
         data-bs-interval="2000"> <!-- Ganti ke 1.5 detik -->

      <div class="carousel-inner rounded-4 shadow-lg">

        <div class="carousel-item active">
          <img src="a55.jpg" class="d-block w-100" style="height:400px;object-fit:cover;" alt="Samsung A55 5G">
          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 p-3">
            <h5>Samsung A55 5G</h5>
            <p>Performa tangguh, desain elegan — Rp 5.199.000,00</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="s25.jpg" class="d-block w-100" style="height:400px;object-fit:cover;" alt="Samsung S25 Ultra 5G">
          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 p-3">
            <h5>Samsung S25 Ultra 5G</h5>
            <p>Kamera canggih, flagship premium — Rp 22.999.000,00</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="z6.jpg" class="d-block w-100" style="height:400px;object-fit:cover;" alt="Samsung Z Fold 6">
          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 p-3">
            <h5>Samsung Z Fold 6</h5>
            <p>Layar lipat futuristik — Rp 13.340.000,00</p>
          </div>
        </div>

      </div>
    </div>

    <!-- Teks Sambutan -->
    <h1 class="fw-bold">Selamat Datang di KLINIK PHONECELL</h1>
    <p class="lead">Tersedia berbagai HP terbaru, layanan service profesional, dan aksesoris lengkap.</p>
    <a href="https://instagram.com/digitalcellshop" target="_blank" class="btn btn-light mt-3 shadow-sm">Kunjungi Instagram</a>

  </section>
<?php break;


// ====================== SERVICE ==========================
case 'service':
?>
  <section data-aos="fade-up">
    <h2 class="text-center mb-4">Layanan Service HP</h2>
    <div class="row justify-content-center">
      <div class="col-md-4"><div class="card mb-4 text-center"><div class="card-body"><h5 class="fw-bold">Ganti LCD / Layar</h5><p>Ganti LCD original bergaransi semua merek HP.</p></div></div></div>
      <div class="col-md-4"><div class="card mb-4 text-center"><div class="card-body"><h5 class="fw-bold">Perbaikan Baterai</h5><p>Service baterai tanam & non-tanam cepat aman.</p></div></div></div>
      <div class="col-md-4"><div class="card mb-4 text-center"><div class="card-body"><h5 class="fw-bold">Software & Flash</h5><p>Instal ulang, lupa pola, dan update sistem HP Anda.</p></div></div></div>
    </div>
  </section>
<?php break;

// ====================== STOK HP ==========================
case 'stok':
?>
  <section data-aos="fade-up">
    <h2 class="text-center mb-4">Stok HP Terbaru</h2>
    <div class="row">
      <?php
      $result = mysqli_query($conn, "SELECT * FROM tb_hp");
      if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="col-md-4">
        <div class="card mb-4 text-dark">
          <img src="samsung55.jpg" class="card-img-top" style="height:500px;object-fit:cover">
          <div class="card-body text-center">
            <h5>Samsung A55 5G</h5>
            <p>8/256GB</p>
            <p>Rp 5.199.000,00</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 text-dark">
          <img src="samsungs25.jpg" class="card-img-top" style="height:500px;object-fit:cover">
          <div class="card-body text-center">
            <h5>Samsung s25 ultra 5G</h5>
            <p>12/512GB</p>
            <p>Rp 24.999.000,00</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 text-dark">
          <img src="samsung12.jpg" class="card-img-top" style="height:500px;object-fit:cover">
          <div class="card-body text-center">
            <h5>Samsung Z Fold 6</h5>
            <p>12/256GB</p>
            <p>Rp 13.340.000,00</p>
          </div>
        </div>
      </div>
      <?php } } else { echo "<p class='text-center'>Belum ada data HP.</p>"; } ?>
    </div>
  </section>
<?php
break;

// ====================== AKSESORIS ==========================
case 'aksesoris':
?>
  <section data-aos="fade-up">
    <h2 class="text-center mb-4">Aksesoris & Kelengkapan HP</h2>
    <div class="row">
      <div class="col-md-4"><div class="card mb-4 text-dark"><img src="cas.jpg" class="card-img-top" style="height:250px;object-fit:cover"><div class="card-body text-center"><h5>Charger Fast Charging</h5><p>Rp 80.000</p></div></div></div>
      <div class="col-md-4"><div class="card mb-4 text-dark"><img src="tws.jpg" class="card-img-top" style="height:250px;object-fit:cover"><div class="card-body text-center"><h5>Headset Bluetooth</h5><p>Rp 120.000</p></div></div></div>
      <div class="col-md-4"><div class="card mb-4 text-dark"><img src="powerbank.jpg" class="card-img-top" style="height:250px;object-fit:cover"><div class="card-body text-center"><h5>Power Bank</h5><p>Rp 200.000</p></div></div></div>
    </div>
  </section>
<?php
break;

// ====================== TANYA ==========================
case 'tanya':
?>
  <section data-aos="fade-up">
    <h2 class="text-center mb-4">Konsultasi & Pertanyaan</h2>

    <!-- Form Pertanyaan -->
    <div class="card text-dark mb-5 p-3">
      <h5 class="fw-bold mb-3">Kirim Pertanyaan</h5>
      <form method="post" id="formPertanyaan">
        <div class="mb-3">
          <label class="form-label">Nama Anda</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Pertanyaan</label>
          <textarea name="pertanyaan" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
      </form>
    </div>

    <!-- Daftar Pertanyaan -->
    <div class="card text-dark p-3 mb-5">
      <h5 class="fw-bold mb-3">Daftar Pertanyaan & Jawaban</h5>
      <?php
      $tanya = mysqli_query($conn, "SELECT * FROM tb_tanya ORDER BY id DESC");
      if ($tanya && mysqli_num_rows($tanya) > 0) {
        while ($r = mysqli_fetch_assoc($tanya)) {
          echo "<div class='border-bottom mb-3 pb-2'>";
          echo "<p><strong>".htmlspecialchars($r['nama']).":</strong> ".htmlspecialchars($r['pertanyaan'])."</p>";
          if ($r['jawaban']) {
            echo "<p class='ms-3 text-success'>💬 Jawaban: ".htmlspecialchars($r['jawaban'])."</p>";
          } else {
            echo "<form method='post' class='ms-3'>";
            echo "<input type='hidden' name='id' value='{$r['id']}'>";
            echo "<div class='input-group mb-2'><input type='text' name='jawaban' class='form-control' placeholder='Tulis jawaban...'><button type='submit' name='update' class='btn btn-success'>Update</button></div></form>";
          }
          echo "</div>";
        }
      } else {
        echo "<p class='text-center'>Belum ada pertanyaan.</p>";
      }
      ?>
    </div>

    <!-- Form Konsultasi Kerusakan -->
    <h2 class="text-center mb-4">Konsultasi Kerusakan HP</h2>
    <div class="card text-dark mb-4 p-3">
      <form method="post" enctype="multipart/form-data" id="formKonsultasi">
        <div class="row">
          <div class="col-md-4 mb-3"><label class="form-label">Nama Pelanggan</label><input type="text" name="nama_pelanggan" class="form-control" required></div>
          <div class="col-md-4 mb-3"><label class="form-label">Jenis HP</label><input type="text" name="jenis_hp" class="form-control" required></div>
          <div class="col-md-4 mb-3"><label class="form-label">Keluhan dan kerusakan</label><input type="text" name="kerusakan" class="form-control" required></div>
          <div class="col-md-6 mb-3"><label class="form-label">Upload Foto Kerusakan</label><input type="file" name="gambar" class="form-control" accept="image/*" required></div>
        </div>
        <button type="submit" name="tambah_konsultasi" class="btn btn-primary">Kirim Konsultasi</button>
      </form>
    </div>

    <!-- Daftar Konsultasi -->
    <div class="row">
      <?php
      $result = mysqli_query($conn, "SELECT * FROM tb_konsultasi ORDER BY id DESC");
      if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='col-md-4'><div class='card mb-4 text-dark'>";
          echo "<img src='gambar/".htmlspecialchars($row['gambar'])."' class='card-img-top' style='height:250px;object-fit:cover'>";
          echo "<div class='card-body text-center'><h5 class='fw-bold'>".htmlspecialchars($row['nama_pelanggan'])."</h5><p>Jenis HP: ".htmlspecialchars($row['jenis_hp'])."</p><p>Kerusakan: ".htmlspecialchars($row['kerusakan'])."</p></div></div></div>";
        }
      } else {
        echo "<p class='text-center'>Belum ada data konsultasi.</p>";
      }
      ?>
    </div>
  </section>
<?php break;

default:
  echo "<h2 class='text-center'>Halaman tidak ditemukan</h2>";
break;
}
?>
</div>

<footer class="text-center py-3 mt-5 bg-dark text-white">
  <p>&copy; 2025 RIOPHONCELL | Website by Craffiyo</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({ duration: 1000, once: true });

// === POPUP SWEETALERT ===
<?php if ($alert == "pertanyaan_ok"): ?>
Swal.fire({ icon: 'success', title: 'Berhasil!', text: 'Pertanyaan berhasil dikirim.', timer: 2000, showConfirmButton: false })
.then(() => { window.location = 'index.php?page=tanya'; });
<?php elseif ($alert == "konsultasi_ok"): ?>
Swal.fire({ icon: 'success', title: 'Sukses!', text: 'Data konsultasi berhasil dikirim.', timer: 2000, showConfirmButton: false })
.then(() => { window.location = 'index.php?page=tanya'; });
<?php elseif ($alert == "upload_fail"): ?>
Swal.fire({ icon: 'error', title: 'Gagal!', text: 'Upload foto kerusakan gagal.', timer: 2000, showConfirmButton: false });
<?php endif; ?>
</script>
</body>
</html>
