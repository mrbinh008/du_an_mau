<?php include_once "views/admin/layout/header.php"
?>

    <article>
        <div class="headline">
            <h2>QUẢN LÝ BÌNH LUẬN</h2>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>STT</th>
                <th>Mã Bl</th>
                <th>Tên KH</th>
                <th>Tên HH</th>
                <th>Nội Dung</th>
                <th>Ngày BL</th>
                <th>Action</th>
                <!--                <th>-->
                <!--                    <a href="?ctr=add-loai">Thêm</a>-->
                <!--                </th>-->
            </tr>
            </thead>
            <tbody>
            <?php $STT = 0;
            foreach ($binh_luan as $bl) :
                $STT++;
                ?>
                <tr>
                    <td><?= $STT ?></td>
                    <td><?= $bl['ma_bl'] ?></td>
                    <td> <?php foreach ($khach_hang as $kh) {
                            extract($kh);
                            echo $bl['ma_kh'] == $ma_kh ? $ho_ten : null ?>
                        <?php } ?></td>
                    <td><?php foreach ($hang_hoa as $hh) {
                            extract($hh);
                            echo $bl['ma_hh'] == $ma_hh ? $ten_hh : null ?>
                        <?php } ?></td>
                    <td><?= $bl['noi_dung'] ?></td>
                    <td><?= $bl['ngay_bl'] ?></td>
                    <td>
                        <button class="btn btn-danger" type="button"
                                onclick="return delete_confirm('<?= $bl['ma_bl'] ?>')">Xóa
                        </button>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </article>
    <script>
        function delete_confirm(ma_bl) {
            if (confirm("Bạn chắc muốn xóa " + ma_bl) == true) {
                window.open('?ctr=delete_binh_luan&ma_bl=' + ma_bl, '_self')
            }
        }
    </script>
<?php include_once "views/admin/layout/footer.php" ?>