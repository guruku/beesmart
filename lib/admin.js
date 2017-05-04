/*
	Skin: Monday
	Admin-side JS
	MP3-jPlayer v2
	---
*/

function mjpMonday_bg4 ( colour ) {
	jQuery( '.transport-MI div' ).css({
		'box-shadow' : 			'0 0 3px 0.7px ' + colour,
		'-moz-box-shadow' :		'0 0 3px 0.7px ' + colour,
		'-webkit-box-shadow' :	'0 0 3px 0.7px ' + colour,
		'border-color' :		colour
	});
	jQuery( '.subwrap-MI, .ul-mjp' ).css({
		'border-color' :		colour
	});
	
	jQuery( '.MIsliderVolume .ui-widget-header' ).css({
		'background-color' :		colour
	});
}


jQuery( document ).ready( function () {
	
	var posCol = jQuery('#BG4').val();
	mjpMonday_bg4( posCol );
	
	var callback = function ( data ) {
		if ( data.pickID == 'BG4' ) {
			mjpMonday_bg4( data.colour );
		}
	};
	MP3jP.extCalls.update_colour.push( callback );
	
});
