
    <!doctype html>
    <html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS v5.2.0-beta1 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
              integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
<style>
    .ds_loai{
        margin: 1em 0;
    }
</style>
    <body>
    <header>
        <?php include_once "header.php" ?>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <article class="col-lg-9">
                    <div class="row ds_hang_hoa" style="margin-left: 2.5em"><?php include_once "views/ds_hang.php"?></div>
                </article>
                <aside class="col-lg-3">
                    <div class="login_form"><?php include_once "login_form.php"?></div>
                    <div class="ds_loai"><?php include_once "views/ds_loai.php"?></div>
                    <div class="top_10_hang_hoa"><?php include_once "views/top_10_hang_hoa.php" ?></div>
                </aside>
            </div>
        </div>
    </main>
    <footer>
        <?php include_once "footer.php" ?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
            integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
            integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    </body>

    </html>

