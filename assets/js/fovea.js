(function($){ 
    
$('.gallery-item-video').magnificPopup({
        type: 'iframe',
        gallery:{
          enabled:true
        }    
    });

    
    
    
  })(jQuery);
   
  
  window.onload = function(){

    var mySwiper1 = new Swiper('.swiper-container-1', {
        // Optional parameters
        loop: true,
        speed: 400,
        spaceBetween: 10,
        slidesPerView: 1
    })

    var mySwiper2 = new Swiper('.swiper-container-2', {
      // Optional parameters
      loop: true,
      speed: 400,
      spaceBetween: 10,
      slidesPerView: 2
    })

    var mySwiper3 = new Swiper('.swiper-container-3', {
      // Optional parameters
      loop: true,
      speed: 400,
      spaceBetween: 10,
      slidesPerView: 3
    })  

    var mySwiper4 = new Swiper('.swiper-container-4', {
      // Optional parameters
      loop: true,
      speed: 400,
      spaceBetween: 10,
      slidesPerView: 4
    })

    var mySwiper5 = new Swiper('.swiper-container-5', {
      // Optional parameters
      loop: true,
      speed: 400,
      spaceBetween: 100,
      slidesPerView: 5
    })

  }