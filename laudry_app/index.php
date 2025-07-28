<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Selamat Datang - Laundry App</title>
  <link rel="icon" href="/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #6c5ce7, #00cec9);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
      color: white;
      text-align: center;
    }

    .container-box {
      background-color: rgba(0, 0, 0, 0.65);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
      max-width: 600px;
      width: 90%;
      animation: fadeIn 1s ease;
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      font-weight: bold;
    }

    p {
      font-size: 1.2rem;
      margin-bottom: 30px;
    }

    .btn-custom {
      background-color: #00cec9;
      color: white;
      font-weight: bold;
      padding: 12px 24px;
      border: none;
      border-radius: 10px;
      transition: 0.3s;
    }

    .btn-custom:hover {
      background-color: #00b8b0;
      color: white;
      transform: scale(1.05);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 576px) {
      h1 {
        font-size: 1.8rem;
      }

      p {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

  <div class="container-box">
    <h1>👕 Laundry Management System</h1>
    <p>Selamat datang di sistem pengelolaan laundry! Silakan login untuk mengakses dashboard Anda.</p>
    <a href="auth/login.php" class="btn btn-custom">Login</a>
     <a href="auth/register.php" class="btn btn-custom">Register</a>
  </div>

</body>
</html>
