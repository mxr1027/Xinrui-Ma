//Flexslider
jQuery(window).load(function() {
    jQuery('.flexslider').flexslider();
});
// initialise plugins
jQuery(function(){
    jQuery('ul.sf-menu').superfish();
});
$(document).ready(function(){
    $(".idfy").click(function(){
	    $(this).find(".sub-category").slideToggle();
	});
});