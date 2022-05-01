<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
    case '':
        require __DIR__ . '/../../views/welcome.php';
        exit();
        break;
    case '/about':
        require __DIR__ . '/../../views/about.php';
        exit();
        break;
    case '/admin/login':
        require __DIR__ . '/../../views/admin/admin.login.php';
        exit();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/../../views/errors/404.php';
        exit();
        break;
}
