<?php require_once './layout/widgets/header.php';?>
<div class="menu-content">
  <!-- content -->
  <?php require_once './layout/errors/errors.php' ?>
  <?php require_once './layout/widgets/alert.php' ?>
  <form action="<?= $action ?? '' ?>" method="POST" id="form-producers" enctype="multipart/form-data">
    <div class="d-flex">
      <div class="col-6 form-left-content">
        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-1">Name</label>
          <input class="col-9 input-form" value="<?=$producer['name']??''?>" name="name" id="form-control-1" type="text">
        </div>
        <div class="d-flex">
          <label class="col-3 form-label" for="form-control-1"></label>
          <label class="col-9 valid-text" id="valid-name"></label>
        </div>

        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-5">Description</label>
          <textarea name="description" id="form-control-5" rows="6" class="col-9 form-text form-label"><?=$producer['description']??''?></textarea>
        </div>

      </div>
      <div class="col-6 form-right-content form-control">
        <label class="form-label" for="">Producer image</label>
        <div>
          <label class="form-label-file" for="input-image">Chose image...</label>
          <input id="input-image" value="<?=$producer['avatar']??''?>" name="image" type="file" accept="image/*">
        </div>
        <div>
          <label for="input-image"><img src="<?= asset($producer['avatar']??'assets/img/no-image.png') ?>" id="preview-image" class="preview-image" alt=""></label>
        </div>
      </div>
    </div>
    <div class="d-flex form-button col-12">
      <button type="reset" onclick="redirect(`http://localhost/DeTai/admin/categories/list`)" class="btn btn-close btn-gray">Close</button>
      <button type="submit" class="btn btn-save btn-blue">Save</button>
    </div>
  </form>
  <!-- content -->
</div>
<script>
  document.getElementById('input-image').addEventListener("change", function() {
    var input = document.getElementById('input-image');
    PreviewImage(input, 'preview-image')
  })

  $(function() {
    $('#form-producers').submit(function() {
      var flag = true;
      
      if (!$("input[name='name']").val()) {
        $('#valid-name').show();
        $('#valid-name').html('Name is required!');
        flag = false;
      }
      return flag;
    });

    $("input[name='name']").keyup(function() {
      if ($("input[name='name']").val()) {
        $('#valid-name').hide();
      }
    })
  })
</script>