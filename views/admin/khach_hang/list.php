<?php include_once "views/admin/layout/header.php" ?>

<article>
    <div class="headline">
        <h2>QUẢN LÝ KHÁCH HÀNG</h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã KH</th>
                <th>Ảnh</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>
                    <a href="?ctr=add_khach_hang">Thêm</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $STT=0;
            foreach ($khach_hang as $kh) :
                $STT++;
                ?>
                <tr>
                    <td><?=$STT?></td>
                    <td><?= $kh['ma_kh'] ?></td>
                    <td>
                        <img src="public/images/<?= $kh['hinh'] ?>" width="123" alt="">
                    </td>
                    <td><?= $kh['ho_ten'] ?></td>
                    <td><?= $kh['email'] ?></td>
                    <td><?= $kh['vai_tro']==1?"Admin":"Khách hàng" ?></td>
                    <td>
                        <button class="btn btn-danger" type="button" onclick="return delete_confirm('<?=$kh['ho_ten']?>//','<?=$kh['ma_kh']?>')">Xóa</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</article>
<script>
    function delete_confirm(ten_kh,ma_kh){
        if(confirm("Bạn chắc muốn xóa "+ten_kh)==true){
            window.open('?ctr=delete_khach_hang&ma_kh='+ma_kh,'_self')
        }
    }
</script>
<?php include_once "views/admin/layout/footer.php" ?>