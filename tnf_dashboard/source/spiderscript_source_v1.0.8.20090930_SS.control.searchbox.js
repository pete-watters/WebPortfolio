/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.searchbox.js				
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
*   File Name:      SS.control.searchbox.js
*   Description:    Dynamic search box control
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.locale.js
*   SS.control.js
*   SS.geom.js
*   SS.net.js
*   SS.addon.js
*/

/**
*   @class          SS.control.searchbox    Dynamic search box control
*   @constructor
*/
SS.control.searchbox    =   function()
                            {
                                var p = "SS_control_searchbox_"; //classname prefix
                                
                                /**
                                *   @property id 
                                *   @description Identifier of the searchbox control.
                                */
                                this.id             =   "";
                                
                                /**
                                *   @property idtb 
                                *   @description Identifier of the textbox input element.
                                */
                                this.idtb           =   "";
                                
                                /**
                                *   @property {String}      css 
                                *   @description            Style sheet class applied to the search box.
                                *                           Default = ""
                                */
                                this.css            =   "";
                                
                                /**
                                *   @property {String}      css_list 
                                *   @description            Style sheet class applied to the list of search results.
                                *                           Default = "SS_control_searchbox_list"
                                */
                                this.css_list       =   p + "list";
                                
                                /**
                                *   @property {String}      css_match 
                                *   @description            Style sheet class applied to the characters in the list of search results
                                *                           where they match the input string. Default = "SS_control_searchbox_match".
                                */
                                this.css_match      =   p + "match";
                                
                                /**
                                *   @property {String}      css_highlight 
                                *   @description            Style sheet class applied to the list of search results where it has
                                *                           been highlighted using the arrow keys. Default = "SS_control_searchbox_highlight".
                                */
                                this.css_highlight  =   p + "highlight";
                                
                                /**
                                *   @property {String}      css_listitem 
                                *   @description            Style sheet class applied to each result returned in the results list.
                                *                           Default = "SS_control_searchbox_listitem".
                                */
                                this.css_listitem   =   p + "listitem";
                                
                                /**
                                *   @property {String}      datasource 
                                *   @description            URL pointing to and XML or plain text list of data to search. This URL is called with the
                                *                           a querystring parameter, as defined by {@link srcparam}, which contains the text entered.
                                *                           "SS_control_searchbox_listitem".
                                */
                                this.datasource     =   "";
                                
                                /**
                                *   @property {String}      src 
                                *   @description            Pseudonym for {@link datasource}. Use either {@link src} or {@link datasource} but not both.
                                */
                                this.src            =   "";
                                
                                /**
                                *   @property {String}      srcparam 
                                *   @description            Name of the parameter which is attached to the URL containing the phrase entered in to the search box
                                *                           input control. Set as blank to disable this feature. Default = "v".
                                */
                                this.srcparam       =   "v";
                                
                                /**
                                *   @property {Boolean}     postvalue 
                                *   @description            if datasource is a URL, then the value of the textbox is posted to the destination if set to true.
                                *                           Default = false.
                                */
                                this.postvalue      =   0;
                                
                                /**
                                *   @property {Boolean}     cache 
                                *   @description            set to true or false, yes or no to prevent an xml datasource from caching in the browser.
                                *                           Default = true.
                                */
                                this.cache          =   1;
                                
                                /**
                                *   @property {Boolean}     cacheresults 
                                *   @description            //false - always query the datasource for each search.
                                *                           //true - after first result set is returned, search within that result set for data.
                                *                           Default = true.
                                */
                                this.cacheresults   =   1;
                                
                                /**
                                *   @property {Array}       data 
                                *   @description            Array of objects from datasource: {text:value}
                                *   @private
                                */
                                this.data           =   [];
                                
                                /**
                                *   @property {String}      demlimiter
                                *   @description            Delimiter to use when dealing with a text data source.
                                *                           Default = "\n" (new line).
                                *   @private
                                */
                                this.demlimiter     =   "\n";   //default delimiter when using a text list is a newline break
                                
                                
                                /**
                                *   @property {String}      value
                                *   @description            Holds the value of the selected item from the results list.
                                *   @private
                                */
                                this.value          =   "";
                                
                                /**
                                *   @property {Integer}     delay
                                *   @description            Number of milliseconds to wait from the last key stroke before doing the search.
                                *                           Default = 350.
                                *   @private
                                */
                                this.delay          =   350;
                                
                                /**
                                *   @property {Integer}     matchmode
                                *   @description            Defines how results are matched.
                                *                           0: text only, 1: value only, 2:text and value, 3:match all
                                *                           Default = 0.
                                */
                                this.matchmode      =   0;
                                
                                /**
                                *   @property {Boolean}     casesensitive
                                *   @description            Flag to perform case sensitive matching.
                                *                           Default = false.
                                */
                                this.casesensitive  =   0;      //0: case insensitive, 1: case sensitive
                                
                                /**
                                *   @property {Integer}     minchars
                                *   @description            Minimum number of characters needed before the search is performed.
                                *                           Default = 3.
                                */
                                this.minchars       =   3;
                                
                                /**
                                *   @property {String}      selectedvalue
                                *   @description            Value of the selected item from the list. This is cleared if doing a search.
                                */
                                this.selectedvalue  =   null;
                                
                                /**
                                *   @property {String}      selectedtext
                                *   @description            Text of the selected item from the list. This is cleared if doing a search.
                                */
                                this.selectedtext   =   null;
                                
                                /**
                                *   @property {Integer}     selectedindex
                                *   @description            Index of the item selecetd (using arrow keys) in the returned search results list.
                                *                           Default = -1.
                                */
                                this.selectedindex  =   -1;
                                
                                /**
                                *   @property {Integer}     maxresults
                                *   @description            Maximum number of results to display at one time.
                                *                           Default = 25.
                                */
                                this.maxresults     =   25;
                                
                                /**
                                *   @property {Integer}     visibleitems
                                *   @description            Maximum number of visible items to display in the search results list.
                                *                           After the number has been exceeded, a scroll bar is used to all users
                                *                           to scroll through the rest of the search results.
                                *                           Default = 6.
                                */
                                this.visibleitems   =   6;
                                
                                /** 
                                *   @property {String}      linkto
                                *   @description            Id of element that will hold the value of the selected result rather than displaying the
                                *                           selected value in the search field.
                                */
                                this.linkto         =   "";     //if specified,  is stored here rather than in the search field
                                
                                /** 
                                *   @property {Function}    onchange
                                *   @description            Function called or evaluated {String} whenever an item has been selected.
                                */
                                this.onchange       =   null;
                                
                                /** 
                                *   @property {Function}    onresults
                                *   @description            Function called or evaluated {String} whenever the results list has been altered.
                                */
                                this.onresults      =   null;
                                
                                /** 
                                *   @property {Function}    onlistshow
                                *   @description            Function called or evaluated {String} whenever the results list is displayed.
                                */
                                this.onlistshow     =  null;
                                
                                /** 
                                *   @property {Function}    onlisthide
                                *   @description            Function called or evaluated {String} whenever the results list is hidden.
                                */
                                this.onlisthide     =  null;
                                
                                /** 
                                *   @property {String}      xpath_nodes
                                *   @description            Defines the path to the list of nodes.
                                *                           Default = "list".
                                */
                                this.xpath_nodes	 =	"list";
                                
                                /** 
                                *   @property {String}      xnode_name
                                *   @description            XML node name.
                                *                           Default = "item".
                                */
                                this.xnode_name     =	"item";
                                
                                /** 
                                *   @property {String}      xnode_title
                                *   @description            XML title.
                                *                           Default = "text".
                                */
                                this.xnode_title	 =	"text";
                                
                                /** 
                                *   @property {String}      xnode_value
                                *   @description            XML value.
                                *                           Default = "value".
                                */
                                this.xnode_value	 =	"value";
                                
                                /** 
                                *   @property {Boolean}     _k
                                *   @description            Keypress lock indicator. if set, keypress event should be ignored.
                                *   @private
                                */
                                this._k             =   0;
                                
                                /** 
                                *   @property {Array}       _o
                                *   @description            Array containing matching elements from the data object.
                                *   @private
                                */
                                this._o             =   null;
                                
                                /** 
                                *   @property {Integer}     _tid
                                *   @description            Delay timer id.
                                *   @private
                                */
                                this._tid           =   0;
                                
                            };

SS.control.searchbox.prototype =
{
                /**
	            *   @function       SS.control.searchbox.render
	            *   @description    Renders the searchbox on the page.
	            *   @returns        null
	            */
    render	:	function()
				{
				    //t:    this
				    //l:    element
				    //tb:   textbox;
				    //hd:   holder
		            //ap:   attach point
		            //nd:   new div
		            //n:    node list
		            //s:	nextSibling
				    var t = this, l = $g(t.id),tb, hd = $c(), ap, nd = $c(), n, s;
				    
			        if(l)
			        {
			            $dc(l); //if element has already been drawn, clear all children to allow for the element to be redrawn
			            
				        //draw the object
				        if(l.nodeName == "INPUT" || l.tagName == "TEXTAREA")
				        {
				            //move the textbox into a div
				            ap = l.parentNode;      //attach point
				            
				            tb = l;                 //textbox
				            $cl(tb,t.css);          //set style
				            s = tb.nextSibling;
				            $rc(ap,tb);             //remove textbox from DOM
				            $ac(nd,tb);             //attach to new div
				            
				            ap.insertBefore(nd,s);
				            
				            t.idtb = tb.id;
				            t.id = nd.id;
				            l = nd;
				            tb.onchange = null;
				        }
				        else
				        {
				            l.onchange = null;
				            tb = $c("input",t.css);
				            tb.type = "text";
				            t.idtb = t.id + "_t";
				            tb.id = t.idtb;
				        }
				        $sa(tb,"autocomplete","off");
                        /**
                        *   @ignore
                        */
				        tb.onkeydown=   function(e)
				                        {
				                            //capture non-text codes such as arrow and tab keys
			                                var c = $cc(e);
			                                if(c == 8 || c == 9 || c == 13 || c == 38 || c == 40)
			                                {
			                                    //IE and Safari do not capture backspace characters on the onkeypress event.
			                                    //use this to fire the onkeypress event. It doesn't matter if onkeypress
			                                    //is called more than once
			                                    if(c > 9)
			                                    {
			                                        //ignore the keypress event which should fire almost immediately, except allow backspace and tab
			                                        t._k = $st(function(){t._k = 0;},9);
			                                    }
			                                    return tb.onkeypress.call(this,e,1);
			                                }
				                        };
                        /**
                        *   @ignore
                        */
				        tb.onkeypress = function(e,o)
				                        {
				                            //e:    event
				                            //o:    onkeypress override (for arrow keys etc)
				                            
				                            if(!t._k || o)
				                            {
				                                t.selectedvalue = null;
				                                t.selectedtext = null;
    				                            
				                                //c:    key code
				                                //v:    value
				                                //p:    post vale
				                                //s:    datasource / src
				                                //l:    length of v
				                                var v = t.value, c = $cc(e), p = null, s = t.datasource || t.src, l = $ln(v), tb = $g(t.idtb);
    				                            
				                                if(c == 8 && l)
				                                {
				                                    //backspace
				                                    t._tid = $st(    function()
				                                                    {
				                                                        var tb = $g(t.idtb);
				                                                        t.value = tb.value;
				                                                        if($ln(t.value) >= t.minchars)
				                                                        {
				                                                            t.search.call(t);
				                                                        }
				                                                    },t.delay);
				                                }
				                                else if(c >= 37 && c <= 40)
				                                {
				                                    //arrow keys
				                                    if(c == 38)
				                                    {
				                                        //UP
				                                        t.selectedindex--;
				                                    }
				                                    else if(c == 40)
				                                    {
				                                        //DOWN
				                                        t.selectedindex++;
				                                    }
				                                }
				                                else if(c == 9)
				                                {
				                                    //tab
				                                }
				                                else if(c == 13)
				                                {
				                                    //enter
				                                    $ct(t._tid);
				                                    $ec(e);
				                                }			                            
				                                else
				                                {
				                                    v = tb.value + String.fromCharCode(c);
				                                    t.value = v;
				                                    //clear timeout id if it exists. this means the search will not take place until the time in t.delay has passed since the last key stroke
                                                    $ct(t._tid);
				                                }
                                                
                                                
                                                if($ln(v) >= t.minchars)
                                                {
                                                    if(c == 38 || c == 40 || c == 9 || c == 13)
                                                    {
				                                        //38 - UP, 40 - Down, 9 = Tab, 13 - Enter
                                                        return t.search.call(t,c,e);
                                                    }
                                                    else if($iss(s))
                                                    {
                                                        //url specified, call this to load data
                                                        if(t.postvalue)
                                                        {
                                                            p = {};
                                                            p[t.idtb] = t.value;
                                                        }
                                                        else
                                                        {
                                                           s = $upa(s,t.srcparam,$esc(t.value));
                                                        }
                                                        t._tid = $st(function(){$load(s,p,function(){t.dataload.call(t,this.req);},function(){$error("error");},function(){$error("timeout");},this.timeout,!t.cache);},t.delay);
                                                    }
                                                    else
                                                    {
                                                        //set timer
                                                        t._tid = $st(function(){t.search.call(t);},t.delay);
                                                    }
                                                }
                                                else
                                                {
                                                    t.clear();
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $ec(e);
                                                return false;
                                            }
				                        };
				        
				        
				        if(!$ise(t.linkto))
				        {
                            /**
                            *   @ignore
                            */
				            tb.onblur = function()
				                        {
				                            //m:    matched - default = 0
				                            //v:    textbox value
				                            //i:    index pointer
				                            //k:    key
				                            //d:    data item
				                            var v = this.value, i, m, k, d, l = $g(t.linkto);
				                            
	                                        if(l && t._o && $isa(t._o) && $ln(v) > 0)
	                                        {
	                                            for(i = 0; i < t._o.length; i++)
	                                            {
	                                                d = t._o[i];
	                                                
	                                                if(d && $iso(d))
	                                                {
	                                                    for(k in d)
	                                                    {
	                                                        if(!$isf(d[k]))
	                                                        {
	                                                            //kl:   key lowercase
	                                                            //dl:   data list item
	                                                            //mm:   match mode
	                                                            var kl = k, dl = d[k], mm = t.matchmode;
                            	                                	                                
	                                                            if(!t.casesensitive)
	                                                            {
	                                                                v = $lc(v);
	                                                                kl = $lc(k);
	                                                                dl = $lc(dl);
	                                                            }
                            	                                
	                                                            //mm == 0   match on text
	                                                            //mm == 1   match on value
	                                                            //mm == 2   match on both
	                                                            //mm == 3   match always
                            	                                
	                                                            if((kl == v && mm != 1) || (dl == v && mm !== 0) || mm == 3)
	                                                            {
	                                                                //matched
	                                                                m = 1;
	                                                                l.value = dl;
	                                                            }
                        	                                }
	                                                    }
	                                                }
	                                            }
	                                            if(!m)
	                                            {
	                                                //clear the linked value
	                                                l.value = "";
	                                            }
	                                        }
	                                        else if(l)
	                                        {
	                                            l.value = "";
	                                        }

				                        };
				        }
				        
				        $ac(hd,tb);
				        $ac(l,hd);
				        $ea("onclick",function(){t.clear();});
                    }
                    
				},
                /**
	            *   @function                       SS.control.searchbox.dataload
	            *   @description                    Handles the loading of data from the defined datasource.
	            *   @param {SS.net.requestor}  dl   Data Loader object containing the results of the search request.
	            *   @returns                        null
	            */
	dataload:   function(dl)
	            {
	                //t:    this
	                //i:    index pointer
	                //o:    data list item object
                    
                    //x:    xml object
                    //w:    rows / lines
	                //p:	xpath nodes
                    //pn:	xnode name;
                    //pt:	xnode title;
                    //pv:	xnode value;
	                //x:    XML document as a JavaScript object
	                //a:    temporary variable
	                
	                var t = this, i, o, w, p = t.xpath_nodes, pn = t.xnode_name, pt = t.xnode_title, pv = t.xnode_value, x, a;
	                t.data = [];
	                t.selectedindex = -1;
	                
	                if(dl)
	                {
	                    if(dl.getResponseHeader("content-type").match(/text\/xml/i))
	                    {
	                        x = $x2o(dl.responseXML);
	                        
	                        if(x && !$ise(p) && (!($ise(pn) && $ise(pt) && $ise(pv))))
                            {
								p = p.split(/\.|\\/);
								p.add(t.xnode_name);
								w = x;
								for(i = 0; w && i < p.length; i++)
								{
									w = w[p[i]];
								}
								
								w = $ta(w);	//xml path to list of nodes
								if(w)
								{
								    
									for(i = 0; i < $ln(w); i++)
									{
									    a = w[i];
										if(a)
										{
										    o = {};
    										
                                            if($isd(a[pt]) && $isd(a[pv]))
                                            {
                                                o[a[pt]] = a[pv]; //name : value
                                            }
                                            
                                            t.data.add(o);
                                        }
										
									}
								}
	                            t.search();
								
                            }
	                        
	                    }
	                    else if(dl.responseText)
	                    {
	                        li = dl.responseText.split(/\n/);
	                        
	                        if($ln(li))
	                        {
	                            for(i = 0; i < $ln(li); i++)
	                            {
	                                o = {};
	                                o[li[i]] = li[i];
	                                t.data.add(o);
	                            }
	                            t.search();
	                        }
	                    }
	                }
	            },
                /**
	            *   @function             SS.control.searchbox.search
	            *   @description          Searches through the returned data to find matching items based
	            *                         on the users input query.
	            *   @param {Integer}  c   Character Code. Code of the last character that was entered.
	            *   @param {Event}    e   Event triggered by the entering of a character.
	            *   @returns              null
	            */
	search  :   function(c,e)
	            {
	                //t:    this
	                //v:    value
	                //i:    pointer
	                //k:    key
	                //d:    data
	                var t = this, v = t.value, i, k , d;
	                
	                if(c == 38 || c == 40)
	                {
	                    //up / down key pressed
	                    //no need to search through the data as user is moving up / down options
	                }
	                else
	                {
	                    $ct(t._tid);     //clear Timeout
	                    t._tid = null;
	                    t._o = [];
	                    if(t.data && $isa(t.data) && $ln(v))
	                    {
	                        for(i = 0; i < t.data.length; i++)
	                        {
	                            d = t.data[i];
	                            if(d && $iso(d))
	                            {
	                                for(k in d)
	                                {
	                                    if(!$isf(d[k]))
	                                    {
	                                        //kl:   key lowercase
	                                        //dl:   data list item
	                                        //mm:   match mode
	                                        var kl = k, dl = d[k], mm = t.matchmode;
        	                                	                                
	                                        if(!t.casesensitive)
	                                        {
	                                            v = $lc(v);
	                                            kl = $lc(k);
	                                            dl = $lc(dl);
	                                        }
        	                                
	                                        //mm == 0   match on text
	                                        //mm == 1   match on value
	                                        //mm == 2   match on both
        	                                //mm == 3   match always
	                                        if((kl.indexOf(v) >= 0 && mm != 1) || (dl.indexOf(v) >= 0 && mm !== 0) || mm == 3)
	                                        {
	                                            t._o.add(d);
	                                        }
	                                    }
	                                }
	                            }
	                        }
	                    }
	                }
	                
	                if($isa(t._o))
	                {
	                    return t.output(c,e);    
	                }
	                
	            },
                /**
	            *   @function             SS.control.searchbox.output
	            *   @description          Displays the filtered list of search results to the screen.
	            *   @param {Integer}  c   Character Code. Code of the last character that was entered.
	            *   @param {Event}    e   Event triggered by the entering of a character.
	            *   @returns {Boolean}    Flag to indicate if any results were displayed.
	            */
	output  :   function(c,e)
	            {
	                //t:    this
	                //pn:   container element
	                //lid:  list id
	                //l:    list id element
	                //tb:   textbox
	                //i:    index poitner
	                //n:    number of data items
	                //vi:   visible items
	                //mr:   maximum results
	                //r:    return
	                //o:    output data (._o)
	                //k:    key
	                var t = this, pn = $g(t.id),lid = t.id + "_l",l = $g(lid),tb = $g(t.idtb), i ,n, vi = t.visibleitems, mr = t.maxresults, r = 0, o = t._o, k;
	                
	                if(pn)
	                {	 
                        if(l)
                        {
                           $d(l);
                        }
                        
                        l = $c();
                        l.id = lid;
                        l.style.overflow = "hidden";
                        $ac(pn,l);
                        
	                    i = t.selectedindex;                  
	                    if(!o || ($ln(o) <= 0))
	                    {
	                        //hide the list of options as no matches were found
	                        $v(l,0);
	                    }
	                    else if(l && l.appendChild)
	                    {   
	                        n = t._o.length;
	                        
	                        if(i >= n || (mr && i >= mr))
	                        {
	                            i = n - 1;
	                        }
	                        else if(i < -1)
	                        {
	                            i = -1;
	                        }
	                        else if(c == 9 || c == 13)
	                        {
	                            //tab or enter - select item from the list
	                            
	                            if(n == 1)
	                            {
	                                i = 0;
	                            }
	                            
                                $ct(t._tid);
                                                                
	                            for(k in t._o[i])
	                            {
	                                if(!$isf(t._o[i][k]))
	                                {
                                        t.selectedtext = k;
                                        t.selectedvalue = o[i][k];
                                        
	                                    $g(t.idtb).value = k;
	                                    if(t.linkto)
	                                    {
	                                        var vf = $g(t.linkto);
	                                        if(vf)
	                                        {
	                                            vf.value = o[i][k];   
	                                        }
	                                    }
	                                }
	                            }
    	                        $ef(t.onchange,$g(t.idtb),e);
    	                        t.data = null;//clear data because item has been selected
	                            
	                        }
	                        else
	                        {
	                            //ic:   
	                            //eh:   
	                            //ph:   
	                            //p:    pointer
	                            //d:    dimensions of the textbox
	                            var ic = 0, eh, ph, p, d = $xyz(tb);
	                            $cl(l,t.css_list);
	                            
	                            $w(l,d.w);               //set the width of the list to be the same as the width of the input control
	                            $t(l,d.y + d.h);
	                            $l(l,d.x);
	                            $rp(l);
	                            $ac(document.body,l);
    	                       
    	                        var ltoc =  function(e)
                                            {
                                                $ct(t._tid);
                                                //x:    data text
                                                //v:    data value
                                                //tb:   textbox
                                                //vf:   value field
                                                
                                                var x = $ga(this,"dt"), v = $ga(this,"dv"), tb = $g(t.idtb), vf;
                                                
                                                t.selectedtext = x;
                                                t.selectedvalue = v;
                                                tb.value = x;
                                                t.value = x;
                                                tb.focus();
                                                t.clear();
                                                
                                                if(t.linkto)
                                                {
                                                    vf = $g(t.linkto);
                                                    if(vf)
                                                    {
                                                        vf.value = v;   
                                                    }
                                                }
                                                
                                                $ef(t.onchange,$g(t.idtb),e);
                                                
                                            };
                                var ltomf = function()
                                            {
                                                this.className += " SS_control_searchbox_highlight";
                                            };
                                var ltomb = function()
                                            {
                                                this.className = this.className.replace(/(\s+)SS_control_searchbox_highlight/,"");
                                            };
	                            for(p = 0; p < n && p < t.maxresults; p++)
	                            {
	                                var lt = $c();
	                                for(k in t._o[p])
	                                {
	                                    if(!$isf(t._o[p][k]))
	                                    {
	                                        var rx = new RegExp(t.value,"i"), rr = new RegExp(t.value,"gi");
	                                        lt.innerHTML = k.replace(rr,"<span class='" + t.css_match + "'>" + k.match(rx) + "</span>");
	                                        $sa(lt,"dt",k);
	                                        $sa(lt,"dv",t._o[p][k]);
	                                        lt.onclick = ltoc;
	                                    }
	                                }
    	                            
	                                if(p == i)
	                                {
	                                    $cl(lt,t.css_highlight);
	                                }
	                                else{
	                                    $cl(lt,t.css_listitem);
	                                }
    	                            
	                                ic++;
	                                if(ic > vi && !eh)
	                                {
	                                    eh = $h(l);
	                                    $h(l,eh);
	                                    l.style.overflow = "auto";
	                                    ph = $rnd(eh / vi);//height per list item element
	                                }
	                                
	                                lt.onmouseover = ltomf;
	                                lt.onmouseout = ltomb;
	                                
	                                $ac(l,lt);
	                            }
	                            $v(l,1); //show the searchbox
	                            $ef(t.onlistshow,$g(t.idtb),e);
                                
                                //set the list scroll position
                                if(ph && (i * ph >= eh))
                                {
                                    l.scrollTop = i * ph;                                    
                                }
    	                    }                       
	                    }
	                    t.selectedindex = i;
	                    
	                    //call the onresults function if one has been specified
	                    $ef(t.onresults,t,e);
	                }
	                	                
	                if(c == 9)
	                {
	                    r = 1;
	                }
	                else if(c == 13 && !r)
	                {
	                    r = 1;
	                    /*
	                    if(!o || ($ln(o) <= 0))
	                    {
	                        return true;
	                    }
	                    else
	                    {
	                        return true;
	                    }
	                    */
	                }
	                return $psb(r);
	            },
                /**
	            *   @function           SS.control.searchbox.clear
	            *   @description        Clear the results list.
	            *   @returns            null
	            */
    clear   :   function()
                {
	                $d($g(this.id + "_l"));
                    $ef(this.onlisthide,$g(this.idtb),null);       
                },
                /**
	            *   @function           SS.control.searchbox.set
	            *   @description        Set an attribute of the searchbox control
	            *   @param {String} a   Name of the attribute
	            *   @param {String} v   Value of the attribute
	            *   @since              v1.0.7.20090731
	            *   @returns            null
	            */
    set     :   function(a,v)
                {   
                    if(a && !a.match(/^\_/) && $isd(this[a]))
                    {
                       this[a] = v;
                       $sa($g(this.id),a,v);
                    }
                }
};
