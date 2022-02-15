$(function () {
  $(".product-image").click(function () {
    var id = $(this).data("id");
    window.location.replace("/products/detail/" + id);
  });
  renderMiniCart();

  $(".btn-add-to-cart").click(function () {
    var _that = $(this);
    var _oldHtml = _that.html();
    var _url = _that.data("url");
    var _data = {
      id: _that.data("id"),
      method: "ajax",
    };
    _that.prop("disable", true).html('<i class="fas fa-spinner"></i>');
    $.ajax({
      url: _url,
      data: _data,
      method: "POST",
      success: function (res) {
        swal({
          title: res.msg,
          icon: res.status,
          button: false,
          timer: 1500,
        });

        if (res.status == "success") {
          renderMiniCart();
        }
      },
      complete: function (res) {
        _that.prop("disable", false).html(_oldHtml);
      },
    });
  });

});


function renderMiniCart() {
  $.ajax({
    url: `/cart/render-mini-cart`,
    data: { method: "ajax" },
    method: "POST",
    success: function (res) {
      var cartData = res.cart;
      var blockCart = $("#cart");
      if (cartData && cartData.length == 0) {
        blockCart.html(
          `<div style="height: 100%;display: flex;align-items: center;width: 100%;justify-content: center;position: absolute;">No Product</div>`
        );
      } else {
        blockCart.html(resultHtml(cartData));
      }
    },
  });
}

function resultHtml(cartData) {
  var html = ``;
  var total = 0;
  $.each(cartData, function (key, value) {
    html += `<div class="row block-detail">
            <div class="col-7">
                <label class="product-name">${value.product_name}</label>
                <br>
                <label class="product-des">${
                  value.quantity
                } x ${value.product_price
      .toString()
      .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")}</label>
            </div>
            <div class="col-5 block-image">
                <img src="${value.product_avatar}" alt="">
                <i onclick="removeFormCart(${key})" class="far fa-times-circle remove-form-cart"></i>
            </div>
        </div>
        <hr>`;
    total += value.quantity * value.product_price;
  });
  html += `
        <div class="row block-detail">
          <div class="col-5">
            <label class="label-total">ToTal:</label>
          </div>
          <div class="col-7 block-image">
              <label for="">${total
                .toString()
                .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")} VNĐ</label>
          </div>
        </div>
        <div class="row block-button">
            <a href="/cart" class="col-6 btn btn-primary view-cart">View</a>
            <button onclick="window.location.replace('/cart/checkout');" class="col-6 btn btn-success">Checkout</button>
        </div>`;
  return html;
}

function removeFormCart(id){
  swal({
    title: "Deleted this product?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      var __url = $('meta[name="GUEST_URL"]').attr("content");
      $.ajax({
        url: __url+'/products/remove-form-cart',
        data: {'id':id,'method':'ajax'},
        method: "POST",
        success: function (res) {
          swal({
            title: res.msg,
            icon: res.status,
            button: false,
            timer: 1500,
          });
        },
        complete: function (res) {
          renderMiniCart();
        },
      });
    }
  });
}