<?php
/*
	SHEDULED BACKUPS
*/

class ccbCron {
	
	// SET BACKUP
	public function enableWeeklyBackup() {
		
		if ( ! wp_next_scheduled( 'ccb_weekly_backup' ) ) {
		  wp_schedule_event( time(), 'hourly', 'ccb_weekly_backup' );
		}else{
			die('Already Sent');
			}
		
		add_action( 'ccb_weekly_backup', 'my_task_function' );
		
		function my_task_function() {
		   $admin_email = get_option('admin_email');
		   wp_mail( $admin_email, 'CCB Backup Notification', 'A weekly backup has been started');
		   $link = mysql_connect($host,$user,$pass);
			  mysql_select_db($name,$link);
			  
			  // BACKUP ALL TABLES AND DATA
			  if($tables == '*'){
				$tables = array();
				$result = mysql_query('SHOW TABLES');
				while($row = mysql_fetch_row($result)){
				  $tables[] = $row[0];
				}
			  }else{
				$tables = is_array($tables) ? $tables : explode(',',$tables);  
			  }
			  
			  // START LOOPING THROUGH THE TABLES
			  foreach($tables as $table){
				$result = mysql_query('SELECT * FROM '.$table);
				$num_fields = mysql_num_fields($result);
				
				if (!$new){
				$return.= 'DROP TABLE '.$table.';';
				}
				$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
				$return.= "\n\n".$row2[1].";\n\n";
				
				for ($i = 0; $i < $num_fields; $i++) 
				{
				  while($row = mysql_fetch_row($result))
				  {
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j<$num_fields; $j++) 
					{
					  $row[$j] = addslashes($row[$j]);
					  $row[$j] = ereg_replace("\n","\\n",$row[$j]);
					  if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					  if ($j<($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				  }
				}
				$return.="\n\n\n";
			  }
			  
			  $handle = fopen($this->backupDir.'db-backup-'.date('j-M-Y-g-ia').'.sql','w+');
			  fwrite($handle,$return);
			  fclose($handle);
			  
			  // WRITE TO LOG
			  global $current_user;get_currentuserinfo();
			  $fh = fopen($this->logFile, 'a');
			  $logData = date("F j, Y, g:i a"). ":\n";
			  $logData .= "Backup Completed by ".$current_user->user_login." \n\n";
			  if (!fwrite($fh, $logData)){print $this->logFile;}
			  fclose($fh);
			  return true;
		}
	}
	
	// DISABLE WEEKLY BACKUPS
	public function disableWeeklyBackup() {
		$admin_email = get_option('admin_email');
		wp_clear_scheduled_hook('ccb_weekly_backup');
		wp_mail( $admin_email, 'CCB Backup Notification', 'Your Weekly Backup has been DISABLED');
	}
}
?>