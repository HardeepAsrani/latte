jQuery(document).ready(function($) {
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

	/* Apply matchHeight to match services grid */
	var byRow = $('body').hasClass('pmenu-push');
	$('.col-md-12').each(function() {
		$(this).children('.service-box').matchHeight(byRow);
	});
	$('.col-md-12').each(function() {
		$(this).children('.blog-item').matchHeight(byRow);
	});
});