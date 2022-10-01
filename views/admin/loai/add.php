<?php include_once "views/admin/layout/header.php" ?>
    <article>
        <div class="headline">
            <h2>QUẢN LÝ LOẠI HÀNG</h2>
        </div>
        <form action="?ctr=save_add_loai" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Mã loại</label>
                        <input class="form-control" type="text" name="ma_loai" readonly placeholder="auto number"
                               disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Tên loại</label>
                        <input class="form-control" type="text" name="ten_loai" placeholder="tên hàng">
                    </div>
                </div>


            </div>
            <button class="btn" type="submit" name="btn_insert_loai">Thêm</button>
            <button class="btn" type="button" onclick="location.href='?ctr=admin-loai'">Danh sách</button>
        </form>
    </article>
<?php include_once "views/admin/layout/footer.php" ?>