jQuery(document).ready(function(){
			
						// Body font
			
				var bodyfontStatus = readCookie('bodyfontStatus');
				if(bodyfontStatus){
					jQuery('p,body,html').css("fontFamily", bodyfontStatus);
					jQuery('#bodyfont').val(bodyfontStatus);
				}
				else{
					jQuery('p,body,html').css("fontFamily", "Arial");
					jQuery('#bodyfont').val("Arial");
				}
				jQuery("#bodyfont").change(function () {
							var selectedbodyfont = jQuery('#bodyfont option:selected').val();
							createCookie('bodyfontStatus', selectedbodyfont,365);
							jQuery('p,body,html').css("fontFamily", selectedbodyfont);
					});
										  
										  
			// Titlefont
			
				var titlefontStatus = readCookie('titlefontStatus');
				if(titlefontStatus){
					jQuery('h1,h2,h3,h4,.slide-info .inner').css("fontFamily", titlefontStatus);
					jQuery('#titlefont').val(titlefontStatus);
				}
				else{
					jQuery('h1,h2,h3, h4, .slide-info').css("fontFamily", "YanoneKaffeesatz, Arial,Helvetica,  sans serif");
					jQuery('#titlefont').val("YanoneKaffeesatz, Arial,Helvetica,  sans serif");
				}
				jQuery("#titlefont").change(function () {
							var selectedfont = jQuery('#titlefont option:selected').val();
							createCookie('titlefontStatus', selectedfont,365);
							jQuery('h1,h2,h3,h4,.slide-info .inner').css("fontFamily", selectedfont);
					});
				
			// Menu font
			
				var menufontStatus = readCookie('menufontStatus');
				if(menufontStatus){
					jQuery('#tabnav li,  #primary-menu li a, .quote, a.buttonlarge').css("fontFamily", menufontStatus);
					jQuery('#menufont').val(menufontStatus);
				}
				else{
					jQuery('#tabnav li,  #primary-menu li a, .quote, a.buttonlarge').css("fontFamily", "YanoneKaffeesatz, Arial,Helvetica,  sans serif");
					jQuery('#menufont').val("YanoneKaffeesatz, Arial,Helvetica,  sans serif");
				}
				jQuery("#menufont").change(function () {
							var selectedmenufont = jQuery('#menufont option:selected').val();
							createCookie('menufontStatus', selectedmenufont,365);
							jQuery('#tabnav li,  #primary-menu li a, .quote, a.buttonlarge').css("fontFamily", selectedmenufont);
					});
			

				
				
			var panel = readCookie('panelOpen');
			
			if (panel) {
			jQuery("#options_panel").stop().css({left: "0"}); 
			
			}
					
			jQuery("#openPanel").hover(function(){
					jQuery("#options_panel").stop().animate({left: "0"},200,'easeOutQuad');
					var panelStatus = 'open';
					createCookie('panelOpen', panelStatus,365);
					});
			
			jQuery("#close").click(function(){
					eraseCookie('panelOpen');
					jQuery("#options_panel").stop().animate({left: "-188"},200,'easeOutQuad'); 
						
					});
			
			
				if(window.location == 'http://itworx.no/itworx/'){
									jQuery("#slideshow_0").attr('checked',true);	
							};
							
				if(window.location == 'http://itworx.no/itworx/home-accordion/'){
									jQuery("#slideshow_1").attr('checked',true);	
							};
				if(window.location == 'http://itworx.no/itworx/home-nivo/'){
									jQuery("#slideshow_2").attr('checked',true);	
							};
				
				
				jQuery("#slideshow_0").click(function() {
                	window.location = 'http://itworx.no/itworx/';						
            		});
		  
				jQuery("#slideshow_1").click(function() {
						window.location = 'http://itworx.no/itworx/home-accordion/';
						});
				
				jQuery("#slideshow_2").click(function() {
							window.location = 'http://itworx.no/itworx/home-nivo/';
						});
				
				
				
				
				// Tabpanel on/off
				//jQuery("#showtabpanel").attr('checked',false);
				
				var tabStatus = readCookie('tabStatus');
				
				if(tabStatus){
					jQuery("#hometabs").hide();
					jQuery("#showtabpanel").attr('checked',false);
				}
				else{
					jQuery("#hometabs").show();
					jQuery("#showtabpanel").attr('checked',true);
				}
				
		
				jQuery("#showtabpanel").change(function () {
					
					if (jQuery("#showtabpanel").attr('checked')) {
						  jQuery("#hometabs").fadeIn();
						  eraseCookie('tabStatus');
					}
					else{
						jQuery("#hometabs").fadeOut();
						var tabDisplay = 'showing';
						  createCookie('tabStatus', tabDisplay,365);
						
					}
				});
				
				
			
				
				
				// Secondary on/off
				
				//jQuery("#showsecondary").attr('checked',false);
				
				var menuStatus = readCookie('menuStatus');
				
				if(menuStatus){
					jQuery("#header_top").show();
					jQuery("#showsecondary").attr('checked',true);
				}
				else{
					jQuery("#header_top").hide();
					jQuery("#showsecondary").attr('checked',false);
				}
				
				jQuery("#showsecondary").change(function () {
					
					if (jQuery("#showsecondary").attr('checked')) {
						  jQuery("#header_top").fadeIn('fast');
						  var menuDisplay = 'showing';
						  createCookie('menuStatus', menuDisplay,365);
					}
					else{
						jQuery("#header_top").fadeOut('fast');
						eraseCookie('menuStatus');
					}
				});
				
				
				
				// Articles on/off (Default ON)
				
			
				 	
				var articlesStatus = readCookie('articlesStatus');
				

					if(articlesStatus){
						jQuery("#phi_home_article").hide();
						jQuery("#showarticles").attr('checked',false);
					}
					else{
						jQuery("#phi_home_article").show();
						jQuery("#showarticles").attr('checked',true);
					}
				
				
				jQuery('#showarticles').change(function () {
					
					if (jQuery("#showarticles").attr('checked')) {
						  jQuery("#phi_home_article").fadeIn('fast');
						  eraseCookie('articlesStatus');
						  
					}
					else{
						jQuery("#phi_home_article").fadeOut('fast');
						 var articleDisplay = 'showing';
						 createCookie('articlesStatus', articleDisplay,365);
						
					}
				});
				
				
				// FEATURED PAGES ON/OFF
				
				var featuredStatus = readCookie('featuredStatus');
				
				if(featuredStatus){
					jQuery("#featuredpages").hide();
					jQuery("#showfeatured").attr('checked',false);
				}
				else{
					jQuery("#featuredpages").show();
					jQuery("#showfeatured").attr('checked',true);
				}
				
				
				jQuery("#showfeatured").change(function () {
					
					if (jQuery("#showfeatured").attr('checked')) {
						  jQuery("#featuredpages").fadeIn();
						 eraseCookie('featuredStatus');
					}
					else{
						jQuery("#featuredpages").fadeOut();
						 var featuredDisplay = 'showing';
						  createCookie('featuredStatus', featuredDisplay,365);
					}
				});
				
				
				// Blog posts  on/off
				var blogStatus = readCookie('blogStatus');
				
				if(blogStatus){
					jQuery("#home_blog").show();
					jQuery("#showblog").attr('checked',true);
				}
				else{
					jQuery("#home_blog").hide();
					jQuery("#showblog").attr('checked',false);
				}
				
				
				
				jQuery("#showblog").change(function () {
					
					if (jQuery("#showblog").attr('checked')) {
						  jQuery("#home_blog").fadeIn();
						    var blogDisplay = 'showing';
						  createCookie('blogStatus', blogDisplay,365);
					}
					else{
						jQuery("#home_blog").fadeOut();
						eraseCookie('blogStatus');
					}
				});
				
				
				// Widgets posts  on/off
				
				var w1Status = readCookie('w1Status');
				
				if(w1Status){
					jQuery("#homewidget1").hide();
					jQuery("#showwidget1").attr('checked',false);
				}
				else{
					jQuery("#homewidget1").show();
					jQuery("#showwidget1").attr('checked',true);
				}
				
				jQuery('#showwidget1').change(function () {
					
					if (jQuery("#showwidget1").attr('checked')) {
						  jQuery("#homewidget1").fadeIn();
						  eraseCookie('w1Status');
					}
					else {
						jQuery("#homewidget1").fadeOut()
						 var w1Display = 'showing';
						  createCookie('w1Status', w1Display,365);
					};
				});
				
				
				
				
				// Widget 2
			
				

				
				var widget2Status = readCookie('w2Status');
				
				if(widget2Status){
					jQuery("#homewidget2").show();
					jQuery("#showwidget2").attr('checked',true);
				}
				else{
					jQuery("#homewidget2").hide();
					jQuery("#showwidget2").attr('checked',false);
				}
				
				
				jQuery("#showwidget2").change(function () {
					
					if (jQuery("#showwidget2").attr('checked')) {
						  jQuery("#homewidget2").fadeIn();
						  var w2Display = 'showing';
						  createCookie('w2Status', w2Display,365);
					}
					else{
						jQuery("#homewidget2").fadeOut();
						eraseCookie('w2Status');
					}
				});
				
				// Widget 3
								
				var widget3Status = readCookie('w3Status');
				
				if(widget3Status){
					jQuery("#homewidget3").show();
					jQuery("#showwidget3").attr('checked',true);
				}
				else{
					jQuery("#homewidget3").hide();
					jQuery("#showwidget3").attr('checked',false);
				}
				
				
				jQuery("#showwidget3").change(function () {
					
					if (jQuery("#showwidget3").attr('checked')) {
						  jQuery("#homewidget3").fadeIn();
						  var w3Display = 'showing';
						  createCookie('w3Status', w3Display,365);
					}
					else{
						jQuery("#homewidget3").fadeOut();
						eraseCookie('w3Status');
					}
				});
				
				
				// Widget 4
				
				var widget4Status = readCookie('w4Status');
				
				if(widget4Status){
					jQuery("#homewidget4").show();
					jQuery("#showwidget4").attr('checked',true);
				}
				else{
					jQuery("#homewidget4").hide();
					jQuery("#showwidget4").attr('checked',false);
				}
				
				
				jQuery("#showwidget4").change(function () {
					
					if (jQuery("#showwidget4").attr('checked')) {
						  jQuery("#homewidget4").fadeIn();
						  var w4Display = 'showing';
						  createCookie('w4Status', w4Display,365);
					}
					else{
						jQuery("#homewidget4").fadeOut();
						eraseCookie('w4Status');
					}
				});
				
				
			// Toggle on off cookie
			
		
			
			// Background color
			
			var bc = readCookie('bCol');
			
			if (bc) {
			jQuery('#colorSelector div').css('backgroundColor', bc);
			jQuery('body, html').css('backgroundColor',  bc);					  
			}
			
			jQuery('#colorSelector').ColorPicker({
				color: '#555',
				onShow: function (colpkr) {
					jQuery(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					var bgc = jQuery('body').css('backgroundColor');
					//	alert(bgc);
					jQuery(colpkr).fadeOut(500);
					
					createCookie('bCol', bgc,365);
					
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					
					
					jQuery('#colorSelector div').css('backgroundColor', '#' + hex);
					jQuery('body, html').css('backgroundColor', '#' + hex);

				}
		
			 });
			
	
			// Link color
			
			var lc = readCookie('lCol');
			
			
			if (lc) {
			jQuery('#colorSelector2 div').css('backgroundColor', lc);
			
			jQuery('#content a').not("#tabnav li a, .tabcontent .inner a, #pager ul li.current a, a.button, a.lightbtn, a.darkbtn, #kwicks a, a.buttonlarge, a.buttonmedium").css('color', lc);
			jQuery('a.button, input[type=submit], input[type=reset],a.buttonlarge, a.buttonmedium').not("a.lightbtn, a.darkbtn").css('backgroundColor', lc);
			};
			
			
			jQuery('#colorSelector2').ColorPicker({
				color: '#555',
				onShow: function (colpkr) {
					jQuery(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					var lc = jQuery('#content a').css('color');
					
					//	alert(bgc);
					jQuery(colpkr).fadeOut(500);
					
					createCookie('lCol', lc,365);
					
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					
					jQuery('#colorSelector2 div').css('backgroundColor', '#' + hex);
					jQuery('#content a').not("#tabnav li a, .tabcontent .inner a, #pager ul li.current a, a.button, a.lightbtn, a.darkbtn, #kwicks a,a.buttonlarge, a.buttonmedium").css('color', '#' + hex);
					jQuery('a.button,input[type=submit], input[type=reset], a.buttonlarge, a.buttonmedium').not("a.lightbtn, a.darkbtn").css('backgroundColor', '#' + hex);
					}
 				});
			
			
			
			// Menu color
			
			var mc = readCookie('mCol');
			
			
			if (mc) {
			jQuery('#colorSelector3 div').css('backgroundColor', mc);
			jQuery('#primary').css('backgroundColor', mc);					  
			}
			
			
			jQuery('#colorSelector3').ColorPicker({
				color: '#555',
				onShow: function (colpkr) {
					jQuery(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					var mc = jQuery('#primary').css('backgroundColor');
					//	alert(bgc);
					jQuery(colpkr).fadeOut(500);
					
					createCookie('mCol', mc,365);
					
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					
					jQuery('#colorSelector3 div').css('backgroundColor', '#' + hex);
					jQuery('#primary').css('backgroundColor', '#' + hex);
					
					
					}
 				});
			
			
				// Reset cookies
				jQuery('#resetColor').click(function(){
															 
						eraseCookie('bCol');	
						eraseCookie('lCol');	
						eraseCookie('mCol');	
						eraseCookie('menuStatus');
						eraseCookie('tabStatus');
						eraseCookie('articlesStatus');
						eraseCookie('featuredStatus');
						eraseCookie('blogStatus');
						eraseCookie('w1Status');
						eraseCookie('w2Status');
						eraseCookie('w3Status');
						eraseCookie('w4Status');
						eraseCookie('menufontStatus');
						eraseCookie('bodyfontStatus');
						eraseCookie('titlefontStatus');
				});
});


function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}