<?php
//function lấy toàn bộ dữ liệu bảng hang_hoa
function hang_hoa_all()
{
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function hang_hoa_by_ma_hh($ma_hh)
{
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh=$ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
//Function insert hàng hóa
function hang_hoa_insert($data = [])
{
    $conn = connection();
    $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, mo_ta) VALUES(?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function hang_hoa_update($ten_hh,$don_gia,$giam_gia,$hinh,$ma_loai,$mo_ta,$ma_hh){
    $data=[$ten_hh,$don_gia,$giam_gia,$hinh,$ma_loai,$mo_ta];
    $conn = connection();
//    $sql = "UPDATE hang_hoa SET ten_hh=?, don_gia=?, giam_gia=?, hinh=?, ma_loai=?, mo_ta=? WHERE ma_hh=?";
    $sql = "UPDATE hang_hoa SET ten_hh='$ten_hh',don_gia='$don_gia',giam_gia='$giam_gia',hinh='$hinh',ma_loai='$ma_loai',mo_ta='$mo_ta' WHERE hang_hoa.ma_hh = $ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function hang_hoa_dl($ma_hh){
    $conn = connection();
    $sql = "DELETE FROM hang_hoa WHERE ma_hh=$ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

//client
function top_hang_hoa(){
    $conn = connection();
    $sql = "SElECT * FROM hang_hoa WHERE so_luot_xem >0 order by so_luot_xem DESC LIMIT 0,10";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
