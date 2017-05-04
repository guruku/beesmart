// JavaScript Document
function counter(time, url){
	var interval = setInterval(function(){
		$('#waktu').text(time);
		time = time - 1;
 
		if(time == 0){
			clearInterval(interval);
			window.location = url;
		}
	}, 1000);
}
 
$(document).ready(function(){
	counter(5, 'http://www.tutorialweb.net');
});