<?php 
/*
	DOWNLOADER FOR BACKUPS
*/

// DO SOME TYPE OF CHECK TO MAKE SURE THE PERSON IS WHO THEY SAY THEY ARE WITHOUT USING WORDPRESS CORE
if ($_SERVER['REMOTE_ADDR'] == $_COOKIE['ccbKeyCookie'] ){

	if (isset($_GET['file'])){
		
		$file = explode('/',$_GET['file']);
		$num = array_reverse($file);
		$realFile = $num[0];
		$downloadable = file_get_contents($_COOKIE['ccbABSPATH'] .'/wp-content/plugins/complete-central-backup/backups/'.$realFile);
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=../backups/'.$realFile);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . strlen($downloadable));
		echo $downloadable;
		
		}else{
			die('<pre style="text-align:center; padding:30px; background:#EEE; border: 1px #CCC solid: border-radius:5px;"> Ooops! Something has went wrong. <a href="javascript:history.bacs();">Click here</a> to go back. </pre>');
			}
}else{
	die('<pre style="text-align:center; padding:30px; background:#EEE; border: 1px #CCC solid: border-radius:5px;"> Ooops! Something has went wrong. <a href="javascript:history.back();">Click here</a> to go back. </pre>');
	}
?>