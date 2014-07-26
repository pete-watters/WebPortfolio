/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.init.js				
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



/***************************************************************************************
    Library Initialisation
    -----------------------
****************************************************************************************/

    
                /**
                *   @function                       SS._bc
                *	@description                    Builds the specified control
                *   @param {HTMLElement} l          Element to attach the control to (l)
                *   @param {SS.control.Object} c    Instantiated control class(c)
                *   @param {String} tn              Tag Name of the element (optional).
                *   @param {Boolean} ft             First time. Flag to indicate that this has been called as part of the
                *                                   initial loading process. (Optional).
                */
    SS._bc =    function(l,c,tn,ft)
                {
                    //a:    attributes
                    //i:    index pointer
                    //b:    attribute
                    //k:    key
                    //v:    attribute value
                    //n:    array length
                    //h:    control existence check
                    
                    //set element id if it hasn't got one
                    if(!l.id)
                    {
                        l.id = ((tn) ? tn : l.tagName) + SS.global.nid++;
                    }
                    $sa(l,"ss","ss");
                    
                    var a = l.attributes, i, b, k, v, n = $ln(a), h;
                    for(i = 0; i < n; i++)
                    {
                        b = a[i];
                        k = $lc(b.nodeName);
                        v = b.nodeValue;
                        if(typeof c[k] != "undefined")
                        {
                            c[k] = v;
                        }
                        else if(k == "class" && typeof c.classname != "undefined")
                        {
                            c.classname = v;
                        }
                    }
                
                    if(!ft)
                    {
                        h = $gc(c.id);
                        if(h)
                        {
                            SS.global.controls.remove(h);
                        }
                    }
                    SS.global.controls.add(c);
                    return c;
                };
                /**
                *   @function               SS._bcs
                *   @description            Builds custom tag controls placed into the page
                *   @param {Boolean} ft     First time. Flag to indicate that this has been called as part of the
                *                           initial loading process. (Optional).
                *   @returns                null
                */
    SS._bcs =   function(ft)
                {
                    //ft:   first time run
                    //ls:   elements to check
                    //ln:   length of elements
                    //i:    index pointer
                    //l:    element
                    //g:    control extension type
                    //tn:   tagName
                    //y:    control  type
                    //cy:   possible control / html element types
                    //c:    SS.global.controls
                    //gn:   group name
                    //rc:   controls to render
                    var  ls, ln, i, l, g, fi, tn, id, y, h = SS.htmlextension, cy = ["div","input","textarea","select"], j, c = SS.global.controls, gn, rc = [];
                    
                    for(j = 0; j < 4; j++) //maximum of j = length of cy. hard coded for speed.
                    {
                        ls = $gt(cy[j]);
                        ln = (ls) ? ls.length : 0;
                        for(i = 0; i < ln; i++)
                        {
                            l = ls[i];
                            
                            g = $ga(l,"ext");
                            gn = $ga(l,"groupname");
                            tn = cy[j];
                            if(tn == "input")
                            {
                                y = $lc(l.type);
                            }
                            else
                            {
                                y = "";
                            }
                            
                            if(g && (ft || ($ga(l,"ss") != "ss")))
                            {
                                //first time this function has been called
                                //or control does not exist
                                g = g.toLowerCase();
            		                  
                                if(SS.control[g])   
                                {
                                    rc.add(SS._bc(l,new SS.control[g](),tn,ft));
                                }
                            }
                            
                            if(h && (ft || ((y == "text" || y == "hidden" || tn == "select" || tn == "textarea" || gn) && !SS.global.htmels.contains(l.id))))
        		            {
                                
        		                //$debug("new html el: " + l.id);
                                if(y == "text" || y == "hidden" || tn == "select")
                                {
                                    fi = h.inputvalidation(l);
                                }
                                else if(tn == "textarea")
                                {
                                    fi = h.textarea(l);  //adds maxlength and input validation
                                }
                                else if(gn)
                                {
                                    $headd(l,ft); //add but does not use any additional features such as validation. Useful when using $gg function
                                }
                            }
                        }
                    }
                        
                    if(ft && fi && SS._heinitfrm)
                    {
                        SS._heinitfrm();
                    }
                    
                    ln = rc.length;
                    if(ln)
                    {
                        $asort(c,{id:1}); //sort control ascending by the value of the [id] member            
                        for(i = 0; i < ln; i++)
                        {
                            l = rc[i];
                            l.render.call(l);
                            if(l.oninit)
                            {
                                $st(l.oninit,1);
                            }
                        }
                    }
                };
                    /**
                    *   @function               SS._dommap
                    *   @description            Map the DOM to allow for reliable monitoring of changes
                    *   @param {HTMLElement} l  Element to map, typically document.body.
                    *   @returns                null
                    */
    SS._dommap =    function(l)
                    {
		                if(l)
		                {
			                var k = $ln(document.getElementsByTagName("*"));
			                if(SS.HK != k)
			                {
				                //there has been some change in the nodes
				                SS._bcs();
				                SS.HK = k;
			                }
		                }
                    };
                    
                        /**
                        *   @function               SS._trashClear
                        *   @description            Cleans and removes elements that have been placed onto the trash pile.
                        *                           Elements are destroyed at a leisurely pace to prevent CPU hogging.
                        *                           Once called, this function will call itself every x milliseonds.
                        *   @returns                null
                        */
    SS._trashClear =    function()
                        {
                            if(SS.global.trash && SS.global.trash.length)
                            {
                                var l = SS.global.trash.removeAt(0), k;
                                if(1) //needed to get around jslint parsing issue where for(k in l) should be followed by an if statement. if statement cannot be first as IE can throw "Class doesn't support automation error"
	                            {
	                                try
                                    {
                                        for(k in l)
										{
											if(1)
											{
												//clean up the element before it is lost
												if(k.match(/^on/i))
												{
													l[k] = null;
												}
												else if(k == "className" || k == "innerHTML")
												{
													l[k] = "";
												}
												else if(k == "src")
												{
													k.src = "about:blank";
												}   
											}
										}  
                                     }
                                     catch(X){}
                                     
                                     l = null;
                                }
                            }
                        	
    	                    $st(SS._trashClear,9); //call again to clear more elements. 
                        };
                /**
                *   @function               SS._main
                *   @description            Initialize the Spiderscript framework environment.
                *   @returns                null
                */
    SS._main =  function()
                {
		            //$stopwatch.start("main");
            	    
                    if(typeof _environment != "undefined")
                    {
                         SS.global.locale = _environment.locale;
                    }
                    
                    //check that environmental parameters have been set. If not, use framework defaults instead.
                    if(!SS.global.locale) 
                    {
                        SS.global.locale = new SS.locale();
                    }
                    
                    SS.HK = 0;
                    
	                SS._bcs(1);
            	    
                    _ss_ls = null;
                    $si(function()
                    {
                        _ss_ls = SS._dommap(document.body,_ss_ls,0);
                    },20);

		            SS.global.loaded = 1;
		            SS.events.called(document.body,null,"ssonload");
		            
		            
                    //$stopwatch.stop("main");
                    //$st(function(){$debug("main duration: " + $stopwatch.duration("main"));$debug("new");},50);
                    SS._trashClear();
                };


    
    /**
    *	@function                   $buildControl
    *   @description                Builds a new control - this function allows for the dynamic addition of a control rather than using the HTML approach.
    *   @param {HTMLElement} l      Element to attach the control to (l)
    *   @param {String} c           control name e.g. "window"
    *   @return {SS.control.Object} Returns the instantiated control built from the element passed in (l).
    */
    function $buildControl(l,c)
    {
        //n:    new control
        //r:    return
        
        var n, r;
        
        if($ise(c))
        {
            c = $ga(l,"ext");
        }
        
        if(l && c)
        {
            if(!$gc(l.id) || $ga(l,"ss") != "ss")
            {
                c = $lc(c);
                if(SS.control[c])
                {
                    n = new SS.control[c]();
                    if($lc($ga(l,"ext")) != c)
                    {
                        $sa(l,"ext",c);
                    }
                    n.id = l.id;
                    
                    r = SS._bc(l,n);
                }
                
                if(r)
                {
                    if(r.oninit)
                    {
		                  $st(r.oninit,0);
	                }
	                r.render.call(r);
                }
            }
        }
        
        return r;
        
    }

    /**
    *	@function                   $destroyControl
    *   @description                Descroys an existing control.
    *   @param {String} id			Id of the control to be destoryed
    *	@since						v1.0.7.20090731
    *   @return						null
    */
    function $destroyControl(id)
    {
        
        //c:	control
        var c = $gc(id);
        
        if(c)
        {
			//remove HTML form
			$d($g(c.id));
			SS.global.controls.remove(c);
        }
        //else
        //control does not exist
        
        
    }    
                /**
                *   @function               SS._init
                *   @description            Call to initialize the framework environment once the document has loaded.
                *   @returns                null
                */
    SS._init =  function()
                {
                    //d:    document
                    //s:    document state
                    //a:    document addEventListener
                    var d = document, s = $lc(d.readyState), a = d.addEventListener;
                    if(a && !s)
                    {
                        a("DOMContentLoaded", SS._main, false);
                    }
                    else if(!(s == "complete" || s == "loaded"))
                    {
                        $st(function(){SS._init();},0);
                    }
                    else
                    {
                        SS._main();
                    }    
                };
                
    SS._init();

/***************************************************************************************
****************************************************************************************/
