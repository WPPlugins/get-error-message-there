=== Get Error Message There ===
Contributors: reedom
Donate link: http://wp.reedom.com/software/wordpress-plugins/get-error-message-there
Tags: ajax, comment, comments, edit
Requires at least: 2.1
Tested up to: 2.3
Stable tag: 0.94

Display comment posting error message within the editing page.

== Description ==

With this simple plugin allow users to get comment posting error message within the page users just editing.

== Screenshots ==

1. displaying an error message right hand of the submit button.

== Installation ==

1. Download the plugin archive.
1. Unzip the archive.
1. Upload the unzipped directory and its contents to your Wordpress plugins folder (/wp-content/plugins/).
1. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

* <strong>How to change appearance of error message and/or icon?</strong><br/>
Font color, margins and others are defined in <em>wp-gemt.css</em>, placed in the directory of this plugin. Please modify it freely to be what should it be. And loading icon is <em>loading.gif</em>, placed in the same directory.<br>
The structual placement of the text and icon, currenctly after the submit button, is currently fixed. sorry.
* <strong>Other plugins started incorrect beviours.</strong><br/>
It might due to conflifts with javascript libraries, jQuery and others. Please look in <em>wp-gemt.js.php</em>, placed in this plugin's directory, then comment out one line which is described in the file.

== Limitations ==

* HTTP errors(timeout, url error, ...) will not be handled this plugin. When any HTTP error occurs your browser will show a standard error page. This limitation comes from jQuery.js does not handle exceptions while establish async socket.
* This plugin works as long as you use the default posting error page as the WordPress destribution provides. This limitation comes from the plugin's error message discovering logic. Possibly I can add an admin option with which you can specify a XPath used to find an error message block. However it will make the plugin not so simple, so I hesitate to do it.
* Display loations of the loading icon and error message are fixed in the javascript script code.

== ChangeLog ==
* 2007-10-19 0.94<br/>
  FIX: Make the plugin to be worked under more Apache web servers, now it does not require Apache's Content Negotiation feature.
* 2007-10-08 0.93<br/>
  CHG: Support for WordPress 2.3.<br/>
* 2007-07-07 0.92<br/>
  CHG: $() to jQuery(). Make it working with other plugins, say Gengo, which eliminate jQuery default namespace $().<br/>
* 2007-06-16 0.91<br/>
  BUG: When backing previous page after comment posted successfully users see disabled submit button and loading indicator.<br/>
  BUG: Reloaing problem. In IE7, newly posted comment was not updated in the editing window after posting it.<br/>
  CHG: Make plugin's javascript to be loaded only when comment form exists.
* 2007-06-15 0.9<br/>
  First public version.
* 2007-06-11 0.1<br/>
  Initial version.
