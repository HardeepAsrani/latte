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
		do_action( 'latte_intro_before' );
		get_template_part( 'sections/intro' );
		do_action( 'latte_intro_after' );
	endif;

	if( isset($latte_about_display) && $latte_about_display != 1 ):
		do_action( 'latte_about_before' );
		get_template_part( 'sections/about' );
		do_action( 'latte_about_after' );
	endif;

	if( isset($latte_social_display) && $latte_social_display != 1 ):
		do_action( 'latte_social_before' );
		get_template_part( 'sections/social' );
		do_action( 'latte_social_after' );
	endif;

	if( isset($latte_services_display) && $latte_services_display != 1 ):
		do_action( 'latte_services_before' );
		get_template_part( 'sections/services' );
		do_action( 'latte_services_after' );
	endif;

	if( isset($latte_subscribe_display) && $latte_subscribe_display != 1 ):
		do_action( 'latte_subscribe_before' );
		get_template_part( 'sections/subscribe' );
		do_action( 'latte_subscribe_after' );
	endif;

	if( isset($latte_skills_display) && $latte_skills_display != 1 ):
		do_action( 'latte_skills_before' );
		get_template_part( 'sections/skills' );
		do_action( 'latte_skills_after' );
	endif;

	if( isset($latte_blogposts_display) && $latte_blogposts_display != 1 ):
		do_action( 'latte_blogposts_before' );
		get_template_part( 'sections/blogposts' );
		do_action( 'latte_blogposts_after' );
	endif;

	get_footer();

?>
