function insertShortcode() {
	
	var shortcodeText;
	var shortcodeId = document.getElementById('column_shortcode').value;
	
	
	if (shortcodeId != 0 && shortcodeId == 'one_half' ){
		shortcodeText = "<br />[" + shortcodeId +"]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'one_half_last' ){
		shortcodeText = "<br />[" + shortcodeId +"]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'one_third' ){
		shortcodeText = "<br />[" + shortcodeId + "]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'one_third_last' ){
		shortcodeText = "<br />[" + shortcodeId + "]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
	
	if (shortcodeId != 0 && shortcodeId == 'two_third' ){
		shortcodeText = "<br />[" + shortcodeId + "]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'two_third_last' ){
		shortcodeText = "<br />[" + shortcodeId + "]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'one_fourth' ){
		shortcodeText = "<br />[" + shortcodeId + "]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'one_fourth_last' ){
		shortcodeText = "<br />[" + shortcodeId + "]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'three_fourth' ){
		shortcodeText = "<br />[" + shortcodeId + "]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'three_fourth_last' ){
		shortcodeText = "<br />[" + shortcodeId + "]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	
		
	if (shortcodeId != 0 && shortcodeId == 'one_fifth' ){
		shortcodeText = "<br />[" + shortcodeId + "]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'one_fifth_last' ){
		shortcodeText = "<br />[" + shortcodeId +"]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'two_fifth' ){
		shortcodeText = "<br />[" + shortcodeId + "]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'two_fifth_last' ){
		shortcodeText = "<br />[" + shortcodeId +"]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'three_fifth' ){
		shortcodeText = "<br />[" + shortcodeId + "]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'three_fifth_last' ){
		shortcodeText = "<br />[" + shortcodeId +"]<br />Content...<br />[/" + shortcodeId +"]<br />";	
		}
	
		
	if (shortcodeId != 0 && shortcodeId == 'two_column_grid' ){
		shortcodeText = "[one_half]<br />Content...<br />[/one_half]<br /><br />[one_half_last]<br />Content...<br />[/one_half_last]";	
		}
	
	if (shortcodeId != 0 && shortcodeId == 'three_column_grid' ){
		shortcodeText = "[one_third]<br />Content...<br />[/one_third]<br /><br />[one_third]<br />Content...<br />[/one_third]<br /><br />[one_third_last]<br />Content...<br />[/one_third_last]";	
		}
		
	if (shortcodeId != 0 && shortcodeId == 'four_column_grid' ){
		shortcodeText = "[one_fourth]<br />Content...<br />[/one_fourth]<br /><br />[one_fourth]<br />Content...<br />[/one_fourth]<br /><br />[one_fourth]<br />Content...<br />[/one_fourth]<br /><br />[one_fourth_last]<br />Content...<br />[/one_fourth_last]";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'five_column_grid' ){
		shortcodeText = "[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[one_fifth_last]<br />Content...<br />[/one_fifth_last]";	
		}
		
		
		
		// Mixed grid layouts
		
		// 3 column grid
		
		if (shortcodeId != 0 && shortcodeId == 'onethird_twothird' ){
		shortcodeText = "<br />[one_third]<br />Content...<br />[/one_third]<br /><br />[two_third_last]<br />Content...<br />[/two_third_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'twothird_onethird' ){
		shortcodeText = "<br />[two_third]<br />Content...<br />[/two_third]<br /><br />[one_third_last]<br />Content...<br />[/one_third_last]<br />";	
		}
		
		// 4 column grid
		if (shortcodeId != 0 && shortcodeId == 'onefourth_onefourth_half' ){
		shortcodeText = "<br />[one_fourth]<br />Content...<br />[/one_fourth]<br /><br />[one_fourth]<br />Content...<br />[/one_fourth]<br /><br />[one_half_last]<br />Content...<br />[/half_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'onefourth_half_onefourth' ){
		shortcodeText = "<br />[one_fourth]<br />Content...<br />[/one_fourth]<br /><br />[one_half]<br />Content...<br />[/one_half]<br /><br />[one_fourth_last]<br />Content...<br />[/one_fourth_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'half_onefourth_onefourth' ){
			shortcodeText = "<br />[one_half]<br />Content...<br />[/half]<br /><br />[one_fourth]<br />Content...<br />[/one_fourth]<br /><br />[one_fourth_last]<br />Content...<br />[/one_fourth_last]<br />";	
		}
		
		
		if (shortcodeId != 0 && shortcodeId == 'threefourth_onefourth' ){
			shortcodeText = "<br />[three_fourth]<br />Content...<br />[/three_fourth]<br /><br />[one_fourth_last]<br />Content...<br />[/one_fourth_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'onefourth_threefourth' ){
			shortcodeText = "<br />[one_fourth]<br />Content...<br />[/one_fourth]<br /><br />[three_fourth_last]<br />Content...<br />[/three_fourth_last]<br />";	
		}
		
		// 5 columns grids
		
		if (shortcodeId != 0 && shortcodeId == 'twofifth_threefifth' ){
			shortcodeText = "<br />[two_fifth]<br />Content...<br />[/two_fifth]<br /><br />[three_fifth_last]<br />Content...<br />[/three_fifth_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'threefifth_twofifth' ){
			shortcodeText = "<br />[three_fifth]<br />Content...<br />[/three_fifth]<br /><br />[two_fifth_last]<br />Content...<br />[/two_fifth_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'onefifth_onefifth_onefifth_twofifth' ){
			shortcodeText = "<br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[two_fifth_last]<br />Content...<br />[/two_fifth_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'onefifth_onefifth_twofifth_onefifth' ){
			shortcodeText = "<br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[two_fifth]<br />Content...<br />[/two_fifth]<br /><br />[one_fifth_last]<br />Content...<br />[/one_fifth_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'onefifth_twofifth_onefifth_onefifth' ){
			shortcodeText = "<br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[two_fifth]<br />Content...<br />[/two_fifth]<br /><br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[one_fifth_last]<br />Content...<br />[/one_fifth_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'twofifth_onefifth_onefifth_onefifth' ){
			shortcodeText = "<br />[two_fifth]<br />Content...<br />[/two_fifth]<br /><br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[one_fifth_last]<br />Content...<br />[/one_fifth_last]<br />";	
		}
		
		
		
		if (shortcodeId != 0 && shortcodeId == 'onefifth_twofifth_twofifth' ){
			shortcodeText = "<br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[two_fifth]<br />Content...<br />[/two_fifth]<br /><br />[two_fifth_last]<br />Content...<br />[/two_fifth_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'twofifth_onefifth_twofifth' ){
			shortcodeText = "<br />[two_fifth]<br />Content...<br />[/two_fifth]<br /><br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[two_fifth_last]<br />Content...<br />[/two_fifth_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'twofifth_twofifth_onefifth' ){
			shortcodeText = "<br />[two_fifth]<br />Content...<br />[/two_fifth]<br /><br />[two_fifth]<br />Content...<br />[/two_fifth]<br /><br />[one_fifth_last]<br />Content...<br />[/one_fifth_last]<br />";	
		}
		
		
		if (shortcodeId != 0 && shortcodeId == 'onefifth_onefifth_threefifth' ){
			shortcodeText = "<br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[three_fifth_last]<br />Content...<br />[/three_fifth_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'onefifth_threefifth_onefifth' ){
			shortcodeText = "<br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[three_fifth]<br />Content...<br />[/three_fifth]<br /><br />[one_fifth_last]<br />Content...<br />[/one_fifth_last]<br />";	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'threefifth_onefifth_onefifth' ){
			shortcodeText = "<br />[three_fifth]<br />Content...<br />[/three_fifth]<br /><br />[one_fifth]<br />Content...<br />[/one_fifth]<br /><br />[one_fifth_last]<br />Content...<br />[/one_fifth_last]<br />";	
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
