/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.tab.js		
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
*   File Name:      SS.control.tab.js
*   Description:    Tab bar
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
*   SS.control.tabbar.js
*   SS.addon.js
*/


/**
*   @class Tab control used by the tab bar control.
*   @constructor
*/
SS.control.tab =    function()
                    {
                        /**
                        *   @property id 
                        *   @description Identifier of the tab control.
                        */
                        this.id            =   "";
                        
                        /**
                        *   @property {String}      css 
                        *   @description            Style sheet class applied to the tab.
                        *                           Default = "SS_control_tab"
                        */
                        this.css           =   "SS_control_tab";
                        
                        /**
                        *   @property {String}      css_on 
                        *   @description            Style sheet class applied to the tab.
                        *                           Default = "SS_control_tab_on"
                        */
                        this.css_on        =   "SS_control_tab_on";
                        
                        /** 
                        *   @property {Function}    onselect
                        *   @description            Function called or evaluated {String} when the tab is selected (clicked on).
                        */
                        this.onselect      =   "";
                        
                        /** 
                        *   @property {Function}    ondeselect
                        *   @description            Function called or evaluated {String} when this tab loses it selected status.
                        */
                        this.ondeselect    =   "";
                         
                        /** 
                        *   @property {Boolean}     selected
                        *   @description            Flag indicating if the tab is in the selected state.
                        *                           Default = false.
                        */
                        this.selected      =   0;      
                         
                        /** 
                        *   @property {Boolean}     visible
                        *   @description            Flag indicating if the tab is visible in the tab bar.
                        *                           Default = true.
                        */
                        this.visible       =   1;
                        
                        /**
                        *   @property {String}      value 
                        *   @description            Arbitary value of the tab.
                        *                           Default = "".
                        */
                        this.value		   =	"";
                    };
                        
SS.control.tab.prototype = {
                    /**
	                *   @function       SS.control.tab.render
	                *   @description    Renders the tab inside the parent tab bar.
	                *   @returns        null
	                */
    render      :   function()
                    {
                        //t:    this
                        //l:    element
                        //s:    css style (element level)
                        var t = this, l = $g(t.id), s;
                        s = l.className;
                        if(!$ise(s))
                        {
                            t.css = s;
                        }
                        
                        $cl(l,t.css + ($psb(t.selected) ? " " + t.css_on : ""));
                        /**
					    *   @ignore
					    */
						l.onclick = function(e)
                                    {
                                        t.select.call(t,e);
                                    };
                        
                    },
                    /**
	                *   @function           SS.control.tab.select
	                *   @description        Handles the selecting of the tab and activating the
	                *                       deselect function of the previosuly selected tab.
	                *   @param {Event} e    Raised event.
	                *   @returns            null
	                */
    select      :   function(e)
                    {
                        //t:    this
                        //l:    this element
                        //p:    parent tab bar
                        //i:    index pointer
                        //b:    tab
                        //a:    array of tabs
                        var t = this, l = $g(t.id), p = $gc(l.parentNode.id), i, b, a = p.tabs();
                        e = $e(e);
                        if(p)
                        {
                            for(i = 0; i < $ln(a); i++)
                            {
                                b = a[i];
                                if(b.selected)
                                {
                                    b.deselect.call(b,e);
                                }
                            }
                        }
                        
                        t.selected = 1;
                        $cl(l,t.css + " " + t.css_on);
                        $ef(t.onselect,t,e);
                        $ef(p.onselect,p,e);
                        $ef(p.onchange,p,e);
                    },
                    /**
	                *   @function           SS.control.tab.deselect
	                *   @description        Handles the deselecting of this tab.
	                *   @param {Event} e    Raised event.
	                *   @returns            null
	                */
    deselect    :   function(e)
                    {
                        //t:    this
                        //l:    this element
                        var t = this, l = $g(t.id), p = $gc(l.parentNode.id);
                        e = $e(e);
                        t.selected = 0;
                        $cl(l,t.css);
                        $ef(t.ondeselect,t,e);     
                        $ef(p.ondeselect,p,e);                   
                    }
  
};

