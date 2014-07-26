/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.popupcalendar.js		
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
*   File Name:      SS.control.popupcalendar.js
*   Description:    Popup Calendar. Displays the calendar popup at
*                   the event mouse co-ordinates when the linkto control raises an onmouseover event
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.geom.js
*   SS.control.js
*   SS.control.popup.js
*   SS.control.calendar.js
*/
  

/**
*   @class Popup Calendar. Calendar which appears which can appear when linked to an element.
*   @constructor
*/
SS.control.popupcalendar =  function()
                            {
                                //t:    this
                                //k:    key
                                //p:    popup
                                //c:    calendar
                                //oc:   {string} = ",onclick"
                                var k, p = new SS.control.popup(), c = new SS.control.calendar(), oc = ",onclick";
                                
                                /**
                                *   @property {String}      onevent 
                                *   @description            Name of the event, or comma seperated list of event names, to activate the popup calendar upon.
                                */
                                this.onevent = oc;
                                
                                /**
                                *   @property {String}      offevent 
                                *   @description            Name of the event, or comma seperated list of event names, to deactivate the popup calendar upon.
                                */
                                this.offevent = oc;
                                
                                for(k in c)
                                {
                                    if(!$isf(c[k]))
                                    {
                                        this[k] = c[k];
                                    }
                                }
                                                
                                p.onevent += "," + this.onevent;
                                p.offevent += "," + this.offevent;
                                p.hidedelay = 250;
                                for(k in p)
                                {
                                    if(!$isf(p[k]))
                                    {
                                        this[k] = p[k];
                                    }
                                }
                                                                                        
                                /**
                                *   @property {SS.control.popup}    PP
                                *   @description                    Popup control which handles the displaying of the popup calendar.
                                *   @private
                                */
                                this.PP = p;
                                
                                /**
                                *   @property {SS.control.calendar} CL
                                *   @description                    Calendar control used inside the popup
                                *   @private
                                */
                                this.CL = c;
                                
                                /**
                                *   @property {String}      css 
                                *   @description            Class style sheet applied to the control.
                                */
                                this.css = c.css;
                            };

SS.control.popupcalendar.prototype = {
                /**
	            *   @function       SS.control.popupcalendar.render
	            *   @description    Renders the popupcalendar control on the page by rendering the two controls
	            *                   that make up this popup calendar; {@link SS.control.popup} and {@link SS.control.calendar}.
	            *   @returns        null
	            */
        render: function()
                {
                    //t:    this
                    //k:    key
                    //l:    element
                    //c:    calendar attach div
                    
                    var t = this, k, l = $g(t.id), c = $c();
                    
                    //update the popup control with values from this control
                    $cmom(t,t.PP,"id");
                    t.PP.id = t.id;
                    //update the calendar control with values from this control
                    $cmom(t,t.CL,"id,_idt,_idh,_idb,selecteddate,visiblemonth");
                                       
                                                
                    if(t._i)
                    {
                        t.CL.id = t.id + "_c";
                        c.id = t.CL.id;
                        /**
                        *   @ignore
                        */
                        t.CL.onvisiblemonthchange=  function()
                                                    {
                                                        $ct(t.PP._h);
                                                    };
                        /**
                        *   @ignore
                        */ 
                        t.CL.onchange = function() 
                                        {
                                            t.PP.hide.call(t);
                                        };
                        $ac(l,c);
                    }
                    
                    
                    t.CL.render.call(t.CL);
                    t.PP.render.call(t.PP);
                    t._i = 0;
                }
                
     
};
