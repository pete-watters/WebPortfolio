<?php 
	/*
 		MAIN CLASS FOR BACKUPING DATABASE
		
		THINGS BACKUP CLASS NEEDS:
			- BACKUP OF DATABASE
	*/
	
class dbBackup {
	
	// DO CHECKS BEFORE RUNNING THE SCRIPT
	public function __construct(){
		$this->backupDir = ABSPATH.'/wp-content/plugins/complete-central-backup/backups/';
		$this->logFile = ABSPATH.'/wp-content/plugins/complete-central-backup/log.txt';			
		chmod($this->backupDir,0777);
		}
		
	/*
		BACK UP THE WHOLE DATABASE NO MATTER WHAT FOR NOW.
	
	*/ 
	public function backupDatabase( $host = DB_HOST, $user = DB_USER, $pass = DB_PASSWORD, $name = DB_NAME, $new = true,$tables = '*' ){
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
				$tables = is_array($tables) ? $tables : explode(',',$tables);  // LOOP THROUGH ALL THE TABLES AND ADD THEN TO THE ARRAY FOR ONLY BACKUPING UP CERTIAN TABLES
			  }
			  
			  // START LOOPING THROUGH THE TABLES
			  foreach($tables as $table){
				$result = mysql_query('SELECT * FROM '.$table);
				$num_fields = mysql_num_fields($result);
				
				// Added - Justin Greer
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
	
	public function restoreDatabase($fileName) {
		// ASSIGN VARIABLES HERE SO WE DON'T LOSE THEM AFTER DROPPING THE DATABASE
		$DB_HOST 		= DB_HOST;
		$DB_USER 		= DB_USER;
		$DB_PASSWORD 	= DB_PASSWORD;
		$DB_NAME 		= DB_NAME;
		
		// DROP AL THE TABLES FROM THE DATABASE
		$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
		$mysqli->query('SET foreign_key_checks = 0');
		if ($result = $mysqli->query("SHOW TABLES")){
    		while($row = $result->fetch_array(MYSQLI_NUM)){
       			 $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
   			 }
		}

		$mysqli->query('SET foreign_key_checks = 1');
		$mysqli->close();
		
		$fp = file($fileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		$query = '';
		foreach ($fp as $line) {
			if ($line != '' && strpos($line, '--') === false) {
				$query .= $line;
				if (substr($query, -1) == ';') {
					mysql_query($query);
					$query = '';
				}
			}
		}
		// WRITE TO LOG
		global $current_user;get_currentuserinfo();
		$fh = fopen($this->logFile, 'a');
		$logData = date("F j, Y, g:i a"). ":\n";
		$logData .= "Database has been restored by ".$current_user->user_login." \n\n";
		if (!fwrite($fh, $logData)){print $this->logFile;}
		fclose($fh);
	}
	
	// FILE SYSTEM BACKUP AND PACKAGING
	public function fileBackup($source,$destination){
			if (extension_loaded('zip') === true){
				if (file_exists($source) === true){
					$zip = new ZipArchive();
		
					if ($zip->open($destination, ZIPARCHIVE::CREATE) === true){
						$source = realpath($source);
		
						if (is_dir($source) === true){
							$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
		
							foreach ($files as $file){
								$file = realpath($file);
		
								if (is_dir($file) === true){
									$zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
								}else if (is_file($file) === true){
									$zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
								}
							}
						}
						else if (is_file($source) === true){
							$zip->addFromString(basename($source), file_get_contents($source));
						}
					}
					return $zip->close();
					// WRITE TO LOG
					$fh = fopen($this->logFile, 'a');
					$logData = date("F j, Y, g:i a"). ":\n";
					$logData .= "Full file system backup complete \n\n";
					if (!fwrite($fh, $logData)){print $this->logFile;}
					fclose($fh);
				}
			}
			return false;
		}
		
	public function __destruct(){
		chmod($this->backupDir,0755);	
		}
		
	
	}
?>