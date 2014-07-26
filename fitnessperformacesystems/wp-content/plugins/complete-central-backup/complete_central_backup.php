<?php
/*
Plugin Name: Complete Central Backup
Plugin URI: http://blackbirdi.com/blog
Description: Complete Backup takes a complete backup of your wordpress site, even widgets and information. It then gives you the options to store locally, download, or push to any server using FTP.
Version: 1.0.4
Author: Blackbird Interactive
Author URI: http://blackbirdi.com
License: GPL2

  Copyright 2012  Complete Central Backup  (email : info@blackbirdi.com)
  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

	CREDIT BELONGS WHERE IT IS DUE:
	
	Options Page Theme:
		http://medialoot.com/item/html5-admin-template/
		Tony Thomas
		MediaLoot Designer
	
	Starter Plugin:
		http://blackbirdi.com
		The Blackbird Team
		
	Guidance:
		http://wordpress.org

*/

add_action( 'admin_menu', 'complete_central_backup_menu' );

require_once( dirname(__FILE__).'/lib/dashbaord.php');

/*
	CREATE THE MENU FOR COMPLETE CENTRAL BACKUP PLUGIN AND ADD IT TO THE SETTING MENU
*/
function complete_central_backup_menu() {
	add_options_page( 'Complete Central Backup Dashboard', 'Backup', 'manage_options', 'complete_central_backup_dashboard', 'init_dashboard' );
}

/*
	REGISTER THE STYLESHEET
*/
wp_register_style( 'ccbStyleSheet', site_url().'/wp-content/plugins/complete-central-backup/lib/assets/css/layout.css' );

/*
	CREATE COOKIE USING USER IP TO TRACK ALLOWED USERS FOR FILES
*/
function ccbKeyCookie() {
		if (!isset($_COOKIE['ccbKeyCookie']) || !isset($_COOKIE['ccbABSPATH'])) {
			setcookie('ccbKeyCookie', $_SERVER['REMOTE_ADDR'], time()+3600, COOKIEPATH, COOKIE_DOMAIN, false);
			setcookie('ccbABSPATH', ABSPATH, time()+3600, COOKIEPATH, COOKIE_DOMAIN, false);
		}
}
add_action( 'init', 'ccbKeyCookie');

/*
	MAKE SURE TO START CRON JOBS ONCE DEACTIVATED
*/
register_deactivation_hook(__FILE__, 'ccb_weekly_deactivation');

function ccb_weekly_deactivation() {
	wp_clear_scheduled_hook('ccb_weekly_backup');
}	
?>