function insertPortfolioShortcode() {
	
	var shortcodeText;
	var columnsId = document.getElementById('portfolio_columns').value;
	var categoryId = document.getElementById('portfolio_category').value;
	var perpageId = document.getElementById('perpage').value;
	
	if(columnsId == 0){ columnsId = 3;}
	if(perpageId == 0){ perpageId = 6;}
	if(categoryId != 0){ 
	shortcodeText = '[portfolio category="' + categoryId + '"  columns="' + columnsId + '" per_page="' + perpageId + '"]';
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
