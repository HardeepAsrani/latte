<?php
	$latte_services_title = get_theme_mod('latte_services_title',__( 'Services', 'latte' ));
	$latte_services_subtitle = get_theme_mod('latte_services_subtitle',__( 'Things that I work on.', 'latte' ));
?>

		<section class="services" id="services">
			<div class="container">
				<div class="row">
				<?php if(!empty($latte_services_title) || !empty($latte_services_subtitle)) : ?>
					<header data-sr="ease-in-out wait 0.25s" class="services-header">
					<?php if(!empty($latte_services_title)) : ?>
						<h2><?php echo esc_html($latte_services_title); ?></h2>
					<?php endif; ?>
					<?php if(!empty($latte_services_subtitle)) : ?>
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
								'icon' => 'fa-html5',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
							));
							the_widget( 'latte_services_widget', array(
								'title' => esc_html__('CSS', 'latte'),
								'icon' => 'fa-css3',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
							));
							the_widget( 'latte_services_widget', array(
								'title' => esc_html__('WordPress', 'latte'),
								'icon' => 'fa-wordpress',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
							));
							the_widget( 'latte_services_widget', array(
								'title' => esc_html__('Linux', 'latte'),
								'icon' => 'fa-linux',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
							));
							the_widget( 'latte_services_widget', array(
								'title' => esc_html__('SEO', 'latte'),
								'icon' => 'fa-search',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
							));	
							the_widget( 'latte_services_widget', array(
								'title' => esc_html__('Writing', 'latte'),
								'icon' => 'fa-pencil',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
							));	
						endif;
					?>
					</div>
				</div>
			</div>
		</section>
