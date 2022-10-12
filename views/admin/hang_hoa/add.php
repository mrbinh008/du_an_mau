<?php include_once "views/admin/layout/header.php" ;
extract($error);?>
<article>
    <div class="headline">
        <h2>QUẢN LÝ HÀNG HÓA</h2>
    </div>
    <form action="?ctr=save_add_hang_hoa" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Mã hàng hóa</label>
                    <input class="form-control" type="text" name="ma_hh" readonly placeholder="auto number" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Tên hàng hóa</label>
                    <input class="form-control" type="text" name="ten_hh" placeholder="tên hàng" <?php if (isset($ten_hh)) echo 'value="'.$ten_hh.'"'?>>
                    <?php if (isset($ten_hang_err)) echo '<span>'.$ten_hang_err.'</span>'?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Đơn giá</label>
                    <input class="form-control" type="number" name="don_gia" min="0" value="0" <?php if (isset($don_gia)) echo 'value="'.$don_gia.'""'?>>
                    <?php if (isset($don_gia_err)) echo '<span>'.$don_gia_err.'</span>'?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Loại hàng</label>
                    <select class="form-control" name="ma_loai" id="">
                        <option value="0">Chọn loại hàng</option>
                        <?php foreach ($loai as $lo) : ?>
                            <option value="<?= $lo['ma_loai'] ?>" <?php if ($lo['ma_loai']==$ma_loai) echo 'selected'?>>
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
                    <input class="form-control" type="number" name="giam_gia" placeholder="Theo phần trăm">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Hình</label>
                    <input type="file" name="hinh" placeholder="">
                    <?php if (isset($img_err)) echo '<span>'.$img_err.'</span></br>'?>
                    <?php if (isset($type_err)) echo '<span>'.$type_err.'</span></br>'?>
                    <?php if (isset($size_err)) echo '<span>'.$size_err.'</span>'?>
                </div>
            </div>

            <div class="full">
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="mo_ta"></textarea>
                </div>
            </div>

        </div>
        <button class="btn" type="submit" name="btn_insert_hang">Thêm</button>
        <button class="btn" type="button" onclick="location.href='?ctr=admin-hang-hoa'">Danh sách</button>
    </form>
</article>

<?php include_once "views/admin/layout/footer.php" ?>