<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WebSite Nhóm 5 - Admin</title>
  <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" />
  <link rel="stylesheet" href="<?= asset('assets/css/fontawesome-free-5.15.4-web/css/all.css') ?>" />
</head>

<body>
  <div class="container">
    <div class="d-flex h-100">
      <div class="col-2 left-menu">
        <?php require_once 'layout/widgets/nav-menu.php' ?>
      </div>
      <div class="col-10 right-content">
        <?php 
          if(file_exists($path))
            require_once $path;
          else
          require_once 'layout/errors/404.php';
        ?>

        <div class="menu-footer d-flex"><i class="fas fa-heart"><span>Đề Tài Web - Thương Mại Điện Tử - Nhóm 5 - Phần Quản Trị</span></i></div>
      </div>
    </div>
  </div>
</body>
<script src="<?= asset('assets/js/script.js') ?>"></script>
</html>