<?php
	$latte_social_title = get_theme_mod('latte_social_title',__( 'Social', 'latte' ));
	$latte_social_facebook = get_theme_mod('latte_social_facebook', 'https://www.facebook.com');
	$latte_social_facebook_title = get_theme_mod('latte_social_facebook_title',__( 'Facebook', 'latte' ));
	$latte_social_twitter = get_theme_mod('latte_social_twitter', 'https://www.twitter.com');
	$latte_social_twitter_title = get_theme_mod('latte_social_twitter_title',__( 'Twitter', 'latte' ));
	$latte_social_google_plus = get_theme_mod('latte_social_google_plus', 'https://plus.google.com');
	$latte_social_google_plus_title = get_theme_mod('latte_social_google_plus_title',__( 'Google +', 'latte' ));
	$latte_social_instagram = get_theme_mod('latte_social_instagram', 'https://www.instagram.com');
	$latte_social_instagram_title = get_theme_mod('latte_social_instagram_title',__( 'Instagram', 'latte' ));
	$latte_social_github = get_theme_mod('latte_social_github', 'https://www.github.com');
	$latte_social_github_title = get_theme_mod('latte_social_github_title',__( 'Github', 'latte' ));
?>

		<section class="social" id="social">
			<div class="container">
				<div class="row">
				<?php if(!empty($latte_social_title) || is_customize_preview()) : ?>
					<header data-sr="ease-in-out wait 0.25s" class="social-header">
						<h2><?php echo $latte_social_title; ?></h2>
					</header>
				<?php endif; ?>
					<div class="col-md-12">
					<?php if(!empty($latte_social_facebook)) : ?>
						<div data-sr="ease-in-out wait 0.25s" class="col-lg-2 col-sm-2 social-box sb-first">
							<div class="icon-item it-first">
								<div class="icon"><a href="<?php echo esc_url($latte_social_facebook); ?>" target="_blank"><i class="fa"></i></a></div>
								<?php if(!empty($latte_social_facebook_title) || is_customize_preview()) : ?>
								<span><?php echo $latte_social_facebook_title; ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php elseif(empty($latte_social_facebook) && is_customize_preview()) : ?>
						<div class="col-lg-2 col-sm-2 social-box sb-first customizer-hidden">
							<div class="icon-item it-first">
								<div class="icon"><a href="<?php echo esc_url($latte_social_facebook); ?>" target="_blank"><i class="fa"></i></a></div>
								<?php if(!empty($latte_social_facebook_title) || is_customize_preview()) : ?>
								<span><?php echo $latte_social_facebook_title; ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($latte_social_twitter)) : ?>
						<div data-sr="ease-in-out wait 0.25s" class="col-lg-2 col-sm-2 social-box sb-second">
							<div class="icon-item it-second">
								<div class="icon"><a href="<?php echo esc_url($latte_social_twitter); ?>" target="_blank"><i class="fa"></i></a></div>
								<?php if(!empty($latte_social_twitter_title) || is_customize_preview()) : ?>
								<span><?php echo $latte_social_twitter_title; ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php elseif(empty($latte_social_twitter) && is_customize_preview()) : ?>
						<div class="col-lg-2 col-sm-2 social-box sb-second customizer-hidden">
							<div class="icon-item it-second">
								<div class="icon"><a href="<?php echo esc_url($latte_social_twitter); ?>" target="_blank"><i class="fa"></i></a></div>
								<?php if(!empty($latte_social_twitter_title) || is_customize_preview()) : ?>
								<span><?php echo $latte_social_twitter_title; ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($latte_social_google_plus)) : ?>
						<div data-sr="ease-in-out wait 0.25s" class="col-lg-2 col-sm-2 social-box sb-third">
							<div class="icon-item it-third">
								<div class="icon"><a href="<?php echo esc_url($latte_social_google_plus); ?>" target="_blank"><i class="fa"></i></a></div>
								<?php if(!empty($latte_social_google_plus_title) || is_customize_preview()) : ?>
								<span><?php echo $latte_social_google_plus_title; ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php elseif(empty($latte_social_google_plus) && is_customize_preview()) : ?>
						<div class="col-lg-2 col-sm-2 social-box sb-third customizer-hidden">
							<div class="icon-item it-third">
								<div class="icon"><a href="<?php echo esc_url($latte_social_google_plus); ?>" target="_blank"><i class="fa"></i></a></div>
								<?php if(!empty($latte_social_google_plus_title) || is_customize_preview()) : ?>
								<span><?php echo $latte_social_google_plus_title; ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($latte_social_instagram)) : ?>
						<div data-sr="ease-in-out wait 0.25s" class="col-lg-2 col-sm-2 social-box sb-fourth">
							<div class="icon-item it-fourth">
								<div class="icon"><a href="<?php echo esc_url($latte_social_instagram); ?>" target="_blank"><i class="fa"></i></a></div>
								<?php if(!empty($latte_social_instagram_title) || is_customize_preview()) : ?>
								<span><?php echo $latte_social_instagram_title; ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php elseif(empty($latte_social_instagram) && is_customize_preview()) : ?>
						<div class="col-lg-2 col-sm-2 social-box sb-fourth customizer-hidden">
							<div class="icon-item it-fourth">
								<div class="icon"><a href="<?php echo esc_url($latte_social_instagram); ?>" target="_blank"><i class="fa"></i></a></div>
								<?php if(!empty($latte_social_instagram_title) || is_customize_preview()) : ?>
								<span><?php echo $latte_social_instagram_title; ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($latte_social_github)) : ?>
						<div data-sr="ease-in-out wait 0.25s" class="col-lg-2 col-sm-2 social-box sb-fifth">
							<div class="icon-item it-fifth">
								<div class="icon"><a href="<?php echo esc_url($latte_social_github); ?>" target="_blank"><i class="fa"></i></a></div>
								<?php if(!empty($latte_social_github_title) || is_customize_preview()) : ?>
								<span><?php echo $latte_social_github_title; ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php elseif(empty($latte_social_github) && is_customize_preview()) : ?>
						<div class="col-lg-2 col-sm-2 social-box sb-fifth customizer-hidden">
							<div class="icon-item it-fifth">
								<div class="icon"><a href="<?php echo esc_url($latte_social_github); ?>" target="_blank"><i class="fa"></i></a></div>
								<?php if(!empty($latte_social_github_title) || is_customize_preview()) : ?>
								<span><?php echo $latte_social_github_title; ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
