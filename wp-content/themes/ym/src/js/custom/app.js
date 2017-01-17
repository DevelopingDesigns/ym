// /**
// * Fixed Header/Logo swap
// */
// (function (document, $, undefined) {
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
// })(document, jQuery);

/**
 * Fixed Header/Logo swap
 */
(function (document, $, undefined) {
  const beforeHeader = document.querySelector('.before-header')

  const logo = document.querySelector('.custom-logo')
  let logoTop = logo.offsetTop

  const initialLogoSrc = logo.src
  const newLogoSrc = '/wp-content/themes/ym/dist/images/small-logo.svg'

  function debounce (func, wait = 5, immediate = true) {
    let timeout
    return function () {
      let context = this, args = arguments
      let later = function () {
        timeout = null
        if (!immediate) func.apply(context, args)
      }
      let callNow = immediate && !timeout

      clearTimeout(timeout)
      timeout = setTimeout(later, wait)
      if (callNow) func.apply(context, args)
    }
  }

  function fixHeader () {
    const adminBar = document.querySelector('#wpadminbar')
    const header = document.querySelector('.site-header')

    let topOfBeforeHeader = beforeHeader.clientHeight
    let headerHeight = header.clientHeight

    if (window.scrollY > topOfBeforeHeader && window.innerWidth > 1200 && beforeHeader !== 'block') {
      if (typeof (adminBar) !== 'undefined' && adminBar != null) {
        header.style.top = `${adminBar.clientHeight}px`
      }

      document.body.classList.add('fixed-header')
      document.body.style.paddingTop = `${headerHeight}px`
      document.querySelector('.custom-logo').setAttribute('src', newLogoSrc)
    }

    if (window.scrollY <= topOfBeforeHeader && window.innerWidth > 1200 && beforeHeader !== 'block') {
      document.body.classList.remove('fixed-header')
      document.body.style.paddingTop = 0
      document.querySelector('.custom-logo').setAttribute('src', initialLogoSrc)
    }

    if (beforeHeader.style.display === 'none' && window.scrollY >= 10) {
      smallScreenHeader()
      window.onresize = function () {
        smallScreenHeader()
      }
    }
  }

  function smallScreenHeader () {
    if (window.scrollY >= 10) {
      document.querySelector('.custom-logo').setAttribute('src', newLogoSrc)
      document.body.classList.add('fixed-header')
    } else {
      document.body.classList.remove('fixed-header')
      document.querySelector('.custom-logo').setAttribute('src', initialLogoSrc)
    }
  }

  smallScreenHeader()
  window.addEventListener('scroll', fixHeader)
})(document, jQuery)
