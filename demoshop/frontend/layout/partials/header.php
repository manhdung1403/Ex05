<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<header data-bs-theme="dark">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top shadow">
    <div class="container-fluid">
      <!-- Logo -->
      <a class="navbar-brand fw-bold" href="#">🛒 Demo Shop</a>

      <!-- Toggle button for mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu items -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/demoshop/frontend/pages/about.php">About</a>
          </li>
        </ul>
        <ul class="navbar-nav mb-2 mb-md-0">
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="/demoshop/frontend/pages/logout.php">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="/demoshop/frontend/pages/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/demoshop/frontend/pages/resgister.php">Register</a>
          </li>
        <?php endif; ?>
        </ul>
        <!-- Search -->
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Tìm</button>
        </form>
      </div>
    </div>
  </nav>
</header>
