$(document).ready(function(){

	$("#icon-bars").click(function(){
	    $("#nav-header").slideToggle();
	});


	//Scroll to fixed menu
	$(window).bind('scroll', function () {
	    if ($(window).scrollTop() > 120) {
	        $('#nav-header').addClass('fixed');
	    } else {
	        $('#nav-header').removeClass('fixed');
    }
});
});

