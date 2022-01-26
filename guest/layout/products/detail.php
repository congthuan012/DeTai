<div class="title">Product detail</div>
<div class="list-product row">
    <div class="col-4">
        <div><img style="width: 100%;" src="<?= asset('assets/img/no-image.png') ?>" alt=""></div>
    </div>
    <div class="col-8">
        <div class="product-name"><span>Product 1</span></div>
        <div class="product-type"><span>Product type</span></div>
        <div class="row block-price">
            <div class="product-price sale"><span>1,000,000</span></div>
            <div class="product-sale"><span>1,000,000</span></div>
        </div>
        <div><span>product description</span></div>
    </div>
</div>

<div class="row product-recommended title"><span>Sản phẩm liên quan</span></div>
<div class="list-product">
    <div class="product" data-id="1">
        <div class="product-image"><img src="<?= asset('assets/img/no-image.png') ?>" alt=""></div>
        <div class="product-name"><span>Product 1</span></div>
        <div class="product-price sale"><span>2,000,000 </span>VND</div>
        <div class="product-sale"><span>1,500,000</span>VND</div>
    </div>

    <div class="product" data-id="2">
        <div class="product-image"><img src="<?= asset('assets/img/no-image.png') ?>" alt=""></div>
        <div class="product-name"><span>Product 1</span></div>
        <div class="product-price sale"><span>2,000,000 </span>VND</div>
        <div class="product-sale"><span>1,500,000</span>VND</div>
    </div>

    <div class="product" data-id="3">
        <div class="product-image"><img src="<?= asset('assets/img/no-image.png') ?>" alt=""></div>
        <div class="product-name"><span>Product 1</span></div>
        <div class="product-price sale"><span>2,000,000 </span>VND</div>
        <div class="product-sale"><span>1,500,000</span>VND</div>
    </div>

    <div class="product" data-id="4">
        <div class="product-image"><img src="<?= asset('assets/img/no-image.png') ?>" alt=""></div>
        <div class="product-name"><span>Product 1</span></div>
        <div class="product-price sale"><span>2,000,000 </span>VND</div>
        <div class="product-sale"><span>1,500,000</span>VND</div>
    </div>

    <div class="product" data-id="4">
        <div class="product-image"><img src="<?= asset('assets/img/no-image.png') ?>" alt=""></div>
        <div class="product-name"><span>Product 1</span></div>
        <div class="product-price sale"><span>2,000,000 </span>VND</div>
        <div class="product-sale"><span>1,500,000</span>VND</div>
    </div>

    <div class="product" data-id="5">
        <div class="product-image"><img src="<?= asset('assets/img/no-image.png') ?>" alt=""></div>
        <div class="product-name"><span>Product 1</span></div>
        <div class="product-price sale"><span>2,000,000 </span>VND</div>
        <div class="product-sale"><span>1,500,000</span>VND</div>
    </div>

    <div class="product" data-id="6">
        <div class="product-image"><img src="<?= asset('assets/img/no-image.png') ?>" alt=""></div>
        <div class="product-name"><span>Product 1</span></div>
        <div class="product-price sale"><span>2,000,000 </span>VND</div>
        <div class="product-sale"><span>1,500,000</span>VND</div>
    </div>
</div>

<script>
    $(function() {
        $('.product').click(function() {
            var id = $(this).data('id');
            window.location.replace("/products/detail/" + id);
        });
    })
</script>