/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.moveable.js				
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
*   File Name:      SS.control.moveable.js
*   Description:    Makes page elements moveable
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.locale.js
*   SS.geom.js
*   SS.control.js
*   SS.addon.js
*/

/**
*   @class          Moveable. Makes elements moveable within a page.
*   @constructor
*/
SS.control.moveable =   function()
                        {
                            /**
                            *   @property {String}      id 
                            *   @description            Identifier of the moveable control.
                            */
                            this.id             =   "";
                            
                            /** 
                            *   @property {Function}    onmousedown
                            *   @description            Function called or evaluated {String} whenever the mouse button is pressed.
                            */
                            this.onmousedown    =   "";
                            
                            /** 
                            *   @property {Function}    onmouseup
                            *   @description            Function called or evaluated {String} whenever the mouse button is released.
                            */
                            this.onmouseup      =   "";
                            
                            /** 
                            *   @property {Function}    onmousemove
                            *   @description            Function called or evaluated {String} whenever the object is moving.
                            */
                            this.onmousemove    =   "";        //fires when the object is moving
                            
                            /**
                            *   @property {Boolean}     moving 
                            *   @description            Flag to indicate if the div is in a moving state. Default = false.
                            */
                            this.moving         =   0;
                            
                            /**
                            *   @property {Boolean}     movedelay 
                            *   @description            Number of milliseconds the mouse pointer has to be moving before the object moves
                            *   @since                  v1.0.8.20090930
                            */
                            this.movedelay		=	0;
                            
                            /**
                            *   @property {String}      cursor_over 
                            *   @description            CSS cursor style to use when the mouse pointer is over the moveable element.
                            */
                            this.cursor_over    =   "pointer";
                            
                            /**
                            *   @property {String}      cursor_move 
                            *   @description            CSS cursor style to use when the mouse pointer is moving the moveable element.
                            */
                            this.cursor_move    =   "move";
                            
                            /**
                            *   @property {String}      direction 
                            *   @description            Direction the moveable control can be moved in. Values = ["xy","x","y"]. Default = "xy".
                            */
                            this.direction      =   "xy";

                            /**
                            *   @property {String}      _m 
                            *   @description            Moving event reference.
                            */
                            this._m             =   null;

                            /**
                            *   @property {String}      _u 
                            *   @description            Mouse up event reference.
                            */
                            this._u             =   null;

                            /**
                            *   @property {String}      _s 
                            *   @description            Scroll event reference.
                            */
                            this._s             =   null;      //scroll event reference

                            /**
                            *   @property {String}      _b 
                            *   @description            Next sibling node of the moveable element
                            */
                            this._b			    =   null;

                            /**
                            *   @property {String}      _p 
                            *   @description            Original parent node of the moveable element
                            */
                            this._p			    =	null;


                            /**
                            *   @property {String}      _d 
                            *   @description			Move delay id
                            *   @since                  v1.0.8.20090930
                            */
                            this._d			    =	null;

                            /**
                            *   @property {String}      cssText 
                            *   @description            Holds the elements original style
                            */
                            this.cssText        =   "";

                            /**
                            *   @property {String}      OffsetX 
                            *   @description            Moving event reference.
                            */
                            this.oX             =   0;

                            /**
                            *   @property {String}      OffsetY 
                            *   @description            Moving event reference.
                            */
                            this.oY             =   0;

                            /**
                            *   @property {String}      ScrollX
                            *   @description            Moving event reference.
                            */  
                            this.sX             =   0;

                            /**
                            *   @property {String}      sY 
                            *   @description            ScrollY.
                            */
                            this.sY             =   0;
                            
                            /**
                            *   @property {Boolean}     detach 
                            *   @description            Detach the element from its parent and attach it to the
                            *                           document body during movement. Default = false;
                            *   @since                  v1.0.7.20090731
	                        */
                            this.detach             =   0;
                            
                            /**
                            *   @property {Boolean}     anytype 
                            *   @description            Allows any type of control to be made moveable whereas by default,
                            *                           input control such as textboxes are not moveable. Default = false.
                            *   @since                  v1.0.7.20090731
	                        */
                            this.anytype            =   0;
                            
                        };

SS.control.moveable.prototype =
{
	/**
	*   @function       SS.control.moveable.render
	*   @description    Renders an element as being moveable on the page.
	*   @returns        null
	*/
	render	:	function()
				{	    
				    //t:    this
				    //l:    element
			        var t = this, l = $g(t.id);
			            
			        if(l)
			        {
			            /**
			            *   @ignore
			            */
				        l.onmousedown =    function(e)
                                           {
                                           
												t._d = $st(function(){t._d = 0;},t.movedelay); //move delay
                                           
			                                    e = $e(e);
		                                        var p, l = this, g = e.srcElement || e.target;
		                                        
		                                        if($psb(t.anytype) || !$iln("input,select,textarea",g.tagName))
		                                        {
		                                            if(!t.cssText)
		                                            {
		                                                 t.cssText = l.style.cssText;
		                                            }
			                                        l.style.zIndex = 32000;
    			                                    
	                                                t.MouseDown.call(t,e,l); 
		                                            l.style.position = "absolute";
    		                                        
    		                                        
    		                                        if(t.detach)
    		                                        {
		                                                //attach the moveable element to the document body, rather than a sub element
		                                                t._p = l.parentNode;
		                                                t._b = l.nextSibling;
		                                                $rc(t._p,l);
		                                                $ac(document.body,l);
		                                            }
		                                            
		                                            p = $xyz(l);
		                                            p.x = $n(e.dX - t.oX);
		                                            p.y = $n(e.dY - t.oY);
		                                            $sxyz(l,p);
    			                                    
			                                        //$ea("onselectstart",function(e){$ec(e);return false;});
			                                    }
			                                    return $ec(e);
                                            };
			            /**
			            *   @ignore
			            */
				        l.onmouseup  =     function(e)
		                                   {
												var l = this;
		                                        if(t.cssText)
		                                        {
		                                            this.style.cssText = t.cssText;
		                                            t.cssText = null;
		                                        }
		                                        
		                                        t.MouseUp.call(t,e,this);
		                                        
		                                        if(t.detach)
		                                        {
		                                            $st(function()
													    {
														    try
														    {
															    //restore orginal ordering
															    $rc(document.body,l);
															    if(t._p)
															    {
																    t._p.insertBefore(l,t._b);
															    }
														    }
														    catch(x)
														    {
														        //failed to restore ordering, has the element or parent element been deleted?
														    }
													    },1);
											    }
		                                        
		                                    };
                                            
                        l.style.cursor = t.cursor_over;
                        
			        }
			        
				},
	/**
	*   @function               SS.control.moveable.MouseDown
	*   @description            Handles the mouse down event attached to the moveable element.
	*   @param {Event} e        Event
	*   @param {HTMLElement} l  Moveable element.
	*   @param {Boolean} es     Exclude Scroll. Default = false.
	*   @returns                null
	*/
	MouseDown : function(e,l,es)
	            {
	                if(l)
	                {
                        e = $e(e);
                        
                        //t:    this
                        //p:    element position
                        //sx:   scroll x
                        //sy:   scroll y
                        var t = this, p = $xyz(l), lp = l.parentNode, sl = 0, st = 0;
                        
                        t.sX = 0;
                        t.sY = 0;
                        while(lp)
                        {						
                            if(!isNaN(lp.scrollLeft))
                            {
                                sl += $n(lp.scrollLeft);
                            }					
                            if(!isNaN(lp.scrollTop))
                            {
                                st += $n(lp.scrollTop);
                            }
                            lp = lp.parentNode;
                        }
                        if(!es)
                        {
                            t.sX += $dbsl();
                            t.sY += $dbst();
                        }
                        t.oX = e.clientX - p.x + sl;
                        t.oY = e.clientY - p.y + st;
                        t._m = $ea("onmousemove",function(e){t.MouseMove.call(t,e);});
                        t._u = $ea("onmouseup",function(e){t.MouseUp.call(t,e);});
                        t._s = $ea("onscroll",function(e){t.Scroll.call(t,e);});
                        t.moving = 1;
                        if(l)
                        {
                            l.style.cursor = t.cursor_move;
                            /**
				            *   @ignore
				            */
                            l.onselectstart = function(e){$ec(e);return false;};
                        }
                        
                        $ef(t.onmousedown,t,e);
                    }
	            },
	/**
	*   @function               SS.control.moveable.MouseMove
	*   @description            Handles the mouse move event attached to the moveable element when it is being dragged around (in a moving state).
	*   @param {Event} e        Event
	*   @returns                null
	*/
	MouseMove : function(e)
	            {
	                //t:    this
	                //l:    element
	                var t = this, l, d = $lc(t.direction);
	                if(t._m && !t._d)
	                {
	                    e = $e(e);
	                    l = $g(t.id);
	                    
	                    if(l)
	                    {
	                        $sxyz(l,new SS.coord((d == "xy" || d == "x") ? (e.clientX - t.oX + t.sX) : null, (d == "xy" || d == "y") ? (e.clientY - t.oY + t.sY) : null, $n(l.style.zIndex)));
	                    }
	                    $ef(t.onmousemove,t,e);
                    }
	            },
	/**
	*   @function               SS.control.moveable.MouseUp
	*   @description            Handles the mouse up event attached to the moveable element.
	*   @param {Event} e        Event
	*   @param {HTMLElement} l  Moveable element.
	*   @returns                null
	*/
    MouseUp :   function(e,l)
                {
                    e = $e(e);
                    
                    //t:    this
                    var t = this;
                    
                    t.moving = 0;
                    $erid(t._m);
                    t._m = null;
                    $erid(t._u);
                    t._u = null;
                    $erid(t._s);
                    t._s = null;
                                        
                    if(l)
                    {
                        l.style.cursor = t.cursor_over;
                        l.onselectstart = null;
                    }
                    $ef(t.onmouseup,t,e);
                },
	/**
	*   @function               SS.control.moveable.Scroll
	*   @description            Stores the current document scroll positions.
	*   @returns                null
	*/
     Scroll :   function()
                {
                    this.sX = $dbsl();
                    this.sY = $dbst();
                }
};