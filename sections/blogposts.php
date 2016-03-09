<?php
	$latte_blogposts_title = get_theme_mod('latte_blogposts_title',__( 'Blog', 'latte' ));
	$latte_blogposts_subtitle = get_theme_mod('latte_blogposts_subtitle',__( 'My thoughts.', 'latte' ));
	$latte_blogposts_items = get_theme_mod('latte_blogposts_items', 6);
?>

		<section class="blogposts" id="blogposts">
			<div class="container">
				<div class="row">
				<?php if(!empty($latte_blogposts_title) || !empty($latte_blogposts_subtitle)) : ?>
					<header data-sr="ease-in-out wait 0.25s" class="blog-header">
					<?php if(!empty($latte_blogposts_title)) : ?>
						<h2><?php echo esc_html($latte_blogposts_title); ?></h2>
					<?php endif; ?>
					<?php if(!empty($latte_blogposts_subtitle)) : ?>
						<h3><?php echo esc_html($latte_blogposts_subtitle); ?></h3>
					<?php endif; ?>
					</header>
				<?php endif; ?>
					<div class="col-md-12">
					<?php if(!empty($latte_blogposts_items)) : ?>
						<?php $loop = new WP_Query( array( 'posts_per_page' => $latte_blogposts_items ) ); ?>
					<?php else: ?>
						<?php $loop = new WP_Query( array( 'posts_per_page' => -1 ) ); ?>
					<?php endif; ?>
					<?php if ( $loop->have_posts() ): ?>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div data-sr="ease-in-out wait 0.25s" class="col-md-4 col-sm-6 col-xs-12 blog-item">
							<div class="item">
								<?php if ( has_post_thumbnail($post->ID) ): ?>
									<a class="item-featured-image" href="<?php esc_url( the_permalink() ); ?>"><?php echo get_the_post_thumbnail($post->ID, 'latte-blogposts'); ?></a>
								<?php else: ?>
									<a class="item-featured-image" href="<?php esc_url( the_permalink() ); ?>"><img src="<?php echo get_template_directory_uri().'/assets/images/287x230.png'; ?>"/></a>
								<?php endif; ?>
								<div class="item-meta">
									<h3 class="post-title"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h3>
									<h6 class="post-meta"><?php the_author_posts_link(); ?> - <?php the_time( get_option( 'date_format' ) ); ?></h6>
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
