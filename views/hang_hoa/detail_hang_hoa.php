<?php
$ma_hang = $_GET['ma_hh'];
$hang_hoa = hang_hoa_by_ma_hh($ma_hang);
extract($hang_hoa);
?>
<div class="deltai_hang_hoa">
    <div class="info">
        <ul class="list-group">
            <li class="list-group-item active" aria-current="true" align="center">CHI TIẾT SẢN PHẨM</li>
            <div class="image"><img src="public/images/<?= $hinh ?>" ></div>
            <p>
            <ul class="mo_ta">
                <li><?= $ten_hh ?></li>
                <li><?= $don_gia ?></li>
                <li><?= $giam_gia ?></li>
            </ul>
            </p>
            <div><?= $mo_ta ?></div>
        </ul>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#show_reviews").load("views/binh_luan/binh_luan_form.php", {ma_hh:<?= $ma_hh?>});
        });
    </script>
    <div class="reviews" id="show_reviews" style="margin: 1.5em 0">
        <?php include_once "views/binh_luan/binh_luan_form.php";?>
    </div>
</div>
