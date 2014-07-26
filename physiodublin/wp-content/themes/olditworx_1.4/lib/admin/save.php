<?php
include '../../../../../wp-load.php';

$options = stripslashes($_POST['option']);

$options = json_decode($options, true);

foreach($options as $id => $value) : 

	if($value != 'undefined') :
	
		update_option($id, $value);
		
	else:
	
		update_option($id, '');
		
	endif;
	
endforeach;

echo "Saving...";


?>
