$(function () {
	shadowWalker();
	rowHeight();

	// skillsList();

	$('.sitenav-list-item-target').on('click', function (e) {
		e.preventDefault();

		var target = $(this).attr('href'),
			loc = $(target).offset().top;

		$('html, body').animate({
			scrollTop: loc - 40
		}, 1000, 'easeInOutQuad');

	});
});

$(window).scroll(function () {
	shadowWalker();

});

function shadowWalker() {
	'use strict';

	var $shadowMe = $('.shadowMe'),
		$window = $(window),
		$this;

	$shadowMe.each(function () {
		$this = $(this);

		if($this.is(':visible') === true) {
			var windowTop = $window.scrollTop(),
				windowHeight = $window.height(),
				windowMid = windowHeight / 2,
				thisMid = $this.offset().top + ($this.height() / 2),
				loc = (windowTop + windowMid) - thisMid,
				shadowY = ((loc / windowMid) * -30);

			$this.css({
				'box-shadow': '0 ' + shadowY + 'px 40px rgba(0,0,0,0.1)'
			});
		}
	});
}


function rowHeight() {
	'use strict';

	var $el = $('.js-row-height');

	if($el.length > 0) {
		$el.each(function () {
			var $this = $(this),
				height = $this.closest('.row').height();

			$(this).height(height);
		});
	}
}