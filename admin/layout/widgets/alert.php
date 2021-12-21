<?php
    $class = redirectGet('code') == 200?'alert-success':'error';
    $msg = redirectGet('msg');
    if($class && $msg){
?>
<div id="block-alert" class="<?=$class??''?> d-flex">
  <div class="col-11">
    <ul>
      <li><?=$msg??''?></li>
    </ul>
  </div>
  <div id="close-alert" class="col-1 close-alert">
    <i class="fas fa-times-circle"></i>
  </div>
</div>
<?php 
}
?>