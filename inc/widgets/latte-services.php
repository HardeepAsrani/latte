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
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php if( !empty($instance['title']) ): echo esc_html( $instance['title'] ); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('icon') ); ?>"><?php esc_html_e('Icon', 'latte'); ?></label>
			<select class='widefat' id="<?php echo esc_attr( $this->get_field_id('icon') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon') ); ?>">
			<?php foreach($fontawesome as $item): ?>
				<option value="<?php echo esc_html($item); ?>" <?php if ($instance['icon'] == $item) echo 'selected="selected"'; ?>><?php echo esc_html($item); ?></option>
			<?php endforeach; ?>
			</select>
			<label><a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/"><?php _e('Click here to see a list of icons.', 'latte'); ?></a></label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('link') ); ?>"><?php esc_html_e('Link', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link') ); ?>" type="url" value="<?php if( !empty($instance['link']) ): echo esc_url($instance['link']); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('newwindow') ); ?>"><?php esc_html_e('Open In New Window?', 'latte'); ?></label> 
			<input type="hidden" name="<?php echo esc_attr( $this->get_field_name('newwindow') ); ?>" value="0" />
			<input id="<?php echo esc_attr( $this->get_field_id('newwindow') ); ?>" name="<?php echo esc_attr( $this->get_field_name('newwindow') ); ?>" type="checkbox" value="1" <?php if (isset($instance['newwindow'])) : if (1 == $instance['newwindow']) echo 'checked="checked"'; endif ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('text') ); ?>"><?php esc_html_e('Text', 'latte'); ?></label> 
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text') ); ?>"><?php if( !empty($instance['text']) ): echo wp_kses_post( force_balance_tags( $instance['text'] ) ); endif; ?></textarea>
		</p>
		<?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = esc_html($new_instance['title']);
		$instance['icon'] = esc_html($new_instance['icon']);
		$instance['link'] = esc_url($new_instance['link']);
		$instance['newwindow'] = intval($new_instance['newwindow']);
		$instance['text'] = wp_kses_post( force_balance_tags( $new_instance['text'] ) );
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
								<a <?php if (isset($instance['newwindow'])) : if (1 == $instance['newwindow']) echo 'target="_blank"'; endif ?> <?php if( !empty($instance['link']) ): echo 'href="'.esc_url($instance['link']).'"'; endif; ?>><i class="fa <?php echo esc_html($instance['icon']); ?>"></i> <h3><?php if( !empty($instance['title']) ): echo esc_html($instance['title']); endif; ?></h3></a>
							</div>
						<?php endif; ?>
						<?php if( !empty($instance['text']) ): ?>
							<p><?php echo wp_kses_post( force_balance_tags( $instance['text'] ) ); ?></p>
						<?php endif; ?>
						</div>
					</div>
			<?php echo $after_widget; ?>
		<?php
	}

}

add_action('widgets_init', create_function('', 'return register_widget("latte_services_widget");'));
?>
