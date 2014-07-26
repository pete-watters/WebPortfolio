<?php 
	/*
 		MAIN CLASS FOR BACKUPING DATABASE
		
		THINGS BACKUP CLASS NEEDS:
		
			- VERIFY DATABASE
			- VERIFY FOLDER PERMISSIONS
	*/
	
class dataEncrytp {
	
	// DO CHECKS BEFORE RUNNING THE SCRIPT
	public function __contruct(){
		
		}
		
	// ENCODE 
	public function enCode($value, $key){
		return base64_encode(
			mcrypt_encrypt(
			MCRYPT_RIJNDAEL_256,
			$key, $value, 
			MCRYPT_MODE_ECB, 
			mcrypt_create_iv(
				mcrypt_get_iv_size(
					MCRYPT_RIJNDAEL_256, 
					MCRYPT_MODE_ECB
					), 
			MCRYPT_RAND)
			)
		 );
	}
		
	//  DECODE
	public function deCode($value, $key){
		return mcrypt_decrypt(
			MCRYPT_RIJNDAEL_256, 
			$key, 
			base64_decode($value), 
			MCRYPT_MODE_ECB,
			mcrypt_create_iv(
				mcrypt_get_iv_size(
					MCRYPT_RIJNDAEL_256,
					MCRYPT_MODE_ECB
					), 
				 MCRYPT_RAND
			)
		 );
	}
	
}
?>