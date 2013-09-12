=== Expando Button Wordpress Plugin ===

Contributors: james@james.mn
Donate link:
Tags: button, expandable, widget, accordion
Requires at least: 3.5
Tested up to: 3.6.1
Stable tag: 1.0
License: GPL v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Expando Button is a simple expanding button that shows/hides more text or an image when users interact with it.

== Description ==

Expando Button is a simple expanding button widget.

It allows users to:

 - create a button

 - give it a link

 - include additional image or text

The additional image/text that will reveal itself when a user interacts with the button.

After a short timeout, the button hides the expanded information, and returns to normal button state.

Formatting is minimal, but the widget includes several CSS classes so that theme developers can customize the look of their buttons.

== Frequently Asked Questions ==

== Upgrade Notice ==

== Installation ==

1. Navigate to the "Add New" Plugin Dashboard
1. Select `expando-button-widget.zip` from your computer
1. Upload
1. Activate the Plugin on the WordPress Plugin Dashboard

== Frequently Asked Questions ==

== Screenshots ==

1. Expando Button settings.

2. Pick an image using the WordPress Media picker, or supply an external URL.

3. Sample button, when closed.

4. Button when expando'd

== CSS Hooks for Styling ==

= Button Container =

`.expando-button-widget {
  /* CSS for the whole widget */
}`

= Button Name =

`.expando-button-widget-header {
  /* Styles for the button name */
}`

= Button Body =

This is the part that shows/hides depending on user interaction.

`.expando-button-widget-body {
  /* Styles for the part of the expando-button that hides/reveals */
}`

= Button Image =

`.expando-button-widget-body img {
  /* Styles for image */
}`

= Button Body Text =

`.expando-button-widget-more-text {
  /* Styles for text below the image */
}`

= Button is closed =

`.expando-button-widget.is-closed {
  /* Styles for when the button is closed */
}`

= Just a button (no contents) =

`.expando-button-widget.is-empty {
  /* Styles for when the button doesn't contain any image or text */
}`


== Changelog ==

= 1.0 =
Initial Release
