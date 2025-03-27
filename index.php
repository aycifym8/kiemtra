<?php
// Autoload classes (simple autoloader)
spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    include __DIR__ . '/' . $class_name . '.php';
});

use Controllers\NhanVienController;

// Get the requested URL
$request_uri = $_SERVER['REQUEST_URI'];
$base_path = '/kiemtra/'; // Adjust this to your base directory
$path = str_replace($base_path, '', parse_url($request_uri, PHP_URL_PATH));

// Extract controller and action
$parts = explode('/', trim($path, '/'));

$controllerName = isset($parts[0]) && !empty($parts[0]) ? ucfirst($parts[0]) . 'Controller' : 'NhanVienController';
$action = isset($parts[1]) && !empty($parts[1]) ? $parts[1] : 'index';

$controllerClass = "Controllers\\" . $controllerName;
// Nếu request là file ảnh, trả về trực tiếp
if (preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $request_uri)) {
    return false; // Cho phép Apache/XAMPP xử lý file trực tiếp
}

if (class_exists($controllerClass)) {
    $controllerInstance = new $controllerClass();
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        echo "Error: Method '$action' not found in controller '$controllerClass'.";
    }
} else {
    echo "Error: Controller '$controllerClass' not found.";
}
