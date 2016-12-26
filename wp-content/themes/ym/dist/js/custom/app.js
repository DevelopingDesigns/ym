'use strict';

/**
 * Fixed Header/Logo swap
 */
(function (document, $, undefined) {

	var logo = document.querySelector('.custom-logo');
	var initialLogoSrc = logo.srcset;
	var newLogoSrc = '/wp-content/uploads/2016/12/small-logo@2x.png';

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

	function swapLogoAttributes(element, attributes) {
		for (var key in attributes) {
			element.setAttribute(key, attributes[key]);
		}
	}

	window.addEventListener('scroll', scrollHandler);
})(document, jQuery);