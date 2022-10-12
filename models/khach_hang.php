<?php

//function lấy toàn bộ dữ liệu bảng hang_hoa
function khach_hang_all()
{
    $conn = connection();
    $sql = "SELECT * FROM khach_hang";
//    $sql = "SELECT hang_hoa.*,loai.ten_loai FROM hang_hoa inner join loai on hang_hoa.ma_loai=loai.ma_loai;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function khach_hang_by_ma_kh($ma_kh)
{
    $conn = connection();
    $sql = "SELECT * FROM khach_hang WHERE ma_kh=$ma_kh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//Function insert hàng hóa
function khach_hang_insert($data = [])
{
    $conn = connection();
    $sql = "INSERT INTO khach_hang(ten_dn,mat_khau,ho_ten,email,hinh,vai_tro) VALUES(?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function khach_hang_signup($data = [])
{
    $conn = connection();
    $sql = "INSERT INTO khach_hang(ten_dn,mat_khau,ho_ten,email,vai_tro) VALUES(?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function khach_hang_update($ma_kh,$ho_ten,$email,$hinh)
{
    $data = [$ho_ten,$email,$hinh];
    $conn = connection();
    $sql = "UPDATE khach_hang SET ho_ten='$ho_ten',email='$email',hinh='$hinh' WHERE khach_hang.ma_kh = $ma_kh";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function khach_hang_dl($ma_kh)
{
    $conn = connection();
    $sql = "DELETE FROM khach_hang WHERE ma_kh=$ma_kh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
//account
function info_login($ten_dn,$mat_khau){
    $conn = connection();
    $sql = "SELECT * FROM khach_hang WHERE ten_dn='$ten_dn' and mat_khau='$mat_khau'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function update_password($ma_kh,$mat_khau_new){
    $data = [$mat_khau_new];
    $conn = connection();
    $sql = "UPDATE khach_hang SET mat_khau='$mat_khau_new' WHERE khach_hang.ma_kh = $ma_kh";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function info_forgot_password($ten_dn,$email){
    $conn = connection();
    $sql = "SELECT * FROM khach_hang WHERE ten_dn='$ten_dn' and email='$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
//thống kế
function so_luong_khach_hang(){
    $conn = connection();
    $sql = "SELECT COUNT(ma_kh) as so_luong_kh FROM khach_hang";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
