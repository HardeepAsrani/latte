<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class('pmenu-push'); ?>>

<?php
	$latte_preloader_display = get_theme_mod('latte_preloader_display');
	$latte_menu_display = get_theme_mod('latte_menu_display');
?>

<?php if( isset($latte_preloader_display) && $latte_preloader_display != 1 ): ?>
	<div class="preloader"><div class="status">&nbsp;</div></div>
<?php endif; ?>

	<div class="site-wrapper">

	<?php if( isset($latte_menu_display) && $latte_menu_display != 1 ): ?>

		<nav class="pmenu pmenu-vertical pmenu-left" id="pmenu">
			<h3 id="hideLeftPush"><?php _e( 'Menu', 'latte' ); ?> <i class="fa fa-arrow-right"></i></h3>
			<?php
			wp_nav_menu(array(
				'theme_location' => 'primary',
				'menu' => __( 'Primary Menu', 'latte' ),
				'fallback_cb' => 'latte_new_setup',
				'items_wrap' => '<ul class="latte-push-menu">%3$s</ul>'
			));
			?>
		</nav>

		<a id="showLeftPush" class="fa fa-bars"></a>

	<?php endif; ?>