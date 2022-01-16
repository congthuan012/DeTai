<div id="order-detail" class="modal-confirm">
  <form id="form-detail" class="modal-content" action="<?=URL.'/orders/update/'?>" method="POST" style="max-width: 1000px;">
    <div class="container" style="padding: 10px;">
      <h1 style="font-size: 50px; color: red; margin: 0;text-align: center;">Order detail</h1>
      <div class="block-order" id="modal-content">

      </div>
      <div class="clearfix d-flex">
        <button type="button" onclick="document.getElementById('order-detail').style.display='none'" class="btn btn-close">Cancel</button>
        <button type="submit" class="btn btn-red">Update</button>
      </div>
    </div>
  </form>
</div>
<script>
  $(function() {
    $('#form-detail').submit(function() {
      var flag = true;
      
      if (!$("input[name='address']").val()) {
        $('#valid-address').show();
        $('#valid-address').html('Address is required!');
        flag = false;
      }
      var quantity = $("input[name='quantity']").val();
      if ((isNaN(quantity) || quantity < 1 || quantity > 100)) {
        quantity.css({"border-color": "red", 
             "border-weight":"1px", 
             "border-style":"solid"});
        flag = false;
      }
      return flag;
    });

    $("input[name='address']").keyup(function() {
      if ($("input[name='address']").val()) {
        $('#valid-address').hide();
      }
    })

    $("input[name='quantity']").keyup(function() {
      if ($("input[name='quantity']").val()) {
        $("input[name='quantity']").style('border') = 'none';
      }
    })
  })
</script>