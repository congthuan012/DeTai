<div class="block-form-sign-in">
    <form id="form-sign-in" class="form-sign-in" method="POST" action="<?= guestHref('auth/process-sign-in') ?>">
        <div class="title">
            <span>FORM SIGN-IN</span>
        </div>

        <?php require_once './layout/errors/errors.php' ?>
        <?php require_once './layout/widgets/alert.php' ?>

        <div class="form-group row">
            <label for="col-4 input-name">Username</label>
            <input type="text" name="username" class="col-8 form-control username">
        </div>
        <div class="row">
            <label class="col-4 form-label" for="form-control-1"></label>
            <label class="valid-text" id="valid-username">User name is required!</label>
        </div>
        <div class="form-group row">
            <label for="col-4 input-name">Password</label>
            <input type="password" name="password" class="col-8 form-control form-input username">
        </div>
        <div class="row">
            <label class="col-4 form-label" for="form-control-1"></label>
            <label class="valid-text" id="valid-password">User name is required!</label>
        </div>
        <div class="form-group row">
            <span class="col-4"></span>
            <label class="col-8 row form-checkbox"><input type="checkbox" class="form-control form-input username" name="remember" value="1">Remember</label>
        </div>
        <div class="form-group row">
            <a href="<?= guestHref('auth/sign-up') ?>" class="col-6">Don't have Account!</a>
        </div>
        <br>
        <div class="form-group btn-form-sign-in row">
        <button type="reset" id="cancel-sign-in" class="btn btn-secondary">Cancel</button>
            <button class="btn btn-primary btn-sign-in">Sign-in</button>
        </div>
    </form>
</div>
<script>
    $('#cancel-sign-in').click(function() {
        var url = $('meta[name="GUEST_URL"]').attr("content");
        window.location.href = url;
    });
    
    $('#form-sign-in').submit(function() {
        var flag = true;
        if(!$('input[name="username"]').val()){
            $('#valid-username').show();
            $('#valid-username').html('Username is required!');
            flag = false;
        }

        if(!$('input[name="password"]').val()){
            $('#valid-password').show();
            $('#valid-password').html('Password is required!');
            flag = false;
        }

        return flag;
    });

    $('input[name="username"]').keyup(function() {
        if($('input[name="username"]').val())
        {
            $('#valid-username').hide();
        }
    })
    
    $('input[name="password"]').keyup(function() {
        if($('input[name="password"]').val())
        {
            $('#valid-password').hide();
        }
    })
</script>