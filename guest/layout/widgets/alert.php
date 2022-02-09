<?php
$class =null;
$code = redirectGet('code');
if(isset($code) && $code == 200){
  $class = 'alert-success';
}elseif(isset($code) && $code == 500){
  $class = 'error';
}

$msg = redirectGet('msg')??'';
if(isset($class) && isset($msg)){
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