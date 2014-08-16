### [Blank](http://www.schalkburger.za.net/free-blank-wordpress-theme/)

## 2.5 (16 August 2014)

* Major revamp and restructuring of Blank theme
* Created one main CSS file in /css that includes normalize.css
* Restructed the main CSS to reformat section titles, prepend each section with a $ for quick lookup.
* Added login.css in /css for customizing the login page
* Changed jQuery behaviour to use Wordpress core version (can change this in functions.php).
* Added various new functions to functions.php
* Added pagination without a plugin
* Added login page styling without a plugin
* Cleaned up <head> to remove some meta tags and move calls to functions.php
* Added <?php language_attributes(); ?>
* Blank now passes the [Theme Check](http://wordpress.org/plugins/theme-check/) tests
* Created native 404.php template
* Created archive-custom.php, format-default.php, page-custom.php and single-custom.php templates
* Updated [Schema markup](https://schema.org/) for posts and pages

## 2.4 (27 June 2014)

* Updated Modernizr to 2.8.2
* Updated jQuery to the Google Hosted Libraries version
* Fixed some formatting in functions.php
* Remove image sizes in functions.php that can be set in Settings > Media
* Updated normalize.css to 3.0.1

## 2.3 (17 April 2014)

* Added comments ID to fix comments anchor link

## 2.2 (13 February 2014)

* Updated screenshot.png to new dimensions
* Updated jQuery to 1.11.0
* Updated Normalize.css to 3.0.0
* Fixed theme version number
* Removed meta copyright tag

## 2.1 (16 July 2013)

* Use one apple-touch-icon instead of six 
* Add initial-scale=1 to the viewport meta
* Update to Google Universal Analytics
* Move font-related declarations from body to html

## 2.0 (16 July 2013)

* Restructuring of all the theme files and folders
* Removed Chrome Frame prompt as Google is [ceasing support](http://blog.chromium.org/2013/06/retiring-chrome-frame.html)
* Moved website icons to theme images directory
* Removed conditional meta robots statement if on search results page
* Changed CSS selectors for main structure from id's to classes as per [this post](http://csswizardry.com/2011/09/when-using-ids-can-be-a-pain-in-the-class/)
* Updated functions.php to include some functions from [HTML5blank](http://html5blank.com/)
* Updated jQuery to 1.10.2
* Miscellaneous aesthetic code fixes

## 1.0 (12 June 2012)

* Initial commit