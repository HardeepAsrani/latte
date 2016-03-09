<?php
	$latte_subscribe_title = get_theme_mod('latte_subscribe_title',__( 'Subscribe', 'latte' ));
	$latte_subscribe_subtitle = get_theme_mod('latte_subscribe_subtitle',__( 'I won\'t spam you, promise!', 'latte' ));
?>

		<section class="subscribe" id="subscribe">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					<?php if(!empty($latte_subscribe_title) || !empty($latte_subscribe_subtitle)) : ?>
						<header data-sr="ease-in-out wait 0.25s" class="subscribe-header">
						<?php if(!empty($latte_subscribe_title)) : ?>
							<h2><?php echo esc_html($latte_subscribe_title); ?></h2>
						<?php endif; ?>
						<?php if(!empty($latte_subscribe_subtitle)) : ?>
							<h3><?php echo esc_html($latte_subscribe_subtitle); ?></h3>
						<?php endif; ?>
						</header>
					<?php endif; ?>
					<?php
						if ( is_active_sidebar( 'subscribe-widgets' ) ) :
							dynamic_sidebar( 'subscribe-widgets' );
						endif;
					?>
					</div>
				</div>
			</div>
		</section>
