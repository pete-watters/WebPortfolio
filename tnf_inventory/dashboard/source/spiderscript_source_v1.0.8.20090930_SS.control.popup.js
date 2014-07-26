/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.popup.js			
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
*   File Name:      SS.control.popup.js
*   Description:    Popup HTML element. Displays the contents of the popup at
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
*/

/**
*   @class Popup. Makes an element popup on a given event.
*   @constrcutor
*/
SS.control.popup =  function()
                    {
                        /**
                        *   @property {String}      id 
                        *   @description            Identifier of the popup control.
                        */
                        this.id         =   "";
                        
                        /**
                        *   @property {String}      callid 
                        *   @description            Identifier of control that calls the popup.
                        */
                        this.callid     =   "";
                        
                        /**
                        *   @property {String}      css 
                        *   @description            Class style sheet applied to the control.
                        */
                        this.css        =   "";
                        
                        /**
                        *   @property {Integer}     offsetx 
                        *   @description            Number of pixels left from the mouse pointer that the menu is displayed.
                        *                           Default = 7.
                        */
                        this.offsetx    =   7;
                        
                        /**
                        *   @property {Integer}     offsety 
                        *   @description            Number of pixels below from the mouse pointer that the menu is displayed.
                        *                           Default = 5.
                        */
                        this.offsety    =   5;
                        
                        /**
                        *   @property {String}      onevent 
                        *   @description            Name of the event, or comma seperated list of event names, to activate upon.
                        */
                        this.onevent    =   "onfocus";
                        
                        /**
                        *   @property {String}      offevent 
                        *   @description            Name of the event, or comma seperated list of event names, to deactivate upon.
                        */
                        this.offevent   =   "onblur";
                        
                        /** 
                        *   @property {Function}    onshow
                        *   @description            Function called or evaluated {String} whenever the popup has been made visible.
                        */
                        this.onshow         =   "";
                        
                        /** 
                        *   @property {Function}    onhide
                        *   @description            Function called or evaluated {String} whenever the popup has been made invisible (hidden).
                        */
                        this.onhide         =   "";
                        
                        /**
                        *   @property {Integer}     hidedelay 
                        *   @description            Number of milliseconds to wait after the offevent has occured
                        *                           before hiding the popup.
                        */
                        this.hidedelay  =   9;
                        
                        /**
                        *   @property {Integer}     x 
                        *   @description            Set to override the default horizontal popup position.
                        */
                        this.x          =   null;
                        
                        /**
                        *   @property {Integer}     y 
                        *   @description            Set to override the default vertical popup position.
                        */
                        this.y          =   null;       //set to override the default popup position
                        
                        /**
                        *   @property {Number}      _h 
                        *   @description            Hide timer id.
                        *   @private
                        */
                        this._h         =   0;
                        
                        /**
                        *   @property {Boolean}     _i 
                        *   @description            Initial render flag.
                        *   @private
                        */
                        this._i         =  1;
                    };

SS.control.popup.prototype = {
                /**
	            *   @function       SS.control.popup.render
	            *   @description    Renders the popup control on the page and links it to the {HTMLElement} as
	            *                   identified in {@link callid}. Initially the popup starts off in a hidden state.
	            *   @returns        null
	            */
        render: function()
                {
                    //t:    this
                    //l:    popup element
                    //n:    linked to element
                    //o:    onevents array
                    //f:    offsevents array
                    //i:    index pointer
                   
                    var t = this, l = $g(t.id), n = $g(t.callid),o = t.onevent.split(","),f = t.offevent.split(","),i;
                    if(l && t._i)
                    {
                        l.className = "SS_control_popup" + ($ise(t.css) ? "" : " " + t.css);
                        $v(l,0); //hide the popup
                        
                        //sf: show function, hf = hide function, hfc = hide function with event cancel
                        var sf = function(e){t.show.call(t,e);$ec(e);},
                            hf = function(e){t.hide(e);},
                            hfc = function(e){t.hide.call(t,e);$ec(e);};
                        
                        if(n)
                        {
                            //set up events that the popup is shown on
                            for(i = 0; i < $ln(o); i++)
                            {
                                $eehadd(n,o[i],sf);
                            }
                        }
                        
                        for(i = 0; i < $ln(f); i++)
                        {
                            if(f[i] == "onclick")
                            {
                                $ea(f[i],hf);
                            }
                            else
                            {
                                if(n)
                                {
                                    $eehadd(n,f[i],hf);
                                }
                            }
                        }
                        
                        $eehadd(l,"onclick",function(e){$ec(e);});
                    }
                    t._i = 0;
                    
                },
                /**
	            *   @function       SS.control.popup.show
	            *   @description    Displays the popup
	            *   @param {Event}  Event that triggered the showing of the popup e.g. onmouseclick
	            *   @returns        null
	            */
      show  :   function(e)
                {
                    //e:    event
                    //t:    this
                    //l:    popup element
                    //p:    position to display the popup at
                    e = $e(e);
                    var t = this, l = $g(t.id);
                    if($isu(e) || $lc(e.type) == "focus")
                    {
                        //focus does not provide mouse co-ordinates
                        //set the co-ordinates to be the bottom left corner of the element we are linked to
                        
                        //k:    linked to element
                        var k = $g(t.callid);
                        if(k)
                        {
                            p = $xyz(k);
                            if(p)
                            {
                                p.y += p.h;
                            }
                        }
                    }
                    else
                    {
                        p = new SS.coord(e.dX + t.offsetx,e.dY + t.offsety);
                    }
                    
                    
                    if(t.x !== null)
                    {
                        p.x = t.x;
                    }
                    if(t.y !== null)
                    {
                        p.y = t.y;
                    }
                    
                    if(l)
                    {
                        $sxyz(l,p);
                        $v(l,1);
                        $ef(t.onshow,t,e);
                    }
                },
                /**
	            *   @function       SS.control.popup.hide
	            *   @description    Hides the popup
	            *   @returns        null
	            */
      hide  :   function()
                {
                    var t = this, l = $g(t.id);
                    if(l && $ise(l.style.display))
                    {
                        if(t.hidedelay)
                        {
                            t._h = $st(function(){$v($g(t.id),0);$ef(t.onhide,t);},t.hidedelay);
                        }
                        else
                        {
                           $v(l,0);
                           $ef(t.onhide,t);
                        }
                        
                    }
                }
        
};

