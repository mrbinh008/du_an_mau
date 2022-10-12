<?php //include_once "models/hang_hoa.php";
extract($khach_hang);
?>
<?php include_once "views/client/header.php"; ?>
    <div class="headline">
        <h2>CẬP NHẬT THÔNG TIN</h2>
    </div>
    <div class="row">

        <article class="col-lg-9">
            <form action="?ctr=save_update_khach_hang" method="post" enctype="multipart/form-data" class="form_edit">
                <div class="form-group" hidden>
                    <label for="">Mã khách hàng</label>
                    <input class="form-control" type="text" name="ma_kh" value="<?= $ma_kh ?>">
                </div>

                <div class="form-group">
                    <label for="">Họ tên</label>
                    <input class="form-control" type="text" name="ho_ten" value="<?= $ho_ten ?>">
                    <?php if (isset($name_err)) echo '<span>' . $name_err . '</span>' ?>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control" type="text" name="email" value="<?= $email ?>">
                    <?php if (isset($email_err)) echo '<span>' . $email_err . '</span>' ?>
                </div>

                <div class="form-group">
                    <label for="">Hình</label>
                    <div class="row">
                        <img src="public/images/<?= $hinh ?>" class="image_edit">
                        <input type="file" name="hinh" placeholder="">
                    </div>
                </div>
                <div class="col" hidden>
                    <div class="form-group">

                        <input class="form-control" type="text" name="hinh"  value="<?=$hinh?>" >
                    </div>
                </div>
                <div class="btn_submit_edit">
                    <button class="btn_edit" type="submit" name="btn_update_khach_hang">Cập nhật</button>
                    <button class="btn_edit" type="button" onclick="location.href='?ctr=home'">Về trang chủ</button>
                </div>
            </form>
        </article>
        <aside class="col-lg-3"><?php include_once "views/tai_khoan/login_form.php" ?></aside>
    </div>
<?php include_once "views/client/footer.php" ?>