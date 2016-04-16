<?php

add_filter( 'wpcf7_default_template', '_s_wpcf7_default_template', 10, 2 );

function _s_wpcf7_default_template( $template, $prop ) {
	if ( 'form' == $prop ) {
		$template = _s_form();
	} elseif ( 'mail' == $prop ) {
		$template = _s_mail();
	} elseif ( 'mail_2' == $prop ) {
		$template = WPCF7_ContactFormTemplate::mail_2();
	} elseif ( 'messages' == $prop ) {
		$template = WPCF7_ContactFormTemplate::messages();
	} else {
		$template = null;
	}

	return $template;
}

function _s_form() {
	$template =
		'<label for="contact-form-primary-name">' . __( 'Name', 'contact-form-7' )
		. ' ' . __( '(required)', 'contact-form-7' ) . '</label>' . "\n"
		. '[text* name id:contact-form-primary-name placeholder "Name"]' . "\n\n"
		. '<label for="contact-form-primary-email">' . __( 'Email', 'contact-form-7' )
		. ' ' . __( '(required)', 'contact-form-7' ) . '</label>' . "\n"
		. '[email* email id:contact-form-primary-email placeholder "Email"]' . "\n\n"
		. '[honeypot email-confirm id:contact-form-primary-email-confirm]' . "\n\n"
		. '<label for="contact-form-primary-phone">' . __( 'Phone', 'contact-form-7' )
		. ' ' . __( '(required)', 'contact-form-7' ) . '</label>' . "\n"
		. '[tel phone id:contact-form-primary-phone placeholder "Phone"]' . "\n\n"
		. '<label for="contact-form-primary-message">' . __( 'Message', 'contact-form-7' )
		. ' ' . __( '(required)', 'contact-form-7' ) . '</label>' . "\n"
		. '[textarea* message id:contact-form-primary-message placeholder "Message"]' . "\n\n"
		. '<label for="contact-form-primary-validation">' . __( 'Validation', 'contact-form-7' )
		. ' ' . __( '(required)', 'contact-form-7' ) . '</label>' . "\n"
		. '<div class="form-validation">' . "\n"
		. '	[captchac validation fg:#000 bg:#fff size:l]' . "\n"
		. '	[captchar validation id:contact-form-primary-validation]' . "\n"
		. '</div>' . "\n\n"
		. '[submit "' . __( 'Send', 'contact-form-7' ) . '"]';

	return $template;
}

function _s_mail() {
	$template = array(
		'subject' => sprintf(
			_x( '%1$s "%2$s"', 'mail subject', 'contact-form-7' ),
			get_bloginfo( 'name' ), 'Online Enquiry' ),
		'sender' => sprintf( '[name] <%s>', get_option( 'admin_email' ) ),
		'body' =>
			sprintf( __( 'From: %s', 'contact-form-7' ),
				'[name] <[email]>' ) . "\n"
			. sprintf( __( 'Phone: %s', 'contact-form-7' ),
				'[phone]' ) . "\n\n"
			. __( 'Message:', 'contact-form-7' )
				. "\n" . '[message]' . "\n\n",
		'recipient' => get_option( 'admin_email' ),
		'additional_headers' => 'Reply-To: [email]',
		'attachments' => '',
		'use_html' => 0,
		'exclude_blank' => 0 );

	return $template;
}

function _s_wpcf7_contact_form_default_pack_set_title( $template ) {
  $template->set_title( 'Contact form (Primary)' );
  return $template;
}
add_filter(
  'wpcf7_contact_form_default_pack',
  '_s_wpcf7_contact_form_default_pack_set_title'
);
