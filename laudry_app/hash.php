<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hash Generator Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      padding: 40px;
      background-color: #f8f9fa;
    }
    textarea {
      font-family: monospace;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="mb-4">🔐 Hash Password Admin & Staff</h2>

  <form method="POST">
    <div class="mb-3">
      <label for="plain_admin" class="form-label">Password Admin</label>
      <input type="text" class="form-control" id="plain_admin" name="plain_admin" required>
    </div>
    <div class="mb-3">
      <label for="plain_staff" class="form-label">Password Staff</label>
      <input type="text" class="form-control" id="plain_staff" name="plain_staff" required>
    </div>
    <button type="submit" class="btn btn-primary">Generate Hash</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): 
    $admin_hash = password_hash($_POST['plain_admin'], PASSWORD_DEFAULT);
    $staff_hash = password_hash($_POST['plain_staff'], PASSWORD_DEFAULT);
  ?>
    <hr>
    <h5>🔑 Hasil Hash:</h5>

    <div class="mb-3">
      <label class="form-label">Admin (<?= htmlspecialchars($_POST['plain_admin']) ?>)</label>
      <textarea class="form-control" rows="2" readonly><?= $admin_hash ?></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Staff (<?= htmlspecialchars($_POST['plain_staff']) ?>)</label>
      <textarea class="form-control" rows="2" readonly><?= $staff_hash ?></textarea>
    </div>
  <?php endif; ?>
</div>

</body>
</html>
