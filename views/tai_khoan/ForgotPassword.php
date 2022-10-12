<?php
//extract($khach_hang);
?>
<?php include_once "views/client/header.php";
//print_r($message);
if (isset($message)){
extract($message);}?>
<div class="headline">
    <h2>QUÊN MẬT KHẨU</h2>
</div>
<div class="row">

    <article class="col-lg-9">
        <form action="?ctr=forgot_password" method="post" enctype="multipart/form-data" class="form_edit">

            <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input class="form-control" type="text" name="ten_dn" <?php if (isset($ten_dn)) {
                    echo 'style="box-shadow: 0px 0px 10px 0px red" value="' . $ten_dn . '"';
                } ?> >
                <?php if (isset($user_err)) echo '<span>' . $user_err . '</span>'; ?>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control" type="text" name="email" <?php if (isset($email)) {
                    echo 'style="box-shadow: 0px 0px 10px 0px red" value="' . $email . '"';
                } ?> >

                <?php if (isset($email_err)) echo '<span>' . $email_err . '</span>';?>
            </div>
            <?php if (isset($login)) { echo '<span>' . $login . '</span>';} ?>
            <div class="btn_submit_edit">
                <button class="btn_edit" type="submit" name="btn_search_password">Tìm kiếm</button>
                <button class="btn_edit" type="button" onclick="location.href='?ctr=home'">Về trang chủ</button>
            </div>
        </form>
    </article>
    <aside class="col-lg-3"><?php include_once "views/tai_khoan/login_form.php" ?></aside>
</div>
<?php include_once "views/client/footer.php" ?>
