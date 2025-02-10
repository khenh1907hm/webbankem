<?php
// Hiển thị lỗi (chỉ dùng trong môi trường phát triển)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Tự động tải Controller khi cần
spl_autoload_register(function ($className) {
    $file = __DIR__ . '/app/controllers/' . $className . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Xử lý URL
$url = $_GET['url'] ?? ''; // Lấy URL từ query string (VD: Product/add)
$url = trim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$urlParts = explode('/', $url);

// Xác định Controller và Action
$controllerName = !empty($urlParts[0]) ? ucfirst($urlParts[0]) . 'Controller' : 'ProductController';
$action = !empty($urlParts[1]) ? $urlParts[1] : 'index';
$params = array_slice($urlParts, 2);

// Kiểm tra Controller có tồn tại không
$controllerPath = __DIR__ . '/app/controllers/' . $controllerName . '.php';
if (!file_exists($controllerPath)) {
    http_response_code(404);
    die('❌ 404 - Controller không tồn tại!');
}
require_once $controllerPath;

// Khởi tạo Controller
$controller = new $controllerName();

// Kiểm tra Action có tồn tại không
if (!method_exists($controller, $action)) {
    http_response_code(404);
    die('❌ 404 - Action không tồn tại!');
}

// Gọi Action với tham số (nếu có)
call_user_func_array([$controller, $action], $params);
?>
