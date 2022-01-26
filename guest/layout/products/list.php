<div class="list-product">



    <div class="product" data-id="3">
        <div class="product-image"><img src="<?= asset('assets/img/no-image.png') ?>" alt=""></div>
        <div class="product-name"><span>Product 1</span></div>
        <div class="product-price sale"><span>2,000,000 </span>VND</div>
        <div class="product-sale"><span>1,500,000</span>VND</div>
        <div class="row product-action">
            <div class="col-6"><button class="btn btn-primary">View</button></div>
            <div class="col-6"><button class="btn btn-success">Add to cart</button></div>
        </div>
    </div>

    

    <div class="product" data-id="3">
        <div class="product-image"><img src="<?= asset('assets/img/no-image.png') ?>" alt=""></div>
        <div class="product-name"><span>Product 1</span></div>
        <div class="product-price sale"><span>2,000,000 </span>VND</div>
        <div class="product-sale"><span>1,500,000</span>VND</div>
        <div class="row product-action">
            <div class="col-6"><button class="btn btn-primary">View</button></div>
            <div class="col-6"><button class="btn btn-success">Add to cart</button></div>
        </div>
    </div>

    

    <div class="product" data-id="3">
        <div class="product-image"><img src="<?= asset('assets/img/no-image.png') ?>" alt=""></div>
        <div class="product-name"><span>Product 1</span></div>
        <div class="product-price sale"><span>2,000,000 </span>VND</div>
        <div class="product-sale"><span>1,500,000</span>VND</div>
        <div class="row product-action">
            <div class="col-6"><button class="btn btn-primary">View</button></div>
            <div class="col-6"><button class="btn btn-success">Add to cart</button></div>
        </div>
    </div>

    

    <div class="product" data-id="3">
        <div class="product-image"><img src="<?= asset('assets/img/no-image.png') ?>" alt=""></div>
        <div class="product-name"><span>Product 1</span></div>
        <div class="product-price sale"><span>2,000,000 </span>VND</div>
        <div class="product-sale"><span>1,500,000</span>VND</div>
        <div class="row product-action">
            <div class="col-6"><button class="btn btn-primary">View</button></div>
            <div class="col-6"><button class="btn btn-success">Add to cart</button></div>
        </div>
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