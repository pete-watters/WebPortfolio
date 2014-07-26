/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.menuitem.js				
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
*   File Name:      SS.control.menuitem.js
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
*   SS.control.menu.js
*/

/**
*   @class menuitem. Menu Item. Buttons used in the menu control.
*   @constructor
*/
SS.control.menuitem =   function()
                        {
                            /**
                            *   @property {String}    id 
                            *   @description          Identifier of the menuitem control.
                            */
                            this.id             =   "";
                            
                            /**
                            *   @property {String}    css 
                            *   @description          Cascading Stylesheet to apply to this menuitem.
                            */
                            this.css            =   "";
                            
                            /**
                            *   @property {String}    orientation 
                            *   @description          {String} = ["vertical" | "horizontal"]. Controls the direction of the menuitem.
                            */
                            this.orientation    =   "vertical";
                            
                            /**
                            *   @property {Function}  onclick
                            *   @description          {Function} or {String} which is executed or evaluated when the user clicks on this menuitem.
                            */
                            this.onclick        =   "";
                            
                            /**
                            *   @property {Function}  onmouseover
                            *   @description          {Function} or {String} which is executed or evaluated when the user moves their mouse over this menuitem.
                            */
                            this.onmouseover    =   "";
                            
                            /**
                            *   @property {String}    url 
                            *   @description          Redirect to the specified url on a click event.
                            */
                            this.url            =   ""; //redirect to the specified url on a click event
                            
                            /**
                            *   @property {String}    target 
                            *   @description          Window to open up the specified url. Default = "_self"
                            */
                            this.target         =   "_self"; //window to open up the specified url
                        };
                        
SS.control.menuitem.prototype = {

	/**
	*   @function       SS.control.menuitem.render
	*   @description    Renders the menuitem in the context of a parent {@link SS.control.menu}.
	*   @returns        null
	*/
    render      :   function()
                    {
                        //cm:   child menu
                        //mp:   parent menu
                        //m:    menu
                        //n:    node
                        //pc:   parent control
                        var t = this, m = $g(t.id),pc;
                        if(m)
                        {   
                            //found the menuitem element
                            
                            //look at the menuitems parent menu holder and obtain its orientation
                            mp = m.parentNode;
                            pc = $gc(mp.id);
                            if($lc($ga(mp,"ext")) == "menu")
                            {
                                t.orientation = $ga(mp,"orientation") || "vertical";
                            }
                            
                            m.className = "SS_control_menuitem " + "SS_control_menuitem_" + t.orientation + " " + t.css;
                            
                            /**
						    *   @ignore
						    */
							m.onclick = function(e)
                                        {
                                            t.Click.call(t,e,this);
                                        };
                            
                            if($psb(pc.mouseover) && t.childMenu(m))
                            {
                                /**
							    *   @ignore
							    */
								m.onmouseover = function(e)
                                                {
                                                    t.Click.call(t,e,this);
                                                };
                            }
                            else
                            {
                                /**
							    *   @ignore
							    */
								m.onmouseover = function(e)
                                                {
                                                    $ec(e);
                                                    return false;
                                                };
                                if(t.onmouseover)
                                {
                                    $eehadd(m,"onmouseover",function(e){$ef(t.onmouseover,t,e);$ec(e);});
                                }
                            }
                            //close all open menus on a document click event
                            $ea("onclick",function(){pc.close.call(pc);});
                        }
                    }, 
	                /**
	                *   @function       SS.control.menuitem.childMenu
	                *   @description    Look for child menus. if a child menu exists (there can only be one per menu item) then
	                *                   it needs to be displayed when the menuitem receives an onclick event.
	                *   @returns        null
	                */
    childMenu   :   function(m)
                    {
                        //i:    index pointer
                        //n:    node
                        //cm:   child menu
                        //c:    m.childNodes
                        //g:    lengthn of child menus
                        var i, n, cm, c = $cn(m), g = $ln(c);
                        
                        //look for child menus. if a child menu exists (there can only be one per menu item) then
                        //it needs to be displayed when the menuitem receives an onclick event
                        for(i = 0; i < g; i++)
                        {
                            n = c[i];
                            if($lc($ga(n,"ext")) == "menu")
                            {
                                cm = n;
                                break;
                            }
                        }
                        
                        return cm;
                        
                    },
                    /**
                    *   @function       SS.control.menuitem.Click
                    *   @description    Handle the onclick event from the rendered menuitem {HTMLElement}.
                    */
    Click     :     function(e,m)
                    {
                            //t:    this
                            //mp:   menu parent
                            //cm:   child Menu
                            //p:    menu position
                            var t = this, mp = m.parentNode,cm = t.childMenu(m), p = $xyz(m);
                            if(cm)
                            {
                                //child menu has been specified
                                if($lc($ga(mp,"orientation")) == "horizontal")
                                {
                                    p.x = m.offsetLeft;
                                    p.y = m.offsetTop + $xyz(m).h;
                                }
                                else
                                {
                                    p.x = p.w;
                                }
                                
                                $sxyz(cm,p);
                                
                                //only hide the menu on an onclick event if it is currently visible
                                //else display the menu and cancel the event to prevent the onclick
                                //message propagating through to parent menus.
                                if(cm.style.display === "")
                                {
                                    //close the menu
                                    $v(cm,0);
                                }
                                else
                                {
                                    //close all sibling menu items with open sub menus
                                    //g:    length of sibling menu items
                                    var sb = $cn(mp),i,c, g = $ln(sb);
                                    for(i = 0; i < g; i++)
                                    {
                                        c = $gc(sb[i].id);
                                        if(c && c.close)
                                        {
                                            c.close.call(c);
                                        }
                                    }
                                    //open the menu. 
                                    $v(cm,1);
                                    $ec(e);
                                }
                            }
                            else
                            {
                                //this menu item does not have any child menus hanging off it
                                //therefore a click means close all open menus
                                var pm = $gc(mp.id);
                                if(pm && pm.close)
                                {
                                    pm.close();
                                }
                                
                                $ef(t.onclick,t,e);
                                if(t.url)
                                {
                                    //a url has been specified. redirect the browser to that url
                                    window.open(t.url,t.target);
                                    //a.href = t.url;
                                    //a.target = t.target;
                                    //a.onclick(e);
                                    //window.location.href = t.url;
                                }
                            }
                            
                    },
                    /**
                    *   @function       SS.control.menuitem.close
                    *   @description    Closes the linked child menu, if it exists.
                    */
    close       :   function()
                    {
                        //close child menu
                        var c,m = this.childMenu($g(this.id));
                        if(m)
                        {
                            c = $gc(m.id);
                            if(m.style.display != "none")
                            {
								//close the menu
								$v(m,0);
								if(c && c.close)
								{
									c.close.call(c);
								}
							}
                        }
                    }

};


