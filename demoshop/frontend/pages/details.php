<?php
include_once('../../dbconnect.php');
// Lấy id sản phẩm từ URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    echo '<div class="alert alert-danger">Không tìm thấy sản phẩm!</div>';
    exit;
}
$sql = "SELECT id, name, description, price, stock_quantity, image_url FROM products WHERE id = $id";
$result = $conn->query($sql);
$product = $result && $result->num_rows > 0 ? $result->fetch_assoc() : null;
$conn->close();
if (!$product) {
    echo '<div class="alert alert-danger">Không tìm thấy sản phẩm!</div>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm - <?= htmlspecialchars($product['name']) ?></title>
    <?php include_once('../layout/styles.php'); ?>
</head>
<body>
<?php include_once('../layout/partials/header.php'); ?>
<main class="container mt-4">
    <div class="row">
        <div class="col-md-5">
            <img src="/demoshop/assets/<?= $product['image_url'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid" style="object-fit:cover;max-height:400px;">
        </div>
        <div class="col-md-7">
            <h2><?= htmlspecialchars($product['name']) ?></h2>
            <p><strong>Giá:</strong> <?= number_format($product['price'], 0, ',', '.') ?> đ</p>
            <p><strong>Tồn kho:</strong> <?= (int)$product['stock_quantity'] ?></p>
            <p><strong>Mô tả:</strong> <?= nl2br(htmlspecialchars($product['description'])) ?></p>
            <a href="../index.php" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</main>
<?php include_once('../layout/partials/footer.php'); ?>
<?php include_once('../layout/scripts.php'); ?>
</body>
</html>
