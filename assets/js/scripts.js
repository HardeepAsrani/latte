jQuery(window).load(function() {

	if( latte_script_var.latte_preloader_display != 1 ) {
		/* Preloader */
		jQuery(".status").fadeOut();
		jQuery(".preloader").delay(1000).fadeOut("slow");
	}

	if( latte_script_var.latte_animations_display != 1 ) {
		/* scrollReval */
		window.sr = new scrollReveal();
	}

});

jQuery(document).ready(function($) {
	if( latte_script_var.latte_is_homepage != 1 ) {
		/* Smooth Scroll */
		jQuery('a[href*=#]').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = jQuery(this.hash);
				target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					jQuery('html,body').animate({
						scrollTop: target.offset().top
					}, 1200);
					return false;
				}
			}
		});
		if( latte_script_var.latte_parallax_background != '' ) {
			/* Parallax */
			$('.site-wrapper').parallax({imageSrc: latte_script_var.latte_parallax_background, bleed: '10', androidFix: 'false'});
		}
	}

	if( latte_script_var.latte_menu_display != 1 ) {
		var menuLeft = document.getElementById( 'pmenu' ),
		showLeftPush = document.getElementById( 'showLeftPush' ),
		hideLeftPush = document.getElementById( 'hideLeftPush' ),
		body = document.body;

		showLeftPush.onclick = function() {
			classie.toggle( this, 'active' );
			classie.toggle( body, 'pmenu-push-toright' );
			if (classie.has(showLeftPush,"fa-bars")) {
				classie.remove(showLeftPush,"fa-bars");
				classie.add(showLeftPush,"fa-times");
			} else {
				classie.add(showLeftPush,"fa-bars");
			}
			classie.toggle( menuLeft, 'pmenu-open' );
			disableOther( 'showLeftPush' );
		};
		hideLeftPush.onclick = function() {
			classie.toggle( this, 'active' );
			classie.toggle( body, 'pmenu-push-toright' );
			classie.toggle( menuLeft, 'pmenu-open' );
			disableOther( 'hideLeftPush' );
			classie.add(showLeftPush,"fa-bars");
		};

		function disableOther( button ) {
			if( button !== 'showLeftPush' ) {
				classie.toggle( showLeftPush, 'disabled' );
			}
		}
	}

	if( latte_script_var.latte_is_homepage != 1 ) {
		if( latte_script_var.latte_skills_display != 1 ) {
			/* Skillbar animation speed */
			jQuery('.skillbar').each(function(){
				jQuery(this).find('.skillbar-bar').animate({
					width:jQuery(this).attr('data-percent')
				},6000);
			});
		}
		/* Apply matchHeight to match services grid */
		var byRow = $('body').hasClass('pmenu-push');
		if( latte_script_var.latte_services_display != 1 ) {
			$('.col-md-12').each(function() {
				$(this).children('.service-box').matchHeight(byRow);
			});
		}
		if( latte_script_var.latte_blogposts_display != 1 ) {
			$('.col-md-12').each(function() {
				$(this).children('.blog-item').matchHeight(byRow);
			});
		}
	}

});
