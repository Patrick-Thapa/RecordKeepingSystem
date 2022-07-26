<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
    case '':
    case '/index.php':
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
    case '/admin/login?error=wrongpass':
        require __DIR__ . '/../../views/admin/admin.login.php';
        exit();
    case '/admin/register':
        require __DIR__ . '/../../views/admin/aregister.php';
        exit();
        break;
    case '/admin/register?login=success':
        require __DIR__ . '/../../views/admin/aregister.php';
        exit();
        break;
    case '/admin/register?error=wronguser':
        require __DIR__ . '/../../views/admin/aregister.php';
        exit();
        break;
    case '/admin/delete':
        require __DIR__ . '/../../views/admin/adelete.php';
        exit();
        break;
    case '/admin/delete/patient':
        require __DIR__ . '/../../views/admin/adelete_p.php';
        exit();
        break;
    case '/admin/delete?login=success':
        require __DIR__ . '/../../views/admin/adelete.php';
        exit();
        break;
    case '/admin/delete?error=wronguser':
        require __DIR__ . '/../../views/admin/adelete.php';
        exit();
        break;   
    case '/admin/register/patient':
        require __DIR__ . '/../../views/admin/aregister_p.php';
        exit();
        break;
    case '/logout':
        require __DIR__ . '/../config/logout.php';
        exit();
        break;
    case '/doctor/login':
        require __DIR__ . '/../../views/doctor/doctor.login.php';
        exit();
        break;
    case '/doctor/login/process':
        require __DIR__ . '/../../views/doctor/doctor_login.process.php';
        break;
    case '/doctor/dashboard':
        require __DIR__ . '/../../views/doctor/ddashboard.php';
        break;
    case '/doctor/records':
        require __DIR__ . '/../../views/doctor/drecords.php';
        break;
    case '/doctor/search':
        require __DIR__ . '/../../views/doctor/dsearch.php';
        break;
    case '/doctor/insert':
        require __DIR__ . '/../../views/doctor/dinsert.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/../../views/errors/404.php';
        exit();
        break;

}
