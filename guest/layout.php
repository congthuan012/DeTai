<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WebSite Nhóm 5 - Admin</title>
    <link rel="stylesheet" href="<?= assetGuest('assets/css/style.css') ?>" />
    <link rel="stylesheet" href="<?= asset('assets/css/fontawesome-free-5.15.4-web/css/all.css') ?>" />

    <script src="<?= asset('assets/js/jquery-3.6.0.js') ?>"></script>
    <script src="<?= asset('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <!-- <script src="<?= asset('assets/js/zingchart.min.js') ?>"></script> -->
    <script src='https://cdn.zingchart.com/zingchart.min.js'></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="logo">
                    <img src="" alt="logo">
                    <label for="">HCT - STORE</label>
                </div>
            </div>
            <div class="col-5">
                <form action="">
                    <input id="search" type="text" placeholder="Search...">
                    <label for="search"><i class="fas fa-search"></i></label>
                </form>
            </div>
            <div class="col-2">
                <a href="tel:123456">+84123123123</a>
            </div>
            <div class="col-2">
                <button><i class="fas fa-shopping-cart"></i></button>
                <div class="block-cart container">
                    <table></table>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
</body>
<script src="<?= asset('assets/js/script.js') ?>"></script>
<script src="<?= asset('assets/js/sweetalert2.all.min.js') ?>"></script>

</html>