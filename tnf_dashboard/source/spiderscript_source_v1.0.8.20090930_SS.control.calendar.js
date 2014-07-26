/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.calendar.js				
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
*   File Name:      SS.control.calendar.js
*   Description:    Calendar Control
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.locale.js
*   SS.control.js
*   SS.addon.js
*/

/**
*   @class Calendar Control
*   @constructor
*/
SS.control.calendar =   function()
                        {                
                            /**
                            * @property id 
                            * @description Identifier of the calendar control.
                            */
                            this.id             =   "";         //id of the control
                            
                            /**
                            * @property {Date} selecteddate
                            * @description Currently selected date.
                            */
                            this.selecteddate   =   new Date();
                            
                            /** 
                            *   @property       visiblemonth
                            *   @description    Month being displayed on the calendar
                            */
                            this.visiblemonth   =   new Date();
                            
                            /** 
                            *   @property       dayformat
                            *   @description    Format to output the day labels in.
                            *                   Values: [1,2,3,full]. Default = "1".
                            */  
                            this.dayformat      =   "1";
                            
                            /** 
                            *   @property       monthformat
                            *   @description    Format to output the month labels in.
                            *                   Values: [1,2,3,full]. Default = "full".
                            */
                            this.monthformat    =   "full";     //1,2,3,full
                            
                            /** 
                            *   @property       localecode
                            *   @description    Locale code. 2 character country code which determins the
                            *                   date format used. See ISO 3166-1 alpha-2.
                            */
                            this.localecode     =   "";
                            
                            /** 
                            *   @property {Function}    onchange
                            *   @description            Function called or evaluated {String} whenever the calendar date is changed.
                            */
                            this.onchange       =   "";         //fires when the selected date changes
                            
                            /** 
                            *   @property {Function}    onvisiblemonthchange
                            *   @description            Function called or evaluated {String} whenever the visisble calendar month changes.
                            */
                            this.onvisiblemonthchange = "";    //fires when the visible month changes
				            
				            //set up classnames
                            var p = "SS_control_calendar", m = p + "_daysmonth", n = p + "_title";      //prefix classname
                            
                            
                            /** 
                            *   @property {String}    css
                            *   @description          Classname for entire calendar. Defalut = "SS_control_calendar".
                            */
                            this.css                = p;
                            
                            /** 
                            *   @property {String}    css_title
                            *   @description          Classname for calendar title, typically the Month Year display at the top
                            *                         of the calendar. Defalut = "SS_control_calendar_title".
                            */
                            this.css_title          = n;
                            
                            /** 
                            *   @property {String}    css_titledays
                            *   @description          Classname for days of the week in the calendar.
                            *                         Defalut = "SS_control_calendar_titledays".
                            */
                            this.css_titledays      = n + "days";
                            
                            /** 
                            *   @property {String}    css_selecteddate
                            *   @description          Classname for the currently selected date.
                            *                         Defalut = "SS_control_calendar_selecteddate".
                            */
                            this.css_selecteddate   = p + "_selecteddate";
                            
                            /** 
                            *   @property {String}    css_weekend
                            *   @description          Classname for the weekend columns.
                            *                         Defalut = "SS_control_calendar_weekend".
                            */
                            this.css_weekend        = p + "_weekend";
                            
                            /** 
                            *   @property {String}    css_disabled
                            *   @description          Classname for dates which have been marked as disabled.
                            *                         Defalut = "SS_control_calendar_disabled".
                            */
                            this.css_disabled       = p + "_disabled";
                            
                            /** 
                            *   @property {String}    css_daysmonth
                            *   @description          Classname for all the dates in the calendar.
                            *                         Defalut = "SS_control_calendar_daysmonth".
                            */
                            this.css_daysmonth      = m;
                            
                            /** 
                            *   @property {String}    css_daysmonthlast
                            *   @description          Classname for the dates that fall into the previous visible month.
                            *                         Defalut = "SS_control_calendar_daysmonthlast".
                            */
                            this.css_daysmonthlast  = m + "last";
                            
                            /** 
                            *   @property {String}    css_daysmonthnext
                            *   @description          Classname for the dates that fall into the following visible month.
                            *                         Defalut = "SS_control_calendar_daysmonthnext".
                            */
                            this.css_daysmonthnext  = m + "next";
                            
                            /** 
                            *   @property {String}    css_navigate
                            *   @description          Classname for the the previous (<<) and next (>>) month navigation buttons.
                            *                         Defalut = "SS_control_calendar_navigate".
                            */
                            this.css_navigate       = p + "_navigate";
                            
                            /** 
                            *   @property {Boolean}   sundaylast
                            *   @description          Boolean flag to determin position of Sunday on the calendar.
                            *                         false = Sunday first day of week, true = Sunday last day of week. Default = true.
                            */
                            this.sundaylast     =   1;  //sunday appears on the right of the calendar next to saturday

                            /** 
                            *   @property {Boolean}   sevenweek
                            *   @description          Seven or six week calendar display.
                            *                         false = 6 week display, true = 7 week display. Default = false.
                            */
                            this.sevenweek      =   0;  //standard display six weeks
                            
                            /** 
                            *   @property {String}    linkto
                            *   @description          Id of element that will hold the selected date. Typically this will be either
                            *                         a text or hidden field. Changing the value of the linked to field is automatically
                            *                         reflected in the calendar.
                            */
                            this.linkto         =   "";
                            
                            
                            /** 
                            *   @property {String}    linktolinktoformat
                            *   @description          Date format used to store the selected calendar date in text form in the chosen linkto field.
                            *                         Default = "yyyy/MM/dd".
                            *                         a text or hidden field. Changing the value of the linked to field is automatically
                            *                         reflected in the calendar.
                            */
                            this.linktoformat   =   "";
                            
                             /** 
                            *   @property {String}    height
                            *   @description          Calendar height. Overrides and style settings to set the height of the calendar.
                            */
                            this.height         =   "";
                            
                             /** 
                            *   @property {String}    width
                            *   @description          Calendar width. Overrides and style settings to set the width of the calendar.
                            */
                            this.width          =   "";
                            
                            
                            /** 
                            *   @property {Boolean}   visible
                            *   @description          Flag to indicate whether or not the calendar is currently visible. Overrides style="display:none;" rule on initial render.
                            *                         Default = true.
                            */
                            this.visible        =   1;
                            
                            /** 
                            *   @property {Boolean}   keys
                            *   @description          Enable selection of the date by arrow keys as long as the calendar is linked to a input field.
                            *                         Default = false.
                            */
                            this.keys           =   0;  //enable selection of the date by keys as long as the calendar is linked to a input field
                            
                            /** 
                            *   @property {Boolean}   scroll
                            *   @description          Enable the visible month to be changed by the scroll button on the mouse.
                            *                         Default = true.
                            */
                            this.scroll         =   1;  //enable the visible month to be changed by the scroll button on the mouse
                            
                            /** 
                            *   @property {String}    datemin
                            *   @description          Defines a minimum selectable date range. Default = no limit
                            *                         Default = "".
                            */
                            this.datemin        =   ""; //defines a minimum selectable date range - default = no limit
                            
                            /** 
                            *   @property {String}    datemin
                            *   @description          Defines a maximum selectable date range. Default = no limit
                            *                         Default = "".
                            */
                            this.datemax        =   ""; //defines a maximum selectable date range - default = no limit
                            
                            
                            //this.selectedweek   =   null;     //TBI
                            //this.selecteddays   =   [];       //TBI
                            
                            /** 
                            *   @property {String}    _idt
                            *   @description          Id of the table element that holds the calendar.
                            */
                            this._idt           =   ""; //table id
                            
                            /** 
                            *   @property {String}    _idh
                            *   @description          Id of the table header element inside the calendar.
                            */
                            this._idh           =   ""; //table header id
                            
                            /** 
                            *   @property {String}    _idb
                            *   @description          Id of the table body element inside the calendar.
                            */
                            this._idb           =   ""; //table body id
                            
                            /** 
                            *   @property {String}    _f
                            *   @description          Default format for serializing the date. Default = "yyyy/MM/dd".
                            */
                            this._f             =   "yyyy/MM/dd"; //default format for serializing the date
                            
                            
                            /** 
                            *   @property {Boolean}   _i
                            *   @description          Flag to indicate if the calendar has previously been reneders on the current page.
                            */
                            this._i             =   1;  //initial render flag
                        };


SS.control.calendar.prototype = 
{
	            /**
	            *   @function       SS.control.calendar.render
	            *   @description    Renders the calendar on the page.
	            *   @returns        null
	            */
    render  :   function()
                {
                    //t:    this
                    //pd:   parse date from string function
                    //fd:   format date function
                    //dd:   display days
                    //dm:   display months
                    //r:    row pointer
                    //i:    index pointer
                    //lc:   global locale
                    //tc:   this locale code
                    //k:    linkto element
                    //v:    linkto element value
                    //f:    t.linktoformat
                    //mx:   maximum date range
                    //mi:   mimimum date range
                    var t = this, l = $g(t.id), i, dd, dm, r, pd = SS.datetime.fromString, fd = SS.datetime.format,lc = SS.global.locale, k = $g(t.linkto), v, f = t.linktoformat, tc = t.localecode, mi, mx;
				       
			        if(l)
			        {
			            //set the calendar locale
			            if($lc(t.localecode) !== "")
				        {
				            lc = new SS.locale(tc);
				        }
				        
				        if(!f)
				        {
				            f = lc.dateformat;
				            t.linktoformat = f;
				        }
				        
				        //get minimum and maximum date ranges
				        mi = pd(t.datemin,f);
				        mx = pd(t.datemax,f);
				        
				        if(t._i && k)
                        {
                            v = k.value;
                            //first time the calendar has been drawn. check to see if it is linked to a field. if so, use this value
                            if($ise(v))
                            {
                                t.selecteddate = new Date();
                                t.visiblemonth = new Date();
                            }
                            else
                            {
                                t.selecteddate = pd(v,f);
                                t.visiblemonth = pd(v,f);
                            }
                            $sa($g(t.id),"date",fd(t.selecteddate,t._f));
                            
                            if(!k.onchange)
                            {
                                /**
							    *   @ignore
							    */
								k.onchange =   function(e)
                                                {
		                                            //l:    element
		                                            //s:    SS.datetime
		                                            //pd:   parse date function
		                                            //fd:   format date function
		                                            //f:    linkto format
		                                            //d:    date
		                                            //v:    l.value
		                                            var l = this, s = SS.datetime, pd = s.fromString, fd = s.format,f = t.linktoformat, d, v = l.value;
                                                    
                                                    if(v)
                                                    {
                                                        d = pd(v,f);
                                                        
                                                        if(!d)
                                                        {
                                                            //invalid date has been entered into the link to control.
                                                            //change it to todays date
                                                            d = new Date();
                                                        }
                                                        
                                                        t.selecteddate = d;
                                                        t.visiblemonth = new Date(d);   //use new date to create a seperated instance
                                                        
                                                        l.value = fd(t.selecteddate,f);
                                                    }
                                                    else
                                                    {
                                                        t.selecteddate = new Date();
                                                        t.visiblemonth = new Date();
                                                    }
                                                    $sa($g(t.id),"date",fd(t.selecteddate,t._f));
                                                   
		                                            $ef(t.onvisiblemonthchange,t,e);
		                                            $ef(t.onchange,t,e);
                                                    t.render();
                                                };
                                if(t.keys)
                                {
                                    /**
                                    *   @ignore
                                    */
                                    k.onkeydown =  function(e)
                                                    {
                                                        e = $e(e);
                                                        var c = $cc(e), d;
                                                        
                                                        if(c)
                                                        {
                                                            if(c == 13)
                                                            {
                                                                //enter
                                                                d = 0;
                                                                $ec(e);
                                                            }
                                                            if(c == 37)
                                                            {
                                                                //left
                                                                d = -1;
                                                            }
                                                            if(c == 38)
                                                            {
                                                                //up
                                                                d = -7;
                                                            }
                                                            if(c == 39)
                                                            {
                                                                //right
                                                                d = 1;
                                                            }
                                                            if(c == 40)
                                                            {
                                                                //down
                                                                d = 7;
                                                            }
                                                            if($isd(d))
                                                            {
                                                                t.dayChange(d);
                                                            }
                                                        }
                                                    
                                                    };
                                }
                            }
                        }
				        
				        //c:    container (table)
				        //th:   table head
				        //tb:   table body
				        //sl:   sundaylast flag (this needs to be a number as it is used to shift the day range)				        
				        //df:   day format
				        //mf:   month format
				        var c = $g(t._idt) || $c("table"), th = $g(t._idh) || $c("thead"),tb = $g(t._idb) || $c("tbody"), sl = $psb(t.sundaylast) ? 1 : 0, df = t.dayformat, mf = t.monthformat;

				        $cl(c,t.css);
				        c.cellPadding = 0;
				        c.cellSpacing = 0;
				        if(t.height)
				        {
				            $h(l,t.height);
				        }
				        if(t.width)
				        {
				            $w(l,t.width);
				        }
				        
				        dd = lc.days;
				        if(df == "1")
				        {
				            dd = lc.days_letter;
				        }
				        if(df == "2")
				        {
				            dd = lc.days_abrv2;
				        }
				        if(df == "3")
				        {
				            dd = lc.days_abrv3;
				        }
				        dd = dd.copy(); //dd references the days held in the locale variable.
				                        //take a copy of the array to break the reference
				        
				        dm = lc.months;                	
				        if(mf == "1")
				        {
				            dm = lc.months_letter;
				        }
				        if(mf == "2")
				        {
				            dm = lc.months_abrv2;
				        }
				        if(mf == "3")
				        {
				            dm = lc.months_abrv3;
				        }
				        dm = dm.copy();
				        
				        //month/year row
				        //h1:   first header row
				        //h2:   second header row
				        //h1c1: navigate left
				        //h1c2: title
				        //h1c3: navigate right
				        //nb:   navigate backwards
				        //nf:   navigate forwards
				        //cl:   header row day name columns
				        var sc = t.selecteddate,vc = t.visiblemonth, h1 = $cn(th)[0] || $c("tr"), h2 = $cn(th)[1] || $c("tr"), h1c1 = $cn(h1)[0] || $c("th"), h1c2 = $cn(h1)[1] || $c("th"), h1c3 = $cn(h1)[2] || $c("th"), nb = $c(), nf = $c(), cl;
				        if(!sc)
				        {
				            sc = new Date();
				        }
				        if(!vc)
				        {
				            vc = new Date();
				        }
				        if($iss(sc))
				        {
				            sc = pd(sc);
				            t.selecteddate = sc;
				        }
				        if($iss(vc))
				        {
				            vc = pd(vc);
				            t.visiblemonth = vc;
				        }
				        				        			        
			            if(sl)
			            {				        
			                //move Sunday from the front of the array to the back as sundaylast flag if true
			                dd.push(dd[0]);   //copy sunday to the end
			                dd.shift();
			            }
			            
				        //header rows day names
				        for(i = 0; i < 7 /*$ln(dd) should always == 7*/; i++)
				        {
				            cl = $cn(h2)[i] || $c("td");
				            
				            cl.innerHTML = dd[i];
				            if(t._i)
				            {
				                $ac(h2,cl);
				            }
				        }
				        
				        if(t._i)
				        {
				            //t._ial draw
				            t._idt = c.id;
				            t._idh = th.id;
				            t._idb = tb.id;
				        
				            $ac(nb,$ctn("<<"));
				            /**
				            *   @ignore
				            */
			                h1c1.onclick =  function(e)
			                                {
			                                    t.visiblemonthchange.call(t,-1); 
			                                    return $ec(e);
			                                };
				            $ac(nf,$ctn(">>"));
				            /**
				            *   @ignore
				            */
			                h1c3.onclick =  function(e)
			                                {
			                                    t.visiblemonthchange.call(t,1);
			                                    return $ec(e);
			                                };
				                            
				            h1c2.colSpan = 5;
				            
				            $cl(nb,t.css_navigate);
				            $cl(h1c2,t.css_title);
				            $cl(nf,t.css_navigate);
				            $cl(h2,t.css_titledays);
				            
				            $ac(h1c1,nb);
				            $ac(h1c3,nf);
				            
				            $ac(h1,h1c1);
				            $ac(h1,h1c2);
				            $ac(h1,h1c3);
				        				            
				            $ac(th,h1);
				            $ac(th,h2);
				            $ac(c,th);
				                				        
				        }
				        h1c2.innerHTML = fd(vc,"MMMM yyyy",lc);
				    	
			            
				        //sy:   selected year
				        //sm:   selected month
				        //sd:   selected day
				        //vy:   visible year
				        //vm:   visible month
				        //w:    table row - week
				        var sy = sc.getFullYear(),
				            sm = sc.getMonth(),
				            sd = sc.getDate(),
				            vy = vc.getFullYear(),
				            vm = vc.getMonth(), w;
				        
				        
				        //6 table rows!
				        var sp = 0 /*7 - $ln(dd)*/, sv, z = 1,
				            s = new Date(vy, vm,-1 * new Date(vy, vm,1).getDay() + sl); //start date
				       
				        if($psb(t.sevenweek))
				        {
				            sv = 7;
				            s = s.add(-7,"d");
				        }
				        else
				        {
				            sv = 6;
				        }
                        
                        var uoc =   function(e)
	                                {
	                                    t.setDate(SS.datetime.fromString($ga(this,"date")),e);
	                                };	
	                                
				        for(r = 0; r < sv; r++)
				        {
				            w = $cn(tb)[r] || $c("tr");
				            for(i = 0; i < 7; i++)
				            {
				                s = s.add(1,"d");
				                
				                if(z && (s.getDate() == 1 || s.getDate() == 2))
				                {
				                    s = s.add(-7,"d");
				                }
				                z = 0;
				                
				                //u:    day cell
				                //cn:   class name to apply to day cell
				                var py = s.getFullYear(), pm = s.getMonth(), pdt = s.getDate(), u = $cn(w)[i] || $c("td"), cn = t.css_daysmonth;
				                
				                
				                if(pm < vm)
				                {
				                    cn += " " + t.css_daysmonthlast;
				                }
				                if(pm > vm)
				                {
				                    cn += " " + t.css_daysmonthnext;
				                }
				                
				                if(py == sy && pm == sm && pdt == sd)
				                {
				                    //current selected date
				                    cn += " " + t.css_selecteddate;
				                }
				                else if((i > 4 && sl) || (!sl && (i === 0 || i == 6)))				                
			                    {
			                        //weekend styling
			                        cn += " " + t.css_weekend;
			                    }
			                    
				                u.innerHTML = fd(s,"dd");
			                    u.onclick = uoc;
				                
			                    if((mi && s < mi) || (mx && s > mx))
			                    {
			                        //minimum and / or maximum date range specified. and date is out of range. use the disabled style
			                        cn += " " + t.css_disabled;
			                        u.onclick = "";
			                    }
				                $sa(u,"date",fd(s,t._f));
				                $cl(u,cn);
				                    
			                    if(t._i)
			                    {		                
				                    $ac(w,u);
			                    }		
				            }
				            if(t._i)
				            {
				                $ac(tb,w);
				            }
				        }
				        $ac(c,tb);   				        
				        $ac(l,c);
				        
				        if($psb(t.scroll) && t._i)
				        {
				            //enable changing of the visible month by the mouse scroll
				            $ea("onmousewheel", function(e)
                                                {
                                                    //p:    position of the calendar
                                                    //x:    mouse co-ordinate X
                                                    //y:    mouse co-ordinate Y
                                                    var p = $xyz($g(t.id)), x = e.dX, y = e.dY;
                                                    //if mouse scroll event occurred inside the control, update
                                                    if(x >= p.x && x <= (p.x + p.w) && y >= p.y && y < (p.y + p.h))
                                                    {
                                                        //the mouse pointer is inside the calendar area
                                                        t.visiblemonthchange.call(t,e.delta,e);
                                                        $ec(e);
                                                        return false;
                                                    }
                                                });
				        }
				        
				        $v(l,t.visible);
				        t._i = 0;
				        
				    }
				    
                },
                /**
                *   @function       SS.control.calendar.visiblemonthchange
                *   @description    Changes the visible month by d months
                *   @param {Integer} d Number of months to change the visible month by
                *   @param {Event}  e
                *   @returns null
                */
visiblemonthchange:function(d,e)
                {
                    var t = this;
                    t.visiblemonth = t.visiblemonth.add(d,"mo");
                    t.render();
			        $ef(t.onvisiblemonthchange,t,e);
                },
                /**
                *   @function       SS.control.calendar.dayChange
                *   @description    Changes the selected date by d days
                *   @param {Integer} d Changes the selected date by d days.
                *   @returns null
                */
    dayChange:  function(d)
                {
                    this.setDate(this.selecteddate.add(d,"d"));
                },
                /**
                *   @function       SS.control.calendar.setDate
                *   @description    Sets the selected date and changes the visible month to reflect it.
                *   @param {Date} d Date to set as the selected date.
                *   @param {Event} e
                */
    setDate :   function(d,e)
                {
                    //t:    this
                    //df:   date format function
                    //k:    linkto element
                    var t = this, df = SS.datetime.format, k = $g(t.linkto);
                    if(d)
                    {
                        t.selecteddate = d;
                        t.visiblemonth = new Date(d);    //new to create a new instance of the date to prevent reference linking
                    }
                    else
                    {
                        t.selecteddate = new Date();
                        t.visiblemonth = new Date();
                    }
                    $sa($g(t.id),"date",df(t.selecteddate,t._f));
                    
                    if(k)
                    {
                        k.value = df(d,t.linktoformat);
                        try
                        {
                            $ef(k.onchange,k,e);
                        }
                        catch(x){/*ASP.NET 1.1 Validator Routine Throws an error when date selected. Hack to suppress JavaScript error*/}
                    }
                    else
                    {
                        t.render();
                    }
			        $ef(t.onvisiblemonthchange,t,e);
			        $ef(t.onchange,t,e);
                },
                /**
                *   @function   SS.control.calendar.setLocaleCode
                *   @param {String} ul  Locale code. 2 character country code which determins the
                *                       date format used. See ISO 3166-1 alpha-2.
                */
  setLocaleCode:function(ul)
                {
                     //set the calendar locale
                     
                    //t:    this
                    //l:    element
                    //c:    locale code
                    //f:    locale date format                    
                    var t = this, l, f, c;
			        if(!$ise(ul))
			        {
			            l = $g(t.id);
			            
			            t.localecode = ul;
                        $sa(l,"localecode",ul);
                        
			            c = new SS.locale(ul);
			            f = c.dateformat;
                        t.linktoformat = f;
                        $sa(l,"linktoformat",f);
			        }
			        
                    t.render();
                },
                /**
                *   @function           SS.control.calendar.display
                *   @description        Change the visibilty of the calendar.
                *   @param {Boolean} d  Display flag. True = Visible, False = Hidden.
                *   @returns            null
                */
    display :   function(d)
                {
                    this.visible = d;
                    this.render();
                },
                /**
                *   @function           SS.control.calendar.show
                *   @description        Displays the calendar. See {@link SS.control.calendar.display}.
                *   @returns            null
                */
    show    :   function()
                {
                    this.display(1);
                },
                /**
                *   @function           SS.control.calendar.hide
                *   @description        Hides the calendar. See {@link SS.control.calendar.display}.
                *   @returns            null
                */
    hide    :   function()
                {
                    this.display(0);
                }
};