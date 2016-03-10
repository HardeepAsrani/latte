<?php
/**
 * Skills Widget - Latte
 */

class latte_skills_widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'latte_skills_widget',
			__( 'Latte - Skills Widget', 'latte' ),
			array( 'description' => __( 'Skills widget for Latte theme\'s Skills section.', 'latte' ), )
		);

	}



	function form($instance) {
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Skill', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php if( !empty($instance['title']) ): echo esc_html($instance['title']); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('percentage') ); ?>"><?php esc_html_e('Percentage', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('percentage') ); ?>" name="<?php echo esc_attr( $this->get_field_name('percentage') ); ?>" type="number" min="0" max="100" value="<?php if( !empty($instance['percentage']) ): echo intval($instance['percentage']); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('titlecolor') ); ?>"><?php esc_html_e('Title Color', 'latte'); ?></label> 
			<br/>
			<input id="<?php echo esc_attr( $this->get_field_id('titlecolor') ); ?>" name="<?php echo esc_attr( $this->get_field_name('titlecolor') ); ?>" type="color" data-default-color="#FFF" value="<?php if( !empty($instance['titlecolor']) ): echo esc_html($instance['titlecolor']); else: echo'#FFFFFF'; endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('titlebackground') ); ?>"><?php esc_html_e('Title Background', 'latte'); ?></label> 
			<br/>
			<input id="<?php echo esc_attr( $this->get_field_id('titlebackground') ); ?>" name="<?php echo esc_attr( $this->get_field_name('titlebackground') ); ?>" type="color" data-default-color="#D35400" value="<?php if( !empty($instance['titlebackground']) ): echo esc_html($instance['titlebackground']); else: echo'#D35400'; endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('barbackground') ); ?>"><?php esc_html_e('Bar Background', 'latte'); ?></label> 
			<br/>
			<input id="<?php echo esc_attr( $this->get_field_id('barbackground') ); ?>" name="<?php echo esc_attr( $this->get_field_name('barbackground') ); ?>" type="color" data-default-color="#E67E22" value="<?php if( !empty($instance['barbackground']) ): echo esc_html($instance['barbackground']); else: echo'#E67E22'; endif; ?>" />
		</p>
		<?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = esc_html($new_instance['title']);
		$instance['percentage'] = intval($new_instance['percentage']);
		$instance['titlecolor'] = esc_html($new_instance['titlecolor']);
		$instance['titlebackground'] = esc_html($new_instance['titlebackground']);
		$instance['barbackground'] = esc_html($new_instance['barbackground']);
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
		?>
			<?php echo $before_widget; ?>
					<div data-sr="ease-in-out wait 0.25s" class="col-md-6 col-sm-12 skill-box">
						<div class="skillbar clearfix " data-percent="<?php if( !empty($instance['percentage']) ): echo intval($instance['percentage']); endif; ?>%">
							<div class="skillbar-title" style="background: <?php if( !empty($instance['titlebackground']) ): echo esc_html($instance['titlebackground']); endif; ?>;"><span style="color:<?php if( !empty($instance['titlecolor']) ): echo esc_html($instance['titlecolor']); endif; ?>;"><?php if( !empty($instance['title']) ): echo esc_html($instance['title']); endif; ?></span></div>
							<div class="skillbar-bar" style="background: <?php if( !empty($instance['barbackground']) ): echo esc_html($instance['barbackground']); endif; ?>;"></div>
							<div class="skill-bar-percent"><?php if( !empty($instance['percentage']) ): echo esc_html($instance['percentage']); endif; ?>%</div>
						</div>
					</div>
			<?php echo $after_widget; ?>
		<?php
	}

}

add_action('widgets_init', create_function('', 'return register_widget("latte_skills_widget");'));
?>
