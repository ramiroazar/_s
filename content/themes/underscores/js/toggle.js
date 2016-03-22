/**
 * togglePressed() toggles the aria-pressed atribute between true or false
 *
 * @link https://www.w3.org/WAI/GL/wiki/Using_WAI-ARIA_state_and_property_attributes_to_expose_the_state_of_a_user_interface_component#Example_1:_A_toggle_button
 *
 * @param ( id object) button to be operated on
 *
 * @return N/A
 */

function togglePressed(id) {

	// reverse the aria-pressed state
	if ($(id).attr('aria-pressed') == 'true') {
		$(id).attr('aria-pressed', 'false');
	}
	else {
		$(id).attr('aria-pressed', 'true');
	}
}

$('.toggle').each(function() {

	// get defined target
	var target_defined = $(this).data('target');

	// define common ancestor
	var ancestor = $(this).parents().has(target_defined).first();

	// redefine target
	var target_redefined = ancestor.find(target_defined);

	// hide target
	target_redefined.addClass("toggled");

	$(this).click(function() {

		// reverse the aria-pressed state
		togglePressed($(this));

		// toggle target
	  $(target_redefined).toggleClass("toggled");

	});

});
