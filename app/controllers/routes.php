<?php
require_once 'app/utils/JWTHandler.php';
require_once 'app/controllers/ProductController.php';
require_once 'app/controllers/UserProductController.php';

$jwtHandler = new JWTHandler();
$token = $_COOKIE['auth_token'] ?? ''; // Lấy token từ cookie
$userRole = null;

if (!empty($token)) { 
    try {
        $decodedToken = $jwtHandler->decode($token);
        $userRole = $decodedToken->role ?? null;
    } catch (Exception $e) {
        $userRole = null; // Token sai hoặc hết hạn
    }
}

// Kiểm tra role và gọi controller phù hợp
if ($_GET['url'] === 'product') {
    if ($userRole === 'admin') {
        $controller = new ProductController();
    } else {
        $controller = new UserProductController();
    }
    $controller->index();
} else {
    echo "Không tìm thấy trang!";
}
?>
