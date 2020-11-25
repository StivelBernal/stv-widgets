(function($){ 

  $(document).ready(function() {

    $('.gallery-item-video').magnificPopup({
        type: 'iframe',
        gallery:{
          enabled:true
        }    
    });
    
    if( window.screen.width < 767 ){
      
      var menu = document.querySelector('#header .menu-container').classList.add('collapse');
      
    }
    
});

    
    

  
  window.onload = function(){

    var s_w1 = $('.swiper-container-1');

    var s_w2 = $('.swiper-container-2');

    var s_w3 = $('.swiper-container-3');

    var s_w4 = $('.swiper-container-4');

    var s_w5 = $('.swiper-container-5');
    
    var mySwiper1 = new Swiper(s_w1, {
        // Optional parameters
        spaceBetween: 10,
        slidesPerView: 1,
        speed: 400,
        loop: true,
        navigation: {
          nextEl: s_w1.siblings('.button-next'),
          prevEl: s_w1.siblings('.button-prev'),
        },
        autoplay: {
            delay: 2000,
            disableOnInteraction: false
        },
        speed: 500,
        breakpoints: {
            200: {
              slidesPerView: 1
            },
            700: {
              slidesPerView: 2
            },
            1000: {
              slidesPerView: 3
            }
        }
    })

    var mySwiper2 = new Swiper(s_w2, {
      spaceBetween: 10,
      slidesPerView: 2,
      speed: 400,
      loop: true,
      navigation: {
        nextEl: s_w2.siblings('.button-next'),
        prevEl: s_w2.siblings('.button-prev'),
      },
      autoplay: {
          delay: 2000,
          disableOnInteraction: false
      },
      speed: 500,
      breakpoints: {
          200: {
            slidesPerView: 1
          },
          700: {
            slidesPerView: 2
          },
          1000: {
            slidesPerView: 2
          }
      }
    })

    var mySwiper3 = new Swiper(s_w3, {
      // Optional parameters
      spaceBetween: 10,
      slidesPerView: 3,
      speed: 400,
      loop: true,
      navigation: {
        nextEl: s_w3.siblings('.button-next'),
        prevEl: s_w3.siblings('.button-prev'),
      },
      autoplay: {
          delay: 2000,
          disableOnInteraction: false
      },
      speed: 500,
      breakpoints: {
          200: {
            slidesPerView: 1
          },
          700: {
            slidesPerView: 2
          },
          1000: {
            slidesPerView: 3
          }
      }
    })  

    var mySwiper4 = new Swiper(s_w4, {
      // Optional parameters
      spaceBetween: 10,
      slidesPerView: 4,
      speed: 400,
      loop: true,
      navigation: {
        nextEl: s_w4.siblings('.button-next'),
        prevEl: s_w4.siblings('.button-prev'),
      },
      autoplay: {
          delay: 2000,
          disableOnInteraction: false
      },
      speed: 500,
      breakpoints: {
          200: {
            slidesPerView: 1
          },
          700: {
            slidesPerView: 2
          },
          1000: {
            slidesPerView: 4
          }
      }
    })

    var mySwiper5 = new Swiper(s_w5, {
      // Optional parameters
      spaceBetween: 10,
      slidesPerView: 5,
      speed: 400,
      navigation: {
        nextEl: s_w5.siblings('.button-next'),
        prevEl: s_w5.siblings('.button-prev'),
      },
      loop: true,
      autoplay: {
          delay: 2000,
          disableOnInteraction: false
      },
      speed: 500,
      breakpoints: {
          200: {
            slidesPerView: 1
          },
          700: {
            slidesPerView: 2
          },
          1000: {
            slidesPerView: 5
          }
      }
    })

  }

})(jQuery);