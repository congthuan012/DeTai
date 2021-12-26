<div class="menu-content">
  <div class="search-container">
    <form action="" method="POST" class="d-flex form-search">
      <input name="search_guest_id" value="<?=$_POST['search_guest_id']??''?>" type="text" class="input-form" placeholder="Guest id..." />
      <select name="search_status" id="" class="input-form">
        <option value="" disabled selected>Status</option>
        <?php foreach($status as $stt): ?>
          <option <?= isset($_POST['search_status']) && $_POST['search_status'] == $stt['id']?'selected':'' ?> value="<?=$stt['id']?>"><?=$stt['name']?></option>
        <?php endforeach ?>
      </select>
      <button class="btn btn-blue btn-search">Search</button>
      <a href="<?=URL.'/orders-management/list'?>" class="d-flex align-items-center"><i class="fas fa-sync"></i></a>
    </form>
  </div>
  <?php require_once './layout/widgets/alert.php'; ?>
  <?php require_once './layout/errors/errors.php'; ?>
  <div class="content-container d-flex">
    <table>
      <tbody>
        <tr>
          <th class="item-id">id</th>
          <th class="item-name">Guest Id</th>
          <th class="item-name">Guest Name</th>
          <th class="item-price">Total (VNĐ)</th>
          <th class="order-status">Status</th>
          <th class="item-name">Confirmed</th>
          <th class="action">Action</th>
        </tr>

        <?php
        if (isset($orders) && $orders) {
          foreach ($orders as $order) :
        ?>
            <tr>
              <td class="item-id"><?= $order['id'] ?? '' ?></td>
              <td class="item-id"><?= $order['guest_id'] ?? '' ?></td>
              <td class="item-name"><?= find('id', $order['guest_id'], 'guests')['data']['name'] ?? '' ?></td>
              <td class="item-price"><?= number_format($order['total']) ?? '' ?></td>
              <?php if ($order['status'] == 1) { ?>
                <td class="item-status"><span class="general"><i class="fas fa-spinner"></i> Waiting</span></td>
              <?php }
              if ($order['status'] == 0) { ?>
                <td class="item-status"><span class="danger"><i class="fas fa-times"></i> Deny</span></td>
              <?php }
              if ($order['status'] == 2) { ?>
                <td class="item-status"><span class="success"><i class="fas fa-check"></i> Accept</span></td>
              <?php } ?>
              <td class="item-name"><?= find('id', $order['admin_id'], 'admins')['data']['name'] ?? 'Waiting' ?></td>
              <td class="action">
                <a href="#"><button class="btn btn-edit">
                <i class="fas fa-info-circle"></i></button></a>
                <?php
                if ($order['status'] == 0) { ?>
                  <a onclick="getModalConfirm('<?=URL.'/orders-management/delete/'.$order['id']?>')"><button class="btn btn-delete">
                      <i class="fas fa-trash"></i></button></a>
                <?php } ?>
              </td>
            </tr>
        <?php
          endforeach;
        }
        ?>
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
        $href = URL.'/orders-management/list/'.$page;
      }
      ?>
      <li>
        <a href="<?=$href?>"><span class="previous-page"><i class="fas fa-chevron-left"></i></span></a>
      </li>
      <?php for($i = 1;$i < $totalPages + 1; $i++ ) {?>
      <li>
        <a href="<?=$href = URL.'/orders-management/list/'.$i?>"><span class="page-number <?=$currentPage == $i?'choose':''?>"><?=$i?></span></a>
      </li>
      <?php
      }
      $href = 'javascript:void(0)';
      if($currentPage < $totalPages)
      {
        $page = $currentPage + 1;
        $href = URL.'/orders-management/list/'.$page;
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