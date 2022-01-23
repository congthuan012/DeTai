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
        <div class="row header-menu">
            <div class="col-3 block-logo">
                <img src="<?= asset('assets/img/no-image.png') ?>" alt="logo">
                <label for="">HCT - STORE</label>
            </div>
            <div class="col-5 block-search">
                <form action="" class="form-search">
                    <input id="search" type="text" placeholder="Search...">
                    <label for="search"><i class="fas fa-search"></i></label>
                </form>
            </div>
            <div class="col-2 block-phone">
                <i class="fas fa-phone-alt"></i>
                <a href="tel:123456">+84123123123</a>
            </div>
            <div class="col-2 block-cart">
                <button id="btn-cart"><i class="fas fa-shopping-cart"></i></button>
                <div id="cart" class="cart-detail container">
                    <div class="row block-detail">
                        <div class="col-7">
                            <label class="product-name">Product 1</label>
                            <br>
                            <label class="product-des">3 x 1000$</label>
                        </div>
                        <div class="col-5 block-image">
                            <img src="<?= asset('assets/img/no-image.png') ?>" alt="">
                            <i class="far fa-times-circle"></i>
                        </div>
                    </div>
                    <hr>

                    <div class="row block-detail">
                        <div class="col-7">
                            <label class="product-name">Product 1</label>
                            <br>
                            <label class="product-des">3 x 1000$</label>
                        </div>
                        <div class="col-5 block-image">
                            <img src="<?= asset('assets/img/no-image.png') ?>" alt="">
                            <i class="far fa-times-circle"></i>
                        </div>
                    </div>
                    <hr>

                    <div class="row block-detail">
                        <div class="col-7">
                            <label class="product-name">Product 1</label>
                            <br>
                            <label class="product-des">3 x 1000$</label>
                        </div>
                        <div class="col-5 block-image">
                            <img src="<?= asset('assets/img/no-image.png') ?>" alt="">
                            <i class="far fa-times-circle"></i>
                        </div>
                    </div>
                    <hr>

                    <div class="row block-detail">
                        <div class="col-7">
                            <label class="label-total">ToTal:</label>
                        </div>
                        <div class="col-5 block-image">
                            <label for="">10000$</label>
                        </div>
                    </div>

                    <div class="row block-button">
                        <button class="col-6 btn btn-primary">View</button>
                        <button class="col-6 btn btn-success">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
</body>
<script src="<?= asset('assets/js/script.js') ?>"></script>
<script src="<?= asset('assets/js/sweetalert2.all.min.js') ?>"></script>
<script>
    $(function() {
        $('#btn-cart').click(function() {
            $('#cart').toggle();
        })
    })
</script>

</html>