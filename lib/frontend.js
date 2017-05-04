/*
	Skin: Monday
	Frontend JS
	MP3-jPlayer v2
	http://mp3-jplayer.com
   	http://sjward.org
	---
*/

function MJPskins_monday_volumeClicks ( j ) {
	jQuery('#innerExt2_' + j).click( function ( e ) { 
		if ( j === MP3_JPLAYER.tID ) { 
			jQuery( MP3_JPLAYER.jpID ).jPlayer( 'volume', 1 ); 
		} 
		jQuery( '#innerExt1_' + j ).removeClass( 'vol-muted' );
		jQuery( MP3_JPLAYER.eID.vol + j ).slider( 'value', 100 ); 
		MP3_JPLAYER.pl_info[ j ].vol = 100;
		MP3_JPLAYER.mutes[j] = false;
	}); 
}; 
	

var MJPskins_monday = function () {
	var j;
	if ( typeof MP3jPLAYERS !== 'undefined' ) {
		for ( j in MP3jPLAYERS ) {
			if ( MP3jPLAYERS[ j ].type === 'MI' ) { 
				MJPskins_monday_volumeClicks( j );
			}
		}
	}
};


function MJP_SKINS_INIT () {
	MP3_JPLAYER.extCalls.init.push( MJPskins_monday );
};
