<?php
//function lấy toàn bộ dữ liệu bảng loai
function loai_all()
{
    $conn = connection();
    $sql = "SELECT * FROM loai";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function loai_by_ma_loai($ma_loai)
{
    $conn = connection();
    $sql = "SELECT * FROM loai WHERE ma_loai=$ma_loai";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//Function insert hàng hóa
function loai_insert($data = [])
{
    $conn = connection();
    $sql = "INSERT INTO loai(ten_loai) VALUES(?)";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function loai_update($ten_loai, $ma_loai)
{
    $conn = connection();
//    $sql = "UPDATE hang_hoa SET ten_hh=?, don_gia=?, giam_gia=?, hinh=?, ma_loai=?, mo_ta=? WHERE ma_hh=?";
    $sql = "UPDATE loai SET ten_hh='$ten_loai' WHERE loai.ma_loai = $ma_loai";
    $stmt = $conn->prepare($sql);
    $stmt->execute($ten_loai);
}

function loai_dl($ma_loai)
{
    $conn = connection();
    $sql = "DELETE FROM loai WHERE ma_loai=$ma_loai";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

//thống kê
function so_luong_loai(){
    $conn = connection();
    $sql = "SELECT COUNT(ma_loai) as so_luong_lo FROM loai";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}