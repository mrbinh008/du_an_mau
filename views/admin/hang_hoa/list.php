<?php include_once "views/admin/layout/header.php" ?>

<article>
    <div class="headline">
        <h2>QUẢN LÝ HÀNG HÓA</h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>#</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Lượt xem</th>
                <th>Ngày đăng</th>
                <th>
                    <a href="?ctr=add-hang-hoa">Thêm</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $STT=0;
            foreach ($hang_hoa as $hh) :
                $STT++;
                ?>
                <tr>
                    <td><?=$STT?></td>
                    <td><?= $hh['ma_hh'] ?></td>
                    <td>
                        <img src="public/images/<?= $hh['hinh'] ?>" width="123" alt="">
                    </td>
                    <td><?= $hh['ten_hh'] ?></td>
                    <td><?= $hh['don_gia'] ?></td>
                    <td><?= $hh['so_luot_xem'] ?></td>
                    <td><?= $hh['ngay_nhap'] ?></td>
                    <td>
                        <button class="btn btn-default" type="button" onclick="location.href='?ctr=update_hang_hoa&ma_hh=<?=$hh['ma_hh']?>'">Sửa</button>
                        <button class="btn btn-danger" type="button" onclick="return delete_confirm('<?=$hh['ten_hh']?>','<?=$hh['ma_hh']?>')">Xóa</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</article>
<script>
    function delete_confirm(ten_hh,ma_hh){
        if(confirm("Bạn chắc muốn xóa "+ten_hh)==true){
            window.open('?ctr=delete_hang_hoa&ma_hh='+ma_hh,'_self')
        }
    }
</script>
<?php include_once "views/admin/layout/footer.php" ?>