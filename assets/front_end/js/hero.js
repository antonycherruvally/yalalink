(function($) {
  "use strict"; // Start of use strict
})(jQuery); // End of use strict
/*---------------------------------------------*
     * Menu Background Change
---------------------------------------------*/
  
  // var windowWidth = $(window).width();
  //   if (windowWidth > 757) {

        
          
  //           $(window).scroll(function () {
  //               if ($(this).scrollTop() >100) {
  //                   $('.hero-header').fadeIn(200);
  //                   $('.hero-header').addClass('sticky-bg');

  //               } else {
                    
  //                   $('.navbar').removeClass('sticky-bg');
  //               }
  //           });
        
  //   }


  $(document).ready(function() {
    $(".sidebar-item").hide();
  function toggleSidebar() {
    $(".button").toggleClass("active");
    $(".push-wrapper").toggleClass("move-to-left");
    $(".sidebar-item").show();
    $(".sidebar-item").toggleClass("active");
  }

  $(".button").on("click tap", function() {
    toggleSidebar();
  });

  $(document).keyup(function(e) {
    if (e.keyCode === 27) {
      toggleSidebar();
    }
  });

});

$(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

//  $('.search-ico').click(function(){
//   $('.mobile-search input[type=text]').fadeToggle();

// });

 /*---------------------------------------------*
     * Scroll Up
---------------------------------------------*/  


    $(window).scroll(function(){
        if ($(this).scrollTop() > 600) {
            $('.scrollup').fadeIn('slow');
        } else {
            $('.scrollup').fadeOut('slow');
        }
    });
     $('.scrollup').click(function(){
      $("html, body").animate({ scrollTop: 0 },1000);
      return false;
    });

 $(document).on('show','.accordion', function (e) {
         //$('.accordion-heading i').toggleClass(' ');
         $(e.target).prev('.accordion-heading').addClass('accordion-opened');
    });
    
    $(document).on('hide','.accordion', function (e) {
        $(this).find('.accordion-heading').not($(e.target)).removeClass('accordion-opened');
        //$('.accordion-heading i').toggleClass('fa-chevron-right fa-chevron-down');
    });


//Select
/*$(document).ready(function() {
    $('.js-example-basic-single').select2();
    if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 $("select").select2('destroy');
}
     //$('#pages').show();
});*/


$(".sublist-wrap .nav-link").on('click', function(e) {
  //alert(1);
        e.preventDefault()
        var page = $(this).data('page');
        $("#pages .subcat-wrapper:not('.hide')").stop().fadeOut('fast', function() {
            $(this).addClass('hide');
            $(".sublist-wrap .nav-link").removeClass('active-tabss');
            $('#pages .subcat-wrapper[data-page="'+page+'"]').fadeIn('slow').removeClass('hide');

             var previous = $(this).closest(".nav-link").addClass(".active-tabss");
            previous.removeClass('active-tabss'); // previous list-item
            $(e.target).addClass('active-tabss'); // activated list-item

            
             //$(".sublist-wrap .nav-link").addClass('active-tabss');
            //$('.sublist-wrap').closest('.nav-link').addClass('active-tabss');
            //$('#pages .subcat-wrapper .sublist-wrap .nav-link[data-page="'+page+'"]').fadeIn('slow').removeClass('hide');
        });

       
    });




    
   

   


