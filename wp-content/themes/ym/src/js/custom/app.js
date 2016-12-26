/**
 * Fixed Header/Logo swap
 */
(function (document, $, undefined) {

	const logo           = document.querySelector('.custom-logo');
	const initialLogoSrc = logo.srcset;
	const newLogoSrc     = '/wp-content/uploads/2016/12/small-logo@2x.png';

	function scrollHandler(e) {
		let distanceY  = window.pageYOffset;
		const header   = document.querySelector('.site-header');
		const shrinkOn = document.querySelector('.before-header').clientHeight;

		if (distanceY > shrinkOn) {
			header.classList.add('smaller');
			swapLogoAttributes(logo, {
				'src': newLogoSrc,
				'srcset': newLogoSrc,
				'width': 75,
				'height': 80,
			});
		} else {
			header.classList.remove('smaller');
			swapLogoAttributes(logo, {
				'src'   : initialLogoSrc,
				'srcset': initialLogoSrc,
				'width' : 360,
				'height': 166,
			});		}
	}

	function swapLogoAttributes(element, attributes) {
		for (let key in attributes) {
			element.setAttribute(key, attributes[key]);
		}
	}

	window.addEventListener('scroll', scrollHandler);

})(document, jQuery);
