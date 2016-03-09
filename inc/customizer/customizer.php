<?php
/*
 * Register settings for the Theme Customizer.
*/

require_once( trailingslashit( get_template_directory() ) . "/inc/customizer/alpha-control/alpha-control.php" );

function latte_sanitize_text( $input ) {
	return $input;
}

function latte_sanitize_textbox( $textbox ) {
	return wp_kses_post( force_balance_tags( $textbox ) );
}

function latte_sanitize_checkbox( $input ) {
	if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}

function latte_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );
	
	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

function latte_customize_register($wp_customize) {

	class Latte_Subscribe_Widgets_Area extends WP_Customize_Control {
		public function render_content() {
			echo __('The main content of this section is customizable in: Customize > Subscribe Section > Subscribe Section. There you must add the "SendinBlue Newsletter." But first you will need to install <a href="https://wordpress.org/plugins/mailin/" target="_blank">SendinBlue plugin</a>.','latte');
			echo '<br/><br/>';
			echo __('After installing the plugin, you need to navigate to Sendinblue > Home, and configure the plugin.','latte');
			echo '<br/><br/>';
			echo __('And then you need to navigate to its Settings, and use the following in Subscription form:','latte');
			echo '<br/><br/>';
			echo '<textarea style="width:100%;height:180px;font-size:12px;" readonly="">';
			echo __('<input placeholder="Email Address" class="sib-email-area" name="email" required="required" type="email">','latte') . "\n\n";
			echo __('<input placeholder="Name" class="sib-NAME-area" name="NAME" type="text">','latte') . "\n\n";
			echo __('<input class="sib-default-btn btn btn-lg btn-success" value="Subscribe" type="submit">','latte');
			echo '</textarea>';
		}
	}
	class Latte_Blogposts_Widgets_Area extends WP_Customize_Control {
		public function render_content() {
			echo __('The main content of this section is customizable in: Posts > Add New, in your WordPress dashboard.','latte');
		}
	}

	$wp_customize->add_panel( 'latte_general_settings', array(
		'priority'	   => 10,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('General Settings', 'latte'),
		'description'	=> __('This section allows you to configure general settings.', 'latte')
	));

	$wp_customize->add_panel( 'latte_intro_settings', array(
		'priority'	   => 15,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Intro Section', 'latte'),
		'description'	=> __('This section allows you to configure Intro section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_about_settings', array(
		'priority'	   => 20,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('About Section', 'latte'),
		'description'	=> __('This section allows you to configure About section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_social_settings', array(
		'priority'	   => 25,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Social Section', 'latte'),
		'description'	=> __('This section allows you to configure Social section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_services_settings', array(
		'priority'	   => 30,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Services Section', 'latte'),
		'description'	=> __('This section allows you to configure Services section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_subscribe_settings', array(
		'priority'	   => 35,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Subscribe Section', 'latte'),
		'description'	=> __('This section allows you to configure Subscribe section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_skills_settings', array(
		'priority'	   => 40,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Skills Section', 'latte'),
		'description'	=> __('This section allows you to configure Skills section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_blogposts_settings', array(
		'priority'	   => 45,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Blog Section', 'latte'),
		'description'	=> __('This section allows you to configure Blog section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_blog_settings', array(
		'priority'	   => 50,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Blog Page', 'latte'),
		'description'	=> __('This section allows you to configure Blog page.', 'latte')
	));

	$wp_customize->get_section( 'title_tagline' )->panel = 'latte_general_settings';
	
	$wp_customize->get_section( 'background_image' )->panel = 'latte_blog_settings';
		
	$wp_customize->get_section( 'background_image' )->title = __('Background', 'latte');
	
	$wp_customize->get_section( 'background_image' )->priority = 5;
	
	$wp_customize->get_section( 'header_image' )->panel = 'latte_blog_settings';
	
	$wp_customize->get_section( 'header_image' )->title = __('Header', 'latte');
	
	$wp_customize->get_section( 'header_image' )->priority = 10;

	$wp_customize->get_section( 'title_tagline' )->priority = 5;
	
	$wp_customize->get_control( 'background_color' )->section = 'background_image';

	$wp_customize->add_section('latte_general_background', array(
		'priority' => 10,
		'title' => __('Parallax Background', 'latte'),
		'panel'  => 'latte_general_settings'
	));

	$wp_customize->add_section('latte_general_preloader', array(
		'priority' => 15,
		'title' => __('Preloader', 'latte'),
		'panel'  => 'latte_general_settings'
	));

	$wp_customize->add_section('latte_general_menu', array(
		'priority' => 20,
		'title' => __('Menu', 'latte'),
		'panel'  => 'latte_general_settings'
	));

	$wp_customize->add_section('latte_general_animations', array(
		'priority' => 25,
		'title' => __('Scroll Animations', 'latte'),
		'panel'  => 'latte_general_settings'
	));

	$wp_customize->add_section('latte_intro_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_intro_settings'
	));

	$wp_customize->add_section('latte_intro_content', array(
		'priority' => 10,
		'title' => __('Content', 'latte'),
		'panel'  => 'latte_intro_settings'
	));

	$wp_customize->add_section('latte_intro_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_intro_settings'
	));

	$wp_customize->add_section('latte_about_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_about_settings'
	));

	$wp_customize->add_section('latte_about_content', array(
		'priority' => 10,
		'title' => __('Content', 'latte'),
		'panel'  => 'latte_about_settings'
	));

	$wp_customize->add_section('latte_about_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_about_settings'
	));

	$wp_customize->add_section('latte_social_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_social_settings'
	));

	$wp_customize->add_section('latte_social_content', array(
		'priority' => 10,
		'title' => __('Content', 'latte'),
		'panel'  => 'latte_social_settings'
	));

	$wp_customize->add_section('latte_social_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_social_settings'
	));

	$wp_customize->add_section('latte_services_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_services_settings'
	));

	$wp_customize->add_section('latte_services_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_services_settings'
	));

	$wp_customize->add_section('latte_subscribe_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_subscribe_settings'
	));

	$wp_customize->add_section('latte_subscribe_instructions', array(
		'priority' => 10,
		'title' => __('Instructions', 'latte'),
		'panel'  => 'latte_subscribe_settings'
	));

	$wp_customize->add_section('latte_subscribe_colors', array(
		'priority' => 20,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_subscribe_settings'
	));

	$wp_customize->add_section('latte_skills_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_skills_settings'
	));

	$wp_customize->add_section('latte_skills_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_skills_settings'
	));

	$wp_customize->add_section('latte_blogposts_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_blogposts_settings'
	));

	$wp_customize->add_section('latte_blogposts_content', array(
		'priority' => 10,
		'title' => __('Content', 'latte'),
		'panel'  => 'latte_blogposts_settings'
	));

	$wp_customize->add_section('latte_blogposts_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_blogposts_settings'
	));

	$wp_customize->add_section('latte_blog_layout', array(
		'priority' => 15,
		'title' => __('Layout', 'latte'),
		'panel'  => 'latte_blog_settings'
	));

	$wp_customize->add_section('latte_blog_colors', array(
		'priority' => 20,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_blog_settings'
	));

	$wp_customize->add_setting('latte_parallax_background', array(
		'default' => get_template_directory_uri().'/assets/images/background.jpg',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_parallax_background', array(
		'label' => __('Parallax Background', 'latte'),
		'section' => 'latte_general_background',
		'priority' => 5,
		'settings' => 'latte_parallax_background'
	)));

	$wp_customize->add_setting( 'latte_preloader_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_preloader_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Preloader','latte'),
		'section' => 'latte_general_preloader',
		'priority' => 5
	));

	$wp_customize->add_setting( 'latte_menu_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_menu_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Menu','latte'),
		'section' => 'latte_general_menu',
		'priority' => 5
	));

	$wp_customize->add_setting( 'latte_animations_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_animations_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Scroll Animations','latte'),
		'section' => 'latte_general_animations',
		'priority' => 5
	));

	$wp_customize->add_setting( 'latte_intro_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_intro_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Intro Section','latte'),
		'section' => 'latte_intro_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_intro_avatar', array(
		'default' => get_template_directory_uri().'/assets/images/avatar.jpg',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_intro_avatar', array(
		'label' => __('Avatar Image', 'latte'),
		'section' => 'latte_intro_content',
		'priority' => 5,
		'settings' => 'latte_intro_avatar'
	)));

	$wp_customize->add_setting('latte_intro_scroll', array(
		'default' => '#about',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_intro_scroll', array(
		'label' => __('Scroll Anchor', 'latte'),
		'section' => 'latte_intro_content',
		'priority' => 10,
		'settings' => 'latte_intro_scroll'
	));

	$wp_customize->add_setting('latte_intro_background_color', array(
		'default' => 'rgba(0, 0, 0, 0.7)',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_intro_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_intro_colors',
		'priority' => 5,
		'settings' => 'latte_intro_background_color'
	)));

	$wp_customize->add_setting( 'latte_about_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_about_display',array(
		'type' => 'checkbox',
		'label' => __('Disable About Section','latte'),
		'section' => 'latte_about_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_about_title', array(
		'default' => esc_html__('About Me', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_about_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_about_settings',
		'priority' => 15,
		'settings' => 'latte_about_title'
	));
	
	$wp_customize->add_setting('latte_about_subtitle', array(
		'default' => esc_html__('Here are some things that you should know about me.', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_about_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_about_settings',
		'priority' => 20,
		'settings' => 'latte_about_subtitle'
	));

	$wp_customize->add_setting('latte_about_avatar', array(
		'default' => get_template_directory_uri().'/assets/images/383x383.png',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_about_avatar', array(
		'label' => __('Image', 'latte'),
		'section' => 'latte_about_content',
		'priority' => 5,
		'settings' => 'latte_about_avatar'
	)));

	$wp_customize->add_setting('latte_about_name', array(
		'default' => esc_html__('John Doe', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_about_name', array(
		'label' => __('Name', 'latte'),
		'section' => 'latte_about_content',
		'priority' => 10,
		'settings' => 'latte_about_name'
	));

	$wp_customize->add_setting('latte_about_position', array(
		'default' => esc_html__('Web Designer', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_about_position', array(
		'label' => __('Position', 'latte'),
		'section' => 'latte_about_content',
		'priority' => 15,
		'settings' => 'latte_about_position'
	));

	$wp_customize->add_setting('latte_about_content', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_textbox'
	));

	$wp_customize->add_control('latte_about_content', array(
		'label' => __('Content', 'latte'),
		'section' => 'latte_about_content',
		'priority' => 20,
		'type' => 'textarea',
		'settings' => 'latte_about_content'
	));

	$wp_customize->add_setting('latte_about_background_color', array(
		'default' => '#F5F5F5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_about_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_about_colors',
		'priority' => 5,
		'settings' => 'latte_about_background_color'
	)));

	$wp_customize->add_setting( 'latte_social_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_social_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Social Section','latte'),
		'section' => 'latte_social_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_social_title', array(
		'default' => esc_html__('Social', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_social_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_social_settings',
		'priority' => 15,
		'settings' => 'latte_social_title'
	));

	$wp_customize->add_setting('latte_social_facebook', array(
		'default' => '#',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_social_facebook', array(
		'label' => __('Facebook URL', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 5,
		'settings' => 'latte_social_facebook'
	));

	$wp_customize->add_setting('latte_social_twitter', array(
		'default' => '#',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_social_twitter', array(
		'label' => __('Twitter URL', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 10,
		'settings' => 'latte_social_twitter'
	));

	$wp_customize->add_setting('latte_social_google_plus', array(
		'default' => '#',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_social_google_plus', array(
		'label' => __('Google + URL', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 15,
		'settings' => 'latte_social_google_plus'
	));

	$wp_customize->add_setting('latte_social_instagram', array(
		'default' => '#',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_social_instagram', array(
		'label' => __('Instagram URL', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 20,
		'settings' => 'latte_social_instagram'
	));

	$wp_customize->add_setting('latte_social_github', array(
		'default' => '#',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_social_github', array(
		'label' => __('Github URL', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 25,
		'settings' => 'latte_social_github'
	));

	$wp_customize->add_setting('latte_social_background_color', array(
		'default' => 'rgba(0, 0, 0, 0.7)',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_social_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_social_colors',
		'priority' => 5,
		'settings' => 'latte_social_background_color'
	)));

	$wp_customize->add_setting( 'latte_services_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_services_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Services Section','latte'),
		'section' => 'latte_services_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_services_background', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_services_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_services_settings',
		'priority' => 10,
		'settings' => 'latte_services_background'
	)));

	$wp_customize->add_setting('latte_services_title', array(
		'default' => esc_html__('Services', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_services_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_services_settings',
		'priority' => 15,
		'settings' => 'latte_services_title'
	));

	$wp_customize->add_setting('latte_services_subtitle', array(
		'default' => esc_html__('Things that I work on.', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_services_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_services_settings',
		'priority' => 20,
		'settings' => 'latte_services_subtitle'
	));

	$wp_customize->add_setting('latte_services_background_color', array(
		'default' => '#F5F5F5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_services_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_services_colors',
		'priority' => 5,
		'settings' => 'latte_services_background_color'
	)));

	$wp_customize->add_setting( 'latte_subscribe_display', array(
		'default' => 1,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_subscribe_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Subscribe Section','latte'),
		'section' => 'latte_subscribe_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_subscribe_title', array(
		'default' => esc_html__('Subscribe', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_subscribe_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_subscribe_settings',
		'priority' => 15,
		'settings' => 'latte_subscribe_title'
	));

	$wp_customize->add_setting('latte_subscribe_subtitle', array(
		'default' => esc_html__('I won\'t spam you, promise!', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_subscribe_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_subscribe_settings',
		'priority' => 20,
		'settings' => 'latte_subscribe_subtitle'
	));

	$wp_customize->add_setting( 'latte_subscribe_info', array(
		'sanitize_callback' => 'latte_sanitize_text'
	));

	$wp_customize->add_control( new Latte_Subscribe_Widgets_Area( $wp_customize, 'latte_subscribe_info', array(
		'section' => 'latte_subscribe_instructions'
	)));

	$wp_customize->add_setting('latte_subscribe_background_color', array(
		'default' => 'rgba(0, 0, 0, 0.7)',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_subscribe_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_subscribe_colors',
		'priority' => 5,
		'settings' => 'latte_subscribe_background_color'
	)));

	$wp_customize->add_setting( 'latte_skills_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_skills_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Skills Section','latte'),
		'section' => 'latte_skills_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_skills_background', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_skills_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_skills_settings',
		'priority' => 10,
		'settings' => 'latte_skills_background'
	)));

	$wp_customize->add_setting('latte_skills_title', array(
		'default' => esc_html__('Skills', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_skills_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_skills_settings',
		'priority' => 15,
		'settings' => 'latte_skills_title'
	));

	$wp_customize->add_setting('latte_skills_subtitle', array(
		'default' => esc_html__('Things that I\'m good at.', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_skills_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_skills_settings',
		'priority' => 20,
		'settings' => 'latte_skills_subtitle'
	));

	$wp_customize->add_setting('latte_skills_background_color', array(
		'default' => '#F5F5F5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_skills_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_skills_colors',
		'priority' => 5,
		'settings' => 'latte_skills_background_color'
	)));

	$wp_customize->add_setting( 'latte_blogposts_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_blogposts_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Blog Section','latte'),
		'section' => 'latte_blogposts_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_blogposts_title', array(
		'default' => esc_html__('Blog', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_blogposts_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_blogposts_settings',
		'priority' => 15,
		'settings' => 'latte_blogposts_title'
	));

	$wp_customize->add_setting('latte_blogposts_subtitle', array(
		'default' => esc_html__('My thoughts.', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_blogposts_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_blogposts_settings',
		'priority' => 20,
		'settings' => 'latte_blogposts_subtitle'
	));

	$wp_customize->add_setting('latte_blogposts_items', array(
		'default' => 6,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_text'
	));

	$wp_customize->add_control('latte_blogposts_items', array(
		'label' => __('Number of Items', 'latte'),
		'section' => 'latte_blogposts_settings',
		'priority' => 25,
		'type' => 'number',
		'settings' => 'latte_blogposts_items'
	));

	$wp_customize->add_setting( 'latte_blogposts_content', array(
		'sanitize_callback' => 'latte_sanitize_text'
	));

	$wp_customize->add_control( new Latte_Blogposts_Widgets_Area( $wp_customize, 'latte_blogposts_content', array(
		'section' => 'latte_blogposts_content'
	)));

	$wp_customize->add_setting('latte_blogposts_background_color', array(
		'default' => '#F5F5F5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_blogposts_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_blogposts_colors',
		'priority' => 5,
		'settings' => 'latte_blogposts_background_color'
	)));
	
	$wp_customize->add_setting( 'latte_blog_sidebar', array(
		'default' => 'full',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_choices'
	));
 
	$wp_customize->add_control( 'latte_blog_sidebar', array(
		'label' => __('Layout', 'latte'),
		'type' => 'radio',
		'section' => 'latte_blog_layout',
		'choices' => array(
			'full' => __('Full Width', 'latte'),
			'left' => __('Left Sidebar', 'latte'),
		)
	));

}
add_action('customize_register', 'latte_customize_register');

?>
