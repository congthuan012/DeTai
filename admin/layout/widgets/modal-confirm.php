<div id="modal-confirm" class="modal-confirm">
  <span onclick="document.getElementById('modal-confirm').style.display='none'" class="close" title="Close Modal">×</span>
  <form id="modal-delete" class="modal-content" action="">
    <div class="container" style="padding: 10px; text-align: center;">
      <h1 style="font-size: 50px; color: red; margin-top: 0;">Delete</h1>
      <p>Are you sure you want to delete this selection?</p>
    
      <div class="clearfix d-flex">
        <button type="button" onclick="document.getElementById('modal-confirm').style.display='none'" class="btn btn-close">Cancel</button>
        <button type="submit" onclick="document.getElementById('modal-confirm').style.display='none'" class="btn btn-red">Delete</button>
      </div>
    </div>
  </form>
</div>