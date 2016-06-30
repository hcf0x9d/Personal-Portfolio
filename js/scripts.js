$(function () {
	shadowWalker();
	rowHeight();

	skillsList();

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

	skillsList();
});


function skillsList() {
	'use strict';

	var $list = $('.js-skills'),
		listBottom = $list.offset().top + $list.height() - 20,
		itemBottom,
		$window = $(window),
		windowTop = $window.scrollTop(),
		windowBottom = windowTop + $window.height(),
		percent;

	$('.skills-item').each(function () {
		itemBottom = $(this).offset().top + $(this).height() + 200;

		if (windowBottom >= itemBottom && !$(this).hasClass('ran')) {
			percent = $(this).data('percent');

			$(this).find('.skills-item-chart').animate({
				width: percent * 100 + '%'
			}, 750, 'easeOutBack');

			$(this).addClass('ran');
		}
	});

	// if (windowBottom >= listBottom && !$list.hasClass('ran')) {
	// 	$list.find('.skills-item').each(function () {
	// 		percent = $(this).data('percent');

	// 		$(this).find('.skills-item-chart').animate({
	// 			width: percent * 100 + '%'
	// 		}, 500, 'easeOutBack');
	// 	});

	// 	$list.addClass('ran');
	// }
	

}

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