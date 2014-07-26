//jQuery.noConflict();

jQuery(window).load(function() {
									  
	var nivo_slider_effect = jQuery("meta[name=nivo_slider_effect]").attr('content');
	var nivo_slider_timeout = jQuery("meta[name=nivo_slider_timeout]").attr('content');
	var nivo_slider_slices = jQuery("meta[name=nivo_slider_slices]").attr('content');
	
	if(nivo_slider_effect){								  
    jQuery('#nivo').nivoSlider({
		  effect:nivo_slider_effect, //Specify sets like: 'fold,fade,sliceDown'
        slices:nivo_slider_slices,
        animSpeed:500, //Slide transition speed
        pauseTime:nivo_slider_timeout,
        startSlide:0, //Set starting Slide (0 index)
        directionNav:false, //Next & Prev
        //directionNavHide:true, //Only show on hover
        controlNav:true, //1,2,3...
        //controlNavThumbs:true, //Use thumbnails for Control Nav
        //controlNavThumbsFromRel:false, //Use image rel for thumbs
        //controlNavThumbsSearch: '.jpg', //Replace this with...
        //controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
        keyboardNav:true, //Use left & right arrows
        pauseOnHover:true, //Stop animation while hovering
        manualAdvance:false, //Force manual transitions
        captionOpacity:0, //Universal caption opacity
        beforeChange: function(){},
        afterChange: function(){},
        slideshowEnd: function(){}, //Triggers after all slides have been shown
        lastSlide: function(){}, //Triggers when last slide is shown
        afterLoad: function(){} //Triggers when slider has loaded	 
	});
};
});
									  

jQuery(document).ready(function(){
					
			sliderHover();					  
			
			// PRETTYPHOTO
			jQuery("a[rel^='prettyPhoto']").prettyPhoto(); 
			
			
			// HOVER EFFECT ON PORTFOLIO/GALLERY THUMBNAILS
			portfolioHover();
			
			// TOGGLE FUNCTION
			toggleMenu();
		
					
			// TAB PANEL
			tabPanel();
			
			
			
			// PRIMARY MENU HOVER EFFECT
			primaryHover();
			secondaryHover();
			
			// LOGO HOVER FUNCTION
			if(!jQuery.browser.msie){
			jQuery("#logo").hover(function(){
					jQuery("#logo img").stop().fadeTo("slow", 0.5); 
					},function(){
					jQuery("#logo img").stop().fadeTo("slow", 1); 
			
			});
			}
			
			// CYCLE GALLERY
			jQuery('#gallerycycle').cycle({
			  fx: 'fade',
			  speed:300,
			  easing: 'easeInOutQuad',
			  cleartype:  1,
			  pause:0,
			  timeout: 0,
			  next:  '#next-gallery',
			  prev:  '#prev-gallery'
			});		
			
			jQuery('#galleryslider').cycle({
			  fx: 'fade',
			  speed:300,
			  easing: 'easeInOutQuad',
			  cleartype:  1,
			  pause:0,
			  timeout: 0,
			  next:  '#next-gallery',
			  prev:  '#prev-gallery'

			});		
			
			jQuery('#portfoliocycle').cycle({
			  fx: 'fade',
			  speed:300,
			  easing: 'easeInOutQuad',
			  cleartype:  1,
			  pause:0,
			  timeout: 3000
			  //next:  '#next-gallery',
			  //prev:  '#prev-gallery'

			});		
			
		
			// CYCLE SLIDERS
			
			var home_slider_effect = jQuery("meta[name=cycle_slider_effect]").attr('content');
			var home_slider_timeout = jQuery("meta[name=cycle_slider_timeout]").attr('content');
			
			jQuery('#cycle div:first').fadeIn(1000, function() {	 
			jQuery('#cycle').cycle({
			  //fx: $home_slider_effect,
			  fx: home_slider_effect,
			  speed:1000,
			  easing: 'easeInOutQuad',
			  cleartype:  1,
			  pause:1,
			  timeout: home_slider_timeout,
			  pager: '.slide-nav-markers'
				});
			});
			

});


function primaryHover(){
	
		jQuery("#primary-menu ul ul").hover(function(){
			jQuery(this).parent().find("a").addClass("primary-active");
			},function(){
			jQuery(this).parent().find("a").removeClass("primary-active");
			
		});
	
}

function secondaryHover(){
	
		jQuery("#secondary-menu ul ul").hover(function(){
			jQuery(this).parent().find("a").addClass("secondary-active");
			},function(){
			jQuery(this).parent().find("a").removeClass("secondary-active");
			
		});
	
}

function sliderHover(){
	
		
		jQuery("#feature-wrap").hover(function(){
			jQuery(this).find(".p-slide, .n-slide").stop().fadeTo('fast', 1);
			},function(){
			jQuery(this).find(".p-slide, .n-slide").stop().fadeTo('fast', 0);
		});
	
}

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
	


	
// HOVER EFFECT ON PORTFOLIO/GALLERY IMAGES
function portfolioHover(){
			// PORTFOLIO AND GALLERY ZOOM
			jQuery(".portfolio .zoom").css({'opacity':'0'});
			jQuery(".portfolio").hover(function(){
					jQuery(".zoom",this).stop().fadeTo("slow", 1); 
					},function(){
					jQuery(".zoom",this).stop().fadeTo("slow", 0);  
			
			});
			
			
			jQuery(".portfolio").hover(function(){
					jQuery(this).stop().fadeTo("medium", 0.6); 
					},function(){
					jQuery(this).stop().fadeTo("slow", 1);  
			
			});
			}

// TOGGLE
function toggleMenu(){
	
	jQuery(".toggle_container").hide(); 

	//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
	jQuery("p.trigger").click(function(){
		jQuery(this).toggleClass("active").next().slideToggle("slow");
		return false; //Prevent the browser jump to the link anchor
	});
						
}

// OPEN LINKS IN NEW WINDOW
jQuery(function() {
	jQuery('a[rel*=external]').click( function() {
		window.open(this.href);
		return false;
	});
});

// JavaScript Document

/* 
 * Cross-browser event handling, by Scott Andrew
 */
function addEvent(element, eventType, lamdaFunction, useCapture) {
    if (element.addEventListener) {
        element.addEventListener(eventType, lamdaFunction, useCapture);
        return true;
    } else if (element.attachEvent) {
        var r = element.attachEvent('on' + eventType, lamdaFunction);
        return r;
    } else {
        return false;
    }
}

/*
 * Clear Default Text: functions for clearing and replacing default text in
 * <input> elements.
 *
 * by Ross Shannon, http://www.yourhtmlsource.com/
 */

addEvent(window, 'load', init, false);

function init() {
    var formInputs = document.getElementsByTagName('input');
    for (var i = 0; i < formInputs.length; i++) {
        var theInput = formInputs[i];
        
        if (theInput.type == 'text' && theInput.className.match(/\bcleardefault\b/)) {  
            /* Add event handlers */          
            addEvent(theInput, 'focus', clearDefaultText, false);
            addEvent(theInput, 'blur', replaceDefaultText, false);
            
            /* Save the current value */
            if (theInput.value != '') {
                theInput.defaultText = theInput.value;
            }
        }
    }
}

function clearDefaultText(e) {
    var target = window.event ? window.event.srcElement : e ? e.target : null;
    if (!target) return;
    
    if (target.value == target.defaultText) {
        target.value = '';
    }
}

function replaceDefaultText(e) {
    var target = window.event ? window.event.srcElement : e ? e.target : null;
    if (!target) return;
    
    if (target.value == '' && target.defaultText) {
        target.value = target.defaultText;
    }
}

// Reverses the z-indexing for correcting ie7 z-index issues
/*jQuery(function() {
	var zIndexNumber = 1000;
	jQuery('div').each(function() {
		jQuery(this).css('zIndex', zIndexNumber);
		zIndexNumber -= 10;
	});
});*/


function siteAjax(){
	
	 var $mainContent = jQuery("#content"), 
        siteUrl = "http://" + top.location.host.toString(), 
        url = ''; 

    jQuery(document).delegate("a[href^='"+siteUrl+"']:not([href*=/wp-admin/]):not([href*=/wp-login.php]):not([href$=/feed/])", "click", function() { 
        location.hash = this.pathname; 
        return false; 
    }); 

    jQuery("#searchform").submit(function(e) { 
        location.hash = '?s=' + $("#s").val(); 
        e.preventDefault(); 
    }); 

    jQuery(window).bind('hashchange', function(){ 
        url = window.location.hash.substring(1); 

        if (!url) { 
            return; 
        } 

        url = url + " #content"; 

        $mainContent.animate({opacity: "0.1"}).html('<p>Please wait...</>').load(url, function() { 
            $mainContent.animate({opacity: "1"}); 
        }); 
    });

    jQuery(window).trigger('hashchange'); 
	
	}
	
// ACCORDION SLIDER EVENT HANDLERS

jQuery(function () {
	
	jQuery('.slideimage').hide();
	jQuery('.slide-minicaption').hide();
	jQuery('.slidecaption').hide();
});


jQuery(window).bind("load", function() {
		
		
		
		//jQuery(".slidecaption").hide();
		jQuery(".slidecaption").css({'opacity':'0'});
		jQuery('.slide-minicaption').show();
		//jQuery('.slidecaption').show();
		jQuery('.slideimage:hidden').fadeIn(500);
		jQuery(".slide-minicaption").fadeTo(1, 0.8);
		
				
		jQuery('.kwicks').kwicks({
			
			max :  760,
			spacing:0
		});

});

jQuery(function(){ 
		jQuery(".accslide").hover(function() {
		jQuery(".slide-minicaption",this).stop().animate({opacity: 0},200, 'easeInSine').parent().find(".slidecaption").show().stop().delay(400).animate({opacity: 0.8, bottom: '20'},400, 'easeOutSine');	
		},function(){
		jQuery(".slide-minicaption",this).stop().animate({opacity: 0.8},200, 'easeOutSine');
		jQuery(".slidecaption",this).stop().animate({opacity: 0, bottom: '-20'}, 200, 'easeInSine').hide();				
		});
});

/*********************
//* jQuery Multi Level CSS Menu #2- By Dynamic Drive: http://www.dynamicdrive.com/
//* Last update: Nov 7th, 08': Limit # of queued animations to minmize animation stuttering
//* Menu avaiable at DD CSS Library: http://www.dynamicdrive.com/style/
*********************/

//Update: April 12th, 10: Fixed compat issue with jquery 1.4x

//Specify full URL to down and right arrow images (23 is padding-right to add to top level LIs with drop downs):
var arrowimages={down:['', ''], right:['', '']}

var jqueryslidemenu={

animateduration: {over: 300, out: 50}, //duration of slide in/ out animation, in milliseconds

buildmenu:function(menuid, arrowsvar){
	jQuery(document).ready(function($){
		$("#main-menu").removeAttr("title");

		var $mainmenu=$(menuid+">ul")
		var $headers=$mainmenu.find("ul").parent()
		$headers.each(function(i){
			var $curobj=$(this)
			var $subul=$(this).find('ul:eq(0)')
			this._dimensions={w:this.offsetWidth, h:this.offsetHeight, subulw:$subul.outerWidth(), subulh:$subul.outerHeight()}
			this.istopheader=$curobj.parents("ul").length==1? true : false
			$subul.css({top:this.istopheader? this._dimensions.h+"px" : 0})
			/*
			$curobj.children("a:eq(0)").css(this.istopheader? {paddingRight: arrowsvar.down[2]} : {}).append(
				'<img src="'+ (this.istopheader? arrowsvar.down[1] : arrowsvar.right[1])
				+'" class="' + (this.istopheader? arrowsvar.down[0] : arrowsvar.right[0])
				+ '" style="border:0;" />'
			)*/
			
			$curobj.hover(
				function(e){
					var $targetul=$(this).children("ul:eq(0)")
					this._offsets={left:$(this).offset().left, top:$(this).offset().top}
					
					if(jQuery.browser.msie){
						var menuleft=this.istopheader? 0 : this._dimensions.w +2
						menuleft=(this._offsets.left+menuleft+this._dimensions.subulw>$(window).width())? (this.istopheader? -this._dimensions.subulw+this._dimensions.w : -this._dimensions.w) -4 : menuleft
					}
					if(!jQuery.browser.msie){
						var menuleft=this.istopheader? 0 : this._dimensions.w
						menuleft=(this._offsets.left+menuleft+this._dimensions.subulw>$(window).width())? (this.istopheader? -this._dimensions.subulw+this._dimensions.w : -this._dimensions.w) : menuleft
					}
					if ($targetul.queue().length<=1) //if 1 or less queued animations
						$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).slideDown(jqueryslidemenu.animateduration.over)
				},
				function(e){
					var $targetul=$(this).children("ul:eq(0)")
					$targetul.slideUp(jqueryslidemenu.animateduration.out)
				}
			) //end hover
			$curobj.click(function(){
				$(this).children("ul:eq(0)").hide()
			})
		}) //end $headers.each()
		$mainmenu.find("ul").css({display:'none', visibility:'visible'})
	}) //end document.ready
}
}
var kill_dropdown  = jQuery("meta[name=kill_dropdown]").attr('content');
if(!kill_dropdown){
jqueryslidemenu.buildmenu("#primary-menu", arrowimages),
jqueryslidemenu.buildmenu("#secondary-menu", arrowimages)
};