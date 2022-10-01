<ul class="list-group">
    <li class="list-group-item active" aria-current="true" align="center">Top 10 yêu thích</li>
    <?php $top= top_hang_hoa();
     foreach ($top as $top_10): ?>
    <li class="list-group-item"><img src="public/images/<?=$hinh?>" width="25" height="50"><?=$top_10['ten_hh']?></li>
    <?php endforeach;?>
</ul>
