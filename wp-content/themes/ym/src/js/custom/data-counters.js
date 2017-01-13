/**
 * Number Counters for /partials/data-content-block.php
 */
(function (document, $, undefined) {

	/*! countUp.js v1.7.1 | https://inorganik.github.io/countUp.js/ */
	const countUpAnimation = (function () {

		const easingFn = function (t, b, c, d) {
			var ts = (t /= d) * t;
			var tc = ts * t;
			return b + c * (tc + -3 * ts + 3 * t);
		};

		const options = {
			useEasing  : true,
			easingFn   : easingFn,
			useGrouping: true,
			separator  : '',
			decimal    : '',
			prefix     : '',
			suffix     : ''
		};


		const startCount = function (counters) {
			const counters = document.querySelectorAll('[data-count]');

			forEach(counters, (value, index) => {
				let endValue = value.innerText;

				if (endValue.length !== '0') {
					let queueCountAnimation = new CountUp(value, 0, endValue, 0, 3.5, options);
					queueCountAnimation.start();
				}
			});
		};

		return {
			startCount: startCount
		};

	})();

	/**
	 * Instantiate startCount() when counters enters into viewport
	 * @link https://github.com/imakewebthings/waypoints
	 * @type {Element}
	 */
	const counters = document.getElementById('counters');

	const waypoint = new Waypoint({
		element: counters,
		handler: blowjobsAreGreat,
		offset : '50%'
	});

	function blowjobsAreGreat(scrollDirection) {
		if ('up' || 'down' !== scrollDirection) {
			countUpAnimation.startCount();
		}
	}

})(document, jQuery);

