<div id="modal-change-password" class="modal-confirm">
  <span onclick="document.getElementById('modal-confirm').style.display='none'" class="close" title="Close Modal">×</span>
  <form id="form-change-password" class="modal-content" method="POST">
    <div class="container" style="padding: 10px; text-align: center;">
      <div class="d-flex">
        <h1 style="width: 100%;font-size: 30px;margin: 0;">Change Password</h1>
      </div>
      <input type="hidden" name="method" value="ajax">
      <div class="d-flex form-control">
        <label class="col-4 form-label" for="form-control-1">Old Password</label>
        <input class="col-8 input-form" name="old_password" value="" id="form-control-1"type="password">
      </div>
      <div class="d-flex">
        <label class="col-4 form-label" for="form-control-2"></label>
        <label class="col-8 valid-text" id="valid-old_password" style="text-align: left;"></label>
      </div>

      <div class="d-flex form-control">
        <label class="col-4 form-label" for="form-control-2">New Password</label>
        <input class="col-8 input-form" name="new_password" value="" id="form-control-2" type="password">
      </div>
      <div class="d-flex">
        <label class="col-4 form-label" for="form-control-1"></label>
        <label class="col-8 valid-text" id="valid-new_password" style="text-align: left;"></label>
      </div>

      <div class="d-flex form-control">
        <label class="col-4 form-label" for="form-control-3">Confirm Password</label>
        <input class="col-8 input-form" name="password_confirm" value="" id="form-control-3"type="password">
      </div>
      <div class="d-flex">
        <label class="col-4 form-label" for="form-control-1"></label>
        <label class="col-8 valid-text" id="valid-password_confirm" style="text-align: left;"></label>
      </div>
      <div class="d-flex form-button col-12">
        <button type="reset" onclick="$('#modal-change-password').hide()" class="btn btn-close btn-gray">Close</button>
        <button type="submit" class="btn btn-save btn-blue">Save</button>
      </div>
    </div>
  </form>
</div>