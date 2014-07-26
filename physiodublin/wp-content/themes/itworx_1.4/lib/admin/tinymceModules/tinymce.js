function insertShortcode() {
	
	var shortcodeText;
	var shortcodeId = document.getElementById('module_shortcode').value;
	
	
	if (shortcodeId != 0 && shortcodeId == 'newslist' ){
		shortcodeText = '<br />[newslist per_page="8"]<br />';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'newsarchive' ){
		shortcodeText = '<br />[newsarchive per_page="20"]<br />';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'testimonials' ){
		shortcodeText = '<br />[testimonials per_page="4"]<br />';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'events' ){
		shortcodeText = '<br />[events]<br />';	
		}
	
	if (shortcodeId != 0 && shortcodeId == 'faq' ){
		shortcodeText = '<br />[faq]<br />';	
		}
	
	
		
	if (shortcodeId != 0 && shortcodeId == 'break' ){
		shortcodeText = '[break]';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'line' ){
		shortcodeText = '[line]';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'author' ){
		shortcodeText = '[authorbox]';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'relatedposts' ){
		shortcodeText = '[relatedposts max_posts="2"]';	
		}
	
	if (shortcodeId != 0 && shortcodeId == 'button' ){
		shortcodeText = '[button url="#"]Read more[/button]';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'button_light' ){
		shortcodeText = '[button_light url="#"]Read more[/button_light]';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'button_dark' ){
		shortcodeText = '[button size="large" url="#"]Read more[/button_dark]';	
		}
		
	// Medium buttons
		
	if (shortcodeId != 0 && shortcodeId == 'button_medium' ){
		shortcodeText = '[button size="medium" url="#"]Read more[/button]';	
		}
	
	if (shortcodeId != 0 && shortcodeId == 'button_medium_dark' ){
		shortcodeText = '[button_dark size="medium" url="#"]Read more[/button_dark]';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'button_medium_light' ){
		shortcodeText = '[button_light size="medium" url="#"]Read more[/button_light]';	
		}
	
	
	
	if (shortcodeId != 0 && shortcodeId == 'button_large' ){
		shortcodeText = '[button size="large" url="#"]Read more[/button]';	
		}
	
	if (shortcodeId != 0 && shortcodeId == 'button_large_dark' ){
		shortcodeText = '[button_dark size="large" url="#"]Read more[/button_dark]';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'button_large_light' ){
		shortcodeText = '[button_light size="large" url="#"]Read more[/button_light]';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'quote' ){
		shortcodeText = '<br/>[quote]<br/>..insert text here..<br>[/quote]<br/>';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'push' ){
		shortcodeText = '<br/>[push]<br/>..insert text here..<br>[/push]<br/>';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'pull' ){
		shortcodeText = '<br/>[pull]<br/>..insert text here..<br>[/pull]<br/>';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'boxheader' ){
		shortcodeText = '<br/>[boxedtitle]<br/>..insert text here..<br>[/boxedtitle]<br/>';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'toggle_single' ){
		shortcodeText = '<br/>[toggle title="Button text" style="single"]<br/>Toggle content<br>[/toggle]<br/>';	
		}
	
	if (shortcodeId != 0 && shortcodeId == 'toggle_list' ){
		shortcodeText = '<br/>[toggle title="Button text"]<br/>Toggle content<br>[/toggle]<br/>';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'tabs_default' ){
		shortcodeText = '[tabpanel tab1="First tab" tab2="Second tab" tab3="Third tab"]<br/><br/>[tab id="1"]<h2>Tab 1 title</h2><p>Tab 1 content </p>[/tab]<br/>[tab id="2"]<h2>Tab 2 title</h2><p>Tab 2 content </p>[/tab]<br/>[tab id="3"]<h2>Tab 3 title</h2><p>Tab 3 content </p>[/tab]';	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'tabs_minimal' ){
		shortcodeText = '[tabpanel_minimal tab1="First tab" tab2="Second tab" tab3="Third tab"]<br/><br/>[tab id="1"]<h2>Tab 1 title</h2><p>Tab 1 content </p>[/tab]<br/>[tab id="2"]<h2>Tab 2 title</h2><p>Tab 2 content </p>[/tab]<br/>[tab id="3"]<h2>Tab 3 title</h2><p>Tab 3 content </p>[/tab]';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'tabs_simple' ){
		shortcodeText = '[tabpanel_simple tab1="First tab" tab2="Second tab" tab3="Third tab"]<br/><br/>[tab id="1"]<br/><br/><h2>Tab 1 title</h2><p>Tab 1 content </p><br/><br/>[/tab]<br/>[tab id="2"]<br/><br/><h2>Tab 2 title</h2><p>Tab 2 content </p><br/><br/>[/tab]<br/>[tab id="3"]<br/><br/><h2>Tab 3 title</h2><p>Tab 3 content </p><br/><br/>[/tab]';	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'lightbox' ){
		shortcodeText = '<br/>[lightbox href="" title=""]<br/><br/> Add text or image here <br/><br/>[/lightbox]<br/>';	
		}
		
	if ( shortcodeId == 0 ){
			tinyMCEPopup.close();
		}	
	
	if(window.tinyMCE) {
		//TODO: For QTranslate we should use here 'qtrans_textarea_content' instead 'content'
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, shortcodeText);
		//Peforms a clean up of the current editor HTML. 
		//tinyMCEPopup.editor.execCommand('mceCleanup');
		//Repaints the editor. Sometimes the browser has graphic glitches. 
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}
