<h1>CART</h1>
<?php require_once './layout/errors/errors.php'; ?>
<?php require_once './layout/widgets/alert.php'; ?>
<form action="/cart/update" method="POST">
    <table class="products-cart">
        <tr class="header">
            <th class="product-name">Product avatar</th>
            <th class="product-name">Product Name</th>
            <th class="product-price">Price</th>
            <th class="product-quantity" style="width: 200px;">Quantity</th>
            <th class="total" style="width: 200px;">Total(VNĐ)</th>
            <th class="total"></th>
        </tr>
        <?php
        if ($products) :
            $total = 0;
            foreach ($products as $key => $value) :
                $price = $value['quantity'] * $value['product_price'];
                $total += $price;
        ?>
                <tr class="content">
                    <td class="product-avatar"><img src="<?= asset($value['product_avatar']) ?? '/' ?>" alt=""></th>
                    <td class="product-name"><?= $value['product_name'] ?></th>
                    <td class="product-price"><?= number_format($value['product_price']) ?></td>
                    <td class="product-quantity" style="width: 200px;"><input type="number" name="quantity[<?=$key?>]" value="<?= $value['quantity'] ?>"></td>
                    <td class="total" style="width: 200px;"><?= $price ?></td>
                    <td class="action"><button type="button" class="btn-remove-form-cart btn btn-danger" data-id="<?= $key ?>"><i class="fas fa-trash"></i></button></td>
                </tr>
        <?php
            endforeach;
        ?>
        <tr style="border-top: 1px solid black;">
            <td>Total:</td>
            <td colspan="4" class="total-price"><?= number_format($total) ?> VNĐ</td>
        </tr>
        <?php endif; ?>
    </table>
    <div class="row block-update-cart">
        <button type="submit" class="btn btn-primary">Cập nhật giỏ hàng</button>
        <button class="btn btn-success">Checkout</button>
    </div>
</form>
<script>
    $(function() {
        $('.btn-remove-form-cart').click(function() {
            let id = $(this).data('id');
            swal({
                    title: "Deleted this product?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: 'products/remove-form-cart',
                            data: {
                                'id': id,
                                'method': 'ajax'
                            },
                            method: "POST",
                            success: function(res) {
                                swal({
                                    title: res.msg,
                                    icon: res.status,
                                    button: false,
                                    timer: 1500,
                                });
                            },
                            complete: function(res) {
                                window.setTimeout(function() {
                                    location.reload();
                                }, 1500);
                            },
                        });
                    }
                });
        });
    })
</script>