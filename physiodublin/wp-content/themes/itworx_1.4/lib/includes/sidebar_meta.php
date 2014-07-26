<?php 

	if ( !class_exists('sidebarMeta') ) {
	

	class sidebarMeta {
		
		var $prefix = 'phi_';
		
		var $sidebarmeta =	array(
										
										
			/// Slide meta
			
			array(
				"name"			=> "selectsidebar",
				"title"			=> "Sidebars",
				"description"	=> "Select sidebar for this page/post",
				"type"			=> "radio",
				"radiovalue"	=> array( 
										"bar_1" 		=> "Sidebar 1",
										"bar_2" 		=> "Sidebar 2",
										"bar_3" 		=> "Sidebar 3",
										"bar_4" 		=> "Sidebar 4",
										"bar_5" 		=> "Sidebar 5",
										"bar_6" 		=> "Sidebar 6",
										"bar_7" 		=> "Sidebar 7",
										"bar_8" 		=> "Sidebar 8",
										"bar_9" 		=> "Sidebar 9",
										"bar_10" 	=> "Sidebar 10"
										),
				"scope"			=>	array("page","post","news","testimonial","portfolio","event","FAQ"),
				"default"		=> "bar_1",
				"capability"	=> "manage_options"
			),
			
			
			

	
			
		
			
		);
		/**
		* PHP 4 Compatible Constructor
		*/
		function sidebarMeta() { $this->__constructSidebarMeta(); }
		/**
		* PHP 5 Constructor
		*/
		function __constructSidebarMeta() {
			add_action( 'admin_menu', array( &$this, 'createSidebarCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveSidebarCustomFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			//add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
		}
		
		/**
		* Create the new Custom Fields meta box
		*/
		function createSidebarCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'sidebar-custom-fields', 'Sidebars', array( &$this, 'displaySidebarCustomFields' ), 'post', 'side', 'default' );
				add_meta_box( 'sidebar-custom-fields', 'Sidebars', array( &$this, 'displaySidebarCustomFields' ), 'page', 'side', 'default' );
				add_meta_box( 'sidebar-custom-fields', 'Sidebars', array( &$this, 'displaySidebarCustomFields' ), 'news', 'side', 'default' );
				add_meta_box( 'sidebar-custom-fields', 'Sidebars', array( &$this, 'displaySidebarCustomFields' ), 'phiportfolio', 'side', 'default' );
				add_meta_box( 'sidebar-custom-fields', 'Sidebars', array( &$this, 'displaySidebarCustomFields' ), 'testimonial', 'side', 'default' );	
				add_meta_box( 'sidebar-custom-fields', 'Sidebars', array( &$this, 'displaySidebarCustomFields' ), 'events', 'side', 'default' );	
				
				
				
			}
		}
		/**

		* Display the new Custom Fields meta box
		*/
		function displaySidebarCustomFields() {
			global $post;
			?>

<div class="form-wrap" >
			<?php
				wp_nonce_field( 'sidebar-custom-fields', 'sidebar-custom-fields_wpnonce', false, true );
				foreach ( $this->sidebarmeta as $customField ) {
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
		function saveSidebarCustomFields( $post_id, $post ) {
			if ( !wp_verify_nonce( $_POST[ 'sidebar-custom-fields_wpnonce' ], 'sidebar-custom-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			
			foreach ( $this->sidebarmeta as $customField ) {
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
if ( class_exists('sidebarMeta') ) {
	$sidebarMeta_var = new sidebarMeta();
}