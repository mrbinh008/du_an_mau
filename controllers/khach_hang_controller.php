<?php
//Hiện hàng hóa trong admin
function show_admin_khach_hang()
{
    $khach_hang = khach_hang_all();
    render('admin/khach_hang/list', ['khach_hang' => $khach_hang]);
}

//Hiển thị form thêm hàng hóa
function add_khach_hang()
{
    render("admin/khach_hang/add");
}

//lưu dữ liệu vào csdl khi thêm
function save_add_khach_hang()
{
    extract($_POST);
    $error = [];
    if (isset($_POST['btn_insert_khach_hang'])) {
//check form
        if (trim($ho_ten) == "") {
            $error['name_err'] = "Vui lòng nhập tên";
        }
        if (trim($email) == "") {
            $error['email_err'] = "Vui lòng nhập email";
        }
        if (trim($ten_dn) == "") {
            $error['user_name_err'] = "Vui lòng nhập tên đăng nhập";
        }
        if (trim($mat_khau) == "") {
            $error['password_err'] = "Vui lòng nhập mật khẩu";
        }
        if ($vai_tro==""){
            $error['vai_tro_err']="Vui lòng chọn vai trò";
        }
        //check file ảnh
        if (!empty($_FILES['hinh']['name'])) {
            $target_folder = "public/images/";
            $target_dir = $target_folder . $_FILES["hinh"]["name"];
            $filetypeAllow = ['jpg', 'png'];
            $filetype = pathinfo($target_dir, PATHINFO_EXTENSION);
            $check = getimagesize($_FILES['hinh']['tmp_name']);
            $fileSize = 20000000;
            $allowUp = true;
            if ($_FILES['hinh']['error'] > 0) {
                $error['img_err'] = "Up load lỗi";
                $allowUp = false;
            }
            if (!in_array($filetype, $filetypeAllow)) {
                $error['type_err'] = "Vui lòng upload file ảnh có dung lượng nhỏ hơn 20MB";
                $allowUp = false;
            }
            if ($_FILES['hinh']['size'] > $fileSize) {
                $error['size_err'] = "Không thể upload file có dung lượng lớn hơn 20MB";
                $allowUp = false;
            }
            if ($allowUp == true) {
                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_dir);
            }
        }
    }
    $hinh = $_FILES["hinh"]["name"];
    $data = [
        $ten_dn,
        $mat_khau,
        $ho_ten,
        $email,
        $hinh,
        $vai_tro,
    ];
    if (!$error) {
        khach_hang_insert($data);
        header("location: ?ctr=admin_khach_hang");
    }else{
        render("admin/khach_hang/add",['error'=>$error,'ten_dn'=>$ten_dn,'ho_ten'=>$ho_ten,'email'=>$email,'vai_tro'=>$vai_tro]);
    }
    die;
}

function update_khach_hang()
{
    $ma_khach_hang = $_GET['ma_kh'];
    $khach_hang = khach_hang_by_ma_kh($ma_khach_hang);
    render('tai_khoan/edit', ['khach_hang' => $khach_hang]);
}

function save_update_khach_hang()
{
    extract($_POST);
    $error = [];
    if (isset($_POST['btn_update_khach_hang'])) {
//check form
        if (trim($ho_ten) == "") {
            $error['name_err'] = "Vui lòng nhập tên";
        }
        if (trim($email) == "") {
            $error['email_err'] = "Vui lòng nhập email";
        }

        //check file ảnh
        if (!empty($_FILES['hinh']['name'])) {
            $target_folder = "public/images/";
            $target_dir = $target_folder . $_FILES["hinh"]["name"];
            $filetypeAllow = ['jpg', 'png'];
            $filetype = pathinfo($target_dir, PATHINFO_EXTENSION);
            $check = getimagesize($_FILES['hinh']['tmp_name']);
            $fileSize = 20000000;
            $allowUp = true;
            if ($_FILES['hinh']['error'] > 0) {
                $error['img_err'] = "Up load lỗi";
                $allowUp = false;
            }
            if (!in_array($filetype, $filetypeAllow)) {
                $error['type_err'] = "Vui lòng upload file ảnh có dung lượng nhỏ hơn 20MB";
                $allowUp = false;
            }
            if ($_FILES['hinh']['size'] > $fileSize) {
                $error['size_err'] = "Không thể upload file có dung lượng lớn hơn 20MB";
                $allowUp = false;
            }
            if ($allowUp == true) {
                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_dir);
            }
        }
    }
    $hinh_update = empty($_FILES['hinh']['name']) ? $hinh : $_FILES['hinh']['name'];
    if (!$error) {
        khach_hang_update($ma_kh, $ho_ten, $email, $hinh_update);
        header("location: ?ctr=home&update_user_success");
    }else{
        render("tai_khoan/edit",['error'=>$error,'ho_ten'=>$ho_ten,'email'=>$email]);
    }
    die;
}

function khach_hang_delete()
{
    $ma_khach_hang = $_GET['ma_kh'];
    khach_hang_dl($ma_khach_hang);
    header("location: ?ctr=admin_khach_hang");
    die;
}

function login()
{
    $message = [];
    $data = [];
    if (isset($_POST['login'])) {
        $ten_dn = $_POST['ten_dn'];
        $mat_khau = $_POST['mat_khau'];

        if (empty($ten_dn)) {
            $message['user'] = "Vui lòng nhập tên đăng nhập";
        }
        if (empty($mat_khau)) {
            $message['user'] = "Vui lòng nhập mật khẩu";
        }

        if (!$message) {
            $check = info_login($ten_dn, $mat_khau);
            if (is_array($check)) {
                $_SESSION['user'] = $check;
                header('location:?ctr=home&login_success');
            } else {
                $message['login'] = "Sai tài khoản, mật khẩu hoặc tài khoản không tồn tại";
                $data = [$ten_dn, $message];
                header('location:?ctr=home&login_fail&data=' . $ten_dn);
            }
        }
    }
//    return $data;
}

function logout()
{
    unset($_SESSION['user']);
    header('location:?ctr=home');
}

function show_update_password()
{
    $ma_khach_hang = $_GET['ma_kh'];
    $khach_hang = khach_hang_by_ma_kh($ma_khach_hang);
    render('tai_khoan/doi_mat_khau', ['khach_hang' => $khach_hang]);
}

function save_update_password()
{
    extract($_POST);
    if ($mat_khau == $mat_khau_check) {
        update_password($ma_kh, $mat_khau_new);
        header("location: ?ctr=home");
    } else {
//            $error = "Mật khẩu cũ không khớp";
        header('location:?ctr=show_update_password&error&ma_kh=' . $ma_kh . '&data=' . $mat_khau);

    }
    die;
}

function save_signup_khach_hang()
{
    extract($_POST);
    $data = [
        $ten_dn,
        $mat_khau,
        $ho_ten,
        $email,
        $vai_tro
    ];
    if ($ten_dn != "" && $mat_khau != "" && $ho_ten != "" && $email != "") {
        khach_hang_signup($data);
        header("location: ?ctr=home&signup&signup_success");
    } else {
        header("location: ?ctr=home&signup&signup_fail&ten_dn=" . $ten_dn . "&ho_ten=" . $ho_ten . "&email=" . $email);
    }
    die;
}

function show_forgot_password()
{

    render('tai_khoan/ForgotPassword');
}

function forgot_password()
{
    $message = [];
    $ten_dn = $_POST['ten_dn'];
    $email = $_POST['email'];
    if (isset($_POST['btn_search_password'])) {
        if ($_POST['ten_dn'] = "") {
            $message['user_err'] = "Vui lòng nhập tên đăng nhập";
        }
        if ($_POST['email'] = "") {
            $message['email_err'] = "Vui lòng nhập email";
        }
        if (!$message) {

            $check = info_forgot_password($ten_dn, $email);
            if (is_array($check)) {
                extract($check);
                $khach_hang = khach_hang_by_ma_kh($ma_kh);
                render('tai_khoan/reset_password', ['khach_hang' => $khach_hang]);
            } else {
                $message['login'] = "Sai tài khoản, email hoặc tài khoản không tồn tại";
                render('tai_khoan/ForgotPassword', ['ten_dn' => $ten_dn, 'email' => $email, 'message' => $message]);
            }
        }
    }
//    return $data;
}

function save_reset_password()
{
    extract($_POST);
    if ($mat_khau == $mat_khau_check) {
        update_password($ma_kh, $mat_khau);
        header("location: ?ctr=home&reset_password_success");
    } else {
//            $error = "Mật khẩu cũ không khớp";
//        header('location:?ctr=forgot_password&error&ma_kh=' . $ma_kh.'&data='.$mat_khau);
        render('tai_khoan/reset_password', ['ma_kh' => $ma_kh, 'mat_khau1' => $mat_khau]);
    }
    die;
}