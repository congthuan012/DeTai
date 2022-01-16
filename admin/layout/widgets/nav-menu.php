<nav class="nav-menu">
  <div class="menu-header">
    <a href="">
      <i class="fas fa-store"></i>
      <span class="text-uppercase">WEB CÂY CẢNH</span>
    </a>
  </div>

  <div class="menu-function">
    <h4>Function</h4>
    <ul class="menu-selection">
      <li class="<?= $folder == 'products'?'focus':'' ?>">
        <a href="<?=URL.'/products'?>"><i class="fa fa-cubes"></i>Products management</a>
      </li>
      <li class="<?= $folder == 'categories'?'focus':'' ?>">
        <a href="<?=URL.'/categories'?>"><i class="fas fa-clipboard-list"></i>Categories Management</a>
      </li>

      <li class="<?= $folder == 'orders'?'focus':'' ?>">
        <a href="<?=URL.'/orders'?>"><i class="fas fa-boxes"></i>Orders management</a>
        <ul class="sub-menu">
          <li class="<?= $file == 'list'?'focus':'' ?>"><a href="<?=URL.'/orders/list'?>"><i class="fas fa-clipboard-list"></i>List of Order</a></li>
          <li class="<?= $file == 'confirm'?'focus':'' ?>"><a href="<?=URL.'/orders/confirm'?>"><i class="fas fa-clipboard-check"></i>Orders waiting for confirmation</a></li>
        </ul>
      </li>

      <li class="<?= $folder == 'guests'?'focus':'' ?>">
        <a href="<?=URL.'/guests'?>"><i class="fa fa-user"></i>Guests management</a>
      </li>

      <li class="<?= $folder == 'producers'?'focus':'' ?>">
        <a href="<?=URL.'/producers'?>"><i class="fas fa-users-cog"></i></i>Producers management</a>
      </li>

      <li class="<?= $folder == 'admins'?'focus':'' ?>">
        <a href="<?=URL.'/admins'?>"><i class="fas fa-user-shield"></i>Admins management</a>
      </li>
    </ul>
  </div>

  <!-- <div class="menu-footer"><span>Logout </span><i class="fas fa-power-off"></i></div> -->
</nav>