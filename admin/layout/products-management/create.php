<?php
$title = 'Create product';
require_once './layout/widgets/header.php';
?>

<div class="menu-content">
  <!-- content -->
  <form action="">
    <div class="d-flex">
      <div class="col-6 form-left-content">
        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-1">Name</label>
          <input class="col-9 input-form" id="form-control-1" type="text" required>
        </div>

        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-2">Price</label>
          <input class="col-9 input-form" id="form-control-2" type="text" required>
        </div>

        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-3">Category</label>
          <select class="col-9 input-form" id="form-control-3" name="type">
            <option class="form-label" selected value="1">Danh mục 1</option>
            <option class="form-label" value="1">Danh mục 2</option>
            <option class="form-label" value="1">Danh mục 3</option>
          </select>
        </div>

        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-4">Producers</label>
          <select class="col-9 input-form" name="producer" id="form-control-4">
            <option class="form-label" selected value="1">Nhà sản xuất 1</option>
            <option class="form-label" value="1">Nhà sản xuất 1</option>
            <option class="form-label" value="1">Nhà sản xuất 1</option>
          </select>
        </div>

        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-5">Description</label>
          <textarea name="description" id="form-control-5" rows="6" class="col-9 form-text form-label"></textarea>
        </div>

      </div>
      <div class="col-6 form-right-content form-control">
        <label class="form-label" for="">Product image</label>
        <div>
          <label class="form-label-file" for="input-image">Chose image...</label>
          <input id="input-image" onchange="console.log(this)" type="file" accept="image/*">
        </div>
        <div>
          <label for="input-image"><img src="../assets/img/no-image.png" id="preview-image" class="preview-image" alt=""></label>
        </div>
      </div>
    </div>
    <div class="d-flex form-button col-12">
      <button class="btn btn-close btn-gray">Close</button>
      <button class="btn btn-save btn-blue">Save</button>
    </div>
  </form>
  <!-- content -->
</div>
<script src="../assets/js/script.js"></script>
<script>
  input = document.getElementById('input-image');
  input.addEventListener("change", function() {
    PreviewImage(input, 'preview-image')
  })
</script>