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
      <li class="<?= $folder == 'products-management'?'focus':'' ?>">
        <a href="<?=URL.'/products-management'?>"><i class="fa fa-cubes"></i>Products management</a>
      </li>
      <li class="<?= $folder == 'categories-management'?'focus':'' ?>">
        <a href="<?=URL.'/categories-management'?>"><i class="fas fa-clipboard-list"></i>Categories Management</a>
      </li>

      <li class="<?= $folder == 'orders-management'?'focus':'' ?>">
        <a href="orders-management"><i class="fas fa-boxes"></i>Orders management</a>
        <ul class="sub-menu">
          <li class="<?= $file == 'list'?'focus':'' ?>"><a href="orders-management"><i class="fas fa-clipboard-check"></i>Orders waiting for confirmation</a></li>
          <li class="<?= $file == 'table'?'focus':'' ?>"><a href="orders-management/list.html"><i class="fas fa-clipboard-list"></i>Table Orders</a></li>
        </ul>
      </li>

      <li class="<?= $folder == 'users-management'?'focus':'' ?>">
        <a href=""><i class="fa fa-user"></i>Users management</a>
      </li>

      <li class="<?= $folder == 'producers-management'?'focus':'' ?>">
        <a href="<?=URL.'/producers-management'?>"><i class="fas fa-users-cog"></i></i>Producers management</a>
      </li>

      <li class="<?= $folder == 'admins-management'?'focus':'' ?>">
        <a href="<?=URL.'/admins-management'?>"><i class="fas fa-user-shield"></i>Admins management</a>
      </li>
    </ul>
  </div>

  <!-- <div class="menu-footer"><span>Logout </span><i class="fas fa-power-off"></i></div> -->
</nav>