<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Demo Shop</title>
    <?php include_once('../layout/styles.php'); ?>
</head>
<body>
<?php include_once('../layout/partials/header.php'); ?>
<main class="container mt-5 pt-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <h1 class="display-4 fw-bold mb-3">About Demo Shop</h1>
            <p class="lead">Demo Shop is a modern online store, offering a wide range of quality products at reasonable prices. We are committed to providing a convenient, safe, and fast shopping experience for our customers.</p>
            <ul class="list-unstyled mt-4">
                <li><i class="fa fa-check text-success me-2"></i> Diverse and genuine products</li>
                <li><i class="fa fa-check text-success me-2"></i> Fast delivery</li>
                <li><i class="fa fa-check text-success me-2"></i> 24/7 customer support</li>
            </ul>
        </div>
        <div class="col-md-6 text-center">
            <img src="../../assets/frontend/img/Screenshot 2025-07-10 174250.png" alt="Demo Shop" class="img-fluid rounded shadow" style="max-width: 350px;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 text-center">
            <i class="fa fa-truck fa-3x text-primary mb-3"></i>
            <h5>Nationwide Delivery</h5>
            <p>We deliver to every corner of the country at reasonable costs.</p>
        </div>
        <div class="col-md-4 text-center">
            <i class="fa fa-credit-card fa-3x text-primary mb-3"></i>
            <h5>Flexible Payment</h5>
            <p>Accepting various payment methods: cash, bank transfer, e-wallet.</p>
        </div>
        <div class="col-md-4 text-center">
            <i class="fa fa-headphones fa-3x text-primary mb-3"></i>
            <h5>Dedicated Support</h5>
            <p>Our customer service team is always ready to answer your questions.</p>
        </div>
    </div>
</main>
<?php include_once('../layout/partials/footer.php'); ?>
<?php include_once('../layout/scripts.php'); ?>
</body>
</html>
