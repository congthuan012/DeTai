<form id="form-checkout" action="<?=guestHref('cart/process-checkout')?>" method="POST">
    <?php require_once './layout/errors/errors.php'; ?>
    <?php require_once './layout/widgets/alert.php'; ?>
    <div class="row">
        <div class="col-6" style="padding: 0 10px;">
            <h1>Information</h1>
            <div class="form-group row">
                <label for="col-4 input-name">Name</label>
                <input type="text" name="name" value="<?=$_SESSION['guest']['name']??''?>" class="col-8 form-control name">
            </div>
            <div class="row">
                <label class="col-4 form-label" for="form-control-1"></label>
                <label class="valid-text" id="valid-name">Name is required!</label>
            </div>

            <div class="form-group row">
                <label for="col-4 input-name">Address</label>
                <input type="text" name="address" value="<?=$_SESSION['guest']['address']??''?>" class="col-8 form-control address">
            </div>
            <div class="row">
                <label class="col-4 form-label" for="form-control-1"></label>
                <label class="valid-text" id="valid-address">Address is required!</label>
            </div>

            <div class="form-group row">
                <label for="col-4 input-name">Phone number</label>
                <input type="text" name="phone" value="<?=$_SESSION['guest']['phone']??''?>" class="col-8 form-control phone">
            </div>
            <div class="row">
                <label class="col-4 form-label" for="form-control-1"></label>
                <label class="valid-text" id="valid-phone">Phone number is required!</label>
            </div>
        </div>
        <div class="col-6" style="padding: 0 10px;">
            <h1>Products</h1>
            <?php
            if ($products) :
                $total = 0;
                foreach ($products as $key => $value) :
                    $price = $value['quantity'] * $value['product_price'];
                    $total += $price;
            ?>
                    <div class="row" style="justify-content: space-around; align-items: center;">
                        <div><img src="<?= $value['product_avatar'] ?? '/' ?>" style="width: 50px;" alt=""></div>
                        <div><?= $value['product_name'] ?></div>
                        <div><?= number_format($value['product_price']) ?></div>
                        <div>x<?= $value['quantity'] ?></div>
                        <div><?= $price ?></div>
                    </div>
                <?php
                endforeach;
                ?>
                <hr>
                <div class="row" style="justify-content: flex-end;">
                    <div>Total:</div>
                    <div> <input type="number" hidden value="<?= $total ?>" name="total"> <?= number_format($total) ?> VNĐ</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6 block-close-checkout">
            <a><button type="button" class="btn btn-secondary">Close</button></a>
        </div>
        <div class="col-6 block-checkout">
            <button class="btn btn-success">Checkout</button>
        </div>
    </div>
</form>

<script>
    $('#form-checkout').submit(function() {
        var flag = true;
        if(!$('input[name="name"]').val()){
            $('#valid-name').show();
            $('#valid-name').html('Name is required!');
            flag = false;
        }

        if(!$('input[name="address"]').val()){
            $('#valid-address').show();
            $('#valid-address').html('Address is required!');
            flag = false;
        }

        if(!$('input[name="phone"]').val()){
            $('#valid-phone').show();
            $('#valid-phone').html('Phone number is required!');
            flag = false;
        }

        return flag;
    });

    $('input[name="name"]').keyup(function() {
        if($('input[name="name"]').val())
        {
            $('#valid-name').hide();
        }
    })
    
    $('input[name="address"]').keyup(function() {
        if($('input[name="address"]').val())
        {
            $('#valid-address').hide();
        }
    })

    $('input[name="phone"]').keyup(function() {
        if($('input[name="phone"]').val())
        {
            $('#valid-phone').hide();
        }
    })
</script>