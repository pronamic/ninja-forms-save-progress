=== Ninja Forms - Save Progress ===
Contributors: kbjohnson90, jmcelhaney
Donate link: http://ninjaforms.com
Tags: form, forms
Requires at least: 5.4
Tested up to: 5.6
Stable tag: 3.0.26

License: GPLv2 or later

== Description ==

Sometimes forms can grow quite large, and it would be very helpful for users to be able to save their progress and come back at a later time. This extension does just that for you. Using the built-in WordPress user system, visitors can register as a subscriber and save what they have entered. They can then return later to complete the form. The administrator can view and edit partially filled out forms at anytime from the admin.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the `ninja-forms-save-progress` directory to your `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Use ==

For help and video tutorials, please visit our website: [NinjaForms.com](http://ninjaforms.com)

== Upgrade Notice ==
= 3.0.27 (8 February 2023)
*Bug Fixes:*
- Update script registration to remove moment.js

*Other:*
- Centralize automated build and testing

= 3.0.26 (11 January 2023) =

*Bugs:*
  - Ensure register_rest_route is called such that it prevents PHP notice
  - Prevent 'optional parameter' warning in PHP 8

*Other:*
* Automate testing and build

== Changelog ==

= 3.0.26 (11 January 2023) =

*Bugs:*
  - Ensure register_rest_route is called such that it prevents PHP notice
  - Prevent 'optional parameter' warning in PHP 8

*Other:*
* Automate testing and build

= 3.0.25 (25 January 2021) =

*Bugs:*

* Resolved an issue that was sometimes causing saves to not be properly deleted after form submission.

= 3.0.24.2 (13 March 2020) =

*Security:*

* Patched an Auth Bypass vulnerability associated with saved form data.
* Thanks again to Timothy B Jacobs for pointing this out!

= 3.0.24.1 (27 January 2020) =

*Security:*

* Patched SQL Injection and Auth Bypass vulnerabilities associated with saved form data.
* Patched an XSS vulnerability in the admin save viewer.
* Many thanks to Timothy B Jacobs for practicing responsible disclosure!

= 3.0.24 (12 November 2019) =

*Bugs:*

* Resolved an issue that sometimes prevented loading a save when multiple saves were enabled on a form.

= 3.0.23 (12 August 2019) =

*Bugs:*

* Corrected an issue that was causing some actions to fire improperly on save.

= 3.0.22 (24 July 2019) =

*Bugs:*

* The save table should no longer display on form load when there are no saves.

= 3.0.21 (12 June 2019) =

*Bugs:*

* Resolved an issue that rarely caused an undefined index warning when the save button is clicked.

= 3.0.20 (16 May 2019) =

*Bugs:*

* Save Progress should now work properly when there are multiple instances of a form on the page.

= 3.0.19 (2 April 2019) =

*Bugs:*

* Resolved an issue that sometimes caused an undefined index warning to appear on form load.

= 3.0.18 (11 January 2019) =

*Bugs:*

* Resolved an issue that was preventing the Stripe action from loading on forms where Save Progress was enabled.

= 3.0.17 (30 November 2018) =

*Bugs:*

* Fixed issue where making changes in the form builder sometimes caused form publish to fail.

= 3.0.16 (24 August 2018) =

*Bugs:*

* Resolved an issue that was preventing saved states from loading properly in Internet Explorer.

= 3.0.15 (4 June 2018) =

*Bugs:*

* Resolved an issue that sometimes caused the dashboard to not display any forms.
* Styling of the save table options in the form builder should now match similar settings.

= 3.0.14 (8 May 2018) =

*Bugs:*

* Updating the required status of a field in the form builder should now be reflected in saves.
* Updating the file type restrictions of file uploads fields in the form builder should now be reflected in saves.

= 3.0.13 (5 April 2018) =

*Bugs:*

* Save data should no longer be removed when a submission fails.

= 3.0.12 (26 March 2018) =

*Bugs:*

* Local browser storage should now save a drastically increased number of values.

= 3.0.11 (17 January 2018) =

*Bugs:*

* Table editor fields should now be saved properly.

= 3.0.10 (14 December 2017) =

*Bugs:*

* Fixed an issue that was causing CSS stylesheets to be loaded unnecessarily on all pages.
* Save times should now display accurately in the save table instead of showing the time of last save for all records.

= 3.0.9 (13 October 2017) =

*Bugs:*

* Saves should be faster now.
* File Upload fields should now save properly.

= 3.0.8 (26 September 2017) =

*Bugs:*

* Fixed a bug with missing a missing nonce causing saves to not load.

= 3.0.7 (20 September 2017) =

*Bugs:*

* Fixed a bug with an array item being accessed before being checked.
* Fixed a compatibility bug with the Table Editor add-on which created circular JSON.
* Fixed a compatibility bug with the File Uploads add-on which was saving upload nonce values.

= 3.0.6 (13 September 2017) =

*Changes:*

* Added hooks after a save is updated or created.
* Removed Layout & Styles data from the saved data.
* Added filters for inserting, updating, and getting saves.
* Added query support for strings when getting saves with a where specified.

= 3.0.5 (22 August 2017) =

*Bugs:*

* Fixed a bug that could cause an error when Ninja Forms was not active.
* Fixed a bug that caused the Save Button to show to non-authenticated users.

= 3.0.4 (02 August 2017) =

*Bugs:*

* Fixed a bug that could cause multiple saves when using Multi-Part Forms.
* Improved processing time for saving forms.

= 3.0.3 (13 July 2017) =

*Bugs:*

* Fixed an issue with missing JS files in previous version.

= 3.0.2 (06 July 2017) =

*Bugs:*

* Fixed a bug that created multiple saves when a form contained multiple save buttons.
* Licensing and updating should now work properly.

= 3.0.1 (23 May 2017) =

*Bugs:*

* Fixed a file name reference that could cause a fatal error on some server configurations.

= 3.0.0 =

* Initial release
