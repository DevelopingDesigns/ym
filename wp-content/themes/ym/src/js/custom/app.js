/**
 * Fixed Header/Logo swap
 */
(function (document, $, undefined) {

	const logo           = document.querySelector('.custom-logo');
	const initialLogoSrc = logo.srcset;
	const newLogoSrc     = '/wp-content/uploads/2016/12/small-logo@2x.png';


	function debounce(func, wait = 5, immediate = true) {
		let timeout;
		return function () {
			let context = this, args = arguments;
			let later   = function () {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			let callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	}


	function swapLogoAttributes(element, attributes) {
		for (let key in attributes) {
			element.setAttribute(key, attributes[key]);
		}
	}


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


	function fixHeader() {
		const header = document.querySelector('#main');
		let topOfHeader = header.offsetTop;

		if (window.scrollY >= topOfNav) {
			document.body.style.paddingTop = header.offsetHeight + 'px';
			document.body.classList.add('fixed-header');
		} else {
			document.body.classList.remove('fixed-header');
			document.body.style.paddingTop = 0;
		}
	}

	window.addEventListener('scroll', debounce(scrollHandler));

})(document, jQuery);
