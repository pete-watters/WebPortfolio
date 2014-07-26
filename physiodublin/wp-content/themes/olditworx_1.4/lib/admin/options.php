<?php

$shortname="phi";

$pages = get_pages();
$phi_getpages = array();
foreach ($pages as $page_list ) {
       $phi_getpages[$page_list ->ID] = $page_list ->post_title;
}


$slideterms = get_terms('slidecategory');
$phi_getSlideTerms = array();
	foreach ($slideterms as $term_list) {
		$phi_getSlideTerms [$term_list->term_id] = $term_list->name;
		//echo $term_list->name;
}

$phi_fontsizes = array(
			'' 	 => 'Theme default size',	
			'10px' => '10 pixels',
			'11px' => '11 pixels',
			'12px' => '12 pixels',
			'13px' => '13 pixels',
			'14px' => '14 pixels',
			'15px' => '15 pixels',
			'16px' => '16 pixels',
			'17px' => '17 pixels',
			'18px' => '18 pixels',
			'19px' => '19 pixels',
			'20px' => '20 pixels',
			'21px' => '21 pixels',
			'22px' => '22 pixels',
			'24px' => '24 pixels',
			'26px' => '26 pixels',
			'28px' => '28 pixels',
			'32px' => '32 pixels',
			'36px' => '36 pixels',
			'40px' => '40 pixels',
			'44px' => '44 pixels',
			'48px' => '48 pixels',
			'52px' => '52 pixels',
			'56px' => '56 pixels',
			'60px' => '60 pixels',
			);

$phi_homecontent = array(
			'/lib/includes/slideshow.php' => 'Slideshow',
			'/lib/includes/home-teasers.php' => 'Teasers',
			'/lib/includes/home-blog.php' => 'Blog',
			'/lib/includes/home-widget-1.php' => 'Home widget 1 ',
			'/lib/includes/home-widget-2.php' => 'Home widget 2 ',
			'/lib/includes/home-widget-3.php' => 'Home widget 3 ',
			'/lib/includes/home-widget-4.php' => 'Home widget 4 ',
			'/lib/includes/home-widget-5.php' => 'Home widget 5 ',
			'/lib/includes/home-widget-6.php' => 'Home widget 6 ',
			'/lib/includes/home-widget-7.php' => 'Home widget 7 ',
			'/lib/includes/home-widget-8.php' => 'Home widget 8 ',
			'/lib/includes/home-widget-9.php' => 'Home widget 9 ',
			'/lib/includes/home-widget-10.php' => 'Home widget 10 '
			 );


$phi_fonts =  array(
			'Arial, Helvetica, sans serif' 											=> "Arial, Helvetica, sans serif",
			'CandelaBook'																	=> "Candela",
			'CandelaBold'																	=> "Candela Bold",
			'CopseRegular'																	=> "Copse",
			'Courier New, Courier, monospace' 										=> "Courier New, Courier, monospace",
			'CousineRegular,Courier New, Courier, monospace' 					=> "Cousine",
			'CousineBold,Courier New, Courier, monospace' 						=> "Cousine Bold",
			'Georgia, Times New Roman, Times, serif' 								=> "Georgia, Times New Roman, Times, serif",
			'JosefinSlabLight'															=> "Josefin Slab Light",
			'JosefinSlabRegular'															=> "Josefin Slab Regular",
			'JosefinSlabBold'																=> "Josefin Slab Bold",
			'LacunaRegular'																=> "Lacuna",
			'LatoRegular'																	=> "Lato Regular",
			'LatoBold'																	=> "Lato Bold",
			'LeagueGothic, Arial,Verdana,Helvetica,  sans serif' 				=> "League Gothic",
			'Lobster13Regular'															=> "Lobster",
			'Lucida Sans Unicode, Helvetica, Lucida Grande,  sans serif'	=> "Lucida Sans Unicode, Lucida Grande, sans serif",
			'MarketingScriptRegular'													=> "Marketing script",
			'PTSansRegular,Arial,Verdana, Geneva,Helvetica,  sans serif' 	=> "PTSans",
			'PTSansBold,Arial,Verdana, Geneva,Helvetica,  sans serif' 		=> "PTSans Bold",
			'PTSerifRegular'																=> "PTSerif",
			'PTSerifBold'																	=> "PTserif Bold",
			'Tahoma, Geneva, Helvetica, sans serif' 								=> "Tahoma, Geneva, sans serif",
			'TinosRegular'																	=> "Tinos",
			'TinosBold'																		=> "Tinos Bold",
			'Trebuchet MS, Arial, Helvetica, sans serif'							=> "Trebuchet MS, sans serif",
			'UbuntuRegular,Arial,Verdana,Helvetica,  sans serif' 				=> "Ubuntu",
			'UbuntuBold,Arial,Verdana,Helvetica,  sans serif' 					=> "Ubuntu Bold",
			'Verdana, Geneva,Helvetica,  sans serif' 								=> "Verdana, Geneva",
			'YanoneKaffeesatz, Arial,Helvetica,  sans serif' 					=> "YanoneKaffeesatz",
			);



$options = array (
						
		// GLOBAL SETTINGS
		
		array(
				"name" => "Config panel",
				"type" => "heading"),
		
		array("name" => "Enable config panel",
			  "desc" => "Enable the config panel on the site for testing colors etc.",
				"id" => $shortname."_enable_config",
				"type" => "checkbox"),
		/*				  
		array(
				"name" => "Demo content",
				"type" => "heading"),
		
		
		array("name" => "Install demo content",
				"desc" => "Here you can install demo content that you can use as examples when building your site. You can also uninstall these pages/posts at a later time. <br/><br/><i>For the uninstall to work, you can not change the page title/name</i>",
				"id" => "calibra_theme_activated",
				"type" => "setupactivation",
				"std" => "Select option:",
				"options" =>  array(	'install' => "Install demo content",
											'uninstall' => "Uninstall demo content"),
				
				),*/
		
	
		array(
				"name" => "Header",
				"type" => "heading"),
		
		
		array(
				"name" => "Logo image",
				"desc" => "Add your logo here. Max width for logo is 260 pixels",
				"id" => $shortname."_logo_url",
				"type" => "upload"),
		
		array(
				"name" => "Logo margin top",
				"desc" => "Here you can add top margin to your logo to make it align properly with the menus.",
				"id" => $shortname."_logo_margin_top",
				"type" => "text"),
		
		array(
				"name" => "Logo margin bottom",
				"desc" => "Here you can add bottom margin to your logo to make it align properly with the menus.",
				"id" => $shortname."_logo_margin_bottom",
				"type" => "text"),
		
		array(
				"name" => "Logo margin left",
				"desc" => "",
				"id" => $shortname."_logo_margin_left",
				"type" => "text"),
		
		
		array(
				"name" => "Search field top margin",
				"desc" => "",
				"id" => $shortname."_search_margin",
				"type" => "text"),
		
		
		
		array(
				"name" => "Global elements",
				"type" => "heading"),
		
		array("name" => "Header search form",
			  "desc" => "Hide search form in header",
				"id" => $shortname."_disable_search_header",
				"type" => "checkbox"),
		
		array("name" => "Footer search form",
			  "desc" => "Hide search form in footer",
				"id" => $shortname."_disable_search_footer",
				"type" => "checkbox"),
		
		array("name" => "Disable/hide social media icons",
			  "desc" => "Check this if you want to disable/hide the social media icons",
				"id" => $shortname."_disable_smi",
				"type" => "checkbox"),
		
		array("name" => "Disable dropdown in main menu",
			  "desc" => "Check this if you want to disable the dropdown functionality in the main navigation",
				"id" => $shortname."_dropdown",
				"type" => "checkbox"),
		
		array("name" => "Disable footer",
			  "desc" => "Check this if you want to disable the footer widgets",
				"id" => $shortname."_footer",
				"type" => "checkbox"),
		
		
		
		
		array(
				"name" => "Footer Copyright Text",
				"desc" => "This is the copyright-notice on the bottom of all pages.",
				"id" => $shortname."_credits",
				"type" => "text"),
				
		array(
				"name" => "Contact Form Mail",
				"desc" => "Please write an email-adress for contact form submissions.",
				"id" => $shortname."_form_mail",
				"type" => "text"),
		
		array("name" => "Google Analytics Tracking Code",
				 "desc" => "dfdsf",
				"id" => $shortname."_analytics",
				"type" => "textarea"),
		

		// SLIDERS
		
		array("type" => "break"),

		array(
				"name" => "Slideshow",
				"type" => "heading"),
		
		array(
				"name" => "Display slideshow on home page",
				"desc" => "Check this to display slideshow",
				"id" => $shortname."_home_slideshow",
				"type" => "checkbox"),
		
		array("name" => "Select category for home page slider ",
				"id" => $shortname."_home_slideshow_category",
				"options" => $phi_getSlideTerms,
				"type" => "select"),
		

		array("name" => "Select slideshow type ",
				"id" => $shortname."_home_slideshow_type",
				"options" =>  array(
								"cycle"		=>	    "Cycle slider",
								"accordion"	=>	    "Accordion slider",
								"nivo"		=>	    "Nivo slider",
								
											),
				

				"type" => "select"), 
		
		array(
				"name" => "Cycle slider settings",
				"type" => "heading"),
				
							
		array("name" => "Transition effect ",
				"id" => $shortname."_cycle_slider_effect",
				"options" =>  array(
								"blindX"	=>	    "blindX",
								"blindY"	=>	    "blindY",
								"blindZ"	=>	    "blindZ",
								"cover"	=>	    "cover",
								"curtainX"	=>	    "curtainX",
								"curtainY"	=>	    "curtainY",
								"fade"	=>	    "fade",
								"fadeZoom"	=>	    "fadeZoom",
								"growX"	=>	    "growX",
								"growY"	=>	    "growY",
								"none"	=>	    "none",
								"scrollUp"	=>	    "scrollUp",
								"scrollDown"	=>	    "scrollDown",
								"scrollLeft"	=>	    "scrollLeft",
								"scrollRight"	=>	    "scrollRight",
								"scrollHorz"	=>	    "scrollHorz",
								"scrollVert"	=>	    "scrollVert",
								"shuffle"	=>	    "shuffle",
								"slideX"	=>	    "slideX",
								"slideY"	=>	    "slideY",
								"toss"	=>	    "toss",
								"turnUp"	=>	    "turnUp",
								"turnDown"	=>	    "turnDown",
								"turnLeft"	=>	    "turnLeft",
								"turnRight"	=>	    "turnRight",
								"uncover"	=>	    "uncover",
								"wipe"	=>	    "wipe",
								"zoom"	=>	    "zoom",
											),
				

				"type" => "select"), 
		
		array(
				"name" => "Autoplay interval",
				"desc" => "Enter value in milliseconds. Set to 0 if you want to disable autoslides.",
				"id" => $shortname."_cycle_slider_timeout",
				"type" => "text"),
		
		
		array(
				"name" => "Nivo slider settings",
				"type" => "heading"),
				
							
		array("name" => "Transition effect ",
				"id" => $shortname."_nivo_slider_effect",
				"options" =>  array(
								"sliceDown"			=>	    "sliceDown",
								"sliceDownLeft"	=>	    "sliceDownLeft",
								"sliceUp"			=>	    "sliceUp",
								"sliceUpLeft"		=>	    "sliceUpLeft",
								"sliceUpDown"		=>	    "sliceUpDown",
								"sliceUpDownLeft"	=>	    "sliceUpDownLeft",
								"fold"				=>	    "fold",
								"fade"				=>	    "fade",
								"random"				=>	    "random",
								),
				
				
				"type" => "select"), 
		
		array(
				"name" => "Nivo autoplay interval",
				"desc" => "Enter value in milliseconds.",
				"id" => $shortname."_nivo_slider_timeout",
				"type" => "text"),
		
		array(
				"name" => "Slices",
				"desc" => "How many slices do you want in the animation?",
				"id" => $shortname."_nivo_slider_slices",
				"type" => "text"),
		
	
		
		
		array(
				"name" => "Accordion slider settings",
				"type" => "heading"),
		
		array(
				"name" => "Hide excerpt",
				"desc" => "Hide excerpt text in accordion slider",
				"id" => $shortname."_hide_accordion_excerpt",
				"type" => "checkbox"),
		
		
		
		
		
		
		
		
		// HOME PAGE SETTINGS
		
		array("type" => "break"),
		
		
		array(
				"name" => "Home page article 1",
				"type" => "heading"),
		
		array(
				"name" => "Display article 1",
				"desc" => "Display article on the left",
				"id" => $shortname."_display_home_article_1",
				"type" => "checkbox"),
		
		array(
				"name" => "Select page for article 1",
				"desc" => "",
				"id" => $shortname."_home_article_1",
				"options" =>  $phi_getpages,
				"type" => "select"
				), 
		
		array(
				"name" => "What text to display",
				"desc" => "",
				"id" => $shortname."_home_article_1_format",
				"options" =>  array(
								'excerpt' => 'Page excerpt',
								'content' => 'Page content'),
				"type" => "select"
				), 
		
		array(
				"name" => "Home page article 2",
				"type" => "heading"),
		
		array(
				"name" => "Display article 2 text",
				"desc" => "Display article on the right",
				"id" => $shortname."_display_home_article_2",
				"type" => "checkbox"),
		
		array(
				"name" => "Select page for article 2",
				"desc" => "",
				"id" => $shortname."_home_article_2",
				"options" =>  $phi_getpages,
				"type" => "select"
				), 
		
		array(
				"name" => "What text to display",
				"desc" => "",
				"id" => $shortname."_home_article_2_format",
				"options" =>  array(
								'excerpt' => 'Page excerpt',
								'content' => 'Page content'),
				"type" => "select"
				), 
		
		
		array(
				"name" => "Tab panel ",
				"type" => "heading"),
		
		array(
				"name" => "Show tab panel on home page",
				"desc" => "Display the tab panel on the home page",
				"id" => $shortname."_home_tabs",
				"type" => "checkbox"),
		
		array(
				"name" => "Character limit for testimonial in tab panel",
				"desc" => "Enter the max number of letters to display in the testimonials. Leave empty if you do not want to limit to any spesific number.",
				"id" => $shortname."_home_testimonial_charlimit",
				"type" => "text"),
		
		
		
		array(
				"name" => "Featured pages",
				"type" => "heading"),
		
		array(
				"name" => "Header for featured pages",
				"desc" => "",
				"id" => $shortname."_home_featured_title",
				"type" => "text"),
		
		array(
				"name" => "Display featured pages on home page",
				"desc" => "Display featured pages in the home page content area",
				"id" => $shortname."_home_featured",
				"type" => "checkbox"),
		
		array(
				"name" => "Character limit in excerpt",
				"desc" => "Max number of characters in excerpt.",
				"id" => $shortname."_featured_charlimit",
				"type" => "text"),
		
		
		
		
		array(
				"name" => "Home page blog posts",
				"type" => "heading"),
		
		
		array(
				"name" => "Display blog on home page",
				"desc" => "Display blog posts on home page",
				"id" => $shortname."_home_blog",
				"type" => "checkbox"),
		
		array(
				"name" => "Header for home page blog",
				"desc" => "",
				"id" => $shortname."_home_blog_header",
				"type" => "text"),
		
		array(
				"name" => "Post per page for blog posts on home page",
				"desc" => "Enter how many blog posts you want to display on home page",
				"id" => $shortname."_home_blog_pager",
				"type" => "text"),
		
		array(
				"name" => "Blog layout",
				"id" => $shortname."_home_blog_layout",
				"type" => "select",
				"std" => "Select option:",
				"options" =>  array(	'normal' => "Normal (With sidebar)",
											'fullwidth' => "Fullwidth (No sidebar)"),
				),
		
		array(
				"name" => "Character limit in excerpt",
				"desc" => "Max number of characters in excerpt.",
				"id" => $shortname."home_blog_charlimit",
				"type" => "text"),
		
		// PORTFOLIO PAGE SETTINGS
		
		array("type" => "break"),
		
				array(
				"name" => "Options for portfolio-pages",
				"type" => "heading"),
						
				array(
				"name" => "Portfolio excerpt",
				"desc" => "Hide excerpt in portfolio pages",
				"id" => $shortname."_disable_portfolioexcerpt",
				"type" => "checkbox"),
				
				array(
				"name" => "Character limit in excerpt",
				"desc" => "Max number of characters in excerpt.",
				"id" => $shortname."_portfolio_charlimit",
				"type" => "text"),
		
				array(
				"name" => "Thumbnail behaviour when clicked",
				"desc" => "Choose if you want to link thumbnail to the post or to enlarge the thumbnail in  prettyPhoto lightbox. Default behaviour is enlargement",
				"id" => $shortname."_thumbnail_click",
				"type" => "select",
				"std" => "Select option:",
				"options" =>  array(	'prettyPhoto' => "Enlarge image",
											'permalink' => "Open post"),
				),
				
				array(
				"name" => "Post order",
				"desc" => "Choose if you want to link thumbnail to the post or to enlarge the thumbnail in  prettyPhoto lightbox. Default behaviour is enlargement",
				"id" => $shortname."_portfolio_order",
				"type" => "select",
				"std" => "Select option:",
				"options" =>  array(	'DESC' => "Descending",
											'ASC' => "Ascending"),
				),
		
		
		// BLOG PAGE SETTINGS
		
		
		array("type" => "break"),
		
				array(
				"name" => "Options for Blog",
				"desc" => "Settings for Blog-page, archive-pages, category-pages, tag-pages etc",
				"type" => "heading"),
				
				array(
				"name" => "Blog layout",
				"id" => $shortname."_blog_layout",
				"type" => "select",
				"std" => "Select option:",
				"options" =>  array(	'normal' => "Normal (With sidebar)",
											'fullwidth' => "Fullwidth (No sidebar)"),
				),
							
				array(
				"name" => "Posts per page on blog pages",
				"desc" => "Enter the number of post you want to show per page on Blog-page, archive-pages, category-pages, tag-pages etc",
				"id" => $shortname."_blog_pager",
				"type" => "text"),
				
				array(
				"name" => "Display author info in posts",
				"desc" => "Displays a container with author info below the post content",
				"id" => $shortname."_display_authorbox",
				"type" => "checkbox"),
				
				array(
				"name" => "Display related posts",
				"desc" => "Displays a list of related posts below the post content.",
				"id" => $shortname."_display_related",
				"type" => "checkbox"),
				
				array(
				"name" => "Hide publish date in post-meta",
				"desc" => "Hide publish date in post meta on Blog-page, archive-pages, category-pages, tag-pages etc",
				"id" => $shortname."_display_publishdate",
				"type" => "checkbox"),
				
				array(
				"name" => "Hide author in  meta",
				"desc" => "Hide author in post meta on Blog-page, archive-pages, category-pages, tag-pages etc",
				"id" => $shortname."_display_author",
				"type" => "checkbox"),
				
				array(
				"name" => "Hide categories in post-meta",
				"desc" => "Hide categories in post meta on Blog-page, archive-pages, category-pages, tag-pages etc",
				"id" => $shortname."_display_categories",
				"type" => "checkbox"),
				
				array(
				"name" => "Display post content in listing",
				"desc" => "Display post content instead of excerpt on Blog-page, archive-pages, category-pages, tag-pages etc",
				"id" => $shortname."_display_postcontent",
				"type" => "checkbox"),
				
				array(
				"name" => "Character limit in excerpt",
				"desc" => "Max number of characters in excerpt.",
				"id" => $shortname."_blog_charlimit",
				"type" => "text"),
				
		// NEWS PAGE SETTINGS
		
		
		array("type" => "break"),
		
				array(
				"name" => "Options for News",
				//"desc" => "Settings for news page",
				"type" => "heading"),
							
				array(
				"name" => "Posts per page on news pages",
				"desc" => "Enter the number of post you want to show per page on news-page",
				"id" => $shortname."_news_pager",
				"type" => "text"),
				
				array(
				"name" => "Posts per page on news archive pages",
				"desc" => "Enter the number of post you want to show per page on news-archive page",
				"id" => $shortname."_news_archive_pager",
				"type" => "text"),
				
				array(
				"name" => "Character limit in excerpt",
				"desc" => "Max number of characters in excerpt.",
				"id" => $shortname."_news_charlimit",
				"type" => "text"),
				
		// TESTIMONIAL PAGE SETTINGS
		
		
		array("type" => "break"),
		
				array(
				"name" => "Options for testimonials",
				//"desc" => "Settings for testimonial page",
				"type" => "heading"),
							
				array(
				"name" => "Posts per page on testimonial page",
				"desc" => "Enter the number of post you want to show per page on testimonial-page",
				"id" => $shortname."_testimonial_pager",
				"type" => "text"),
				
				array(
				"name" => "Character limit in excerpt",
				"desc" => "Max number of characters in excerpt.",
				"id" => $shortname."_testimonial_charlimit",
				"type" => "text"),
				
		// FAQ  SETTINGS
		
		
		array("type" => "break"),
		
				array(
				"name" => "Options for FAQ",
				//"desc" => "Settings for FAQ pages",
				"type" => "heading"),
							
				array(
				"name" => "Number of posts to show on the first tab",
				"desc" => "Enter number",
				"id" => $shortname."_faq_pager",
				"type" => "text"),
				
				
				array(
				"name" => "Name for first tab",
				"desc" => "Enter name/text for the first tab that displays all the latest questions",
				"id" => $shortname."_faq_tab_name",
				"type" => "text"),
				
				
				
		
		// SOCIAL MEDIA SETTINGS
				
		array("type" => "break"),
		
				array(
				"name" => "Social media buttons ",
				"type" => "heading"),
		
				array(
				"name" => "Social media button 1 ",
				"type" => "subheading"),
		
				array(
				"name" => "Social media icon 1",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_1",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 1 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_1",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 1 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_1",
				"type" => "text"),
		
				array(
				"name" => "Social media button 2 ",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 2",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_2",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 2 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_2",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 2 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_2",
				"type" => "text"),
		
				array(
				"name" => "Social media button 3 ",
				"type" => "subheading"),

				array(
				"name" => "Social media icon 3",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_3",
				"type" => "upload"),
			
				array(
				"name" => "Social media icon 3 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_3",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 3 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_3",
				"type" => "text"),
		
				array(
				"name" => "Social media button 4 ",
				"type" => "subheading"),
		
				array(
				"name" => "Social media icon 4",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_4",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 4 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_4",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 4 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_4",
				"type" => "text"),
				
				array(
				"name" => "Social media button 5 ",
				"type" => "subheading"),
		
		
				array(
				"name" => "Social media icon 5",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_5",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 5 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_5",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 5 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_5",
				"type" => "text"),
		
				array(
				"name" => "Social media button 6 ",
				"type" => "subheading"),
		
		
				array(
				"name" => "Social media icon 6",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_6",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 6 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_6",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 6 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_6",
				"type" => "text"),
		
				array(
				"name" => "Social media button 7",
				"type" => "subheading"),
		
		
				array(
				"name" => "Social media icon 7",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_7",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 7 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_7",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 7 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_7",
				"type" => "text"),
		
				array(
				"name" => "Social media button 8 ",
				"type" => "subheading"),
				
				array(
				"name" => "Social media icon 8",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_8",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 8 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_8",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 8 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_8",
				"type" => "text"),
		
				array(
				"name" => "Social media button 9 ",
				"type" => "subheading"),
		
		
				array(
				"name" => "Social media icon 9",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_9",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 9 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_9",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 9 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_9",
				"type" => "text"),
		
				array(
				"name" => "Social media button 10 ",
				"type" => "subheading"),
		
		
				array(
				"name" => "Social media icon 10",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_10",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 10 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_10",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 10 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_10",
				"type" => "text"),
				
				
				// STYLE AND LAYOUT SETTINGS
				
				array("type" => "break"),
				
				array(
				"name" => "Skins/colors",
				"desc" => "",
				"type" => "heading"),



				

		array(	"name" => "Colour Scheme",
					"id" => $shortname."_mycolourscheme",
					"type" => "select",
					"std" => "Choose a colour scheme:",
						"options" =>  array(
												'default'			=> "Default",
												'arcticblue' 		=> "Arctic blue",
												'coffee' 			=> "Coffee",
												'latte' 				=> "Latte",
												'light' 				=> "Light",	
												'olive' 				=> "Olive",
												'bloodandgreen' 	=> "Blood red and green"
												),
				),
		
		array(
				"name" => "Background",
				"desc" => "Here you define background colors for various parts of the theme.",
				"type" => "subheading"),
		
		array(	"name" => "Background image",
				"desc" => "Choose background image. The hex color code for each background is what you should set the custom page background color to, so the slideshow image border displays nicely.",
				"id" => $shortname."_listed_background_image",
				"type" => "select",
				"std" => "Pick an image:",
					"options" =>  array(		
												
												'/lib/img/patterns/medium_grey_grunge.jpg' =>"Grunge - Medium grey",
												'/lib/img/patterns/dark_tan_grunge.jpg' =>"Grunge - Dark tan",
												'/lib/img/patterns/black_wood.jpg' =>"Wood - Black",
												'/lib/img/patterns/dark_wood.jpg' =>"Wood - Dark",
												'/lib/img/patterns/narrow_wood_black.jpg' =>"Narrow wood - Black",
												'/lib/img/patterns/narrow_wood_grey.jpg' =>"Narrow wood - Dark grey",
												'/lib/img/patterns/narrow_wood_grey.jpg' =>"Narrow wood - Grey",
												'/lib/img/patterns/narrow_wood_light.jpg' =>"Narrow wood - Light grey",
												'/lib/img/patterns/rough_wood_medium_tan.jpg' =>"Rough wood - Medium tan",
												'/lib/img/patterns/rough_wood_dark_tan.jpg' =>"Rough wood - Dark tan",
												'/lib/img/patterns/rough_wood_black_tan.jpg' =>"Rough wood - Black tan)",
												'/lib/img/patterns/concrete_light_grey.jpg' =>"Concrete - Light grey",
												'/lib/img/patterns/concrete_medium_grey.jpg' =>"Concrete - Medium grey",
												'/lib/img/patterns/concrete_dark_grey.jpg' =>"Concrete - Dark grey",
												'/lib/img/patterns/stone_black.jpg' =>"Stone - Black (#000)",
												'/lib/img/patterns/stripes_vert_wide.png' =>"Stripes wide vertical",
												'/lib/img/patterns/stripes_vert_narrow.png' =>"Stripes narrow vertical",
												'/lib/img/patterns/stripes_hor_wide.png' =>"Stripes wide horisontal",
												'/lib/img/patterns/stripes_hor_narrow.png' =>"Stripes narrow horisontal",
												'/lib/img/patterns/stripes_diagonal.png' =>"Stripes diagonal",
												'/lib/img/patterns/circles_small.png' =>"Small circles",
												'/lib/img/patterns/cross_small.png' =>"Small crosses",
												'/lib/img/patterns/square_small.png' =>"Small squares",
									
												
												'' => "No background image",
																		
											),
				),
		
		array(
				"name" => "Custom page background image",
				"desc" => "If you want another image for page background, add image here",
				"id" => $shortname."_custom_background_image",
				"type" => "upload"),
		
		
		
		
		array("name" => "Disable tiled background",
			  "desc" => "Check this if you do not want the background image to tile/repeat",
				"id" => $shortname."_disable_tiled_background",
				"type" => "checkbox"),
			
		
		
		
		array(
				"name" => "Custom page background color",
				"desc" => "Click on the input field to open the colorpicker",
				"id" => $shortname."_custom_background_color",
				"type" => "colorpicker"),
		
		
		
		

		array(
				"name" => "Custom footer background color",
				"desc" => "Click on the input field to open the colorpicker",
				"id" => $shortname."_custom_background_footer",
				"type" => "colorpicker"),
		
		array(
				"name" => "Primary menu background-color",
				"desc" => "Click on the input field to open the colorpicker",
				"id" => $shortname."_primary_menu_color",
				"type" => "colorpicker"),
		
		array(
				"name" => "Link color",
				"desc" => "Click on the input field to open the colorpicker",
				"id" => $shortname."_custom_link_color",
				"type" => "colorpicker"),
		

		array(
				"name" => "Link color on hover",
				"desc" => "Click on the input field to open the colorpicker",
				"id" => $shortname."_custom_link_hover_color",
				"type" => "colorpicker"),
		
		array(
				"name" => "Button color",
				"desc" => "Click on the input field to open the colorpicker",
				"id" => $shortname."_custom_button_color",
				"type" => "colorpicker"),
		
		array(
				"name" => "Button color on hover",
				"desc" => "Click on the input field to open the colorpicker",
				"id" => $shortname."_custom_button_hover_color",
				"type" => "colorpicker"),
		
		array(
				"name" => "Sidebar",
				"type" => "subheading"),
		
		array(
				"name" => "Sidebar position",
				"desc" => "You can override the stylesheet definitions for colors on links and buttons here by adding a hex color code.",
				"id" => $shortname."_sidebarposition",
				"type" => "select",
				"options" =>  array(
												'left' => "Left",
												'right' => "Right",
									),
				),
		
		
		// FONTS
				
			array("type" => "break"),
		
		
			array(
				"name" => "Font options",
				"type" => "subheading"),
		
			
			
			
		array(
				"name" => "Html header font",
				"desc" => "Select which font set to use for h1, h2, h3 and h4.",
				"id" => $shortname."_titlefont",
				"type" => "select",
				"options" => $phi_fonts
				),
		
		
			array(
				"name" => "Menu font",
				"desc" => "Font for  main menu, Tab panel buttons and Quotes",
				"id" => $shortname."_menufont",
				"type" => "select",
				"options" =>  $phi_fonts
				),
		
				array(	"name" => "Html  font",
				"desc" => "Select which font set to use for paragraph and lists",
				"id" => $shortname."_htmlfont",
				"type" => "select",
				"options" =>  $phi_fonts
				),
				
				
				
		
		array("name" => "Menu font size",
				"desc" => "Font size for main menu, tab panel buttons and quotes",
				"id" => $shortname."_mainmenu",
				"type" => "select",
				"options" =>  $phi_fontsizes
				),
		
		array("name" => "H1 Font size",
				"id" => $shortname."_h1",
				"type" => "select",
				"options" =>  $phi_fontsizes
				),
		
		array("name" => "H2 Font size",
				"id" => $shortname."_h2",
				"type" => "select",
				"options" =>  $phi_fontsizes
				),
		
			array(
				"name" => "H3 Font size",
				"id" => $shortname."_h3",
				"type" => "select",
				"options" =>  $phi_fontsizes
				),
			
			array(
				"name" => "H4 Font size",
				"id" => $shortname."_h4",
				"type" => "select",
				"options" =>  $phi_fontsizes
				),
			
				array(
				"name" => "H5 Font size",
				"id" => $shortname."_h5",
				"type" => "select",
				"options" =>  $phi_fontsizes
				),
			
				array(
				"name" => "H6 Font size",
				"id" => $shortname."_h6",
				"type" => "select",
				"options" =>  $phi_fontsizes
				),
			
				array("name" => "Paragraph font size",
				"desc" => "Enter a value. Default is 12px",
				"id" => $shortname."_p",
				"type" => "select",
				"options" =>  $phi_fontsizes
				),
				
				
				// IMAGE SETTINGS
				
				array("type" => "break"),
				
				array(
				"name" => "Options for image resizing/cropping",
				"desc" => "",
				"type" => "heading"),
				
				
		array(
				"name" => "Image resizing",
				"type" => "heading"),
		
		
		array("name" => "Image resizing",
				"desc" => "Decide what kind of resizing script you want for your images. Wordpress default renders quicker, but the images are resized on upload. Timthumb resizes on the fly, but renders slower",
				"id" => $shortname."_resize",
				"type" => "select",
				"std" => "Select option:",
				"options" =>  array(	'timthumb' => "Timthumb resizing",
											'wordpress' => "Wordpress default"),
				
				),
		
	
			
		array(
				"name" => "Image heights",
				"type" => "subheading"),
		
		
		array(
				"name" => "Height of images in slider",
				"desc" => "Width 620px",
				"id" => $shortname."_slider_image_height",
				"type" => "text"),
		
		
		array(
				"name" => "Height of images in blog / archive / category -pages",
				"desc" => "Width 300px",
				"id" => $shortname."_blog_image_height",
				"type" => "text"),
		
				
		array(
				"name" => "Height of auto-generated images in content area of single-post and pages",
				"desc" => "Width 620px",
				"id" => $shortname."_post_image_height",
				"type" => "text"),
		
		array(
				"name" => "Height of auto-generated large images on top of pages and posts single-post",
				"desc" => "Width 940px",
				"id" => $shortname."_post_large_image_height",
				"type" => "text"),
		
	
		array(
				"name" => "Height of thumbnail images in 5-column gallery / portfolio layouts",
				"desc" => "Width 220px",
				"id" => $shortname."_fifth_image_height",
				"type" => "text"),
		
		
		array(
				"name" => "Height of thumbnail images in 4-column gallery / portfolio layouts",
				"desc" => "Width 220px",
				"id" => $shortname."_fourth_image_height",
				"type" => "text"),
		
		array(
				"name" => "Height of thumbnail images in 3-column gallery / portfolio layouts",
				"desc" => "Width 300px",
				"id" => $shortname."_third_image_height",
				"type" => "text"),
		
		array(
				"name" => "Height of thumbnail images in 2-column gallery / portfolio layouts",
				"desc" => "Width 460px",
				"id" => $shortname."_half_image_height",
				"type" => "text"),
		
				
		array(
				"name" => "Height of thumbnails on home page",
				"desc" => "Width 300px",
				"id" => $shortname."_home_thumbnail",
				"type" => "text"),
		
	
		
	
		
);



$this_file="options.php";
if ( 'save' == $_REQUEST['action'] & 'options.php' == $_REQUEST['page'] ) {
		foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  ); } else { delete_option( $value['id'] ); } }
		
	
		
			header("Location:?page=".$_REQUEST['page'] ."&saved=true");

							
			
				
				if($_REQUEST['phi_blog_ex_cat']!=""){
							$slider_category_final="";
							foreach($_REQUEST['phi_blog_ex_cat']  as $slider_category) {
									$slider_category_final .= $slider_category .",";
							}
							update_option( "phi_blog_ex_cat[]", $slider_category_final);
						}
				

		die;
}

function phi_general(){	

	global $options;
	admin_head_addition();
	$ca=phi_menu('1');
	echo $ca;
	phi_generate_form($options);
	
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="saviour"><p><strong>Saving...</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="saviour"><p><strong> settings reset.</strong></p></div>';
	
}?>