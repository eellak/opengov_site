=== cbnet Really Simple CAPTCHA Comments ===
Contributors: chipbennett
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QP3N9HUSYJPK6
Tags: cbnet, plugin, comments, CAPTCHA, Really Simple CAPTCHA
Requires at least: 3.1
Tested up to: 3.5
Stable tag: 2.1

Comment form CAPTCHA using  Really Simple CAPTCHA plugin. Proof-of-concept for other plugin developers.

== Description ==

This plugin adds a CAPTCHA field to your comment form, using the API provided by the Really Simple CAPTCHA Plugin to provide the CAPTCHA image and validation. The Plugin adds a CAPTCHA field to the comment-reply form, and uses AJAX to provide user feedback regarding correct/incorrect CAPTCHA entry. If the user submits the comment with an incorrect CAPTCHA, the comment is automatically marked as "spam". 

This Plugin <strong>requires</strong> the <a href="http://wordpress.org/extend/plugins/really-simple-captcha/">Really Simple CAPTCHA</a> Plugin to be installed in order to function.

This plugin is fully functional, but is mostly intended to be a "proof of concept" for other plugin developers who may want to use the Really Simple CAPTCHA plugin's API to provide CAPTCHA functionality for their own plugins. 

== Installation ==

Manual installation:

1. Upload the `cbnet-really-simple-captcha-comments` folder to the `/wp-content/plugins/` directory

Installation using "Add New Plugin"

1. Ensure the <a href="http://wordpress.org/extend/plugins/really-simple-captcha/">Really Simple CAPTCHA</a> Plugin is installed.
2. From your Admin UI (Dashboard), use the menu to select Plugins -> Add New
3. Search for 'cbnet Really Simple CAPTCHA Comments'
4. Click the 'Install' button to open the plugin's repository listing
5. Click the 'Install' button

Activiation and Use

**NOTE** You *must* Install and activate the <a href="http://wordpress.org/extend/plugins/really-simple-captcha/">Really Simple CAPTCHA</a> plugin in order for this plugin to work.

1. Activate the plugin through the 'Plugins' menu in WordPress
2. Configure Plugin settings via <strong>Dashboard -> Settings -> Discussion</strong>


== Frequently Asked Questions ==

= I activated the plugin, but don't see a CAPTCHA field in my comment form. What's going on? =

Make sure you have the <a href="http://wordpress.org/extend/plugins/really-simple-captcha/">Really Simple CAPTCHA</a> plugin installed and activated.

= What API settings can be configured? =

Refer to <strong>Dashboard -> Settings -> Discussion</strong> to configure Plugin settings:

`// Characters to use in CAPTCHA image.
$comment_captcha->chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';

// Number of characters in CAPTCHA image.
$comment_captcha->char_length = '4';

// Width/Height dimensions of CAPTCHA image.
$comment_captcha->img_size = array( '72', '24' );

// Font color of CAPTCHA characters, in RGB (0 - 255).
$comment_captcha->fg = array( '0', '0', '0' );

// Background color of CAPTCHA image, in RGB (0 - 255).
$comment_captcha->bg = array( '255', '255', '255' );

// Font Size of CAPTCHA characters.
$comment_captcha->font_size = '16';

// Width between CAPTCHA characters.
$comment_captcha->font_char_width = '15';

// CAPTCHA image type. Can be 'png', 'jpeg', or 'gif'
$comment_captcha->img_type = 'png';`

Note, the following API-configurable option is not exposed by the Plugin, but can be modified via filter:

`// oordinates for a text in an image.
$this->base = array( 6, 18 );`

= What other settings can be configured? =

`// Comment form CAPTCHA field label text
$comment_captcha_form_label = 'Anti-Spam:';`

= The CAPTCHA field doesn't look right in my comments form. How can I style it? =

The HTML output is wrapped in a paragraph tag, with class="comment-form-captcha".

== Screenshots ==

1. The default CAPTCHA field in action

== Changelog ==

= 2.1 (2012.12.20) =
* Made Plugin translation-ready
= 2.0 (2012.12.06] =
* Major update
* Updated code-base
* Added Plugin settings UI, via Dashboard -> Settings -> Discussion
* Added AJAX form feedback
= 1.0.3 [2011.03.26] =
* Bugfix.
* Fixes a minor bug with CAPTCHA generation.
= 1.0.2 [2010.12.13] =
* Bugfix.
* Fixes minor bug that caused $comment_data not to be returned for logged-in users.
= 1.0.1 [2010.08.23] =
* Minor Bugfix.
* Fixes minor bug that caused non-existent CAPTCHA to be checked for logged-in users.
= 1.0 =
* Initial Release

== Upgrade Notice ==

= 2.1 =
Made Plugin translation-ready
= 2.0 =
Major update. Plugin compatible with WordPress 3.5, added Plugin settings, added AJAX form feedback.
= 1.0.3 =
Fixes a minor bug with CAPTCHA generation.
= 1.0.2 =
Fixes bug that caused $comment_data not to be returned for logged-in users.
= 1.0.1 =
Fixes minor bug that caused non-existent CAPTCHA to be checked for logged-in users.
= 1.0 =
Initial Release.