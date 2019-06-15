<footer class="site-footer">
  <div class="site-footer-legal">© 2018 <a href="javascript:void(0);">Yalalink</a></div>
  <div class="site-footer-right"> Crafted with <i class="red-600 icon md-favorite"></i> by <a href="javascript:void(0);">Yalalink</a> </div>
</footer>
<!-- Core  --> 
<script src="assets/admin/vendor/babel-external-helpers/babel-external-helpers.js"></script> 
<script src="assets/admin/vendor/jquery/jquery.js"></script> 
<script src="assets/admin/vendor/popper-js/umd/popper.min.js"></script> 
<script src="assets/admin/vendor/bootstrap/bootstrap.js"></script> 
<script src="assets/admin/vendor/animsition/animsition.min.js"></script> 
<script src="assets/admin/vendor/mousewheel/jquery.mousewheel.js"></script> 
<script src="assets/admin/vendor/asscrollbar/jquery-asScrollbar.js"></script> 
<script src="assets/admin/vendor/asscrollable/jquery-asScrollable.js"></script> 
<script src="assets/admin/vendor/ashoverscroll/jquery-asHoverScroll.js"></script> 
<script src="assets/admin/vendor/waves/waves.js"></script> 
<script src="assets/admin/vendor/select2/select2.full.min.js"></script>

<!-- Plugins --> 
<script src="assets/admin/vendor/switchery/switchery.js"></script> 
<script src="assets/admin/vendor/intro-js/intro.js"></script> 
<script src="assets/admin/vendor/screenfull/screenfull.js"></script> 
<script src="assets/admin/vendor/slidepanel/jquery-slidePanel.js"></script> 
<script src="assets/admin/vendor/peity/jquery.peity.min.js"></script> 
<script src="assets/admin/vendor/jquery-placeholder/jquery.placeholder.js"></script> 
<script src="assets/admin/vendor/formvalidation/formValidation.min.js"></script> 
<script src="assets/admin/vendor/formvalidation/framework/bootstrap4.min.js"></script> 
<script src="assets/admin/vendor/magnific-popup/jquery.magnific-popup.js"></script> 
<script src="assets/admin/vendor/ladda/spin.min.js"></script>
<script src="assets/admin/vendor/ladda/ladda.min.js"></script>
<!-- Scripts --> 
<script src="assets/admin/js/Component.js"></script> 
<script src="assets/admin/js/Plugin.js"></script> 
<script src="assets/admin/js/Base.js"></script> 
<script src="assets/admin/js/Config.js"></script> 
<script src="assets/admin/js/Section/Menubar.js"></script> 
<script src="assets/admin/js/Section/GridMenu.js"></script> 
<script src="assets/admin/js/Section/Sidebar.js"></script> 
<script src="assets/admin/js/Section/PageAside.js"></script> 
<script src="assets/admin/js/Plugin/menu.js"></script> 
<script src="assets/admin/js/config/colors.js"></script> 
<script src="assets/admin/js/config/tour.js"></script> 
<script>Config.set('assets', '../../assets');</script> 

<!-- Page --> 
<script src="assets/admin/js/Site.js"></script> 
<script src="assets/admin/js/Plugin/asscrollable.js"></script> 
<script src="assets/admin/js/Plugin/slidepanel.js"></script> 
<script src="assets/admin/js/Plugin/switchery.js"></script> 
<script src="assets/admin/js/Plugin/select2.js"></script>
<script src="assets/admin/js/Plugin/jquery-placeholder.js"></script> 
<script src="assets/admin/js/Plugin/material.js"></script> 
<script src="assets/admin/js/Plugin/peity.js"></script> 
<script src="assets/admin/js/dashboard.js"></script> 
<script src="assets/admin/js/Plugin/asselectable.js"></script> 
<script src="assets/admin/js/Plugin/selectable.js"></script> 
<script src="assets/admin/js/Plugin/table.js"></script> 
<script src="assets/admin/js/Plugin/magnific-popup.js"></script> 
<script src="assets/admin/js/lightbox.js"></script> 
<script src="assets/admin/js/Plugin/loading-button.js"></script>
<script src="assets/admin/js/Plugin/more-button.js"></script>
<script src="assets/admin/js/Plugin/ladda.js"></script>
<script src="assets/front_end/js/jquery.fancybox.min.js"></script> 
<script type="application/javascript">
$(document).ready(function() {
$( ".delete-single" ).click(function() {
var count = $("[type='checkbox']:checked").length;
if(count>1){
$('.delete').attr('disabled', 'disabled');
$('.deleteall').removeAttr('disabled');
}else{
$('.delete').removeAttr('disabled');
$('.deleteall').attr('disabled', 'disabled');
}
});
$( ".submit-delete" ).click(function() {
$( "#list-form" ).submit();
});
$('.delete' ).click(function() {
  		 var bid = this.id; // button ID 
  		 var trid = $(this).closest('tr').attr('id'); // table row ID 
		 $('#id').val(trid);
 		});
$(".alert-success").fadeTo(3000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});

$(".alert-danger").fadeTo(3000, 500).slideUp(500, function(){
    $(".alert-danger").slideUp(500);
});
$('.select-all').click(function(e){

		  if(this.checked){

			  $('.select-checkbox').each(function(){

				  this.checked = true;

				  $('.deleteall').removeAttr('disabled');

				  $('.delete').attr('disabled', 'disabled');

			  });

		  }else{

			  $('.select-checkbox').each(function(){

				  this.checked = false;

				  $('.deleteall').attr('disabled', 'disabled');

				  $('.delete').removeAttr('disabled');

			  });        

		  }

	  });

	  $('.check-sel').click(function(e){

		  if($('.check-sel:checked').length == $('.check-sel').length){

			  $('.select-all').each(function(){

				  this.checked = true;

			  });

		  }else{

			  $('.select-all').each(function(){

				  this.checked = false;

			  });        

		  }

	  });
});
function statusActivation(id,status){
    $.ajax({
            'url': '<?php echo base_url(); ?>admin/statusActivation/',
            'async': false,
            'data':{id:id,status:status},
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if(status==1){
                  $('.ads-status'+id).html('<a href="javascript:statusActivation('+id+',0);"><span class="badge badge-round badge-success">Active</span></a>');
                }else{
                  $('.ads-status'+id).html('<a href="javascript:statusActivation('+id+',1);"><span class="badge badge-round badge-danger">InActive</span></a>');
                }
            }
     });
}

function UserstatusActivation(id,status){
    $.ajax({
            'url': '<?php echo base_url(); ?>admin/userStatusActivation/',
            'async': false,
            'data':{id:id,status:status},
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if(status==1){
                  $('.ads-status'+id).html('<a href="javascript:UserstatusActivation('+id+',0);"><span class="badge badge-round badge-success">Active</span></a>');
                }else{
                  $('.ads-status'+id).html('<a href="javascript:UserstatusActivation('+id+',1);"><span class="badge badge-round badge-danger">InActive</span></a>');
                }
            }
     });
}

$('.filter').change(function(e){
  var country=$("#country").val();
  var from_date=$("#datefrom").val();
  var to_date=$("#dateto").val();
  window.location='admin/<?=$category?>?country='+country+'&from_date='+from_date+'&to_date='+to_date;
});

</script>
</body></html>