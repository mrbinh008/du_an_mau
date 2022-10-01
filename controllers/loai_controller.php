<?php
function show_loai()
{
    $loai = loai_all();
    render('list_loai', ['hang_hoa' => $loai]);
}

function show_admin_loai()
{
    $loai = loai_all();
    render('admin/loai/list', ['loai' => $loai]);
}

function add_loai()
{
    render("admin/loai/add");
}

function save_add_loai()
{
    extract($_POST);
    $data = [
        $ten_loai,
    ];
    loai_insert($data);
    header("location: ?ctr=admin-loai");
    die;
}

function update_loai()
{
    $ma_loai = $_GET['ma_loai'];
    $loai = loai_by_ma_loai($ma_loai);
    render('admin/loai/edit', ['loai' => $loai]);
}

function save_update_loai()
{
    extract($_POST);
    loai_update($ten_loai,$ma_loai);
    header("location: ?ctr=admin-loai");
    die;
}

function loai_delete()
{
    $ma_loai = $_GET['ma_loai'];
    loai_dl($ma_loai);
    header("location: ?ctr=admin-loai");
    die;
}
