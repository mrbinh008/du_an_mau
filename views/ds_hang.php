<?php
$hang_hoa=hang_hoa_all();
foreach ($hang_hoa as $hh):
extract($hh);
?>
<div class="hang_hoa col-lg-4" style="border: 1px solid gray;margin: 0.5em; width: 300px" >

    <img src="public/images/<?=$hinh?>" width="200" height="220">
    <h5 align="center"><?= $ten_hh?></h5>
    <span><?=$don_gia?></span>

</div>
<?php endforeach; ?>
