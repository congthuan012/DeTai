<?php
$errors = redirectGet('errors');
if(isset($errors) && $errors){
?>
<div class="error">
  <ul>
    <?php foreach($errors as $error): ?>
      <li><?=$error?></li>
    <?php endforeach ?>
  </ul>
</div>
<?php } ?>