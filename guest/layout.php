<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="GUEST_URL" content="<?= GUEST_URL ?>">
    <title>WebSite Nhóm 5 - Guest</title>
    <link rel="stylesheet" href="<?= assetGuest('assets/css/style.css') ?>" />
    <link rel="stylesheet" href="<?= asset('assets/css/fontawesome-free-5.15.4-web/css/all.css') ?>" />

    <script src="<?= asset('assets/js/jquery-3.6.0.js') ?>"></script>
    <script src="<?= asset('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <!-- <script src="<?= asset('assets/js/zingchart.min.js') ?>"></script> -->
    <script src='https://cdn.zingchart.com/zingchart.min.js'></script>
</head>

<body>
    <!-- header -->
    <div class="container">
        <div class="row header-menu">
            <?php require_once './layout/widgets/header.php' ?>
        </div>
        <div class="row header-menu">
            <?php require_once './layout/widgets/menu.php' ?>
        </div>
    </div>
    <!-- header -->

    <!-- content -->
    <div class="container content">
        <?php
        if (file_exists($path))
            require_once $path;
        else
            require_once 'layout/errors/404.php';
        ?>
    </div>
    <!-- content -->

</body>
<script src="<?= asset('assets/js/script.js') ?>"></script>
<script src="<?= assetGuest('assets/js/script.js') ?>"></script>
<script src="<?= assetGuest('assets/js/process-cart.js') ?>"></script>
<script src="<?= asset('assets/js/sweetalert2.all.min.js') ?>"></script>
<script>
    $(function() {
        $('#btn-cart').click(function() {
            $('#cart').toggle();
        });

        $('.menu-item').click(function() {
            var children = $(this).children('a');
            children[0].click();
        });

    })
</script>

</html>