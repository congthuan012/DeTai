function PreviewImage(input, id) {
  document.getElementById(id).src = window.URL.createObjectURL(input.files[0]);
}

//start show and hide password

var input = document.getElementById("password");
var hide = document.getElementById("password-hide");
var show = document.getElementById("password-show");

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
//end show and hide password
