/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.geom.js				
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
*   File Name:      SS.geom.js
*   Description:    Page Geometry
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.locale.js
*/

/**
*   @namespace Geom. Holds functionality for positioning and sizing elements
*/
SS.geom = 
{
	
                /**
                *   @function $h
                *   @description Get / set height of an element
                *   @param l element
                *   @param h set height. Optional. Leave blank to only return the height without changing it.
                */
	height :	function(l,h)
				{
					if(l)
					{
						if($isd(h))
						{
							//set the element to this new height							
							if(isNaN(h))
							{
							    if(l.style.height != h)
							    {
								    l.style.height = h;
								    $ef(l.onresize,l);
								}
							}
							else if(l.style.height != h + 'px')
							{
								l.style.height = h + 'px';
								$ef(l.onresize,l);
							}
							
						}
						//return the height of the element
						return l.offsetHeight;
					}
					else
					{
						return -1;
					}
				},
                /**
                *   @function SS.geom.width
                *   @description Get / set width of an element.
                *   @param l element
                *   @param w set width. Optional. Leave blank to only return the width without changing it.
                */
	width :		function(l,w)
				{
					if(l)
					{
						if($isd(w))
						{
							//set the element to this new width							
							if(isNaN(w))
							{
							    if(l.style.width != w)
							    {
								    l.style.width = w;
								    $ef(l.onresize,l);
								}
							}
							else if(l.style.width != w + 'px')
							{
								l.style.width = w + 'px';
								$ef(l.onresize,l);
							}
						}
						//return the width of the element
						return l.offsetWidth;
					}
					else
					{
						return -1;
					}
				},
	            /**
                *   @function SS.geom.getXYZ
                *   @description            Element Position. Gets the absolute position of an element within the document including size dimensions.
                *   @param {HTMLElement} l  Element
                *   @returns {SS.coord}     Co-ordinates of the element (l).
                */
	getXYZ	:	function(l)
				{	
					var p = new SS.coord(0,0);
					
					if(l)
					{
					    var o = l, x = 0, y = 0;
	                    try
						{
	                        if(o && o.offsetParent)
	                        {
		                        while(o)
		                        {
			                        x += o.offsetLeft;
			                        y += o.offsetTop;
			                        o = o.offsetParent;
		                        }
	                        }
	                    }
	                    catch(z){}
					
						p.x = x;
						p.y = y;
						p.z = (l.style && l.style.zIndex) ? l.style.zIndex : null;
						p.w = l.offsetWidth;
						p.h = l.offsetHeight;
					}
					
					return p;
				},
                /**
                *   @function SS.geom.left
                *   @description    Get / Set the x-axis position of an element. In other words, how far left is it.
                *   @param l element
                *   @param p set position. Optional. Leave blank to only return the left / x-axis position without changing it.
                */
	left    :   function(l,p)
	            {
	                if(l)
					{	
						var o = l, x = null;
						
					    if($isd(p))
					    {
					        //set left position
						    var pX = (p.match && p.match("%")) ? null : p;
						    if((pX || $isn(p)) && pX != "null")
						    {
							    l.style.left = pX + 'px';
						    }
						    else
						    {
							    l.style.left = p;
						    }
						}
						else
						{
						    try
						    {
						        x = 0;
	                            if(o && o.offsetParent)
	                            {
		                            while(o)
		                            {
			                            x += o.offsetLeft;
			                            o = o.offsetParent;
		                            }
	                            }
	                        }
	                        catch(z){}
	                    }
	                    
	                    return x;
						
					}
	            },
                /**
                *   @function SS.geom.top
                *   @description        Get / set the y-axis position of an element. In other words, how far from the top is it.
                *   @param l element
                *   @param p set position. Optional. Leave blank to only return the top / y-axis position without changing it.
                */
	top     :   function(l,p)
	            {
	                if(l)
					{	
						var o = l, y = null;
						
					    if($isd(p))
					    {
						    var pY = (p.match && p.match("%")) ? null : p;
						    if((pY || $isn(p)) && pY != "null")
						    {
							    l.style.top = pY + 'px';
						    }
						    else
						    {
							    l.style.top = p;
						    }
						}
						else
						{
	                        try
						    {
	                            if(o && o.offsetParent)
	                            {
	                                y = 0;
		                            while(o)
		                            {
			                            y += o.offsetTop;
			                            o = o.offsetParent;
		                            }
	                            }
	                        }
	                        catch(z){}
        	            }
        	            
	                    return y;
					}
	            
	            },
	            /**
	            *   @function       SS.geom.zIndex
	            *   @description    Get / set the z-index property of the element. The z-index is used
	            *                   to determin the ordering of overlapping elements where the lower the number
	            *                   the further behind (deeper) the element is compare to those that overlap.
	            *   @param {HTMLElement} l  Element to get / set the z-Index style property of
	            *   @param {Integer}     z  z-Index value. z-Index range may be browser specific, some well known AJAX applications
	            *                           use ranges of -900000 to 900000.
	            *   @returns {Integer}  z-Index of the element, else 0.
	            */
	zIndex  :   function(l,z)
	            {
	                var r = 0;
	                if(l && l.style)
	                {
	                    if($isd(z))
	                    {
	                        l.style.zIndex = z;
	                    }
	                    
	                    r = l.style.zIndex;
	                }
	                return r;
	            },
                /**
                *   @function SS.geom.setPosition
                *   @description            Sets Element Position. Sets the x, y , z position of an element.
                *   @param {HTMLElement} l  Element
                *   @param {SS.coord}    p  Position. Co-ordinates to set for the element (l).
                *                           Alternatively use {x: value, y: value, z: value} syntax.
                *                           See {@link $t} and {@link $l} for setting only one axis.
                *   @returns null
                */
	setPosition:function(l,p)
				{
					if(l)
					{
					    //mX:   position X
					    //mY:   position Y
					    //s:    l.style
						var mX = $ts(p.x), mY = $ts(p.y), s = l.style, pX = mX.match("%") ? null : mX, pY = mY.match("%") ? null : mY;
						
						if(pX === null || pX == "null")
						{}
						else if(pX || $isn(p.x))
						{
							s.left = pX + 'px';
						}
						else
						{
							s.left = p.x;
						}
						
						if(pY === null || pY == "null")
						{}
						else if(pY || $isn(p.y))
						{
						    s.top = pY + 'px';
						}
						else
						{
							s.top = p.y;
						}
						
						if(p.z === null)
						{}
						else if($isd(p.z) && $isn(p.z))
						{
							s.zIndex = p.z;
						}		
					}

				},
				/**
				*   @function               SS.geom.opacity
				*   @description            Opacity. Get / set the opacity of an element.
				*   @param {HTMLElement} l  Element.
				*   @param {Integer} v      Opacity percentage between 0 and 100 where 0 is invisible and 100 is opaque.
				*   @returns    {Integer}   Opacity of the element.
				*/
		opacity:function(l, v)
				{
					//op:   opacity value
					//s:    l.style
					var op, s = l.style;
					
					if($isd(v))
					{
						v = ($isn(v) && v >= 0 && v <= 100) ? v : 100;	//check v is valid
					}
					
					if($isd(s.opacity))
					{
						if($isd(v))
						{	
							s.opacity = (v/100);
							op = v;
						}
					}
					else if($isd(s.filter))
					{
						if($isd(v))
						{
							s.filter = "alpha(opacity=" + (v) + ")";
						}
						if(s && s.filters && l.filters.alpha && $isd(l.filters.alpha.opacity))
						{
							op = l.filters.alpha.opacity;						
						}
						else
						{
							op = 100;
						}
					}
					else if($isd(s.MozOpacity))
					{
						if($isd(v))
						{
							s.MozOpacity = (v/100);
						}
						op = s.MozOpacity * 100;
					}
					else if($isd(s.KhtmlOpacity))
					{
						if($isd(v))
						{
							s.KhtmlOpacity = v;
						}
						op = s.KhtmlOpacity;
					}
					
					return op;				
				},
                /**
                *   @function               SS.geom.display
                *   @description            Set Element Visibility. Show / hide an element using the display (default) or visibility style sheet rules.
                *                           
                *   @param {HTMLElement} l  Element or {String} Element Id
                *   @param {Boolean}     v  Visibile flag. True for visible, false for hidden (display:none)
                *   @param {Boolean}     s  Static. Static display, uses the visibility style instead of the display style attribute.
                *                           This means that the space the element occupies remains filled when hidden.
                *   @returns null
                */
        display:function(l,v,s)
                {
                    if($iss(l))
                    {   //assume that the string passed is an id. convert string into element.
                        l = $g(l); 
                    }
                    if(l && l.style)
                    {
                        if(s)
                        {
                            l.style.visibility = (v) ? "visible" : "hidden";
                        }
                        else
                        {
                            s = (v) ? "" : "none";
                            if(l.style.display != s)
                            {
                                l.style.display = s;
                            }
                        }
                    }
                }				
};

//abreviated functions
/**
*   @function $h
*   @description Get / set height of an element. Pseudonym for {@link SS.geom.height}
*   @param l element
*   @param h set height. Optional. Leave blank to only return the height without changing it.
*/
$h = SS.geom.height;

/**
*   @function $w
*   @description Get / set width of an element. Pseudonym for {@link SS.geom.width}
*   @param l element
*   @param w set width. Optional. Leave blank to only return the width without changing it.
*/
$w = SS.geom.width;


/**
*   @function $l
*   @description    Get / Set the x-axis position of an element. In other words, how far left is it.
*                   Pseudonym for {@link SS.geom.left}
*   @param l element
*   @param p set position. Optional. Leave blank to only return the left / x-axis position without changing it.
*/
$l = SS.geom.left;


/**
*   @function               $op
*   @description            Opacity. Get / set the opacity of an element. Pseudonym for {@link SS.geom.opacity}.
*   @param {HTMLElement} l  Element.
*   @param {Integer} v      Opacity percentage between 0 and 100 where 0 is invisible and 100 is opaque.
*   @returns    {Integer}   Opacity of the element.
*/
$op = SS.geom.opacity;

/**
*   @function $t
*   @description        Get / set the y-axis position of an element. In other words, how far from the top is it.
*                       Pseudonym for {@link SS.geom.top}
*   @param l element
*   @param p set position. Optional. Leave blank to only return the top / y-axis position without changing it.
*/
$t = SS.geom.top;

/**
*   @function $xyz
*   @description            Element Position. Gets the absolute position of an element within the document including size dimensions.
*                           Pseudonym for {@link SS.geom.getXYZ}.
*   @param {HTMLElement} l  Element
*   @returns {SS.coord}     Co-ordinates of the element (l).
*/
$xyz = SS.geom.getXYZ;

/**
*   @function $sxyz
*   @description            Sets Element Position. Sets the x, y , z position of an element.
*                           Pseudonym for {@link SS.geom.setPosition}.
*   @param {HTMLElement} l  Element
*   @param {SS.coord}    p  Position. Co-ordinates to set for the element (l).
*                           Alternatively use {x: value, y: value, z: value} syntax.
*                           See {@link $t} and {@link $l} for setting only one axis.
*   @returns null
*/
$sxyz = SS.geom.setPosition;

/**
*   @function $v
*   @description            Set Element Visibility. Show / hide an element using the display (default) or visibility style sheet rules.
*                           Pseudonym for {@link SS.geom.display}.
*   @param {HTMLElement} l  Element or {String} Element Id
*   @param {Boolean}     v  Visible flag. True for visible, false for hidden (display:none)
*   @param {Boolean}     s  Static. Static display, uses the visibility style instead of the display style attribute.
*                           This means that the space the element occupies remains filled when hidden.
*   @returns null
*/
$v = SS.geom.display;

/**
*   @function $x
*   @description    Get / Set the x-axis position of an element. In other words, how far left is it.
*                   Pseudonym for {@link SS.geom.left}
*   @param l element
*   @param p set position. Optional. Leave blank to only return the left / x-axis position without changing it.
*/
$x = $l;


/**
*   @function $y
*   @description        Get / set the y-axis position of an element. In other words, how far from the top is it.
*                       Pseudonym for {@link SS.geom.top}
*   @param l element
*   @param p set position. Optional. Leave blank to only return the top / y-axis position without changing it.
*/
$y = $t;

/**
*   @function       $z
*   @description    Get / set z-Index. Pseudonym for {@link SS.geom.zIndex}.
*/
$z = SS.geom.zIndex;

/**
*   @function $dbsl     Document Body Scroll Left
*   @description        Document body scroll left
*   @returns {Integer}  Position of the horizontal scroll bar
*/
function $dbsl()
{
    //b:    document body
    //l:    scroll left
    var b = document.body, l = null;
    if(b)
    {
        l = b.scrollLeft;
    }
    return l;
}

/**
*   @function $dbst     Document Body Scroll Top
*   @description        Document body scroll top
*   @returns {Integer}  Position of the vertical scroll bar
*/
function $dbst()
{
    //b:    document body
    //t:    scroll top
    var b = document.body, t = null;
    if(b)
    {
        t = b.scrollTop || b.parentNode.scrollTop;   
    }
    return t;
}


/**
*   @function $dbd      Document Body Dimensions
*   @description        Returns the dimensions for the document. These dimensions refer to the
*                       content window and do not include the browser window including any toolbars.
*   @returns {Object}   {w = Width, h = Height}
*/
function $dbd()
{
    //x:    x dimension
    //y:    y dimension
    //w:    window
    //b:    document.body
    var x = 0, y = 0, w = window, b = document.body, d = document.documentElement;
    if(w && w.innerWidth)
    {
        x = w.innerWidth;
        y = w.innerHeight;
    }
	else if(d && d.clientWidth)
	{
        x = d.clientWidth;
        y = d.clientHeight;
	}
    else if(b && b.clientWidth)
    {
        x = b.clientWidth;
        y = b.clientHeight;  
    }

    return {w:x,h:y};
}

/*
Depreciated.
var _mzi = 0;
//set the maximum known z-index
function $mzis(z)
{
    if($isn(_mzi))
    {
        _mzi = (z > _mzi) ? z : _mzi;
    }
    return _mzi;
}
function  $mzig()
{
    return $n(_mzi);
}
*/


/**
*   @class          Co-ordinates. Holds co-ordinate information about an element
*   @constructor
*   @param          x x-axis position
*   @param          y y-axis position
*   @param          z z-index position
*   @param          w width
*   @param          h height
*/
SS.coord =  function(x,y,z,w,h)
            {
                /**
                    @property x 
                    @description x-axis
                */
	            this.x = $isd(x) ? x : 0;
	            
                /**
                    @property y 
                    @description y-axis
                */
	            this.y = $isd(y) ? y : 0;
	            
                /**
                    @property z 
                    @description z-Index
                */
	            this.z = $isd(z) ? z : 0;
	            
                /**
                    @property w
                    @description width
                */
	            this.w = $isd(w) ? w : 0;
	            
                /**
                    @property h
                    @description height
                */
	            this.h = $isd(h) ? h : 0;
            };

