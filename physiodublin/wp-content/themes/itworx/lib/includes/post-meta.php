<?php 

	if ( !class_exists('postMeta') ) {
	

	class postMeta {
		
		var $prefix = 'phi_';
		
		var $postmeta =	array(
										
										
			/// Slide meta
			
			
			
			array(
				"name"			=> "imageoptions",
				"title"			=> "Display image/video",
				"description"	=> "Select where to display image in the post",
				"type"			=> "radio",
				"radiovalue"	=> array( 
										
										"content" 	=> "Content area",
										"top" 		=> "Page top",
										"none" 		=> "Do not display in post",
										
										),
				"scope"			=>	array("post"),
				"default"		=> "content",
				"capability"	=> "manage_options"
			),
			
			array(
				"name"			=> "fullwidth_post",
				"title"			=> "Fullwidth ",
				"description"	=> "Removes the sidebar, so you can use the full page width for post content.",
				"type"			=> "checkbox",
				"scope"			=>	 array( "post"), 
				"capability"	=> "edit_post"
			),
			
		
		
			
		);
		/**
		* PHP 4 Compatible Constructor
		*/
		function postMeta() { $this->__constructSlideMeta(); }
		/**
		* PHP 5 Constructor
		*/
		function __constructSlideMeta() {
			add_action( 'admin_menu', array( &$this, 'createSlideCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveSlideCustomFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			//add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
		}
		/**
		* Remove the default Custom Fields meta box
		*/
		function removeDefaultCustomFields( $type, $context, $post ) {
			foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
				remove_meta_box( 'postcustom', 'post', $context );
				remove_meta_box( 'postcustom', 'post', $context );
				//Use the line below instead of the line above for WP versions older than 2.9.1
				//remove_meta_box( 'postcustomdiv', 'post', $context );
			}
		}
		/**
		* Create the new Custom Fields meta box
		*/
		function createSlideCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
			
				add_meta_box( 'post-custom-fields', 'Post meta data', array( &$this, 'displaySlideCustomFields' ), 'post', 'normal', 'high' );
			
			}
		}
		/**

		* Display the new Custom Fields meta box
		*/
		function displaySlideCustomFields() {
			global $post;
			?>

<div class="form-wrap" >
			<?php
				wp_nonce_field( 'post-custom-fields', 'post-custom-fields_wpnonce', false, true );
				foreach ( $this->postmeta as $customField ) {
					// Check scope
					$scope = $customField[ 'scope' ];
					$output = false;
					foreach ( $scope as $scopeItem ) {
						switch ( $scopeItem ) {
					
							
								case "post": {
								// Output on any post screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" || $post->post_type=="post" )
									$output = true;
								break;
							}
							
						}
						if ( $output ) break;
					}
					
					
					
					// Check capability
					if ( !current_user_can( $customField['capability'], $post->ID ) )
						$output = false;
					// Output if allowed
					if ( $output ) { ?>
			<div class="form-field form-required">
						<div style="float:none; clear:none; background:">
									<?php
							switch ( $customField[ 'type' ] ) {
								case "radio": {
									// Radiobutton
									
									echo '<h4 style="font-size:13px; margin:0 0 12px 0; clear:left;">'. $customField['title'].'</h4>';
									
									foreach ($customField ['radiovalue'] as $radiovalue => $radiolabel  ){
									
									echo '<div style="clear:both;  width:auto;margin:0 20px 20px 0; float:left; clear:none; ">';
									echo '<input type="radio"  name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="' .$this->prefix.$radiovalue. '"';
									
										if (get_post_meta($post->ID, $this->prefix . $customField['name'], true ) == $this->prefix .$radiovalue ){
										echo ' checked="checked"';	
										}
										elseif(get_post_meta($post->ID, $this->prefix . $customField['name'], true ) == ''&& $customField['default']== $radiovalue){
										echo ' checked="checked"';
										}
										
									echo '"style="width: auto;" />';
									//echo get_post_meta( $post->ID, $this->prefix . $customField['name'],true);
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline; margin-left:4px; padding:0;">' . $radiolabel . '</label>';
									echo'</div>';
									
									}
									break;
								}
								
							
								
								
								case "checkbox": {
									// Checkbox
									echo '<div style="clear:both; margin:4px 0;">';
									echo '<input type="checkbox"  name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
									if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline; margin-left:4px; padding:0;">' . $customField[ 'title' ] . '</label>';
									echo'</div>';
									break;
								}
								
								case "html": {
									// Description field
									
									break;
								}
								
								case "textarea": {
									// Text area
									echo '<div style="clear:both; margin:0 0 8px;">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<textarea name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea>';
									echo'</div>';
									break;
								}
								
								case "textnarrow": {
									// Plain text field
									
									echo '<div style="clear:both; width:200px; margin:0 20px 10px 0; float:left; clear:left;">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									echo'</div>';
									break;
								}
								default: {
									// Plain text field
									echo '<div style="clear:both; margin:4px 0;">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									echo'</div>';
									
									break;
								}
							}
							?>
									<?php if ( $customField[ 'description' ] ) echo '<p style="clear:left;">' . $customField[ 'description' ] . '</p>'; ?>
						</div>
			</div>
			<?php
					}
				} ?>
</div>
<?php	}
		/*
		Save the new Custom Fields values
		*/
		function saveSlideCustomFields( $post_id, $post ) {
			if ( !wp_verify_nonce( $_POST[ 'post-custom-fields_wpnonce' ], 'post-custom-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			
			foreach ( $this->postmeta as $customField ) {
				if (current_user_can( $customField['capability'], $post_id ) ) {
					if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim( $_POST[ $this->prefix . $customField['name'] ] ) ) {
					update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $_POST[ $this->prefix . $customField['name'] ] );
					
					} else {
						delete_post_meta( $post_id, $this->prefix . $customField[ 'name' ] );
					}
				}
			}
		}

	} // End Class

} // End if class exists statement

// Instantiate the class
if ( class_exists('postMeta') ) {
	$postMeta_var = new postMeta();
}