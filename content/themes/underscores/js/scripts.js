jQuery(document).ready(function($) {

/**
 * FlexSlider
 *
 * @link https://www.woothemes.com/flexslider/
 */

  $('.slider').flexslider({
    namespace: "slider-",
    selector: ".slides > *",
    prevText: "<span>Previous</span>",
    nextText: "<span>Next</span>",
    animationLoop: false
  });

/**
 * Tab Panel
 *
 * @link http://oaa-accessibility.org/examplep/tabpanel1/
 */

 var tabs = new tabpanel("tabs", false);

/**
 * Magnific Popup
 *
 * @link http://dimsemenov.com/plugins/magnific-popup/documentation.html
 */

  $('.gallery').each(function() {
    $(this).magnificPopup({
      delegate: 'img',
      type: 'image',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
      },
      callbacks: {
        elementParse: function(item) {
          if (item.el.data('media-file')) {
            item.src = item.el.data('media-file');
          } else {
            item.src = item.el.attr('src');
          }
        }
      }
    });
  });

/**
 * Headroom.js
 *
 * @link https://github.com/WickyNilliams/headroom.js
 */

 $('#masthead').headroom();

/**
 * onScreen
 *
 * @link http://silvestreh.github.io/onScreen/
 */

  // Navigation

  $('section').onScreen({
    doIn: function() {
      $('#site-navigation a[href="#' + $(this).attr('id') + '"]').parent().addClass('current-menu-item');
    },
    doOut: function() {
      $('#site-navigation a[href="#' + $(this).attr('id') + '"]').parent().removeClass('current-menu-item');
    },
  });

  // Animation

  $(window).load(function() {
    $('*').each(function () {
      if ($(this).css('animation-duration') != '0s') {
        $(this).css('opacity', 0).onScreen({
          doIn: function() {
            $(this).addClass("animated").css('opacity', 1);
          },
        });
      }
    });
  });

/**
 * Odometer
 *
 * @link http://github.hubspot.com/odometer/
 */

  $('.odometer').each(function () {
    var value = $(this).html();
    $(this).html(0);
    $(this).onScreen({
      doIn: function() {
        $(this).html(value);
      },
      doOut: function() {
        // $(this).html(0);
      },
    });
  });

/**
* Modernizr
*
* @link https://modernizr.com/
*/

  // object-fit fallback

  function setCurrentSrc() {
    $('.entry-image img').each(function () {
      if ($(this).css('object-fit') == 'cover') {
        $(this)
          .css('opacity',0)
          .closest('article')
          .css({
            'backgroundImage' :'url(' + this.currentSrc + ')',
            'backgroundSize' : $(this).css('object-fit'),
            'backgroundPosition' : $(this).css('object-position'),
            'backgroundRepeat' : 'no-repeat',
          });
      }
    });
  }

  setCurrentSrc();

  $(window).resize(function () {
    setCurrentSrc();
  });

  if (!Modernizr.objectfit) {

    $('.entry-video video').each(function () {
      if ($(this).css('object-fit') == 'cover') {
        $(this).closest('.entry-video').css('opacity',0);
      }
    });
  }

/**
* Viewport Units Buggyfill
*
* @link https://github.com/rodneyrehm/viewport-units-buggyfill
*/

  window.viewportUnitsBuggyfill.init();

});

// Document ready
$(function() {});
