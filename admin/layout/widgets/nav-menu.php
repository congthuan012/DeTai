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
      <!-- <li class="<?= $folder == 'dashboard'?'focus':'' ?>">
        <a href="<?=URL.'/dashboard'?>"><i class="fas fa-home"></i>Dashboard</a>
      </li>     -->
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

      <li>
        <a id="btn-change-password"><i class="fas fa-user-shield"></i>Change password</a>
      </li>
    </ul>
  </div>

</nav>
<?php require_once './layout/admins/change-password.php' ?>
<script>
  $(function(){
    $('#btn-change-password').click(function(){
      $('#modal-change-password').show()
    })


    $('#form-change-password').submit(function() {
      var flag = true;
      
      if (!$("input[name='old_password']").val()) {
        $('#valid-old_password').show();
        $('#valid-old_password').html('Password is required!');
        flag = false;
      }

      if (!$("input[name='new_password']").val()) {
        $('#valid-new_password').show();
        $('#valid-new_password').html('New Password is required!');
        flag = false;
      }

      if (!$("input[name='password_confirm']").val()) {
        $('#valid-password_confirm').show();
        $('#valid-password_confirm').html('Password Confirm is required!');
        flag = false;
      }
      if($("input[name='password_confirm']").val() != null && $("input[name='new_password']").val() != null)
      {
        if($("input[name='password_confirm']").val() != $("input[name='new_password']").val()){
          $('#valid-password_confirm').show();
          $('#valid-password_confirm').html('Password and Password Confirm not match!');
          flag = false;
        }
      }
      return flag;
    });

    $("input[name='old_password']").keyup(function() {
      if ($("input[name='old_password']").val()) {
        $('#valid-old_password').hide();
      }
    })

    $("input[name='new_password']").keyup(function() {
      if ($("input[name='new_password']").val()) {
        $('#valid-new_password').hide();
      }

      if($("input[name='password_confirm']").val() == $("input[name='new_password']").val()){
        $('#valid-old_password').hide();
          flag = false;
        }
    })

    $("input[name='old_password']").keyup(function() {
      if ($("input[name='old_password']").val()) {
        $('#valid-old_password').hide();
      }

      if($("input[name='password_confirm']").val() == $("input[name='new_password']").val()){
        $('#valid-old_password').hide();
      }
    })

    $('#form-change-password').submit(function(e){
      e.preventDefault();
      let form = $(this).serialize();
      $.ajax({
        url:'<?= URL."/admins/change-password"?>',
        method:'post',
        data:form,
        success:function(res){
          console.log(res)
          if(res.code == 500){
            error = res.data;
            if(error.old_password){
              $('#valid-old_password').show();
              $('#valid-old_password').html(error.old_password);
            }else if(error.new_password){
              $('#valid-new_password').show();
              $('#valid-new_password').html(error.new_password);
            }else if(error.password_confirm){
              $('#valid-password_confirm').show();
              $('#valid-password_confirm').html(error.password_confirm);
            }else{
              $('#valid-confirm_password').show();
              $('#valid-confirm_password').html(error.confirm_password);
            }
          }else{
            swal({
              title:'Success',
              text:'Change password success!',
              icon:'success',
              confirmButton:false,
              timer:2000
            });
            $('#form-change-password').trigger('reset')
            $('#modal-change-password').hide();
          }
        },
        error:function(err){
          swal({
            title:'Error!',
            text:'Server error!',
            icon:'error',
            confirmButton:false,
            timer:2000
          })
        }
      });
    });
  })
</script>