<div class="menu-content">
  <div class="search-container">
    <form action="" method="POST" class="d-flex form-search">
      <input type="number" min="0" class="input-form" value="<?=$_POST['search_id']??''?>" name="search_id" placeholder="Admin id..." />
      <input type="text" class="input-form" value="<?=$_POST['search_name']??''?>" name="search_name" placeholder="Admin name..." />
      <button class="btn btn-blue btn-search">Search</button>
      <a href="<?=URL.'/admins/list'?>" class=""><i class="fas fa-sync"></i></a>
      <a href="<?=URL.'/admins/create'?>" class="btn btn-green btn-create">Create new</a>
    </form>
  </div>
  <?php require_once './layout/widgets/alert.php'; ?>
  <?php require_once './layout/errors/errors.php'; ?>
  <div class="content-container d-flex">
    <table>
      <tbody>
        <tr>
          <th class="item-id">Id</th>
          <th class="item-image">Avatar</th>
          <th class="item-name">Name</th>
          <th class="item-name">Username</th>
          <th class="item-price">status</th>
          <th class="action">Action</th>
        </tr>

        <?php 
        if(isset($admins) && $admins)
        foreach($admins as $admin): 
        ?>
        <tr>
          <td class="item-id"><?=$admin['id']?></td>
          <td class="item-image">
            <img src="<?=asset($admin['avatar']&&$admin['avatar']!=''?$admin['avatar']:'assets/img/no-image.png')?>" alt="" />
          </td>
          <td class="item-name"><?= $admin['name']??'' ?></td>
          <td class="item-price"><?= $admin['username']??'' ?></td>
          
          <td class="item-status">
            <?php
             if(isset($admin['status']) && $admin['status'] == 0) {
              echo '<span class="danger">Locked</span>';
              }elseif(isset($admin['status']) && $admin['status'] == 1){
              echo '<span class="success">Active</span></td>';
              } 
            ?>
          </td>
          <td class="action">
            <a href="<?=URL.'/admins/detail/'.$admin['id']?>"><button class="btn btn-edit">
                <i class="fas fa-edit"></i></button></a>
            <?php
              if($_SESSION['user']['id'] == 1){
            ?>
              <a onclick="getModalConfirm('<?=URL.'/admins/delete/'.$admin['id']?>')" class="btn-delete-admin"><button class="btn btn-delete">
              <i class="fas fa-trash"></i></button></a>
            <?php
              }
            ?>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <div>
    <?php if($totalPages>1) {?>
    <ul class="paginate">
      <?php
      $href = 'javascript:void(0)';
      if($currentPage > 1)
      {
        $page = $currentPage - 1;
        $href = URL.'/admins/list/'.$page;
      }
      ?>
      <li>
        <a href="<?=$href?>"><span class="previous-page"><i class="fas fa-chevron-left"></i></span></a>
      </li>
      <?php for($i = 1;$i < $totalPages + 1; $i++ ) {?>
      <li>
        <a href="<?=$href = URL.'/admins/list/'.$i?>"><span class="page-number <?=$currentPage == $i?'choose':''?>"><?=$i?></span></a>
      </li>
      <?php
      }
      $href = 'javascript:void(0)';
      if($currentPage < $totalPages)
      {
        $page = $currentPage + 1;
        $href = URL.'/admins/list/'.$page;
      }
      ?>
      <li>
        <a href="<?=$href?>"><span class="next-page"><i class="fas fa-chevron-right"></i></span></a>
      </li>
    </ul>
    <?php } ?>
  </div>
</div>
<?php
require_once './layout/widgets/modal-confirm.php';
?>
<script src="<?=asset('assets/js/script.js')?>"></script>