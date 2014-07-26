function insertSlideshowShortcode() {
	
	var shortcodeText;
	var typeId = document.getElementById('slideshow_type').value;
	var categoryId = document.getElementById('slideshow_category').value;
	var slideSize = document.getElementById('slideshow_size').value;

	

	shortcodeText = '[slideshow type="' + typeId + '" category="' + categoryId + '" size="' + slideSize +'"]';
		
	
		
	
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
