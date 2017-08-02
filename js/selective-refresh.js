( function( $ ) {
	$( window ).load( function() {
		var isCustomizeSelectiveRefresh = ( 'undefined' !== typeof wp && wp.customize && wp.customize.selectiveRefresh );

		// Initialize audio and video players in Ephemera_Widget widget when selectively refreshed in Customizer.
		if ( isCustomizeSelectiveRefresh && wp.mediaelement ) {
			wp.customize.selectiveRefresh.bind( 'partial-content-rendered', function() {
				wp.mediaelement.initialize();
			} );
		}
	} );
} )( jQuery );
