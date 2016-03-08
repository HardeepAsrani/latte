<?php 
/**
 * Template Name: Homepage Template
 */
	get_header();

	$latte_intro_display = get_theme_mod('latte_intro_display');
	$latte_about_display = get_theme_mod('latte_about_display');
	$latte_social_display = get_theme_mod('latte_social_display');
	$latte_services_display = get_theme_mod('latte_services_display');
	$latte_subscribe_display = get_theme_mod('latte_subscribe_display', 1);
	$latte_skills_display = get_theme_mod('latte_skills_display');
	$latte_blogposts_display = get_theme_mod('latte_blogposts_display');

	if( isset($latte_intro_display) && $latte_intro_display != 1 ):
		get_template_part( 'sections/intro' );
	endif;

	if( isset($latte_about_display) && $latte_about_display != 1 ):
		get_template_part( 'sections/about' );
	endif;

	if( isset($latte_social_display) && $latte_social_display != 1 ):
		get_template_part( 'sections/social' );
	endif;

	if( isset($latte_services_display) && $latte_services_display != 1 ):
		get_template_part( 'sections/services' );
	endif;

	if( isset($latte_subscribe_display) && $latte_subscribe_display != 1 ):
		get_template_part( 'sections/subscribe' );
	endif;

	if( isset($latte_skills_display) && $latte_skills_display != 1 ):
		get_template_part( 'sections/skills' );
	endif;

	if( isset($latte_blogposts_display) && $latte_blogposts_display != 1 ):
		get_template_part( 'sections/blogposts' );
	endif;

	get_footer();

?>
