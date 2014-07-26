/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.logo.js				
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
*   File Name:      SS.control.logo.js
*   Description:    Displays the library logo on a page
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.control.js
*/

/**
*   @class          SS.control.logo Control which displays the Spiderscript Logo (default) or an alternative logo.
*   @constructor
*/
SS.control.logo =   function()
                    {
                        /**
                        *   @property {String}    id 
                        *   @description          Identifier of the logo control.
                        */
                        this.id         =   "";
                        
                        /**
                        *   @property {String}    url 
                        *   @description          URL to redirect when user clicks on logo.
                        */
                        this.url        =   SS.global.url;
                        
                        /**
                        *   @property {String}    image
                        *   @description          Image URL. Alternatively use {@link SS.control.logo.src}
                        */
                        this.image      =   this.url + "SSlogo.png";
                        
                        /**
                        *   @property {String}    src
                        *   @description          Image URL. Alternatively use {@link SS.control.logo.image}
                        */
                        this.src        =   "";
                        
                        /**
                        *   @property {Boolean}   redirect
                        *   @description          Redirect if user clicks on logo (default = true), else false - open new window.
                        */
                        this.redirect   =   1;
                    };

SS.control.logo.prototype = {

	            /**
	            *   @function       SS.control.logo.render
	            *   @description    Renders the logo on the page.
	            *   @returns        null
	            */
        render: function()
                {
                    
				    var n, m, t = this, l = $g(t.id), w = window;
			        if(l)
			        {
			            $dc(l); //if element has already been drawn, clear all children to allow for the element to be redrawn
			            
				        //draw the object
				        
				        m = $c("img");
				        m.src = t.src || t.image;
				        if(!$ise(t.url))
				        {
				            /**
						    *   @ignore
						    */
							m.onclick = function()
				                        {
				                            if($psb(t.redirect))
				                            {
				                                w.location.href = t.url;
				                            }
				                            else
				                            {
				                                w.open(t.url);
				                            }
				                        };
				            m.style.cursor = "pointer";
				        }
				        $ac(l,m);
				    }
                }
};

