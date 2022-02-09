<div class="menu-item"><a href="<?= guestHref('home') ?>">Home</a></div>
<div class="menu-item"><a href="<?= guestHref('products') ?>">Shop</a></div>
<?php if (!isLogin()) { ?>
    <div class="menu-item"><a href="<?= guestHref('auth/sign-in') ?>">Sign in</a></div>
<?php } else {  ?>
    <div class="col-3 d-flex menu-item">
        <img src="<?= asset($_SESSION['user']['avatar']??'assets/img/no-image.png') ?>" alt="">
        <a href="4"><?= $_SESSION['user']['username'] ?></a>
    </div>
    <div class="col-2 menu-item"><a href="<?= guestHref('auth/sign-out') ?>">Sign-out</a></div>
<?php } ?>