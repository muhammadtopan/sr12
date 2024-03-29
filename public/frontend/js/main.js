/*  ---------------------------------------------------
    Template Name: Fashi
    Description: Fashi eCommerce HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com/
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Hero Slider
    --------------------*/
    $(".hero-items").owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        items: 1,
        dots: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        // navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        navText: false,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        Kategori
    --------------------*/

    $('.kategori').owlCarousel({
        loop:false,
        margin:15,
        nav:false,
        autoHeight:true,
        responsive:{
            0:{
                items:3
            },
            600:{
                items:5
            },
            1000:{
                items:7
            }
        }
    })

    /*------------------
        Product Slider
    --------------------*/
   $(".product-slider").owlCarousel({
        loop: false,
        margin: 25,
        nav: false,
        // items: 4,
        dots: false,
        // navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 3,
            },
            576: {
                items: 5,
            },
            992: {
                items: 5,
            },
            1200: {
                items: 6,
            }
        }
    });

    /*------------------
        All Product Slider
    --------------------*/
   $(".allproduct-slider").owlCarousel({
        loop: true,
        margin: 15,
        center:false,
        nav: false,
        // items: 4,
        dots: false,
        smartSpeed: 1200,
        autoplay: true,
        responsive: {
            0: {
                items: 3,
            },
            576: {
                items: 6,
            },
            1200: {
                items: 8,
            }
        }
    });

    /*------------------
        All Product Slider
    --------------------*/
   $(".package-slider").owlCarousel({
        loop: false,
        margin: 15,
        center:false,
        nav: false,
        // items: 4,
        dots: false,
        responsive: {
            0: {
                items: 3,
            },
            576: {
                items: 5,
            },
            992: {
                items: 5,
            },
            1200: {
                items: 7,
            }
        }
    });

    /*------------------
        Testimony Slider
    --------------------*/
   $(".testi-slider").owlCarousel({
        loop: true,
        margin: 10,
        center:false,
        nav: false,
        // items: 4,
        dots: false,
        autoplay: true,
        smartSpeed: 1200,
        responsive: {
            0: {
                items: 5,
            },
            576: {
                items: 7,
            },
            992: {
                items: 10,
            },
            1200: {
                items: 10,
            }
        }
    });

    /*------------------
       logo Carousel
    --------------------*/
    $('.asd-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })

    /*------------------
       logo Carousel
    --------------------*/
    $(".logo-carousel").owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        items: 5,
        dots: false,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        mouseDrag: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            }
        }
    });

    /*-----------------------
       Product Single Slider
    -------------------------*/
    $(".ps-slider").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        items: 3,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });
    
    /*------------------
        CountDown
    --------------------*/
    // For demo preview
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if(mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end
    

    // Use this for real timer date
    /* var timerdate = "2020/01/01"; */

	$("#countdown").countdown(timerdate, function(event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"));
    });

        
    /*----------------------------------------------------
     Language Flag js 
    ----------------------------------------------------*/
    $(document).ready(function(e) {
    //no use
    try {
        var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
            var val = data.value;
            if(val!="")
                window.location = val;
        }}}).data("dd");

        var pagename = document.location.pathname.toString();
        pagename = pagename.split("/");
        pages.setIndexByValue(pagename[pagename.length-1]);
        $("#ver").html(msBeautify.version.msDropdown);
    } catch(e) {
        // console.log(e);
    }
    $("#ver").html(msBeautify.version.msDropdown);

    //convert
    $(".language_drop").msDropdown({roundedBorder:false});
        $("#tech").data("dd");
    });
    /*-------------------
		Range Slider
	--------------------- */
	var rangeSlider = $(".price-range"),
		minamount = $("#minamount"),
		maxamount = $("#maxamount"),
		minPrice = rangeSlider.data('min'),
		maxPrice = rangeSlider.data('max');
	    rangeSlider.slider({
		range: true,
		min: minPrice,
        max: maxPrice,
		values: [minPrice, maxPrice],
		slide: function (event, ui) {
			minamount.val('Rp ' + ui.values[0]);
			maxamount.val('Rp ' + ui.values[1]);
		}
	});
	minamount.val('Rp ' + rangeSlider.slider("values", 0));
    maxamount.val('Rp ' + rangeSlider.slider("values", 1));

    /*-------------------
		Radio Btn
	--------------------- */
    $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").on('click', function () {
        $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").removeClass('active');
        $(this).addClass('active');
    });
    
    /*-------------------
		Nice Select
    --------------------- */
    $('.sorting, .p-show').niceSelect();

    /*------------------
		Single Product
	--------------------*/
	$('.product-thumbs-track .pt').on('click', function(){
		$('.product-thumbs-track .pt').removeClass('active');
		$(this).addClass('active');
		var imgurl = $(this).data('imgbigurl');
		var bigImg = $('.product-big-img').attr('src');
		if(imgurl != bigImg) {
			$('.product-big-img').attr({src: imgurl});
			$('.zoomImg').attr({src: imgurl});
		}
	});

    $('.product-pic-zoom').zoom();
    
    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
	proQty.prepend('<span class="dec qtybtn">-</span>');
	proQty.append('<span class="inc qtybtn">+</span>');
	proQty.on('click', '.qtybtn', function () {
		var $button = $(this);
		var oldValue = $button.parent().find('input').val();
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
		$button.parent().find('input').val(newVal);
	});

    /*-------------------
		Syarat Mitra
	--------------------- */
    $('#syarat').scrollspy({ target: '#navbar-example3' })
    
    $('[data-spy="scroll"]').each(function () {
        var $spy = $(this).scrollspy('refresh')
    })
    
    /*-------------------
        Why-join
    --------------------- */
    $('.owl-why-join').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        autoplay: true,
        smartSpeed: 1200,
        responsive:{
            0:{
                items:3
            },
            600:{
                items:4
            },
            1000:{
                items:7
            }
        }
    })
    
    /*-------------------
        owl-ilmu-strategi
    --------------------- */
    $('.owl-ilmu-strategi').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        autoplay: true,
        smartSpeed: 640,
        responsive:{
            0:{
                items:3
            },
            600:{
                items:5
            },
            1000:{
                items:5
            }
        }
    })
    
    /*-------------------
        owl-status-orderan
    --------------------- */
    $('.owl-status-orderan').owlCarousel({
        loop:false,
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:5
            },
            1000:{
                items:5
            }
        }
    })
    
    /*-------------------
        slide-testi
    --------------------- */
    $('.slide-testi').owlCarousel({
        stagePadding: 50,
        loop:true,
        margin:10,
        center:false,
        nav:false,
        autoplay: true,
        smartSpeed: 1200,
        items:1
    })

    /*------------------
        ulasan
    --------------------*/

    $('.owl-ulasan').owlCarousel({
        loop:true,
        items:1,
        autoplay: true,
        smartSpeed:1200,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    })

})(jQuery);