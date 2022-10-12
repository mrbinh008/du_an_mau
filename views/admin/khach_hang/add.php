<?php include_once "views/admin/layout/header.php" ;
//if (isset($data)) extract($data);
if (isset($error)) extract($error);
//print_r($data);
?>
    <article>
        <div class="headline">
            <h2>QUẢN LÝ KHÁCH HÀNG</h2>
        </div>
        <form action="?ctr=save_add_khach_hang" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Mã khách hàng</label>
                        <input class="form-control" type="text" name="ma_kh" readonly placeholder="auto number"
                               disabled >
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="">Họ tên</label>
                        <input class="form-control" type="text" name="ho_ten" placeholder="Họ tên" <?php if (isset($ho_ten)) echo 'value="'.$ho_ten.'"'?> >
                        <?php if (isset($name_err)) echo '<span>'.$name_err.'</span>'?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Vai trò</label>
                        <select class="form-control" name="vai_tro" id="">
                            <option value="">Chọn vai trò</option>
                            <option value="1" <?php if ($vai_tro==1) echo 'selected'; ?> >Quản trị</option>
                            <option value="0" <?php if ($vai_tro==0) echo 'selected'; ?>>Khách hàng</option>
                        </select>
                        <?php if (isset($vai_tro_err)) echo '<span>'.$vai_tro_err.'</span>'?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="text" name="email" placeholder="Email" <?php if (isset($email)) echo 'value="'.$email.'"'?>>
                        <?php if (isset($email_err)) echo '<span>'.$email_err.'</span>'?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Tên đăng nhập</label>
                        <input class="form-control" type="text" name="ten_dn" placeholder="Tên đăng nhập" <?php if (isset($ten_dn)) echo 'value="'.$ten_dn.'"'?>>
                        <?php if (isset($user_name_err)) echo '<span>'.$user_name_err.'</span>'?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input class="form-control" type="password" name="mat_khau" placeholder="Mật khẩu">
                        <?php if (isset($password_err)) echo '<span>'.$password_err.'</span>'?>
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

            </div>
            <button class="btn" type="submit" name="btn_insert_khach_hang">Thêm</button>
            <button class="btn" type="button" onclick="location.href='?ctr=admin_khach_hang'">Danh sách</button>
        </form>
    </article>

<?php include_once "views/admin/layout/footer.php" ?>