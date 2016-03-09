<?php
/**
 * Custom CSS for wp_head
 */
function latte_custom_css() {
	$latte_intro_display = get_theme_mod('latte_intro_display');
	$latte_about_display = get_theme_mod('latte_about_display');
	$latte_social_display = get_theme_mod('latte_social_display');
	$latte_services_display = get_theme_mod('latte_services_display');
	$latte_subscribe_display = get_theme_mod('latte_subscribe_display', 1);
	$latte_skills_display = get_theme_mod('latte_skills_display');
	$latte_blogposts_display = get_theme_mod('latte_blogposts_display');
	$latte_intro_background_color = get_theme_mod('latte_intro_background_color', 'rgba(0, 0, 0, 0.7)' );
	$latte_about_background_color = get_theme_mod('latte_about_background_color', '#F5F5F5' );
	$latte_social_background_color = get_theme_mod('latte_social_background_color', 'rgba(0, 0, 0, 0.7)' );
	$latte_services_background_color = get_theme_mod('latte_services_background_color', '#F5F5F5' );
	$latte_subscribe_background_color = get_theme_mod('latte_subscribe_background_color', 'rgba(0, 0, 0, 0.7)' );
	$latte_skills_background_color = get_theme_mod('latte_skills_background_color', '#F5F5F5' );
	$latte_blogposts_background_color = get_theme_mod('latte_blogposts_background_color', '#F5F5F5' );
?>
<style>
<?php if ( is_page_template( 'template-home.php' ) ) : ?>
<?php if( isset($latte_intro_display) && $latte_intro_display != 1 ): ?>
<?php if(!empty($latte_intro_background_color)) : ?>
.intro {
	background: <?php echo esc_html($latte_intro_background_color); ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_about_display) && $latte_about_display != 1 ): ?>
<?php if(!empty($latte_about_background_color)) : ?>
.about {
	background: <?php echo esc_html($latte_about_background_color); ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_social_display) && $latte_social_display != 1 ): ?>
<?php if(!empty($latte_social_background_color)) : ?>
.social {
	background: <?php echo esc_html($latte_social_background_color); ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_services_display) && $latte_services_display != 1 ): ?>
<?php if(!empty($latte_services_background_color)) : ?>
.services {
	background: <?php echo esc_html($latte_services_background_color); ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_subscribe_display) && $latte_subscribe_display != 1 ): ?>
<?php if(!empty($latte_subscribe_background_color)) : ?>
.subscribe {
	background: <?php echo esc_html($latte_subscribe_background_color); ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_skills_display) && $latte_skills_display != 1 ): ?>
<?php if(!empty($latte_skills_background_color)) : ?>
.skills {
	background: <?php echo esc_html($latte_skills_background_color); ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_blogposts_display) && $latte_blogposts_display != 1 ): ?>
<?php if(!empty($latte_blogposts_background_color)) : ?>
.blogposts {
	background: <?php echo esc_html($latte_blogposts_background_color); ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php if ( has_header_image() ) : ?>
.archive-header {
	background: transparent url("<?php echo( get_header_image() ); ?>") repeat scroll center center / cover;
}
<?php endif; ?>
</style>
<?php
}

add_action('wp_head', 'latte_custom_css');

?>
