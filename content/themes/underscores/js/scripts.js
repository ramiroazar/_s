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
