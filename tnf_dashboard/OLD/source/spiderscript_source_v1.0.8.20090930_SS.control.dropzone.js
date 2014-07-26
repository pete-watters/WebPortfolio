/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.dropzone.js				
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
*   File Name:      SS.control.dropzone.js
*   Description:    Creates areas on a page that moveable objects can be dropped into
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.locale.js
*   SS.events.js
*   SS.control.js
*   SS.geom.js
*   SS.addon.js
*/

/**
*   @class          Drop Zone. Areas on a page that moveable objects can be dropped into
*   @constructor
*/
SS.control.dropzone =   function()
                        {
                            /**
                            *   @property {String}  id 
                            *   @description        Identifier of the dropzone control.
                            */
                            this.id             =   "";
                            
                            /**
                            *   @property {Object}  lastDropped
                            *   @description        Contains the last item dropped in the drop zone
                            */
                            this.lastDropped    =   null;  //contains the last item dropped in the drop zone
                            
                            /**
                            *   @property {Object}  inFocus
                            *   @description        Contains the item that is in focus
                            */
                            this.inFoucs        =   null;
                            
                            /**
                            *   @property {Object}  onfocus
                            *   @description        Function called or evaluated {String} whenever the drop zone is in focus.
                            *                       This occurs when a moveable object has is dragged over the drop zone.
                            */
                            this.onfocus        =   "";    //fires when object enters the drop zone
                            
                            /**
                            *   @property {Object}  onblur
                            *   @description        Function called or evaluated {String} whenever the component leaves the drop zone.
                            */
                            this.onblur         =   "";    //fires when object leaves the drop zone
                            
                            /**
                            *   @property {Object}  ondrop
                            *   @description        Function called or evaluated {String} whenever a component is dropped / released in 
                            *                       the drop zone.
                            */
                            this.ondrop         =   "";
                            
                            /**
                            *   @property {Object}  onleave
                            *   @description        Function called or evaluated {String} whenever a component leaves the drop zone.
                            */
                            this.onleave         =   "";
                            
                            /**
                            *   @property {Node}    lastParent
                            *   @description        Parent node that the element was previously attached to
                            */
                            this.lastParent     =   null;
                            
                            /**
                            *   @property {Node}    lastNextSibling
                            *   @description        Next Sibling to the move that is currently being moved.
                            */
                            this.lastNextSibling =  null;
                        };


SS.control.dropzone.prototype = 
{
    /**
	*	renders the control in the form
	*/
	            /**
	            *   @function       render
	            *   @description    Registers the drop zone control on the page so that it can receive events.
	            */
	render	:	function()
				{
				    //t:    this,
				    //l:    drop zone element
				    //v:    ss.events
		            var t = this, l = $g(t.id), v = SS.events;
		            if(l)
		            {
		                v.dzr(t);
		                v.add("onresize",function(e){v.dzr(t);});
		                /**
		                *   @ignore
		                */
		                l.onresize = function(e){v.dzr(t);};    //capture resizing of the dropzone through SS.geom.height and SS.geom.width functions
		            }
			    },
			    /**
			    *   @function           DragFocus
			    *   @description        Function called when a control is dragged into the focus of the drop zone.
			    *                       This handles the calling of the function {@link SS.control.dropzone.onfocus}.
			    *   @param {Event} e    Event.
			    *   @param {HTMLElement} c Element that has been dragged into the drop zone.
			    *   @returns            null
			    */
    DragFocus:  function(e,c)
                {
                    var t = this;
                    t.inFocus = c;
                    $ef(t.onfocus,t,e);
                },
			    /**
			    *   @function           DragBlur
			    *   @description        Function called when a control is dragged out of focus from the drop zone.
			    *                       This handles the calling of the function {@link SS.control.dropzone.onblur}.
			    *   @param {Event} e    Event.
			    *   @param {HTMLElement} c Element that has been dragged into the drop zone.
			    *   @returns            null
			    */
    DragBlur:   function(e,c)
                {
                    var t = this;
                    t.inFocus = null;
                    $ef(t.onblur,t,e);
                },
			    /**
			    *   @function           DragDrop
			    *   @description        Function called when a control is dropped in the drop zone.
			    *                       This handles the calling of the function {@link SS.control.dropzone.ondrop}.
			    *   @param {Event} e    Event.
			    *   @param {HTMLElement} c Element that has been dragged into the drop zone.
			    *   @returns            null
			    */
    DragDrop:   function(e,c)
                {
                    var t = this;
                    t.lastDropped = c;
                    t.inFocus = null;
                    
                    //get the component, then the html rendered element
                    //and detatch element in the DOM from its parent and reattach
                    //it to the drop zone
                    if(c)
                    {
                        var l = $g(c.id), d = $g(t.id), pn;
                        if(l && d)
                        {
                            pn = l.parentNode;
                            t.lastNextSibling = l.nextSibling;
                            t.lastParent = pn;
                            $rc(pn,l);
                            $ac(d,l);
                        }
                    }
                    $ef(t.ondrop,t,e);
                },
			    /**
			    *   @function           DragLeave
			    *   @description        Function called when a control is removed from the drop zone.
			    *                       This handles the calling of the function {@link SS.control.dropzone.onleave}.
			    *   @param {Event} e    Event.
			    *   @param {HTMLElement} c Element that has left the drop zone.
			    *   @returns            null
			    */
    DragLeave:  function(e,c)
                {
                    $ef(this.onleave,this,e);
                },
			    /**
			    *   @function           cancelDrop
			    *   @description        Function called to cancel the dropping of an element and return it to its original position
			    *                       in the document tree.
			    *   @returns            null
			    */
    cancelDrop: function()
                {
                    var t = this, l;
                    if(t.lastDropped && t.lastParent)
                    {
                        l = $g(t.lastDropped.id);
                        if(l)
                        {
                            $rc(l.parentNode,l);
                            t.lastParent.insertBefore(l,t.lastNextSibling);
                        }
                    }
                }
	
};
