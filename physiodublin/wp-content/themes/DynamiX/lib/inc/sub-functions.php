<?php 

function custom_html($title,$content) {
	if($title) {
	echo "<h3>".$title."</h3>";
	}
	echo $content;
}

function contact_form($id,$title,$desc,$adminemail,$msg) {
if(!$adminemail) {$adminemail=get_option("admin_email");} 
$adminemail=str_replace('@','#',$adminemail);	
?>

<script type='text/javascript'>
(function ($) {
$(document).ready(function(){
 $('#<?php echo $id; ?>contactform input').focus(function() {
	$(this).removeClass('fielderror');
 });
 $('#<?php echo $id; ?>contactform textarea').focus(function() {
	$(this).removeClass('fielderror');
 });
	
 $("#<?php echo $id; ?>contactform #<?php echo $id; ?>submit").click(function(){

  $("#<?php echo $id; ?>contactform_wrap .error").slideUp();
  var hasError = false;
  var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

  var emailToVal = $("#<?php echo $id; ?>emailTo").val();
  emailToVal=emailToVal.replace('#','@');
  if(emailToVal == '') {
   $("#<?php echo $id; ?>emailTo").addClass('fielderror');
   hasError = true;
  } else if(!email_regex.test(emailToVal)) {
   $("#<?php echo $id; ?>emailTo").addClass('fielderror');
   hasError = true;
  }

  var emailFromVal = $("#<?php echo $id; ?>emailFrom").val();
  
  if(emailFromVal == '') {
   $("#<?php echo $id; ?>emailFrom").addClass('fielderror');
   hasError = true;
  } else if(!email_regex.test(emailFromVal)) {
   $("#<?php echo $id; ?>emailFrom").addClass('fielderror');
   hasError = true;
  }

  var subjectVal = $("#<?php echo $id; ?>subject").val();

  var messageVal = $("#<?php echo $id; ?>message").val();

  if(messageVal == '') {
   $("#<?php echo $id; ?>message").addClass('fielderror');
   hasError = true;
  }

  var nameVal = $("#<?php echo $id; ?>name").val();
  if(nameVal == '') {
   $("#<?php echo $id; ?>name").addClass('fielderror');
   hasError = true;
  }
  

  if(hasError == false) {
			
   $.post('<?php echo get_bloginfo('template_url').'/lib/inc/contact-send.php' ?>',$("#<?php echo $id; ?>contactform").serialize(),

     function(data){
		$("#<?php echo $id; ?>contactform_wrap .error").slideUp();		
		$('#<?php echo $id; ?>contactform .field').val('');
		$("#<?php echo $id; ?>contactform_wrap .success").slideDown(function() {
			$(this).delay(5000).slideUp('slow');	
		});
    }
   );
  } else if(hasError == true) {
	  $("#<?php echo $id; ?>contactform_wrap .error").slideDown();
  }

  return false;
 });
}); 

})(jQuery);
</script>

<div id="<?php echo $id; ?>contactform_wrap" class="contactform_wrap">
	<div class="success">
    <h3><?php _e('Thanks!', 'DynamiX' ); ?></h3>
	<p><?php if($msg) { echo $msg; } else { _e('Your email was successfully sent. Your enquiry will be dealt with as soon as possible.', 'DynamiX' ); } ?></p>
	</div>
    <div class="error">
		 <p><img src="<?php bloginfo('template_url') ?>/images/error.png" alt="error key" /> <?php _e('Required fields not completed correctly.', 'DynamiX' ); ?></p>
	</div>
    <form action="#" id="<?php echo $id; ?>contactform" class="contactform" method="post">
        <ol class="forms">	
            <li><input type="text" name="<?php echo $id; ?>name" id="<?php echo $id; ?>name" value="" class="field" />
            <label for="<?php echo $id; ?>name"><small><?php _e('Name', 'DynamiX' ); ?> <span class="required">*</span></small></label></li>
            <li><input type="text" name="<?php echo $id; ?>emailFrom" id="<?php echo $id; ?>emailFrom" value="" class="field" />
            <label for="<?php echo $id; ?>emailFrom"><small><?php _e('Email', 'DynamiX' ) ?> <span class="required">*</span></small></label></li>        
            <li><textarea name="<?php echo $id; ?>message" id="<?php echo $id; ?>message" class="field"></textarea></li>
            <li><input type="text" name="<?php echo $id; ?>siteURL" id="<?php echo $id; ?>siteURL" value="" class="hfield" /></li>
            <li><button type="submit" id="<?php echo $id; ?>submit"><?php _e('Submit', 'DynamiX' ); ?></button></li>
            <li><input type="hidden" name="<?php echo $id; ?>subject" id="<?php echo $id; ?>subject" value="<?php _e('Contact Form Submission from ', 'DynamiX' ); ?>" />
            <input type="hidden" name="<?php echo $id; ?>emailTo" id="<?php echo $id; ?>emailTo" value="<?php echo $adminemail; ?>" />
            <input type="hidden" name="<?php echo $id; ?>fields" id="<?php echo $id; ?>fields" value="<?php echo get_option('blogname');?>|<?php _e('Name', 'DynamiX' ); ?>|<?php _e('Email', 'DynamiX' ); ?>|<?php _e('Comments', 'DynamiX' ); ?>" />
            <input type="hidden" name="form_id" value="<?php echo $id; ?>" /></li>
        </ol>
    </form>
</div>
<?php } 

function pages_list($title,$exclude) {
	if($title) {
	echo "<h3>".$title."</h3>";
	}
	
	echo "<ul class=\"widgetlinks\">";
	$show_pages = wp_list_pages('echo=0&title_li=&exclude='.$exclude);
	$show_pages = preg_replace("@<span[^>]*?>.*?</span>@si", "", $show_pages); // Removes page descriptions
	echo $show_pages;
	echo "</ul>";
}

function recent_posts($title,$cat,$posts) {
	if($title) {
	echo "<h3>".$title."</h3>";
	} 
	
	echo "<ul class=\"widgetlinks\">";	
	global $post;
	$getposts = get_posts('category='.$cat.'&numberposts='.$posts);
	foreach($getposts as $post) :
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endforeach;
	wp_reset_query();
	echo "</ul>";
}

function categories($title,$cats) {
	if($title) {
	echo "<h3>".$title."</h3>";
	} 
	
	echo "<ul class=\"widgetlinks\">";	
	if($cats) {
	foreach ($cats as $value)
	{
		$string = $string.$value.",";
    }
	wp_list_categories('include='.$string.'&title_li=');
	} else {
	wp_list_categories('title_li=');
	}
	echo "</ul>";	
}

function meta_information($title,$meta1,$meta2,$meta3,$meta4,$meta5) {
	if($title) {
	echo "<h3>".$title."</h3>";
	} 
	
	echo "<ul class=\"widgetlinks\">";	
	if($meta1) {
	wp_register();
	} ?>
    
	<?php if($meta2) { ?>
    <li><?php wp_loginout(); ?></li>
    <?php } ?>
    
    <?php if($meta3) { ?>
	<li><a href="<?php bloginfo('rss2_url'); ?>" >Entries RSS</a></li> 
    <?php } ?>
    
	<?php if($meta4) { ?>
	<li><?php  comments_rss_link('Comments RSS'); ?></li>
    <?php } ?>
    
    <?php if($meta5) { ?>
	<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
	<?php wp_meta();
	}
	echo "</ul>";	
}


function catch_image() { // Check if image exists within post and return first one. 
  global $post, $posts;
  $first_img = '';
  $short_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $shrtoutput = preg_match_all('/imageeffect.+url=[\'"]([^\'"]+)[\'"].*/i', $post->post_content, $shrtmatches); // Check shortcode image
  
  $short_img = $shrtmatches [1] [0];
  $first_img = $matches [1] [0];

  if($short_img) {
  return $short_img;
  } else {
  return $first_img;  
  }
}
?>
