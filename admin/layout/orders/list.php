<div class="menu-content">
  <div class="search-container">
    <form action="" method="POST" class="d-flex form-search">
      <input name="search_guest_id" value="<?= $_POST['search_guest_id'] ?? '' ?>" type="text" class="input-form" placeholder="Guest id..." />
      <select name="search_status" id="" class="input-form">
        <option value="" disabled selected>Status</option>
        <?php foreach (ORDER_STATUS  as $key => $stt) : ?>
          <option <?= isset($_POST['search_status']) && $_POST['search_status'] == $key? 'selected' : '' ?> value="<?= $key ?>"><?= $key ?></option>
        <?php endforeach ?>
      </select>
      <button class="btn btn-blue btn-search">Search</button>
      <a style="width: max-content;" href="<?= URL . '/orders/list' ?>" class="d-flex align-items-center"><i class="fas fa-sync"></i></a>
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
          /** @var $orders */
          foreach ($orders as $order) :
        ?>
            <tr>
              <td class="item-id"><?= $order['id'] ?? '' ?></td>
              <td class="item-id"><?= $order['guest_id'] ?? '' ?></td>
              <td class="item-name"><?= find('id', $order['guest_id'], 'guests')['data']['name'] ?? '' ?></td>
              <td class="item-price"><?= number_format($order['total']) ?? '' ?></td>
              <td class="item-status"><span class="<?=ORDER_STATUS[$order['status']][0]??''?>"><?=ORDER_STATUS[$order['status']][1]??''?> <?=$order['status']??''?></span></td>
              <td class="item-name"><?= find('id', $order['admin_id'], 'admins')['data']['name'] ?? 'Waiting' ?></td>
              <td class="action">
                <a class="order-detail" data-id="<?=$order['id']??''?>"><button class="btn btn-edit">
                    <i class="fas fa-info-circle"></i></button></a>
                <?php
                if ($order['status'] == 'Deny') { ?>
                  <a onclick="getModalConfirm('<?= URL . '/orders/delete/' . $order['id'] ?>')"><button class="btn btn-delete">
                      <i class="fas fa-trash"></i></button></a>
                <?php } ?>
              </td>
            </tr>
        <?php
          endforeach;
        ?>
      </tbody>
    </table>
  </div>
  <div>
    <?php if ($totalPages > 1) {
    ?>
      <ul class="paginate">
        <?php
        $href = 'javascript:void(0)';
        if ($currentPage > 1) {
          $page = $currentPage - 1;
          $href = URL . '/orders/list/' . $page;
        }
        ?>
        <li>
          <a href="<?= $href ?>"><span class="previous-page"><i class="fas fa-chevron-left"></i></span></a>
        </li>
        <?php for ($i = 1; $i < $totalPages + 1; $i++) { ?>
          <li>
            <a href="<?= $href = URL . '/orders/list/' . $i ?>"><span class="page-number <?= $currentPage == $i ? 'choose' : '' ?>"><?= $i ?></span></a>
          </li>
        <?php
        }
        $href = 'javascript:void(0)';
        if ($currentPage < $totalPages) {
          $page = $currentPage + 1;
          $href = URL . '/orders/list/' . $page;
        }
        ?>
        <li>
          <a href="<?= $href ?>"><span class="next-page"><i class="fas fa-chevron-right"></i></span></a>
        </li>
      </ul>
    <?php } ?>
  </div>
</div>
<?php
require_once './layout/widgets/modal-confirm.php';
require_once 'detail.php';
?>

<script>
  $(document).ready(function(){
    $('.order-detail').click(function(){
      let id = $(this).data('id');
      $.ajax({
        url:`<?=URL.'/orders/detail?method=ajax'?>`,
        data:{'id':id},
        method:'GET',
        success:function(res){
          if(res.status === 200){
            $('#modal-content').html(resultHtml(res.data));
            $('#order-detail').toggle();
            $('#form-detail').attr('action','<?=URL.'/orders/update/'?>'+res.data.id);
          }else{
            swal({
              title:'Error!',
              text:res.data,
              icon:'error',
              confirmButtonText:'Ok',
              timer:2000
            })
          }
        }        
      })
    })
  })
  function resultHtml(order){
    var price_sale = 0;
    var total = 0;
    var order_status = Array('Deny','Pending','Approve','Shipping','Receiving','Complete');
    var html = `<span class="order-name">Đơn hàng 1</span>
        <div class="order-information">
          <div class="d-flex guest-name">
            <div class="col-3"><span>Guest ID:</span></div>
            <div class="col-9"><span>`;
        html += order.guest_id;
        html +=`</span></div>
          </div>
          <div class="d-flex align-items-center guest-name">
            <div class="col-3"><span>Guest Name:</span></div>
            <div class="col-9"><span>`;
        html+= order.guest_name;
        html+=`</span></div>
          </div>
          <div class="d-flex address">
            <div class="col-3"><span>Address:</span></div>
            <div class="col-6" style="text-align:right"><label class="valid-text" id="valid-address"></label></div>
            <div class="col-3" style="text-align:right"><input name="address" value="`;
        html+=order.address;    
        html+=`"></div>
          </div>
          <div class="d-flex address">
            <div class="col-3"><span>Status:</span></div>
            <div class="col-6" style="text-align:right"><label class="valid-text" id="valid-status"></label></div>
            <div class="col-3" style="text-align:right">
              <select name="status" id="" style="width: 200px;">`;
        order_status.forEach((element) => {
          html+=`<option `;
          if(order.status == element)
          {
            html += 'selected';
          }
          html+=` value="`+element+`">`+element+`</option>`;
        });
        html+=`</select>
        
            </div>
          </div>
          <div class="d-flex order-price">
            <div class="col-3"><span>List product:</span></div>
            <div class="col-9"></div>
          </div>
          <div class="d-flex order-products">
            <div class="col-3">&emsp;<span>Name</span></div>
            <div class="col-2 order-product-unit-price">Unit Price</div>
            <div class="col-2 order-product-sale">Sale</div>
            <div class="col-2 order-product-quantity">Quantity</div>
            <div class="col-3 order-total-product-price">Total Price</div>
          </div>`;
          var str ='';
          order.order_detail.forEach(element => {
            str+=`<div class="d-flex order-price">
              <div class="col-3">&emsp;<span>`+element.name+`</span></div>
              <div class="col-2 order-product-unit-price"><span>`+element.price+`</span></div>
              <div class="col-2 order-product-sale"><span>`+element.sale+`</span></div>
              <div class="col-2 order-product-quantity">
                <input type="number" max="100" min="0" name="quantity[`+element.product_id+`]" value="`+element.quantity+`" style="width: 50px;">
              </div>
              <div class="col-3 order-total-product-price product-price"><span>`+(element.quantity*element.price - element.sale)+`</span></div>
            </div>`;
            price_sale += Number(element.sale);
            total += (element.quantity*element.price - element.sale);
          });
          html+=str;
          html+=`<div class="d-flex order-sale">
            <div class="col-3"><span>Sale:</span></div>
            <div class="col-9"><span id="order-sale">`;
          html+= price_sale;  
          html+=`</span></div>
          </div>
          <div class="d-flex order-total">
            <div class="col-3"><span>Total:</span></div>
            <div class="col-9" id="order-total-price"><span>`;
          html+=(total - price_sale);
          html+=`</span></div>
          </div>
        </div>`;
    return html;
  }
</script>