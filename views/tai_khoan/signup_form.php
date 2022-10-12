<?php //include_once "views/client/header.php" ?>

    <div class="headline">
        <h2>ĐĂNG KÍ TÀI KHOẢN</h2>
    </div>
    <div class="form">
        <form action="?ctr=save_signup_khach_hang" method="post" enctype="multipart/form-data">
            <?php if (isset($_GET['signup_fail'])) {
                echo "<span  style='color: red;'>Vui lòng điền đầy đủ thông tin </span>";
            } ?>
            <?php if (isset($_GET['signup_success'])) {
                echo "<span  style='color: red;'>Đăng kí thành công</span>";
            } ?>
            <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input class="form-control" type="text" name="ten_dn" id="username_signup" onchange="return check_username()"
                       placeholder="Tên đăng nhập" <?php if (isset($_GET['ten_dn'])) { ?>  value="<?= $_GET['ten_dn'] ?>"; <?php } ?>>
                <span id="username_err"></span>
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input class="form-control" type="password" name="mat_khau" placeholder="Mật khẩu" value="">
            </div>
            <div class="form-group" hidden>
                <input class="form-control" type="text" name="vai_tro" value="0" >
            </div>
            <div class="form-group">
                <label for="">Họ tên</label>
                <input class="form-control" type="text" name="ho_ten" id="name_signup" oninput="return check_name()"
                       placeholder="Họ tên" <?php if (isset($_GET['ho_ten'])) { ?>  value="<?= $_GET['ho_ten'] ?>"; <?php } ?>>
                <span id="name_err"></span>
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control" type="text" name="email" id="email_signup" oninput="return check_email()"
                       placeholder="Email" <?php if (isset($_GET['email'])) { ?>  value="<?= $_GET['email'] ?>"; <?php } ?>>
                <span id="email_signup_err"></span>
            </div>

            <div class="btn_submit_edit">
                <button class="btn_edit" type="submit" name="btn_signup_khach_hang">Signup</button>
                <button class="btn_edit" type="button" onclick="location.href='?ctr=home'">Về trang chủ</button>
            </div>
        </form>
    </div>

<?php //include_once "views/client/footer.php" ?>