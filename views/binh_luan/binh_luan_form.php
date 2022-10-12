<?php
include_once '../../controllers/binh_luan_controller.php';
include_once '../../models/binh_luan.php';
include_once '../../models/khach_hang.php';
include_once '../../models/connection.php';
session_start();
$ma_hh=$_REQUEST['ma_hh'];
$binh_luan=binh_luan_by_ma_hh($ma_hh);
$khach_hang=khach_hang_all();

?>


<div class="info">
    <div class="show_binh_luan">
    <ul class="list-group">
        <li class="list-group-item active" aria-current="true" align="center">BÌNH LUẬN</li>

        <table class="binh_luan">
            <tr>
                <th>Tên người dùng</th>
                <th>Nội dung</th>
                <th>Ngày bình luận</th>
            </tr>
            <?php foreach ($binh_luan as $bl){
                ?>
            <tr>
            <td>
                <?php foreach ($khach_hang as $kh){
                extract($kh);
                 if($bl['ma_kh']==$ma_kh) echo $ho_ten;} ?>
            </td>
            <td><?= $bl['noi_dung']?></td>
            <td><?= $bl['ngay_bl'] ?></td>
            </tr>
            <?php } ?>
        </table>
        </p>
<!--        <div>--><?//= $mo_ta ?><!--</div>-->
    </ul>
    </div>
    <div class="send_binh_luan">
        <form action="?ctr=send_binh_luan" method="post" <?php if(!isset($_SESSION['user']['ma_kh'])) echo "hidden";?>>
            <input type="text" name="ma_hh" value="<?=$ma_hh?>" hidden>
            <input type="text" name="noi_dung" id="input_binh_luan" placeholder="Nội dung bình luận">
            <button type="submit" name="send_binh_luan" id="button_binh_luan">Gửi</button>
        </form>
        <?php if(!isset($_SESSION['user'])) echo "<p style='color: orange;font-size: large;font-weight: 500;text-align: center;padding: 0.7em 0em' >Vui lòng đăng nhập để bình luận</p>";?>
    </div>

<!--    --><?php
//    if (isset($_POST['send_binh_luan'])) {
//        $ma_kh = $_SESSION['user']['ma_kh'];
//        $ma_hh = $_POST['ma_hh'];
//        $noi_dung = $_POST['noi_dung'];
//        $ngay_bl = date('Y-m-d');
//        if (!empty($noi_dung)){
//            binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl);
//            header("location".$_SERVER['HTTP_REFERER']);
////    header('location: duanmau_we17308?ctr=home&deltai_hang_hoa&ma_hh='.$ma_hh);
//        }}
//    ?>
</div>