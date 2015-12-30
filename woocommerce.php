<?php get_header(); ?>

		<header class="archive-header">
			<div class="cover-container row">
				<div class="inner cover col-md-12">
					<h1 class="cover-heading"><?php bloginfo( 'name' ); ?></h1>
					<p class="lead"><?php bloginfo( 'description' ); ?></p>
				</div>
			</div>
		</header>

		<div class="container blog">
			<div class="row">
			<?php
				$theme_layout = get_theme_mod( 'latte_blog_sidebar', 'full' );
				if ($theme_layout=="left") :
					get_sidebar();
				endif;
			?>
			<?php if ($theme_layout=="full") : ?>
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<?php else: ?>
				<div class="col-lg-8 col-md-8">
			<?php endif; ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
					<?php woocommerce_content(); ?>
					</article>
				</div>
				<?php
				if ($theme_layout=="right") :
					get_sidebar();
				endif;
				?>
			</div>
		</div>

<?php get_footer(); ?>