<?php
	$latte_about_title = get_theme_mod('latte_about_title',__( 'About Me', 'latte' ));
	$latte_about_subtitle = get_theme_mod('latte_about_subtitle',__( 'Here are some things that you should know about me.', 'latte' ));
	$latte_about_avatar = get_theme_mod('latte_about_avatar', get_template_directory_uri().'/assets/images/383x383.png');
	$latte_about_name = get_theme_mod('latte_about_name',__( 'John Doe', 'latte' ));
	$latte_about_position = get_theme_mod('latte_about_position',__( 'Web Designer', 'latte' ));
	$latte_about_content = get_theme_mod('latte_about_content',__( '<p>Latte is a one-page parallax WordPress theme for developers, designers & freelancers, to showcase their profile and portfolio.</p> <p>It comes with many options, including services section, portfolio, maps, contact form, testimonials, pricing tables, and more.</p> <p>Plus, it\'s easy to customize! You don\'t need a page builder or a drag & drop editor. Every thing can be customized straight from the WordPress Customizer.</p>', 'latte' ));
?>

		<section class="about" id="about">
			<div class="container">
				<div class="row">
				<?php if(!empty($latte_about_title) || !empty($latte_about_subtitle)) : ?>
					<header data-sr="ease-in-out wait 0.25s" class="about-header">
					<?php if(!empty($latte_about_title)) : ?>
						<h2><?php echo esc_html($latte_about_title); ?></h2>
					<?php endif; ?>
					<?php if(!empty($latte_about_subtitle)) : ?>
						<h3><?php echo esc_html($latte_about_subtitle); ?></h3>
					<?php endif; ?>
					</header>
				<?php endif; ?>
				<?php if(!empty($latte_about_avatar)) : ?>
					<div data-sr="enter left wait 0.25s" class="col-md-5">
						<img src="<?php echo esc_url($latte_about_avatar); ?>" class="about-image img-responsive">
					</div>
				<?php endif; ?>
				<?php if(!empty($latte_about_avatar)) : ?>
					<div data-sr="enter right wait 0.25s" class="col-md-7">
				<?php else: ?>
					<div data-sr="enter top wait 0.25s" class="col-md-12">
				<?php endif; ?>
					<?php if(!empty($latte_about_name)) : ?>
						<h3 class="name"><?php echo esc_html($latte_about_name); ?></h3>
					<?php endif; ?>
					<?php if(!empty($latte_about_position)) : ?>
						<span class="text-muted"><?php echo esc_html($latte_about_position); ?></span>
					<?php endif; ?>
					<?php if(!empty($latte_about_content)) : ?>
						<div class="lead"><?php echo wp_kses_post($latte_about_content); ?></div>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
