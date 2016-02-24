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
