<article id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
		<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
		<div class="content">
		<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>
			<img src="<?php echo $att_image[0];?>" />
		<?php endif; ?>
		</div>
</article>