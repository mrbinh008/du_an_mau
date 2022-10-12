<?php
extract($khach_hang);
?>
<?php include_once "views/client/header.php"; ?>
    <div class="headline">
        <h2>CẬP NHẬT MẬT KHẨU</h2>
    </div>
    <div class="row">

        <article class="col-lg-9">
            <form action="?ctr=save_reset_password" method="post" enctype="multipart/form-data" class="form_edit">
                <div class="form-group" hidden>
                    <label for="">Mã khách hàng</label>
                    <input class="form-control" type="text" name="ma_kh" value="<?= $ma_kh ?>">
                </div>

                <div class="form-group">
                    <label for="">Mật khẩu mới</label>
                    <input class="form-control" type="text" name="mat_khau" <?php if (isset($mat_khau1)){
                        echo 'style="box-shadow: 0px 0px 10px 0px red"';
                    } if (isset($mat_khau1)){ echo 'value='.$mat_khau1;}?>>
                </div>

                <div class="form-group">
                    <label for="">Nhập lại mật khẩu mới</label>
                    <input class="form-control" type="password" name="mat_khau_check">
                </div>
                <?php if (isset($mat_khau1)){ ?>
                    <span>Không trùng mật khẩu</span>
                <?php } ?>
                <div class="btn_submit_edit">
                    <button class="btn_edit" type="submit" name="btn_save_reset_password">Cập nhật</button>
<!--                    <button class="btn_edit" type="button" onclick="location.href='?ctr=home'">Về trang chủ</button>-->
                </div>
            </form>
        </article>
        <aside class="col-lg-3"><?php include_once "views/tai_khoan/login_form.php" ?></aside>
    </div>
<?php include_once "views/client/footer.php" ?>