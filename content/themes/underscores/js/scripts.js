jQuery(document).ready(function($) {

/**
 * FlexSlider
 *
 * @link https://www.woothemes.com/flexslider/
 */

  $('.slider').flexslider({
    namespace: "slider-",
    selector: ".slides > *",
    smoothHeight: true,
    prevText: "<span>Previous</span>",
    nextText: "<span>Next</span>",
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

  $('section').onScreen({
    doIn: function() {
      $('#site-navigation a[href="#' + $(this).attr('id') + '"]').parent().addClass('current-menu-item');
    },
    doOut: function() {
      $('#site-navigation a[href="#' + $(this).attr('id') + '"]').parent().removeClass('current-menu-item');
    },
  });

  $(window).load(function() {

    $('#services article').css('opacity', 0).onScreen({
      tolerance: 200,
      doIn: function() {
        $(this).addClass("animated fadeInUp").css('opacity', 1);
      },
    });

    $('.credentials.section li').css('opacity', 0).onScreen({
      tolerance: 200,
      doIn: function() {
        $(this).addClass("animated zoomIn").css('opacity', 1);
      },
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

  if ( !Modernizr.objectfit) {
    $('.featured.section img').each(function () {
      // if ($(this).css('object-fit')) {
        $(this)
          .closest('.entry-image')
          .css('opacity',0)
          .closest('article')
          .css({
            'backgroundImage' :'url(' + $(this).prop('src') + ')',
            'backgroundSize' : $(this).css('object-fit'),
            'backgroundPosition' : $(this).css('object-position'),
            'backgroundRepeat' : 'no-repeat',
          });
      // }
    });
    $('.featured.section video').each(function () {
      // if ($(this).css('object-fit')) {
        $(this)
          .closest('.entry-video')
          .css('opacity',0)
          .closest('article')
          .css({
            'backgroundImage' :'url(' + $(this).prop('poster') + ')',
            'backgroundSize' : $(this).css('object-fit'),
            'backgroundPosition' : $(this).css('object-position'),
            'backgroundRepeat' : 'no-repeat',
          });
      // }
    });
  }

/**
* skrollr
*
* @link https://github.com/Prinzhorn/skrollr
*/

  var setSkrollr = function($element, data) {
    for (var i = 0, l = data.length; i < l; i++) {
      var d = data[i],
          keyframe = d[0];
          css = d[1];
      $element.attr('data-' + keyframe, css);
    }
  }

  $('.featured.section').each(function () {
    setSkrollr($(this), [['top', 'max-height:' + $(this).height() + 'px'], ['top-bottom', 'max-height:0']]);
    // setSkrollr($(this), [['top', 'max-height:' + ($(this).height()) + 'px;transform:translateY(0px);'], ['top-bottom', 'max-height:0;transform:translateY(' + ($(this).height()) + 'px);']]);
  });

  var s = skrollr.init({
    forceHeight: false,
    smoothScrolling: false,
  });

});

// Document ready
$(function() {});
