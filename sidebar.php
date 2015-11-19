				<div class="sidebar col-lg-4 col-md-4">
				<?php
					if ( is_active_sidebar( 'sidebar-widgets' ) ) :
						dynamic_sidebar( 'sidebar-widgets' );
					endif;
				?>
				</div>