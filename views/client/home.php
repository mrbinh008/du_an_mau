<!--<!doctype html>-->
<!--<html lang="en">-->
<!---->
<!--<head>-->
<!--    <title>Home</title>-->
<!--     Required meta tags -->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
<!--    Bootstrap CSS v5.2.0-beta1 -->
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"-->
<!--          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">-->
<!--    <link rel="stylesheet" href="public/css/client/ds_loai.css">-->
<!--</head>-->
<!--<style>-->
<!--    .ds_loai {-->
<!--        margin: 1em 0;-->
<!--    }-->
<!--</style>-->
<?php include_once "header.php" ?>

<main>
    <div class="container-fluid">
        <div class="row">
            <article class="col-lg-9">
                <div class="row ds_hang_hoa" style="margin-left: 2.5em">
                    <?php
                    if(isset($_GET['signup'])){
                        include_once "views/tai_khoan/signup_form.php";
                    }
                    else{
                    if (isset($_GET['deltai_hang_hoa'])) {
                        include_once "views/hang_hoa/detail_hang_hoa.php";
                    }
                    else {
                        include_once "views/hang_hoa/ds_hang.php";
                    }}
                    ?>
                </div>
            </article>
            <aside class="col-lg-3">
                <div class="login_form"><?php include_once "views/tai_khoan/login_form.php" ?></div>
                <div class="ds_loai" style="margin: 1em 0;"><?php include_once "views/hang_hoa/ds_loai.php" ?></div>
                <div class="top_10_hang_hoa"><?php include_once "views/hang_hoa/top_10_hang_hoa.php" ?></div>
            </aside>
        </div>
    </div>
</main>
<?php include_once "footer.php" ?>


