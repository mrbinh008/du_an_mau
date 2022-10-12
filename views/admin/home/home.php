<?php $hang_hoa = thong_ke_hang_hoa() ;
extract($user);
extract($hang_hoa1);
extract($loai);
 include_once "views/admin/layout/header.php" ?>
<html>
<head>
    <script src="https://kit.fontawesome.com/95ecdda2aa.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['ten_loai', 'size_product'],
                <?php
                foreach ($hang_hoa as $hh) {
                    echo "['" . $hh['ten_loai'] . "',".$hh['size_product'] ."],";
                }
                ?>
            ]);

            var options = {
                title: 'Thống kê số lượng sản phẩm theo loại hàng'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>
<h3>Chào mừng <?=$_SESSION['user']['ho_ten']?> đến trang quản trị</h3>
<button type="button" onclick="location.href='?ctr=home'">Về website</button>
<table class="thong_ke">
    <caption>Bảng thống kê</caption>
    <tr>
    <td class="thong_ke_user">
        <i class="fa-solid fa-user icon" id="icon_user"></i>
        <span><?=$so_luong_kh?> thành viên</span>
    </td>
    <td class="thong_ke_loai">
        <i class="fa-solid fa-cart-flatbed-suitcase icon" id="icon_loai"></i>
        <span><?=$so_luong_lo?> loại hàng</span>
    </td>
    <td class="thong_ke_hang_hoa">
        <i class="fa-solid fa-cubes-stacked icon" id="icon_hh"></i>
        <span><?=$so_luong_hang?> sản phẩm</span>
    </td>
    </tr>
</table>

<div id="piechart" style="width: 900px; height: 500px;margin: 0;padding: 0"></div>
</body>
</html>
<?php include_once "views/admin/layout/footer.php" ?>


