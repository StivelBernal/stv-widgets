(function($){ 
    
$('.gallery-item-video').magnificPopup({
        type: 'iframe',
        gallery:{
          enabled:true
        }    
    });

    
    
    
  })(jQuery);
   
  
  window.onload = function(){

    var mySwiper = new Swiper('.swiper-container', {
        // Optional parameters
        loop: true,
      })
  }