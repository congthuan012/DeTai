<?php
require_once './layout/errors/errors.php';
require_once './layout/widgets/alert.php';
if (isset($products)) {
?>
    <div class="title"><?= count($products).' for search: '.$search??'' ?></div>
    <div class="list-product">

        <?php foreach ($products as $item) : ?>
            <div class="product">
                <div class="product-image" data-id="<?= $item['id'] ?? '' ?>"><img src="<?= asset($item['avatar']) ?? '' ?>" alt=""></div>
                <div class="product-name"><span><?= $item['name'] ?? '' ?></span></div>
                <div class="product-price"><span><?= number_format($item['price']) ?? '' ?> </span>VND</div>
                <div class="row product-action">
                    <div class="col-6"><button data-id="<?= $item['id'] ?? '' ?>" class="btn btn-primary product-detail">View</button></div>
                    <div class="col-6"><button type="button" data-id="<?= $item['id'] ?? '' ?>" data-url="<?= guestHref('products/add-to-cart') ?>" class="btn btn-add-to-cart btn-success">Add to cart</button></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php } ?>