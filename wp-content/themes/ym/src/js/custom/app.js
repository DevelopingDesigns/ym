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




	function fixHeader() {
		const adminBar = document.querySelector('#wpadminbar');
		const siteContainer = document.querySelector('.site-container');
		const beforeHeader = document.querySelector('.before-header');
		const header = document.querySelector('.site-header');

		let topOfBeforeHeader = beforeHeader.clientHeight;
		let headerHeight = header.clientHeight;

		if (window.scrollY >= topOfBeforeHeader) {
			if (typeof(adminBar) != 'undefined' && adminBar != null) {
				header.style.top = `${adminBar.clientHeight}px`;
			}

			document.body.classList.add('fixed-header');
			document.body.style.paddingTop = `${headerHeight}px`;

			swapLogoAttributes(logo, {
				'src': newLogoSrc,
				'srcset': newLogoSrc,
				'width': 75,
				'height': 80,
			});

		} else {
			document.body.classList.remove('fixed-header');
			document.body.style.paddingTop = 0;

			swapLogoAttributes(logo, {
				'src': initialLogoSrc,
				'srcset': initialLogoSrc,
				'width': 360,
				'height': 166,
			});

		}
	}

	window.addEventListener('scroll', fixHeader);

})(document, jQuery);
