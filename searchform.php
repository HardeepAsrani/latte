<div class="form-group">
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
		<div class="input-group">
			<input type="search" class="form-control searchform-input" placeholder="<?php _e( 'Search for:', 'latte' ); ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php _e( 'Search for:', 'latte' ); ?>" />
			<span class="input-group-btn">
				<input type="submit" class="btn btn-primary searchform-button" value="<?php _e( 'Search', 'latte' ); ?>" />
			</span>
		</div>
	</form>
</div>