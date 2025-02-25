$(document).ready(function () {
 	$(".hs-menubar").hsMenu(); 
 }); 

$(document).ready(function(){
	$(window).scroll(function () {
	if ($(this).scrollTop() > 50) {
		$('#back-to-top').fadeIn();
	} else {
		$('#back-to-top').fadeOut();
	}
});
// scroll body to 0px on click
$('#back-to-top').click(function () {
	$('body,html').animate({
		scrollTop: 0
	}, 400);
	return false;
});
});

new WOW().init();

$('#homeSlider').owlCarousel({
	animateIn: 'fadeIn',
	animateOut: 'fadeOut',
	loop:true,
	dots:false,
	nav:true,
	autoplay:true,
	autoplayTimeout:4500,
	autoplayHoverPause: true,
    navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
	responsive:{
		0:{
			items:1
		},
		600:{
			items:1
		},
		1000:{
			items:1
		}
	}
})

$('#specialOfferSlider').owlCarousel({
    margin:20,
    loop:true,
    dots:true,
    nav:true,
    smartSpeed:1000,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause: true,
    navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:5
        }
    }
})

$('#specialProductSlider').owlCarousel({
    margin:20,
    loop:true,
    dots:true,
    nav:false,
    smartSpeed:1000,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

$('#topCategoriesSlider').owlCarousel({
    margin:20,
    loop:true,
    dots:false,
    nav:false,
    smartSpeed:1000,
    autoplay:true,
    autoplayTimeout:2500,
    autoplayHoverPause: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

$('#partnerSlider').owlCarousel({
    margin:25,
    loop:true,
    dots:false,
    nav:false,
    autoplay:true,
    smartSpeed:1000,
    autoplayTimeout:2000,
	autoplayHoverPause: false,
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