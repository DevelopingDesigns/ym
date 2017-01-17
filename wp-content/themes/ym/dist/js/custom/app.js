'use strict';

///**
// * Fixed Header/Logo swap
// */
//(function (document, $, undefined) {
//
//  const logo = document.querySelector('.custom-logo');
//  const initialLogoSrc = logo.srcset;
//  const newLogoSrc = '/wp-content/themes/ym/dist/images/small-logo.svg';
//
//  function scrollHandler () {
//    let distanceY = window.pageYOffset;
//    const header = document.querySelector('.site-header');
//    const shrinkOn = document.querySelector('.before-header').clientHeight;
//
//    if (distanceY > shrinkOn) {
//      document.body.classList.add('fixed-header');
//      swapLogoAttributes(logo, {
//        'src': newLogoSrc,
//        'srcset': newLogoSrc,
//        'width': 75,
//        'height': 80,
//      });
//    } else {
//      document.body.classList.remove('fixed-header');
//      swapLogoAttributes(logo, {
//        'src': initialLogoSrc,
//        'srcset': initialLogoSrc,
//        'width': 360,
//        'height': 166,
//      });
//    }
//  }
//
//  function swapLogoAttributes (element, attributes) {
//    for (let key in attributes) {
//      element.setAttribute(key, attributes[key]);
//    }
//  }
//
//  window.addEventListener('scroll', scrollHandler);
//
//})(document, jQuery);

/**
 * Fixed Header/Logo swap
 */
(function (document, $, undefined) {
  var beforeHeader = document.querySelector('.before-header');

  var logo = document.querySelector('.custom-logo');
  var logoTop = logo.offsetTop;

  var initialLogoSrc = logo.src;
  var newLogoSrc = '/wp-content/themes/ym/dist/images/small-logo.svg';

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

  function fixHeader() {
    var adminBar = document.querySelector('#wpadminbar');
    var header = document.querySelector('.site-header');

    var topOfBeforeHeader = beforeHeader.clientHeight;
    var headerHeight = header.clientHeight;

    if (window.scrollY > topOfBeforeHeader && window.innerWidth > 1200 && beforeHeader !== 'block') {
      if (typeof adminBar !== 'undefined' && adminBar != null) {
        header.style.top = adminBar.clientHeight + 'px';
      }

      document.body.classList.add('fixed-header');
      document.body.style.paddingTop = headerHeight + 'px';
      document.querySelector('.custom-logo').setAttribute('src', newLogoSrc);
    }

    if (window.scrollY <= topOfBeforeHeader && window.innerWidth > 1200 && beforeHeader !== 'block') {
      document.body.classList.remove('fixed-header');
      document.body.style.paddingTop = 0;
      document.querySelector('.custom-logo').setAttribute('src', initialLogoSrc);
    }

    if (beforeHeader.style.display === 'none' && window.scrollY >= 10) {
      smallScreenHeader();
      window.onresize = function () {
        smallScreenHeader();
      };
    }
  }

  function smallScreenHeader() {
    if (window.scrollY >= 10) {
      document.querySelector('.custom-logo').setAttribute('src', newLogoSrc);
      document.body.classList.add('fixed-header');
    } else {
      document.body.classList.remove('fixed-header');
      document.querySelector('.custom-logo').setAttribute('src', initialLogoSrc);
    }
  }

  smallScreenHeader();
  window.addEventListener('scroll', fixHeader);
})(document, jQuery);