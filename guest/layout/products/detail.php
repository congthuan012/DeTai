<div class="title">Product detail</div>
<div class="list-product row">
    <div class="col-4">
        <div style="margin-right: 10px;"><img style="width: 100%;" src="<?= asset($product['avatar'] ?? 'assets/img/no-image.png') ?>" alt=""></div>
    </div>
    <div class="col-8 block-product-detail">
        <div class="product-name"><span><?= $product['name'] ?? '' ?></span></div>
        <div class="product-type"><span><?= $product['category'] ?? '' ?></span></div>
        <div class="row block-price">
            <div class="product-price"><span><?= number_format($product['price']) ?? '0' ?> </span></div>
            <!-- <div class="product-sale"><span>1,000,000</span></div> -->
            <span>VNĐ</span>
        </div>
        <div class="product-description">
            <span><?= $product['description'] ?? '' ?></span>
        </div>
        <div class="block-button"><button data-id="<?= $product['id'] ?? '' ?>" data-url="<?=guestHref('products/add-to-cart')?>"  class="btn btn-add-to-cart btn-success">Add to cart</button></div>
    </div>
</div>

<?php if (!empty($productsRecommend)) { ?>
    <div class="row product-recommended title"><span>Sản phẩm liên quan</span></div>
    <div class="list-product">
        <?php foreach ($productsRecommend as $item) : ?>
            <div class="product">
                <div class="product-image" data-id="<?= $item['id'] ?? '' ?>"><img src="<?= asset($item['avatar']) ?? '' ?>" alt=""></div>
                <div class="product-name"><span><?= $item['name'] ?? '' ?></span></div>
                <div class="product-price"><span><?= number_format($item['price']) ?? '' ?> </span>VND</div>
            </div>
        <?php endforeach; ?>
    </div>
<?php } ?>

<script>
</script>