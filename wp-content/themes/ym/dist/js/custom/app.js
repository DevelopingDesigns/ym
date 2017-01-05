'use strict';

/**
 * Fixed Header/Logo swap
 */
(function (document, $, undefined) {

	var logo = document.querySelector('.custom-logo');
	var initialLogoSrc = logo.srcset;
	var newLogoSrc = '/wp-content/uploads/2016/12/small-logo@2x.png';

	function debounce(func) {
		var wait = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 5;
		var immediate = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : true;

		var timeout = void 0;
		return function () {
			var context = this,
			    args = arguments;
			var later = function later() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	}

	function swapLogoAttributes(element, attributes) {
		for (var key in attributes) {
			element.setAttribute(key, attributes[key]);
		}
	}

	function scrollHandler(e) {
		var distanceY = window.pageYOffset;
		var header = document.querySelector('.site-header');
		var shrinkOn = document.querySelector('.before-header').clientHeight;

		if (distanceY > shrinkOn) {
			header.classList.add('smaller');
			swapLogoAttributes(logo, {
				'src': newLogoSrc,
				'srcset': newLogoSrc,
				'width': 75,
				'height': 80
			});
		} else {
			header.classList.remove('smaller');
			swapLogoAttributes(logo, {
				'src': initialLogoSrc,
				'srcset': initialLogoSrc,
				'width': 360,
				'height': 166
			});
		}
	}

	window.addEventListener('scroll', debounce(scrollHandler));
})(document, jQuery);