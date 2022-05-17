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
        break; case '':
            require __DIR__ . '/../../views/welcome.php';
            exit();
            break; 
    case '/patient':
        require __DIR__ . '/../../views/patient/pdashboard.php';
        exit();
        break;
    case '/patient/loginprocess':
        require __DIR__ . '/../../views/patient/patient_login.process.php';
        exit();
        break;
    case '/patient/login':
        require __DIR__ . '/../../views/patient/patient.login.php';
        exit();
        break;
    case '/admin':
        require __DIR__ . '/../../views/admin/admin_panel.php';
        exit();
        break;
    case '/admin/loginprocess':
        require __DIR__ . '/../../views/admin/admin_login.process.php';
        exit();
        break;
    case '/admin/login':
        require __DIR__ . '/../../views/admin/admin.login.php';
        exit();
        break;
    case '/logout':
        require __DIR__ . '/../config/logout.php';
        exit();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/../../views/errors/404.php';
        exit();
        break;
}
