function PreviewImage(input, id) {
  document.getElementById(id).src = window.URL.createObjectURL(input.files[0]);
}

//start show and hide password
var input = document.getElementById("password");
var hide = document.getElementById("password-hide");
var show = document.getElementById("password-show");
if (show && hide) {
  show.addEventListener("click", function () {
    this.style.display = "none";
    hide.style.display = "block";
    input.type = "password";
  });

  hide.addEventListener("click", function () {
    this.style.display = "none";
    show.style.display = "block";
    input.type = "text";
  });
}
//end show and hide password

function redirect(url){
  window.location.href = url;
}

var modal = document.getElementById('modal-confirm');
function getModalConfirm(action){
  modal.style.display = "block";
  document.getElementById('modal-delete').action = action;
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

document.getElementById('close-alert').addEventListener('click',function(){
    document.getElementById('block-alert').style.display = 'none';
})