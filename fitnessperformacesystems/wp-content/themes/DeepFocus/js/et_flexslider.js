(function($){
	var $featured = $('#featured'),
		$controllers = $('#controllers-wrapper'),
		$et_mobile_nav_button = $('#mobile_nav'),
		$et_nav = $('ul.nav'),
		et_container_width = $('.container').width(),
		et_featured_slider_auto, et_featured_auto_speed, $cloned_nav;
	
	$(document).ready(function(){
		var et_slider_settings;
		
		$("#left-area").fitVids();
	
		if ( $featured.length ){
			$('div.slide .description').css({'visibility':'hidden','opacity':'0','display':'block'});
			
			et_slider_settings = {
				slideshow: false,
				before: function(slider){
					$controllers.find('a.switch').removeClass('active').eq( slider.animatingTo ).addClass('active');
				}
			}

			if ( $featured.hasClass('et_slider_auto') ) {
				var et_slider_autospeed_class_value = /et_slider_speed_(\d+)/g;
				
				et_slider_settings.slideshow = true;
				
				et_slider_autospeed = et_slider_autospeed_class_value.exec( $featured.attr('class') );
				
				et_slider_settings.slideshowSpeed = et_slider_autospeed[1];
			}
			
			et_slider_settings.pauseOnHover = true;
			
			$featured.flexslider( et_slider_settings );
			
			$('#featured .slide').hover(function(){
				var desc_top = et_container_width != 960 ? 12 : 43;
				
				$('li.slide:visible .description').css({'visibility':'visible','top':( desc_top-10 )}).stop().animate({opacity: 1, top: desc_top},500);
			},function(){
				var desc_top = et_container_width != 960 ? 12 : 43;
				$('li.slide:visible .description').stop().animate({opacity: 0, top: ( desc_top-10 ) },500,function(){
					$(this).css('visibility','hidden');
				});
			});
		}
		
		$et_nav.clone().attr('id','mobile_menu').removeClass().appendTo( $et_mobile_nav_button );
		$cloned_nav = $et_mobile_nav_button.find('> ul');
		
		$et_mobile_nav_button.click( function(){
			if ( $(this).hasClass('closed') ){
				$(this).removeClass( 'closed' ).addClass( 'opened' );
				$cloned_nav.slideDown( 500 );
			} else {
				$(this).removeClass( 'opened' ).addClass( 'closed' );
				$cloned_nav.slideUp( 500 );
			}
			return false;
		} );
		
		$et_mobile_nav_button.find('a').click( function(event){
			event.stopPropagation();
		} );
		
		$(window).resize( function(){
			if ( et_container_width != $('.container').width() ) { 
				et_container_width = $('.container').width();
				
				$('.et_shortcode_slide_active').each( function(){
					var $this_shortcode_slide = $(this);
					
					$this_shortcode_slide.parent().css( 'height', $this_shortcode_slide.innerHeight() );
				} );
			}
		});
	});
	
	$(window).load(function(){
		var $flexnav = $('#featured .flex-direction-nav'),
			$flexcontrol = $('#featured .flex-control-nav');

		$controllers.css( 'marginLeft', '-' + ( $controllers.innerWidth() / 2 ) + 'px' ).show();
		
		$controllers.find('#left-arrow').click( function(){
			$flexnav.find('a.prev').click();
			return false;
		} );
		
		$controllers.find('#right-arrow').click( function(){
			$flexnav.find('a.next').click();
			return false;
		} );
		
		$controllers.find('a.switch').click( function(){
			var order = $(this).attr('rel') - 1;
			
			$flexcontrol.find('li:eq(' + order + ') a').click();
			return false;
		} );
	});
})(jQuery)