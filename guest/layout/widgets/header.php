<div class="col-3 block-logo">
    <img src="<?= asset('assets/img/no-image.png') ?>" alt="logo">
    <label for="">HCT - STORE</label>
</div>
<div class="col-5 block-search">
    <div class="row">
        <label class="valid-text" id="valid-search">User name is required!</label>
    </div>
    <form id="form-search" action="<?=guestHref('home/search')?>" class="form-search">
        <input type="text" name="search" placeholder="Search...">
        <input id="search" id="" type="submit" hidden>
        <label for="search"><i class="fas fa-search"></i></label>
    </form>
</div>
<div class="col-2 block-phone">
    <i class="fas fa-phone-alt"></i>
    <a href="tel:123456">+84123123123</a>
</div>
<div class="col-2 block-cart">
    <button id="btn-cart"><i class="fas fa-shopping-cart"></i></button>
    <div id="cart" class="cart-detail container">
    </div>
</div>

<script>
    $('#form-search').submit(function() {
        var flag = true;
        if (!$('input[name="search"]').val()) {
            $('#valid-search').show();
            $('#valid-search').html('Input Search is required!');
            flag = false;
        }
        return flag;
    });

    $('input[name="search"]').keydown(function() {
        if ($('input[name=search]').val()) {
            $('#valid-search').hide();
        }
    })
</script>