<?php
	$latte_intro_avatar = get_theme_mod('latte_intro_avatar', get_template_directory_uri().'/assets/images/avatar.jpg' );
	$latte_intro_scroll = get_theme_mod('latte_intro_scroll', '#about' );
?>

		<section class="intro" id="intro">
			<div class="container">
				<div class="cover-container row">
					<div class="inner cover col-md-12">
					<?php if(!empty($latte_intro_avatar)) : ?>
						<div class="avatar" style="background-image:url('<?php echo esc_url($latte_intro_avatar); ?>');"></div>
					<?php endif; ?>
						<h1 class="cover-heading"><?php bloginfo( 'name' ); ?></h1>
						<p class="lead"><?php bloginfo( 'description' ); ?></p>
						<?php if(!empty($latte_intro_scroll)) : ?>
							<a href="<?php echo esc_url($latte_intro_scroll); ?>" class="arrow"><i class="fa fa-arrow-circle-down"></i></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
