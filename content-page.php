<article id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
		<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
		<div class="content">
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
		</div>
</article>