function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
$(function(){
    $('.product-detail').click(function(e){
        e.preventDefault();
        /** redirect to products/detail */
        var id = $(this).attr('data-id');
        window.location.href = '/products/detail/'+id;
    });

})