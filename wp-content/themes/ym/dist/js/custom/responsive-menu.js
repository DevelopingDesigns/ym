'use strict';

/**
 * This script adds the accessibility-ready responsive menu to the Genesis Sample theme.
 *
 * @package Genesis Sample\JS
 * @author StudioPress
 * @license GPL-2.0+
 */

(function (document, $, undefined) {

	$('body').addClass('js');

	'use strict';

	var genesisSample = {},
	    mainMenuButtonClass = 'menu-toggle',
	    subMenuButtonClass = 'sub-menu-toggle';

	genesisSample.init = function () {
		var toggleButtons = {
			menu: $('<button />', {
				'class': mainMenuButtonClass,
				'aria-expanded': false,
				'aria-pressed': false,
				'role': 'button'
			}).append(genesisSample.params.mainMenu),
			submenu: $('<button />', {
				'class': subMenuButtonClass,
				'aria-expanded': false,
				'aria-pressed': false,
				'role': 'button'
			}).append($('<span />', {
				'class': 'screen-reader-text',
				text: genesisSample.params.subMenu
			}))
		};
		if ($('.nav-primary').length > 0) {
			$('.nav-primary').before(toggleButtons.menu); // Add the main nav buttons.
		} else {
			$('.nav-header').before(toggleButtons.menu);
		}
		$('nav .sub-menu').before(toggleButtons.submenu); // Add the submenu nav buttons.
		$('.' + mainMenuButtonClass).each(_addClassID);
		$('.' + mainMenuButtonClass).addClass('dashicons-before dashicons-menu');
		$('.' + subMenuButtonClass).addClass('dashicons-before dashicons-arrow-down');
		$(window).on('resize.genesisSample', _doResize).triggerHandler('resize.genesisSample');
		$('.' + mainMenuButtonClass).on('click.genesisSample-mainbutton', _mainmenuToggle);
		$('.' + subMenuButtonClass).on('click.genesisSample-subbutton', _submenuToggle);
	};

	// Add nav class and ID to related button.
	function _addClassID() {
		var $this = $(this),
		    nav = $this.next('nav'),
		    id = 'class';
		if ($(nav).attr('id')) {
			id = 'id';
		}
		$this.attr('id', 'mobile-' + $(nav).attr(id));
	}

	// Check CSS rule to determine width.
	function _combineMenus() {
		if ($('.js nav').css('position') == 'relative' && $('.nav-primary').length > 0) {
			// Depends on .js nav having position: relative; in style.css.
			$('.nav-header .menu > li').addClass('moved-item'); // Tag moved items so we can move them back.
			$('.nav-header .menu > li').prependTo('.nav-primary ul.genesis-nav-menu');
			$('.nav-header').hide();
		} else if ($('.js nav').css('position') !== 'relative' && $('.nav-primary').length > 0) {
			$('.nav-header').show();
			$('.nav-primary ul.genesis-nav-menu > li.moved-item').appendTo('.nav-header .menu');
			$('.nav-header .menu > li').removeClass('moved-item');
		}
	}

	// Change Skiplinks and Superfish.
	function _doResize() {
		var buttons = $('button[id^="mobile-"]').attr('id');
		if (typeof buttons === 'undefined') {
			return;
		}
		_superfishToggle(buttons);
		_changeSkipLink(buttons);
		_maybeClose(buttons);
	}

	/**
  * Action to happen when the main menu button is clicked.
  */
	function _mainmenuToggle() {
		var $this = $(this);
		_toggleAria($this, 'aria-pressed');
		_toggleAria($this, 'aria-expanded');
		$this.toggleClass('activated');
		$this.next('nav, .sub-menu').slideToggle('fast');
	}

	/**
  * Action for submenu toggles.
  */
	function _submenuToggle() {

		var $this = $(this),
		    others = $this.closest('.menu-item').siblings();
		_toggleAria($this, 'aria-pressed');
		_toggleAria($this, 'aria-expanded');
		$this.toggleClass('activated');
		$this.next('.sub-menu').slideToggle('fast');

		others.find('.' + subMenuButtonClass).removeClass('activated').attr('aria-pressed', 'false');
		others.find('.sub-menu').slideUp('fast');
	}

	/**
  * Activate/deactivate superfish.
  */
	function _superfishToggle(buttons) {
		if (typeof $('.js-superfish').superfish !== 'function') {
			return;
		}
		if ('none' === _getDisplayValue(buttons)) {
			$('.js-superfish').superfish({
				'delay': 100,
				'animation': { 'opacity': 'show', 'height': 'show' },
				'dropShadows': false
			});
		} else {
			$('.js-superfish').superfish('destroy');
		}
	}

	/**
  * Modify skip links to match mobile buttons.
  */
	function _changeSkipLink(buttons) {
		var startLink = 'genesis-nav',
		    endLink = 'mobile-genesis-nav';
		if ('none' === _getDisplayValue(buttons)) {
			startLink = 'mobile-genesis-nav';
			endLink = 'genesis-nav';
		}
		$('.genesis-skip-link a[href^="#' + startLink + '"]').each(function () {
			var link = $(this).attr('href');
			link = link.replace(startLink, endLink);
			$(this).attr('href', link);
		});
	}

	function _maybeClose(buttons) {
		if ('none' !== _getDisplayValue(buttons)) {
			return;
		}
		$('.menu-toggle, .sub-menu-toggle').removeClass('activated').attr('aria-expanded', false).attr('aria-pressed', false);
		$('nav, .sub-menu').attr('style', '');
	}

	/**
  * Generic function to get the display value of an element.
  * @param  {id} $id ID to check
  * @return {string}     CSS value of display property
  */
	function _getDisplayValue($id) {
		var element = document.getElementById($id),
		    style = window.getComputedStyle(element);
		return style.getPropertyValue('display');
	}

	/**
  * Toggle aria attributes.
  * @param  {button} $this     passed through
  * @param  {aria-xx} attribute aria attribute to toggle
  * @return {bool}           from _ariaReturn
  */
	function _toggleAria($this, attribute) {
		$this.attr(attribute, function (index, value) {
			return 'false' === value;
		});
	}

	$(document).ready(function () {

		// Run test on initial page load.
		_combineMenus();

		// Run test on resize of the window.
		$(window).resize(_combineMenus);

		genesisSample.params = typeof ymL10n === 'undefined' ? '' : ymL10n;

		if (typeof genesisSample.params !== 'undefined') {
			genesisSample.init();
		}
	});
})(document, jQuery);