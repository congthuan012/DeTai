<div class="block-form-sign-in">
    <form id="form-sign-in" class="form-sign-in form-sign-up" method="POST" action="<?= guestHref('auth/process-sign-up') ?>">
        <div class="title">
            <span>FORM SIGN-UP</span>
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
            <label for="col-4 input-name">Confirm Password</label>
            <input type="password" name="confirm-password" class="col-8 form-control form-input">
        </div>
        <div class="row">
            <label class="col-4 form-label" for="form-control-1"></label>
            <label class="valid-text" id="valid-confirm-password"></label>
        </div>
        <div class="form-group row">
            <a href="<?= guestHref('auth/sign-in') ?>" class="col-6">Have Account!</a>
        </div>
        <br>
        <div class="form-group btn-form-sign-in row">
            <button type="button" class="btn btn-secondary">Cancel</button>
            <button class="btn btn-primary btn-sign-in">Sign-up</button>
        </div>
    </form>
</div>
<script>
    $('#form-sign-in').submit(function() {
        var flag = true;
        if (!$('input[name="username"]').val()) {
            $('#valid-username').show();
            $('#valid-username').html('Username is required!');
            flag = false;
        }

        if (!$('input[name="password"]').val()) {
            $('#valid-password').show();
            $('#valid-password').html('Password is required!');
            flag = false;
        }

        if (!$('input[name="confirm-password"]').val()) {
            $('#valid-confirm-password').show();
            $('#valid-confirm-password').html('Confirm password is required!');
            flag = false;
        }

        if ($('input[name="confirm-password"]').val() != $('input[name="password"]').val()) {
            $('#valid-confirm-password').show();
            $('#valid-confirm-password').html('Confirm password not match!');
            flag = false;
        }

        return flag;
    });

    $('input[name="username"]').keyup(function() {
        if ($('input[name=username]').val()) {
            $('#valid-username').hide();
        }
    })

    $('input[name="password"]').keyup(function() {
        if ($('input[name="password"]').val()) {
            $('#valid-password').hide();
        }
    })

    $('input[name="confirm-password"]').keyup(function() {
        if ($('input[name="confirm-password"]').val()) {
            $('#valid-confirm-password').hide();
        }
    })
</script>