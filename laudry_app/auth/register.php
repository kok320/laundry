<?php
// koneksi
$koneksi = mysqli_connect("localhost", "root", "", "db_laundry");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama       = $_POST["nama"];
    $id_laundry = $_POST["id_laundry"];
    $email      = $_POST["email"];
    $password   = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $no_hp      = $_POST["no_hp"];
    $level      = $_POST["level"];
    $alamat     = $_POST["alamat"];

    if ($level == "Admin") {
        $query = "INSERT INTO admin (nama, id_laundry, password, email, no_hp, level, alamat)
                  VALUES ('$nama', '$id_laundry', '$password', '$email', '$no_hp', '$level', '$alamat')";
    } else {
        $query = "INSERT INTO staff (nama, id_laundry, password, email, no_hp, level, alamat)
                  VALUES ('$nama', '$id_laundry', '$password', '$email', '$no_hp', '$level', '$alamat')";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Gagal: " . mysqli_error($koneksi) . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Register</title>
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
      color: #ffffff;
      font-family: 'Segoe UI', sans-serif;
    }
    .form-container {
      max-width: 600px;
      margin: 60px auto;
      background-color: #1e1e1e;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 0 15px rgba(0,0,0,0.5);
      animation: fadeIn 0.6s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    label { margin-top: 10px; }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="form-container">
    <h3 class="text-center mb-4">Form Register</h3>
    <form method="POST" action="">
      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" required>
      </div>

      <div class="form-group">
        <label>ID Laundry</label>
        <input type="text" name="id_laundry" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Password (min 8 karakter)</label>
        <input type="password" name="password" class="form-control" required minlength="8">
      </div>

      <div class="form-group">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control">
      </div>

      <div class="form-group">
        <label>Level</label>
        <select name="level" class="form-control" required>
          <option value="">Pilih Level</option>
          <option value="Admin">Admin</option>
          <option value="Pengunjung">Pengunjung</option>
        </select>
      </div>

      <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary w-100">Register</button>
      </div>
    </form>
  </div>
</div>

</body>
</html>
