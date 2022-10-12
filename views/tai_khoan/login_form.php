<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Animated Login Form</title>-->
<!--    <link rel="stylesheet" href="public/css/clients/login_form.css">-->
<!--</head>-->
<!--<body>-->
<?php login(); ?>
<div class="box">
    <?php if (isset($_SESSION['user'])) {
        extract($_SESSION['user']); ?>
        <form class="form_login">
            <h2>Tài khoản</h2>
            <h6 align="center">Xin chào <?= $ho_ten ?></h6>
            <img src="public/images/<?=$hinh?>" alt="avatar" id="img_login_user" style="width: 100px;height: 100px;margin: auto">
            <ul style="margin: auto">
            <?php
            if ($vai_tro == 1)  echo '<li><a href="?ctr=home_admin">Truy cập trang admin</a></li>';
            ?>
                <li><a href="?ctr=update_khach_hang&ma_kh=<?=$ma_kh?>">Cập nhật thông tin tài khoản</a></li>
                <li><a href="?ctr=show_update_password&ma_kh=<?=$ma_kh?>">Đổi mật khẩu</a></li>
                <li><a href="?ctr=logout">Đăng xuất</a></li>
            </ul>
        </form>
    <?php } else { ?>
        <form autocomplete="on" class="form_login" method="post" action="?ctr=login">
            <h2>Sign in</h2>
            <div class="inputBox">
                <input type="text" required="required" name="ten_dn"  <?php if (isset($_GET['data'])){?>
                    value="<?=$_GET['data']?>"
                <?php } ?>>
                <span>Userame</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" required="required" name="mat_khau">
                <span>Password</span>
                <i></i>
            </div>
<!--            --><?php //if (isset($data)){ extract($data);
//            echo "<span>".$message."</span>";
//            } ?>
            <?php if (isset($_GET['login_fail'])){ ?>
                <span style="color: red">Sai tài khoản hoặc mật khẩu!!!</span>
            <?php } ?>
            <div class="links">
                <a href="?ctr=show_forgot_password">Forgot Password ?</a>
                <a href="?ctr=home&signup">Signup</a>
            </div>
            <input type="submit" value="Login" name="login">
        </form>
    <?php } ?>
</div>
<!--</body>-->
<!--</html>-->
