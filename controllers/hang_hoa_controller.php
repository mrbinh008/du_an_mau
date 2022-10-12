<?php
//Hiện hàng hóa trong admin
function show_admin_hang_hoa()
{
    $hang_hoa = hang_hoa_all();
    render('admin/hang_hoa/list', ['hang_hoa' => $hang_hoa]);
}

//Hiển thị form thêm hàng hóa
function add_hang_hoa()
{
    $loai = loai_all();
    render("admin/hang_hoa/add", ['loai' => $loai]);
}

//lưu dữ liệu vào csdl khi thêm
function save_add_hang_hoa()
{

    extract($_POST);
    $error = [];
    if (isset($_POST['btn_insert_hang'])) {
//check form
        if (trim($ten_hh) == "") {
            $error['ten_hang_err'] = "Vui lòng nhập tên hàng";
        }
        if (trim($don_gia) == "" || $don_gia == 0) {
            $error['don_gia_err'] = "Vui lòng nhập đơn giá";
        }
        if ($ma_loai == 0) {
            $error['loai_err'] = "Vui lòng chọn loại hàng";
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
        $ten_hh,
        $don_gia,
        $giam_gia,
        $hinh,
        $ma_loai,
        $mo_ta
    ];
    if (!$error) {
        hang_hoa_insert($data);
        header("location: ?ctr=admin-hang-hoa");
    } else {
        render("admin/hang_hoa/add", ['error' => $error, 'ten_hh' => $ten_hh, 'don_gia' => $don_gia, 'ma_loai' => $ma_loai]);
    }
    die;
}

function update_hang_hoa()
{
    $loai = loai_all();
//    $hang_hoa=hang_hoa_by_ma_hh();
    $ma_hang = $_GET['ma_hh'];
    $hang_hoa = hang_hoa_by_ma_hh($ma_hang);
    render('admin/hang_hoa/edit', ['loai' => $loai, 'hang_hoa' => $hang_hoa]);
}

function save_update_hang_hoa()
{
//    extract($_POST);
//    //Lấy dữ liệu hình ảnh
//    $image = $_FILES['hinh'];
//    //Lấy tên ảnh
//    $hinh = $image['name'];
//    //upload
//    move_uploaded_file($image['tmp_name'], "public/images/" . $hinh);
//
//    die;

    extract($_POST);
    $error = [];
    if (isset($_POST['btn_insert_hang'])) {
//check form
        if (trim($ten_hh) == "") {
            $error['ten_hang_err'] = "Vui lòng nhập tên hàng";
        }
        if (trim($don_gia) == "" || $don_gia == 0) {
            $error['don_gia_err'] = "Vui lòng nhập đơn giá";
        }
        if ($ma_loai == 0) {
            $error['loai_err'] = "Vui lòng chọn loại hàng";
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
        hang_hoa_update($ten_hh, $don_gia, $giam_gia, $hinh_update, $ma_loai, $mo_ta, $ma_hh);
        header("location: ?ctr=admin-hang-hoa");
    } else {
        render("admin/hang_hoa/edit", ['error' => $error, 'ten_hh' => $ten_hh, 'don_gia' => $don_gia, 'ma_loai' => $ma_loai]);
    }
    die;

}

function hang_hoa_delete()
{
    $ma_hang = $_GET['ma_hh'];
    hang_hoa_dl($ma_hang);
    header("location: ?ctr=admin-hang-hoa");
    die;
}

//Client
function show_hang_hoa()
{
    render('ds_hang');
}

