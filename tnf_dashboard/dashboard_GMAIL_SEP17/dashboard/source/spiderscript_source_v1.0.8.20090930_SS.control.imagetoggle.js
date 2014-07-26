/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.imagetoggle.js		
	v1.0.8.20090930									
	Copyright (C) 2008 - 2009 Allen Evans						
	http://www.spiderscript.net/							
********************************************************************************/ 	

/********************************************************************************
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
********************************************************************************/



/*
*   File Name:      SS.control.imagetoggle.js
*   Description:    Control that toggles between two or more images when clicked on
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.geom.js
*   SS.control.js
*/
  

/**
*   @class          Image Toggle. Control which toggles between two or more images when clicked on
*   @constructor    
*/
SS.control.imagetoggle =    function()
                            {
                                //t:    this
                                //p:    classname prefix
                                
                                /**
                                *   @property {String}  id 
                                *   @description        Identifier of the dropzone control.
                                */
                                this.id        =   "";
                                
                                /**
                                *   @property {String}  linkto 
                                *   @description        Field to link the value to
                                */
                                this.linkto    =   ""; 
                                
                                /**
                                *   @property {String}  value 
                                *   @description        Selected value
                                */
                                this.value     =   "";   
                                  
                                /**
                                *   @property {String}  van 
                                *   @description        Value attribute name
                                */
                                this.van       =   "id";
                                
                                /** 
                                *   @property {Function}    onchange
                                *   @description            Function called or evaluated {String} whenever the image is changed.
                                */
                                this.onchange	=	"";
                                    
                                /** 
                                *   @property {Boolean}   visible
                                *   @description          Flag to indicate whether or not the imagetoggle is currently visible. Overrides style="display:none;" rule on initial render.
                                *                         Default = true.
                                */
                                this.visible   =   1;
                            };

SS.control.imagetoggle.prototype = {

	    /**
	    *   @function       SS.control.imagetoggle.render
	    *   @description    Renders the imagetoggle on the page.
	    *   @returns        null
	    */
        render: function()
                {
                    //t:    this
                    //l:    element
                    //c:    children
                    //i:    index pointer
                    //o:    image option
                    //oc:	onclick function
                    var t = this, l = $g(t.id), c, i, o, oc;
                    
                    //set visibility - deliberately overridden below - allows for display:none in style
                    $v(l,t.visible);
                    
                    //look through children nodes for images. display the images which have been selected
		            c = l.childNodes;
		            if(c)
		            {
		                /**
		                *   @ignore
		                */
						oc = function(e)
							 {
								t.nextImage.call(t);
								$ef(t.onchange,t,e);
							 };
						for(i = 0; i < $ln(c); i++)
		                {
		                    o = c[i];
		                    if(o.nodeName != "#text")
		                    {
								try
								{
									o.onclick = oc;
								}
								catch(x){}
							}
		                    
		                }
		                t.nextImage(0,1);
		            }
                },
    /**
    *   @function               SS.control.imagetoggle.nextImage
    *   @description            Selects and returns the next image in the sequence
    *   @param {Boolean} f      Select first flag
    *	@param {Boolean} q      Query only, do not change to next image
    *	@param {String} v       Set image
    *   @returns {HTMLElement}  Selected image.
    */
    nextImage:	function(f,q,v)
				{
					//t:    this
                    //l:    element
                    //c:    children
                    //i:    index pointer
                    //o:    image option
                    //s:	selected image option
                    //r:	return
                    //a:	attribute
					var t = this, l = $g(t.id), c, i, o, p, s, r, a;
                    //look through children nodes for images.
		            c = l.childNodes;
		            if(c)
		            {
						for(i = 0; i < $ln(c); i++)
		                {
		                    o = c[i];
		                    p = o;
		                    if($uc(o.tagName) != "IMG")
		                    {
								o = $gd(o,"IMG");
								if(o)
								{
									o = o[0]; //first descendant image element
								}
		                    }
		                    if(o && ($uc(o.tagName) == "IMG"))
		                    {
								a = $ga(o,"selected");
								a = (a !== null && ($psb(a) || a === "")) ? 1 : 0;
								
								if(v)
								{
					
									if(o == v || $ga(o,t.van) == v)
									{
										a = 1;
									}
									else
									{
										a = 0;
									}
								}
								
								$v(p,a);
								if(q)
								{
									if(a)
									{
										r = o;
									}
								}
								else if($isd(v))
								{
									$sa(o,"selected",a);
								}
								else
								{
									if((s && !r) || f)
									{
										f = 0;
										r = o;
										$sa(o,"selected",1);
										$v(p,1);
									}
									else
									{
										$sa(o,"selected",0);
										$v(p,0);
									}
									
									if(a)
									{
										s = o;
									}
								}
		                    }
		                }
		            }
		            if(!v)
		            {
						
						t.value = $ga(r,t.van);
						if(t.linkto)
						{
							k = $g(t.linkto);
							if(k)
							{
							    /**
							    *   @ignore
							    */
								k.onchange =	function(e)
												{
													t.selected(this.value,e);
												};
								k.value = t.value;
							}
						}
						if(!r)
						{
							r = t.nextImage(1,q);
						} 
		            }
		            
		            return r;
				},
                /**
                *   @function               SS.control.imagetoggle.selected
                *   @description            Selects and returns the next image in the sequence
                *   @param {Boolean} v      Set selected image. (Optional)
                *	@param {Event} e        Event that raises the selected function. (Optional)
                *   @returns {HTMLElement}  Selected image.
                */
    selected:   function(v,e)
                {
                    //returns the selected image
                    var t = this, o = t.nextImage(0,$isd(v) ? 0 : 1,v);
                    if(v)
                    {
						$ef(t.onchange,t,e);
					}
					return o;
                }
};
