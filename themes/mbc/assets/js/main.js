(function($) {


var windowWidth = $(window).width();
var windowWidth_1920 = $('.page-body-cntlr').width();
$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	
if($("ul.slick-dots li").length == 1){
   $("ul.slick-dots").hide();
}
//matchHeightCol
if($('.mHc').length){
  $('.mHc').matchHeight();
};
if($('.mHc1').length){
  $('.mHc1').matchHeight();
};
if($('.mHc2').length){
  $('.mHc2').matchHeight();
};
if($('.mHc3').length){
  $('.mHc3').matchHeight();
};
if($('.mHc4').length){
  $('.mHc4').matchHeight();
};
if($('.mHc5').length){
  $('.mHc5').matchHeight();
};
if($('.mHc6').length){
  $('.mHc6').matchHeight();
};
$(window).load(function() {
//matchHeightCol
  if($('.mHc').length){
    $('.mHc').matchHeight();
  };
  if($('.mHc1').length){
    $('.mHc1').matchHeight();
  };
  if($('.mHc2').length){
    $('.mHc2').matchHeight();
  };
  if($('.mHc3').length){
    $('.mHc3').matchHeight();
  };
  if($('.mHc4').length){
    $('.mHc4').matchHeight();
  };
  if($('.mHc5').length){
    $('.mHc5').matchHeight();
  };
  if($('.mHc6').length){
    $('.mHc6').matchHeight();
  };
});

//$('[data-toggle="tooltip"]').tooltip();

//banner animation
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $('.page-bnr-bg').css({
    '-webkit-transform' : 'scale(' + (1 + scroll/2000) + ')',
    '-moz-transform'    : 'scale(' + (1 + scroll/2000) + ')',
    '-ms-transform'     : 'scale(' + (1 + scroll/2000) + ')',
    '-o-transform'      : 'scale(' + (1 + scroll/2000) + ')',
    'transform'         : 'scale(' + (1 + scroll/2000) + ')'
  });
});


if($('.fancybox').length){
$('.fancybox').fancybox({
    //openEffect  : 'none',
    //closeEffect : 'none'
  });

}


/**
Responsive on 767px
*/

// if (windowWidth <= 767) {
  $('.toggle-btn').on('click', function(){
    $(this).toggleClass('menu-expend');
    $('.toggle-bar ul').slideToggle(500);
  });


// }



// http://codepen.io/norman_pixelkings/pen/NNbqgG
// https://stackoverflow.com/questions/38686650/slick-slides-on-pagination-hover


/**
Slick slider
*/
if( $('.responsive-slider').length ){
    $('.responsive-slider').slick({
      dots: true,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}




/* BS form Validator*/
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

    new WOW().init();






    /*start of noyon*/

    if( $('.hamburger-cntlr').length ){
      $('.hamburger-cntlr').click(function(){
        $('body').toggleClass('allWork');
      });
    }
    if( $('li.menu-item-has-children a').length ){
      $('li.menu-item-has-children a').click(function(e){
       e.preventDefault();
       $(this).next().slideToggle(300);
       $(this).parent().toggleClass('this-sub-menu-active');
     });
    }
    if( $('.hm-bnr-logo-btn-inr').length ){
      $('.hm-bnr-logo-btn-inr').click(function(){
        $('.hm-bnr-logo-cntlr').toggleClass('hm-bnr-logo-btn-close');
      });
    }
    if (windowWidth > 991) {
      if( $('.page-bnr-cntlr').length ){
        var windowHeight = $(window).height();
        var headerHight = $('.header').height();
        var bnrHeight = (windowHeight - headerHight);
        if (windowHeight < 635) {
          $('.page-bnr-cntlr').css('height', bnrHeight);
        }
      }
    }
   $('.hm-banner-play-icon a').on('click', function(e){
    e.preventDefault();
    $(this).toggleClass('pause-cntlr');
      var video = $('#bt-vdo');
      var video = $('#bt-vdo')[0];
      var video = $('#bt-vdo');
      if(video[0].paused) {
        video[0].play();
      }
      else {
        video[0].pause();
      }
      return false;
   });



     /*start of shariful*/
     if( $('.mbcOpbSlider').length ){
      $('.mbcOpbSlider').slick({
        dots: false,
        arrows: true,
        infinite: false,
        autoplay: false,
        autoplaySpeed: 4000,
        speed: 700,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: $('.mbc-option-break-option-break-slider-ctlr .mbc-slider-prev-nxt .mbc-prev'),
        nextArrow: $('.mbc-option-break-option-break-slider-ctlr .mbc-slider-prev-nxt .mbc-nxt'),
      });
    }

    if( $('.mbcTextSlider').length ){
      $('.mbcTextSlider').slick({
        dots: false,
        arrows: true,
        infinite: false,
        autoplay: false,
        autoplaySpeed: 4000,
        speed: 700,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: $('.mbc-text-slider .mbc-slider-prev-nxt .mbc-prev'),
        nextArrow: $('.mbc-text-slider .mbc-slider-prev-nxt .mbc-nxt'),
      });
    }
    if( $('.mbcTeamSlider').length ){
      $('.mbcTeamSlider').slick({
        dots: false,
        arrows: true,
        infinite: false,
        autoplay: false,
        autoplaySpeed: 4000,
        speed: 700,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: $('.mbc-team-slider-ctlr .mbc-slider-prev-nxt .mbc-prev'),
        nextArrow: $('.mbc-team-slider-ctlr .mbc-slider-prev-nxt .mbc-nxt'),
        responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
      });
    }

    $('.mbc-accordion-title').on('click', function(){
      $(this).toggleClass('active');
      $(this).parents('.mbc-accordion-menu').siblings().find('.mbc-accordion-title').removeClass('active');
      $(this).parents('.mbc-accordion-menu').find('.mbc-accordion-des').slideToggle(300);
      $(this).parents('.mbc-accordion-menu').siblings().find('.mbc-accordion-des').slideUp(300);
    });

     $('.hm-chose-us-btn ul li a').click(function(e){
      e.preventDefault();
      var tagid = $(this).data('tag');
      $('.hm-chose-us-btn ul li a').removeClass('current');
      $('.hm-chose-us-con').removeClass('current');
      $(this).addClass('current');
      $('#'+tagid).addClass('current');
    });


/*     if($('.count').length){
      $('.count').counterUp({
          delay: 10,
          time: 3000
      });
     }*/
    if($('.counter').length){
      $('.counter').counterUp({
        delay: 10,
        time: 2000
      });
    }


      /*start of keshob*/

if( $('.contact-form-wrp').length ){
  $('.contact-form-wrp .wpforms-container .wpforms-form .wpforms-submit-container button').on('click', function(){
    $('.wpforms-field input[required],.wpforms-field select[required]').parents('.wpforms-field').addClass('wpforms-has-error');
    $('.wpforms-field input[required],.wpforms-field select[required]').addClass('wpforms-error');
  });
}


if( $('.wpforms-error').length ){
  $('.wpforms-error').on('click', function(){
    $(this).parents('.wpforms-field').removeClass('wpforms-has-error');
  });
}




var containerWidth = $('.container').width();
var containerOffset = (windowWidth_1920 - containerWidth);

var containerRgtOffset = ((containerOffset / 2)+2);
$('.contact-form-rgt-bg').css('width', containerRgtOffset);


$(window).resize(function(){
  var windowWidth_1920 = $('.page-body-cntlr').width();
  var containerWidth = $('.container').width();
  var containerOffset = (windowWidth_1920 - containerWidth);

  var containerRgtOffset = ((containerOffset / 2)+2);
  $('.contact-form-rgt-bg').css('width', containerRgtOffset);

});
      

})(jQuery);