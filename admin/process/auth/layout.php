<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WebSite Nhóm 5 - Admin</title>
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" />
    <link
      rel="stylesheet"
      href="<?= asset('assets/css/fontawesome-free-5.15.4-web/css/all.css') ?>"
    />
  </head>

  <body>
    <div class="container">
      <div class="block-login">
        <?php 
            if(file_exists($path))
                require_once $path;
            else
                require_once 'layout/errors/404.php';
        ?>
      </div>
    </div>
  </body>
</html>
<script src="<?= asset('assets/js/script.js') ?>"></script>