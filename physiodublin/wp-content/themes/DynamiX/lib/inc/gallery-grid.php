<?php 

if(!$DYN_gridcolumns) { // Set default columns number
	$DYN_gridcolumns="3";
}

if($DYN_gridcolumns=="3") {
	$DYN_imgwidth="270";
	$DYN_shadowsize="shadow-medium";
} elseif($DYN_gridcolumns=="4") {
	$DYN_imgwidth="200";
	$DYN_shadowsize="shadow-small";
} elseif($DYN_gridcolumns=="5") {
	if(!$DYN_imgheight) {
	$DYN_imgheight="140";
	}
	$DYN_imgwidth="172";
	$DYN_shadowsize="shadow-xsmall";
} elseif($DYN_gridcolumns=="6") {
	if(!$DYN_imgheight) {
	$DYN_imgheight="100";
	}
	$DYN_imgwidth="148";
	$DYN_shadowsize="shadow-xsmall";
} elseif($DYN_gridcolumns=="7") {
	if(!$DYN_imgheight) {
	$DYN_imgheight="77";
	}
	$DYN_imgwidth="114";
	$DYN_shadowsize="shadow-xsmall";
}


if(!$DYN_slidesetid) { // If no Slide Set is selected use Categories

$postcount = 0;
$data_id = 0;
$cats='';


if($DYN_gallerycat) {

	foreach ($DYN_gallerycat as $catlist) { // Get category ID Array
		$cats = $cats.",".$catlist;
	}
	
	
	if(!$DYN_gridshowposts && !$DYN_gridfilter) { // Show number of posts on a page
		$DYN_gridshowposts="6";
	} elseif($DYN_gridfilter) {
		$DYN_gridshowposts="-1";	
	}
	
	if($DYN_gallerynumposts) { // Number of posts to display
		$numposts = $DYN_gallerynumposts;
	} else {
		$numposts = -1;
	}
	
	
	if($DYN_gallerysortby) { // Sort Posts by
		$sortby = $DYN_gallerysortby;
	} else {
		$sortby = "meta_value";
	}
	
	
	if($DYN_galleryorderby) {
		$orderby = $DYN_galleryorderby;
	} else {
		$orderby = "ASC";
	}

	$cats = lTrim($cats,',');
	

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
	'posts_per_page' => $DYN_gridshowposts,
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
	'orderby' => $sortby,
	'order' => $orderby,
	'posts_per_page' => $DYN_gridshowposts,
	'caller_get_posts'=> 1	
	);


	$featured_query = new wp_query($args);
} ?>

<?php if($DYN_gallerycat && $DYN_gridfilter) { ?>
	<div class="splitter-wrap">
		<ul class="splitter">
			<li><?php _e('Filter By: ', 'DynamiX' ); ?>
				<ul>
					<li class="segment-1 selected-1 active"><a href="#" data-value="all"><?php _e('All', 'DynamiX' ); ?></a></li>
					<?php 
					$catcount=2;
					
					foreach ($DYN_gallerycat as $catlist) { // Get category ID Array 
				
						if (is_numeric ($catlist)) { // backwards compatible with post id
							$catname = get_cat_name($catlist);
						} else {
							$catname = $catlist; // if not numeric, use category name
						}					
					
						$strip_html = preg_replace("/&#?[a-z0-9]+;/i","",$catname);	?>
                        
						<li class="segment-<?php echo $catcount; ?>"><a href="#" data-value="<?php echo str_replace(" ","_",$strip_html); ?>"><?php echo $catname; ?></a></li>                    
					<?php 
					$catcount++; } ?>
				</ul>
			</li>
		</ul>
	</div>
<?php } ?>
<div id="cwz-sortable">
<?php
while ($featured_query->have_posts()) : $featured_query->the_post(); 

/******************  Get custom field data ******************/     

$categories='';

foreach((get_the_category($post->ID)) as $category) {
		$categories .= str_replace(" ","_",$category->cat_name). ' ';
		$categories = preg_replace("/&#?[a-z0-9]+;/i","",$categories);
}

if(!$DYN_imgheight) {
	$DYN_imgheight="160";
}

$pdata = maybe_unserialize(get_post_meta( $post->ID, 'pgopts', true ));

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

$slide_id='';
$slide_id="slide-".$post_id;

$image = catch_image(); // Check for images within post ?>

<?php
if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}
?>

<?php require CWZ_FILES .'/inc/grid-gallery-frame.php'; ?> 

<?php endwhile; 

wp_reset_query(); ?>
<div class="clear"></div>
</div>

<?php } else { // Get Slide Set

$postcount=0;

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

if($category_array && $DYN_gridfilter) { ?>
	<div class="splitter-wrap">
		<ul class="splitter">
			<li><?php _e('Filter By: ', 'DynamiX' ); ?>
				<ul>
					<li class="segment-1 selected-1 active"><a href="#" data-value="all"><?php _e('All', 'DynamiX' ); ?></a></li>
					<?php 
					$catcount=2;
					
					foreach ($category_array as $catname) { // Get category ID Array ?>
                    <?php if($catname) { ?>
					<li class="segment-<?php echo $catcount; ?>"><a href="#" data-value="<?php echo str_replace(" ","_",$catname); ?>"><?php echo $catname; ?></a></li>                    <?php }
					$catcount++; } ?>
				</ul>
			</li>
		</ul>
	</div>
<?php } ?>
<div id="cwz-sortable">
<?php 

foreach($DYN_slidesetids as $DYN_slidesetid) {
$z = 0;
$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetid);
$get_slides_count = $get_slideset_data['slideset_id_slide_count'];

while ($z < $get_slides_count):

/******************  Get Slide Set data ******************/ 	

if(!$DYN_imgheight) {
	$DYN_imgheight="160";
}

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

$slide_id='';
$slide_id="slideset".$slideset_id."-".$z;

$categories = $get_slideset_data['slideset_id_catselect_'.$z]; // Enter Categories into an Array

$replace_arr = array(' ',',');
$replace_with= array('_',' '); 

$categories = str_replace($replace_arr,$replace_with,$categories);

/******************  / Get Slide Set data ******************/

$postcount++; 
$data_id++; ?>

<?php
if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}
?>

<?php require CWZ_FILES .'/inc/grid-gallery-frame.php'; ?>  

<?php 
$z++;
endwhile; 
}
?>
<div class="clear"></div>
</div>
<?php }

$postcount = 0;

$baseURL = get_permalink(); ?>

<div class="clear"></div>
<?php if(!$DYN_slidesetid) { pagination($featured_query,$baseURL); } ?>

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
		
		$('.grid-gallery .galleryimg,.grid-gallery .galleryvid').hover(
				
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

		$('#cwz-sortable .gridimg-wrap').hover(function(e) {
				$(this).find('.title').hoverFlow(e.type, { height: "show" }, 400, "easeInOutCubic");
				}, function(e) {
				$(this).find('.title').hoverFlow(e.type, { height: "hide" }, 400, "easeInBack");
		});
		
		$('#cwz-sortable .container .galleryimg').append('<div class="hoverimg" style="height:inherit"></div>');	
		$('#cwz-sortable .container .galleryvid').append('<div class="hovervid" style="height:inherit"></div>');	
		
		$("img.reflect").reflect({height:35,opacity:0.2});
				$("a[rel^='prettyPhoto']").prettyPhoto({
				keyboard_shortcuts: false,
				theme: 'light_rounded'
				});
	
		if ($.browser.msie && $.browser.version=="7.0" && typeof Cufon !== "undefined"){
			Cufon.replace('#cwz-sortable h2');
		}  else if(typeof Cufon !== "undefined") {
			Cufon.refresh();
		}	
	}
  };
  
  var $list = $('div#cwz-sortable');
  var $data = $list.clone();
  
  var $controls = $('ul.splitter ul');
  
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
		var cnt = $(".splitter ul li").length+1; // Cycle through list and remove class
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