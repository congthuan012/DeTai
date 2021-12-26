<?php require_once './layout/widgets/header.php';?>
<div class="menu-content">
  <div class="search-container">
    <form action="" method="POST" style="height: 40px;" class="form-search">
      <a href="<?=URL.'/producers-management/create'?>" class="btn btn-green btn-create">Create new</a>
    </form>
  </div>
  <?php require_once './layout/errors/errors.php'; ?>
  <?php require_once './layout/widgets/alert.php'; ?>
  <div class="content-container d-flex">
    <table>
      <tbody>
        <tr>
          <th class="item-id">id</th>
          <th class="item-image">image</th>
          <th class="item-name">Name</th>
          <th class="item-name">Creator</th>
          <th class="action">Action</th>
        </tr>

        <?php 
        if(isset($producers) && $producers)
        foreach($producers as $producer): 
        ?>
        <tr>
          <td class="item-id"><?=$producer['id']?></td>
          <td class="item-image">
            <img src="<?=asset($producer['avatar']&&$producer['avatar']!=''?$producer['avatar']:'assets/img/no-image.png')?>" alt="" />
          </td>
          <td class="item-name"><?= $producer['name']??''?></td>
          <td class="item-name"><?= find('id',$producer['created_by'],'admins')['data']['name']??''?></td>
          <td class="action">
            <a href="<?=URL.'/producers-management/detail/'.$producer['id']?>"><button class="btn btn-edit">
                <i class="fas fa-edit"></i></button></a>
            <a onclick="getModalConfirm('<?=URL.'/producers-management/delete/'.$producer['id']?>')" class="btn-delete-product"><button class="btn btn-delete">
                <i class="fas fa-trash"></i></button></a>
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
        $href = URL.'/producers-management/list/'.$page;
      }
      ?>
      <li>
        <a href="<?=$href?>"><span class="previous-page"><i class="fas fa-chevron-left"></i></span></a>
      </li>
      <?php for($i = 1;$i < $totalPages + 1; $i++ ) {?>
      <li>
        <a href="<?=$href = URL.'/producers-management/list/'.$i?>"><span class="page-number <?=$currentPage == $i?'choose':''?>"><?=$i?></span></a>
      </li>
      <?php
      }
      $href = 'javascript:void(0)';
      if($currentPage < $totalPages)
      {
        $page = $currentPage + 1;
        $href = URL.'/producers-management/list/'.$page;
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