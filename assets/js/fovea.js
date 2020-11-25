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

    s_w1.each(function(index, element){

      new Swiper(element, {
          // Optional parameters
          spaceBetween: 10,
          slidesPerView: 1,
          speed: 400,
          loop: true,
          navigation: {
            nextEl: $(element).siblings('.button-next'),
            prevEl: $(element).siblings('.button-prev'),
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

    })

    s_w2.each(function(index, element){

      new Swiper(element, {
        spaceBetween: 10,
        slidesPerView: 2,
        speed: 400,
        loop: true,
        navigation: {
          nextEl: $(element).siblings('.button-next'),
          prevEl: $(element).siblings('.button-prev'),
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
    })

    s_w3.each(function(index, element){

        new Swiper(element, {
        // Optional parameters
        spaceBetween: 10,
        slidesPerView: 3,
        speed: 400,
        loop: true,
        navigation: {
          nextEl: $(element).siblings('.button-next'),
          prevEl: $(element).siblings('.button-prev'),
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
    })

    s_w4.each(function(index, element){

        new Swiper(element, {
        // Optional parameters
        spaceBetween: 10,
        slidesPerView: 4,
        speed: 400,
        loop: true,
        navigation: {
          nextEl: $(element).siblings('.button-next'),
          prevEl: $(element).siblings('.button-prev'),
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
    })
    s_w5.each(function(index, element){

        new Swiper(element, {
        // Optional parameters
        spaceBetween: 10,
        slidesPerView: 5,
        speed: 400,
        navigation: {
          nextEl: $(element).siblings('.button-next'),
          prevEl: $(element).siblings('.button-prev'),
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
    })

  }

})(jQuery);