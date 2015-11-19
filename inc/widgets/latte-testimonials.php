<?php
/**
 * Testimonials Widget - Latte
 */

class latte_testimonials_widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'latte_testimonials_widget',
			__( 'Latte - Testimonials Widget', 'latte' ),
			array( 'description' => __( 'Testimonials widget for Latte theme\'s Testimonials section.', 'latte' ), )
		);

	}



	function form($instance) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('testimonial'); ?>"><?php _e('Testimonial', 'latte'); ?></label> 
			<textarea class="widefat" id="<?php echo $this->get_field_id('testimonial'); ?>" name="<?php echo $this->get_field_name('testimonial'); ?>"><?php if( !empty($instance['testimonial']) ): echo $instance['testimonial']; endif; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php if( !empty($instance['name']) ): echo $instance['name']; endif; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('company'); ?>"><?php _e('Position/Company', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('company'); ?>" name="<?php echo $this->get_field_name('company'); ?>" type="text" value="<?php if( !empty($instance['company']) ): echo $instance['company']; endif; ?>" />
		</p>
		<?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['testimonial'] = strip_tags($new_instance['testimonial']);
		$instance['name'] = strip_tags($new_instance['name']);
		$instance['company'] = strip_tags($new_instance['company']);
		return $instance;
	}
 
	function widget($args, $instance) {
		extract( $args );
		?>
			<?php echo $before_widget; ?>
							<div class="swiper-slide testimonials-slide">
							<?php if( !empty($instance['testimonial']) ): ?>
								<blockquote><?php echo $instance['testimonial']; ?></blockquote>
							<?php endif; ?>
							<?php if( !empty($instance['name']) ): ?>
								<span><?php echo $instance['name']; ?><?php if( !empty($instance['company']) ): ?>, <i><?php echo $instance['company']; ?></i><?php endif; ?></span>
							<?php endif; ?>
							</div>
			<?php echo $after_widget; ?>
		<?php
	}

}

add_action('widgets_init', create_function('', 'return register_widget("latte_testimonials_widget");'));
?>