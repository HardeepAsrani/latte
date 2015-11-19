<article id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
	<?php if ( is_singular( get_post_type() ) ) : ?>
		<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
		<?php printf( __( '<div class="post-meta">Video published by <a href="%2$s">%1$s</a> on <time>%3$s</time></div>', 'latte' ), get_the_author(), get_author_posts_url(get_the_author_meta( 'ID' )), get_the_time( get_option( 'date_format' ) ) ); ?>
		<div class="content">
		<?php 
			if ( has_post_thumbnail() ) :
				the_post_thumbnail();
			endif;
		?>
			<div class="post-content">
				<?php the_content(); ?>
			</div>
			<?php
				wp_link_pages( array(
					'before'	  => '<ul class="pager">',
					'after'	   => '</ul>',
					'link_before' => '<li><span>',
					'link_after'  => '</span></li>',
				) );
			?>
			<div class="post-meta">
				<span><?php _e('Categories:','latte'); ?> <?php the_category(', '); ?></span>
				<span><?php the_tags(__( 'Tags: ', 'latte' ) , ', '); ?></span>
			</div>
		</div>
	<?php else: ?>
		<a href="<?php the_permalink(); ?>">
			<?php the_title( '<h2 class="post-title">', '</h2>' ); ?>
		</a>
		<div class="post-subtitle">
				<?php echo ( $video = latte_post_format_tools_get_video() ); ?>
				<?php if ( has_excerpt() ) : ?>
					<?php the_excerpt(); ?>
				<?php elseif( empty( $video ) ) : ?>
					<?php the_content(); ?>
				<?php endif; ?>
		</div>
		<?php printf( __( '<div class="post-meta">Video published by <a href="%2$s">%1$s</a> on <time>%3$s</time> | <a href="%4$s">Permalink</a></div>', 'latte' ), get_the_author(), get_author_posts_url(get_the_author_meta( 'ID' )), get_the_time( get_option( 'date_format' ) ), get_the_permalink() ); ?>
	<?php endif; ?>
</article>