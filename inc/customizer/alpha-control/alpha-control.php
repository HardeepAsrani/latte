<?php
/**
 * Alpha Color Picker Customizer Control
 *
 * This control adds a second slider for opacity to the stock WordPress color picker,
 * and it includes logic to seamlessly convert between RGBa and Hex color values as
 * opacity is added to or removed from a color.
 *
 * This Alpha Color Picker is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this Alpha Color Picker. If not, see <http://www.gnu.org/licenses/>.
 */

function latte_add_customizer_custom_controls( $wp_customize ) {
    class Latte_Customize_Alpha_Color_Control extends WP_Customize_Control {
    
		public $type = 'alphacolor';
		//public $palette = '#3FADD7,#555555,#666666, #F5f5f5,#333333,#404040,#2B4267';
		public $palette = true;
		public $default = '#3FADD7';
	
		protected function render() {
			$id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );
			$class = 'customize-control customize-control-' . $this->type; ?>
			<li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
				<?php $this->render_content(); ?>
			</li>
		<?php }
	
		public function render_content() { ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input type="text" data-palette="<?php echo $this->palette; ?>" data-default-color="<?php echo $this->default; ?>" value="<?php echo intval( $this->value() ); ?>" class="latte-color-control" <?php $this->link(); ?>  />
			</label>
		<?php }
	}
}
add_action( 'customize_register', 'latte_add_customizer_custom_controls' );

function latte_enqueue_alpha_control_js() {
    wp_register_script( 'latte_alpha_control_js', get_template_directory_uri() . '/inc/customizer/alpha-control/alpha_control.js', array( 'jquery' ), NULL, true );
    wp_enqueue_script( 'latte_alpha_control_js' );
}
add_action( 'customize_controls_print_scripts', 'latte_enqueue_alpha_control_js' );

function latte_enqueue_alpha_control_css() {
    wp_register_style( 'latte_alpha_control_css', get_template_directory_uri() . '/inc/customizer/alpha-control/alpha_control.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'latte_alpha_control_css' );
}
add_action( 'customize_controls_print_styles', 'latte_enqueue_alpha_control_css' );

?>
