<div class="block-form-sign-in">
    <form class="form-sign-in" action="<?= guestHref('auth/process-sign-in') ?>">
        <div class="title">
            <span>FORM SIGN-IN</span>
        </div>
        <div class="form-group row">
            <label for="col-4 input-name">Username</label>
            <input type="text" class="col-8 form-control username">
        </div>
        <div class="form-group row">
            <label for="col-4 input-name">Username</label>
            <input type="text" class="col-8 form-control form-input username">
        </div>
        <div class="form-group row">
            <span class="col-4"></span>
            <label class="col-8 row form-checkbox"><input type="checkbox" class="form-control form-input username" value="remember">Remember</label>
        </div>
        <div class="form-group row" style="text-align: center;">
            <a href="<?= guestHref('auth/forgot') ?>" for="" class="col-6">Forgot password?</a>
            <a href="<?= guestHref('auth/signup') ?>" class="col-6">Don't have Account!</a>
        </div>
        <br>
        <div class="form-group btn-form-sign-in row">
            <button class="btn btn-secondary">Cancel</button>
            <button class="btn btn-primary btn-sign-in">Sign-in</button>
        </div>
    </form>
</div>