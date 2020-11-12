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

    
    
})(jQuery);
   
  
  window.onload = function(){

    var mySwiper1 = new Swiper('.swiper-container-1', {
        // Optional parameters
        spaceBetween: 10,
        slidesPerView: 1,
        speed: 400,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
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

    var mySwiper2 = new Swiper('.swiper-container-2', {
      spaceBetween: 10,
      slidesPerView: 2,
      speed: 400,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
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

    var mySwiper3 = new Swiper('.swiper-container-3', {
      // Optional parameters
      spaceBetween: 10,
      slidesPerView: 3,
      speed: 400,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
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

    var mySwiper4 = new Swiper('.swiper-container-4', {
      // Optional parameters
      spaceBetween: 10,
      slidesPerView: 4,
      speed: 400,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
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

    var mySwiper5 = new Swiper('.swiper-container-5', {
      // Optional parameters
      spaceBetween: 10,
      slidesPerView: 5,
      speed: 400,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
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