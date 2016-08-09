<?php
	$latte_services_title = get_theme_mod('latte_services_title',__( 'Services', 'latte' ));
	$latte_services_subtitle = get_theme_mod('latte_services_subtitle',__( 'Things that I work on.', 'latte' ));
?>

		<section class="services" id="services">
			<div class="container">
				<div class="row">
				<?php if(!empty($latte_services_title) || !empty($latte_services_subtitle) || is_customize_preview() ) : ?>
					<header data-sr="ease-in-out wait 0.25s" class="services-header">
					<?php if(!empty($latte_services_title) || is_customize_preview() ) : ?>
						<h2><?php echo esc_html($latte_services_title); ?></h2>
					<?php endif; ?>
					<?php if(!empty($latte_services_subtitle) || is_customize_preview() ) : ?>
						<h3><?php echo esc_html($latte_services_subtitle); ?></h3>
					<?php endif; ?>
					</header>
				<?php endif; ?>
					<div class="col-md-12">
					<?php
						if ( is_active_sidebar( 'services-widgets' ) ) :
							dynamic_sidebar( 'services-widgets' );
						else:
							the_widget( 'latte_services_widget', array(
								'title' => esc_html__('HTML', 'latte'),
								'type' => 0,
								'icon' => 'fa-html5',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
							));
							the_widget( 'latte_services_widget', array(
								'title' => esc_html__('CSS', 'latte'),
								'type' => 0,
								'icon' => 'fa-css3',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
							));
							the_widget( 'latte_services_widget', array(
								'title' => esc_html__('WordPress', 'latte'),
								'type' => 0,
								'icon' => 'fa-wordpress',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
							));
							the_widget( 'latte_services_widget', array(
								'title' => esc_html__('Linux', 'latte'),
								'type' => 0,
								'icon' => 'fa-linux',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
							));
							the_widget( 'latte_services_widget', array(
								'title' => esc_html__('SEO', 'latte'),
								'type' => 0,
								'icon' => 'fa-search',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
							));	
							the_widget( 'latte_services_widget', array(
								'title' => esc_html__('Writing', 'latte'),
								'type' => 0,
								'icon' => 'fa-pencil',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
							));	
						endif;
					?>
					</div>
				</div>
			</div>
		</section>
