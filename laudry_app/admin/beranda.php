<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['login']) || $_SESSION['level'] !== 'Pengunjung') {
  header("Location: ../auth/login.php");
  exit;
}

// Ambil ID laundry dari session
$id_laundry = $_SESSION['id_laundry'];

// Ambil data staff dari database berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM staff WHERE id_laundry = '$id_laundry'");
$staff = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Beranda Pengunjung</title>
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      transition: all 0.3s ease;
    }

    .dark-mode {
      background-color: #1e1e2f;
      color: #f1f1f1;
    }

    .dark-mode .card {
      background-color: #2e2e3e;
      color: #fff;
      border-color: #444;
    }

    .toggle-btn {
      position: absolute;
      top: 20px;
      right: 20px;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Halo, <?= htmlspecialchars($staff['nama']) ?> 👋</h2>
    <button class="btn btn-outline-secondary toggle-btn" onclick="toggleDarkMode()">🌓 Mode Gelap</button>
  </div>

  <div class="row g-4">
    <div class="col-md-6">
      <div class="card shadow p-3">
        <h5 class="card-title">Informasi Akun</h5>
        <p><strong>ID Laundry:</strong> <?= $staff['id_laundry'] ?></p>
        <p><strong>Email:</strong> <?= $staff['email'] ?></p>
        <p><strong>No HP:</strong> <?= $staff['no_hp'] ?></p>
        <p><strong>Alamat:</strong> <?= $staff['alamat'] ?></p>
        <p><strong>Level:</strong> <?= $staff['level'] ?></p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow p-3">
        <h5 class="card-title">Fitur Lainnya</h5>
        <p>Menu tambahan untuk pengunjung bisa ditambahkan di sini.</p>
        <a href="../auth/logout.php" class="btn btn-danger mt-3">Logout</a>
      </div>
    </div>
  </div>
</div>

<script>
  function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");
  }
</script>

</body>
</html>
