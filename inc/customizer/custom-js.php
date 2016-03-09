<?php
/**
 * Custom JS for wp_footer
 */
function latte_custom_js() {
	$latte_preloader_display = get_theme_mod('latte_preloader_display');
	$latte_menu_display = get_theme_mod('latte_menu_display');
	$latte_animations_display = get_theme_mod('latte_animations_display');
	$latte_skills_display = get_theme_mod('latte_skills_display');
	$latte_parallax_background = get_theme_mod('latte_parallax_background', get_template_directory_uri().'/assets/images/background.jpg' );
?>

<script type="text/javascript">
jQuery(window).load(function() {

<?php if( isset($latte_preloader_display) && $latte_preloader_display != 1 ): ?>
	/* Preloader */
	jQuery(".status").fadeOut();
	jQuery(".preloader").delay(1000).fadeOut("slow");
<?php endif; ?>

<?php if( isset($latte_animations_display) && $latte_animations_display != 1 ): ?>
	/* scrollReval */
	window.sr = new scrollReveal();
<?php endif; ?>
});
jQuery(document).ready(function($) {
<?php if( is_page_template( 'template-home.php' ) ) : ?>
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

	/* Parallax */
<?php if(!empty($latte_parallax_background)) : ?>
	$('.site-wrapper').parallax({imageSrc: '<?php echo esc_url($latte_parallax_background); ?>', bleed: '10', androidFix: 'false'});
<?php endif; ?>
<?php endif; ?>

<?php if( isset($latte_menu_display) && $latte_menu_display != 1 ): ?>
	/* Enable Slideout Menu */
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
<?php endif; ?>

<?php if( isset($latte_skills_display) && $latte_skills_display != 1 ): ?>
	/* Skillbar animation speed */
	jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
<?php endif; ?>

<?php if( is_page_template( 'template-home.php' ) ) : ?>

	/* Apply matchHeight to match services grid */
	var byRow = $('body').hasClass('pmenu-push');
	$('.col-md-12').each(function() {
		$(this).children('.service-box').matchHeight(byRow);
	});
	$('.col-md-12').each(function() {
		$(this).children('.blog-item').matchHeight(byRow);
	});

<?php endif; ?>

});
</script>
<?php
}

add_action ( 'wp_footer', 'latte_custom_js', 100 );

?>
