<?php 
/*
	MAIN FUNCTIONS FOR PLUGIN
*/
class ccbClass{
	
	public function __construct(){
		$this->backupDir = ABSPATH.'/wp-content/plugins/complete-central-backup/backups/';		// THIS SHOULD NOT BE CHANGED UNLESS YOU KNOW WHAT YOU ARE DOING 
		$this->logFile = ABSPATH.'/wp-content/plugins/complete-central-backup/log.txt';			// THIS SHOULD NOT BE CHANGED UNLESS YOU KNOW WHAT YOU ARE DOING
		}
	
	public function backupCount(){	
			print count( glob( $this->backupDir . "*.sql" ) );
		}
	
	public function getLog(){
    		print nl2br( file_get_contents( $this->logFile ) );		// RETURN THE LOG FILE FORMATTED
		}
		
	public function listBackups(){
		if ( count( glob( $this->backupDir . "*.sql" ) ) > 0 ){
			foreach( ( glob( $this->backupDir . "*.sql" ) ) as $singleBackup ){
				$dl_link = explode('/',$singleBackup);
				$num = array_reverse($dl_link);
				$dl_link = $num[0];
				$dl_link = site_url() . '/wp-content/plugins/complete-central-backup/backups/'.$dl_link;
				//db-backup-25-Oct-2012-5_31pm
				$ext = explode( '-',$singleBackup );
				print '<tr> 
						<td><input type="checkbox"></td> 
						<td>Backup</td> 
						<td>Database</td> 
						<td>'.$ext[5].' '.$ext[6].' '.$ext[7].' @ '.$ext[8].':'.substr($ext[9], 0, -4).' </td> 
						<td>
						<input id="'.base64_encode( $singleBackup ).'" type="image" class="restore_backup_feature" src="'.site_url().'/wp-content/plugins/complete-central-backup/lib/assets/images/icn_edit.png" title="Restore This Database">
						<input id="'.base64_encode( $singleBackup ).'" type="image" class="delete_backup_feature" src="'.site_url().'/wp-content/plugins/complete-central-backup/lib/assets/images/icn_trash.png" title="Delete This Database">
						<input id="'.$dl_link.'" type="image" class="download_backup_feature" src="'.site_url().'/wp-content/plugins/complete-central-backup/lib/assets/images/icn_photo.png" title="Download This Database">
						</td> 
					</tr> 
					<tr> ';
				}
		}else{
			print '<tr> 
						<td> There are no Backups - <a href="'.site_url().'/wp-admin/options-general.php?page=complete_central_backup_dashboard&do_action=database_backup&message_type=alert_success&message_text=A backup of your database has been created">Click here to create one</a></td> 
						<td>&nbsp;</td> 
						<td>&nbsp;</td> 
						<td>&nbsp;</td> 
						<td>&nbsp;</td> 
					</tr> 
					<tr> ';
			}
		
		}
	
	// DELETE A SET BACKUP
	public function deleteBackup( $fileName ){
		global $current_user;
      	get_currentuserinfo();
		unlink( $fileName );					// DELETE THE SELECTED BACKUP
		
		// WRITE TO LOG
		$fh = fopen($this->logFile, 'a');
		$logData = date("F j, Y, g:i a"). ":\n";
		$logData .= $current_user->user_login. " deleted \n".$fileName." \n\n";
		if (!fwrite($fh, $logData)){print $this->logFile;}
		fclose($fh);
		}
	
	// CLEAR THE BACKUP LOG
	public function clearLog(){
		file_put_contents($this->logFile, "");		// PLACE BLANK CONTENT IN THE TEXT FILE
		}
		
	// CHECK IF WEEKLY CRON IS SET
	public function get_weekly_cron_status(){
		if(wp_next_scheduled( 'ccb_weekly_backup' )){
			return true;
			}else{
				return false;
				}
		}
	
}
?>