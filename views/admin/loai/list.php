<?php include_once "views/admin/layout/header.php" ?>

    <article>
        <div class="headline">
            <h2>QUẢN LÝ LOẠI HÀNG</h2>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>STT</th>
                <th>#</th>
                <th>Tên Loại</th>

                <th>
                    <a href="?ctr=add-loai">Thêm</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php $STT=0;
            foreach ($loai as $lo) :
                $STT++;
                ?>
                <tr>
                    <td><?=$STT?></td>
                    <td><?= $lo['ma_loai'] ?></td>
                    <td><?= $lo['ten_loai'] ?></td>
                    <td>
                        <button class="btn btn-default" type="button" onclick="location.href='?ctr=update_loai&ma_loai=<?=$lo['ma_loai']?>'">Sửa</button>
                        <button class="btn btn-danger" type="button" onclick="return delete_confirm('<?=$lo['ten_loai']?>','<?=$lo['ma_loai']?>')">Xóa</button>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </article>
    <script>
        function delete_confirm(ten_lo,ma_lo){
            if(confirm("Bạn chắc muốn xóa "+ten_lo)==true){
                window.open('?ctr=delete_loai&ma_loai='+ma_lo,'_self')
            }
        }
    </script>
<?php include_once "views/admin/layout/footer.php" ?>