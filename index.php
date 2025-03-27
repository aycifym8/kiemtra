<?php
// Autoload classes (you might want to use a more robust autoloader)
spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    include __DIR__ . '/' . $class_name . '.php';
});

use Controllers\NhanVienController;

// Get the requested URL
$request_uri = $_SERVER['REQUEST_URI'];
$base_path = '/kiemtra/'; // Adjust this to your base directory
$path = str_replace($base_path, '', $request_uri);

// Extract controller and action
$parts = explode('/', trim($path, '/'));

$controller = isset($parts[0]) && !empty($parts[0]) ? ucfirst($parts[0]) . 'Controller' : 'NhanVienController';
$action = isset($parts[1]) && !empty($parts[1]) ? $parts[1] : 'index';

$controller = "Controllers\\" . $controller;

if (class_exists($controller)) {
    $controllerInstance = new $controller();
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        echo "Method not found";
    }
} else {
    echo "Controller not found";
}
