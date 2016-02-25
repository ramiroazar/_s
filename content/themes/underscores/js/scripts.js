/**
 * FlexSlider
 *
 * @link https://www.woothemes.com/flexslider/
 */

 jQuery(document).ready(function($) {
  $('.slider').flexslider({
    namespace: "slider-",
    selector: ".slides > *",
    smoothHeight: true,
    prevText: "<span>Previous</span>",
    nextText: "<span>Next</span>",
  });
});

/**
 * Tab Panel
 *
 * @link http://oaa-accessibility.org/examplep/tabpanel1/
 */

jQuery(document).ready(function() {
  var panel1 = new tabpanel("tabs", false);
});

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
