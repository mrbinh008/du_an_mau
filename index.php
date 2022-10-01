<?php
//models
require_once "models/connection.php";
require_once "models/hang_hoa.php";
require_once "models/loai.php";
//controllers
require_once "controllers/controller.php";
require_once "controllers/home_controller.php";
require_once "controllers/errors_controller.php";
require_once "controllers/about_controller.php";
require_once "controllers/contact_controller.php";
require_once "controllers/hang_hoa_controller.php";
require_once "controllers/loai_controller.php";

//Lấy thông tin controller từ URL
$ctr = isset($_GET['ctr']) ? $_GET['ctr'] : '/';

switch ($ctr) {
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
    case 'hang-hoa':
        show_hang_hoa();
        break;
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
    case 'home_admin':
        show_home_admin();
        break;
    default:
        error_404_show();
}
