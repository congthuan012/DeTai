<form action="<?= $action ?? '' ?>" method="POST" id="form-auth">
    <h1 style="width: 400px;">---LOGIN---</h1>
    <?php
    require_once './layout/errors/errors.php';
    require_once './layout/widgets/alert.php';
    ?>
    <div class="d-flex form-control">
        <label class="col-3 form-label" for="form-control-1">Username</label>
        <input name="username" id="username" class="col-9 input-form" id="form-control-1" type="text" />
    </div>
    <div class="d-flex">
        <label class="col-3 form-label" for="form-control-1"></label>
        <label class="col-9 valid-text" id="valid-username"></label>
    </div>

    <div class="d-flex form-control block-password">
        <label class="col-3 form-label" for="password">Password</label>
        <input name="password" id="password" class="col-9 input-form" id="password" type="password" />
        <span id="password-show" class="password-show"><i class="fas fa-eye"></i></i></span>
        <span id="password-hide" class="password-hide"><i class="fas fa-eye-slash"></i></span>
    </div>
    <div class="d-flex">
        <label class="col-3 form-label" for="form-control-1"></label>
        <label class="col-9 valid-text" id="valid-password"></label>
    </div>

    <div class="d-flex align-items-center justify-content-end block-password">
        <input name="remember" class="input-form" id="remember" type="checkbox" />
        <label class="form-label" for="remember">Remember me</label>
    </div>
    <div class="d-flex form-button form-control">
        <button type="reset" class="btn btn-close btn-gray">Close</button>
        <button type="submit" class="btn btn-save btn-blue">Login</button>
    </div>
</form>

<script>
    $('#form-auth').submit(function() {
        var flag = true;
        if(!$('#username').val()){
            $('#valid-username').show();
            $('#valid-username').html('Username is required!');
            flag = false;
        }

        if(!$('#password').val()){
            $('#valid-password').show();
            $('#valid-password').html('Password is required!');
            flag = false;
        }

        return flag;
    })

    $('#username').keyup(function() {
        if($('#username').val())
        {
            $('#valid-username').hide();
        }
    })
    
    $('#password').keyup(function() {
        if($('#password').val())
        {
            $('#valid-password').hide();
        }
    })
</script>