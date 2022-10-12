<?php include_once "models/hang_hoa.php";
if (isset($error)) {extract($error);}
extract($hang_hoa);
?>
<?php include_once "views/admin/layout/header.php";?>
    <article>
        <div class="headline">
            <h2>QUẢN LÝ HÀNG HÓA</h2>
        </div>
        <form action="?ctr=save_update_hang_hoa" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Mã hàng hóa</label>
                        <input class="form-control" type="text" name="ma_hh" value="<?=$ma_hh?>">
                    </div>
                </div>
<!--                <input type="text" name="ten_ma" value="--><?//=$ma_hh?><!--">-->
                <div class="col">
                    <div class="form-group">
                        <label for="">Tên hàng hóa</label>
                        <input class="form-control" type="text" name="ten_hh" placeholder="tên hàng" value="<?=$ten_hh?>">
                        <?php if (isset($ten_hang_err)) echo '<span>'.$ten_hang_err.'</span>'?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Đơn giá</label>
                        <input class="form-control" type="number" name="don_gia" min="0" value="<?=$don_gia?>">
                        <?php if (isset($don_gia_err)) echo '<span>'.$don_gia_err.'</span>'?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Loại hàng</label>
                        <select class="form-control" name="ma_loai" id="">
<!--                            <option value="0">Chọn loại hàng</option>-->
                            <?php foreach ($loai as $lo) : ?>
                                <option value="<?= $lo['ma_loai'] ?>" <?php if($lo['ma_loai']==$ma_loai) echo "selected"?>>
                                    <?= $lo['ten_loai'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <?php if (isset($loai_err)) echo '<span>'.$loai_err.'</span>'?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Giảm giá</label>
                        <input class="form-control" type="number" name="giam_gia" placeholder="Theo phần trăm" value="<?=$giam_gia?>">
                    </div>
                </div>
                <div class="col" hidden>
                    <div class="form-group">

                        <input class="form-control" type="text" name="hinh"  value="<?=$hinh?>" >
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Hình</label>
                        <table>
                            <tr>
                        <td><img src="public/images/<?=$hinh?>" width="100" height="150"></td>
                        <td><input type="file" name="hinh" placeholder=""></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="full">
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="mo_ta"><?=$mo_ta?></textarea>
                    </div>
                </div>

            </div>
            <button class="btn" type="submit" name="btn_update_hang" >Sửa</button>
            <button class="btn" type="button" onclick="location.href='?ctr=admin-hang-hoa'">Danh sách</button>
        </form>
    </article>

<?php include_once "views/admin/layout/footer.php" ?>