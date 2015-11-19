<?php
/**
 * Services Widget - Latte
 */

class latte_services_widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'latte_services_widget',
			__( 'Latte - Services Widget', 'latte' ),
			array( 'description' => __( 'Services widget for Latte theme\'s Services section.', 'latte' ), )
		);

	}



	function form($instance) {
		include get_template_directory() . "/inc/other/font-awesome.php";
		$instance = wp_parse_args( (array) $instance, array( 'icon' => 'fa-glass' ));
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Icon', 'latte'); ?></label>
			<select class='widefat' id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>">
			<?php foreach($fontawesome as $item): ?>
				<option value="<?php echo $item; ?>" <?php if ($instance['icon'] == $item) echo 'selected="selected"'; ?>><?php echo $item; ?></option>
			<?php endforeach; ?>
			</select>
			<label><a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/"><?php _e('Click here to see a list of icons.', 'latte'); ?></a></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="url" value="<?php if( !empty($instance['link']) ): echo $instance['link']; endif; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('newwindow'); ?>"><?php _e('Open In New Window?', 'latte'); ?></label> 
			<input type="hidden" name="<?php echo $this->get_field_name('newwindow'); ?>" value="0" />
			<input id="<?php echo $this->get_field_id('newwindow'); ?>" name="<?php echo $this->get_field_name('newwindow'); ?>" type="checkbox" value="1" <?php if (isset($instance['newwindow'])) : if (1 == $instance['newwindow']) echo 'checked="checked"'; endif ?> />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'latte'); ?></label> 
			<textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php if( !empty($instance['text']) ): echo $instance['text']; endif; ?></textarea>
		</p>
		<?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['icon'] = strip_tags($new_instance['icon']);
		$instance['link'] = strip_tags($new_instance['link']);
		$instance['newwindow'] = strip_tags($new_instance['newwindow']);
		$instance['text'] = strip_tags($new_instance['text']);
		return $instance;
	}
 
	function widget($args, $instance) {
		extract( $args );
		?>
			<?php echo $before_widget; ?>
					<div data-sr="ease-in-out wait 0.25s" class="col-md-4 col-sm-6 text-center service-box">
						<div class="service-item">
						<?php if( !empty($instance['icon']) ): ?>
							<div class="service-icon">
								<a <?php if (isset($instance['newwindow'])) : if (1 == $instance['newwindow']) echo 'target="_blank"'; endif ?> <?php if( !empty($instance['link']) ): echo 'href="'.$instance['link'].'"'; endif; ?>><i class="fa <?php echo $instance['icon']; ?>"></i> <h3><?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?></h3></a>
							</div>
						<?php endif; ?>
						<?php if( !empty($instance['text']) ): ?>
							<p><?php echo $instance['text']; ?></p>
						<?php endif; ?>
						</div>
					</div>
			<?php echo $after_widget; ?>
		<?php
	}

}

add_action('widgets_init', create_function('', 'return register_widget("latte_services_widget");'));
?>