<?php
session_start();
// Hủy toàn bộ session
session_unset();
session_destroy();
// Chuyển hướng về trang chủ
header('Location: /Ex05/frontend/index.php');
exit;
