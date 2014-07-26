// JavaScript Document
		$(document).ready(function() {
											
				tabPanel();					
											
				//$('a[title]').qtip({ style: { name: 'cream', tip: true } })
					
				jQuery(".help").simpletooltip();
				
				$('select[multiple]').selectList();
				
			
				// On Click
				$('.upload_button').click(function() {
				 formfield = $(this).attr('name');
				 formID = $(this).attr('rel');
				 
				 			  
				 tb_show('', 'media-upload.php?post_id='+formID+'&type=image&amp;TB_iframe=1');
				 return false;
				});
						
			 
				window.send_to_editor = function(html) {
				 			
					imgurl = $(html).attr('href');
				 	jQuery('#' + formfield).val(imgurl);
					tb_remove();
				}
	
				//Default Action
				$(".cycle").hide(); //Hide all content
				$("ul#tabnav li:first").addClass("active").show(); //Activate first tab
				$(".cycle:first").show(); //Show first tab content
				
				//On Click Event
				$("ul#tabnav li").click(function() {
					$("ul#tabnav li").removeClass("active"); //Remove any "active" class
					$(this).addClass("active"); //Add "active" class to selected tab
					$(".cycle").hide(); //Hide all tab content
					var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
					$(activeTab).show(); //Fade in the active content
					return false;
				});
			
		}); 
		

// TAB PANEL
function tabPanel(){
	
		//Default Action
			jQuery(".tabcontent").hide(); //Hide all content
			jQuery(".tabcontentwide").hide(); //Hide all content
			jQuery("#tabnav li:first, #simpletabnav li:first, #minimaltabnav li:first").addClass("active").fadeIn('fast'); //Activate first tab
			jQuery(".tabcontent:first").show(); //Show first tab content
			jQuery(".tabcontentwide:first" ).show(); //Show first tab content
			
			//On Click Event
			jQuery("#tabnav li, #simpletabnav li, #minimaltabnav li").click(function() {
				jQuery("#tabnav li, #simpletabnav li, #minimaltabnav li").removeClass("active"); //Remove any "active" class
				jQuery(this).addClass("active"); //Add "active" class to selected tab
				jQuery(".tabcontent").hide(); //Hide all content
				jQuery(".tabcontentwide").hide() //Hide all content
				var activeTab = jQuery(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
				jQuery(activeTab).stop().fadeIn('fast'); //Fade in the active content
				return false;
			});
	
	}	
	
		
		
(function ($) {
  styleSelect = {
    init: function () {
      $('.select-wrap, .select-multiple-wrap').each(function () {
        $(this).prepend('<span>' + $(this).find('.select option:selected').text() + '</span>');
      });
      $('.select').live('change', function () {
        $(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
      });
		
		 
		 
		  $('.select-multiple').prev('span').replaceWith('<span style="padding-top:2px;">Please select</span>');
		
		
      $('.select').bind($.browser.msie ? 'click' : 'change', function(event) {
        $(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
      }); 
    }
  };
  $(document).ready(function () {
    styleSelect.init()
  })
})(jQuery);


 
 
/**
*
*	simpleTooltip jQuery plugin, by Marius ILIE
*	visit http://dev.mariusilie.net for details
*
**/
(function($){ $.fn.simpletooltip = function(){
	return this.each(function() {
		var text = $(this).attr("title");
		$(this).attr("title", "");
		if(text != undefined) {
			$(this).hover(function(e){
				var tipX = e.pageX + 12;
				var tipY = e.pageY + 12;
				$(this).attr("title", ""); 
				$("body").append("<div id='simpleTooltip' style='position:absolute; z-index: 9999; display: none;'>" + text + "</div>");
				if($.browser.msie) var tipWidth = $("#simpleTooltip").outerWidth(true)
				else var tipWidth = $("#simpleTooltip").width()
				$("#simpleTooltip").width(tipWidth);
				$("#simpleTooltip").css("left", tipX).css("top", tipY).fadeIn("medium");
			}, function(){
				$("#simpleTooltip").remove();
				$(this).attr("title", text);
			});
			$(this).mousemove(function(e){
				var tipX = e.pageX - 10;
				var tipY = e.pageY - 90;
				var tipWidth = $("#simpleTooltip").outerWidth(true);
				var tipHeight = $("#simpleTooltip").outerHeight(true);
				if(tipX + tipWidth > $(window).scrollLeft() + $(window).width()) tipX = e.pageX - tipWidth;
				if($(window).height()+$(window).scrollTop() < tipY + tipHeight) tipY = e.pageY - tipHeight;
				$("#simpleTooltip").css("left", tipX).css("top", tipY).fadeIn("medium");
			});
		}
	});
}})(jQuery);

		
		
		
