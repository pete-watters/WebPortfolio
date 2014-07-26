function insertGalleryShortcode() {
	
	var shortcodeText;
	var columnsId = document.getElementById('gallery_columns').value;
	var perpageId = document.getElementById('perpage').value;
	var pageId = document.getElementById('gallery_page').value;
	
	if(columnsId == 0){ columnsId = 3;}
	if(perpageId == 0){ perpageId = 6;}
	if(pageId == 0){ pageId = '';}
	
	
	if (columnsId == 'slider'){
		shortcodeText = '[gallslider id="' + pageId + '"]';
	}
	
	else{
			shortcodeText = '[gall columns="' + columnsId + '" per_page="' + perpageId + '" id="' + pageId + '"]';
	}
	//shortcodeText = "Portfolio inserted"
		
	
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
