<?php
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../../dbconnect.php');
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm = trim($_POST['confirm'] ?? '');
    if ($username === '' || $password === '' || $confirm === '') {
        $error = 'Vui lòng nhập đầy đủ thông tin.';
    } elseif ($password !== $confirm) {
        $error = 'Mật khẩu xác nhận không khớp.';
    } else {
        // Kiểm tra username đã tồn tại chưa
        $stmt = $conn->prepare('SELECT id FROM users WHERE username = ? LIMIT 1');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $error = 'Tên đăng nhập đã tồn tại.';
        } else {
            // Thêm user mới (mật khẩu plain text, nên dùng hash thực tế)
            $stmt->close();
            $stmt = $conn->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
            $stmt->bind_param('ss', $username, $password);
            if ($stmt->execute()) {
                $success = 'Đăng ký thành công! Bạn có thể đăng nhập.';
                header('Refresh:2; url=/demoshop/frontend/pages/login.php');
            } else {
                $error = 'Đăng ký thất bại. Vui lòng thử lại.';
            }
        }
        $stmt->close();
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - Demo Shop</title>
    <?php include_once('../layout/styles.php'); ?>
</head>
<body>
<?php include_once('../layout/partials/header.php'); ?>
<main class="container mt-5 pt-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Đăng ký tài khoản</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php elseif ($success): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <form method="post" autocomplete="off">
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" id="username" name="username" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="confirm" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" class="form-control" id="confirm" name="confirm" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Đăng ký</button>
    </form>
    <div class="mt-3 text-center">
        <a href="/demoshop/frontend/pages/login.php">Đã có tài khoản? Đăng nhập</a>
    </div>
</main>
<?php include_once('../layout/partials/footer.php'); ?>
<?php include_once('../layout/scripts.php'); ?>
</body>
</html>
