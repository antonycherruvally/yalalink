/*Call Button*/
$(document).on( "click",'.call-show-nmb', function(){
var number=$(this).attr("x");
$(".show-number").html('<a href="tel:'+number+'"><i class="fa fa-phone bounce-ani" aria-hidden="true"></i>'+number+'</a>');
});
$(document).on( "click",'.open-cv', function(){
var val=$(this).attr("x");
if(val==0){
 $(".open-cv").html(' <span><i class="fa fa-eye bounce-ani" aria-hidden="true"></i>CV Not available</span>');
}
});

$(document).ready(function() {
$("#send_email").validate({
      rules: {
        name: "required",
        email: "required",
        phone: "required",
        message: "required"
      },
      messages: {
        name: "Please enter the name",
        email: "Please enter the email",
        phone: "Please enter the phone number",
        message: "Write something.."
      }
    });
});