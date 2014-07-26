<?php

/******************************************************************/
/*	Grid Gallery							      				  */
/******************************************************************/

function postgallery_grid_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'content' => '',
	  'filtering' => '',
	  'columns' => '',
	  'categories' => '',
	  'slidesetid' => '',  
	  'imageeffect' => '',
	  'height' => '',
	  'imgheight' => '',
	  'imgwidth' => '',	  
	  'id' => '',
	  'lightbox' => '',	  
	  'shadow' => '',
	  'limit' => '',
	  'excerpt' => '',
	  'orderby' => '',	  
	  'sortby' => '',	  
      ), $atts ) );


$DYN_slidesetid = esc_attr($slidesetid);
$DYN_groupgridcontent = esc_attr($content);
$DYN_gridfilter = esc_attr($filtering);
$DYN_galleryheight = esc_attr($height);
$DYN_gallerycat = esc_attr($categories);

if(!esc_attr($columns)) {
	$DYN_gridcolumns="3"; // Set default 3 Columns
} else {
	$DYN_gridcolumns = esc_attr($columns);
}

$DYN_shadowsize = esc_attr($shadow);
$DYN_imageeffect = esc_attr($imageeffect);

$DYN_imgheight = esc_attr($imgheight);
$DYN_imgwidth = esc_attr($imgwidth);

$DYN_lightbox = esc_attr($lightbox);

if(!$DYN_slidesetid) { // if not slide set data

$data_id = 0;
$postcount = 0;

if(esc_attr($limit)) { // Number of posts to display
	$numposts = esc_attr($limit);
} else {
	$numposts = -1;
}

if(esc_attr($excerpt)) {
	$DYN_galleryexcerpt = esc_attr($excerpt);
} else {
	$DYN_galleryexcerpt = "55";
}

if(esc_attr($sortby)) { // Sort Posts by
	$sortby = esc_attr($sortby);
} else {
	$sortby = "meta_value";
}

if(esc_attr($orderby)) { // Order Posts By
	$orderby = esc_attr($orderby);
} else {
	$orderby = "ASC";
}
if(esc_attr($categories)) {

	$cats = lTrim(esc_attr($categories),',');

	$cat_isnum = str_replace(",","", $cats); // join cats to check if numeric

	if (is_numeric ($cat_isnum)) { // backwards compatible with post id
		$cat_type= "cat";
	} else {
		$cat_type= "category_name"; // if not numeric, use category name
	}

   $args=array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'meta_key' => 'Order',
	$cat_type => $cats,
	'paged' => $paged,
	'orderby' => $sortby,
	'order' => $orderby,
	'posts_per_page' => $numposts,
	'caller_get_posts'=> 1
	);

	$featured_query = new wp_query($args); 

} else { // If no options select display all categories

$args=array(
      'post_type' => 'post',
      'post_status' => 'publish',
	  'meta_key' => 'Order',
	  'paged' => $paged,
      'caller_get_posts'=> 1, 
	  'orderby' => $sortby,
	  'order' => $orderby,
	  'posts_per_page' => $numposts
      );


	$featured_query = new wp_query($args);
} 


$post_count = $featured_query->post_count; // Check how many posts in query.

ob_start(); ?>
<div class="grid-gallery id-<?php echo esc_attr($id); ?> top">
<div class="gallerywrap clearfix">

<?php if($DYN_gallerycat && $DYN_gridfilter) { ?>
	<div class="splitter-wrap">
		<ul class="splitter <?php echo "id-".esc_attr($id); ?>">
			<li><?php _e('Filter By: ', 'DynamiX' ); ?>
				<ul>
					<li class="segment-1 selected-1 active"><a href="#" data-value="all"><?php _e('All', 'DynamiX' ); ?></a></li>
					<?php 
					$catcount=2;
					
					$DYN_gallerycat = explode(",", $DYN_gallerycat);
					
					if(is_array($DYN_gallerycat)) {
						foreach ($DYN_gallerycat as $catlist) { // Get category ID Array 
						
							if (is_numeric ($catlist)) { // backwards compatible with post id
								$catname = get_cat_name($catlist);
							} else {
								$catname = $catlist; // if not numeric, use category name
							}		
					$strip_html = preg_replace("/&#?[a-z0-9]+;/i","",$catname);	?>
					<li class="segment-<?php echo $catcount; ?>"><a href="#" data-value="<?php echo str_replace(" ","_",$strip_html).esc_attr($id); ?>"><?php echo $catname; ?></a></li>    										
					<?php	$catcount++; 
						} 
					} else { 
					
						if (is_numeric ($DYN_gallerycat)) { // backwards compatible with post id
							$catname = get_cat_name($DYN_gallerycat);
						} else {
							$catname = $DYN_gallerycat; // if not numeric, use category name
						}	

					$strip_html = preg_replace("/&#?[a-z0-9]+;/i","",$catname);	?>
					<li class="segment-<?php echo $catcount; ?>"><a href="#" data-value="<?php echo str_replace(" ","_",$strip_html).esc_attr($id); ?>"><?php echo $catname; ?></a></li>    
					<?php } ?>
				</ul>
			</li>
		</ul>
	</div>
<?php } ?>
<div id="cwz-sortable<?php echo "-".esc_attr($id); ?>">
<?php  
while ($featured_query->have_posts()) : $featured_query->the_post(); 

/******************  Get custom field data ******************/             

$categories='';

foreach((get_the_category($post->ID)) as $category) {
    $categories .= str_replace(" ","_",$category->cat_name).esc_attr($id). ' ';
	$categories = preg_replace("/&#?[a-z0-9]+;/i","",$categories);
}

$pdata = maybe_unserialize(get_post_meta( get_the_ID(), 'pgopts', true ));

$DYN_movieurl = $pdata["movieurl"]; // Movie File URL
$DYN_previewimgurl=$pdata["previewimgurl"]; // Preview Image URL
$DYN_imgzoomcrop=$pdata["imgzoomcrop"];
$DYN_disablegallink=$pdata["disablegallink"];
$DYN_disablereadmore=$pdata["disablereadmore"];
$DYN_galexturl=$pdata["galexturl"];
$DYN_videotype=$pdata["videotype"];
$DYN_videoautoplay=$pdata["videoautoplay"];
$DYN_cssclasses = $pdata["cssclasses"];

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}

if($DYN_videoautoplay) {
	$DYN_videoautoplay = "1";
} else {
	$DYN_videoautoplay ="0";	
}

/****************** / Get custom field data *****************/ 

$do_not_duplicate[] = get_the_ID();

$postcount++;
$data_id++;
$image = catch_image(); // Check for images within post 

$slide_id='';
$slide_id="slide-".get_the_ID().'-'. esc_attr($id);

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}
?>

<?php require CWZ_FILES .'/inc/grid-gallery-frame.php'; ?> 

<?php endwhile; 

wp_reset_query();

$postcount = 0;

$baseURL = get_permalink(); ?>
</div><!-- /cwz-sortable -->
<div class="clear"></div>


</div><!-- /gallerywrap -->
</div><!-- /postslider -->
<script type="text/javascript">
// Custom sorting plugin
(function($) {
  jQuery.fn.sorted = function(customOptions) {
    var options = {
      reversed: false,
      by: function(a) { return a.text(); }
    };
    jQuery.extend(options, customOptions);
    $data = $(this);
    arr = $data.get();
    arr.sort(function(a, b) {
      var valA = options.by(jQuery(a));
      var valB = options.by(jQuery(b));
      if (options.reversed) {
        return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;				
      } else {		
        return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;	
      }
    });
    return $(arr);
  };
})(jQuery);



(function($) {
$(document).ready(function() {
  
  var read_button = function(class_names) {
    var r = {
      selected: false,
      type: 0
    };
    for (var i=0; i < class_names.length; i++) {
      if (class_names[i].indexOf('selected-') == 0) {
        r.selected = true;
      }
      if (class_names[i].indexOf('segment-') == 0) {
        r.segment = class_names[i].split('-')[1];
      }
    };
    return r;
  };
  
  var determine_sort = function($buttons) {
    var $selected = $buttons.parent().filter('[class*="selected-"]');
    return $selected.find('a').attr('data-value');
  };
  
  var determine_kind = function($buttons) {
    var $selected = $buttons.parent().filter('[class*="selected-"]');
    return $selected.find('a').attr('data-value');
  };
  
  var $preferences = {
    duration: 800,
    easing: 'easeInOutQuad',
	  enhancement: function() {
		
		$('.grid-gallery #cwz-sortable<?php echo "-".esc_attr($id); ?> .galleryimg').append('<div class="hoverimg" style="height:inherit"></div>');	
		$('.grid-gallery #cwz-sortable<?php echo "-".esc_attr($id); ?> .galleryvid').append('<div class="hovervid" style="height:inherit"></div>');	
		
		$('.grid-gallery #cwz-sortable<?php echo "-".esc_attr($id); ?> .galleryimg,.grid-gallery #cwz-sortable<?php echo "-".esc_attr($id); ?> .galleryvid').hover(
				
				//Mouseover, fadeIn the hidden hover class	
				function() {
				$(this).children('div').css('display', 'block'); // FIX IE BUG	
				$(this).children('div').fadeTo("slow",0.6);
						
				}, 
			
				//Mouseout, fadeOut the hover class
				function() {
				$(this).children('div').fadeTo("fast",0, function() {
				});
				
				
			});
	
		
		$("#cwz-sortable<?php echo "-".esc_attr($id); ?> img.reflect").reflect({height:35,opacity:0.2});
				$("a[rel^='prettyPhoto']").prettyPhoto({
				keyboard_shortcuts: false,
				theme: 'light_rounded'
				});
	
		if ($.browser.msie && $.browser.version=="7.0" && typeof Cufon !== "undefined"){
			Cufon.replace('#cwz-sortable<?php echo "-".esc_attr($id); ?> h2');
		} else if(typeof Cufon !== "undefined") {
			Cufon.refresh();
		}

		$('#cwz-sortable<?php echo "-".esc_attr($id); ?> .gridimg-wrap').hover(function(e) {
				$(this).find('.title').hoverFlow(e.type, { height: "show" }, 400, "easeInOutCubic");
				}, function(e) {
				$(this).find('.title').hoverFlow(e.type, { height: "hide" }, 400, "easeInBack");
		});
		
		$('#cwz-sortable<?php echo "-".esc_attr($id); ?> .jwplayer').each(function(index) {
		
			str='';
			str = $(this).attr("id");
			if(str.search("video")==-1) {
			videodata = $('.viddata-'+str).attr('value');
			
			var videodata_array = new Array();
			
			videodata_array  = videodata.split(',');
			
				jwplayer(str).setup({
						'id': 'player_'+str,
						'width': '<?php echo $DYN_imgwidth; ?>',
						'height': '<?php echo $DYN_imgheight; ?>',
						'file': videodata_array[0],
						'stretching': 'exactfit',
						'image': videodata_array[1],
						'players': [
							{type: 'html5'},
							{type: 'flash', src: '<?php echo get_option('jwplayer_swf'); ?>'},
							{type: 'download'}
						]
				});
			}
		});
		
	}
  };
  
  var $list = $('div#cwz-sortable<?php echo "-".esc_attr($id); ?>');
  var $data = $list.clone();
  
  var $controls = $('ul.splitter.<?php echo "id-".esc_attr($id); ?> ul');
  
  $controls.each(function(i) {
    
    var $control = $(this);
    var $buttons = $control.find('a');
    
    $buttons.bind('click', function(e) {
      
      var $button = $(this);
      var $button_container = $button.parent();
      var button_properties = read_button($button_container.attr('class').split(' '));      
      var selected = button_properties.selected;
      var button_segment = button_properties.segment;

      if (!selected) {
		var cnt = $(".splitter.<?php echo "id-".esc_attr($id); ?> ul li").length+1; // Cycle through list and remove class
		for(var i=1; i<cnt; i++){
			$buttons.parent().removeClass('selected-'+i)
		}

        $buttons.parent().removeClass('active');
        $button_container.addClass('selected-' + button_segment).addClass('active');
        
        var sorting_type = determine_sort($controls.eq(1).find('a'));
        var sorting_kind = determine_kind($controls.eq(0).find('a'));
        
        if (sorting_kind == 'all') {
          var $filtered_data = $data.find('.panel');
        } else {
          var $filtered_data = $data.find('.panel.' + sorting_kind);
        }
        
        if (sorting_type == 'size') {
          var $sorted_data = $filtered_data.sorted({
            by: function(v) {
              return parseFloat($(v).find('span').text());
            }
          });
        } else {
          var $sorted_data = $filtered_data.sorted({
            by: function(v) {
              return $(v).find('strong').text().toLowerCase();
            }
          });
        }
        
        $list.quicksand($sorted_data, $preferences);
        
      }
      
      e.preventDefault();
    });
    
  }); 


});
})(jQuery);
</script>
<?php 
$output_string="";
$output_string=ob_get_contents();
ob_end_clean();

return $output_string;

} else { // get slide set
$postcount = 0;


$DYN_slidesetids = explode(",", $DYN_slidesetid);

if(is_array($DYN_slidesetids)) {
	foreach ($DYN_slidesetids as $DYN_slidesetid) { 
		$get_slideset = get_option("slideset_data_".$DYN_slidesetid);		
		$post_count = $post_count+$get_slideset['slideset_id_slide_count'];
		$get_slides_count=$get_slideset['slideset_id_slide_count'];
		
		$z = 0;
		$x = 0;
		$data_id = 0;
		
		while ($x < $get_slides_count):
			$filter_cats = explode(",", $get_slideset['slideset_id_catselect_'.$x]);
			
			foreach($filter_cats as $filter_cat) {
			$category_array[] = $filter_cat; // Enter Categories into an Array
			}
			$x++;
		endwhile; 
		
	}
} else {
	$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetids);
	$post_count = $get_slideset_data['slideset_id_slide_count'];	
		$get_slides_count=$get_slideset['slideset_id_slide_count'];
		
		$z = 0;
		$x = 0;
		$data_id = 0;
		
		while ($x < $get_slides_count):
			$filter_cats = explode(",", $get_slideset_data['slideset_id_catselect_'.$x]);
			
			foreach($filter_cats as $filter_cat) {
			$category_array[] = $filter_cat; // Enter Categories into an Array
			}
			$x++;
		endwhile; 
		
}

$category_array = array_unique($category_array);
asort($category_array);

ob_start(); ?>
<div class="grid-gallery id-<?php echo esc_attr($id); ?> top">
<div class="gallerywrap clearfix">

<?php

if($category_array && $DYN_gridfilter) { ?>
	<div class="splitter-wrap">
		<ul class="splitter <?php echo "id-".esc_attr($id); ?>">
			<li><?php _e('Filter By: ', 'DynamiX' ); ?>
				<ul>
					<li class="segment-1 selected-1 active"><a href="#" data-value="all"><?php _e('All', 'DynamiX' ); ?></a></li>
					<?php 
					$catcount=2;
					
					foreach ($category_array as $catname) { // Get category ID Array ?>
                    <?php if($catname) { ?>
					<li class="segment-<?php echo $catcount; ?>"><a href="#" data-value="<?php echo str_replace(" ","_",$catname).esc_attr($id); ?>"><?php echo $catname; ?></a></li>                    <?php }
					$catcount++; } ?>
				</ul>
			</li>
		</ul>
	</div>
<?php } ?>
<div id="cwz-sortable<?php echo "-".esc_attr($id); ?>">
<?php

foreach($DYN_slidesetids as $DYN_slidesetid) {
$z = 0;
$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetid);
$get_slides_count = $get_slideset_data['slideset_id_slide_count'];

while ($z < $get_slides_count):

/******************  Get Slide Set data ******************/ 	

$DYN_disablegallink="";

	
$DYN_movieurl = $get_slideset_data['slideset_id_videourl_'.$z]; // Movie File URL
$DYN_previewimgurl=$get_slideset_data['slideset_id_url_'.$z]; // Preview Image URL
$DYN_imgzoomcrop=strtolower($get_slideset_data['slideset_id_crop_'.$z]);
$DYN_cssclasses = $get_slideset_data['slideset_id_cssclasses_'.$z];

if(!$get_slideset_data['slideset_id_link_'.$z]) {
$DYN_disablegallink="yes";
} 

$DYN_disablereadmore=$get_slideset_data['slideset_id_disreadmore_'.$z];

$DYN_galexturl=$get_slideset_data['slideset_id_link_'.$z];
$DYN_videotype=strtolower($get_slideset_data['slideset_id_embed_'.$z]);

$DYN_videoautoplay=$get_slideset_data['slideset_id_autoplay_'.$z];
$DYN_posttitle=stripslashes($get_slideset_data['slideset_id_title_'.$z]);
$DYN_description=stripslashes($get_slideset_data['slideset_id_desc_'.$z]);

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}

if($DYN_videoautoplay) {
	$DYN_videoautoplay = "1";
} else {
	$DYN_videoautoplay ="0";	
}	

$categories_arr = $get_slideset_data['slideset_id_catselect_'.$z]; // Enter Categories into an Array

$categories_arr = explode(',',$categories_arr);
$categories='';
foreach($categories_arr as $category) {
	$categories .= $category.esc_attr($id).',';
}

$replace_arr = array(' ',',');
$replace_with= array('_',' '); 

$categories = str_replace($replace_arr,$replace_with,$categories);


/******************  / Get Slide Set data ******************/ 

$postcount++;
$data_id++; 

$slide_id='';
$slide_id="slideset".$slideset_id."-".$z.'-'.esc_attr($id);

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

?>


<?php require CWZ_FILES .'/inc/grid-gallery-frame.php'; ?>

<?php $z++;
endwhile;
}
$postcount = 0; ?>

</div><!-- /cwz-sortable -->

<div class="clear"></div>


</div><!-- /gallerywrap -->
</div><!-- /postslider -->
<script  type="text/javascript">


// Custom sorting plugin
(function($) {
  jQuery.fn.sorted = function(customOptions) {
    var options = {
      reversed: false,
      by: function(a) { return a.text(); }
    };
    jQuery.extend(options, customOptions);
    $data = $(this);
    arr = $data.get();
    arr.sort(function(a, b) {
      var valA = options.by(jQuery(a));
      var valB = options.by(jQuery(b));
      if (options.reversed) {
        return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;				
      } else {		
        return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;	
      }
    });
    return $(arr);
  };
})(jQuery);



(function($) {
$(document).ready(function() {
  
  var read_button = function(class_names) {
    var r = {
      selected: false,
      type: 0
    };
    for (var i=0; i < class_names.length; i++) {
      if (class_names[i].indexOf('selected-') == 0) {
        r.selected = true;
      }
      if (class_names[i].indexOf('segment-') == 0) {
        r.segment = class_names[i].split('-')[1];
      }
    };
    return r;
  };
  
  var determine_sort = function($buttons) {
    var $selected = $buttons.parent().filter('[class*="selected-"]');
    return $selected.find('a').attr('data-value');
  };
  
  var determine_kind = function($buttons) {
    var $selected = $buttons.parent().filter('[class*="selected-"]');
    return $selected.find('a').attr('data-value');
  };
  
  var $preferences = {
    duration: 800,
    easing: 'easeInOutQuad',
	  enhancement: function() {
		$('.grid-gallery #cwz-sortable<?php echo "-".esc_attr($id); ?> .galleryimg').append('<div class="hoverimg" style="height:inherit"></div>');	
		$('.grid-gallery #cwz-sortable<?php echo "-".esc_attr($id); ?> .galleryvid').append('<div class="hovervid" style="height:inherit"></div>');	
		
		$('.grid-gallery #cwz-sortable<?php echo "-".esc_attr($id); ?> .galleryimg,.grid-gallery #cwz-sortable<?php echo "-".esc_attr($id); ?> .galleryvid').hover(
				
				//Mouseover, fadeIn the hidden hover class	
				function() {
				$(this).children('div').css('display', 'block'); // FIX IE BUG	
				$(this).children('div').fadeTo("slow",0.6);
						
				}, 
			
				//Mouseout, fadeOut the hover class
				function() {
				$(this).children('div').fadeTo("fast",0, function() {
				});
				
				
			});

		$('#cwz-sortable<?php echo "-".esc_attr($id); ?> .gridimg-wrap').hover(function(e) {
				$(this).find('.title').hoverFlow(e.type, { height: "show" }, 400, "easeInOutCubic");
				}, function(e) {
				$(this).find('.title').hoverFlow(e.type, { height: "hide" }, 400, "easeInBack");
		});
	
		$("#cwz-sortable<?php echo "-".esc_attr($id); ?> img.reflect").reflect({height:35,opacity:0.2});
				$("a[rel^='prettyPhoto']").prettyPhoto({
				keyboard_shortcuts: false,
				theme: 'light_rounded'
				});
	
		if ($.browser.msie && $.browser.version=="7.0" && typeof Cufon !== "undefined"){
			Cufon.replace('#cwz-sortable<?php echo "-".esc_attr($id); ?> h2');
		} else if(typeof Cufon !== "undefined") {
			Cufon.refresh();
		}

	}
  };
  
  var $list = $('div#cwz-sortable<?php echo "-".esc_attr($id); ?>');
  var $data = $list.clone();
  
  var $controls = $('ul.splitter.<?php echo "id-".esc_attr($id); ?> ul');
  
  $controls.each(function(i) {
    
    var $control = $(this);
    var $buttons = $control.find('a');
    
    $buttons.bind('click', function(e) {
      
      var $button = $(this);
      var $button_container = $button.parent();
      var button_properties = read_button($button_container.attr('class').split(' '));      
      var selected = button_properties.selected;
      var button_segment = button_properties.segment;

      if (!selected) {
		var cnt = $(".splitter.<?php echo "id-".esc_attr($id); ?> ul li").length+1; // Cycle through list and remove class
		for(var i=1; i<cnt; i++){
			$buttons.parent().removeClass('selected-'+i)
		}

        $buttons.parent().removeClass('active');
        $button_container.addClass('selected-' + button_segment).addClass('active');
        
        var sorting_type = determine_sort($controls.eq(1).find('a'));
        var sorting_kind = determine_kind($controls.eq(0).find('a'));
        
        if (sorting_kind == 'all') {
          var $filtered_data = $data.find('.panel');
        } else {
          var $filtered_data = $data.find('.panel.' + sorting_kind);
        }
        
        if (sorting_type == 'size') {
          var $sorted_data = $filtered_data.sorted({
            by: function(v) {
              return parseFloat($(v).find('span').text());
            }
          });
        } else {
          var $sorted_data = $filtered_data.sorted({
            by: function(v) {
              return $(v).find('strong').text().toLowerCase();
            }
          });
        }
        
        $list.quicksand($sorted_data, $preferences);
        
      }
      
      e.preventDefault();
    });
    
  }); 

});
})(jQuery);
</script>
<?php 
$output_string="";
$output_string=ob_get_contents();
ob_end_clean();

return $output_string;

}

?>


<?php }


/******************************************************************/
/*	Group Slider							      				  */
/******************************************************************/

function postgallery_slider_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'content' => '',
	  'categories' => '',
	  'slidesetid' => '',
	  'imageeffect' => '',
	  'height' => '',
	  'imgheight' => '',
	  'imgwidth' => '',
	  'id' => '',
	  'lightbox' => '',	 
	  'shadow' => '', 
	  'limit' => '',
	  'excerpt' => '',
	  'orderby' => '',	  
	  'sortby' => '',
	  'timeout' => '', 	  
      ), $atts ) );
 
 
$DYN_slidesetid = esc_attr($slidesetid);
$DYN_groupgridcontent = esc_attr($content);
$DYN_gridfilter = esc_attr($filtering);
$DYN_galleryheight = esc_attr($height);
$DYN_gallerycat = esc_attr($categories);
$DYN_shadowsize = esc_attr($shadow);
$DYN_imageeffect = esc_attr($imageeffect);
$DYN_imgheight = esc_attr($imgheight);
$DYN_imgwidth = esc_attr($imgwidth);
$DYN_lightbox = esc_attr($lightbox);
$DYN_slidetimeout = esc_attr($timeout);

if(!$DYN_slidetimeout) $DYN_slidetimeout = "0"; else $DYN_slidetimeout = $DYN_slidetimeout * 1000;

if(esc_attr($excerpt)) {
	$DYN_galleryexcerpt = esc_attr($excerpt);
} else {
	$DYN_galleryexcerpt = "55";
}

if(!esc_attr($slidesetid)) { // if not slide set data

$postcount = 0;

$cats = lTrim($cats,',');

if(esc_attr($limit)) { // Number of posts to display
	$numposts = esc_attr($limit);
} else {
	$numposts = -1;
}

if(esc_attr($excerpt)) {
	$excerpt = esc_attr($excerpt);
} else {
	$excerpt = "55";
}


if(esc_attr($sortby)) { // Sort Posts by
	$sortby = esc_attr($sortby);
} else {
	$sortby = "meta_value";
}

if(esc_attr($orderby)) { // Order Posts By
	$orderby = esc_attr($orderby);
} else {
	$orderby = "ASC";
}

if(esc_attr($categories)) {

	$cats = lTrim(esc_attr($categories),',');

	$cat_isnum = str_replace(",","", $cats); // join cats to check if numeric

	if (is_numeric ($cat_isnum)) { // backwards compatible with post id
		$cat_type= "cat";
	} else {
		$cat_type= "category_name"; // if not numeric, use category name
	}

   $args=array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'meta_key' => 'Order',
	$cat_type => $cats,
	'paged' => $paged,
	'orderby' => $sortby,
	'order' => $orderby,
	'posts_per_page' => $numposts,
	'caller_get_posts'=> 1
	);
	$featured_query = new wp_query($args); 

} else { // If no options select display all categories

$args=array(
      'post_type' => 'post',
      'post_status' => 'publish',
	  'meta_key' => 'Order',
	  'paged' => $paged,
      'caller_get_posts'=> 1,	  
	  'orderby' => $sortby,
	  'order' => $orderby,
	  'posts_per_page' => $numposts
      );


	$featured_query = new wp_query($args);
} 


$post_count = $featured_query->post_count; // Check how many posts in query.

ob_start(); ?>

<div class="post-slider id-<?php echo esc_attr($id); ?> top">
<div class="gallery-wrap clearfix" <?php if(esc_attr($height)) { ?> style="height: <?php echo esc_attr($height); ?>px" <?php } else { ?> style="height:300px;" <?php } ?>>
<div class="slidernav-right">
<?php if($post_count>"3") { ?>
	<div class="slidernav">
		<a id="rightnav-<?php echo esc_attr($id); ?>" href="#"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="22" height="32" alt="navigate left" /></a>
	</div>
<?php } ?>
</div>

	<div class="slidernav-left">
<?php if($post_count>"3") { ?>
		<div class="slidernav">
			<a id="leftnav-<?php echo esc_attr($id); ?>" href="#"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="22" height="32" alt="navigate left" /></a>
		</div>
<?php } ?>
	</div>
     
	<div class="post-slide">

<?php 
while ($featured_query->have_posts()) : $featured_query->the_post(); 

/******************  Get custom field data ******************/             

$pdata = maybe_unserialize(get_post_meta( get_the_ID(), 'pgopts', true ));

$DYN_movieurl = $pdata["movieurl"]; // Movie File URL
$DYN_previewimgurl=$pdata["previewimgurl"]; // Preview Image URL
$DYN_imgzoomcrop=$pdata["imgzoomcrop"];
$DYN_disablegallink=$pdata["disablegallink"];
$DYN_disablereadmore=$pdata["disablereadmore"];
$DYN_galexturl=$pdata["galexturl"];
$DYN_videotype=$pdata["videotype"];
$DYN_videoautoplay=$pdata["videoautoplay"];
$DYN_cssclasses = $pdata["cssclasses"];

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}

if($DYN_videoautoplay) {
	$DYN_videoautoplay = "1";
} else {
	$DYN_videoautoplay ="0";	
}

/****************** / Get custom field data *****************/ 

$do_not_duplicate[] = get_the_ID();

$postcount++;

$image = catch_image(); // Check for images within post

$slide_id='';
$slide_id="slide-".get_the_ID().'-'. esc_attr($id);

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

?>

<?php require CWZ_FILES .'/inc/group-gallery-frame.php'; ?>

<?php endwhile; 

if($postcount!="0") { $postcount="0"; // Check to see if end tag needs to be set ?>
	</div><!--  / panelwrap -->
<?php } 

wp_reset_query();

$postcount = 0; ?>


</div><!-- / postslide -->


<div class="clear"></div>
</div><!-- / gallerywrap -->
</div><!-- /gallery-slider -->

<script type="text/javascript">
<!--
jQuery(window).load(function() {

	jQuery('.post-slider.id-<?php echo esc_attr($id); ?> .post-slide').cycle({ 
		fx:     'scrollHorz', 
		timeout: <?php echo $DYN_slidetimeout; ?>,
		before:  onBefore,
		after:  onAfter,			
		speed: 750,
		easing: 'easeInOutExpo',
		prev: '#leftnav-<?php echo esc_attr($id); ?>',
		next: '#rightnav-<?php echo esc_attr($id); ?>'
	});

});


	function onBefore() { 
   		var videoid = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>').attr("id");
			
		jQuery('.jwplayer.id<?php echo esc_attr($id); ?>').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					if(str!=videoid) {
						if(str.search("video")==-1) {
						jwplayer(str).stop();
						}
					}					 
		});
	
	} 

	function onAfter() { 

   		var videoid = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>').attr("id");
			
		jQuery('.jwplayer.id<?php echo esc_attr($id); ?>').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					autostart = jQuery(this).attr("class");
					if(str==videoid) {
						if(str.search("video")==-1 && autostart.search("autostart")!=-1) {
						jwplayer(str).play();
						}
					}					 
		});
					
	} 


//-->
</script>

<?php 
$output_string="";
$output_string=ob_get_contents();
ob_end_clean();

return $output_string;

} else { // get slide set
$postcount = 0;

$DYN_slidesetids = explode(",", $DYN_slidesetid);
					
if(is_array($DYN_slidesetids)) {
	foreach ($DYN_slidesetids as $DYN_slidesetid) { 
		$get_slideset = get_option("slideset_data_".$DYN_slidesetid);		
		$post_count = $post_count+$get_slideset['slideset_id_slide_count'];
	}
} else {
	$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetids);
	$post_count = $get_slideset_data['slideset_id_slide_count'];		
}

ob_start(); ?>

<div class="post-slider id-<?php echo esc_attr($id); ?> top">
<div class="gallery-wrap clearfix" <?php if(esc_attr($height)) { ?> style="height: <?php echo esc_attr($height); ?>px" <?php } else { ?> style="height:300px;" <?php } ?>>
<div class="slidernav-right">
<?php if($post_count>"3") { ?>
	<div class="slidernav">
		<a id="rightnav-<?php echo esc_attr($id); ?>" href="#"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="22" height="32" alt="navigate left" /></a>
	</div>
<?php } ?>
</div>

	<div class="slidernav-left">
<?php if($post_count>"3") { ?>
		<div class="slidernav">
			<a id="leftnav-<?php echo esc_attr($id); ?>" href="#"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="22" height="32" alt="navigate left" /></a>
		</div>
<?php } ?>
	</div>
     
	<div class="post-slide">

<?php 
foreach($DYN_slidesetids as $DYN_slidesetid) {
$z = 0;
$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetid);
$get_slides_count = $get_slideset_data['slideset_id_slide_count'];

while ($z < $get_slides_count):

/******************  Get Slide Set data ******************/ 	

$DYN_disablegallink="";

	
$DYN_movieurl = $get_slideset_data['slideset_id_videourl_'.$z]; // Movie File URL
$DYN_previewimgurl=$get_slideset_data['slideset_id_url_'.$z]; // Preview Image URL
$DYN_imgzoomcrop=strtolower($get_slideset_data['slideset_id_crop_'.$z]);
$DYN_cssclasses = $get_slideset_data['slideset_id_cssclasses_'.$z];

if(!$get_slideset_data['slideset_id_link_'.$z]) {
$DYN_disablegallink="yes";
} 

$DYN_disablereadmore=$get_slideset_data['slideset_id_disreadmore_'.$z];

$DYN_galexturl=$get_slideset_data['slideset_id_link_'.$z];
$DYN_videotype=strtolower($get_slideset_data['slideset_id_embed_'.$z]);

$DYN_videoautoplay=$get_slideset_data['slideset_id_autoplay_'.$z];
$DYN_posttitle=stripslashes($get_slideset_data['slideset_id_title_'.$z]);
$DYN_description=stripslashes($get_slideset_data['slideset_id_desc_'.$z]);

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}

if($DYN_videoautoplay) {
	$DYN_videoautoplay = "1";
} else {
	$DYN_videoautoplay ="0";	
}	

/******************  / Get Slide Set data ******************/ 

$postcount++;

$slide_id='';
$slide_id="slideset".$slideset_id."-".$z.'-'.esc_attr($id);

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

?>

<?php require CWZ_FILES .'/inc/group-gallery-frame.php'; ?>

<?php $z++;
endwhile;
}
if($postcount!="0") { $postcount="0"; // Check to see if end tag needs to be set ?>
	</div><!--  / panelwrap -->
<?php } 



$postcount = 0; ?>


</div><!-- / postslide -->


<div class="clear"></div>
</div><!-- / gallerywrap -->
</div><!-- /gallery-slider -->

<script type="text/javascript">
<!--
jQuery(window).load(function() {

	jQuery('.post-slider.id-<?php echo esc_attr($id); ?> .post-slide').cycle({ 
		fx:     'scrollHorz', 
		timeout: <?php echo $DYN_slidetimeout; ?>,
		speed: 750,
		before:  function() { 
		var videoid = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>').attr("id");
			
		jQuery('.jwplayer.id<?php echo esc_attr($id); ?>').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					if(str!=videoid) {
						if(str.search("video")==-1) {
						jwplayer(str).stop();
						}
					}					 
		});
	
	} ,
		after:  function() { 

   		var videoid = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>').attr("id");
			
		jQuery('.jwplayer.id<?php echo esc_attr($id); ?>').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					autostart = jQuery(this).attr("class");
					if(str==videoid) {
						if(str.search("video")==-1 && autostart.search("autostart")!=-1) {
						jwplayer(str).play();
						}
					}					 
		});
					
	} ,			
		easing: 'easeInOutExpo',
		prev: '#leftnav-<?php echo esc_attr($id); ?>',
		next: '#rightnav-<?php echo esc_attr($id); ?>'
	});

});



	

	jQuery(window).load(function() {
		var firstvideo = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>.first').attr("id");
		if(firstvideo) {
			var autostart = jQuery('#'+firstvideo).attr("class");
			if(autostart.search("autostart")!=-1) {
				jwplayer(firstvideo).stop().play();
			}
		}
	});

jQuery(window).load(function() {
jQuery('.post-slider.id-<?php echo esc_attr($id); ?> .galleryimg').append('<div class="hoverimg" style="height:<?php if(esc_attr($imgheight)) { echo esc_attr($imgheight); } else { ?>160<?php } ?>px"></div>');
jQuery('.post-slider.id-<?php echo esc_attr($id); ?> .galleryvid').append('<div class="hovervid" style="height:<?php if(esc_attr($imgheight)) { echo esc_attr($imgheight); } else { ?>160<?php } ?>px"></div>');	
});
//-->
</script>

<?php 
$output_string="";
$output_string=ob_get_contents();
ob_end_clean();

return $output_string;

}

}




/******************************************************************/
/*	Stage Gallery							      				  */
/******************************************************************/



function postgallery_image_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'content' => '',
	  'categories' => '',
	  'slidesetid' => '',
	  'imageeffect' => '',
	  'shadow' => '',
	  'timeout' => '',
	  'playnav' => '',
	  'navigation' => '',
	  'height' => '',
	  'width' => '',	  
	  'align' => '',
	  'id' => '',
	  'limit' => '',
	  'orderby' => '',	  
	  'sortby' => '',
	  'animation' => '',
	  'tween' => '',
	  'excerpt' => '',	 	  
      ), $atts ) );
 
$DYN_slidesetid = esc_attr($slidesetid);
$DYN_stageplaypause= esc_attr($playnav);
$DYN_stageplaypause= esc_attr($navigation);
if(esc_attr($excerpt)) {
	$DYN_galleryexcerpt = esc_attr($excerpt);
} else {
	$DYN_galleryexcerpt = "55";
}
 
 if(esc_attr($animation)) {
 	$CWZ_animation=esc_attr($animation);
 } else {
 	$CWZ_animation="fade";
 }
 
 if(esc_attr($tween)) {
 	$CWZ_tween=esc_attr($tween);
 } else {
 	$CWZ_tween="linear";
 } 
 
 $DYN_imgwidth=esc_attr($width);
 $DYN_imgheight=esc_attr($height);
 
 if(esc_attr($imageeffect)=="reflection" || esc_attr($imageeffect)=="shadowreflection") {
 	if($DYN_stageplaypause=="enabled") {
 	$galheight=esc_attr($height)+"55";
	} else {
	$galheight=esc_attr($height)+"45";
	}
 } elseif(esc_attr($imageeffect)=="shadow") {
 	if($DYN_stageplaypause=="enabled") {
 	$galheight=esc_attr($height)+"35";
	} else {
	$galheight=esc_attr($height)+"30";
	}
 } else {
 	if($DYN_stageplaypause=="enabled") {
 	$galheight=esc_attr($height)+"20";
	} elseif($DYN_stageplaypause=="disabled") {
	$galheight=esc_attr($height);
	} else {
	$galheight=esc_attr($height)+"15";
	}
 }
 
 if(esc_attr($shadow)=="shadow-small" || esc_attr($shadow)=="shadow-xsmall") {
 	if(esc_attr($imageeffect=="shadowreflection") || esc_attr($imageeffect=="shadow")) {
	$shadowsize = "24";
	}
 } elseif(esc_attr($shadow)=="shadow-medium") {
 	if(esc_attr($imageeffect=="shadowreflection") || esc_attr($imageeffect=="shadow")) {
	$shadowsize = "18";
	} 
 } elseif(esc_attr($shadow)=="shadow-large") {
 	if(esc_attr($imageeffect=="shadowreflection") || esc_attr($imageeffect=="shadow") ) {
	$shadowsize = "54";
	} 
 }
 
 if(esc_attr($imageeffect)=="shadowreflection" || esc_attr($imageeffect)=="shadow" ) {
 	$shadowheight = esc_attr($height)-$shadowsize;
 }


 if(esc_attr($timeout)) {
 	$DYN_poststagetimeout = esc_attr($timeout);
 }
 
 
 
if(!esc_attr($slidesetid)) { // if not slide set data

ob_start();

?>

<div class="post-gallery-wrap id-<?php echo esc_attr($id); ?> <?php echo esc_attr($align); ?> gallerywrap" style="clear:both;width:<?php echo esc_attr($width);  ?>px;height:<?php echo $galheight; ?>px;padding-bottom:15px;">

<?php if($DYN_stageplaypause!="disabled") { ?>
<div class="control-wrap">
<?php if($DYN_stageplaypause=="enabled") { // check if play pause nav is enabled ?>
	<div class="stage-control">
		<ul>
			<li><a href="#" class="poststage-prev id<?php echo esc_attr($id); ?>"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="20" height="34" alt="Previous Slide" /></a></li>
			<li class="poststage-pauseresume id<?php echo esc_attr($id); ?>">
				<span class="poststage-pause id<?php echo esc_attr($id); ?>"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="26" height="34" alt="Pause" /></span>
				<span class="poststage-resume id<?php echo esc_attr($id); ?>" style="display:none;"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="26" height="34" alt="Resume" /></span>
			</li>
			<li><a href="#" class="poststage-next id<?php echo esc_attr($id); ?>"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="20" height="34" alt="Next Slide" /></a></li>
		</ul>
    </div>
<?php } ?>

	<div class="post-control-panel id<?php echo esc_attr($id); ?>">

	</div><!-- / control-panel -->
</div><!-- / control-wrap -->
<?php } ?> 
<div class="post-gallery" style="width:<?php echo esc_attr($width); ?>px">

<?php $postcount = 0;

if(esc_attr($limit)) { // Number of posts to display
	$numposts = esc_attr($limit);
} else {
	$numposts = -1;
}

if(esc_attr($sortby)) { // Sort Posts by
	$sortby = esc_attr($sortby);
} else {
	$sortby = "meta_value";
}

if(esc_attr($orderby)) { // Order Posts By
	$orderby = esc_attr($orderby);
} else {
	$orderby = "ASC";
}

if(esc_attr($categories)) {


	$cats = lTrim(esc_attr($categories),',');

	$cat_isnum = str_replace(",","", $cats); // join cats to check if numeric

	if (is_numeric ($cat_isnum)) { // backwards compatible with post id
		$cat_type= "cat";
	} else {
		$cat_type= "category_name"; // if not numeric, use category name
	}

   $args=array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'meta_key' => 'Order',
	$cat_type => $cats,
	'paged' => $paged,
	'orderby' => $sortby,
	'order' => $orderby,
	'posts_per_page' => $numposts,
	'caller_get_posts'=> 1
	);

	$featured_query = new wp_query($args);  

}
else { // If no options select display all categories

$args=array(
      'post_type' => 'post',
      'post_status' => 'publish',
	  'meta_key' => 'Order',
	  'paged' => $paged,
      'caller_get_posts'=> 1,
	  'orderby' => $sortby,
	  'order' => $orderby,
	  'posts_per_page' => $numposts
      );

	$featured_query = new wp_query($args);
} 

$DYN_postslidearray="";

while ($featured_query->have_posts()) : $featured_query->the_post(); 

/******************  Get custom field data ******************/             

$pdata = maybe_unserialize(get_post_meta( get_the_ID(), 'pgopts', true ));

$DYN_movieurl = $pdata["movieurl"]; // Movie File URL
$DYN_previewimgurl=$pdata["previewimgurl"]; // Preview Image URL
$DYN_stagegallery=$pdata["stagegallery"]; // Stage Layout
$DYN_disablegallink=$pdata["disablegallink"];
$DYN_disablereadmore=$pdata["disablereadmore"];
$DYN_galexturl=$pdata["galexturl"];
$DYN_imgzoomcrop=$pdata["imgzoomcrop"];
$DYN_videotype=$pdata["videotype"];
$DYN_videoautoplay=$pdata["videoautoplay"];
$DYN_postslidetimeout=$pdata["slidetimeout"];
$DYN_cssclasses = $pdata["cssclasses"];

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}

if($DYN_videoautoplay) {
	$DYN_videoautoplay = "1";
} else {
	$DYN_videoautoplay ="0";	
}

/****************** / Get custom field data *****************/ 

$do_not_duplicate[] = get_the_ID();

$postcount++;

if($DYN_videotype !="" && $postcount!="1") { // Stop IE autoplaying hidden video onload. 
	$display_none ="";
	$display_none = "yes";
}

$slide_id='';
$slide_id="slide-".get_the_ID().'-'. esc_attr($id);

$image = catch_image(); // Check for images within post

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

?>


<?php require CWZ_FILES .'/adm/inc/stage-gallery-frame.php'; ?>
 
<?php 

if($DYN_postslidetimeout) {
	$DYN_postslidearray = $DYN_postslidearray . $DYN_postslidetimeout .","; 
} elseif($DYN_poststagetimeout) {
	$DYN_postslidearray = $DYN_postslidearray . $DYN_poststagetimeout .","; 
} else {
	$DYN_postslidearray = $DYN_postslidearray . "10,";
}

?>   

<?php endwhile;

wp_reset_query();

$postcount = 0; ?>


</div><!-- / stageslider -->

<div class="clear"></div>
</div><!-- / gallerywrap -->

<script type="text/javascript">
<!--
jQuery(window).load(function() {
	var posttimeouts = [<?php echo substr($DYN_postslidearray,0,-1); ?>];
	
	jQuery('.post-control-panel.id<?php echo esc_attr($id); ?>').append('<ul class="nav<?php echo esc_attr($id); ?>"></ul>');
	
	jQuery('.post-gallery-wrap.id-<?php echo esc_attr($id); ?> .post-gallery').cycle({ 
		fx:     '<?php echo $CWZ_animation; ?>', 
		easing: '<?php echo $CWZ_tween; ?>',
		timeoutFn: function (currElement, nextElement, opts, isForward) { 
		var index = opts.currSlide; 
		return posttimeouts[index] * 1000; 
		},
		speed: 750,
		pager:  '.post-control-panel .nav<?php echo esc_attr($id); ?>',
		pause:  1,
		before:  onBefore,
		after:  onAfter,		
		cleartype:  true,
    	cleartypeNoBg:  true,
<?php if($DYN_stageplaypause=="enabled") { // check if play pause nav is enabled ?>		
		next:   '.poststage-next.id<?php echo esc_attr($id); ?>', 
    	prev:   '.poststage-prev.id<?php echo esc_attr($id); ?>',		
<?php } ?>		
		pagerAnchorBuilder: function(idx, slide) { 
        return '<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="16" height="16" alt="slide" /></a></li>'; 
		}
	});
	

	function onBefore() { 
   		var videoid = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>').attr("id");
			
		jQuery('.jwplayer.id<?php echo esc_attr($id); ?>').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					if(str!=videoid) {
						if(str.search("video")==-1) {
						jwplayer(str).stop();
						}
					}					 
		});
	
	} 

	function onAfter() { 

   		var videoid = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>').attr("id");
			
		jQuery('.jwplayer.id<?php echo esc_attr($id); ?>').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					autostart = jQuery(this).attr("class");
					if(str==videoid) {
						if(str.search("video")==-1 && autostart.search("autostart")!=-1) {
						jwplayer(str).stop().play();
						}
					}					 
		});
					
	} 

	jQuery(window).load(function() {
		var firstvideo = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>.first').attr("id");
		if(firstvideo) {
			var autostart = jQuery('#'+firstvideo).attr("class");
			if(autostart.search("autostart")!=-1) {
				jwplayer(firstvideo).stop().play();
			}
		}
	});
	

<?php if($DYN_stageplaypause=="enabled") { // check if play pause nav is enabled ?>

	jQuery('.poststage-pause.id<?php echo esc_attr($id); ?>').click(function() { 
		jQuery('.post-gallery-wrap.id-<?php echo esc_attr($id); ?> .post-gallery').cycle('pause'); 
	});
	
	jQuery('.poststage-resume.id<?php echo esc_attr($id); ?>').click(function() { 
		jQuery('.post-gallery-wrap.id-<?php echo esc_attr($id); ?> .post-gallery').cycle('resume'); 
	});
	
	jQuery(".poststage-pauseresume.id<?php echo esc_attr($id); ?> span").click(function () {
			jQuery(".poststage-pauseresume.id<?php echo esc_attr($id); ?> span").toggle();
	});	
<?php } ?>	

	

});
//-->
</script>


<?php 
$output_string="";
$output_string=ob_get_contents();
ob_end_clean();

return $output_string;

} else {
$postcount = 0;

ob_start();

?>

<div class="post-gallery-wrap id-<?php echo esc_attr($id); ?> <?php echo esc_attr($align); ?> gallerywrap" style="clear:both;width:<?php echo esc_attr($width);  ?>px;height:<?php echo $galheight; ?>px;padding-bottom:15px;">
<?php if($DYN_stageplaypause!="disabled") { ?>
<div class="control-wrap">
<?php if($DYN_stageplaypause=="enabled") { // check if play pause nav is enabled ?>
	<div class="stage-control">
		<ul>
			<li><a href="#" class="poststage-prev id<?php echo esc_attr($id); ?>"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="20" height="34" alt="Previous Slide" /></a></li>
			<li class="poststage-pauseresume id<?php echo esc_attr($id); ?>">
				<span class="poststage-pause id<?php echo esc_attr($id); ?>"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="26" height="34" alt="Pause" /></span>
				<span class="poststage-resume id<?php echo esc_attr($id); ?>" style="display:none;"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="26" height="34" alt="Resume" /></span>
			</li>
			<li><a href="#" class="poststage-next id<?php echo esc_attr($id); ?>"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="20" height="34" alt="Next Slide" /></a></li>
		</ul>
    </div>
<?php } ?>

	<div class="post-control-panel id<?php echo esc_attr($id); ?>">

	</div><!-- / control-panel -->
</div><!-- / control-wrap -->
<?php } ?>
<div class="post-gallery" style="width:<?php echo esc_attr($width); ?>px">

<?php 
$DYN_slidesetids = explode(",", $DYN_slidesetid);
					
if(is_array($DYN_slidesetids)) {
	foreach ($DYN_slidesetids as $DYN_slidesetid) { 
		$get_slideset = get_option("slideset_data_".$DYN_slidesetid);		
		$post_count = $post_count+$get_slideset['slideset_id_slide_count'];
	}
} else {
	$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetids);
	$post_count = $get_slideset_data['slideset_id_slide_count'];		
}

foreach($DYN_slidesetids as $DYN_slidesetid) {
$z = 0;
$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetid);
$get_slides_count = $get_slideset_data['slideset_id_slide_count'];

$DYN_postslidearray="";

while ($z < $get_slides_count):

/******************  Get Slide Set data ******************/ 	

$DYN_disablegallink="";

	
$DYN_movieurl = $get_slideset_data['slideset_id_videourl_'.$z]; // Movie File URL
$DYN_previewimgurl=$get_slideset_data['slideset_id_url_'.$z]; // Preview Image URL
$DYN_imgzoomcrop=strtolower($get_slideset_data['slideset_id_crop_'.$z]);
$DYN_stagegallery=$get_slideset_data['slideset_id_stagecontent_'.$z]; // Stage Layout
$DYN_cssclasses = $get_slideset_data['slideset_id_cssclasses_'.$z];

if($DYN_stagegallery=="Image Only") { $DYN_stagegallery="image"; } elseif($DYN_stagegallery=="Text/Image (Left Align)") { $DYN_stagegallery="textimageleft"; } elseif($DYN_stagegallery=="Text/Image (Right Align)") { $DYN_stagegallery="textimageright"; } elseif($DYN_stagegallery=="Title Overlay Image") { $DYN_stagegallery="titleoverlay"; } elseif($DYN_stagegallery=="Title / Text Overlay Image") { $DYN_stagegallery="titletextoverlay"; } elseif($DYN_stagegallery=="Text Only") { $DYN_stagegallery="textonly"; }

if(!$get_slideset_data['slideset_id_link_'.$z]) {
$DYN_disablegallink="yes";
} 

$DYN_disablereadmore=$get_slideset_data['slideset_id_disreadmore_'.$z];

$DYN_galexturl=$get_slideset_data['slideset_id_link_'.$z];
$DYN_videotype=strtolower($get_slideset_data['slideset_id_embed_'.$z]);

$DYN_videoautoplay=$get_slideset_data['slideset_id_autoplay_'.$z];
$DYN_posttitle=stripslashes($get_slideset_data['slideset_id_title_'.$z]);
$DYN_description=stripslashes($get_slideset_data['slideset_id_desc_'.$z]);
$DYN_postslidetimeout=$get_slideset_data['slideset_id_timeout_'.$z];

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}

if($DYN_videoautoplay) {
	$DYN_videoautoplay = "1";
} else {
	$DYN_videoautoplay ="0";	
}	

/******************  / Get Slide Set data ******************/ 

$postcount++;

if($DYN_videotype !="" && $postcount!="1") { // Stop IE autoplaying hidden video onload. 
	$display_none ="";
	$display_none = "yes";
} 

$slide_id='';
$slide_id="slideset".$slideset_id."-".$z.'-'.esc_attr($id);

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

?>

<?php require CWZ_FILES .'/adm/inc/stage-gallery-frame.php'; ?>

<?php 

if($DYN_postslidetimeout) {
	$DYN_postslidearray = $DYN_postslidearray . $DYN_postslidetimeout .","; 
} elseif($DYN_poststagetimeout) {
	$DYN_postslidearray = $DYN_postslidearray . $DYN_poststagetimeout .","; 
} else {
	$DYN_postslidearray = $DYN_postslidearray . "10,";
}

?>  

<?php
$z++;

endwhile;
}
$postcount = 0; ?>

</div><!-- / stageslider -->

<div class="clear"></div>
</div><!-- / gallerywrap -->

<script type="text/javascript">
<!--
jQuery(window).load(function() {
	var posttimeouts = [<?php echo substr($DYN_postslidearray,0,-1); ?>];
	
	jQuery('.post-control-panel.id<?php echo esc_attr($id); ?>').append('<ul class="nav<?php echo esc_attr($id); ?>"></ul>');
	
	jQuery('.post-gallery-wrap.id-<?php echo esc_attr($id); ?> .post-gallery').cycle({ 
		fx:     '<?php echo $CWZ_animation; ?>', 
		easing: '<?php echo $CWZ_tween; ?>',
		timeoutFn: function (currElement, nextElement, opts, isForward) { 
		var index = opts.currSlide; 
		return posttimeouts[index] * 1000; 
		},
		speed: 750,
		pager:  '.post-control-panel .nav<?php echo esc_attr($id); ?>',
		pause:  1,
		before:  onBefore,
		after:  onAfter,		
		cleartype:  true,
    	cleartypeNoBg:  true,
<?php if($DYN_stageplaypause=="enabled") { // check if play pause nav is enabled ?>		
		next:   '.poststage-next.id<?php echo esc_attr($id); ?>', 
    	prev:   '.poststage-prev.id<?php echo esc_attr($id); ?>',		
<?php } ?>		
		pagerAnchorBuilder: function(idx, slide) { 
        return '<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="16" height="16" alt="slide" /></a></li>'; 
		}
	});
	

	function onBefore() { 
   		var videoid = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>').attr("id");
			
		jQuery('.jwplayer.id<?php echo esc_attr($id); ?>').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					if(str!=videoid) {
						if(str.search("video")==-1) {
						jwplayer(str).stop();
						}
					}					 
		});
	
	} 

	function onAfter() { 

   		var videoid = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>').attr("id");
			
		jQuery('.jwplayer.id<?php echo esc_attr($id); ?>').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					autostart = jQuery(this).attr("class");
					if(str==videoid) {
						if(str.search("video")==-1 && autostart.search("autostart")!=-1) {
						jwplayer(str).play();
						}
					}					 
		});
					
	} 

	jQuery(window).load(function() {
		var firstvideo = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>.first').attr("id");
		if(firstvideo) {
			var autostart = jQuery('#'+firstvideo).attr("class");
			if(autostart.search("autostart")!=-1) {
				jwplayer(firstvideo).stop().play();
			}
		}
	});	

<?php if($DYN_stageplaypause=="enabled") { // check if play pause nav is enabled ?>

	jQuery('.poststage-pause.id<?php echo esc_attr($id); ?>').click(function() { 
		jQuery('.post-gallery-wrap.id-<?php echo esc_attr($id); ?> .post-gallery').cycle('pause'); 
	});
	
	jQuery('.poststage-resume.id<?php echo esc_attr($id); ?>').click(function() { 
		jQuery('.post-gallery-wrap.id-<?php echo esc_attr($id); ?> .post-gallery').cycle('resume'); 
	});
	
	jQuery(".poststage-pauseresume.id<?php echo esc_attr($id); ?> span").click(function () {
			jQuery(".poststage-pauseresume.id<?php echo esc_attr($id); ?> span").toggle();
	});	
<?php } ?>	

	

});
//-->
</script>


<?php 
$output_string="";
$output_string=ob_get_contents();
ob_end_clean();

return $output_string;
}


}


/******************************************************************/
/*	Accordion Gallery							      			  */
/******************************************************************/


function postgallery_accordion_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'content' => '',
	  'categories' => '',
	  'slidesetid' => '',
	  'imageeffect' => '',
	  'shadow' => '',
	  'timeout' => '',
	  'autoplay' => '',
	  'height' => '',
	  'width' => '',
	  'lightbox' => '',	  
	  'minititles' => '',
	  'id' => '',
	  'align' => '',
	  'excerpt' =>'',
	  'limit' => '',
	  'orderby' => '',	  
	  'sortby' => '',	 	  
      ), $atts ) );
 

$DYN_lightbox=esc_attr($lightbox); 
 
if(esc_attr($height)) {
$DYN_imgheight=esc_attr($height); // No Reflection
} else {
$DYN_imgheight="350"; // Set default Gallery Height
}

if(esc_attr($width)) {
$DYN_gallerywidth=esc_attr($width);
} else {
$DYN_gallerywidth="400";
}

$DYN_imageeffect=esc_attr($imageeffect);
if(esc_attr($autoplay)) {
$DYN_accordionautoplay="true";
} else {
$DYN_accordionautoplay="false";
}

if(esc_attr($timeout)) {
$DYN_stagetimeout=esc_attr($timeout);
} else {
$DYN_stagetimeout="10";
}

$DYN_groupgridcontent=esc_attr($content);

if(esc_attr($minititles)=="disable") {
$DYN_accordiontitles=esc_attr($minititles);
}

$DYN_slidesetid=esc_attr($slidesetid);

 if(esc_attr($shadow)=="shadow-small" || esc_attr($shadow)=="shadow-xsmall") {
 	if(esc_attr($imageeffect=="shadowreflection") || esc_attr($imageeffect=="shadow")) {
	$shadowsize = "24";
	}
 } elseif(esc_attr($shadow)=="shadow-medium") {
 	if(esc_attr($imageeffect=="shadowreflection") || esc_attr($imageeffect=="shadow")) {
	$shadowsize = "18";
	} 
 } elseif(esc_attr($shadow)=="shadow-large") {
 	if(esc_attr($imageeffect=="shadowreflection") || esc_attr($imageeffect=="shadow") ) {
	$shadowsize = "54";
	} 
 }
 
 if(esc_attr($imageeffect)=="shadowreflection" || esc_attr($imageeffect)=="shadow" ) {
 	$shadowheight = esc_attr($height)-$shadowsize;
 }


 if(esc_attr($timeout)) {
 	$DYN_poststagetimeout = esc_attr($timeout);
 }
 
if(!esc_attr($slidesetid)) { // if not slide set data

ob_start();

?>

<div id="cwz-accordion-<?php echo esc_attr($id); ?>" class="accordion-gallery-wrap <?php if($DYN_imageeffect=="shadow") { ?>shadow<?php } elseif($DYN_imageeffect=="reflection") { ?>reflection<?php } elseif($DYN_imageeffect=="shadowreflection") { ?>shadowreflection <?php } ?> <?php echo esc_attr($shadow); ?> <?php echo esc_attr($align); ?>"  style="width:<?php echo $DYN_gallerywidth; ?>px;">
    <ul class="accordion-gallery id-<?php echo esc_attr($id); ?>" style="height:<?php echo $DYN_imgheight; ?>px;width:<?php echo $DYN_gallerywidth; ?>px;">

<?php $postcount = 0;

if(esc_attr($limit)) { // Number of posts to display
	$numposts = esc_attr($limit);
} else {
	$numposts = -1;
}


if(esc_attr($limit)) { // Number of posts to display
	$numposts = esc_attr($limit);
} else {
	$numposts = -1;
}

if(esc_attr($excerpt)) {
	$DYN_galleryexcerpt = esc_attr($excerpt);
} else {
	$DYN_galleryexcerpt = "55";
}

if(esc_attr($sortby)) { // Sort Posts by
	$sortby = esc_attr($sortby);
} else {
	$sortby = "meta_value";
}

if(esc_attr($orderby)) { // Order Posts By
	$orderby = esc_attr($orderby);
} else {
	$orderby = "ASC";
}

if(esc_attr($categories)) {


	$cats = lTrim(esc_attr($categories),',');

	$cat_isnum = str_replace(",","", $cats); // join cats to check if numeric

	if (is_numeric ($cat_isnum)) { // backwards compatible with post id
		$cat_type= "cat";
	} else {
		$cat_type= "category_name"; // if not numeric, use category name
	}

   $args=array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'meta_key' => 'Order',
	$cat_type => $cats,
	'paged' => $paged,
	'orderby' => $sortby,
	'order' => $orderby,
	'posts_per_page' => $numposts,
	'caller_get_posts'=> 1
	);

	$featured_query = new wp_query($args);  

}
else { // If no options select display all categories

$args=array(
      'post_type' => 'post',
      'post_status' => 'publish',
	  'meta_key' => 'Order',
	  'paged' => $paged,
      'caller_get_posts'=> 1,
	  'orderby' => $sortby,
	  'order' => $orderby,
	  'posts_per_page' => $numposts
      );

	$featured_query = new wp_query($args);
} 

$post_count = $featured_query->post_count; // Check how many posts in query.

$DYN_imgwidth=$DYN_gallerywidth / $post_count;
$DYN_imgwidth=round($DYN_gallerywidth - $DYN_imgwidth);

while ($featured_query->have_posts()) : $featured_query->the_post(); 

/******************  Get custom field data ******************/             

$pdata = maybe_unserialize(get_post_meta( get_the_ID(), 'pgopts', true ));

$DYN_movieurl = $pdata["movieurl"]; // Movie File URL
$DYN_previewimgurl=$pdata["previewimgurl"]; // Preview Image URL
$DYN_stagegallery=$pdata["stagegallery"]; // Stage Layout
$DYN_disablegallink=$pdata["disablegallink"];
$DYN_disablereadmore=$pdata["disablereadmore"];
$DYN_galexturl=$pdata["galexturl"];
$DYN_imgzoomcrop=$pdata["imgzoomcrop"];
$DYN_videotype=$pdata["videotype"];
$DYN_videoautoplay=$pdata["videoautoplay"];
$DYN_postslidetimeout=$pdata["slidetimeout"];
$DYN_cssclasses = $pdata["cssclasses"];

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}

if($DYN_videoautoplay) {
	$DYN_videoautoplay = "1";
} else {
	$DYN_videoautoplay ="0";	
}

/****************** / Get custom field data *****************/ 

$do_not_duplicate[] = get_the_ID();

$postcount++;

if($DYN_videotype !="" && $postcount!="1") { // Stop IE autoplaying hidden video onload. 
	$display_none ="";
	$display_none = "yes";
}

$image = catch_image(); // Check for images within post

$slide_id='';
$slide_id="slide-".get_the_ID().'-'. esc_attr($id);

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

?>

<?php require CWZ_FILES .'/inc/accordion-gallery-frame.php'; ?>
 
<?php endwhile;

wp_reset_query();

$postcount = 0; ?>

	</ul>
</div><!-- / accordion-gallery -->

<script type="text/javascript">
<!--
jQuery().ready(function() {
	jQuery('.accordion-gallery.id-<?php echo esc_attr($id); ?>').kwicks({
	autorotation: <?php echo $DYN_accordionautoplay; ?>,
	event: 'mouseover',
	autorotationSpeed:<?php echo $DYN_stagetimeout; ?>,
	easing: 'easeInOutCubic',
	duration: 700,
	id: 'cwz-accordion-<?php echo esc_attr($id); ?>'
	});
});	
-->
</script>


<?php 
$output_string="";
$output_string=ob_get_contents();
ob_end_clean();

return $output_string;

} else {
$postcount = 0;

ob_start();
?>

<div id="cwz-accordion-<?php echo esc_attr($id); ?>" class="accordion-gallery-wrap <?php if($DYN_imageeffect=="shadow") { ?>shadow<?php } elseif($DYN_imageeffect=="reflection") { ?>reflection<?php } elseif($DYN_imageeffect=="shadowreflection") { ?>shadowreflection<?php } ?> <?php echo esc_attr($shadow); ?> <?php echo esc_attr($align); ?>" style="width:<?php echo $DYN_gallerywidth; ?>px;">
    <ul class="accordion-gallery id-<?php echo esc_attr($id); ?>" style="height:<?php echo $DYN_imgheight; ?>px;width:<?php echo $DYN_gallerywidth; ?>px;">


<?php 
$DYN_slidesetids = explode(",", $DYN_slidesetid);
					
if(is_array($DYN_slidesetids)) {
	foreach ($DYN_slidesetids as $DYN_slidesetid) { 
		$get_slideset = get_option("slideset_data_".$DYN_slidesetid);		
		$post_count = $post_count+$get_slideset['slideset_id_slide_count'];
	}
} else {
	$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetids);
	$post_count = $get_slideset_data['slideset_id_slide_count'];		
}

$DYN_imgwidth=$DYN_gallerywidth / $post_count;
$DYN_imgwidth=round($DYN_gallerywidth - $DYN_imgwidth);

foreach($DYN_slidesetids as $DYN_slidesetid) {
$z = 0;
$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetid);
$get_slides_count = $get_slideset_data['slideset_id_slide_count'];

while ($z < $get_slides_count):

/******************  Get Slide Set data ******************/ 	

$DYN_disablegallink="";

	
$DYN_movieurl = $get_slideset_data['slideset_id_videourl_'.$z]; // Movie File URL
$DYN_previewimgurl=$get_slideset_data['slideset_id_url_'.$z]; // Preview Image URL
$DYN_imgzoomcrop=strtolower($get_slideset_data['slideset_id_crop_'.$z]);
$DYN_cssclasses = $get_slideset_data['slideset_id_cssclasses_'.$z];

if(!$get_slideset_data['slideset_id_link_'.$z]) {
$DYN_disablegallink="yes";
} 

$DYN_disablereadmore=$get_slideset_data['slideset_id_disreadmore_'.$z];

$DYN_galexturl=$get_slideset_data['slideset_id_link_'.$z];
$DYN_videotype=strtolower($get_slideset_data['slideset_id_embed_'.$z]);

$DYN_videoautoplay=$get_slideset_data['slideset_id_autoplay_'.$z];
$DYN_posttitle=stripslashes($get_slideset_data['slideset_id_title_'.$z]);
$DYN_description=stripslashes($get_slideset_data['slideset_id_desc_'.$z]);

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}

if($DYN_videoautoplay) {
	$DYN_videoautoplay = "1";
} else {
	$DYN_videoautoplay ="0";	
}	

/******************  / Get Slide Set data ******************/ 

$postcount++;

if($DYN_videotype !="" && $postcount!="1") { // Stop IE autoplaying hidden video onload. 
	$display_none ="";
	$display_none = "yes";
} 

$slide_id='';
$slide_id="slideset".$slideset_id."-".$z.'-'.esc_attr($id);

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

?>

<?php require CWZ_FILES .'/inc/accordion-gallery-frame.php'; ?>


<?php
$z++;

endwhile;
}
$postcount = 0; ?>

	</ul>
</div><!-- / accordion-gallery -->

<script type="text/javascript">
<!--
jQuery().ready(function() {
	jQuery('.accordion-gallery.id-<?php echo esc_attr($id); ?>').kwicks({
	autorotation: <?php echo $DYN_accordionautoplay; ?>,
	event: 'mouseover',
	autorotationSpeed:<?php echo $DYN_stagetimeout; ?>,
	easing: 'easeInOutCubic',
	duration: 700,
	id: 'cwz-accordion-<?php echo esc_attr($id); ?>'
	});
});	
-->
</script>


<?php 
$output_string="";
$output_string=ob_get_contents();
ob_end_clean();

return $output_string;
}


}

/******************************************************************/
/*	Buttons									      				  */
/******************************************************************/


function button_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'url' => '',
      'target' => '',
	  'color' => '',
	  'width' => '',	  
), $atts ) );
 
 if(esc_attr($target)) {
 $target = 'target="'.esc_attr($target).'"';
 }
   return '<div class="button-wrap '.esc_attr($width).'"><div class="'.esc_attr($color).' button ' . esc_attr($width). '"><a href="' . esc_attr($url) . '" ' . $target . '>' . $content . '</a></div></div>';
}

function droppanelbutton_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
	  'color' => '',
	  'width' => '',	  
), $atts ) );
   return '<div class="button-wrap ' . esc_attr($width). '"><div class="'.esc_attr($color).' button '.esc_attr($width).' droppaneltrigger"><a href="#">' . $content . '</a></div></div>';
}

/******************************************************************/
/*	Block Quote								      				  */
/******************************************************************/

function blockquote_shortcode( $atts, $content = null ) {

	global $DYN_inskin;

   extract( shortcode_atts( array(
      'type' => '',
	  'align' => '',
      ), $atts ) );
 
 	if(esc_attr($type)!="blockquote_line") {
 
	$length = strlen($content);
	$position = intval($length - 17);
	
	$insert_string = '<span class="quote right"><img src="'.get_bloginfo("template_url").'/images/blank.gif" alt="quote close" /></span>';	

	$newstring=substr_replace($content, $insert_string, $position, 0);
	

   return '<span class="' . esc_attr($type) .' '. esc_attr($align) .'"><span class="quote left"><img src="'.get_bloginfo("template_url").'/images/blank.gif" alt="quote open" /></span>' . $newstring . '</span>';

   
   } else {
       return '<span class="' . esc_attr($type) .' '. esc_attr($align) .'">' . $content . '</span>';  
   }
   
}

/******************************************************************/
/*	Horizontal Breaks						      				  */
/******************************************************************/

function hozbreak_shortcode( $atts, $content = null ) {

   return '<div class="hozbreak clearfix">&nbsp;</div>';
}

function hozbreaktop_shortcode( $atts, $content = null ) {

   return '<div class="hozbreak-top clearfix"><a href="#top" class="clearfix">'.__('Back to Top', 'DynamiX' ).'</a></div>';
}

/******************************************************************/
/*	Styled Boxes							      				  */
/******************************************************************/

function styledbox_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'type' => '',
	  'width' => '',
	  'align' => '',
      ), $atts ) );
 
 if(esc_attr($width)) {
 	$width='style="width:'. esc_attr($width) .'px"';
 }
 
 
 if(esc_attr($type)=="shadow") {
 
 	return '<div class="styledbox shadow top '. esc_attr($align) .' clearfix" '. $width .'><div class="styledbox shadow bottom"><div class="boxcontent shadow">' . do_shortcode($content) . '</div></div></div>';
 
 } elseif(esc_attr($type)=="shadowbottom") {
 	return '<div class="styledbox shadow '. esc_attr($align) .' clearfix" '. $width .'><div class="styledbox shadow bottom"><div class="boxcontent shadow">' . do_shortcode($content) . '</div></div></div>';
 
 } else {
 
   return '<div class="styledbox ' . esc_attr($type) .' '. esc_attr($align) .' clearfix" '. $width .'><div class="boxcontent">' . do_shortcode($content) . '</div></div>';

 }
}

/******************************************************************/
/*	Highlight													  */
/******************************************************************/

function highlight_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'type' => '',
      ), $atts ) );
  
   return '<span class="highlight ' . esc_attr($type) .'">' . $content . '</span>';
}

/******************************************************************/
/*	Image Effect							      				  */
/******************************************************************/

function imageeffect_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'type' => '',
      'url' => '',	 
      'width' => '',	 
      'height' => '',
	  'videourl' => '',
      'alt' => '',	 
      'align' => '',
      'shadow' => '',
	  'titleoverlay' => '',	  	 	  	  	 	  	   
      ), $atts ) );

	
	if(esc_attr($videourl)) {
	$lightboxurl = esc_attr($videourl);
	} else {
	$lightboxurl = esc_attr($url);
	}
	
	$DYN_imgheight = esc_attr($height);
	$DYN_imgwidth = esc_attr($width);
	$DYN_imgzoomcrop = "0";
	$DYN_previewimgurl = esc_attr($url);
	
	if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
		$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
	} else {
		$DYN_imagepath="";
	}
		
	ob_start();
	
	
	?>
	
	<div class="imagewrap <?php echo esc_attr($align); ?> <?php if(esc_attr($type)=="frame" || esc_attr($type)=="framelightbox") { ?>frame <?php } ?>" style="height:<?php echo esc_attr($height); ?>px;width:<?php echo esc_attr($width); ?>px;">
        <div class="container <?php 
        if(esc_attr($type)=="reflect" || esc_attr($type)=="reflectlightbox") { ?>reflection <?php } elseif(esc_attr($type)=="shadowreflectlightbox" || esc_attr($type)=="shadowreflect") { ?>shadowreflection <?php } ?> <?php if(esc_attr($shadow)) { echo "shadow ".esc_attr($shadow); } ?>">
            <div class="gridimg-wrap">
				<div class="title-wrap" style="width:<?php echo $DYN_imgwidth; ?>px;">	

				<?php if(esc_attr($type)=="shadowlightbox" || esc_attr($type)=="shadowreflectlightbox" || esc_attr($type)=="reflectlightbox" || esc_attr($type)=="framelightbox" || esc_attr($type)=="lightbox"  ) { ?>
                    <a href="<?php echo $lightboxurl; ?>" rel="prettyPhoto[gallery-<?php echo esc_attr($alt); ?>]" class="<?php if(esc_attr($videourl)) { ?>galleryvid<?php } else { ?> galleryimg<?php } ?>" style="height:<?php echo esc_attr($height); ?>px;">
                <?php } ?>
                <img <?php if(esc_attr($type)=="reflect" || esc_attr($type)=="reflectlightbox" || esc_attr($type)=="shadowreflectlightbox" || esc_attr($type)=="shadowreflect") { ?>class="reflect"<?php } ?> src="<?php echo $DYN_imagepath . dyn_getimagepath($DYN_previewimgurl); ?>" alt="<?php echo esc_attr($alt); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" />
                <?php if(esc_attr($type)=="shadowlightbox" || esc_attr($type)=="shadowreflectlightbox" || esc_attr($type)=="reflectlightbox" || esc_attr($type)=="framelightbox" || esc_attr($type)=="lightbox" ) { ?>
                </a>
                <?php } ?>           
				<?php if(esc_attr($titleoverlay)=="yes") { ?>
					<div class="title">
						<h2><?php echo esc_attr($alt);  ?></h2>
					</div>	              
                <?php } ?>                           
				</div><!-- / title-wrap -->           
            </div>
        </div>
	</div>
	<?php
	
	$output_string=ob_get_contents();
	ob_end_clean();

	return $output_string;

}


/******************************************************************/
/*	Video Shortcode							      				  */
/******************************************************************/

function videoembed_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'type' => '',
      'url' => '',
	  'imageurl' => '',	 
      'width' => '',	 
      'height' => '',
      'align' => '',
      'shadow' => '',
	  'id' => '',
	  'autoplay' => '',	  	 	  	  	 	  	   
      ), $atts ) );

	$DYN_imgheight = esc_attr($height);
	$DYN_imgwidth = esc_attr($width);
	$DYN_movieurl = esc_attr($url);
	$DYN_videotype = esc_attr($type);
	$DYN_videoautoplay = esc_attr($autoplay);
	$DYN_previewimgurl = esc_attr($imageurl);
	
	$slide_id = "jwplayer".esc_attr($id);
	
	if($DYN_videotype=="jwplayer") {
		$DYN_videotype="jwp";
	}
	
	if($DYN_videotype=="flash") {
		$DYN_videotype="swf";
	}
	
	if(esc_attr($shadow)) {
		$DYN_videoshadow = "shadow ".esc_attr($shadow); 
	} else {
		$DYN_videoshadow ="";
	}
	
	if($DYN_videoautoplay) {
		$DYN_videoautoplay = "1";
	} else {
		$DYN_videoautoplay ="0";	
	}	
	
	ob_start(); ?>

	<div class="imagewrap <?php echo esc_attr($align); ?>" style="height:<?php echo $DYN_imgheight; ?>px;width:<?php echo $DYN_imgwidth; ?>px;">
    
		<div class="container videotype <?php echo $DYN_videoshadow ?>">   
			<div class="gridimg-wrap">
                                	
				
				<?php           
 
				$vidurl = $DYN_movieurl;
				$file = basename($vidurl); 
				$parts = explode(".", $file); 
				//File name 
				$vidid = $parts[0]; 		
  				if($DYN_videotype=="youtube") {
				
                        $vidid = strstr($vidid,'='); // trim id after = 
						$vidremove = strstr($vidid,'&'); // trim id after = 
						
						$ishd = strpos($vidremove ,"hd=1");
						if($ishd!=false) {
							$ishd="hd=1";
						} else {
							$ishd="hd=0";
						}
						
						$vidid = str_replace($vidremove,"",$vidid);
                        $vidid = substr($vidid, 1); // remove =		
					
				} elseif($DYN_videotype=="swf" || $DYN_videotype=="jwp") {
					$vidid = $vidurl;
				}
				
				if($DYN_videotype=="youtube") { ?>
				
				<iframe class="youtube-player" type="text/html" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>" src="http://www.youtube.com/embed/<?php echo $vidid; ?>?autoplay=<?php echo $DYN_videoautoplay ?>&amp;wmode=opaque&amp;title="></iframe>
				
				<?php } elseif($DYN_videotype=="vimeo") { ?>
				
				<iframe src="http://player.vimeo.com/video/<?php echo $vidid; ?>?autoplay=<?php echo $DYN_videoautoplay ?>&amp;title=0&amp;byline=0&amp;portrait=0" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>"></iframe>
				
				<?php } elseif($DYN_videotype=="swf") {?>
				          
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php echo $DYN_imgwidth; ?>>" height="<?php echo $DYN_imgheight; ?>">
				<param name="movie" value="<?php echo $vidid; ?><?php if($DYN_videotype!="swf") { ?>&amp;autoplay=<?php echo $DYN_videoautoplay ?><?php } ?>" />
                <param name="wmode" value="transparent" />
                <param name="allowFullScreen" value="true" />
				<param name="allowScriptAccess" value="always" />
                <param name="scale" value="exactfit">
           		<!--[if !IE]>-->                
				<object type="application/x-shockwave-flash" data="<?php echo $vidid; ?><?php if($DYN_videotype!="swf") { ?>&amp;autoplay=<?php echo $DYN_videoautoplay ?><?php } ?>" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>">
                <param name="wmode" value="transparent" />
                <param name="allowFullScreen" value="true" />
				<param name="allowScriptAccess" value="always" />		
                <param name="scale" value="exactfit">		
                <!--<![endif]-->
				<div>
					<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
				</div>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
				
			<?php } elseif($DYN_videotype=="jwp") {?>

            <div id="<?php echo $slide_id; ?>"></div>
            <script type="text/javascript">
              jwplayer('<?php echo $slide_id; ?>').setup({
                'id': 'player_<?php echo $slide_id; ?>',
                'width': '<?php echo $DYN_imgwidth; ?>',
                'height': '<?php echo $DYN_imgheight; ?>',
                'file': '<?php echo $vidid; ?>',
				<?php if(get_option('jwplayer_skin')) { ?>
				'skin': '<?php echo get_option('jwplayer_skin'); ?>',
				<?php } ?>
				<?php if(get_option('jwplayer_skinpos')) { ?>
				'controlbar.position': '<?php echo get_option('jwplayer_skinpos'); ?>',
				<?php } ?>				
				'stretching': 'exactfit',
				'controlbar.idlehide':'true',
				'wmode': 'transparent',
                'image': '<?php echo dyn_getimagepath($DYN_previewimgurl); ?>',
				'players': [
					{type: 'flash', src: '<?php echo get_option('jwplayer_swf'); ?>'},				
					{type: 'html5'},
                    {type: 'download'}
                ]
              });
			  
			jQuery(document).ready(function() {
    			jQuery('#<?php echo $slide_id; ?>').addClass('jwplayer'); 
				jQuery('#<?php echo $slide_id; ?>').addClass('id<?php echo esc_attr($id); ?>'); 

				if("1"=="<?php echo $DYN_videoautoplay; ?>") {
					jQuery('#<?php echo $slide_id; ?>').addClass('autostart'); 
					jQuery('#<?php echo $slide_id; ?>').addClass('first'); 
				}

				var firstvideo = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>.first').attr("id");
				if(firstvideo) {
					var autostart = jQuery('#'+firstvideo).attr("class");
					if(autostart.search("autostart")!=-1) {
						jwplayer(firstvideo).stop().play();
					}
				}
			
			});		
            </script>

			<?php } ?>
 	
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->	
    </div><!-- / imagewrap -->
<?php 

	$output_string=ob_get_contents();
	ob_end_clean();

	return $output_string;

}

/******************************************************************/
/*	Video Shortcode	*END*					      				  */
/******************************************************************/

/******************************************************************/
/*	Columns									      				  */
/******************************************************************/

function columns_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'border' => '',
	  'height' => '',
), $atts ) );
	if($code=="two_columns") {
	$class = "two";	
	} elseif($code=="two_columns_last") {
	$class = "two last clearfix";	
	} elseif($code=="three_columns") {
	$class = "three";	
	} elseif($code=="three_columns_last") {
	$class = "three last clearfix";	
	} elseif($code=="four_columns") {
	$class = "four";	
	} elseif($code=="four_columns_last") {
	$class = "four last clearfix";	
	} elseif($code=="onethird_columns") {
	$class = "onethird";	
	} elseif($code=="twothirds_columns") {
	$class = "twothirds";	
	} elseif($code=="onethird_columns_last") {
	$class = "onethird last clearfix";	
	} elseif($code=="twothirds_columns_last") {
	$class = "twothirds last clearfix";	
	} elseif($code=="onefourth_columns") {
	$class = "onefourth";	
	} elseif($code=="threefourths_columns") {
	$class = "threefourths";	
	} elseif($code=="onefourth_columns_last") {
	$class = "onefourth last clearfix";	
	} elseif($code=="threefourths_columns_last") {
	$class = "threefourths last clearfix";	
	}
	
	if(esc_attr($height)!='') {
	$height = 'style="height:'. esc_attr($height) .'px"';
	}
	
	$clear = strpos($code,"_last");

	if($clear === false) {
		return '<div class="columns '. $class .' '. esc_attr($border) .'" '. $height.'><div>'. do_shortcode($content) .'</div></div>';
	} else {
		return '<div class="columns '. $class .' '. esc_attr($border) .'" '. $height.'><div>'. do_shortcode($content) .'</div></div><div class="clear"></div>';
	}

   
}

/******************************************************************/
/*	Tabs									      				  */
/******************************************************************/

function tabs_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'id' => '',
), $atts ) );
	
	if($code=="tabswrap") {
		return '<div class="dyntabs">'. do_shortcode($content) .'</div>';
	} elseif($code=="tabhead") { // tab title check if first
	if( esc_attr($id)=="1") {
		return '<ul><li><h4 class="tabhead"><a href="#tabs-'. esc_attr($id).'">'. $content .'</a></h4></li>';
	} else {
		return '<li><h4 class="tabhead"><a href="#tabs-'. esc_attr($id).'">'. $content .'</a></h4></li>';
	}
	} elseif($code=="tabhead_last") {
		return '<li><h4 class="tabhead"><a href="#tabs-'. esc_attr($id).'">'. $content .'</a></h4></li></ul>';
	} elseif($code=="tab") {	
		return '<div id="tabs-'. esc_attr($id).'">'. do_shortcode($content) .'</div>';
	}
}


function accordion_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'title' => '',
	  'color' => '',
	  'class' => '',
	  'collapse' => '',
), $atts ) );

	ob_start();
	
	if($code=="accordion") { ?>
		<div class="accordion"><?php echo do_shortcode($content); ?></div>
        
		<script type="text/javascript">
        (function ($) {
        $(document).ready(function() {
        var getacc_id = parseInt(window.location.hash.slice(1)); // retrieve # number
    
        if(!getacc_id) {
            getacc_id = 0;
        }
        // Accordion
        $(".accordion").accordion({ header: "h3.accordionhead",autoHeight: false,collapsible: true,navigation:true,active:<?php if(esc_attr($collapse=='yes')) {  ?>false<?php } else { ?>getacc_id<?php } ?>});
        
        });
        })(jQuery);
        </script>      
        
	<?php } elseif($code=="panel") { ?>
		<div class="section <?php echo esc_attr($color) .' '. esc_attr($class); ?>"><h3 class="accordionhead"><a href="#"><?php echo esc_attr($title); ?></a></h3><div class="sectioncontent"><?php echo do_shortcode($content); ?></div></div>
	<?php } ?>

<?php 
 
 $output_string=ob_get_contents();
 ob_end_clean();
 return $output_string;

}

function list_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'style' => '',
	  'color' => '',
), $atts ) );

	return '<div class="list '. esc_attr($style) .' '. esc_attr($color) .'">'. do_shortcode($content) .'</div>';

}

function reveal_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'width' => '',
	  'align' => '',
	  'title' => '',
      ), $atts ) );
 
 if(esc_attr($width)) {
 	$width='style="width:'. esc_attr($width) .'px"';
 }
 
   return '<div class="revealbox '. esc_attr($align) .' clearfix" '. $width .'><h4 class="reveal"><span class="ui-icon"></span>'. esc_attr($title) .'</h4><div class="reveal-content">' . do_shortcode($content) . '</div></div>';

}

function dropcaps_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'style' => '',
	  'text' => '',
	  'color' => '',
      ), $atts ) );
 
   return '<span class="dropcap '. esc_attr($style) .' '. esc_attr($color) .'">' . esc_attr($text)  . '</span>';

}

function enquiry_form_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'emailto' => '',
	  'thankyou' => '',
	  'id' => '',

      ), $atts ) );
 
   ob_start(); 
   
   contact_form(esc_attr($id),'','',esc_attr($emailto),esc_attr($thankyou));
   $output_string=ob_get_contents();
   ob_end_clean();
   
   return $output_string;
   
}


add_filter('widget_text', 'do_shortcode');

add_shortcode('postgallery_grid', 'postgallery_grid_shortcode');
add_shortcode('postgallery_slider', 'postgallery_slider_shortcode');
add_shortcode('postgallery_image', 'postgallery_image_shortcode');
add_shortcode('postgallery_accordion', 'postgallery_accordion_shortcode');
add_shortcode('button', 'button_shortcode');
add_shortcode('droppanelbutton', 'droppanelbutton_shortcode');
add_shortcode('blockquote', 'blockquote_shortcode');
add_shortcode('hozbreak', 'hozbreak_shortcode');
add_shortcode('hozbreaktop', 'hozbreaktop_shortcode');
add_shortcode('styledbox', 'styledbox_shortcode');
add_shortcode('highlight', 'highlight_shortcode');
add_shortcode('imageeffect', 'imageeffect_shortcode');
add_shortcode('videoembed', 'videoembed_shortcode');
add_shortcode('tabswrap', 'tabs_shortcode');
add_shortcode('tabhead', 'tabs_shortcode');
add_shortcode('tabhead_last', 'tabs_shortcode');
add_shortcode('tab', 'tabs_shortcode');
add_shortcode('accordion', 'accordion_shortcode');
add_shortcode('list', 'list_shortcode');
add_shortcode('reveal', 'reveal_shortcode');
add_shortcode('dropcap', 'dropcaps_shortcode');
add_shortcode('panel', 'accordion_shortcode');
add_shortcode('two_columns', 'columns_shortcode');
add_shortcode('two_columns_last', 'columns_shortcode');
add_shortcode('three_columns', 'columns_shortcode');
add_shortcode('three_columns_last', 'columns_shortcode');
add_shortcode('onethird_columns', 'columns_shortcode');
add_shortcode('twothirds_columns', 'columns_shortcode');
add_shortcode('onethird_columns_last', 'columns_shortcode');
add_shortcode('twothirds_columns_last', 'columns_shortcode');
add_shortcode('four_columns', 'columns_shortcode');
add_shortcode('four_columns_last', 'columns_shortcode');
add_shortcode('onefourth_columns', 'columns_shortcode');
add_shortcode('threefourths_columns', 'columns_shortcode');
add_shortcode('onefourth_columns_last', 'columns_shortcode');
add_shortcode('threefourths_columns_last', 'columns_shortcode');
add_shortcode('enquiry_form', 'enquiry_form_shortcode');

?>
