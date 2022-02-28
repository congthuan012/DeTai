<div class="menu-content">
  <div class="search-container">
    <form action="" method="POST" class="d-flex form-search">
      <input min="0" type="number" class="input-form" value="<?=$_POST['search_id']??''?>" name="search_id" placeholder="Product Id..." />
      <input type="text" class="input-form" value="<?=$_POST['search_name']??''?>" name="search_name" placeholder="Product name..." />
      <select name="search_category" class="input-form" id="">
        <option value="" disabled selected>Product category</option>
        <?php foreach($categories as $category): ?>
          <option <?= isset($_POST['search_category']) && $_POST['search_category'] == $category['id']?'selected':'' ?> value="<?=$category['id']?>"><?=$category['name']?></option>
        <?php endforeach ?>
      </select>
      <button class="btn btn-blue btn-search">Search</button>
      <a href="<?=URL.'/products/list'?>" class=""><i class="fas fa-sync"></i></a>
      <a href="<?=URL.'/products/create'?>" class="btn btn-green btn-create">Create new</a>
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
          <th class="item-category">Category</th>
          <th class="item-price">Price</th>
          <th class="action">Action</th>
        </tr>

        <?php 
        if(isset($products) && $products)
        foreach($products as $product): 
        ?>
        <tr>
          <td class="item-id"><?=$product['id']?></td>
          <td class="item-image">
            <img src="<?=asset($product['avatar']&&$product['avatar']!=''?$product['avatar']:'assets/img/no-image.png')?>" alt="" />
          </td>
          <td class="item-name"><?= $product['name']??'' ?></td>
          <td class="item-category"><?= find('id',$product['category_id'],'categories')['data']['name']??'(Chưa phân loại)' ?></td>
          <td class="item-price"><?= number_format($product['price'])??'' ?></td>

          <td class="action">
            <a href="<?=URL.'/products/detail/'.$product['id']?>"><button class="btn btn-edit">
                <i class="fas fa-edit"></i></button></a>
            <a onclick="getModalConfirm('<?=URL.'/products/delete/'.$product['id']?>')" class="btn-delete-product"><button class="btn btn-delete">
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
        $href = URL.'/products/list/'.$page;
      }
      ?>
      <li>
        <a href="<?=$href?>"><span class="previous-page"><i class="fas fa-chevron-left"></i></span></a>
      </li>
      <?php for($i = 1;$i < $totalPages + 1; $i++ ) {?>
      <li>
        <a href="<?=$href = URL.'/products/list/'.$i?>"><span class="page-number <?=$currentPage == $i?'choose':''?>"><?=$i?></span></a>
      </li>
      <?php
      }
      $href = 'javascript:void(0)';
      if($currentPage < $totalPages)
      {
        $page = $currentPage + 1;
        $href = URL.'/products/list/'.$page;
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