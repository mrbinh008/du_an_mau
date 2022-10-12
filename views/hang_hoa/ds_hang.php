<?php
if (isset($_GET['ma_loai'])) {
    $ma_loai = $_GET['ma_loai'];
    $hang_hoa = hang_hoa_by_loai($ma_loai);
    $so_hang = so_luong_hang_hoa_by_loai($ma_loai);
} elseif (isset($_GET['search'])) {
    $ten_hh = $_GET['search'];
    $hang_hoa = search_hang_hoa_by_ten($ten_hh);
} else {
    $hang_hoa = hang_hoa_all();
    $so_hang = so_luong_hang_hoa();
}
$loai = loai_all();
?>
<div id="carouselExampleCaptions" class="carousel slide"
     data-bs-ride="carousel" <?php if (isset($_GET['ma_loai']) || isset($_GET['search'])) echo 'hidden' ?> >
    <div class="carousel-indicators">
        <?php $top = top_hang_hoa();
        $STT = -1;
        foreach ($top as $top_10):
            $STT++;
            ?>
            <button type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide-to="<?= $STT ?>" <?php if ($STT == 0) echo 'class="active"
                aria-current="true"' ?> aria-label="Slide <?= $STT + 1 ?>"></button>
        <?php endforeach; ?>
    </div>
    <div class="carousel-inner">
        <?php $top = top_hang_hoa();
        $STT = 0;
        foreach ($top as $top_10):
            extract($top_10);
            $STT++;
            ?>
            <div class="carousel-item <?php if ($STT == 1) echo 'active' ?>">
                <img src="public/images/<?= $hinh ?>" class="d-block w-100" alt="..." height="500">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slide <?= $STT ?> label</h5>
                    <p><?= $ten_hh ?></p>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<div style="display: flex;justify-items: center">
    <h5>
        <?php
        if (isset($_GET['ma_loai'])) {
            foreach ($loai as $lo) {
                extract($lo);
//                foreach ($so_hang as $sh) {
                extract($so_hang);
                if ($ma_loai == $_GET['ma_loai']) {
                    echo $ten_loai . " </h5><span> > " . $so_luong . " sản phẩm</span>";
                }
//                }
            }
        } else {
            echo "Tất cả sản phẩm";
        }
        ?>
</div>
<?php
foreach ($hang_hoa as $hh):
    extract($hh);

    ?>
    <div class="hang_hoa col-lg-4" style="border: 1px solid gray;margin: 0.5em; width: 300px"
         onclick="location.href='index.php?ctr=home&deltai_hang_hoa&ma_hh=<?= $ma_hh ?>'">
        <img src="public/images/<?= $hinh ?>" width="200" height="220" id="img_ds_hang">
        <h5 align="center"><?= $ten_hh ?></h5>
        <span><?= $don_gia ?></span>

    </div>
<?php endforeach; ?>
