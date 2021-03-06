<?php require_once './layout/widgets/header.php';?>
<div class="menu-content">
  <!-- content -->
  <?php require_once './layout/errors/errors.php'?>
  <?php require_once './layout/widgets/alert.php'?>
  <form action="<?=$action ?? ''?>" method="POST" id="form-product" enctype="multipart/form-data">
    <div class="d-flex">
      <div class="col-6 form-left-content">
        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-1">Name</label>
          <input class="col-9 input-form" value="<?=$product['name'] ?? ''?>" name="name" id="form-control-1" type="text">
        </div>
        <div class="d-flex">
          <label class="col-3 form-label" for="valid-name"></label>
          <label class="col-9 valid-text" id="valid-name"></label>
        </div>

        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-2">Price</label>
          <input class="col-9 input-form" name="price" value="<?=$product['price'] ?? ''?>" id="form-control-2" type="number">
        </div>
        <div class="d-flex">
          <label class="col-3 form-label" for="valid-price"></label>
          <label class="col-9 valid-text" id="valid-price"></label>
        </div>

        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-3">Category</label>
          <select class="col-9 input-form" id="form-control-3" name="category">
            <?php foreach ($categories as $category): ?>
              <option class="form-label" <?php if (isset($product['category_id']) && $product['category_id'] && $product['category_id'] == $category['id']) {
	echo 'selected';
}
?> value="<?=$category['id'] ?? ''?>"><?=$category['name'] ?? ''?></option>
            <?php endforeach?>
          </select>
        </div>

        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-4">Producers</label>
          <select class="col-9 input-form" name="producer" id="form-control-4">
            <?php foreach ($producers as $producer): ?>
              <option class="form-label" <?php if (isset($product['producer_id']) && $product['producer_id'] && $product['producer_id'] == $producer['id']) {echo 'selected';}?> value="<?=$producer['id'] ?? ''?>"><?=$producer['name'] ?? ''?></option>
            <?php endforeach?>
          </select>
        </div>

        <div class="d-flex form-control">
          <label class="col-3 form-label" for="form-control-5">Description</label>
          <textarea name="description" id="form-control-5" rows="6" class="col-9 form-text form-label"><?=$product['description'] ?? ''?></textarea>
        </div>

      </div>
      <div class="col-6 form-right-content form-control">
        <label class="form-label" for="">Product image</label>
        <div>
          <label class="form-label-file" for="input-image">Chose image...</label>
          <input id="input-image" value="<?=$product['avatar'] ?? ''?>" name="image" type="file" accept="image/*">
        </div>
        <div>
          <label for="input-image"><img src="<?=asset($product['avatar'] ?? 'assets/img/no-image.png')?>" id="preview-image" class="preview-image" alt=""></label>
        </div>
      </div>
    </div>
    <div class="d-flex form-button col-12">
      <button type="reset" onclick="redirect(`http://localhost/DeTai/admin/products/list`)" class="btn btn-close btn-gray">Close</button>
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

  $('#form-product').submit(function() {
        var flag = true;
        if(!$('input[name="name"]').val()){
            $('#valid-name').show();
            $('#valid-name').html('Name is required!');
            flag = false;
        }

        if(!$('input[name="price"]').val()){
            $('#valid-price').show();
            $('#valid-price').html('Price is required!');
            flag = false;
        }

        return flag;
    })

    $('input[name="name"]').keyup(function() {
        if($('input[name="name"]').val())
        {
            $('#valid-name').hide();
        }
    })

    $('input[name="price"]').keyup(function() {
      if($('input[name="price"]').val())
      {
          $('#valid-price').hide();
      }
    });
</script>