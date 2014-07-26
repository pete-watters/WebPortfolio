<?php 

	if ( !class_exists('slideshowMeta') ) {
	

	class slideshowMeta {
		
		var $prefix = 'phi_';
		
		var $slideshowmeta =	array(
										
										
			/// Slide meta
			
			array(
				"name"			=> "textbox_position",
				"title"			=> "Textbox position",
				"description"	=> "Select where to display the text in slide",
				"type"			=> "radio",
				"radiovalue"	=> array( 
										"left" 		=> "Left",
										"center" 	=> "Center",
										"right" 		=> "Right",
										"none" 		=> "None",
										
										),
				"scope"			=>	array("slide"),
				"default"		=> "right",
				"capability"	=> "manage_options"
			),
			
			array(
				"name"			=> "textbox_color",
				"title"			=> "Textbox color",
				"description"	=> "Select color and transparency of textbox",
				"type"			=> "radio",
				"radiovalue"	=> array( 
										"black_transparent" 	=> "Black transparent",
										"black_opaque" 		=> "Black opaque",
										"white_transparent" 	=> "White transparent",
										"white_opaque" 		=> "White opaque",
										
										
										),
				"scope"			=>	array("slide"),
				"default"		=> "black_transparent",
				"capability"	=> "manage_options"
			),
			
			
			
			
		
			
		);
		/**
		* PHP 4 Compatible Constructor
		*/
		function slideshowMeta() { $this->__constructslideshowMeta(); }
		/**
		* PHP 5 Constructor
		*/
		function __constructslideshowMeta() {
			add_action( 'admin_menu', array( &$this, 'createslideshowCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveslideshowCustomFields' ), 1, 2 );
		}
		
		/**
		* Create the new Custom Fields meta box
		*/
		function createslideshowCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'slideshow-custom-fields', 'Cycle slideshow layout', array( &$this, 'displayslideshowCustomFields' ), 'slide', 'side', 'default' );
			}
		}
		/**

		* Display the new Custom Fields meta box
		*/
		function displayslideshowCustomFields() {
			global $post;
			?>

<div class="form-wrap" >
			<?php
				wp_nonce_field( 'slideshow-custom-fields', 'slideshow-custom-fields_wpnonce', false, true );
				foreach ( $this->slideshowmeta as $customField ) {
					// Check scope
					$scope = $customField[ 'scope' ];
					$output = false;
					foreach ( $scope as $scopeItem ) {
						switch ( $scopeItem ) {
							case "slide": {
								// Output on any post screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php?post_type=slide" || $post->post_type=="slide" )
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
		function saveslideshowCustomFields( $post_id, $post ) {
			if ( !wp_verify_nonce( $_POST[ 'slideshow-custom-fields_wpnonce' ], 'slideshow-custom-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			
			foreach ( $this->slideshowmeta as $customField ) {
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
if ( class_exists('slideshowMeta') ) {
	$slideshowMeta_var = new slideshowMeta();
}