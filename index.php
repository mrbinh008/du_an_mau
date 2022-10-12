<?php
//models
require_once "models/connection.php";
require_once "models/hang_hoa.php";
require_once "models/loai.php";
require_once "models/khach_hang.php";
require_once "models/binh_luan.php";
//controllers
require_once "controllers/controller.php";
require_once "controllers/home_controller.php";
require_once "controllers/errors_controller.php";
require_once "controllers/about_controller.php";
require_once "controllers/contact_controller.php";
require_once "controllers/hang_hoa_controller.php";
require_once "controllers/loai_controller.php";
require_once "controllers/khach_hang_controller.php";
require_once "controllers/binh_luan_controller.php";
//Lấy thông tin controller từ URL
$ctr = isset($_GET['ctr']) ? $_GET['ctr'] : '/';
session_start();
switch ($ctr) {
    //CONTROLLER CLIENT
    case '/':
    case 'home':
        show_home();
        break;
    case 'about':
        show_about();
        break;
    case 'contact':
        show_contact();
        break;
    case 'update_khach_hang':
        update_khach_hang();
        break;
    case 'save_update_khach_hang':
        save_update_khach_hang();
        break;
    case 'show_update_password':
        show_update_password();
        break;
    case 'save_update_password':
        save_update_password();
        break;
    case 'save_signup_khach_hang':
        save_signup_khach_hang();
        break;
    case 'show_forgot_password':
        show_forgot_password();
        break;
    case 'forgot_password':
        forgot_password();
        break;
    case 'save_reset_password':
        save_reset_password();
        break;
    case 'send_binh_luan':
        send_binh_luan();
        break;
    //CONTROLLER ADMIN

    //hàng hóa admin
    case 'add-hang-hoa':
        add_hang_hoa();
        break;
    case 'save_add_hang_hoa':
        save_add_hang_hoa();
        break;
    case 'admin-hang-hoa':
        show_admin_hang_hoa();
        break;
    case 'update_hang_hoa':
        update_hang_hoa();
        break;
    case 'save_update_hang_hoa':
        save_update_hang_hoa();
        break;
    case 'delete_hang_hoa':
        hang_hoa_delete();
        break;

        //khach_hang admin

    case 'add_khach_hang':
        add_khach_hang();
        break;
    case 'save_add_khach_hang':
        save_add_khach_hang();
        break;
    case 'admin_khach_hang':
        show_admin_khach_hang();
        break;

    case 'delete_khach_hang':
        khach_hang_delete();
        break;
    //loại admin
    case 'add-loai':
        add_loai();
        break;
    case 'save_add_loai':
        save_add_loai();
        break;
    case 'admin-loai':
        show_admin_loai();
        break;
    case 'update_loai':
        update_loai();
        break;
    case 'save_update_loai':
        save_update_loai();
        break;
    case 'delete_loai':
        loai_delete();
        break;
    //home admin
    case 'home_admin':
        show_home_admin();
        break;
//binh_luan_admin
    case 'admin_binh_luan':
        show_admin_binh_luan();
        break;
    case 'delete_binh_luan':
        binh_luan_delete();
        break;
    //login
    case'login':
        login();
        break;
    case 'logout':
        logout();
        break;
    default:
        error_404_show();
}



