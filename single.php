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
				<?php if ( have_posts() ) : ?> 
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) ); ?>
					<?php endwhile; ?>
					<?php if( get_previous_post_link() || get_next_post_link() ) : ?>
						<ul class="pager">
						<?php if( get_previous_post_link() ): ?>
							<li class="previous"><?php previous_post_link( '%link', __( '&larr; Previous', 'latte' ) ); ?></li>
						<?php endif; ?>
						<?php if( get_next_post_link() ): ?>
							<li class="next"><?php next_post_link( '%link', __( 'Next &rarr;', 'latte' ) ); ?></li>
						<?php endif; ?>
						</ul>
					<?php endif; ?>
					<?php
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
				</div>
			</div>
		</div>

<?php get_footer(); ?>