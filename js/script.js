var $j = jQuery.noConflict();

$j(function(){
	
	/* Adding the stacked class to sidebar lists and removing to #recentcomments */
	$j('.widget ul').addClass('nav nav-tabs nav-stacked');
	$j('#recentcomments').removeClass('nav nav-tabs nav-stacked')

});