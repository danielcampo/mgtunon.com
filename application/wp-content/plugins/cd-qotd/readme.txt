=== Quote Of The day ===
Contributors: wilecoyote
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6922896
Tags: Quote of the day,Quote,quote plugin,qotd plugin
Requires at least: 2.9.2
Tested up to: 3.0
Stable tag: 1.2.1
Current Version: 1.2.1

Manage simple quote-of-the-day messages within your WordPress/MU/3.0 blog(s).

== Description ==

* Author: [coyote](http://coyotesdesigns.com)
* Overview: [plugin homepage](http://coyotesdesigns.com/quote-of-the-day-plugin/)
* Download: [Downlaod](http://coyotesdesigns.com/downloads/cd-qotd.zip)

The Quote-Of-The-Day plug-in allows you to define messages to display within your theme templates. The quotes comply with the HTML 4.01 specification for use of the Blockquote and Q tags. The cd-qotd.css file is included for further style definition.

You may now import quotes from standard CSV formatted as follows:
"Author", "Citation", "Quotation"
Note: Do NOT use a field name row.

If you are running a multisite version of WordPress, the quotes you import apply to the currently selected blog.

Imported quotes are written to the database without regard to duplicate entries.

You can add a short-code, [cd_qotd_all], to a page to list all quotes. The short-code accepts two attributes, order and group. The order attribute determines the order in which the quotes are displayed. Valid values are, "ASC" or "DESC", for ascending and descending, respectively. The group attribute determines whether to list the quotes grouped by author. Valid values are, "author" or "qid". The qid will display quotes in the order in which they were entered in to the database, based on the order attribute value. The author value will display quotes grouped by the author, based on the order attribute value.

== Installation ==

Installation is straight-forward.

1. Download cd-qotd.zip to your local hard drive.
1. Extract the files.
1. FTP the cd-qotd files to your WP Plugins directory. (Single and MU versions)
1. Activate the plug-in through the 'Plugins' menu in WordPress.

Alternatively, you may elect to install the cd-qotd plug-in through the internal WordPress plug-in installation Upload Option as follows.

1. Download cd-qotd.zip to your local hard drive.
1. From your WordPress admin screen, click the Plugins button.
1. From the Install Plugins page, click Upload.
1. From the Upload Plugins page, click Browse.
1. Navigate to the folder where you downloaded the cd-qotd plug-in.
1. Double-click the cd-qotd.zip file name to select it and dismiss the upload dialog box.
1. From the Upload Plugins page, click Install.

The plug-in documentation can be found at [plugin homepage](http://coyotesdesigns.com/quote-of-the-day-plugin/)

== Screenshots ==

1. screenshot-1.png
2. screenshot-2.png
3. screenshot-3.png

== Frequently Asked Questions ==

For questions and support, please use the appropriate links.

1. [Docs](http://coyotesdesigns.com/quote-of-the-day-plugin/)

== Upgrade Notice ==

= 1.2.1 =

1. Extract the files.
1. FTP the cd-qotd files to your WP Plugins directory.

= 1.2.0 =

1. Extract the files.
1. FTP the cd-qotd files to your WP Plugins directory.

= 1.1.0 =

1. Extract the files.
1. FTP the cd-qotd files to your WP Plugins directory.

= 1.0.0 =

* None.

== Changelog ==

= 1.2.1 =

Dec 10, 2010

1. Fixed generation of warnings for import when E_ALL is enabled. Thanks to [Andreas Thul](thul.org) for the catch.

= 1.2.0 =

Nov 4, 2010

1. Added [cd_qotd_all] short-code to list all quotes.
1. Added import option to settings page to upload CSV file.
1. Added Delete option to remove unwanted quotes.

= 1.1.0 =

May 26, 2010

1. Added widget code (from opajaap@opajaap.nl).
1. Fixed expiration issues.

= 1.0.0 =

Mar 10, 2010

* Initial release. No known issues. Currently running at CoyotesDesigns.com.

