<div class="menu-content">
  <?php
  require_once './layout/errors/errors.php';
  require_once './layout/widgets/alert.php';
  ?>
  <?php if (isset($orders) && $orders) {
    foreach ($orders as $order) :
  ?>
      <div class="block-order">
        <span class="order-name">Đơn hàng <?= $order['id'] ?? '' ?></span>
        <div class="order-information">
          <div class="d-flex guest-name">
            <div class="col-3"><span>Guest:</span></div>
            <div class="col-9"><span><?= find('id', $order['guest_id'], 'guests')['data']['name'] ?? '' ?></span></div>
          </div>

          <div class="d-flex address">
            <div class="col-3"><span>Address:</span></div>
            <div class="col-9"><span><?= $order['address'] ?? '' ?></span></div>
          </div>

          <div class="d-flex order-price">
            <div class="col-3"><span>Product:</span></div>
            <div class="col-9"></div>
          </div>

          <div class="d-flex order-products">
            <div class="col-3">&emsp;<span>Name</span></div>
            <div class="col-2 order-product-unit-price">Unit Price</div>
            <div class="col-2 order-product-sale">Sale</div>
            <div class="col-2 order-product-quantity">Quantity</div>
            <div class="col-3 order-total-product-price">Total Price</div>
          </div>
          <?php
          $products = (array)getProducts($order['id']);
          $sale = 0;
          foreach ($products as $product) :
          ?>
            <div class="d-flex order-price">
              <div class="col-3">&emsp;<span><?= $product['name'] ?? '' ?></span></div>
              <div class="col-2 order-product-unit-price"><?= number_format($product['price']) ?? '' ?></div>
              <div class="col-2 order-product-sale"><?= number_format($product['sale']) ?? '' ?></div>
              <div class="col-2 order-product-quantity">x<?= $product['quantity'] ?? '' ?></div>
              <div class="col-3 order-total-product-price product-price"><?= number_format($product['quantity'] * $product['price'] - $product['sale']) ?? '' ?></div>
            </div>
          <?php
            $sale += $product['sale'];
          endforeach
          ?>
          <div class="d-flex order-sale">
            <div class="col-3"><span>Sale:</span></div>
            <div class="col-9"><span id="order-sale"><?= number_format($sale) ?></span></div>
          </div>

          <div class="d-flex order-total">
            <div class="col-3"><span>Total:</span></div>
            <div class="col-9" id="order-total-price"><span><?= number_format($order['total']) ?? '' ?></span></div>
          </div>

        </div>
        <div class="order-action">
          <a href="<?= URL . '/orders-management/process-confirm/deny/' . $order['id'] ?>" class="btn btn-red">Từ chối</a>
          <a href="<?= URL . '/orders-management/process-confirm/accept/' . $order['id'] ?>" class="btn btn-green">Xác nhận</a>
        </div>
      </div>
  <?php
    endforeach;
  }
  ?>
</div>