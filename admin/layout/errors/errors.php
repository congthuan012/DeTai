<?php
$errors = redirectGet('errors');
if(isset($errors) && $errors){
?>
<div id="block-alert" class="error d-flex">
  <div class="col-11">
    <ul>
    <?php foreach($errors as $error): ?>
      <li><?=$error?></li>
    <?php endforeach ?>
    </ul>
  </div>
  <div id="close-alert" class="col-1 close-alert">
    <i class="fas fa-times-circle"></i>
  </div>
</div>
<?php } ?>