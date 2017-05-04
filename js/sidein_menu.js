/*
*****************************************
Author: Vivekanand
Website: http://www.developersnippets.com
*****************************************
*/

$(document).ready(function(){
						   //alert("waha");	
				$("#awal").hide();
				$("#ahir").show();	
	$(".toggleBtn").click(function(event){
	
			if($("#slideMenu").hasClass('closed')){
				$("#slideMenu").animate({right:0}, 200, function(){
					$(this).removeClass('closed').addClass('opened');
					document.getElementById("kakisoal").style.width = '74%';					
					$("a#toggleLink").removeClass('toggleBtn').addClass('toggleBtnHighlight');
				});
				$("#ahir").hide();	
				$("#awal").show();

			return false;
			}//if close
			
			if($("#slideMenu").hasClass('opened')){
				//alert("waha");
				$("#slideMenu").animate({right:-800}, 200, function(){
					$(this).removeClass('opened').addClass('closed');
					document.getElementById("kakisoal").style.width = '97.7%';
					$("a#toggleLink").removeClass('toggleBtnHighlight').addClass('toggleBtn');
				});
				$("#ahir").show();	
				$("#awal").hide()
		return false;
			}//if close
			
			$('#slideMenu').bind("mouseleave",function(){
				$("#slideMenu").animate({left:-300}, 500, function(){
					$(this).removeClass('opened').addClass('closed');
					$("a#toggleLink").removeClass('toggleBtnHighlight').addClass('toggleBtn');
				});
				return false;
			});//bind close
	});//toggleBtn click close

	$("a.anchorLink").click(function () {	
		elementClick = $(this).attr("href");
		destination = $(elementClick).offset().top;
		$("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, 1000 );
		return false;
	})

	/* Mouse Enter Event (that is mouseover event)
	$(".toggleBtn").bind("mouseenter",function(){
			if($("#slideMenu").hasClass('closed')){
				$("#slideMenu").animate({left:0}, 500, function(){
					$(this).removeClass('closed').addClass('opened');
					$("a#toggleLink").removeClass('toggleBtn').addClass('toggleBtnHighlight');
				});
			}//if close
			
			$('#slideMenu').bind("mouseleave",function(){
				$("#slideMenu").animate({left:-300}, 500, function(){
					$(this).removeClass('opened').addClass('closed');
					$("a#toggleLink").removeClass('toggleBtnHighlight').addClass('toggleBtn');
				});
			});//bind close
	});//toggleBtn click close*/

});//ready close