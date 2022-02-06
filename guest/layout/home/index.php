<?php
if (isset($newProducts)) {
?>
    <div class="title">New Products</div>
    <div class="list-product">

        <?php foreach ($newProducts as $item) : ?>
            <div class="product">
                <div class="product-image" data-id="<?= $item['id'] ?? '' ?>"><img src="<?= asset($item['avatar']) ?? '' ?>" alt=""></div>
                <div class="product-name"><span><?= $item['name'] ?? '' ?></span></div>
                <div class="product-price"><span><?= number_format($item['price']) ?? '' ?> </span>VND</div>
                <!-- <div class="product-sale"><span>1,500,000</span>VND</div> -->
                <div class="row product-action">
                <div class="col-6 view-cart"><button  data-id="<?= $item['id'] ?? '' ?>" class="btn btn-primary">View</button></div>
                <div class="col-6"><button type="button" data-id="<?= $item['id'] ?? '' ?>" data-url="<?=guestHref('products/add-to-cart')?>"  class="btn btn-add-to-cart btn-success">Add to cart</button></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php } ?>

<?php
if (isset($topSale)) {
?>
    <div class="title">Best Saler</div>
    <div class="list-product">

        <?php foreach ($topSale as $item) : ?>
            <div class="product">
                <div class="product-image" data-id="<?= $item['id'] ?? '' ?>"><img src="<?= asset($item['avatar']) ?? '' ?>" alt=""></div>
                <div class="product-name"><span><?= $item['name'] ?? '' ?></span></div>
                <div class="product-price"><span><?= number_format($item['price']) ?? '' ?> </span>VND</div>
                <!-- <div class="product-sale"><span>1,500,000</span>VND</div> -->
                <div class="row product-action">
                <div class="col-6 view-cart"><button  data-id="<?= $item['id'] ?? '' ?>" class="btn btn-primary">View</button></div>
                <div class="col-6"><button type="button" data-id="<?= $item['id'] ?? '' ?>" data-url="<?=guestHref('products/add-to-cart')?>"  class="btn btn-add-to-cart btn-success">Add to cart</button></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php } ?>