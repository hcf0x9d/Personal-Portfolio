/*global $, console, alert*/

$(function () {
	var $win = $(window);

    $win.scroll(function () {
         if ($win.scrollTop() <= 10) {
             // Remove fixed
             $('.siteNav').removeClass('stuck');
         } else {
             // Fixed
             $('.siteNav').addClass('stuck');
         }
     });
});

function whereAmI() {
	'use strict';
	alert($(window.scrollTop));
	$window.scroll(function() {
	    if ($window.scrollTop() === '0' ) {
	        // Your div has reached the top
	        alert('top');
	    }
	});
}

/**
 * Google analytics event tracking tag.
 * @param   {String} category Category value for GA
 * @param   {String} action   Action value for GA
 * @param   {String} label    Label value for GA
 * @returns {Boolean}
 */
function gaTag(category, action, label) {
    'use strict';
    ga('send', 'event', category, action, label);
    console.log(category + ' | ' + action + ' | ' + label);
    return true;
}


function emailMe() {
    'use strict';
    event.preventDefault();
    
    window.location.href = "mailto:jason@jasonfukura.com";
}