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
 * Odometer
 *
 * @link http://github.hubspot.com/odometer/
 */

  setTimeout(function(){
    $('.odometer').html(100000);
  });

/**
 * onScreen
 *
 * @link http://silvestreh.github.io/onScreen/
 */

  $('#masthead').headroom();

  // $(window).scroll(function() {
  //   $('section').each(function() {
  //       if ( $(window).scrollTop() >= $(this).offset().top ) {
  //         $('#site-navigation a[href*=#]').parent().removeClass('current-menu-item');
  //         $('#site-navigation a[href=#' + $(this).attr('id') + ']').parent().addClass('current-menu-item');
  //       }
  //   });
  // });


  $('section').onScreen({
    doIn: function() {
      $('#site-navigation a[href=#' + $(this).attr('id') + ']').parent().addClass('current-menu-item');
    },
    doOut: function() {
      $('#site-navigation a[href=#' + $(this).attr('id') + ']').parent().removeClass('current-menu-item');
    },
  });

});

// Document ready
$(function() {});
