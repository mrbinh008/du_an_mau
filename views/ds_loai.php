<ul class="list-group">
    <li class="list-group-item active" aria-current="true" align="center">DANH MỤC</li>
    <?php $loai= loai_all();
    foreach ($loai as $lo): ?>
        <li class="list-group-item"><?=$lo['ten_loai']?></li>
    <?php endforeach;?>
</ul>
