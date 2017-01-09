/**
 * Number Counters for /partials/data-content-block.php
 */
(function (document, $, undefined) {

	/*! countUp.js v1.7.1 | https://inorganik.github.io/countUp.js/ */
	var countUpAnimation = (function () {

		var easingFn = function (t, b, c, d) {
			var ts = (t /= d) * t;
			var tc = ts * t;
			return b + c * (tc + -3 * ts + 3 * t);
		};

		var options = {
			useEasing  : true,
			easingFn   : easingFn,
			useGrouping: true,
			separator  : '',
			decimal    : '',
			prefix     : '',
			suffix     : ''
		};

		var _counterList = document.querySelectorAll('[data-count]');

		var startCount = function () {

			forEach(_counterList, function (value, index) {
				var endValue = value.innerText;

				var queueCountAnimation = new CountUp(value, 0, endValue, 0, 3.5, options);
				queueCountAnimation.start();

			});
		};

		return {
			startCount: startCount
		};


	})();



	// https://github.com/imakewebthings/waypoints
	var counters = document.getElementById('counters');

	if (counters)
		var waypoint = new Waypoint({
			element: counters,
			handler: function (direction) {
				if (direction === 'down') {
					countUpAnimation.startCount();
				} else {
					countUpAnimation.startCount();
				}
			},
			offset : '50%'
		});

})(document, jQuery);

