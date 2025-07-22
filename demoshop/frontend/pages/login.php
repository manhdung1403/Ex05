<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../../dbconnect.php');
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if ($username === '' || $password === '') {
        $error = 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.';
    } else {
        $stmt = $conn->prepare('SELECT id, username, password FROM users WHERE username = ? LIMIT 1');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            // Giả sử mật khẩu lưu ở DB là dạng plain text, nếu đã mã hóa thì dùng password_verify
            if ($row['password'] === $password) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header('Location: /demoshop/frontend/index.php');
                exit;
            } else {
                $error = 'Sai mật khẩu.';
            }
        } else {
            $error = 'Tài khoản không tồn tại.';
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
    <title>Đăng nhập - Demo Shop</title>
    <?php include_once('../layout/styles.php'); ?>
</head>
<body>
<?php include_once('../layout/partials/header.php'); ?>
<main class="container mt-5 pt-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Đăng nhập</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
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
        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
    </form>
    <div class="mt-3 text-center">
        <a href="/demoshop/frontend/pages/resgister.php">Chưa có tài khoản? Đăng ký</a>
    </div>
</main>
<?php include_once('../layout/partials/footer.php'); ?>
<?php include_once('../layout/scripts.php'); ?>
</body>
</html>
