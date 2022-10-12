<?php
//Hiện hàng hóa trong admin
function show_admin_binh_luan()
{
    $khach_hang=khach_hang_all();
    $hang_hoa=hang_hoa_all();
    $binh_luan = binh_luan_all();
    render('admin/binh_luan/list', ['binh_luan' => $binh_luan,'hang_hoa' => $hang_hoa,'khach_hang' => $khach_hang]);
}
function send_binh_luan(){
//    extract($_POST);
    if (isset($_POST['send_binh_luan'])) {
        if ($_POST['noi_dung']!=""){
        $ma_kh = $_SESSION['user']['ma_kh'];
        $ma_hh = $_POST['ma_hh'];
        $noi_dung = $_POST['noi_dung'];
        $ngay_bl = date('Y-m-d');
        if (!empty($noi_dung)){
            binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl);
//            header("location".$_SERVER['HTTP_REFERER']);
        header('location: ?ctr=home&deltai_hang_hoa&ma_hh='.$ma_hh);
        }}}
}

//function update_binh_luan(){
////    $hang_hoa=hang_hoa_by_ma_hh();
//    $ma_binh_luan=$_GET['ma_bl'];
//    $binh_luan=binh_luan_by_ma_bl($ma_bimh_luan);
//    render('admin/binh_luan/edit',['binh_luan'=>$binh_luan]);
//}
//function save_update_binh_luan()
//{
//    extract($_POST);
//    binh_luan_update($ma_bl,$noi_dung,$ngay_bl);
//    header("location: ?ctr=admin_binh_luan");
//    die;
//}
function binh_luan_delete(){
    $ma_binh_luan=$_GET['ma_bl'];
    binh_luan_dl($ma_binh_luan);
    header("location: ?ctr=admin_binh_luan");
    die;
}




