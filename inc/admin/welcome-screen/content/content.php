<?php
$latte = wp_get_theme( 'latte' );

?>
<div class="col one-col" style="overflow: hidden;">
	<div class="col">
		<div class="boxed enrich">
			<h1 class="latte-title"><?php echo '<strong>' . esc_attr( $latte['Name'] ) . '</strong> <sup class="version">' . esc_attr( $latte['Version'] ) . '</sup>'; ?></h1>
			<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/Latte.png'; ?>" alt="<?php esc_html_e( 'Latte', 'latte' ); ?>" class="image-latte" />
			<p><?php echo esc_html( $latte['Description'] ); ?></p>
			<p>
				<a href="<?php echo esc_url( self_admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e('Visit Customizer', 'latte' ); ?></a>
				<a href="http://www.hardeepasrani.com/portfolio/latte/" class="button button-primary" target="_blank"><?php esc_html_e( 'More Info', 'latte' ); ?></a>
			</p>
		</div>
	</div>
</div>

<div class="col two-col" style="overflow: hidden;">
	<div class="col">
		<div class="boxed whatsnew">
			<h2><?php printf( esc_html__( 'What\'s new in %s?', 'latte' ), esc_attr( $latte['Version'] ) ); ?></h2>
			<p><?php printf( esc_html__( 'Take a look at everything that\'s new in the latest version:', 'latte' ) ); ?></p>
			<ul>
				<li><?php printf( __('<strong>More Social Icons:</strong> Now add social icons just by putting its URL and theme will select the icons automatically. Is your favorite icon missing? Feel free to contact via my website.', 'latte') ); ?></li>
				<li><?php printf( __('<strong>Single Background:</strong> Don\'t want so many images? You can now set a single image for the parallax background from Intro settings.', 'latte') ); ?></li>
			</ul>
		</div>
	</div>
	<div class="col">
		<div class="boxed extension">
			<h2><?php esc_html_e( 'Get Latte Pro', 'latte' ); ?></h2>
			<p><?php printf( esc_html__( 'Latte Pro comes with additional 5 additional front-page sections, 100+ color options and more. It allows you to add a Portfolio to your site and many more amazing features.', 'latte' ) ); ?></p>
			<p>
				<a href="http://www.hardeepasrani.com/latte-vs-latte-pro/" class="button button-primary" target="_blank"><?php esc_html_e( 'Why go Pro?', 'latte' ); ?></a>
				<a href="http://www.hardeepasrani.com/portfolio/latte/" class="button button-primary" target="_blank"><?php esc_html_e( 'Go Pro!', 'latte' ); ?></a>
			</p>
		</div>
	</div>
</div>

<div class="col two-col" style="overflow: hidden;">
	<div class="col">
		<div class="boxed support">
			<h2><?php esc_html_e( 'Need support?', 'latte' ); ?></h2>
			<p><?php printf( __('Found an issue with the theme? You can get support <a href="https://wordpress.org/support/theme/latte" target="_blank">at this link</a>. Or would you like to translate Latte into your language? <a href="https://translate.wordpress.org/projects/wp-themes/latte" target="_blank">Get involved</a>! Also, don\'t forget to <a href="https://wordpress.org/support/view/theme-reviews/latte" target="_blank">leave a review</a>.', 'latte') ); ?></p>
		</div>
	</div>
	<div class="col">
		<div class="boxed donate">
			<h2><?php esc_html_e( 'Donate', 'latte' ); ?></h2>
			<p><?php printf( __('If you like this theme and if it helped you with your business then please consider supporting the development <a target="_blank" href="http://www.hardeepasrani.com/donate/">by donating some money</a>. <a target="_blank" href="http://www.hardeepasrani.com/donate/">Any amount, even $1.00, is appreciated :)</a>', 'latte') ); ?></p>
		</div>
	</div>
</div>
