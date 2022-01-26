<div>
    <span class="title">Product</span>
</div>
<div class="list-product">
    <?php foreach ($products as $item) : ?>
        <div class="product">
            <div class="product-image" data-id="<?= $item['id'] ?? '' ?>"><img src="<?= asset($item['avatar']) ?? '' ?>" alt=""></div>
            <div class="product-name"><span><?= $item['name'] ?? '' ?></span></div>
            <div class="product-price"><span><?= number_format($item['price']) ?? '' ?> </span>VND</div>
            <!-- <div class="product-sale"><span>1,500,000</span>VND</div> -->
            <div class="row product-action">
                <div class="col-6" data-id="<?= $item['id'] ?? '' ?>"><button class="btn btn-primary">View</button></div>
                <div class="col-6" data-id="<?= $item['id'] ?? '' ?>"><button class="btn btn-success">Add to cart</button></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div>
    <?php if ($totalPages > 1) { ?>
        <ul class="paginate">
            <?php
            $href = 'javascript:void(0)';
            if ($currentPage > 1) {
                $page = $currentPage - 1;
                $href = guestHref('/products/index/'.$page);
            }
            ?>
            <li>
                <a href="<?= $href ?>"><span class="previous-page"><i class="fas fa-chevron-left"></i></span></a>
            </li>
            <?php for ($i = 1; $i < $totalPages + 1; $i++) { ?>
                <li>
                    <a href="<?= $href = guestHref('/products/index/'.$i) ?>"><span class="page-number <?= $currentPage == $i ? 'choose' : '' ?>"><?= $i ?></span></a>
                </li>
            <?php
            }
            $href = 'javascript:void(0)';
            if ($currentPage < $totalPages) {
                $page = $currentPage + 1;
                $href = guestHref('/products/index/'.$page);
            }
            ?>
            <li>
                <a href="<?= $href ?>"><span class="next-page"><i class="fas fa-chevron-right"></i></span></a>
            </li>
        </ul>
    <?php } ?>
</div>
<script>
    $(function() {
        $('.product').click(function() {
            var id = $(this).data('id');
            window.location.replace("/products/detail/" + id);
        });
    })
</script>