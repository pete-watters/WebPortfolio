/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.tabbar.js		
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
*   File Name:      SS.control.tabbar.js
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
*   SS.addon.js
*/


/**
*   @class Tab bar.
*   @constructor
*/
SS.control.tabbar =     function()
                        {
                            /**
                            *   @property id 
                            *   @description Identifier of the tabbar control.
                            */
                            this.id            =   "";
                            
                            /** 
                            *   @property {Function}    onchange
                            *   @description            Function called or evaluated {String} whenever the selected tab changes.
                            */
                            this.onchange		=	"";
                            
                            /** 
                            *   @property {Function}    onselect
                            *   @description            Function called or evaluated {String} whenever any tab is selected.
                            */
                            this.onselect      =   "";
                            
                            /** 
                            *   @property {Function}    ondeselect
                            *   @description            Function called or evaluated {String} whenever any tab is deselected.
                            */
                            this.ondeselect    =   "";
                            
                            /** 
                            *   @property {Boolean}     visible
                            *   @description            Flag indicating if the tab bar is visible.
                            *                           Default = true.
                            */
                            this.visible       =   1;
                            
                        };
                        
SS.control.tabbar.prototype = {
                    /**
	                *   @function       SS.control.tabbar.render
	                *   @description    Renders the tabbar on the page.
	                *   @returns        null
	                */
    render      :   function()
                    {
                        //t:    this
                        //a:    tabs array
                        //i:    index pointer
                        //b:    tab
                        $v(this.id,$psb(this.visible));
                    },
                    /**
	                *   @function           SS.control.tabbar.render
	                *   @description        Returns an array of the tab controls in the tabbar.
	                *   @returns {Array}    Array of {@link SS.control.tab}.
	                */
    tabs        :   function()
                    {
                        //t:    this
                        //l:    this element
                        //n:    possible tab nodes
                        //i:    index pointer
                        //b:    tab control
                        //a:    return array
                        var t = this, l = $g(t.id), n = l.childNodes, i, b, a = [];
                        
                        for(i = 0; i < $ln(n); i++)
                        {
                            if($uc($ga(n[i],"ext")) == "TAB")
                            {
                                b = $gc(n[i].id);
                                if(b)
                                {
                                    a.add(b);
                                }
                            }
                        }
                        return a;
                    },
                    /**
	                *   @function                   SS.control.tabbar.selectedTab
	                *   @description                Returns the selected tab.
	                *   @returns {SS.control.tab}   Selected tab {@link SS.control.tab}.
	                */
    selectedTab :   function()
                    {
                        //t:    this
                        //a:    array of tabs
                        //i:    index pointer
                        //b:    tab control
                        //r:    selected tab to return
                        var t = this, a = t.tabs(), i, b, r;
                        for(i = 0; i < $ln(a); i++)
                        {
                            b = a[i];
                            if($psb(b.selected))
                            {
                                r = b;
                                break;
                            }
                        }
                        return r;
                    },
                    /**
	                *   @function                   SS.control.tabbar.selectTab
	                *   @description                Selects a tab based on the id specified or index position.
	                *   @param   {String}   i       Identifier or index position of the tab to select
	                *   @since                      v1.0.7.20090731
	                *   @returns {SS.control.tab}   Selected tab {@link SS.control.tab}.
	                */
    selectTab   :   function(i)
                    {
                        //t:    this
                        //a:    array of tabs
                        //j:    index pointer
                        //b:    tab control
                        //r:    tab to select
                        var t = this, a = t.tabs(), j, b, r;
                        if(isNaN(i))
                        {
                            for(j = 0; j < $ln(a); j++)
                            {
                                b = a[j];
                                if(b.id == i)
                                {
                                    r = b;
                                    break;
                                }
                            }
                        }
                        else
                        {
                            r = a[i];
                        }
                        
                        if(r)
                        {
                            r.select();
                        }
                        
                        return r;
                    }
};

