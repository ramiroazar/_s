/*
Replace URL
[{domain}] = localhost/underscores
Replace Date
[{date}] = 2016-01-01 08:30:00
Replace Theme Name
[{theme}] = underscores
*/

--
-- Delete Comment Content Metadata
--

DELETE FROM wp_commentmeta;

--
-- Delete Comment Content
--

DELETE FROM wp_comments;

--
-- Delete Content Metadata
--

DELETE FROM wp_postmeta;

--
-- Generate Post Content Metadata
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 1, '_form', '<label for="contact-form-primary-name">Name</label>\n[text* name id:contact-form-primary-name placeholder "Name"]\n\n<label for="contact-form-primary-email">Email</label>\n[email* email id:contact-form-primary-email placeholder "Email"]\n\n[honeypot email-confirm id:contact-form-primary-email-confirm]\n\n<label for="contact-form-primary-phone">Phone</label>\n[tel phone id:contact-form-primary-phone placeholder "Phone"]\n\n<label for="contact-form-primary-message">Message</label>\n[textarea message id:contact-form-primary-message placeholder "Message"]\n\n<label for="contact-form-primary-validation">Validation</label>\n<div class="form-validation">\n	[captchac validation fg:#000 bg:#fff size:l]\n	[captchar validation id:contact-form-primary-validation]\n</div>\n\n[submit class:button "Submit"]'),
(2, 1, '_mail', 'a:8:{s:7:"subject";s:14:"Online Enquiry";s:6:"sender";s:16:"[name] <[email]>";s:4:"body";s:78:"<b>From:</b> [name] <[email]>\n<b>Phone:</b> [phone]\n\n<b>Message:</b> [message]";s:9:"recipient";s:0:"";s:18:"additional_headers";s:0:"";s:11:"attachments";s:0:"";s:8:"use_html";b:1;s:13:"exclude_blank";b:0;}'),
(3, 1, '_mail_2', 'a:9:{s:6:"active";b:0;s:7:"subject";s:14:"[your-subject]";s:6:"sender";s:26:"[your-name] <[your-email]>";s:4:"body";s:111:"Message Body:\n[your-message]\n\n--\nThis e-mail was sent from a contact form in your website";s:9:"recipient";s:12:"[your-email]";s:18:"additional_headers";s:0:"";s:11:"attachments";s:0:"";s:8:"use_html";b:0;s:13:"exclude_blank";b:0;}'),
(4, 1, '_messages', 'a:23:{s:12:"mail_sent_ok";s:43:"Your message was sent successfully. Thanks.";s:12:"mail_sent_ng";s:93:"Failed to send your message. Please try later or contact the administrator by another method.";s:16:"validation_error";s:74:"Validation errors occurred. Please confirm the fields and submit it again.";s:4:"spam";s:93:"Failed to send your message. Please try later or contact the administrator by another method.";s:12:"accept_terms";s:35:"Please accept the terms to proceed.";s:16:"invalid_required";s:31:"Please fill the required field.";s:17:"captcha_not_match";s:31:"Your entered code is incorrect.";s:14:"invalid_number";s:28:"Number format seems invalid.";s:16:"number_too_small";s:25:"This number is too small.";s:16:"number_too_large";s:25:"This number is too large.";s:13:"invalid_email";s:28:"Email address seems invalid.";s:11:"invalid_url";s:18:"URL seems invalid.";s:11:"invalid_tel";s:31:"Telephone number seems invalid.";s:23:"quiz_answer_not_correct";s:27:"Your answer is not correct.";s:12:"invalid_date";s:26:"Date format seems invalid.";s:14:"date_too_early";s:23:"This date is too early.";s:13:"date_too_late";s:22:"This date is too late.";s:13:"upload_failed";s:22:"Failed to upload file.";s:24:"upload_file_type_invalid";s:30:"This file type is not allowed.";s:21:"upload_file_too_large";s:23:"This file is too large.";s:23:"upload_failed_php_error";s:38:"Failed to upload file. Error occurred.";s:16:"invalid_too_long";s:23:"This input is too long.";s:17:"invalid_too_short";s:24:"This input is too short.";}'),
(5, 1, '_additional_settings', '');

--
-- Delete Post Content
--

DELETE FROM wp_posts;

--
-- Generate Content
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '[{date}]', '[{date}]', '<label for="contact-form-primary-name">Name</label>\r\n[text* name id:contact-form-primary-name placeholder "Name"]\r\n\r\n<label for="contact-form-primary-email">Email</label>\r\n[email* email id:contact-form-primary-email placeholder "Email"]\r\n\r\n[honeypot email-confirm id:contact-form-primary-email-confirm]\r\n\r\n<label for="contact-form-primary-phone">Phone</label>\r\n[tel phone id:contact-form-primary-phone placeholder "Phone"]\r\n\r\n<label for="contact-form-primary-message">Message</label>\r\n[textarea message id:contact-form-primary-message placeholder "Message"]\r\n\r\n<label for="contact-form-primary-validation">Validation</label>\r\n<div class="form-validation">\r\n	[captchac validation fg:#000 bg:#fff size:l]\r\n	[captchar validation id:contact-form-primary-validation]\r\n</div>\r\n\r\n[submit class:button "Submit"]\nOnline Enquiry\n[name] <[email]>\n<b>From:</b> [name] <[email]>\r\n<b>Phone:</b> [phone]\r\n\r\n<b>Message:</b> [message]\n\n\n\n1\n\n\n[your-subject]\n[your-name] <[your-email]>\nMessage Body:\r\n[your-message]\r\n\r\n--\r\nThis e-mail was sent from a contact form in your website\n[your-email]\n\n\n\n\nYour message was sent successfully. Thanks.\nFailed to send your message. Please try later or contact the administrator by another method.\nValidation errors occurred. Please confirm the fields and submit it again.\nFailed to send your message. Please try later or contact the administrator by another method.\nPlease accept the terms to proceed.\nPlease fill the required field.\nYour entered code is incorrect.\nNumber format seems invalid.\nThis number is too small.\nThis number is too large.\nEmail address seems invalid.\nURL seems invalid.\nTelephone number seems invalid.\nYour answer is not correct.\nDate format seems invalid.\nThis date is too early.\nThis date is too late.\nFailed to upload file.\nThis file type is not allowed.\nThis file is too large.\nFailed to upload file. Error occurred.\nThis input is too long.\nThis input is too short.', 'Contact Form (Primary)', '', 'publish', 'open', 'open', '', 'contact-form-primary', '', '', '2015-03-07 07:18:57', '2015-03-07 07:18:57', '', 0, 'http://[{domain}]/?post_type=wpcf7_contact_form&#038;p=1', 0, 'wpcf7_contact_form', '', 0),
(2, 1, '[{date}]', '[{date}]', '', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '[{date}]', '[{date}]', '', 0, 'http://[{domain}]/?page_id=2', 0, 'page', '', 0);

--
-- Set Options
--

UPDATE wp_options
SET option_value = CASE option_name
	WHEN 'siteurl' THEN 'http://[{domain}]/wp'
	WHEN 'home' THEN 'http://[{domain}]'
	WHEN 'default_comment_status' THEN 'closed'
	WHEN 'comment_registration' THEN 1
	WHEN 'permalink_structure' THEN '/%postname%/'
	WHEN 'active_plugins' THEN 'a:3:{i:0;s:36:"contact-form-7-honeypot/honeypot.php";i:1;s:36:"contact-form-7/wp-contact-form-7.php";i:2;s:47:"really-simple-captcha/really-simple-captcha.php";}'
	WHEN 'template' THEN '_s'
	WHEN 'stylesheet' THEN '[{theme}]'
	WHEN 'uploads_use_yearmonth_folders' THEN 0
	WHEN 'show_on_front' THEN 'page'
	WHEN 'page_on_front' THEN 2
END
WHERE option_name IN (
	'siteurl',
	'home',
	'default_comment_status',
	'comment_registration',
	'permalink_structure',
	'active_plugins',
	'template',
	'stylesheet',
	'uploads_use_yearmonth_folders',
	'show_on_front',
	'page_on_front'
)
