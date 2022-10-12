<ul class="list-group">
    <li class="list-group-item active" aria-current="true" align="center">DANH MỤC</li>
    <?php $loai = loai_all();
    foreach ($loai as $lo): ?>
        <a href="?ctr=home&loai&ma_loai=<?= $lo['ma_loai'] ?>"><li class="list-group-item"><?= $lo['ten_loai'] ?></li></a>
    <?php endforeach; ?>
    <li class="list-group-item" style="background-color: white !important;">
        <form action="?ctr=home" method="get" style="display: flex;padding: 0;margin: 0;background-color: white">

                <input type="text" name="search" class="search" placeholder="Tìm kiếm sản phẩm" width="150" height="40">
                <button type="submit" class="search" style="width: 75px;height: 30px;margin-left: 0.5em">Tìm</button>

        </form>
    </li>
</ul>
