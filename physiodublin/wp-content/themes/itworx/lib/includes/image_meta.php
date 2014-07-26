<?php 

	if ( !class_exists('imageMeta') ) {
	

	class imageMeta {
		
		var $prefix = 'phi_';
		
		var $imagemeta =	array(
										
										
			/// Slide meta
			
			array(
				"name"			=> "imageoptions",
				"title"			=> "Display image",
				"description"	=> "Select where to display image in the post",
				"type"			=> "radio",
				"radiovalue"	=> array( 
										"top" 		=> "Page top",
										"content" 	=> "Content area",
										"none" 		=> "Do not display in post",
										
										),
				"scope"			=>	array("post","page","testimonial","news","event","portfolio"),
				"default"		=> "content",
				"capability"	=> "manage_options"
			),
			
			/*array(
				"name"			=> "custom_image",
				"title"			=> "Custom featured image",
				"description"	=> "",
				"type"			=> "text",
				"scope"			=>	array("slide","post","page","portfolio","news","events"),
				"capability"	=> "edit_pages"
			),*/
			

	
			
		
			
		);
		/**
		* PHP 4 Compatible Constructor
		*/
		function imageMeta() { $this->__constructImageMeta(); }
		/**
		* PHP 5 Constructor
		*/
		function __constructImageMeta() {
			add_action( 'admin_menu', array( &$this, 'createImageCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveImageCustomFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			//add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
		}
		
		/**
		* Create the new Custom Fields meta box
		*/
		function createImageCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'image-custom-fields', 'Images', array( &$this, 'displayImageCustomFields' ), 'post', 'side', 'default' );
				add_meta_box( 'image-custom-fields', 'Images', array( &$this, 'displayImageCustomFields' ), 'page', 'side', 'default' );
				add_meta_box( 'image-custom-fields', 'Images', array( &$this, 'displayImageCustomFields' ), 'news', 'side', 'default' );
				add_meta_box( 'image-custom-fields', 'Images', array( &$this, 'displayImageCustomFields' ), 'phiportfolio', 'side', 'default' );
				add_meta_box( 'image-custom-fields', 'Images', array( &$this, 'displayImageCustomFields' ), 'testimonial', 'side', 'default' );	
				add_meta_box( 'image-custom-fields', 'Images', array( &$this, 'displayImageCustomFields' ), 'events', 'side', 'default' );	
				
				
				
			}
		}
		/**

		* Display the new Custom Fields meta box
		*/
		function displayImageCustomFields() {
			global $post;
			?>

<div class="form-wrap" >
			<?php
				wp_nonce_field( 'image-custom-fields', 'image-custom-fields_wpnonce', false, true );
				foreach ( $this->imagemeta as $customField ) {
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
							case "news": {
								// Output on any post screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php?post_type=news" || $post->post_type=="news" )
									$output = true;
								break;
							}
							case "event": {
								// Output on any post screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php?post_type=events" || $post->post_type=="events" )
									$output = true;
								break;
							}
							
												
							case "testimonial": {
								// Output on any post screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php?post_type=testimonial" || $post->post_type=="testimonial" )
									$output = true;
								break;
							}
							case "portfolio": {
								// Output on any post screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php?post_type=phiportfolio" || $post->post_type=="phiportfolio" )
									$output = true;
								break;
							}
							
							
							case "page": {
								// Output on any page screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php?post_type=page" || $post->post_type=="page" )
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
						
									<?php
							switch ( $customField[ 'type' ] ) {
								case "radio": {
									// Radiobutton
									
									if ( $customField[ 'description' ] ) echo  $customField[ 'description' ];
																
									foreach ($customField ['radiovalue'] as $radiovalue => $radiolabel  ){
									echo '<div style="clear:both; min-width:200px; padding:10px 0 10px;">';
									echo '<input type="radio"  name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="' .$this->prefix.$radiovalue. '"';
									
										if (get_post_meta($post->ID, $this->prefix . $customField['name'], true ) == $this->prefix .$radiovalue ){
										echo ' checked="checked"';	
										}
										elseif(get_post_meta($post->ID, $this->prefix . $customField['name'], true ) == ''&& $customField['default']== $radiovalue){
										echo ' checked="checked"';
										}
										
									echo '" style="float:left; display:inline; clear:none; width:20px;"/>';
									
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"  style="float:left;">' . $radiolabel . '</label>';
									echo '</div>';
									
									}
									break;
								}
								
								
								
							
							}
							?>
									
						
			</div>
			<?php
					}
				} ?>
</div>
<?php	}
		/*
		Save the new Custom Fields values
		*/
		function saveImageCustomFields( $post_id, $post ) {
			if ( !wp_verify_nonce( $_POST[ 'image-custom-fields_wpnonce' ], 'image-custom-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			
			foreach ( $this->imagemeta as $customField ) {
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
if ( class_exists('imageMeta') ) {
	$imageMeta_var = new imageMeta();
}