var $ = jQuery.noConflict();
$(document).ready(function () {
	

	prepareMobileMenu();

	/* ==== Carousel Start ==== */
	$("#upcoming-tours").owlCarousel({
		loop: true,
		autoplay: true,
		autoplayTimeout: 2500,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			768: {
				items: 2,
				nav: true
			},
			992: {
				items: 3,
				nav: true,
				loop: true
			}
		}
	});

	$("#tour-type").owlCarousel({
		loop: true,
		autoplay: true,
		autoplayTimeout: 2500,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			768: {
				items: 2,
				nav: true,
				loop: true
			}
		}
	});

	$("#testimonial").owlCarousel({
		loop: true,
		autoplay: true,
		autoplayTimeout: 2500,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true
			}
		}
	});

	$('.loop').owlCarousel({
		center: true,
		items: 2,
		nav: true,
		loop: true,
		responsiveClass: true,
		responsive: {
			600: {
				items: 2
			}
		}
	});


	if ($(window).width() <= 767) {
		$(".loop").owlCarousel({
			//loop:true,
			autoplay: true,
			autoplayTimeout: 5000,
			//nav:true,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					loop: true
				}
			}
		});
	}

	// Slideshow 1
	$("#slider1").responsiveSlides({
		auto: true,
		pager: true,
		nav: true,
		speed: 900,
		namespace: "centered-btns"
	});


	$('.banner').css({ height: $(window).innerHeight() });


	$(window).resize(function () {
		$('.banner').css({ height: $(window).innerHeight() });
		prepareMobileMenu();
	});

	// Menu Button toggle , open or close the mobile menu on click of the menu button
	$("#mobile-menu.active").on('click', function () {
		if($(this).hasClass('opened')) {
			
			//Change the submenu toggle button to close position before closing all the opened submenus
			$('#mobilenav li.menu-item-has-children:not(".mega-config") > ul').siblings("span").children('i').addClass("fa-plus-square");
			$('#mobilenav li.menu-item-has-children:not(".mega-config") > ul').siblings("span").children('i').removeClass("fa-minus-square");
			//Then close all the opened submenus
			$('#mobilenav li.menu-item-has-children:not(".mega-config") > ul').hide('slow');

			$(this).removeClass("opened");
		}
		else 
			$(this).addClass("opened");

		$('#mobilenav').toggle('slow');
	});

	//Show or hide submenus on click of the expand or minimize button
	$(document).on('click', 'span.sh-submenu', function () {
		if($(this).parent('li:not(".mega-config")')){
			if ($(this).siblings('ul').is(':visible')) {
				$(this).children("i").addClass("fa-plus-square");
				$(this).children("i").removeClass("fa-minus-square");
				$(this).siblings('ul').hide('slow');
			}
			else {
				$(this).children("i").addClass("fa-minus-square");
				$(this).children("i").removeClass("fa-plus-square");
				$(this).siblings('ul').show('slow')
			}
		}
	});


	var scrollHeight = $('#about-left .lt-block').height()-100;
	$('#jsScroll').css({height: scrollHeight});
	$('#jsScroll').jScrollPane();


});

function prepareMobileMenu() {
    if ($(window).width() < 768) {
		$('#mobile-menu').addClass('active');
		$('#nav-wrap').attr("id", "mobilenav");

		$( '#mobilenav li.menu-item-has-children:not(".mega-config")' ).each(function( index ) {
			if (!$(this).hasClass("sh-submenu")) {
				$(this).append("<span class='sh-submenu d-md-none'><i class='fa fa-plus-square'></i></span>");
			}
		});
	}
    else {
		$('#mobile-menu').removeClass('active');
		$('#mobilenav').attr("id", "nav-wrap");
		$('#mobilenav span.sh-submenu').remove();
    }
}
