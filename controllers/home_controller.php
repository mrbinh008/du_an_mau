<?php
//Hiển thị trang chủ
function show_home()
{
    render("client/home");
}
function show_home_admin(){
    $loai=so_luong_loai();
    $hang_hoa=so_luong_hang_hoa();
    $user=so_luong_khach_hang();
    render("admin/home/home",['loai'=>$loai,'hang_hoa1'=>$hang_hoa,'user'=>$user]);
}
