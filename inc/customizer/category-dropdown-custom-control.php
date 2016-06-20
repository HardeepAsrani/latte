<?php

function latte_add_customizer_custom_category_controls( $wp_customize ) {
	class Latte_Category_Dropdown_Control extends WP_Customize_Control {
		private $cats = false;

		public function __construct($manager, $id, $args = array(), $options = array()) {
			$this->cats = get_categories($options);

			parent::__construct( $manager, $id, $args );
		}

		/**
		 * Render the content of the category dropdown
		 *
		 * @return HTML
		 */
		public function render_content() {
				if(!empty($this->cats)) {
					?>
						<label>
						  <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
						  <select <?php $this->link(); ?>>
							<option value="0"><?php echo _e('All Posts', 'latte'); ?></option>
							   <?php
									foreach ( $this->cats as $cat ) {
										printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
									}
							   ?>
						  </select>
						</label>
					<?php
				}
			}
	}
}
add_action( 'customize_register', 'latte_add_customizer_custom_category_controls' );
?>