/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.core.js				
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



/*jslint evil: true */
/*
*   File Name:      SS.core.js
*   Description:    Provides core functionality to the Spiderscript Library
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.locale.js
*/

/**
*   @function $ci
*   @description Pseudonym for JavaScript function clearInterval
*   @param id Identifier as returned from the setInterval or {@link $st} functions.
*/
var $ci = clearInterval;

/**
*   @function $ct
*   @description Pseudonym for JavaScript function clearTimeout
*   @param id Identifier as returned from the setInterval or {@link $st} functions.
*/
var $ct = clearTimeout;

/**
*   @function $si
*   @description Pseudonym for JavaScript function setInterval
*   @param {Function} callFunction
*   @param {Integer} interval Duration in milliseconds
*/
var $si = setInterval;

/**
*   @function $st
*   @description Pseudonym for JavaScript function setTimeout
*   @param {Function} callFunction
*   @param {Integer} interval Duration in milliseconds
*/
var $st = setTimeout;

/**
*   @function $lc
*   @description To lower Case. Converts a string into lowercase   
*   @param {String} s String to convert to lowercase
*   @returns {String} lower case representation of the string passed into the function else returns "" if not possible to convert object to lowercase string
*/
function $lc(s)
{
    var r = "";
    if(s && s.toLowerCase)
    {
        r = s.toLowerCase();
    }
    else if(s && s.toString)
    {
        r = s.toString().toLowerCase();
    }
    return r;
}

/**
*   @function $uc
*   @description To UPPER case. Converts a string into uppercase   .
*   @param {String} s String to convert to uppercase
*   @returns {String} UPPER case representation of the string passed into the function else returns "" if not possible to convert object to uppercase string
*/
function $uc(s)
{
    var r = "";
    if(s && s.toUpperCase)
    {
        r = s.toUpperCase();
    }
    else if(s && s.toString)
    {
        r = s.toString().toUpperCase();
    }
    return r;
}


/**
*   @function $isf
*   @description Is Function. Check to see if the object passed is a function
*   @param {Object} o Object to test
*   @returns {Boolean} true if passed object is a function else returns false.
*/
function $isf(o)
{
	return typeof o == "function";
}

/**
*   @function $iso
*   @description Is Object. Check to see if the object passed is an object
*   @param {Object} o Object to test
*   @returns {Boolean} true if passed object is an object else returns false.
*/
function $iso(o)
{
	return (o && typeof o == "object") || $isf(o);
}

/**
*   @function $iss
*   @description Is String. Check to see if the object passed is a string.
*   @param {Object} o Object to test
*   @returns {Boolean} true if passed object is a string else returns false.
*/
function $iss(o)
{
	return typeof o == "string";
}

/**
*   @function $isu
*   @description Is Undefined. Check to see if the object passed is in is of type {undefined}.
*   @param {Object} o Object to test
*   @returns {Boolean} true if passed object has not been defined.
*/
function $isu(o)
{
	return typeof o == "undefined";
}


/**
*   @function $ln
*   @description Length. Get the length value of an object e.g. {String} or {Array}
*   @param {Object} l Object to get length of
*   @returns {Integer} Length of the object or 0 if the object is null or does not implement the length attribute.
*/
function $ln(l)
{
    var r = 0;
    if(typeof l != "undefined" && l.length)
    {
        r = l.length;
    }
    return r;
}


/**
*   @function $il
*   @description In List. Checks to see if the value (v) is in the list (l) delimited by (d). Case sensitive.
*   @param {String} l String List e.g. "1,2,3"
*   @param {String} v Value to search for e.g. "2"
*   @param {String} d Delimiter. Default is ",".
*   @returns {Boolean} true if the value exists, else returns false.
*/
function $il(l,v,d)
{
    var f = 0; //found
    
    if(!d)
    {
        d = ",";
    }
    
    if(!l || $isu(v))
    {/* f = 0; */}
    else if(l == v)
    {
        //list of single value which a match
        f = 1;
    }
    else if(!l.split)
    {/* f = 0; */}
    else
    {
        //s:    list of length > 1 value
        //i:    index pointer
        //a:    split array length
        var s = l.split(d), i, a = $ln(s);
        if(a)
        {
            for(i = 0; i < a && !f; i++)
            {
                if(s[i] == v)
                {
                    f = 1;
                }
            }
        }
    }
    
    return (f) ? true : false;
}


/**
*   @function $iln
*   @description In List No Case. Checks to see if the value (v) is in the list (l) delimited by (d). Case insensitive. See {@link $il}
*   @param {String} l String List e.g. "1,2,3"
*   @param {String} v Value to search for e.g. "2"
*   @param {String} d Delimiter. Default is ",".
*   @returns {Boolean} true if the value exists, else returns false.
*/
function $iln(l,v,d)
{
    return $il($lc(l),$lc(v),$lc(d));
}

/**
*   @function $psb
*   @description Parse String to Boolean. Converts a string containing a boolean message into a boolean.
*   @param {String} v Value to convert
*   @returns {Boolean} true if the value is in the case insensitive values of "yes,true,1,y,on", else false.
*/
function $psb(v)
{
    return $iln("yes,true,1,y,on",v);
}

/**
*   @function $tb
*   @description To Boolean. Converts the object passed to a boolean. Is this is a string, the meaning of the string is looked up using {@link $psb}.
*   @param {Object} v Value object
*   @returns {Boolean} true if the value exists, else false.
*/
function $tb(v)
{
	var r = false;
	if(v !== 0 && (v == 1 || $psb(v)))
	{
		r = true;
	}
	
	return r;
}

/**
*   @function $isdc
*   @description Is Descendent Child Element. Checks to see if an element node (c) belongs in the sub-tree of element (r) i.e child, grandchild, great grandchild ...
*   @param {Node} r Root Node
*   @param {Node} c Child Node
*   @returns {Boolean} true if the node (c) exists in the sub-tree of the root node (r), else false.
*/
function $isdc(r,c)
{
    //r:    root
    //c:    child
    var o = 0;      //outcome
    if(r && c)
    {
        if(r == c)
        {
            o = 1;
        }
        else
        {
            o = $isdc(r,c.parentNode);
        }
    }
    
    return $tb(o);
}


/**
*   @function $isa
*   @description Is Array. Check to see if the object passed is an array.
*   @param {Object} o Object to test
*   @returns {Boolean} true if passed object is an array else returns false.
*/
function $isa(o)
{
	return $iso(o) && o.constructor == Array;
}

/**
*   @function $isb
*   @description Is Boolean. Check to see if the object passed is a boolean.
*   @param {Object} o Object to test
*   @returns {Boolean} true if passed object is a boolean else returns false.
*/
function $isb(o)
{
	return typeof o == "boolean";
}

/**
*   @function $isd
*   @description Is Defined. Check to see if the object passed is defined.
*   @param {Object} o Object to test
*   @returns {Boolean} true if passed object is defined else returns false.
*/
function $isd(o)
{
	return typeof o != "undefined";
}

/**
*   @function $ise
*   @description Is Empty. Check to see if the object passed is empty i.e is null, undefined, "", [].
*   @param {Object} o Object to test
*   @returns {Boolean} true if object is considered as being empty, else false.
*/
function $ise(o)
{
    var y = typeof o;
    return (y == "undefined" || o === null || (y == "string" && o === "") || (y == "object" && o.constructor == Array && !o.length));
}

/**
*   @function $isn
*   @description Is Number. Check to see if the object passed is a number.
*   @param {Object} o Object to test
*   @returns {Boolean} true if passed object is a number else returns false.
*/
function $isn(o)
{
	return (typeof o == "number" || (!isNaN(o))) && (!$ise(o));
}

/**
*   @function $g
*   @description Get Element By Id. Pseudonym for document.getElementById but also has support for matching characters ":" and "$" as "_".
*   @param {String} id Identifier of the element to find
*   @returns {Node} Element if found in the DOM, else false.
*/
function $g(id)
{
    //r:    return value
    //l:    element
    var r = null;
    if(id)
    {
        r = document.getElementById(id);    
        if(!r && id.match && id.match(/[\:\$]/g))
        {
            r = $g(id.replace(/[\:\$]/g,"_"));
        }
        /*
        else
        {
            //found the element
        }
        */
    }
    return r;
}

/**
*   @function $n
*   @description Number. Pseudonym for Number function.
*   @param {String} id Identifier of the element to find
*   @returns {Number} Number.
*/
function $n(o)
{
    return Number(o);
}

/**
*   @function $nid
*   @description Next Id. Returns the next available Id as a number.
*   @returns {Integer} Next available number.
*/
function $nid()
{
    return SS.global.nid++;
}

/**
*   @function $c
*   @description Create element. Creates and element for use in the DOM.
*   @param {String} t Type of node to create e.g. INPUT, DIV, LABEL ... or override with {Object} t {tagName : {String}, className : {String}, id : {String}}
*   @param {String} cn Class name to assign to the element
*   @param {String} id Identifier to assign to the element.  Default = next available Id. See {@link $nid}
*   @returns {Node} Created element.
*/
function $c(t,cn,id)
{
    var l /*,ls = SS.global.reuseTypes*/;
    
    if(typeof t == "object")
    {
        id = t.id ? t.id : null;
        cn = t.className ? t.className : "";
        t = t.tagName ? t.tagName : null;
    }
    
    t = (t) ? t : "div";
    id = (id) ? id : t + SS.global.nid++;
    
    /* depreciated code - no longer reusing elements
	if(ls && $ln(ls[t]))
	{
		//there exists an element that can be reused
		l = ls[t].pop();		
	}
	
	else
	{
	    //create the element anyway
	    l = document.createElement(t);
	}
	*/
	
	l = document.createElement(t);
	l.id = id;
	if(cn)
	{
	    l.className = cn;
	}
	
	return l;
}


/**
*   @function $ctn
*   @description Create Text Node. Pseudonym for document.createTextNode
*   @param {String} t Text assigned to the text node
*   @returns {Node} Text node.
*/
function $ctn(t)
{
    return document.createTextNode(t);
}


/**
*   @function $rc
*   @description Remove Child. Remove child from parent node if it supports this functionality
*   @param {Node} p Parent node
*   @param {Node} c Child node
*   @returns {Node} Removed node.
*/
function $rc(p,c)
{
    if(p && p.removeChild)
    {
        return p.removeChild(c);
    }   
}

/**
*   @function $rp
*   @description Remove from Parent. Remove the node from its parent if this functionality is supported by the node.
*   @param {Node} l Node to detach from its parent
*   @returns {Node} Removed node.
*/
function $rp(l)
{
    if(l)
    {
        return $rc(l.parentNode,l);
    }
}

/**
*   @function $ta
*   @description To Array. Takes an object and converts it to an array unless the object passed is already an array.
*                If null or undefined are passed, an empty array returned.
*                A single object o would be returned as [o].
*   @param {Object} o Object to be turned into an array
*   @returns {Array} Array containing the object passed, else an empty array.
*/
function $ta(o)
{
    var r;
    if($isd(o))
    {
        if($isa(o))
        {
            r = o;
        }
        else
        {
            r = [o];
        }
    }
    else
    {
        r = [];
    }
    return r;
}

/**
*   @function $trim
*   @description Trim. Trim leading and trailing blank spaces off the string passed
*   @param {String} s String to be trimmed
*   @returns {String} Trimmed string.
*/
function $trim(s)
{
    if(s && s.replace)
    {
        s = s.replace(/^(\s)+|(\s)+$/g,"");
    }
    return s;
}

/**
*   converts the object passed to a string.
*   if null or undefined are passed, an empty string is returned
*/

/**
*   @function $ts
*   @description To String. Takes an object and converts it to a string using the .toString function where possible.
*                If null or undefined are passed, an empty string is returned.
*   @param {String} s String to be trimmed
*   @returns {String} String representation of the object, else "".
*/
function $ts(s)
{
    var r = "";
    if((!$ise(s)) && s.toString)
    {
        r = s.toString();
        if($lc(r) == "[object object]")
        {
            r = "";
        }
    }
    return r;
}




/**
*   @function indexOf
*   @description Returns the index position of the object within the array
*   @param {Object} o Object to be found
*   @returns {Integer} Index position of the found object, or -1 if not found
*/
Array.prototype.indexOf =	function(o)
							{
								var r = -1, i, t = this;
							
								for(i = 0; i < t.length; i++)
								{
									if(t[i] == o)
									{
										r = i;
										i = t.length;
									}
						
								}
						
								return r;
							};

/**
*   @function contains
*   @description Check to see if the object exists in the array using {@link indexOf}
*   @param {Object} o Object to check existence of
*   @returns {Boolean} true if object exists in the array, else false.
*/							
Array.prototype.contains =	function(o)
							{
								return this.indexOf(o) >= 0;
							};

/**
*   @function add
*   @description Add object to the end of the array
*   @param {Object} o Object to add
*   @param {Boolean} n (Optional) Node check. True to only add the object is if is not already a member of the array, or false to add the object to the end of the array without checking. Default = false.
*   @returns null
*/															
Array.prototype.add	=	    function(o,n)
							{
								if(!(n && this.contains(o)))
								{
									this[this.length] = o;
								}
							};


/**
*   @function remove
*   @description Remove Object. Removes object from the array and returns it
*   @param {Object} o Object to be removed
*   @returns {Object} Removed object if it exists in the array, else null.
*/
Array.prototype.remove	=	function(o)
							{
								//returns the removed object
								//else returns null
								var i = this.indexOf(o), r = null;
								
								if(i >= 0)
								{
									r = this.splice(i, 1);
								}
								return r;
							};
							
/**
*   @function removeAt
*   @description Remove At index. Removes object from the array at the specified index
*   @param {Integer} i Index of the object to remove where i >= 0 and i < array.length
*   @returns {Object} Removed object at the index point prior to removal.
*/
Array.prototype.removeAt =  function(i)
                            {
                                var r = null;
                                if(i >= 0 && i < this.length)
								{
									r = this.splice(i, 1);
								}
								return r;
                            };

/**
*   @function copy
*   @description Copy array. Return an identical copy of this array
*   @returns {Array} Copy of the array
*/
Array.prototype.copy    =   function()
                            {
                                var i, r = [];
                                for(i = 0; i < this.length; i++)
                                {
                                    r.push(this[i]);
                                }
                                return r;
                            };

/**
*   @function left
*   @description Returns x number of characters in the current string from the left
*   @param {Integer} x Number of characters from the left
*   @returns {String} Characters from the position 0 to x of this string
*/
String.prototype.left = function(x)
						{
							return this.substring(0,x);
						};								

/**
*   @function right
*   @description Returns x number of characters in the current string from the right
*   @param {Integer} x Number of characters from the right
*   @returns {String} Characters from the position string.length to x of this string
*/
String.prototype.right =	function(x)
							{
								return this.substring(this.length - x);
							};
							

/**
*   @function repeat
*   @description Repeat this string x number of times
*   @param {Integer} x Number of times to repeat this string
*   @returns {String} Repeated copy of this string
*/
String.prototype.repeat =   function(x)
                            {
                                var r = this,i;
                                for(i = 1; i < x; i++)
                                {
                                    r += this;
                                }
                                return r;
                            };

/**
*   @function reverse
*   @description Reverse this string
*   @since              v1.0.8.20090930
*   @returns {String} Reversed string
*/
String.prototype.reverse =  function()
                            {
                                return this.split("").reverse().join("");
                            };

/**
*   @function add
*   @description        Add the value (v) in interval (i) to the current date
*   @param {Integer} v  Number of inverval units to be added this date
*   @param {String} i   Interval to add.
*                       ms  :   milliseconds
*                       s   :   seconds
*                       mi  :   minutes
*                       h   :   hours
*                       d   :   days
*                       mo  :   months
*                       y   :   years
*   @returns {String} Repeated copy of this string
*/
Date.prototype.add		=	function(v,i)
							{
							    //t:    this
							    //u:    unit
								var t = this, u = $lc(i);
								if(!(!i || v === 0))
								{
								    if(u == "ms")
								    {
										t.setMilliseconds(t.getMilliseconds() + v);
									}
								    if(u == "s")
								    {
								        t.setSeconds(t.getSeconds() + v);
								    }
								    if(u == "mi")
								    {
								    	t.setMinutes(t.getMinutes() + v);
								    }
								    if(u == "h")
								    {
								    	t.setHours(t.getHours() + v);
								    }
								    if(u == "d")
								    {
								    	t.setDate(t.getDate() + v);
								    }
								    if(u == "mo")
								    {
								    	t.setMonth(t.getMonth() + v);
								    }
								    if(u == "y")
								    {
								    	t.setFullYear(t.getFullYear() + v);
								    }
									
								}
								return t;
							};
                            

/**
*   @function $x2o
*   @description            Converts an XML document into a JavaScript object
*   @param {XMLDocument} x  XMLdocument to convert to a JavaScript object representation. 
*                           An important note, where there exists a series of nodes of the same type,
*                           they are stored together in an array. If only one node of that type exists,
*                           it is stored as a single object. Use {@link $ta} to convert single objects into
*                           an array where there could be one or more items.
*   @returns {Object}       JavaScript object representation of the XMLDocument input.
*/
function $x2o(x)
{
    //x:	xml object
    //r:	return object
    //o:	object
    //cn:	childNodes
    //i:	index pointer
    //c:	childNode
    //n:	tagName
    //fc:	firstChild
    //s:	nextSibling of the firstChild node
    //v:	value of the firstChild node
    //m:	temporary object
    //nn:	node name
    //nv:	node value
    //l:    	temporary length holder
    //on:   	object property
    //y:	typeof
    var r = null, o = {},cn,i,c,n,fc,s,v,m,nn,nv,l,on,y;
    if(x)
    {	
	    cn = x.childNodes;
	    l = cn.length;
	    for(i = 0; i < l; i++)
	    {   
		    c = cn[i];
		    n = c.tagName;
		    if(typeof n != "undefined")
		    {
				fc = c.firstChild;
				if(fc)
				{
					s = fc.nextSibling;
					nn = fc.nodeName;
					nv = fc.nodeValue;
					
					if(nn == "#text")
					{
						v = ((nv && nv.length) ? nv.length : 0) ? nv : null;
						    
						while(s && s.nodeName == "#text")
						{
							fc = s;
							s = fc.nextSibling;
							nv = fc.nodeValue;
							v += ((nv && nv.length) ? nv.length : 0) ? nv : null;
						}
					}
					else
					{
						v = null;
					}
	    			
	    			on = o[n];
	    			y = typeof v;
	    			
	    			//if(v is not empty and v is typeof string and exists a sibling)
	    			if(	(!(y == "undefined" || v === null || (y == "string" && v === "") || (y == "object" && v.constructor == Array && !v.length))) && y == "string" && !s)
					{
						//assign the value to this object as opposed to looping through it
						y = typeof on;
						if(y != "undefined")
						{
							//an object already exists
							if(!(y == "object" && on.constructor == Array))
							{
								//adding more objects to convert to an array
								o[n] = [on];
								on = o[n];
							}
							
						    if(!isNaN(v))
						    {
							v = Number(v);
						    }
						    on[on.length] = v; //add item to the end of the array
	    					
						}
						else
						{
						    if(!isNaN(v))
						    {
						        v = Number(v);
						    }
							o[n] = v;
						}
	    				
	    				
					}
					else
					{
						y = typeof on;
						if(on)
						{
							//an object already exists
	    					
							if(!(y == "object" && on.constructor == Array))
							{
								//adding more objects to convert to an array
								o[n] = [on];
								on = o[n];
							}
							on[on.length] = $x2o(c);
	    					
						}
						else
						{
							o[n] = $x2o(c);
						}
					}
	    		
				}
				else
				{
					o[n] = null;
				}						
		    }
	    }
    	
	    r = o;
    }
    
    return r;

}


/**
*   @function $o2x
*   @description            Converts a JavaScript object into an XML document. Functions are
*   @param  {Object}    o   XMLdocument to convert to a JavaScript object representation. 
*   @param  {String}    rt  Root tag name (optional). Needed if the JavaScript object has more than one top level element.
*   @param  {String}    ns  Namespace (optional)
*   @param  {Boolean}   f   Include functions (optional). Default = false.
*   @since                  v1.0.7.20090731
*   @returns {XMLDocument}  XML document representation of the JavaScript object input.
*/
function $o2x(o,rt,ns,f)
{
    //d     :   document
    //pf    :   prefix
    //tn    :   tagname
    //i     :   index pointer
    //k:    :   key
    //v:    :   value
    //n     :   node
    var d, pf = "", tn, i, k, v, n;
    
    if(o)
    {
    
        //    Get the XML Document
        // vv --------------------- vv
        rt = rt ? rt : "";
        ns = ns ? ns : "";
        
        if(document.implementation && document.implementation.createDocument)
        {
            d = document.implementation.createDocument(ns,rt,null);
        }
        else
        {
            d = new ActiveXObject("MSXML2.DOMDocument");
            tn = rt;
            
            if(rt)
            {
                i = rt.indexOf(":");
            }
            
            if(i >= 0)
            {
                pf = rt.substring(0,i);
                tn = rt.substring(i + 1);
            }
                        
            d.loadXML("<" + (pf ? pf + ":" : "") + tn + (ns ? " xmlns:" + pf + "=\"" + ns + "\"" : "") + "/>");
            
        }
        //    Get the XML Document
        // ^^ --------------------- ^^
        
        if(d)
        {
        
            //_p    :   Parse JavaScript Object
            //d     :   XML Document
            //p     :   Parent Node
            //o     :   object  
            //ns    :   namespaceURI
            var _p = function(d,p,o,ns)
                     {
						//k		:	key
						//v		:	value
						//i		:	index pointer
						//ln	:	length
						//n		:	node
						//fk	:	formatted key
						//y     :   type
                        var k,v,i,ln,n,fk,y = typeof o;
                        if(y != "undefined")
                        {
                            
                            if(y == "string" || y == "number")
                            {
                                p.appendChild(d.createTextNode((o.toString ? o.toString() : o)));
                            }
                            else
                            {
                                for(k in o)
                                {
                                    if(typeof o[k] != "function" || f)
                                    {
                                        v = o[k];
                                        y = typeof v;
                                        
                                        fk = k;
                                        if(!isNaN(k))
                                        {
											fk = "_" + k;
										}
                                        n = d.createElementNS ? d.createElementNS(ns,fk) : d.createNode(1,fk,ns);
                                        
                                        if(y != "undefined")
                                        {
                                            if(y == "object")
                                            {
                                                if(v && v.constructor == Array)
                                                {
                                                    ln = v.length;
                                                    for(i = 0; i < ln; i++)
                                                    {
                                                        n = d.createElementNS ? d.createElementNS(ns,fk) : d.createNode(1,fk,ns);
                                                        _p(d,n,v[i],ns);
                                                        p.appendChild(n);
                                                    }
                                                }
                                                else
                                                {
                                                    _p(d,n,v,ns);
                                                    p.appendChild(n);
                                                }
                                            }
                                            else
                                            {
                                                n.appendChild(d.createTextNode((v.toString ? v.toString() : v)));
                                                p.appendChild(n);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                     };
            
            _p(d,d.firstChild || d,o,ns);
        
        }
        
    }
    
    return d;
}

/**
*   @function $ef
*   @description            Execute function against a control and event
*   @param {Function}   f   Function to be executed, or {String} to be evaluated to be run as a function
*   @param {Object}     c   Control that the function is to be executed against
*   @param {Event}      e   Event that triggered the calling of the function
*   @returns {Object}       Result from function
*/
function $ef(f,c,event)
{
    if(f)
    {
        event = $e(event);
        var e = event; //for backwards compatability
        if($isf(f))
        {
            return f.call(c,event);
        }
        else
        {
            eval("function _f(event){" + f + "};");
            return _f.call((c) ? $g(c.id) : c,event);
            //return $ev("var _f = function(){" + f + "}; _f.call($g('" + c.id + "'));");
        }
    }
}

/**
*   @function               $lg2
*   @description            Get the current user language (2 character code value)
*   @returns    {String}    2 character value of the browser user language
*/
function $lg2()
{
    var n = navigator, l = n.language || n.userLanguage;
    return $lc(l.substring(0,2));
}

/**
*   @function               $ac
*   @description            Append Child. Attaches the element to its parent.
*   @param      {Node} p    Parent node to attach the element to
*   @param      {Node} c    Element to attach
*   @param      {Node} b    Insert Before This Node (optional) - since v1.0.7.20090731
*   @returns                null
*/
function $ac(p,c,b)
{
    if(p && p.appendChild && c)
    {
        if(b && p.insertBefore)
        {
            p.insertBefore(c,b);
        }
        else
        {
            p.appendChild(c);
        }
    }   
}

/**
*   @function               $rnd
*   @description            Round number. Pseudonym for Math.round
*   @param      {Number} p  Number to be rounded
*   @returns    {Number}    Rounded number.
*/
var $rnd = Math.round;

/**
*   @function               $rand
*   @description            Random number. Return a random number between 0 and m
*   @param      {Number} m  Maximum number to be returned
*   @returns    {Number}    Random number between 0 and m
*/
function $rand(m)
{
    return $rnd((Math.random() * m));
}

/**
*   @function                   $ga
*   @description                Get attribute
*   @param    {HTMLElement} l   Element to query the attribute value of
*   @param    {String}      a   Name of the attribute
*   @returns  {string}          Value of the attribute stored in the element
*/
function $ga(l,a)
{
    if(l && l.getAttribute)
    {
        return l.getAttribute($lc(a),1);
    }
}

/**
*   @function                   $sa
*   @description                Set attribute
*   @param    {HTMLElement} l   Element to query the attribute value of
*   @param    {String}      a   Name of the attribute
*   @param    {Value}       v   New value for the attribute
*   @returns                    null
*/
//set attribute
function $sa(l,a,v)
{
    if(l && l.setAttribute)
    {
        l.setAttribute($lc(a),v);
    }
}

/**
*   @function               $gt
*   @description            Get elements by tag name. Pseudonym for  document.getElementsByTagName
*   @param      {String} n  Tag name of elements to be returned. Use "*" to return all elements in the document instead of using document.all
*   @returns    {Number}    Rounded number.
*/
function $gt(n)
{
    return document.getElementsByTagName(n);
}


/**
*   @function               $keys
*   @description            Returns all of the keys in the object (excluding function keys)
*   @param      {Object} o  Object to be query the keys of.
*   @returns    {Array}     Array of {String} keys names
*/
function $keys(o)
{
    var k, a = [];
    for(k in o)
    {
        if(!$isf(o[k]))
        {
            a.add(k);
        }
    }
    return a;
}

/**
*   @function               $asort
*   @description            Sort an array
*   @param      {Array} a   Array to be sorted
*   @param      {Array} c   Sort criteria e.g. [{member,direction}] where direction:{1:ascending,2:descending}
*   @returns    {Array}     Sorted array
*/
function $asort(a,c)
{
	//a:    array to be sorted
	//c:    sort criteria e.g. [{member,direction}] where direction:{1:ascending,2:descending}
    //n:    array length holder
    //o:    cirteria length holder
    //m:    temporary variable holder
    //k:    key
    //d:    direction
    //w:    swap flag
    //i:    index pointer
    //q:    pointer out
    //p:    pointer in
    c = $ta(c);
    
    var n = $ln(a), o = $ln(c), m, k, d, w, i, q, p;
    for(q = n-1; q > 0; q--)
    {
		for(p = 0; p < q; p++)
		{
			//check if need to swap results
			w = 0;
			if(o)
			{
			    for(i = 0; i < o; i++)
			    {	
			        m = $keys(c[i]);
			        k = m[0];
			        d = c[i][k];
    			    
				    if(a[p][k] > a[p+1][k])
				    {
					    if(d)
					    {
						    //sort ascending
						    w = 1;
					    }
					    break;
				    }
				    else if(a[p][k] < a[p+1][k])
				    {
					    if(d === 0)
					    {
						    //sort descending
						    w = 1;
					    }
					    break;
				    }
			    }
			}
			else if(a[p] > a[p+1])
			{
			    w = 1;
			}
			
			if(w)
			{
			    m = a[p];
			    a[p] = a[p+1];
			    a[p+1] = m;
			}
			
		}
	}
	return a;
}


/**
*   @function               $gc
*   @description            Get Control. Selects the Spiderscript control
*   @param      {String} id Identifier of the control to be returned
*   @returns    {Object}    Spiderscript control (SS.control.object)
*/
function $gc(id)
{
    //c:    control
    //r:    return control
    //s:    controls
    //n:    number of controls
    //l:    lowerBound
    //u:    upperBound
    //i:    index
    //k:    key to match against
    //k2:   alternate key to match against
    var c, r, s = SS.global.controls, n = (s) ? s.length : 0, l = 0, u = n - 1, i;
    
    while(n > 9)   //binary search loop until a break occurs but only if there are more than 9 controls, otherwise use a linear search
    {
        i = Math.floor((l + u) / 2);
        c = s[i];
        if(c)
        {
            k = c.id;
            k2 = c.idtb;
            if(k == id || k2 == id)
            {
                //found the control
                r = c;
                break;
            }
            else if(l > u)
            {
                //unable to find the control
                r = null;
                break;
            }
            else
            {
                if(k < id)
                {
                    //look in the upper half
                    l = i + 1;
                }
                else
                {
                    //it's in the lower half
                    u = i - 1;
                }
            }
        }
        else
        {
            break;
        }
    }
    
    if(!r && n)
    {
        //use a linear search to try and find the control
        for(i = 0; i < n; i++)
        {
            c = s[i];
            if(c.id == id || c.idtb == id)
            {
                r = c;
                break;
            }
        }
        if(r && n > 9)
        {
            //found the control using a linear search however it should have been found
            //using the binary search above. this implies that the global controls array
            //is not sorted. sort array for improve performance on next lookup
            $st(function(){$asort(SS.global.controls,{id:1});},0);
        }
    }
    
    
    return r;
}

/**
*   @function                       $gd
*   @description                    Get Descendants. Returns all the descendants of the node in a single array
*   @param      {HTMLElement}   l   Element or {Sting} element id
*   @param      {String}        t   Tag Name Filter. Only return elements which match this tag type e.g. "INPUT"
*   @returns    {Array}             Array of HTML elements
*/
function $gd(l,t,a)
{
    //a:	array of elements, used internally (recursive)
    
	//i:	index pointer
	//n:	node
	//g:    length of child nodes
	var i,n,g;
	
    if($iss(l))
    {
		l = $g(l);
    }
    if(l)
    {
		if(!a)
		{
			a = [];
		}
		else if($ise(t) || $uc(l.tagName) == $uc(t))
		{
			a.add(l);
		}
		g = $ln(l.childNodes);
		for(i = 0; i < g; i++)
		{
			n = l.childNodes[i];
			a = $gd(n,t,a);
		}
    }
    
    return a;
}

/**
*   @function $d
*   @description Destroy (delete) node. Remove the element from the DOM and destroy the node including all nodes in all sub-trees recursively.
*                This fix gives the best chance that the element is truly deleted and can be cleaned up by the garbage collector to free up
*                memory without causing a JavaScript memory leak.
*   @param {Node} l Node to be destroyed
*   @returns null
*/
function $d(l)
{
    //get descendant, store in an array ready to be removed at a leisurely pace
    //to improve performance
    
    if(l)
    {
        $rp(l);
        SS.global.trash = $ta(SS.global.trash).concat($gd(l));
    }
}


/**
*   @function $dc
*   @description Destroys all childNodes of the specified element. Cycles through the child nodes of the element (l) and destroys them using {@link $d}
*   @param {Node} l Node to destroy the child nodes of
*   @returns null
*/
function $dc(l)
{
    if(l)
    {
        var n = l.childNodes;
        if(n)
        {
	        while(n.length > 0)
	        {
	           $d(n[0]);
	        }
        }
    }
}


/**
*   @function                       $esc
*   @description                    Encode text as URI. Pseudonym for encodeURIComponent.
*   @param      {String}        s   String to encode
*   @returns    {String}            Encoded string
*/
var $esc = encodeURIComponent;

/**
*   @function                       $uesc
*   @description                    Decode URI text. Pseudonym for decodeURIComponent
*   @param      {String}        s   String to decode
*   @returns    {String}            Decoded string
*/
var $uesc = decodeURIComponent;


/**
*   @function                       $eschtml
*   @description                    Encode text to HTML format.
*   @param      {String}        s   String to encode
*   @returns    {String}            Encoded string
*/
function $eschtml(s)
{
    var l = $c(), r = "";
    $ac(l,$ctn(s));
    r = l.innerHTML;
    $d(l);
    return r;
}


/**
*   @function               $min
*   @description            Minimum of two numbers. Pseudonym for Math.min
*   @param      {Number} n1 First number
*   @param      {Number} n2 second number
*   @returns    {Number}    Minimum for the two numbers
*/
var $min = Math.min;

/**
*   @function               $max
*   @description            Maximum of two numbers. Pseudonym for Math.max
*   @param      {Number} n1 First number
*   @param      {Number} n2 second number
*   @returns    {Number}    Maximum for the two numbers
*/
var $max = Math.max;

/**
*   @function               $cmom
*   @description            Copy Matching Object Members. Copy the member values from the first object into the second object only if the second object has the same member name defined
*   @param      {Object} f  object from
*   @param      {Object} o  object to
*   @param      {String} x  exclude member names (do not copy) - comma separated list 
*   @returns    null
*/
function $cmom(f,t,x)
{
    if(f && t)
    {
            for(var k in t)
            {
                if(!$isf(t[k]) && $isd(f[k]) && !$il(x,k))
                {
                    try
                    {
                        t[k] = f[k];
                    }catch(X){}
                }
            }
    }
}

/**
*   @function               $up
*   @description            Get URL parameter value. Returns the value of the URL parameter
*   @param      {String} p  Name of the URL parameter
*   @param      {String} u  (Optional) URL to get the parameter from. Default = window.location.href
*   @returns    {String}    Value of the URL parameter
*/
function $up(p,u)
{
    //p:    parameter name
    //u:    url (optional) default = window.location.href
    //r:    url parameter regex check
    if(!u)
    {
        u = window.location.href;
    }
    var r = new RegExp("[\\?&]" + p + "=([^&#]*)","i").exec(u), v = "";
	if(!$ise(r))
	{
		v = r[1];
	} 
	return v;
}

/**
*   @function               $upa
*   @description            URL Parameter Append. Insert or update URL parameter value.
*   @param      {String} u  URL to alter.
*   @param      {String} p  Name of the URL parameter
*   @param      {String} v  New value for the URL parameter
*   @returns    {String}    Modified URL.
*/
function $upa(u,p,v)
{
    //u:    url
    //p:    paramter
    //v:    value
    var r = new RegExp("([\\?&])" + p + "=([^&#]*)","i");
    
	if(!$ise(r.exec(u)))
	{
	    //parameter exists
		u = u.replace(r,"$1" + p + "=" + v);
	} 
	else
	{
	    //parameter does not exist
	    u += (u.indexOf("?") < 0 ? "?" : "&") + p + "=" + v;
	}
	return u;
}

/**
*   @function               $anchor
*   @description            Get the anchor / hash value from a URL. E.g. "www.spiderscript.net/index.htm#abc" would return "abc".
*   @param      {String} u  (Optional) URL to get the parameter from. Default = window.location.href
*   @since                  v1.0.7.20090731
*   @returns    {String}    Value of the URL parameter
*/
function $anchor(u)
{
    if(!u)
    {
        u = window.location.href;
    }
    
    //u:    url (optional) default = window.location.href
    //r:    url parameter regex check
    var r = /(#)([^?\n]*)/,v;
	if(u)
	{
		v = u.match(r);
		if($ln(v) == 3)
		{
		    v = v[2];
		}
		else
		{
		    v = null;
		}
	} 
	return v;
}

/**
*   @function                       $cn
*   @description                    Get child nodes of the elements
*   @param      {HTMLElement}   l   HTML element to get the child nodes from
*   @returns    {Array}             Array of child nodes for the element, else null.
*/
function $cn(l)
{
    var r = null;
    if(l)
    {
        r = l.childNodes;
    }
    return r;
}

/**
*   @function                       $hcn
*   @description                    Has Child Nodes
*   @param      {HTMLElement}   l   HTML element to see if it has child nodes
*   @returns    {Boolean}           true if the element does have child nodes, else false.
*/
function $hcn(l)
{
    return $ln($cn(l)) > 0;
}

/**
*   @function                       $pn
*   @description                    Get Parent Node
*   @param      {HTMLElement}   l   HTML element to find the parent of
*   @returns    {HTMLElement}       Parent of the HTML element, else null.
*/
function $pn(l)
{
    var r = null;
    if(l)
    {
        r = l.parentNode;
    }
    return r;
}

/**
*   @function                       $cc
*   @description                    Character Code. Get character code from event
*   @param      {Event}         e   Event (or window.event) containing a character code
*   @returns    {Integer}           Character code for the event
*/
function $cc(e)
{
    //c:    charcode
    var c = 0;
    e = e || window.event;
    if(e)
    {
        c = e.charCode || e.keyCode;
    }
    return c;
    
}

/**
*   @function                       $cl
*   @description                    Get / Set className attribute. Gets or sets the class name of an element
*   @param      {HTMLElement}   l   HTML element to get or set the className attribute
*   @param      {String}        n   (Optional) Class name value. Leave to only query the className would setting it
*   @returns    {String}            Class name attribute of the element
*/
function $cl(l,n)
{
    if(l)
    {
        if($isd(n))
        {
            l.className = n;
        }
        n = l.className;
    }
    return n;
}

/**
*   @function                       $cookie
*   @description                    Get / Set the cookie value
*   @param      {String}        n   Cookie name	(specify only name to perform select)
*   @param      {String}        v   Value (must be defined in order to set or delete a cookie)
*   @param      {Integer}       d   Duration (days) (default = 28 days) (0 = delete on browser close)
*   @returns    {String}            Class name attribute of the element
*/
function $cookie(n,v,d)
{
	//m:	matched cookie value
	//r:	return
	//x:	expiry date
	//s:	cookire string
	var m, r, x = new Date(), s;
	
	
	if(!$ise(n))
	{
	    n = $esc(n);
	    
	    if($isd(v))
	    {
		    //set
		    if($isu(d))
		    {
			    d = 28;	//default number of days
		    }
		    s = n + "=" + $esc(v);
		    if(d)
		    {
			    if(d.toGMTString)
			    {
			        //assume d is a date object
			        x = d;
			    }
			    else
			    {
			        //number passed. add number of days to now
			        x = x.add(d,"d");
			    }
			    if(x && x.toGMTString)
			    {
			        s += ";expires=" + x.toGMTString();
			    }
		    }
		    document.cookie = s;
	    }
	    else
	    {
		    //get
		    m = document.cookie.match("(^|;)?(" + n + ")=([^;]*)(;|$)");
    		
		    if(m)
		    {
			    r = $uesc(m[3]);
		    }
		    return r;
	    }
	}
}

/**
*   @function                       $cookie_delete
*   @description                    Removes a cookie for the browser.
*   @param      {String}        n   Cookie name	to be deleted.
*   @returns    null
*/
function $cookie_delete(n)
{
	$cookie(n,"",-1);
}

/**
*	@function				$css
*	@description			Return one or more style object from a loaded stylesheet that match the defined name.
*	@param {String} n		Name. Name of the style rule. Alternatively specify a Regular Expression using the RegExp object for custom matching.
*	@param {Boolean} ci		(Optional) Case Insensitive Matching. true = compare with no case, false = case sensitive comparison. Default = false.
*	@param {Integer} si		(Optional) Stylesheet index. Use this to prevent looking through all stylesheets.
*	@returns {CSSStyleRule} CSS style object. Alternatively, if more than one rule found, return {Array} of {CSSStyleRule} objects.
*/
function $css(n,ci,si)
{
	//s:	stylesheets
	//l:	length of style sheets
	//m:	length of rules in style sheet
	//i:	index pointer
	//j:	index pointer
	//r:	rules
	//y:	style object to be returned
	//t:	selector text
	var s = document.styleSheets, l = $ln(s), i, j, r, y = [], t;
	
	if(si)
	{
		l = si + 1;
	}
	
	if($iss(n))
	{
		n = new RegExp("^" + n + "$|^" + n + "|\\s" + n + "\\s|" + n + "$",(ci) ? "i" : "");
	}
	
	for(i = (si) ? si : 0; i < l; i++)
	{
		r = s[i].rules || s[i].cssRules;
		m = $ln(r);
		for(j = 0; j < m; j++)
		{
			t = r[j].selectorText;
			if(t && t.match(n))
			{
				y.add(r[j].style); 
			}
		}
	}
	
	l = $ln(y);
	
	if(!l)
	{
		y = null; //no matching style rules found
	}
	else if(l === 1)
	{
		y = y[0];	//return single object
	}
	
	return y;
	
}



/**
*	@function				$cssvalue
*	@description			Returns the value of the specified style attribute from the matching style rules.
*	@param {String} n		Name. Name of the style rule. Alternatively specify a Regular Expression using the RegExp object for custom matching.
*	@param {String} a		Style Attribute. Name of the style attribute to get the value of e.g. backgroundColor. This is case sensitive.
*	@param {Boolean} ci		(Optional) Case Insensitive Matching. true = compare with no case, false = case sensitive comparison. Default = false.
*	@param {Integer} si		(Optional) Stylesheet index. Use this to prevent looking through all stylesheets.
*	@returns {String}		Value of the style attribute. If there is more than one definition of this attribute in matching style sheet rules then
*							the last value found will take precedence.
*/
function $cssvalue(n,a,ci,si)
{
	//v:	value of style attribute
	//s:	matching style sheet rules
	//l:	length of s
	//m:	temporary value
	var v = null, s = $css(n,ci,si), l = $ln(s), m;
	
	if(s)
	{
		if($isa(s))
		{
			for(var i = 0; i < l; i++)
			{
				var so = s[i];
				m = s[i][a];
				if(!$ise(m))
				{
					v = m;
				}
			}
		}
		else
		{
			v = s[a];
		}
	}
	
	return v;
	
}


/**
*   @function                       $ev
*   @description                    Evaluate String. Pseudonym for eval.
*   @param      {String}        s   String to be evaluated.
*   @returns    null
*/
function $ev(s)
{
    eval(s);
}

/**
*   @function                       $dw
*   @description                    Document Write. Pseudonym for document.write.
*   @param      {String}        s   String to write.
*   @returns    null
*/
function $dw(s)
{
    document.write(s);
}

/**
*   @function                       $isIElt7
*   @description                    Is the browser Internet Explorer and less than version 7.
*   @description                    Useful for detecting users who are running Internet Explorer 6.
*   @returns    {Boolean}           True = Browser is Internet Explorer [1 - 6], else False.
*/
function $isIElt7()
{
    //r:    return flag
    //a:    navigator.appVersion
    var r = 0, a = navigator.appVersion;
    if(a && a.match(/MSIE\s[1,2,3,4,5,6]/))
    {
        r = 1;
    }
    return $psb(r);
}


/**
*   @function                       $isIE
*   @description                    Is the browser Internet Explorer. Useful for detecting users who are running Internet Explorer.
*   @returns    {Boolean}           True = Browser is Internet Explorer, else False.
*/
function $isIE()
{
    //r:    return flag
    //a:    navigator.appVersion
    var r = 0, a = navigator.appVersion;
    if(a && a.match(/MSIE/))
    {
        r = 1;
    }
    return $psb(r);
}

/**
*   @function                       $ruid
*   @description                    Random unique identifier. Similar to a GUID but uses random numbers to generate the id.
*   @since                          v1.0.7.20090731
*   @returns    {String}            Unique Identifier in the lowercase form xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx
*/
function $ruid()
{
    var r = [], i;
    for(i = 0; i < 36; i++)//32 + 4 "-" dividers
    {
        r[i] = $rand(15).toString(16);
        if(i == 7 || i == 12 || i == 17 || i == 22)
        {
            i++;
            r[i] = "-";
        }
    }
    
    return r.join("");
}

/***************************************************************************************
    Error Handling
    --------------------------
****************************************************************************************/

    //catches an error
    //m - message
    //l - location
    //o - object in error
    /**
    *   @function                       $error
    *   @description                    Catches an exception and outputs it to the debug window if debugging is defined.
    *   @param      {Exception} m       Exception
    *   @returns    null
    */
    function $error(x,l,o)
    {
        if(typeof $debug != "undefined")
        {
	        if(l)
	        {
		        $debug("Excecption Occured In: " + l);
		        $debug("-".repeat($ln(l) + 80));
	        }
            $debug(x);
        }
    }

/***************************************************************************************
****************************************************************************************/
