<?php
session_start();
require_once '../koneksi.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_laundry = $_POST['id_laundry'];
    $password = $_POST['password'];

    // Cek admin
    $query_admin = mysqli_prepare($conn, "SELECT * FROM admin WHERE id_laundry = ?");
    mysqli_stmt_bind_param($query_admin, "s", $id_laundry);
    mysqli_stmt_execute($query_admin);
    $result_admin = mysqli_stmt_get_result($query_admin);

    if ($data_admin = mysqli_fetch_assoc($result_admin)) {
        if (password_verify($password, $data_admin['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['id_laundry'] = $data_admin['id_laundry'];
            $_SESSION['level'] = 'Admin';
            header("Location: ../admin/dashboard.php");
            exit;
        } else {
            $error = "Password salah.";
        }
    } else {
        // Cek staff
        $query_staff = mysqli_prepare($conn, "SELECT * FROM staff WHERE id_laundry = ?");
        mysqli_stmt_bind_param($query_staff, "s", $id_laundry);
        mysqli_stmt_execute($query_staff);
        $result_staff = mysqli_stmt_get_result($query_staff);

        if ($data_staff = mysqli_fetch_assoc($result_staff)) {
            if (password_verify($password, $data_staff['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['id_laundry'] = $data_staff['id_laundry'];
                $_SESSION['level'] = $data_staff['level'];
                header("Location: ../admin/beranda.php");
                exit;
            } else {
                $error = "Password salah.";
            }
        } else {
            $error = "ID Laundry tidak ditemukan.";
        }
    }
}
?>

<!-- Tampilan Halaman Login -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Laundry App</title>
  <link rel="icon" type="image/png" href="/favicon.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #6c5ce7, #00cec9);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
      background-color: #2c2c54;
      border-radius: 20px;
      padding: 40px;
      width: 100%;
      max-width: 400px;
      color: #fff;
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
      animation: fadeInUp 1s ease;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login-card h3 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: bold;
    }

    .form-control {
      background-color: #3d3d6e;
      border: none;
      color: #fff;
    }

    .form-control:focus {
      background-color: #57577b;
      color: #fff;
      box-shadow: none;
    }

    .btn-login {
      background-color: #00cec9;
      border: none;
      font-weight: bold;
    }

    .btn-login:hover {
      background-color: #00b8b0;
    }

    .alert {
      font-size: 0.9rem;
    }

    @media (max-width: 500px) {
      .login-card {
        padding: 25px;
      }
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h3>🔐 Login Laundry</h3>

    <?php if (!empty($error)) : ?>
      <div class="alert alert-danger text-center"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label for="id_laundry" class="form-label">ID Laundry</label>
        <input type="text" class="form-control" id="id_laundry" name="id_laundry" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <button type="submit" class="btn btn-login w-100">Masuk</button>
    </form>
  </div>

</body>
</html>
