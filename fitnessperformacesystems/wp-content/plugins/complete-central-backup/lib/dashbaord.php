<?php 
 /*
 	MAIN DASHBOARD PAGE
 */
 
// LOAD ALL THE FUNCTIONS WE NEED
require_once(dirname(__FILE__).'/classes/backup.php'); 				// BACKUP CLASS
require_once(dirname(__FILE__).'/classes/encrypt.php');				// ENCRYPTING CLASS FOR RANDOM USE
require_once(dirname(__FILE__).'/classes/cron.php');				// CRON JOBS
require_once(dirname(__FILE__).'/classes/main.php');				// MAIN CORE CLASS

function init_dashboard() {

	// LOAD STYLES
  	wp_enqueue_style('ccbStyleSheet');
	
	/*
		INIT CLASSES FOR USE IN PLUGIN
	*/
	$bak = new dbBackup; 
	$main = new ccbClass;
	$cron = new ccbCron;
	
	/*
		PREFORM CHECKS AND PREFORM ACCTIONS - BASIC RIGHT NOW BUT WILL NEED TO IMPORVE WITH AJAX IN NEXT VERSIONS
	*/
	
	
	// DO A FORCED UPDATE OF DATABASEIF VARIABLE IS SET
	if ( isset( $_GET['do_action']) && $_GET['do_action'] == 'database_backup' ):
		$bak->backupDatabase(); 									// PREFORM BACKUP
	endif;
	
	// RESTORE DATABASE FROM THE SELECTED BACKUP
	if ( isset( $_GET['do_action']) && $_GET['do_action'] == 'restore_backup' ):
		$bak->restoreDatabase(base64_decode($_GET['filename'])); 	// PREFORM BACKUP
	endif;
	
	// DELETE A SELECTED BACKUP
	if ( isset($_GET['do_action'] ) && $_GET['do_action'] == 'delete_backup' ):
		$backupName = base64_decode($_GET['filename']);				// DECODE THE FILENAME
		$main->deleteBackup($backupName);							// DELETE THE BACKUP
	endif;
	
	// CLEAR THE BACKUP LOG AND START FRESH
	if ( isset( $_GET['do_action'] ) && $_GET['do_action'] == 'clear_log' ):
		$main->clearLog();
	endif;
	
	// SCHEDULE WEEKLY BACKUP
	if ( isset( $_GET['do_action'] ) && $_GET['do_action'] == 'enable_weekly' ):
		$cron->enableWeeklyBackup();
	endif;
	
	// DISABLE WEEKLY BACKUP
	if ( isset( $_GET['do_action'] ) && $_GET['do_action'] == 'disable_weekly' ):
		$cron->disableWeeklyBackup();
	endif;
?>
    
    <script type="application/javascript">
		var $ccb = jQuery.noConflict();
		$ccb(document).ready(function(e) {
		
		// DELETE A BACKUP FROM THE LIST
        $ccb('.delete_backup_feature').click(function(e) {
			var check = confirm('Are you sure you want to delete this backup?');
			
			if (check){
            	var fileName = $ccb(this).attr('id');
				window.location="<?php print site_url();?>/wp-admin/options-general.php?page=complete_central_backup_dashboard&do_action=delete_backup&filename="+fileName+"&message_type=alert_warning&message_text=You have delete one of your backups";
			}
        });
		
		// RESTORE FROM THE SELECTED BACKUP
        $ccb('.restore_backup_feature').click(function(e) {
			var check = confirm('Are you sure you want to restore to this backup? ALL DATA LATER THEN THIS BACKUP WILL BE LOST');
			
			if (check){
            	var fileName = $ccb(this).attr('id');
				window.location="<?php print site_url();?>/wp-admin/options-general.php?page=complete_central_backup_dashboard&do_action=restore_backup&filename="+fileName+"&message_alert=alert_success&message_text=Restored from a backup has been made";
			}
        });
		
		// DOWNLOAD SELECTED BACKUP
       $ccb('.download_backup_feature').click(function(e) {			
            	var fileName = $ccb(this).attr('id');
				window.location = '<?php print site_url();?>/wp-content/plugins/complete-central-backup/lib/download.php?file='+fileName;
        });
		
		// CLEAR LOG FILE
        $ccb('.clearlog').click(function(e) {
			var check = confirm('Are you sure you want clear the backup log? ONCE CLEARED, YOU WILL LOOSE ANY LOG DATA PRIOR TO NOW');
			
			if (check){
            	var fileName = $ccb(this).attr('id');
				window.location="<?php print site_url();?>/wp-admin/options-general.php?page=complete_central_backup_dashboard&do_action=clear_log&message_type=alert_success&message_text=Backup log has been wiped CLEAN";
			}
        });
		
    });
	</script>
    
<header id="header">
		<hgroup>
			<h2 class="section_title">Complete Central Backup</h2>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Search Backups" onfocus="if(this.value == ''){this.value = 'Seach Backups'}">
		</form>
		<hr/>
		<h3>Main</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="<?php print site_url();?>/wp-admin/options-general.php?page=complete_central_backup_dashboard&do_action=database_backup&message_type=alert_success&message_text=A backup of your database has been created" title="Force Database Backup">Force New Backup</a></li>
		</ul>
		<!--<h3>Online Backups</h3>
		<ul class="toggle">
			<li class="icn_profile"><a href="#">Your Profile</a></li>
		</ul>-->
		<!--<h3>Media</h3>
		<ul class="toggle">
        	<li>Coming Next Release</li>
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Media Manager</a></li>
		</ul>
        -->
		<h3>Scheduling</h3>
		<ul class="toggle">
        <?php if ($main->get_weekly_cron_status() == true){ $action =  'disable_weekly'; 
															$message = 'Weekly Backup Has Been Disabled';
															$linkText = 'Disable Weekly Backup';
															}else{
															$action	 = 'enable_weekly';
															$message = 'Weekly Backup Has Been Enabled';
															$linkText = 'Enable Weekly Backup';
																}?>
			<li class="icn_folder"><a href="<?php print site_url();?>/wp-admin/options-general.php?page=complete_central_backup_dashboard&do_action=<?php print $action; ?>&message_type=alert_success&message_text=<?php print $message; ?>"><?php print $linkText; ?></a></li>
		</ul>
		
		<footer>
			<hr />
            <p><a href="http://blackbirdi.com/blog">Click Here For Documentation</a></p>
            <?php // print_r(wp_get_schedules()); ?>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		<?php if (!empty($_GET['message_type']) && !empty($_GET['message_text'])):?>
			<h4 class="<?php print $_GET['message_type']?>"><?php print $_GET['message_text']?></h4>
		<?php endif; ?>
		<!--<article class="module width_full">
			<header><h3>Stats</h3></header>
			<div class="module_content">
				<article class="stats_graph">
					<div id="chart_div"></div>
				</article>
				
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Today</p>
						<p class="overview_count">1,876</p>
						<p class="overview_type">Hits</p>
						<p class="overview_count">2,103</p>
						<p class="overview_type">Views</p>
					</div>
					<div class="overview_previous">
						<p class="overview_day">Yesterday</p>
						<p class="overview_count">1,646</p>
						<p class="overview_type">Hits</p>
						<p class="overview_count">2,054</p>
						<p class="overview_type">Views</p>
					</div>
				</article>
				<div class="clear"></div>
			</div>
		</article>-->
		
		<article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">Backup Manager <span style="float:right;"><?php $main->backupCount();?> Backups</span></h3>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Name</th> 
    				<th>Type</th> 
    				<th>Created On</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
				<?php $main->listBackups(); ?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
            
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		
		<article class="module width_quarter">
			<header><h3>Backup Log</h3></header>
			<div class="message_list">
				<div class="module_content">
					<?php $main->getLog(); ?>
				</div>
			</div>
			<footer>
				<button name="clear" class="clearlog">Clear Log</button>
			</footer>
		</article><!-- end of messages article -->
		
		<div class="clear"></div>
        
        <!-- MESSAGES FROM THE CREATORS -->
        <article class="module width_full">
			<header><h3>Plugin Information</h3></header>
			<div class="module_content">
				<article class="stats_graph">
					<div class="liveUpdates">
                    	<p>
                       	New Features <br />
                        <ul>
                         <li>- Enable and disable automatic database backups ( Weekly ).</li>
                         <li>- Notification via admin email when a backup has been preformed or it has been disabled (Canceled)</li>
                         <li>- Added for Wordpress installs that's root is in a sub directory</li>
                        </ul>
                        <h4>Premium version of CCB is in the mix. We will be keeping the free (lite version)</h4>
               	      	</p>
                   	  <p>Make sure you keep updated at <a href="http://blackbirdi.com/blog">our blog</a></p>
                  </div>
				</article>
                <article class="stats_overview">
					<div class="overview_today">
						<h3>Help Make This Plugin Better</h3>
                        <a href="http://blackbirdi.com/blog">Visit our blog and tell us what you think</a>
					</div>
				</article>
				<div class="clear"></div>
			</div>
		</article>
		
		<!--<h4 class="alert_warning">A Warning Alert</h4>
		
		<h4 class="alert_error">An Error Message</h4>
		
		<h4 class="alert_success">A Success Message</h4>-->
		
		<div class="spacer"></div>
	</section>
    
    
<?php } ?>