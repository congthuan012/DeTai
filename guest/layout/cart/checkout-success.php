<div><h1 class="checkout-title">CHECKOUT COMPLETE <br>THANK YOU!</h1></div>
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
        </tr>
        <?php
        if ($cart) :
            $total = 0;
            foreach ($cart as $key => $value) :
                $price = $value['quantity'] * $value['product_price'];
                $total += $price;
        ?>
                <tr class="content">
                    <td class="product-avatar"><img src="<?= $value['product_avatar'] ?? '/' ?>" style="width: 125px;" alt=""></th>
                    <td class="product-name"><?= $value['product_name'] ?></th>
                    <td class="product-price"><?= number_format($value['product_price']) ?></td>
                    <td class="product-quantity" style="width: 200px;">x<?= $value['quantity'] ?></td>
                    <td class="total" style="width: 200px;"><?= $price ?></td>
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
    <div class="row block-checkout-cart">
        <button type="button" onclick="window.location.replace('<?=guestHref('/')?>');" class="btn btn-secondary">Back to Home</button>
    </div>
</form>
<script>
</script>