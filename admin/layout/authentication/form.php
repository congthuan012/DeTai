<form action="<?=$action??''?>" method="POST">
    <h1 style="width: 400px;">---LOGIN---</h1>
    <?php
        require_once './layout/errors/errors.php';
        require_once './layout/widgets/alert.php';
    ?>
    <div class="d-flex form-control">
        <label class="col-3 form-label" for="form-control-1">Username</label>
        <input name="username" class="col-9 input-form" id="form-control-1" type="text"  />
    </div>

    <div class="d-flex form-control block-password">
        <label class="col-3 form-label" for="password">Password</label>
        <input name="password" class="col-9 input-form" id="password" type="password"  />
        <span id="password-show" class="password-show"><i class="fas fa-eye"></i></i></span>
        <span id="password-hide" class="password-hide"><i class="fas fa-eye-slash"></i></span>
    </div>
    <div class="d-flex form-button form-control">
        <button type="reset" class="btn btn-close btn-gray">Close</button>
        <button class="btn btn-save btn-blue">Save</button>
    </div>
</form>