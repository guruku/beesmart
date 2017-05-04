/* ........................................................................................................ */
/*	NS PLUGIN */
/* 
	Simple jQuery Hover Plugin. 
	Use it on any kind of container to make all the images inside to use the hover effect.
	Also you can make any element to use this effect simple assigning the 'nsblock' class to the element.
*/
/* ........................................................................................................ */

(function ( $ ) {
 
    $.fn.nsHover = function( options ) {

    	// +++++++++++++++++++++++++++++++++++++++++++++
		// settings
		// +++++++++++++++++++++++++++++++++++++++++++++
		var settings = $.extend({
            // default values.
            scaling : false,
            speed: 'normal',
            rounded: 'normal',
            shadow: false,
            bganim : 'fade',
            bgcolor: '#ffffff',
            bgopacity : 0.5,            
            bgpic : 'imgs/lens.png',
            bgsize : '25%',
            content: ''
        }, options );

		// +++++++++++++++++++++++++++++++++++++++++++++
		// settings vars
		// +++++++++++++++++++++++++++++++++++++++++++++
		var rounded = settings.rounded;
		var scaling = settings.scaling;
		var speed = settings.speed;
		var shadow = settings.shadow;
		var overlayColor = settings.bgcolor;
		var overlayOpacity = settings.bgopacity;
		var bgImg = settings.bgpic;
		var bgSize = settings.bgsize;
		var overlayContent = settings.content;
		var overlayAnim = settings.bganim;

		// +++++++++++++++++++++++++++++++++++++++++++++
		// speed of the hover
		// +++++++++++++++++++++++++++++++++++++++++++++
		var trDuration, trSpeed;
		if(speed === 'slow') { 	// slow
			trSpeed = 0.5; trDuration = 500;
		} else if(speed === 'fast') {	// fast
			trSpeed = 0.2; trDuration = 200;
		} else {	// normal
			trSpeed = 0.3; trDuration = 300;
		}

		// +++++++++++++++++++++++++++++++++++++++++++++
		// adding the class block, overlay
		// +++++++++++++++++++++++++++++++++++++++++++++
		this.children().addClass('nsblock');
		this.find('img').wrap('<div class="nsblock"></div>');
		this.find('.nsblock').append('<span class="nsoverlay">' + overlayContent + '</span>'); 
		this.find('.nsblock').each(function(index){
			//console.log(index);
			i = index + 1;
			$(this).attr('id','nsblock'+i);
		});
		this.find('.nsoverlay').html('<span class="nscontent">' + overlayContent + '</span>');

		// +++++++++++++++++++++++++++++++++++++++++++++
		// initialize CSS
		// +++++++++++++++++++++++++++++++++++++++++++++
		this.find('.nsblock').css({
			'position': 'relative',
			'display': 'inline-block',
			'cursor': 'pointer',
			'overflow': 'hidden'				
		});
		this.find('.nsblock img').css({
			'position': 'absolute','top': '0px','left': '0px','margin': '0','padding': '0'				
		});	

		this.find('.nsoverlay').css({
			'position': 'absolute','display': 'block',
			'width': '100%','height': '100%', 'top':0, 'left':0,
			'background-image': 'url('+ bgImg +')',
			'background-color': nsHexToRgba(overlayColor,overlayOpacity),
			'background-repeat' : 'no-repeat',
			'background-size' : bgSize,
			'background-position' : 'center',
			'z-index': '9999'				
		});

		if(overlayAnim === "scale"){
			this.find('.nsoverlay').css({
				'-webkit-transform':'scale(0,0)',
				'-moz-transform':'scale(0,0)',
				'-ms-transform':'scale(0,0)',
				'transform':'scale(0,0)'				
			});
		} else {
			this.find('.nsoverlay').css({
				'display':'none'			
			});
		}

		this.find('.nscontent').css({
			'position': 'absolute',
			'text-align': 'center',
			'width': '100%',
			'top': '50%', 
			'-webkit-transform': 'translateY(-50%)',
			'-ms-transform': 'translateY(-50%)',
			'transform': 'translateY(-50%)'		
		});


		// +++++++++++++++++++++++++++++++++++++++++++++
		// set the width height of the blocks according to the images
		// +++++++++++++++++++++++++++++++++++++++++++++
		this.find('img').each(function(index){
			$(this).parent().css('width', $(this).width());
			$(this).parent().css('height', $(this).height());
		});

		 
		// +++++++++++++++++++++++++++++++++++++++++++++
		// check and perform rounded corners
		// +++++++++++++++++++++++++++++++++++++++++++++
		var radius = '5%';
		if(rounded === 'none'){
			radius = '0%';
		} else if(rounded === 'circle'){
			radius = '50%';
		}
		nsMakeRounded(this.find('.nsblock'),radius);
		nsMakeRounded(this.find('.nsoverlay'),radius);

		// +++++++++++++++++++++++++++++++++++++++++++++
		// check and perform box shadow
		// +++++++++++++++++++++++++++++++++++++++++++++

		if(shadow)nsSetBoxShadow(this.find('.nsblock'));


		// +++++++++++++++++++++++++++++++++++++++++++++
		// set the transition speed 
		// +++++++++++++++++++++++++++++++++++++++++++++
		this.find('.nsblock').css({
	        WebkitTransition : 'all ' + trSpeed + 's ease-out',
	        MozTransition    : 'all ' + trSpeed + 's ease-out',
	        MsTransition     : 'all ' + trSpeed + 's ease-out',
	        OTransition      : 'all ' + trSpeed + 's ease-out',
	        transition       : 'all ' + trSpeed + 's ease-out'
	    });


		// +++++++++++++++++++++++++++++++++++++++++++++
	    // overlay animations
		// +++++++++++++++++++++++++++++++++++++++++++++
	    function nsAnimateOverlay(elm,animStyle,animDir){

	    	if(animStyle === "scale"){
	    		var scaleEnd = 1;
	    		if(!animDir)scaleEnd = 0;
		    	elm.stop().animate({ scale: scaleEnd }, {
			    	step: function(now,fx) {
			    		nsSetScale($(this),now);
			    	},
			    	duration: trDuration
				},'ease-out');
		    } else if(animStyle === "slide") {
		    	if(animDir)elm.stop().slideDown(trDuration);
		    	else elm.stop().slideUp(trDuration);
		    } else {
		    	if(animDir)elm.stop().fadeIn(trDuration);
		    	else elm.stop().fadeOut(trDuration);
		    }
	    }

		// +++++++++++++++++++++++++++++++++++++++++++++
		// block mouse hover
		// +++++++++++++++++++++++++++++++++++++++++++++
		// mouse over 
		this.find('.nsblock').on('mouseenter',function(event) {
			if(scaling)nsSetScale($(this),scaling);
			//if(shadow)nsSetBoxShadow($(this));
			var elm = $(this).find('.nsoverlay');
			nsAnimateOverlay(elm,overlayAnim,true);
		});

		// block mouse out
		this.find('.nsblock').on('mouseleave',function(event) {
			if(scaling)nsSetScale($(this),1);
			//if(shadow)nsRemoveBoxShadow($(this));
			var elm = $(this).find('.nsoverlay');
			nsAnimateOverlay(elm,overlayAnim,false);
		});


		// +++++++++++++++++++++++++++++++++++++++++++++
		// all functions
		// +++++++++++++++++++++++++++++++++++++++++++++	

		// set scale to an element
		function nsSetScale(elm,scale){
	    	elm.css('-webkit-transform',"scale(" + scale + "," + scale +")");
			elm.css('-ms-transform',"scale(" + scale + "," + scale +")");
	    	elm.css('transform',"scale(" + scale + "," + scale +")");
		}

		// make the border rounded
		function nsMakeRounded(elm,radius){
			elm.css('-webkit-border-radius',radius);
			elm.css('-moz-border-radius',radius);
			elm.css('border-radius',radius);
		}

		// set the element shadow
		function nsSetBoxShadow(elm){
			elm.css('-webkit-box-shadow','rgba(0,0,0,0.8) 0 0 3px');
			elm.css('-moz-box-shadow','rgba(0,0,0,0.8) 0 0 3px');
			elm.css('box-shadow','rgba(0,0,0,0.8) 0 0 3px');
		}
		
		// remove box shadow 
		function nsRemoveBoxShadow(elm){
			elm.css('-webkit-box-shadow','none');
			elm.css('-moz-box-shadow','none');
			elm.css('box-shadow','none');
		}

		// hex to RGB converison
		function nsHexToRgba(hex,alpha) {

			var rgb = '';
			var rgba = 'rgab(0,0,0,'+ alpha +')';

		    // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
		    var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
		    hex = hex.replace(shorthandRegex, function(m, r, g, b) {
		        return r + r + g + g + b + b;
		    });

		    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
		    rgb =  result ? {
		        r: parseInt(result[1], 16),
		        g: parseInt(result[2], 16),
		        b: parseInt(result[3], 16)
		    } : null;
		    rgba = '(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ',' + alpha + ')';

		    return 'rgba'+rgba;
		}

    };
 
}( jQuery ));