function insertVideoShortcode() {
	
	var shortcodeText;
	var videoType = document.getElementById('video_type').value;
	var videoId = document.getElementById('video_id').value;
	var videoSize = document.getElementById('video_size').value;
	var videoWidth = document.getElementById('video_width').value;
	var videoHeight = document.getElementById('video_height').value;
	

	shortcodeText = '[video type="' + videoType + '" id="' + videoId + '" size="' + videoSize + '" width="' + videoWidth + '" height="' + videoHeight + '"]';
		
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
