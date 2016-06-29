$(function () {
	shadowWalker();
	rowHeight();
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
				shadowY = ((loc / windowMid) * -50);

			$this.css({
				'box-shadow': '0 ' + shadowY + 'px 80px rgba(0,0,0,0.2)'
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