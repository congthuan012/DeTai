function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
$(function(){
    $('.product-detail').click(function(e){
        e.preventDefault();
        /** redirect to products/detail */
        var url = $('meta[name="GUEST_URL"]').attr("content");
        var id = $(this).attr('data-id');
        window.location.href = url+'/products/detail/'+id;
    });
    
    $(".product-image").click(function () {
        var id = $(this).data("id");
        var url = $('meta[name="GUEST_URL"]').attr("content");
        window.location.replace(url+"/products/detail/" + id);
      });
})