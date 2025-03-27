<?php

use Controllers\NhanVienController;

$request = $_GET['url'] ?? '';

if ($request == 'nhanvien/index') {
    NhanVienController::index();
} else {
    echo "404 - Controller not found";
}
