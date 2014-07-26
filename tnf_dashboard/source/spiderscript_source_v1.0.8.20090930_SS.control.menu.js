/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.menu.js				
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
*   File Name:      SS.control.menu.js
*   Description:    Menuing
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
*   @class Menu. Hieratical menuing.
*   @constructor
*/
SS.control.menu =   function()
                    {
                        /**
                        *   @property {String}    id 
                        *   @description          Identifier of the menu control.
                        */
                        this.id             =   "";
                        
                        /**
                        *   @property {String}    css 
                        *   @description          Cascading Stylesheet to apply to this menu
                        */
                        this.css            =   "";
                        
                        /**
                        *   @property {Boolean}   submenu 
                        *   @description          Flag to indicate if this menu is a sub menu. I.e. has a parent menu.
                        */
                        this.submenu        =   0;
                        
                        /**
                        *   @property {String}    orientation 
                        *   @description          {String} = ["vertical" | "horizontal"]. Controls the direction of the menu.
                        */
                        this.orientation    =   "vertical";
                        
                        /**
                        *   @property {Booelan}   mouseover 
                        *   @description          Open menu on onmouseover event instead of onclick (default).
                        */
                        this.mouseover      =   0;
                            
                        /** 
                        *   @property {Boolean}   visible
                        *   @description          Flag to indicate whether or not the menu is currently visible. Overrides style="display:none;" rule on initial render.
                        *                         Default = true.
                        */
                        this.visible        =   1;
                    };
                        
SS.control.menu.prototype = {

	/**
	*   @function       SS.control.menu.render
	*   @description    Renders the menu on the page.
	*   @returns        null
	*/
    render      :   function()
                    {
                        //t:    this
                        //mp:   menu parent
                        //m:    menu
                        //cp:   style prefix
                        var t = this, mp, m = $g(t.id),cp = "SS_control_menu";
                        if(m)
                        {
                            //set menu visibility - deliberately overridden below - allows for display:none in style
                            $v(m,t.visible);
                        
                            //found the menu element
                            mp = m.parentNode;
                            
                            m.className = cp + " " + cp + "_" + t.orientation + " " + t.css;
                            
                            //if the menu has a patent node which is a menuitem, then it must be a sub menu.                            
                            t.submenu = (m && $lc($ga(mp,"ext")) == "menuitem") ? 1 : 0;
                            
                            //hide sub menus. they are visible on click / mouse over
                            $v(m,!t.submenu);
                            m.className += t.submenu ? " SS_control_submenu" : "";
                        }
                    },
	/**
	*   @function       SS.control.menu.close
	*   @description    Close menu. Go through all child menus and check to see if they have a sub menu.
	*                   If they do, close that sub menu by calling the close function on each menu item
	*   @returns        null
	*/
    close       :   function()
                    {
                        //go through all child menus and check to see if they have a sub menu.
                        //if they do, close that sub menu by calling the close function on each menu item
                        
                        //i:    index pointer
                        //m:    this menu element
                        //n:    node
                        //c:    menu control
                        //l:    list of child nodes
                        var i,m = $g(this.id),n,c,l=$cn(m);
                        
                        if(m)
                        {
                            for(i = 0; i < $ln(l); i++)
                            {
                                n = l[i];
                                if(n)
                                {
                                    c = $gc(n.id);
                                    if(c && c.childMenu)
                                    {
                                        c.close.call(c);
                                    }
                                }
                            }                            
                        }
                    }

};

