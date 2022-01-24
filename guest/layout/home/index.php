<div class="title">New</div>
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
    $(function(){
        $('.product').click(function(){
            var id = $(this).data('id');
            window.location.replace("/product/detail/"+id);
        });
    })
</script>