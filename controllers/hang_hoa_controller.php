<?php
//Hiển thị toàn bộ dữ liệu trong bảng hàng hóa
function show_hang_hoa()
{
    $hang_hoa = hang_hoa_all();
    render('list_hang_hoa', ['hang_hoa' => $hang_hoa]);
}

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
    // var_dump($_POST);
    // die;
    extract($_POST);
    //Lấy dữ liệu hình ảnh
    $image = $_FILES['hinh'];
    //Lấy tên ảnh
    $hinh = $image['name'];
    //upload
    move_uploaded_file($image['tmp_name'], "public/images/" . $hinh);

    //Tạo mảng data để insert dữ liệu
    $data = [
        $ten_hh,
        $don_gia,
        $giam_gia,
        $hinh,
        $ma_loai,
        $mo_ta
    ];
    //Insert dữ liệu
    hang_hoa_insert($data);
    header("location: ?ctr=admin-hang-hoa");
    die;
}

function update_hang_hoa(){
    $loai = loai_all();
//    $hang_hoa=hang_hoa_by_ma_hh();
    $ma_hang=$_GET['ma_hh'];
    $hang_hoa=hang_hoa_by_ma_hh($ma_hang);
    render('admin/hang_hoa/edit',['loai'=>$loai,'hang_hoa'=>$hang_hoa]);
}
function save_update_hang_hoa()
{
//   echo '<pre>';
//    var_dump($_POST);
//    echo '</pre>';
    extract($_POST);
    //Lấy dữ liệu hình ảnh
    $image = $_FILES['hinh'];
    //Lấy tên ảnh
    $hinh = $image['name'];
    //upload
    move_uploaded_file($image['tmp_name'], "public/images/" . $hinh);

    //Tạo mảng data để update dữ liệu
//    $data = [
//        $ten_hh,
//        $don_gia,
//        $giam_gia,
//        $hinh,
//        $ma_loai,
//        $mo_ta,
//        $ma_hh
//    ];
    hang_hoa_update($ten_hh,$don_gia,$giam_gia,$hinh,$ma_loai,$mo_ta,$ma_hh);
    header("location: ?ctr=admin-hang-hoa");
    die;
}
function hang_hoa_delete(){
    $ma_hang=$_GET['ma_hh'];
    hang_hoa_dl($ma_hang);
    header("location: ?ctr=admin-hang-hoa");
    die;
}

//function top_10_hang_hoa()
//{
//    $top_10_hang_hoa = top_hang_hoa();
//    render('cilent/top_10_hang_hoa', ['top_10_hang_hoa' => $top_10_hang_hoa]);
//}

