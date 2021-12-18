<?php
    $class = redirectGet('code') == 200?'alert-success':'error';
    $msg = redirectGet('msg');
    if($class && $msg){
?>
<div class="<?=$class??''?>">
  <ul>
      <li><?=$msg??''?></li>
  </ul>
</div>
<?php 
}
?>