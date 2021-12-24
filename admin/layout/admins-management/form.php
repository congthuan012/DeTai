<?php require_once './layout/widgets/header.php';?>
<div class="menu-content">
  <!-- content -->
  <?php require_once './layout/errors/errors.php' ?>
  <?php require_once './layout/widgets/alert.php' ?>
  <form action="<?= $action ?? '' ?>" method="POST" enctype="multipart/form-data">
    <div class="d-flex">
      <div class="col-6 form-left-content">
        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-1">Name</label>
          <input class="col-9 input-form" value="<?=$admin['name']??''?>" name="name" id="form-control-1" type="text">
        </div>

        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-2">Username</label>
          <input class="col-9 input-form" name="username" value="<?=$admin['username']??''?>" id="form-control-2" type="text">
        </div>

        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-4">Status</label>
          <label class="d-flex align-items-center col-3 form-label"><input name="status" <?= isset($admin['status']) && $admin['status']==1?'checked':''?> type="checkbox" value="1">Active</label>
        </div>

        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-5">Description</label>
          <textarea name="description" id="form-control-5" rows="6" class="col-9 form-text form-label"><?=$admin['description']??''?></textarea>
        </div>

      </div>
      <div class="col-6 form-right-content form-control">
        <label class="form-label" for="">admin image</label>
        <div>
          <label class="form-label-file" for="input-image">Chose image...</label>
          <input id="input-image" value="<?=$admin['avatar']??''?>" name="image" type="file" accept="image/*">
        </div>
        <div>
          <label for="input-image"><img src="<?= asset($admin['avatar']??'assets/img/no-image.png') ?>" id="preview-image" class="preview-image" alt=""></label>
        </div>
      </div>
    </div>
    <div class="d-flex form-button col-12">
      <button type="reset" onclick="redirect(`http://localhost/DeTai/admin/admins-management/list`)" class="btn btn-close btn-gray">Close</button>
      <button type="submit" class="btn btn-save btn-blue">Save</button>
    </div>
  </form>
  <!-- content -->
</div>
<script src="<?= asset('assets/js/script.js') ?>"></script>
<script>
  input = document.getElementById('input-image');
  input.addEventListener("change", function() {
    PreviewImage(input, 'preview-image')
  })
</script>