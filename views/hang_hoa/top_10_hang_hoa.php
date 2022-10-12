<ul class="list-group">
    <li class="list-group-item active" aria-current="true" align="center">Top 10 yêu thích</li>
    <?php $top= top_hang_hoa();
    $STT=0;
     foreach ($top as $top_10):
         extract($top_10);
         $STT++;?>
    <a href="?ctr=home&deltai_hang_hoa&ma_hh=<?=$ma_hh?>"><li class="list-group-item">
        <?=$STT?> -
        <img src="public/images/<?=$hinh?>" width="25" height="40">
        <?=$ten_hh?></li></a>
    <?php endforeach;?>
</ul>
