jQuery(document).ready(function($) {
	/* Move widgets to their respective sections */
	wp.customize.section( 'sidebar-widgets-services-widgets' ).panel( 'latte_services_settings' );
	wp.customize.section( 'sidebar-widgets-services-widgets' ).priority( '10' );
	wp.customize.section( 'sidebar-widgets-subscribe-widgets' ).panel( 'latte_subscribe_settings' );
	wp.customize.section( 'sidebar-widgets-subscribe-widgets' ).priority( '15' );
	wp.customize.section( 'sidebar-widgets-skills-widgets' ).panel( 'latte_skills_settings' );
	wp.customize.section( 'sidebar-widgets-skills-widgets' ).priority( '10' );
});
