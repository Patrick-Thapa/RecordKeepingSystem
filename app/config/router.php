<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {

        // Main
    case '/':
    case '':
    case '/index.php':
        require __DIR__ . '/../../views/welcome.php';
        exit();
        break;
    case '/about':
        require __DIR__ . '/../../views/about.php';
        exit();
        break;
    case '/join':
        require __DIR__ . '/../../views/join.php';
        exit();
        break;

        // Patient
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
    case '/patient/login?error=nouser':
        require __DIR__ . '/../../views/patient/patient.login.php';
        exit();
        break;
    case '/patient/login?error=wrongpass':
        require __DIR__ . '/../../views/patient/patient.login.php';
        exit();
        break;
    case '/patient/records':
        require __DIR__ . '/../../views/patient/precords.php';
        exit();
        break;
    case '/patient/search':
        require __DIR__ . '/../../views/patient/psearch.php';
        exit();
        break;
    case '/patient/edit':
        require __DIR__ . '/../../views/patient/patient_info_edit.php';
        exit();
        break;
    case '/patient/resetpassword':
        require __DIR__ . '/../../views/patient/p_res_pass.php';
        exit();
        break;

        // Admin
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
    case '/admin/login?error=nouser':
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
    case '/admin/register/hospital':
        require __DIR__ . '/../../views/admin/aregister_h.php';
        exit();
        break;
    case '/admin/register/doctor':
        require __DIR__ . '/../../views/admin/aregister_d.php';
        exit();
        break;
    case '/admin/register/staff':
        require __DIR__ . '/../../views/admin/aregister_s.php';
        exit();
        break;
    case '/admin/register?error=wronghid':
        require __DIR__ . '/../../views/admin/aregister.php';
        exit();
        break;
    case '/admin/register?login=success':
        require __DIR__ . '/../../views/admin/aregister.php';
        exit();
        break;



    case '/logout':
        require __DIR__ . '/../config/logout.php';
        exit();
        break;

        // Doctor
    case '/doctor/login':
        require __DIR__ . '/../../views/doctor/doctor.login.php';
        exit();
        break;
    case '/doctor/login?error=nouser':
        require __DIR__ . '/../../views/doctor/doctor.login.php';
        exit();
        break;
    case '/doctor/login?error=wrongpass':
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
    case '/doctor/edit':
        require __DIR__ . '/../../views/doctor/doctor_info_edit.php';
        break;
    case '/doctor/resetpassword':
        require __DIR__ . '/../../views/doctor/d_res_pass.php';
        break;

        // Staff
    case '/staff/login':
        require __DIR__ . '/../../views/staff/staff.login.php';
        exit();
        break;
    case '/staff/login?error=nouser':
        require __DIR__ . '/../../views/staff/staff.login.php';
        exit();
        break;
    case '/staff/login?error=wrongpass':
        require __DIR__ . '/../../views/staff/staff.login.php';
        exit();
        break;
    case '/staff/loginprocess':
        require __DIR__ . '/../../views/staff/staff_login.process.php';
        exit();
        break;
    case '/staff':
        require __DIR__ . '/../../views/staff/sdashboard.php';
        exit();
        break;
    case '/staff/records':
        require __DIR__ . '/../../views/staff/srecords.php';
        exit();
        break;
    case '/staff/insert':
        require __DIR__ . '/../../views/staff/sinsert.php';
        exit();
        break;
    case '/staff/insert/connection':
        require __DIR__ . '/../../views/staff/sinsert_con.php';
        exit();
        break;
    case '/staff/edit':
        require __DIR__ . '/../../views/staff/staff_info_edit.php';
        exit();
        break;
    case '/staff/resetpassword':
        require __DIR__ . '/../../views/staff/s_res_pass.php';
        exit();
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/../../views/errors/404.php';
        exit();
        break;
}
