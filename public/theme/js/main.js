(function ($) {
 "use strict";
  
/*------------------------------------
    02. jQuery MeanMenu
-------------------------------------- */
$('#mobile-menu-active').meanmenu({
    meanScreenWidth: "991",
    meanMenuContainer: ".mobile-menu-area .mobile-menu",
});
    
/*---------------------------------
	2. Header Top Dropdown Menu 
-----------------------------------*/
$( '.drodown-show > a,.shopping-cart li > a' ).on('click', function(e) {
    e.preventDefault();
    if($(this).hasClass('active')) {
        $( '.drodown-show > a,.shopping-cart li > a' ).removeClass('active').siblings('.open-dropdown').slideUp()
        $(this).removeClass('active').siblings('.open-dropdown').slideUp();
    } else {
        $( '.drodown-show > a , .shopping-cart li > a' ).removeClass('active').siblings('.open-dropdown').slideUp()
        $(this).addClass('active').siblings('.open-dropdown').slideDown();
    }
});
 
/*-- DeopDown Menu --*/
$('.mega-menu,.dropdown-menu').hide();
if( $(window).width() > 991 ) {
    $('.main-menu > nav > ul > li').hover(
      function() {
        if( $(this).children('ul').size() > 0 && $(this).children().hasClass('mega-menu') || $(this).children().hasClass('dropdown-menu') ) {
            $(this).children().stop().slideDown(300);
        }
      }, function() {
        $(this).children('.mega-menu,.dropdown-menu').stop().slideUp(300);
      }
    );
};   
    
/*---------------------------
	Count Down Timer
----------------------------*/
$('[data-countdown]').each(function() {
	var $this = $(this), finalDate = $(this).data('countdown');
	$this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<span class="cdown day"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hours</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Minute</p></span> <span class="cdown second"><span class="time-count">%S</span> <p>Second</p></span>'));
	});
});      
    
    
/*------------------------------ 
    10. Cart Plus Minus Button
---------------------------------*/
 $(".cart-plus-minus").append('<div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>');
  $(".qtybutton").on("click", function() {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if ($button.hasClass('inc')) {
      var newVal = parseFloat(oldValue) + 1;
    } else {
       // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
        } else {
        newVal = 0;
      }
      }
    $button.parent().find("input").val(newVal);
  });    
    
/*--- Select last tab ---*/
$('.product-tab-menu a[href="#new-arrival"],.shop-item-filter-list a[href="#grid-view"],.discription-tab-menu a[href="#description"]').tab('show')
	 
    
    
/*----------------------------
 owl active
------------------------------ */    
$('.slider-active').owlCarousel({
    loop:true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    items:1,
    autoplay:true,
    dots:true,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
})
    
/*--- owl active ----*/    
$('.daily-deats-active').owlCarousel({
    loop:true,
    items:1,
    nav:true,
    dots:false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
})

/*--- owl active ----*/  
    
$('.product-active').owlCarousel({
    loop:true,
    items:1,
    nav:true,
    dots:false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        600:{items:2},
        767:{items:3},
        1000:{items:4}
    }
})
    
/*--- owl active ----*/
    
$('.product-style-2').owlCarousel({
    loop:true,
    items:1,
    dots:false,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:2},
        600:{items:2},
        767:{items:4},
        1000:{items:4}
    }
})  
    
/*--- owl active ----*/  
    
$('.product-style-3').owlCarousel({
    loop:true,
    items:1,
    dots:false,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:2},
        600:{items:3},
        767:{items:4},
        1000:{items:5}
    }
})
    
/*--- owl active ----*/  
    
$('.blog-post-active').owlCarousel({
    loop:true,
    items:1,
    nav:true,
    dots:false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        600:{items:1},
        768:{items:2},
        800:{items:3},
        1000:{items:3}
    }
})
    
/*--- owl active ----*/ 
    
$('.brand-logo-active').owlCarousel({
    loop:true,
    items:1,
    nav:true,
    dots:false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:2},
        600:{items:4},
        1000:{items:6}
    }
})
    
/*--- owl active ----*/  
    
$('.single-daily-deals-active').owlCarousel({
    loop:true,
    items:1,
    nav:true,
    dots:false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
})
    
/*--- owl active ----*/
    
$('.category-item-active').owlCarousel({
    loop:true,
    items:1,
    nav:false,
    dots:false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
})
    
/*--- owl active ----*/     
    
$('.single-blog-active').owlCarousel({
    loop:true,
    items:1,
    nav:true,
    dots:false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
})
    
/*--- owl active ----*/ 
    
$('.single-product-active').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots: false,
  merge:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:3},
        600:{items:4},
        1000:{items:4}
    }
})
    
/*--- owl active ----*/   
    
$('.post-slider').owlCarousel({
    loop:true,
    items:1,
    dots:true,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1},
        1200:{items:1}
    }
}); 
    
/*--- owl active ----*/ 
    
$('.testimonials-active').owlCarousel({
    loop:true,
    items:1,
    dots:false,
    nav:false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1},
        1200:{items:1}
    }
}); 
    
/*---------------------------
	slick  slider
----------------------------*/   
	
 $('.slider-vertical').slick({
    slidesToShow: 3,
    autoplay: false,
    vertical:true,
    verticalSwiping:true,
    slidesToScroll: 1,
    prevArrow:'<i class="fa fa-angle-right arrow-prv"></i>',
    nextArrow:'<i class="fa fa-angle-left arrow-next"></i>',
    button:false,
    responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
          }
        }
    ]
     
});	    
$('.modal').on('shown.bs.modal', function (e) {
    $('.slider-vertical').resize();
})   
    
/*----------------------------------
    ScrollUp Active
-----------------------------------*/
$.scrollUp({
    scrollText: '<i class="fa fa-angle-double-up"></i>',
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade'
});
/*-------------------------------------------
    Nice Select
-------------------------------------------- */	
$('.nice-select').niceSelect(); 
/*-------------------------------------------
    elevateZoom
-------------------------------------------- */	
    $("#zoom1").elevateZoom({
        gallery:'gallery_01', 
        responsive : true,
        zoomType : 'inner',
        cursor: 'crosshair'
    });  
    
 /*------------------------------
     4.2 Category menu Activation
------------------------------*/
    $('.category-sub-menu li.has-sub > a').on('click', function () {
        $(this).removeAttr('href');
        var element = $(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp();
        } else {
            element.addClass('open');
            element.children('ul').slideDown();
            element.siblings('li').children('ul').slideUp();
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp();
        }
    });  
/*--------------------
    Accordion
-------------------------*/
    $(".faequently-accordion").collapse({
		accordion:true,
	  open: function() {
		this.slideDown(300);
	  },
	  close: function() {
		this.slideUp(300);
	  }		
	});	 
    
/*-------------------------
  showlogin toggle function
--------------------------*/
	 $( '#showlogin' ).on('click', function() {
        $( '#checkout-login' ).slideToggle(500);
     }); 
    
/*-------------------------
  showcoupon toggle function
--------------------------*/
	 $( '#showcoupon' ).on('click', function() {
        $( '#checkout-coupon' ).slideToggle(500);
     });
    
/*--- Checkout ---*/
$("#chekout-box").on("change",function(){
    $(".account-create").slideToggle("100");
});
    
/*-- Checkout -----*/
$("#chekout-box-2").on("change",function(){
    $(".ship-box-info").slideToggle("100");
});   
    
/*------------------------------
   fixed stickymenu  
--------------------------------*/
    var stickymenu = document.getElementById("stickymenu")
    var stickymenuoffset = stickymenu.offsetTop
    var scrolltimer

    window.addEventListener("scroll", function(e){
        requestAnimationFrame(function(){
            if (window.pageYOffset > stickymenuoffset){
                stickymenu.classList.add('sticky')
            }
            else{
                stickymenu.classList.remove('sticky')
            }
        })
    });
    
/*-------------------------------------------
    Instafeed
-----------------------------------------*/   
    if($('#instagram-feed').length) {
    var feed = new Instafeed({
        get: 'user',
        userId: 6665768655,
        accessToken: '6665768655.1677ed0.313e6c96807c45d8900b4f680650dee5',
        target: 'instagram-feed',
        resolution: 'thumbnail',
        limit: 6,
        template: '<li><a href="{{link}}" target="_new"><img src="{{image}}" /></a></li>',
    });
    feed.run();
}  
    
    
    
    
    
    
    
 
})(jQuery); 