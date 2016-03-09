<?php
	$latte_social_title = get_theme_mod('latte_social_title',__( 'Social', 'latte' ));
	$latte_social_facebook = get_theme_mod('latte_social_facebook', '#');
	$latte_social_twitter = get_theme_mod('latte_social_twitter', '#');
	$latte_social_google_plus = get_theme_mod('latte_social_google_plus', '#');
	$latte_social_instagram = get_theme_mod('latte_social_instagram', '#');
	$latte_social_github = get_theme_mod('latte_social_github', '#');
?>

		<section class="social" id="social">
			<div class="container">
				<div class="row">
				<?php if(!empty($latte_social_title)) : ?>
					<header data-sr="ease-in-out wait 0.25s" class="social-header">
						<h2><?php echo $latte_social_title; ?></h2>
					</header>
				<?php endif; ?>
					<div class="col-md-12">
					<?php if(!empty($latte_social_facebook)) : ?>
						<div data-sr="ease-in-out wait 0.25s" class="col-lg-2 col-sm-2 social-box">
							<div class="icon-item it-facebook">
								<div class="icon"><a href="<?php echo esc_url($latte_social_facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a></div>
								<span><?php _e( 'Facebook', 'latte' ); ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($latte_social_twitter)) : ?>
						<div data-sr="ease-in-out wait 0.25s" class="col-lg-2 col-sm-2 social-box">
							<div class="icon-item it-twitter">
								<div class="icon"><a href="<?php echo esc_url($latte_social_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></div>
								<span><?php _e( 'Twitter', 'latte' ); ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($latte_social_google_plus)) : ?>
						<div data-sr="ease-in-out wait 0.25s" class="col-lg-2 col-sm-2 social-box">
							<div class="icon-item it-google">
								<div class="icon"><a href="<?php echo esc_url($latte_social_google_plus); ?>" target="_blank"><i class="fa fa-google"></i></a></div>
								<span><?php _e( 'Google +', 'latte' ); ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($latte_social_instagram)) : ?>
						<div data-sr="ease-in-out wait 0.25s" class="col-lg-2 col-sm-2 social-box">
							<div class="icon-item it-instagram">
								<div class="icon"><a href="<?php echo esc_url($latte_social_instagram); ?>" target="_blank"><i class="fa fa-instagram"></i></a></div>
								<span><?php _e( 'Instagram', 'latte' ); ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($latte_social_github)) : ?>
						<div data-sr="ease-in-out wait 0.25s" class="col-lg-2 col-sm-2 social-box">
							<div class="icon-item it-github">
								<div class="icon"><a href="<?php echo esc_url($latte_social_github); ?>" target="_blank"><i class="fa fa-github"></i></a></div>
								<span><?php _e( 'Github', 'latte' ); ?></span>
							</div>
						</div>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
