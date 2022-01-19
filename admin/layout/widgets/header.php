<div class="menu-header d-flex align-items-center">
  <div class="col-10"><span><?= $title ?? '' ?></span></div>
  <a href="<?= URL.'/admins/info' ?>" class="col-2 align-items-center user-info">
    <img width="20" src="<?= asset($_SESSION['user']['avatar']??'assets/img/no-image.png') ?>" alt="avt" /><span><?=$_SESSION['user']['name']??''?></span>
    <a href="<?= URL.'/auth/sign-out' ?>" class="logout" href="2"><i class="fas fa-power-off"></i></a>
  </a>
</div>