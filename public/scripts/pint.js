// set pint layer maximums
var beer_max = 280;
var foam_max = 312;

// functions

function getScroll() {

	// work out scroll position
	var scroll_pos = $(window).scrollTop();
	var page_height = $(document).height() - $(window).height();
	var scroll_ratio = scroll_pos / page_height;
	$('#output').text(scroll_pos + ' / ' + page_height + ' : ' + scroll_ratio);
	
	// work out pint layer positions
	var beer_pos = beer_max * scroll_ratio;
	var foam_pos = foam_max * scroll_ratio;
	
	// move the layers into position
	$('#pint #beer').css('top', beer_pos);
	$('#pint #foam').css('top', foam_pos);
	
}

$(document).ready(function() {
	
	// set up scroll
	$(window).scroll(function() {
		getScroll();
	});
	
	// unfix position of sidebar if we have a tiny browser
	if ($(window).height() < 580) {
		$("#side-info").css('position', 'absolute');
	}
	
	// set initial scroll (in case of refresh, etc.)
	getScroll();
	
	// this stuff handles zooming to #links
	$('a[href*=#]').click(function() {  
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {	
			var $target = $(this.hash);
			$target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
			if ($target.length) {
				var targetOffset = $target.offset().top;
				$('html,body').animate({scrollTop: targetOffset}, 300);
				return false;
			}	
		}
	});
	
});