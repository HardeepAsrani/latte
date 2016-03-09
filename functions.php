<?php
/*
 * Hey,
 * Only edit this file if you know what you're doing or make a backup before editing it.
 * Happy Blogging!
*/

require_once( trailingslashit( get_template_directory() ) . "/inc/customizer/customizer.php" );
require_once( trailingslashit( get_template_directory() ) . "/inc/customizer/custom-css.php" );
require_once( trailingslashit( get_template_directory() ) . "/inc/widgets/latte-services.php" );
require_once( trailingslashit( get_template_directory() ) . "/inc/widgets/latte-skills.php" );
require_once( trailingslashit( get_template_directory() ) . "/inc/other/post-formats.php" );

function latte_setup() {
	// Using this feature you can set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.  https://codex.wordpress.org/Content_Width
	global $content_width;
	if (!isset($content_width)) {
		$content_width = 796;
	}

	// Takes care of the <title> tag. https://codex.wordpress.org/Title_Tag
	add_theme_support('title-tag');
	
	// Loads texdomain. https://codex.wordpress.org/Function_Reference/load_theme_textdomain
	load_theme_textdomain('latte', get_template_directory() . '/languages');

	// Add automatic feed links support. https://codex.wordpress.org/Automatic_Feed_Links
	add_theme_support('automatic-feed-links');

	// Add post thumbnails support. https://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');

	// Add custom background support. https://codex.wordpress.org/Custom_Backgrounds
	add_theme_support('custom-background', array(
		// Default color
		'default-color' => 'FFF',
	));

	// Add custom header support. https://codex.wordpress.org/Custom_Headers
	add_theme_support('custom-header', array(
		// Flex height
		'flex-height' => true,
		// Header image
		'default-image' => get_template_directory_uri() . '/assets/images/blog.jpg',
		// Header text
		'header-text' => false,
	));

	// Add post formats support. https://codex.wordpress.org/Post_Formats#Adding_Theme_Support
	add_theme_support('post-formats', array( 'aside', 'chat', 'link', 'quote', 'status', 'video' ));

	// This theme uses wp_nav_menu(). https://codex.wordpress.org/Function_Reference/register_nav_menu
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'latte' ),
	));
	
	// Adding image sizes. https://developer.wordpress.org/reference/functions/add_image_size/
	add_image_size( 'latte-blogposts', 287, 230, true );
	
	// This theme styles the visual editor to resemble the theme style. https://codex.wordpress.org/Function_Reference/add_editor_style
	$font_lora = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
	$font_open_sans = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' );
	$font_sanchez = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Sanchez:400,400italic' );
	add_editor_style( array(
		get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css',
		get_template_directory_uri() . '/assets/css/editor-style.css',
		$font_lora,
		$font_open_sans,
		$font_sanchez
	) );
	
	// Added WooCommerce support
	add_theme_support( 'woocommerce' );
	
}

add_action( 'after_setup_theme', 'latte_setup' );

// To add backwards compatibility for titles
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function latte_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'latte_render_title' );
}

// Registering widgets for the theme.
function latte_widgets_init() {

	register_sidebar( array(
		'name'		  => __( 'Sidear', 'latte' ),
		'id'			=> 'sidebar-widgets',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'		  => __( 'Services Section', 'latte' ),
		'id'			=> 'services-widgets',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'		  => __( 'Skills Section', 'latte' ),
		'id'			=> 'skills-widgets',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'		  => __( 'Subscribe Section', 'latte' ),
		'id'			=> 'subscribe-widgets',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<p class="sendinbluetitle">',
		'after_title'   => '</p>',
	) );

}

add_action( 'widgets_init', 'latte_widgets_init' );

// Registering and enqueuing scripts/stylesheets to header/footer.
function latte_scripts() {
	
	$latte_animations_display = get_theme_mod('latte_animations_display');
	$latte_menu_display = get_theme_mod('latte_menu_display');
	
	wp_enqueue_style( 'latte_bootstrap_css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style( 'latte_font_awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style( 'latte_style', get_stylesheet_uri());
	wp_enqueue_style( 'latte_lora', '//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic');
	wp_enqueue_style( 'latte_open_sans', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
	wp_enqueue_style( 'latte_sanchez', '//fonts.googleapis.com/css?family=Sanchez:400,400italic');

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script( 'latte_bootstrap_js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ),'',true);
	if( is_page_template( 'template-home.php' ) ) wp_enqueue_script( 'latte_parallax', get_template_directory_uri() . '/assets/js/parallax.min.js', array( 'jquery' ),'',true);
	if( isset($latte_animations_display) && $latte_animations_display != 1 )wp_enqueue_script( 'latte_scrollreveal', get_template_directory_uri() . '/assets/js/scrollReveal.min.js', array( 'jquery' ),'',true);
	if( isset($latte_menu_display) && $latte_menu_display != 1 )wp_enqueue_script( 'latte_classie', get_template_directory_uri() . '/assets/js/classie.js', array( 'jquery' ),'',true);
	if( is_page_template( 'template-home.php' ) ) wp_enqueue_script( 'latte_matchHeight', get_template_directory_uri() . '/assets/js/jquery.matchHeight.js', array( 'jquery' ),'',true);
	wp_enqueue_script( 'latte_scripts_js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ),'',true);

	if( is_page_template( 'template-home.php' ) ) :
		$latte_is_homepage = 0;
	else:
		$latte_is_homepage = 1;
	endif;

	wp_localize_script('latte_scripts_js', 'latte_script_var', array(
		'latte_preloader_display' => get_theme_mod('latte_preloader_display'),
		'latte_animations_display' => get_theme_mod('latte_animations_display'),
		'latte_is_homepage' => $latte_is_homepage,
		'latte_parallax_background' => get_theme_mod('latte_parallax_background', get_template_directory_uri().'/assets/images/background.jpg' ),
		'latte_menu_display' => get_theme_mod('latte_menu_display'),
		'latte_skills_display' => get_theme_mod('latte_skills_display'),
		'latte_services_display' => get_theme_mod('latte_services_display'),
		'latte_blogposts_display' => get_theme_mod('latte_blogposts_display')
	));
}

add_action( 'wp_enqueue_scripts', 'latte_scripts' );

// Registering and enqueuing scripts/stylesheets for Customizer controls.
function latte_customizer_js() {
	wp_enqueue_script( 'latte_customizer_js', get_template_directory_uri() . '/inc/customizer/customizer.js', array("jquery"), '20120206', true  );
}

add_action( 'customize_controls_enqueue_scripts', 'latte_customizer_js' );

// Default menu for new setups.
function latte_new_setup() {

	echo '<div class="menu-short-container">';
	echo '<ul id="menu-short" class="latte-push-menu menu">';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/#intro' ) ) . '">'. __('Home', 'latte') .'</a></li>';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/#about' ) ) . '">'. __('About', 'latte') .'</a></li>';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/#social' ) ) . '">'. __('Social', 'latte') .'</a></li>';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/#services' ) ) . '">'. __('Services', 'latte') .'</a></li>';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/#separator' ) ) . '">'. __('Separator', 'latte') .'</a></li>';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/#skills' ) ) . '">'. __('Skills', 'latte') .'</a></li>';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/#portfolio' ) ) . '">'. __('Portfolio', 'latte') .'</a></li>';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/#subscribe' ) ) . '">'. __('Subscribe', 'latte') .'</a></li>';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/#pricing' ) ) . '">'. __('Pricing', 'latte') .'</a></li>';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/#blogposts' ) ) . '">'. __('Blog', 'latte') .'</a></li>';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/#map' ) ) . '">'. __('Map', 'latte') .'</a></li>';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/#contact' ) ) . '">'. __('Contact', 'latte') .'</a></li>';
	echo '</ul>';
	echo '</div>';

}

// Custom comments style
function latte_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;

	switch ( $comment->comment_type ) :
		case 'pingback' :
	
	
		case 'trackback' :
		?>
			<li class="post pingback">
				<p><?php _e( 'Pingback:', 'latte' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'latte' ), ' ' ); ?></p>
		<?php
		break;

	
		default :
		?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<article id="comment-<?php comment_ID(); ?>" class="comment-body">
					<footer>
						<div class="comment-author vcard" >
							<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
							<?php printf( __( '<span>%s </span><span class="says">says:</span>', 'latte' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link() ) ); ?>
						</div><!-- .comment-author .vcard -->
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<em><?php _e( 'Your comment is awaiting moderation.', 'latte' ); ?></em>
							<br />
						<?php endif; ?>
						<div class="comment-metadata">
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="comment-permalink">
								<time class="comment-published" datetime="<?php comment_time( 'Y-m-d\TH:i:sP' ); ?>" title="<?php comment_time( _x( 'l, F j, Y, g:i a', 'comment time format', 'latte' ) ); ?>" itemprop="commentTime">
									<?php printf( __( '%1$s at %2$s', 'latte' ), get_comment_date(), get_comment_time() ); ?>
								</time>
							</a>
							<?php edit_comment_link( __( '(Edit)', 'latte' ), ' ' );?>
						</div><!-- .comment-meta .commentmetadata -->
					</footer>

					<div class="comment-content"><?php comment_text(); ?></div>

					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- .reply -->
				</article><!-- #comment-## -->

<?php
		break;
	
	endswitch;
}
?>
