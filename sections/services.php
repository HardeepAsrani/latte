<?php
	$latte_services_title = get_theme_mod('latte_services_title',__( 'Services', 'latte' ));
	$latte_services_subtitle = get_theme_mod('latte_services_subtitle',__( 'Things that I work on.', 'latte' ));
?>

		<section class="services" id="services">
			<div class="row">
			<?php if(!empty($latte_services_title) || !empty($latte_services_subtitle)) : ?>
				<header data-sr="ease-in-out wait 0.25s" class="services-header">
				<?php if(!empty($latte_services_title)) : ?>
					<h2><?php echo $latte_services_title; ?></h2>
				<?php endif; ?>
				<?php if(!empty($latte_services_subtitle)) : ?>
					<h3><?php echo $latte_services_subtitle; ?></h3>
				<?php endif; ?>
				</header>
			<?php endif; ?>
				<div class="col-md-12">
				<?php
					if ( is_active_sidebar( 'services-widgets' ) ) :
						dynamic_sidebar( 'services-widgets' );
					else:
						the_widget( 'latte_services_widget', array(
							'title' => __('HTML', 'latte'),
							'icon' => 'fa-html5',
							'text' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
						));
						the_widget( 'latte_services_widget', array(
							'title' => __('CSS', 'latte'),
							'icon' => 'fa-css3',
							'text' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
						));
						the_widget( 'latte_services_widget', array(
							'title' => __('WordPress', 'latte'),
							'icon' => 'fa-wordpress',
							'text' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
						));
						the_widget( 'latte_services_widget', array(
							'title' => __('Linux', 'latte'),
							'icon' => 'fa-linux',
							'text' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
						));
						the_widget( 'latte_services_widget', array(
							'title' => __('SEO', 'latte'),
							'icon' => 'fa-search',
							'text' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
						));	
						the_widget( 'latte_services_widget', array(
							'title' => __('Writing', 'latte'),
							'icon' => 'fa-pencil',
							'text' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'latte'),
						));	
					endif;
				?>
				</div>
			</div>
		</section>
