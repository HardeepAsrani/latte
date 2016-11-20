jQuery( document ).ready( function( $ ){
	$( document ).on( 'mousemove', function() {
		$( '.color' ).iris({
			change: function( event, ui ) {
				$( this ).css( 'background', ui.color.toString() );
			}
		});
	});
});