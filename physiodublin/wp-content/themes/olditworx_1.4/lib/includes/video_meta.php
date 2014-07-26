<?php 

	if ( !class_exists('videoMeta') ) {
	

	class videoMeta {
		
		var $prefix = 'phi_';
		
		var $videometa =	array(
										
										
			
			
			array(
				
				"name"			=> "videooptions",
				"title"			=> "Multimedia options",
				//"description"	=> "Select where to display video/flash on page/post",
				"type"			=> "radio",
				"radiovalue"	=> array( 
										"none" => "No video",
										"full" => "Top of page - Large size",
										"medium" => "Content area - Normal size",
										),
				"scope"			=>	array( "post","page","portfolio","product","news" ),
				"default"		=> "none",
				"capability"	=> "manage_options"
			),
			
			
				array(
				
				"name"			=> "videohost",
				"title"			=> "Video host",
				//"description"	=> "Select where to display video/flash on page/post",
				"type"			=> "radio",
				"radiovalue"	=> array( 
										"vimeo" 		=> "vimeo",
										"youtube" 	=> "youtube",
										),
				"scope"			=>	array( "post","page","portfolio","product","news" ),
				"default"		=> "none",
				"capability"	=> "manage_options"
			),
				
				
	
				array(
				"name"			=> "videoid",
				"title"			=> "Video id",
				"description"	=> "",
				"type"			=> "text",
				"scope"			=>	array( "post","page","portfolio","product","news" ),
				"capability"	=> "edit_pages"
			),
				
						
			array(
				"name"			=> "videowidth",
				"title"			=> "Video/flash width",
				"description"	=> "<br/>Write the physical width of the file here.",
				"type"			=> "textnarrow",
				"scope"			=>	array("post","page","portfolio","product","news" ),
				"capability"	=> "edit_pages"
			),
			
			array(
				"name"			=> "videoheight",
				"title"			=> "Video/flash height",
				"description"	=> "<br/>Write the physical height of the file here.",
				"type"			=> "textnarrow",
				"scope"			=>	array( "post","page","portfolio","product","news" ),
				"capability"	=> "edit_pages"
			),
			
				
				array(
				"name"			=> "blog_video",
				"title"			=> "Display in listings on blog,archive and category page. If this is checked, it will override the use of featured image on these posts.",
				"description"		=> "Only for blog posts",
				"type"			=> "checkbox",
				"scope"			=>	 array( "post" ), 
				"capability"		=> "edit_post"
			),
			
			
		);
		/**
		* PHP 4 Compatible Constructor
		*/
		function videoMeta() { $this->__construct(); }
		/**
		* PHP 5 Constructor
		*/
		function __construct() {
			add_action( 'admin_menu', array( &$this, 'createCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveCustomFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			//add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
		}
		/**
		* Remove the default Custom Fields meta box
		*/
		function removeDefaultCustomFields( $type, $context, $post ) {
			foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
				remove_meta_box( 'postcustom', 'post', $context );
				remove_meta_box( 'postcustom', 'page', $context );
				//Use the line below instead of the line above for WP versions older than 2.9.1
				//remove_meta_box( 'pagecustomdiv', 'page', $context );
			}
		}
		/**
		* Create the new Custom Fields meta box
		*/
		function createCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'my-custom-fields', 'Video or Flash content', array( &$this, 'displayCustomFields' ), 'news', 'normal', 'high' );
				add_meta_box( 'my-custom-fields', 'Video or Flash content', array( &$this, 'displayCustomFields' ), 'events', 'normal', 'low' );
				add_meta_box( 'my-custom-fields', 'Video or Flash content', array( &$this, 'displayCustomFields' ), 'phiportfolio', 'normal', 'high' );
				add_meta_box( 'my-custom-fields', 'Video or Flash content', array( &$this, 'displayCustomFields' ), 'testimonial', 'normal', 'high' );
				add_meta_box( 'my-custom-fields', 'Video or Flash content', array( &$this, 'displayCustomFields' ), 'post', 'normal', 'high' );
				add_meta_box( 'my-custom-fields', 'Video or Flash content', array( &$this, 'displayCustomFields' ), 'page', 'normal', 'high' );
			}
		}
		/**
		* Display the new Custom Fields meta box
		*/
		function displayCustomFields() {
			global $post;
			?>
			<div class="form-wrap" >
				<?php
				wp_nonce_field( 'my-custom-fields', 'my-custom-fields_wpnonce', false, true );
				foreach ( $this->videometa as $customField ) {
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
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" || $post->post_type=="news" )
									$output = true;
								break;
							}
							case "testimonial": {
								// Output on any post screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" || $post->post_type=="testimonial" )
									$output = true;
								break;
							}
							case "event": {
								// Output on any post screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" || $post->post_type=="events" )
									$output = true;
								break;
							}
							case "portfolio": {
								// Output on any post screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" || $post->post_type=="phiportfolio" )
									$output = true;
								break;
							}
							
							case "page": {
								// Output on any page screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="page-new.php" || $post->post_type=="page" )
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
								
								case "select": {
									// Select / dropdown
									echo '<h4 style="font-size:13px; margin:0 0 12px 0;">'. $customField['title'].'</h4>';
									
									echo '<div style="clear:both; margin:0 0 8px;">';
									
									echo '<select name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="' .$this->prefix.$selectvalue. '"';
									if (get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == $this->prefix .$selectvalue )
										echo ' checked="checked"';	
										
									echo '" style="width: auto;" />';
									
									foreach ($phi_getpages[$page_list ->ID] as $selectvalue   ){
									echo '<option value="djskalf">first</option>';
									}
								
									
									
									echo '</select>';
									//echo get_post_meta( $post->ID, $this->prefix . $customField['name'],true);
									
									echo'</div>';
									
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
							<?php if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>'; ?>
						</div></div>
					<?php
					}
				} ?>
			</div>
			<?php	}
		/*
		Save the new Custom Fields values
		*/
		function saveCustomFields( $post_id, $post ) {
			if ( !wp_verify_nonce( $_POST[ 'my-custom-fields_wpnonce' ], 'my-custom-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			
			foreach ( $this->videometa as $customField ) {
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
if ( class_exists('videoMeta') ) {
	$videoMeta_var = new videoMeta();
}