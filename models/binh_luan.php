<?php

//function lấy toàn bộ dữ liệu bảng hang_hoa
function binh_luan_all()
{
    $conn = connection();
    $sql = "SELECT * FROM binh_luan";
//    $sql = "SELECT hang_hoa.*,loai.ten_loai FROM hang_hoa inner join loai on hang_hoa.ma_loai=loai.ma_loai;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function binh_luan_by_ma_hh($ma_hh)
{
    $conn = connection();
    $sql = "SELECT * FROM binh_luan WHERE ma_hh=$ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//Function insert hàng hóa
function binh_luan_insert($ma_kh,$ma_hh,$noi_dung,$ngay_bl)
{
    $data=[$ma_kh,$ma_hh,$noi_dung,$ngay_bl];
    $conn = connection();
    $sql = "INSERT INTO binh_luan(ma_kh,ma_hh,noi_dung,ngay_bl) VALUES('$ma_kh','$ma_hh','$noi_dung','$ngay_bl')";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function binh_luan_update($ma_bl,$noi_dung,$ngay_bl)
{
    $data = [$noi_dung,$ngay_bl];
    $conn = connection();
//    $sql = "UPDATE hang_hoa SET ten_hh=?, don_gia=?, giam_gia=?, hinh=?, ma_loai=?, mo_ta=? WHERE ma_hh=?";
    $sql = "UPDATE binh_luan SET noi_dung='$noi_dung',ngay_bl='$ngay_bl' WHERE binh_luan.ma_bl = $ma_bl";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function binh_luan_dl($ma_bl)
{
    $conn = connection();
    $sql = "DELETE FROM binh_luan WHERE ma_bl=$ma_bl";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

