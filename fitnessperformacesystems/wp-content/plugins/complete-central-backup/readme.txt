=== Plugin Name ===
Contributors: justingreerbbi, blackbirdidinteractive
Donate link: http://blackbirdi.com/donate
Tags: backup,restore,database backup,help
Requires at least: 3.4.2
Tested up to: 3.4.2
Stable tag: 1.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create a instant live backup of your database with just a click of a button and restore your database just as fast.

== Description ==

Lets face it! 
Loosing your data is always breath taking. Its like losing your wallet.

Complete Central Backup allows for backups to be made on the fly. You can also restore it just as fast. There are some backup plugins out right now but sometimes they just get too clunky and are hard to follow. We designed this plugin for the normal user with a clean and simple dashboard (Thanks to Tony Thomas from <a href="http://medialoot.com/">Media Loot</a>). It does not get mush easier than this.

Included Features:

*   ONE CLICK to create a backup of your database
*   INSTANT backup restoring from the plugin dashboard (Very large databases may take longer or require manual restoring)
*   Convenient log tracking of all actions(viewable form the plugin dashboard with the ability to clear the log)
*   Ability to manage your backups right from the plugin dashboard (Delete, Restore, and even Download)
*   Ability to restore database with out even being logged out
*	Create Scheduled backups 

The plugin is having problems when using the automatic update through the Wordpress admin panel. We recommend doing manual updates of this plugin until we can fix the issue

All plugin support matters are recommended to be place at our <a href="http://blackbirdi.com/2012/10/25/complete-central-backup-wordpress-plugin/">blog</a>. This way you will get a response sooner as this plugin has limited support.
All features marked with a + symbol are features only working currently in our in house development version. When they are considered stable to use they will be place into the plugins repo here for testing until confirmed by users. Then they will be considered a stable release

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory or use the built in plugin install by WordPress
1. Activate the plugin through the 'Plugins' menu in WordPress
1. You can find the plugin dashboard by visiting "backup" under the setting tab

== Frequently Asked Questions ==

= I did a restore and my site now goes to the install screen. What should I do? =

With this plugin being very new and only tested on a couple servers, the plugin may have had a hiccup and never restored the database. You will have to a manual backup. You can find the backup files at /wp-admin/plugin/complete_central_backup/backups/*.sql
You will have to use phpMyAdmin and import a backup manually. Detailed documentation will be provided at on our blog

= Can the database backs work on other domains/sites? =

Yes the database backups work acrossed the board and can be used on other wordpress installs.

= Can I use this plugin to transfers my site to another domain? =
Yes you can but not right now. The next release will have the ability to package all your contents and file structure, along with a automatic database sync feature. 

= When clicking "Force New Backup", I do not see any backups in the "Backup Manager" =

Every server is different and this is most likely a permission issue with the files. We are planning on placing a file permission check feature in the plugin shortly to make sure that everything is A-OK for the plugin to work and for the safety and security of your WordPress install.

= Why do you not place any of the newer features in the trunk so we can use them as you develop them? =

The database is the heart of Wordpress. Without it , the site will fail. When dealing with the database, EXTREME caution should be taken (Even if we say "Here is a plugin to do it all for you"). Although we are not responsible for any damages, loss of money or data we do not want to give the opportunity to lower WordPress knowledge folks and help them crash their site.

= "I lost everything!!! It is your fault!" =

Although we are happy to help, We (Blackbird Interactive and any developer) take no responsibility for actions done by the user using this plugin. Extreme caution should be taken when ever dealing with  the database and all files.


== Screenshots ==

1. screenshot-1.png
2. screenshot-2.png

== Changelog ==

= 1.0.2 =
* INIT BUILD
* ADDED BASIC DATABASE BACKUP AND RESTORE FUNCTIONAITY 
* SUBMITTED PLUGIN TO REPO FOR APPROVAL

= 1.0.3 =
* Styled logout button
* Cleaned un-needed files for class directory
* Added Weekly Scheduling Feature
* Patched naming for backup listings

= 1.0.4 =
* Added Support for sites that Wordpress is in a sub directory.
* Added features to make future compatiablity automatic
* Change bloginfo("admin_email") in wp_mail() to fix bug in mailing system - Notifications now work via email when the shceduled backup is turned off and or a backup has been complete.
* Started intergration of encryption for database's with sensitive information.