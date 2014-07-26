/******************************************************************************** 	
	Spiderscript Javascript Library						
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
*   File Name:      SS.global.js
*   Description:    Global Variable Declarations
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   None
*/

/**
* @namespace SS Spiderscript Namespace
*/
var SS = {};

SS.global = {

    controls    :       [],
    loaded      :       0,      //flag to indicate that the Spiderscript library has loaded ([0|1])
    nid         :       1,      //new id counter
    htmels      :       [],
    eeh         :       [],      //element event handler holder,
    url         :       "http://www.spiderscript.net/",
    trash       :       []      //array of elements to be destroyed
};

/**
*   @namespace  Boolean Data Type. [True | False]
*//*jslint evil: true */
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
/******************************************************************************** 	
	JSON										
	------------------------------------------------------				
	http://www.JSON.org/json2.js							
	2009-04-16									
	Public Domain.									
	NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.				
	See http://www.JSON.org/js.html							
********************************************************************************/ 	
/*
    http://www.JSON.org/json2.js
    2009-04-16

    Public Domain.

    NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.

    See http://www.JSON.org/js.html

    This file creates a global JSON object containing two methods: stringify
    and parse.

        JSON.stringify(value, replacer, space)
            value       any JavaScript value, usually an object or array.

            replacer    an optional parameter that determines how object
                        values are stringified for objects. It can be a
                        function or an array of strings.

            space       an optional parameter that specifies the indentation
                        of nested structures. If it is omitted, the text will
                        be packed without extra whitespace. If it is a number,
                        it will specify the number of spaces to indent at each
                        level. If it is a string (such as '\t' or '&nbsp;'),
                        it contains the characters used to indent at each level.

            This method produces a JSON text from a JavaScript value.

            When an object value is found, if the object contains a toJSON
            method, its toJSON method will be called and the result will be
            stringified. A toJSON method does not serialize: it returns the
            value represented by the name/value pair that should be serialized,
            or undefined if nothing should be serialized. The toJSON method
            will be passed the key associated with the value, and this will be
            bound to the object holding the key.

            For example, this would serialize Dates as ISO strings.

                Date.prototype.toJSON = function (key) {
                    function f(n) {
                        // Format integers to have at least two digits.
                        return n < 10 ? '0' + n : n;
                    }

                    return this.getUTCFullYear()   + '-' +
                         f(this.getUTCMonth() + 1) + '-' +
                         f(this.getUTCDate())      + 'T' +
                         f(this.getUTCHours())     + ':' +
                         f(this.getUTCMinutes())   + ':' +
                         f(this.getUTCSeconds())   + 'Z';
                };

            You can provide an optional replacer method. It will be passed the
            key and value of each member, with this bound to the containing
            object. The value that is returned from your method will be
            serialized. If your method returns undefined, then the member will
            be excluded from the serialization.

            If the replacer parameter is an array of strings, then it will be
            used to select the members to be serialized. It filters the results
            such that only members with keys listed in the replacer array are
            stringified.

            Values that do not have JSON representations, such as undefined or
            functions, will not be serialized. Such values in objects will be
            dropped; in arrays they will be replaced with null. You can use
            a replacer function to replace those with JSON values.
            JSON.stringify(undefined) returns undefined.

            The optional space parameter produces a stringification of the
            value that is filled with line breaks and indentation to make it
            easier to read.

            If the space parameter is a non-empty string, then that string will
            be used for indentation. If the space parameter is a number, then
            the indentation will be that many spaces.

            Example:

            text = JSON.stringify(['e', {pluribus: 'unum'}]);
            // text is '["e",{"pluribus":"unum"}]'


            text = JSON.stringify(['e', {pluribus: 'unum'}], null, '\t');
            // text is '[\n\t"e",\n\t{\n\t\t"pluribus": "unum"\n\t}\n]'

            text = JSON.stringify([new Date()], function (key, value) {
                return this[key] instanceof Date ?
                    'Date(' + this[key] + ')' : value;
            });
            // text is '["Date(---current time---)"]'


        JSON.parse(text, reviver)
            This method parses a JSON text to produce an object or array.
            It can throw a SyntaxError exception.

            The optional reviver parameter is a function that can filter and
            transform the results. It receives each of the keys and values,
            and its return value is used instead of the original value.
            If it returns what it received, then the structure is not modified.
            If it returns undefined then the member is deleted.

            Example:

            // Parse the text. Values that look like ISO date strings will
            // be converted to Date objects.

            myData = JSON.parse(text, function (key, value) {
                var a;
                if (typeof value === 'string') {
                    a =
/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2}(?:\.\d*)?)Z$/.exec(value);
                    if (a) {
                        return new Date(Date.UTC(+a[1], +a[2] - 1, +a[3], +a[4],
                            +a[5], +a[6]));
                    }
                }
                return value;
            });

            myData = JSON.parse('["Date(09/09/2001)"]', function (key, value) {
                var d;
                if (typeof value === 'string' &&
                        value.slice(0, 5) === 'Date(' &&
                        value.slice(-1) === ')') {
                    d = new Date(value.slice(5, -1));
                    if (d) {
                        return d;
                    }
                }
                return value;
            });


    This is a reference implementation. You are free to copy, modify, or
    redistribute.

    This code should be minified before deployment.
    See http://javascript.crockford.com/jsmin.html

    USE YOUR OWN COPY. IT IS EXTREMELY UNWISE TO LOAD CODE FROM SERVERS YOU DO
    NOT CONTROL.
*/

/*jslint evil: true */

/*global JSON */

/*members "", "\b", "\t", "\n", "\f", "\r", "\"", JSON, "\\", apply,
    call, charCodeAt, getUTCDate, getUTCFullYear, getUTCHours,
    getUTCMinutes, getUTCMonth, getUTCSeconds, hasOwnProperty, join,
    lastIndex, length, parse, prototype, push, replace, slice, stringify,
    test, toJSON, toString, valueOf
*/

// Create a JSON object only if one does not already exist. We create the
// methods in a closure to avoid creating global variables.

if (!this.JSON) {
    /**
    *   @class          JSON
    *   @description    http://www.JSON.org/js.html.
    *                   2009-04-16.
    */
    JSON = {};
}
(function () {

    function f(n) {
        // Format integers to have at least two digits.
        return n < 10 ? '0' + n : n;
    }

    if (typeof Date.prototype.toJSON !== 'function') {

        Date.prototype.toJSON = function (key) {

            return this.getUTCFullYear()   + '-' +
                 f(this.getUTCMonth() + 1) + '-' +
                 f(this.getUTCDate())      + 'T' +
                 f(this.getUTCHours())     + ':' +
                 f(this.getUTCMinutes())   + ':' +
                 f(this.getUTCSeconds())   + 'Z';
        };

        String.prototype.toJSON =
        Number.prototype.toJSON =
        Boolean.prototype.toJSON = function (key) {
            return this.valueOf();
        };
    }

    var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
        escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
        gap,
        indent,
        meta = {    // table of character substitutions
            '\b': '\\b',
            '\t': '\\t',
            '\n': '\\n',
            '\f': '\\f',
            '\r': '\\r',
            '"' : '\\"',
            '\\': '\\\\'
        },
        rep;


    function quote(string) {

// If the string contains no control characters, no quote characters, and no
// backslash characters, then we can safely slap some quotes around it.
// Otherwise we must also replace the offending characters with safe escape
// sequences.

        escapable.lastIndex = 0;
        return escapable.test(string) ?
            '"' + string.replace(escapable, function (a) {
                var c = meta[a];
                return typeof c === 'string' ? c :
                    '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
            }) + '"' :
            '"' + string + '"';
    }


    function str(key, holder) {

// Produce a string from holder[key].

        var i,          // The loop counter.
            k,          // The member key.
            v,          // The member value.
            length,
            mind = gap,
            partial,
            value = holder[key];

// If the value has a toJSON method, call it to obtain a replacement value.

        if (value && typeof value === 'object' &&
                typeof value.toJSON === 'function') {
            value = value.toJSON(key);
        }

// If we were called with a replacer function, then call the replacer to
// obtain a replacement value.

        if (typeof rep === 'function') {
            value = rep.call(holder, key, value);
        }

// What happens next depends on the value's type.

        switch (typeof value) {
        case 'string':
            return quote(value);

        case 'number':

// JSON numbers must be finite. Encode non-finite numbers as null.

            return isFinite(value) ? String(value) : 'null';

        case 'boolean':
        case 'null':

// If the value is a boolean or null, convert it to a string. Note:
// typeof null does not produce 'null'. The case is included here in
// the remote chance that this gets fixed someday.

            return String(value);

// If the type is 'object', we might be dealing with an object or an array or
// null.

        case 'object':

// Due to a specification blunder in ECMAScript, typeof null is 'object',
// so watch out for that case.

            if (!value) {
                return 'null';
            }

// Make an array to hold the partial results of stringifying this object value.

            gap += indent;
            partial = [];

// Is the value an array?

            if (Object.prototype.toString.apply(value) === '[object Array]') {

// The value is an array. Stringify every element. Use null as a placeholder
// for non-JSON values.

                length = value.length;
                for (i = 0; i < length; i += 1) {
                    partial[i] = str(i, value) || 'null';
                }

// Join all of the elements together, separated with commas, and wrap them in
// brackets.

                v = partial.length === 0 ? '[]' :
                    gap ? '[\n' + gap +
                            partial.join(',\n' + gap) + '\n' +
                                mind + ']' :
                          '[' + partial.join(',') + ']';
                gap = mind;
                return v;
            }

// If the replacer is an array, use it to select the members to be stringified.

            if (rep && typeof rep === 'object') {
                length = rep.length;
                for (i = 0; i < length; i += 1) {
                    k = rep[i];
                    if (typeof k === 'string') {
                        v = str(k, value);
                        if (v) {
                            partial.push(quote(k) + (gap ? ': ' : ':') + v);
                        }
                    }
                }
            } else {

// Otherwise, iterate through all of the keys in the object.

                for (k in value) {
                    if (Object.hasOwnProperty.call(value, k)) {
                        v = str(k, value);
                        if (v) {
                            partial.push(quote(k) + (gap ? ': ' : ':') + v);
                        }
                    }
                }
            }

// Join all of the member texts together, separated with commas,
// and wrap them in braces.

            v = partial.length === 0 ? '{}' :
                gap ? '{\n' + gap + partial.join(',\n' + gap) + '\n' +
                        mind + '}' : '{' + partial.join(',') + '}';
            gap = mind;
            return v;
        }
    }

// If the JSON object does not yet have a stringify method, give it one.

    if (typeof JSON.stringify !== 'function') {
        JSON.stringify = function (value, replacer, space) {

// The stringify method takes a value and an optional replacer, and an optional
// space parameter, and returns a JSON text. The replacer can be a function
// that can replace values, or an array of strings that will select the keys.
// A default replacer method can be provided. Use of the space parameter can
// produce text that is more easily readable.

            var i;
            gap = '';
            indent = '';

// If the space parameter is a number, make an indent string containing that
// many spaces.

            if (typeof space === 'number') {
                for (i = 0; i < space; i += 1) {
                    indent += ' ';
                }

// If the space parameter is a string, it will be used as the indent string.

            } else if (typeof space === 'string') {
                indent = space;
            }

// If there is a replacer, it must be a function or an array.
// Otherwise, throw an error.

            rep = replacer;
            if (replacer && typeof replacer !== 'function' &&
                    (typeof replacer !== 'object' ||
                     typeof replacer.length !== 'number')) {
                throw new Error('JSON.stringify');
            }

// Make a fake root object containing our value under the key of ''.
// Return the result of stringifying the value.

            return str('', {'': value});
        };
    }


// If the JSON object does not yet have a parse method, give it one.

    if (typeof JSON.parse !== 'function') {
        JSON.parse = function (text, reviver) {

// The parse method takes a text and an optional reviver function, and returns
// a JavaScript value if the text is a valid JSON text.

            var j;

            function walk(holder, key) {

// The walk method is used to recursively walk the resulting structure so
// that modifications can be made.

                var k, v, value = holder[key];
                if (value && typeof value === 'object') {
                    for (k in value) {
                        if (Object.hasOwnProperty.call(value, k)) {
                            v = walk(value, k);
                            if (v !== undefined) {
                                value[k] = v;
                            } else {
                                delete value[k];
                            }
                        }
                    }
                }
                return reviver.call(holder, key, value);
            }


// Parsing happens in four stages. In the first stage, we replace certain
// Unicode characters with escape sequences. JavaScript handles many characters
// incorrectly, either silently deleting them, or treating them as line endings.

            cx.lastIndex = 0;
            if (cx.test(text)) {
                text = text.replace(cx, function (a) {
                    return '\\u' +
                        ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
                });
            }

// In the second stage, we run the text against regular expressions that look
// for non-JSON patterns. We are especially concerned with '()' and 'new'
// because they can cause invocation, and '=' because it can cause mutation.
// But just to be safe, we want to reject all unexpected forms.

// We split the second stage into 4 regexp operations in order to work around
// crippling inefficiencies in IE's and Safari's regexp engines. First we
// replace the JSON backslash pairs with '@' (a non-JSON character). Second, we
// replace all simple value tokens with ']' characters. Third, we delete all
// open brackets that follow a colon or comma or that begin the text. Finally,
// we look to see that the remaining characters are only whitespace or ']' or
// ',' or ':' or '{' or '}'. If that is so, then the text is safe for eval.

            if (/^[\],:{}\s]*$/.
test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@').
replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {

// In the third stage we use the eval function to compile the text into a
// JavaScript structure. The '{' operator is subject to a syntactic ambiguity
// in JavaScript: it can begin a block or an object literal. We wrap the text
// in parens to eliminate the ambiguity.

                j = eval('(' + text + ')');

// In the optional fourth stage, we recursively walk the new structure, passing
// each name/value pair to a reviver function for possible transformation.

                return typeof reviver === 'function' ?
                    walk({'': j}, '') : j;
            }

// If the text is not JSON parseable, then a SyntaxError is thrown.

            throw new SyntaxError('JSON.parse');
        };
    }
}());
/*
*   File Name:      SS.locale.js
*   Description:    User Localization Parameters
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*/

//ul: user language
//cc: country code as defined in ISO 3166
//df: date format - use the specified date format - this takes prescidence over the country code / guess the date format routine
/**
*   @class              SS.locale User Localization
*   @param {String} ul  User Language
*   @param {String} cc  Country code as defined in ISO 3166
*   @param {String} df  Use the specified date format - this takes prescidence over the country code / guess the date format routine
*   @constructor
*/
SS.locale =     function(ul,cc,df)
                {
                    var t = this;
                    t.decimalpoint   =   ".";
                    t.currencysymbol =   "$";
                    t.days           =   ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                    t.days_abrv2     =   [];
                    t.days_abrv3     =   [];
                    t.days_letter    =   [];
                    t.months         =   ["January","February","March","April","May","June","July","August","September","October","November","December"];
                    t.months_abrv2   =   [];
                    t.months_abrv3   =   [];
                    t.months_letter  =   [];
                    t.userlanguage   =   $isd(ul) ? ul : "";
                    t.countrycode    =   $isd(cc) ? cc : "";
                    
                    
                    //set the default date format
                    t.dateformat = "MM/dd/yyyy"; //default format
                    if($iln("de,es,fr,gb,it",ul))
                    {
                        t.dateformat     =   "dd/MM/yyyy";
                    }
                    
                    t.days_de        =   ["Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag"];
                    t.days_es        =   ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"];
                    t.days_fr        =   ["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];
                    t.days_it        =   ["Domenica","Lunedi","Martedi","Mercoledi","Giovedi","Venerdi","Sabato"];
                    t.months_de      =   ["Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember"];
                    t.months_es      =   ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
                    t.months_fr      =   ["Janvier","Fèvrier","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Dècembre"];
                    t.months_it      =   ["Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre"];
                    
                    if(!ul)
                    {
                        ul = $lg2();
                    }
                    
                    //id:   index pointer days
                    //im:   index pointer months
                    
                    var id = "days_" + ul, im = "months_" + ul;
                    if(t[id])
                    {
                        t.days = t[id];
                    }
                    
                    if(t[im])
                    {
                        t.months = t[im];
                    }
                    
                    //d:    days
                    //m:    months
                    //i:    index pointer
                    var d = t.days, m = t.months, i;
                    
                    for(i = 0; i < $ln(d); i++)
                    {
                        t.days_abrv2.add(d[i].left(2));
                        t.days_abrv3.add(d[i].left(3));
                        t.days_letter.add(d[i].left(1));
                    }
                    
                    for(i = 0; i < $ln(m); m++)
                    {
                        t.months_abrv2.add(d[i].left(2));
                        t.months_abrv3.add(d[i].left(3));
                        t.months_letter.add(d[i].left(1));
                    }
                    
                    //check if a defined dateformat has been specified
                    if($isd(df))
                    {
                        //use the defined date format
                        df = $lc(df);
                        
                        //dl:   date delimiter - default "/"
                        var dl = "/", mt = df.match(/[\/\.\-]/); //date format delimiter
                        if(mt)
                        {
                            dl = mt[0];
                        }
                        
                        df = df.replace(dl,"").replace(dl,"");
                        
                        if(df == "yyyymmdd")
                        {
                            t.dateformat = "yyyy" + dl + "MM" + dl + "dd";
                        }
                        /*else*/if(df == "mmddyyyy")
                        {
                            t.dateformat = "MM" + dl + "dd" + dl + "yyyy";
                        }
                        /*else*/if(df == "ddmmyyyy")
                        {
                            t.dateformat = "dd" + dl + "MM" + dl + "yyyy";
                        }
                        //else invalid date/time format specified
                    }
                    
                };
            /*
*   File Name:      SS.events.js
*   Description:    Handles Page Wide Events
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.geom.js
*/

/**
*   @class  SS.events
*   @description    Provides a uniformed cross browser way to implement event triggered functions.
*   @static
*/
SS.events = 
{
	dbd		:	$dbd(),	//document dimensions
	lstrs	:	{},
	dropzone    :   null,
    /**
    *   @function                       add
    *   @description                    Attaches a function to a browser based event. e.g. window, document, document.body ...
    *   @param       {String}        y   Event Type. Name of the event to attach to e.g. onresize, onscroll, onmousemove...
    *   @returns    {function}          Reference to the added event. See {@link SS.events.removeById} to use this reference to remove the event.
    */
	add		:	function(y,f)
				{
				    //t:    SS.events
				    //l:    event listeners array
				    //d:    document object
				    //b:    document.body object
				    //w:    window object
				    //m:    "onmouse"
				    //ty:	target type
				    if(y)
				    {
						var t = SS.events, l = t.lstrs, d = document, b = d.body, w = window, m = "onmouse", ty = y.replace(/^on/i,"");
					    
						if(!l[y])
						{
							l[y] = [];
							var a = function(e){t.called.call(t,this,e,y);};
							
							if($iln("keydown,keypress,keyup,mousemove,mousedown,mouseup,mousewheel,mousescroll",ty))
							{
								if(d.addEventListener)
								{
									if(ty == "mousewheel" || ty == "mousescroll")
									{
										ty = "DOMMouseScroll";
									}
									d.addEventListener(ty, a, false);
								}
								else if (d.attachEvent)
								{
									d.attachEvent("on" + ty, a);
								}
								else
								{
									d["on" + ty] = a;
								}
							}
							else if($iln("onresize,onscroll",y))
							{
								w[y] = a;
							}
							else if($isd(d[y]))
							{
								d[y] = a;
							}
							else if($isd(b[y]))
							{
								//for the onscroll event and any other event not defined in the document object
								b[y] = a;
							}
							else if(y == "ssonload" && SS.global.loaded && $isf(f))
							{
								//framework has already loaded therefore this event will not first, therefore fire as functions
								//are added to its listener
								f.call(document.body);
							}
							else
							{ 
								//add to the body event anyway
								b[y] = a;
							}
						}
						if(l[y])
						{
							l[y].add(f);
						}
						
						return y + '_' + ($ln(l[y]) - 1);
					}
				},
    /**
    *   @function                       remove
    *   @description                    Remove function from listener.
    *   @param      {String}        y   Event Type. Name of the event which the function is currently attached to. e.g. onresize, onscroll, onmousemove...
    *   @param      {Function}      f   Function to be removed. If this function hasn't been assigned to the event lister then it cannot be removed.
    *   @returns    null
    */
	remove	:	function(y,f)
				{
				    //a:    event array
				    var a = SS.events.lstrs[y];
					if(a)
					{   
						a.remove(f);
					}				
				},
    /**
    *   @function                       removeById
    *   @description                    Remove function by Id from listener
    *   @param      {String}        id  Id of the event function that is to be removed, as returned by {@link SS.events.add}
    *   @returns    null
    */
	removeById: function(id)
	            {
	                if(id)
	                {
	                    //z:    ids
				        //a:    event array
	                    var z = id.split("_"), a = SS.events.lstrs[z[0]];
	                    if(a)
					    {   
						    a.removeAt(z[1]);
					    }
					}	                
	            },
    /**
    *   @function                       called
    *   @description                    Function to fire the appropriate listening functions in the event context.
    *   @param      {Object}       r    Control reference. Object that triggered the event.
    *   @param      {Event}        e    Event
    *   @param      {String}       y    Event Type Name            
    *   @returns    null
    */
	called	:	function(r,e,y)
				{
				    //l:    event listeners array
				    //i:    index pointer
				    //d:    delta
				    //e:    event
				    //a:    event array
				    //n:    length of event array
				    //m:	current document body dimensions
				    var l = SS.events.lstrs, i, d, e = $e(e), a = l[y], n = $ln(a), m;
				    
				    for(i = 0; i < n; i++)
					{
					    if($isf(a[i]))
					    {
					        if(y == "onmousewheel" || y == "onmousescroll")
					        {
					            /* onmousewheel/scroll event formatting by adding the delta value */
					            //negative: wheel forward   positive:wheel backwards
					            d = e.wheelDelta || e.detail;
					            
                                if(d > -120 && d < 120)
                                {
                                    d = d * -40;
                                }
                                e.delta = (d > 0) ? -1 : 1;
                            }
                            else if(y == "onresize")
                            {
								m = $dbd();
								if(m.h == SS.events.dbd.h && m.w == SS.events.dbd.w)
								{
									//document hasn't been resized. ignore.
									break;	//cancel out of calling all the functions for this event
								}
                            }
                            
					        /* call the function with the event */
					        a[i].call(r,e);
					    }
					}
					
					if(y == "onresize")
					{
						//update the document body dimensions
						SS.events.dbd = $dbd();
					}
				},
    /**
    *   @function                       dzr
    *   @description                    Drop Zone Register. Registers a drop zone control into the events model to receive alerts when an object is
    *                                   drag over the specified element
    *   @param      {SS.control.dropzone}   dz    Control reference. Object that triggered the event.
    *   @returns    null
    */
	dzr :       function(dz)
	            {
	                if(dz)
	                {
	                    //check to see if the control already exists, if it does update else create
	                    
	                    //t:    SS.events
	                    //p:    position of dropzone component within the array. Null if does not exist
	                    //d:    drop zones
	                    //z:    drop zone
	                    var t = SS.events, p, d = t.dropzone;
	                    if(!d)
	                    {
	                        t.add("onmousemove",function(e){SS.events.dze.call(SS.events,e);});
	                        t.add("onmouseup",function(e){SS.events.dze.call(SS.events,e);});
	                        t.dropzone = [];
	                        d = t.dropzone;
	                    }
	                    else
	                    {
	                        for(var i = 0; i < $ln(d) && !p; i++)
	                        {
	                            z = d[i];
	                            if(z.id == dz.id)
	                            {
	                                //found the dropzone to update
	                                p = i;
	                            }
	                        }
	                    }
	                    
	                    if($isd(p))
	                    {
	                        d[p] = new t.dzc(dz);
	                    }
	                    else
	                    {
	                        d.add(new t.dzc(dz));
	                    }
	                    
	                }
	            },
    /**
    *   @function                       dze
    *   @description                    Drop Zone Event. Called when there is an event that the drop zone
    *                                   control may be interested in
    *   @param      {Event}     dz      Event that has been triggered.
    *   @returns    null
    */
	dze :       function(e)
	            {
	                e = $e(e);
	                
	                //z:    drop zones
	                //cs:   all controls
	                //c:    control
	                //i:    index pointer
	                //j:    index pointer
	                //d:    drop zone
	                //ad:   active dropzone
	                //x:    event co-ordinates x
	                //y:    event co-ordinates y
	                var z = SS.events.dropzone, cs = SS.global.controls, c, i, j, d, ad, x, y;
	                
	                if($ln(z) && $ln(cs))
	                {
	                    x = e.dX;
	                    y = e.dY;
	                    
	                    //run through an array of dropzone controls
	                    for(i = 0; i < $ln(z) && !ad; i++)
	                    {
	                        d = z[i]; //dropzone
	                        var p = d.coord;//position / co-ordinate
	                        //the mouse pointer is inside the container area
	                        if(x >= p.x && x <= (p.x + p.w) && y >= p.y && y < (p.y + p.h))
	                        {
	                         
                                if(d.active && e.type == "mouseup")
                                {
                                    for(j = 0; j < $ln(d.pids); j++)
                                    {
                                        var pid = d.pids[j];
                                        //this control has moved into the drop zone
                                        d.pids.remove(pid);
                                        d.cids.add(pid);
	                                    d.DragDrop.call($gc(d.id),e,$gc(pid));
                                    }
                                          
                                    d.active = 0;                                    
                                }
                                else
                                {
	                                //check to see if there are any controls which support
	                                //dragging that are being dragged
	                                for(j = 0; j < $ln(cs) && !ad; j++)
	                                {
	                                    c = cs[j];
    	                                
	                                    if(c._m)
	                                    {
	                                        if(!d.active)
	                                        {
	                                            d.DragFocus.call($gc(d.id),e,c);
	                                            d.active = 1;
	                                            if(d.pids.indexOf(c.id) < 0)
	                                            {
	                                                d.pids.add(c.id);
	                                            }	                                            
	                                        }
    	                                    
	                                        ad = d;
	                                    }
	                                }
	                            }
	                        }
	                        else
	                        {
	                            //mouse pointer has left the container
	                            if($ln(d.cids))
	                            {
	                                //find the moving control
	                                for(j = 0; j < $ln(cs) && !ad; j++)
	                                {
	                                    c = cs[j];
    	                                
	                                    if(c._m)
	                                    {
	                                        if(d.cids.indexOf(c.id) >= 0)
	                                        {
	                                            d.DragLeave.call($gc(d.id),e,c);
	                                            d.cids.remove(c.id);
	                                        }
	                                    }
	                                }
	                            }
	                        }
	                    }
	                    
	                    for(i = 0; i < $ln(z); i++)
	                    {   
	                        d = z[i];
                       
                            //check to see if there are any controls which support
                            //dragging that are being dragged
                            for(j = 0; j < $ln(cs) && !ad; j++)
                            {
                                c = cs[j];
                                
                                if(c._m)
                                {
                                    if(d.active)
                                    {
                                        
                                        if(d.pids.indexOf(c.id) >= 0)
                                        {
                                            //this id is already in 
                                            d.pids.remove(c.id);
                                        }
                                        else
                                        {
                                            //add id
                                            d.pids.add(c.id);
                                        }
                                        
                                        d.DragBlur.call($gc(d.id),e,c);
                                        d.active = 0;
                                    }
                                    
                                }
                            }
	                    }
	                    
	                }
	                
	            },
	/**
	*   @class  dzc
	*   @description    Drop Zone Co-ordindate. For use with the registering of drop zones to receive events
	*/
    dzc :       function(dz)
                {
                    var t = this;
                    t.id = dz.id;
                    t.coord = $xyz($g(dz.id)); //position of the drop zone
                    t.active = 0; //0 - drop zone is not active, 1 - drop zone is active.
                    t.cids = []; //captured control ids
                    t.pids = []; //pending control ids
                    t.DragBlur = dz.DragBlur;
                    t.DragFocus = dz.DragFocus;
                    t.DragDrop = dz.DragDrop;
                    t.DragLeave = dz.DragLeave;
                }

};

/**
*   @function               $ea
*   @description            Pseudonym for {@link SS.events.add}.
*/
var $ea = SS.events.add;
            
/**
*   @function               $erid
*   @description            Pseudonym for {@link SS.events.removeById}.
*/
var $erid = SS.events.removeById;


/**
*   @function               $e
*   @description            Get the event in a cross browser supported way. Add scroll information to the event as well.
*   @param      {Event} e   Event (typically null if Internet Explorer as the event is held in window.event)
*   @returns    {Event}    Maximum for the two numbers
*/
function $e(e)
{
    e = e || window.event;
    if(e)
    {
        e.dX = e.clientX + $dbsl();
        e.dY = e.clientY + $dbst();
        
        if(e.detail && e.type == "DOMMouseScroll")
        {   /*Mozilla onmousescroll x and y co-ordinate issue where values do not represent actual mouse cursor position fix.*/
            e.dX = $min(e.dX,e.screenX + $dbsl());
            e.dY = $min(e.dY,e.screenY + $dbst());
        }
    }
    return e;
}

/**
*   @function               $ec
*   @description            Event Cancel. Cancel a JavaScript event and stops it from bubbling / propagating any further.
*   @param      {Event} e   Event to be cancelled.
*   @returns    {Boolean}   false
*/
function $ec(e)
{
    if(e && $isd(e.stopPropagation))
	{
        if(e.preventDefault)
        {
            e.preventDefault();
        }
		e.stopPropagation();
	}
	else if(window.event)
	{
		e = window.event;
		e.returnValue = false;
		e.cancelBubble = true;
	}
	
	return false;
}
            
          


/***************************************************************************************
    Element Event Handling
    -----------------------
****************************************************************************************/
    
    /**
    *   @function                       $eehadd
    *   @description                    Element Event Handler Add. Allows more than one function to be assigned to
    *                                   an event handler of an element.
    *                                   Adds a function (f) to the element (l) to be executed on event type (v).
    *   @param      {HTMLElement} l     Element to assign the event handler to.
    *   @param      {String}      v     Event type. e.g. onclick.
    *   @param      {Function}    f     Function to execute on the event.
    *   @returns    null
    */
    function $eehadd(l,v,f)
    {
        if(l && !l.id)
        {
            l.id = $nid();
        }
        
        if(l && l.id && v && f)
        {
            //i:    pointer
            //x:    control (in loop)
            //c:    control
            //h:    element event handlers
            var i, x, c, h = SS.global.eeh;
            v = v.replace(/^on/,"");
            
            for(i = 0; i < $ln(h); i++)
            {
                x = h[i];
                if(x && x.id && x.id == l.id)
                {
                    c = x;
                    break;
                }
            }
            
            if(!c)
            {
                //create a new entry as no matching entry was found
                c = {};
                c.id = l.id;
                h.add(c);
            }
            
            if(c[v])
            {
                //a previous function has already been defined, attach to this event
                c[v].add(f);
            }
            else
            {
                //create a new call to the function when the event is fired
                c[v] = [];
                c[v].add(f);
            }
            
            
            l["on" + v] =   function(e)
                            {
                                return $eehcalled(this,e);
                            };                   
        }
    }
    
    /**
    *   @function               $eehclear
    *   @description            Element Event Handler - Clear. Removes the event against the specified element if the event is specified.
    *   @param      {Event} e   Event to be cancelled.
    *   @returns    {Boolean}   false
    */
    function $eehclear(l,v)
    {
        if(l && l.id)
        {
            //h:    element event handlers
            //i:    index pointer    
            //x:    h[i]        
            var h = SS.global.eeh, i, x;
            
            if(v)
            {
                v = v.replace(/^on/,"");
            } 
            
            for(i = 0; i < $ln(h); i++)
            {
                x = h[i];
                if(x && x.id && x.id == l.id)
                {
                    c = x;
                    break;
                }
            }
            
            if(c)
            {
                h.remove(c);
            }
        }
    }

    /**
    *   Element Event Handler - called
    *   ----------------------------------------
    *
    *   Attached to each elements event so this function can cascade the event to other registered functions
    */
    /**
    *   @function                       $eehclear
    *   @description                    Element Event Handler - called. Attached to each elements event so this function can cascade the event to other registered functions.
    *   @param      {HTMLElement}   l   Element where the raised event originated from.
    *   @param      {Event}         e   Triggered event.
    *   @returns    {Object}        r   Return value from function.
    */
    function $eehcalled(l,e)
    {
        e = $e(e);
        if(l && l.id && e)
        {
            
            //c:    control (loop)
            //i:    index pointer
            //m:    matched control
            //h:    element event handlers
            //t:    event type
            //r:    return value
            //f:    function
            //o:    executed function return value
            //a:    m[t]
            var c, i, m, h = SS.global.eeh, t = e.type, r, f, o, a;
            
            for(i = 0; i < $ln(h); i++)
            {
                c = h[i];
                if(c && c.id == l.id)
                {
                    m = c;
                    break;
                }
            }
            
            if(m && m[t])
            {
                a = m[t];
                for(i = 0; i < $ln(a); i++)
                {
                    f = a[i];
                    if($isf(f))
                    {
                        o = f.call(l,e);          //execute function
                        if(!$ise(o))
                        {
                            r = o;
                            break;
                        }
                    }
                    else
                    {
                        return $ef(f,this,e);     //execute string function
                    }
                    
                }
            }
            
            return r;
        }
    }



/***************************************************************************************
****************************************************************************************/

          /*
*   File Name:      SS.datetime.js
*   Description:    Date / Time Functionality
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.locale.js
*/

/**
*   @class SS.datetime Date/Time Functionality
*   @static
*/
SS.datetime =
{
                    /**
                    *   @property {Array}   formats
                    *   @description        Defined date / time formats.
                    */
	formats	:	[	
					["yyyy/MM/dd","^(((\\d{4})([/|\\.|-])(0?[13578]|10|12)([/|\\.|-])(0?[1-9]|[12][0-9]|3[01]))|((\\d{4})([/|\\.|-])(0?[469]|11)([/|\\.|-])(0?[1-9]|[12][0-9]|30))|((\\d{4})([/|\\.|-])(0?2)([/|\\.|-])(0?[1-9]|1[0-9]|2[0-8]))|(([02468][048]00)(\\.|-|\\/)(0?2)([/|\\.|-])(29))|(([13579][26]00)([/|\\.|-])(0?2)([/|\\.|-])(29))|(([0-9][0-9][0][48])([/|\\.|-])(0?2)([/|\\.|-])(29))|(([0-9][0-9][2468][048])([/|\\.|-])(0?2)([/|\\.|-])(29))|(([0-9][0-9][13579][26])([/|\\.|-])(0?2)([/|\\.|-])(29)))$"],
					["MM/dd/yyyy","^(((0?[13578]|10|12)([/|\\.|-])(0?[1-9]|[12][0-9]|3[01])([/|\\.|-])(\\d{4}))|((0?[469]|11)([/|\\.|-])(0?[1-9]|[12][0-9]|30)([/|\\.|-])(\\d{4}))|((0?2)([/|\\.|-])(0?[1-9]|1[0-9]|2[0-8])([/|\\.|-])(\\d{4}))|((0?2)([/|\\.|-])(29)(\\.|-|\\/)([02468][048]00))|((0?2)([/|\\.|-])(29)([/|\\.|-])([13579][26]00))|((0?2)([/|\\.|-])(29)([/|\\.|-])([0-9][0-9][0][48]))|((0?2)([/|\\.|-])(29)([/|\\.|-])([0-9][0-9][2468][048]))|((0?2)([/|\\.|-])(29)([/|\\.|-])([0-9][0-9][13579][26])))$"],
					["dd/MM/yyyy","^(((0?[1-9]|[12][0-9]|3[01])([/|\\.|-])(0?[13578]|10|12)([/|\\.|-])(\\d{4}))|((0?[1-9]|[12][0-9]|30)([/|\\.|-])(0?[469]|11)([/|\\.|-])(\\d{4}))|((0?[1-9]|1[0-9]|2[0-8])([/|\\.|-])(0?2)([/|\\.|-])(\\d{4}))|((29)(\\.|-|\\/)(0?2)([/|\\.|-])([02468][048]00))|((29)([/|\\.|-])(0?2)([/|\\.|-])([13579][26]00))|((29)([/|\\.|-])(0?2)([/|\\.|-])([0-9][0-9][0][48]))|((29)([/|\\.|-])(0?2)([/|\\.|-])([0-9][0-9][2468][048]))|((29)([/|\\.|-])(0?2)([/|\\.|-])([0-9][0-9][13579][26])))$"],
					["HH:mm:ss.ffff","^(((([0]?[1-9]|1[0-2]))(:|\\.)([0-5][0-9])((:|\\.)([0-5][0-9]))?(AM|am|aM|Am|PM|pm|pM|Pm))|(([0]?[0-9]|1[0-9]|2[0-3])(:|\\.)([0-5][0-9])((:|\\.)([0-5][0-9]))?(\\.(\\d{1,4}))?))$"]
				],

	                /**
	                *	@function           SS.datetime.getFormat
	                *   @description        Returns the format that the date / time is in.
	                *	                    If not match found, returns null.
	                *	@param {String} dt  Date time string.
	                *	@param {String} df  Default date format(df) the date/time should be when encountering ambigous dates e.g. 03/02/2009 could be 2nd March 2009 (MM/dd/yyyy) or 3rd February 2009 (dd/MM/yyyy).
	                *			            "MM/dd/yyyy" = Default date format.
	                *                       If not specified, then all matches are returned.
	                *	
	                *	@returns	{String} - Date / time format (if only one match found or defaultFormat specified)
	                *				OR
	                *				{Array} array[string,string,...] array of date time formats matched.
	                */
	getFormat :		function(dt,df)
					{
						
						df = ($isd(df) ? df : null);
						
					    //f:    SS.datetime.formats
					    //i:    index pointer
					    //r:    return format	
					    //m:    format pointer
						var f = SS.datetime.formats, i, r = null, m;
							
						if($iss(dt) && dt !== "")
						{									
							
							for(i = 0; i < $ln(f); i++)
							{
								if(dt.match(f[i][1]))
								{
								    m = f[i][0];
									if($isd(df) && df !== null && $lc(df).replace(/[\/|\.|\-]/g,"") == $lc(f[i][0]).replace(/[\/|\.|\-]/g,""))
									{
										r = m;
										break;
									}
									else if(!$isd(df))
									{
										if(r)
										{
											//duplicate match found, return array
											r = [r,m];
										}
										else
										{
											//first match found
											r = m;
										}
									}
									else if(!r && $isd(df))
									{
										r = m;
									}
								}
								
							}
						}
						return r;
					},
	                /**
	                *   @function           SS.datetime.fromString
	                *	@description        Takes a string input and returns its date/time representation as a date object
	                *	@param {String} s	Date/Time String
	                *	@param {String} df  Default date format(df) the date/time should be when encountering ambigous dates e.g. 03/02/2009 could be 2nd March 2009 (MM/dd/yyyy) or 3rd February 2009 (dd/MM/yyyy).
	                *			            If df is not specified then the locale default will be used. If this has not be defined then "MM/dd/yyyy" will be used as the default date format.
	                *	
	                *	@returns {Date}		If unable to parse date/time passed, null is returned.
	                *	
	                */
	fromString:	    function(s,df,d)
				    {
					    //d: used when being called by itself to solve other formats
					    if($ise(s))
					    {
						    return null;
					    }
					    else
					    {
					        //ds:   date split
					        //p:    SS.datetime.parse
					        //i:    index pointer
							//t:	temporoary date
							//g:    SS.global
							//l:    length of date split
					        var ds = s.split(" "), p = SS.datetime, i, t, g = SS.global, l = $ln(ds);
						    if(l > 1)
						    {
							    for(i = 0; i < l; i++)
							    {
							        t = p.fromString(ds[i],df,d);
								    if(d)
								    {
									    //d has already been defined
									    //assume that the time is in the second part.
									    //add time values into d
									    d.setHours(t.getHours());
									    d.setMinutes(t.getMinutes());
									    d.setSeconds(t.getSeconds());
									    d.setMilliseconds(t.getMilliseconds());
								    }
								    else
								    {
								        d = t;
								    }
								}
						    }
						    else
						    {
						        
								if($ise(df) && g && g.locale)
								{
									df = g.locale.dateformat;
								}
							    df = p.getFormat(s,df);
							    if($isa(df) && df[0])
							    {	
								    //more than one date format returned. take first format retuned.
								    df = df[0];
							    }
    							
							    d = null;
							    if(df)
							    {
								    //remove any date/time spliters e.g. / . : -
								    df = $lc(df).replace(/[\/|\.|\-|:]/g,"");
    								
								    if(df == "ddmmyyyy")
								    {
									    d = new Date(s.substring(s.search(/\d{4}/)) + "/" + s.substring(s.search(/[\/|\.|\-]/)+1,s.search(/[\/|\.|\-]\d{4}$/)) + "/" + s.substring(s.search(/^\d{1,2}/),s.search(/[\/|\.|\-]/)));
								    }
								    if(df == "mmddyyyy")
								    {
								        d = new Date(s.substring(s.search(/\d{4}/)) + "/" + s.substring(s.search(/^\d{1,2}/),s.search(/[\/|\.|\-]/)) + "/" + s.substring(s.search(/[\/|\.|\-]/)+1,s.search(/[\/|\.|\-]\d{4}$/)));
								    }
								    if(df == "yyyymmdd")
								    {
								        d = new Date(s.replace(/\./g,"/").replace(/\-/g,"/"));
								    }
								    if(df == "hhmmssffff")
								    {
								        d = (d) ? d : new Date("1970/01/01 00:00:00");
    								    
    								    //a:    array of matches - uses the 4th format regular expressions to match time parts
    								    //th:   hours
    								    //tm:   minutes
    								    //ts:   seconds
    								    //tf:   fractions of a second
										var a = s.match(SS.datetime.formats[3][1]), th = $ise(a[4]) ? a[12] : a[4], tm = $ise(a[6]) ? a[14] : a[6], ts = $ise(a[9]) ? a[17] : a[9], tf = a[19];
										
										//ampm
										if($lc(a[10]) == "pm" && th && th < 12)
										{
											th = $n(th) + 12;	//add 12 hours to the time only if the time is before 12pm
										}
										    									
									    d.setHours(th);
									    d.setMinutes(tm);
									    if(ts)
									    {
										    d.setSeconds(ts);
									    }
									    if(tf)
									    {
										    d.setMilliseconds(tf);
									    }
								    }
    								
							    }
						      /*else invalid format detected (d = null)*/
						    }
						    return d;
					    }
				    },
                    /**
                    *   @function               SS.datetime.format
                    *   @description            Formats the Date object given into the specified format
                    *   @param {Date}   d       Date to be formatted
                    *   @param {String} f       Format the date based on this string
                    *   @param {SS.locale} lc   Locale: use a specified locale object
                    */
    format    :     function(d,f,lc)
                    {
                        if(d && !$ise(f))
                        {
                            //a:    formatted
                            //y:    year
                            //M:    month
                            //da:   Date
                            //sc:   Secomds
                            //mm:   minutes
                            //ms:   milliseconds
                            //h:    hours
                            //g:    SS.global
                            //l:    locale
                            var a = f, y = $ts(d.getFullYear()), M = d.getMonth() + 1, da = d.getDate(), sc = d.getSeconds(), mm = d.getMinutes(), ms = $ts(d.getMilliseconds()) + "00", h = d.getHours(), g = SS.global, l;
                            ms = ms.left(3);
							
						    //get the day and month names to be used
						    if($isd(lc))
						    {
						        l = lc;
						    }
						    else if(g && g.locale)
						    {
						         l = g.locale;
						    }
						    else
						    {
						         l = new SS.locale();
						    }
						    
						    //dsf:  locale days
						    //msf:  locale months
						    //dsa:  locale 3 character abbreviated days
						    //dsa:  locale 3 character abbreviated months
						    var dsf = l.days, msf = l.months, dsa = l.days_abrv3, msa = l.months_abrv3;
																		
						    a = SS.datetime.preFormat(a);
							
						    a = a.replace(/\&01/g,y);
						    a = a.replace(/\&02/g,y.right(2));
						    a = a.replace(/\&03/g,dsf[d.getDay()]);
						    a = a.replace(/\&04/g,dsa[d.getDay()]);
						    a = a.replace(/\&05/g,(da<10) ? "0" + da : da);
						    a = a.replace(/\&06/g,da);
						    a = a.replace(/\&07/g,msf[M-1]);
						    a = a.replace(/\&08/g,msa[M-1]);
						    a = a.replace(/\&09/g,(M<10) ? "0" + M : M);
						    a = a.replace(/\&10/g,M);
						    a = a.replace(/\&11/g,(h < 10) ? h : ((h > 12 && h < 22) ? "0" + $n(h-12) : $n(h-12)));
						    a = a.replace(/\&12/g,(h<=12) ? h : $n(h - 12));
						    a = a.replace(/\&13/g,(h<10) ? "0"+h : h);
						    a = a.replace(/\&14/g,h);
						    a = a.replace(/\&15/g,(mm < 10) ? "0" + mm : mm);
						    a = a.replace(/\&16/g,(sc < 10) ? "0" + sc : sc);
						    //a = a.replace(/\&17/g,ms);
						    a = a.replace(/\&18/g,$ts($n("0." + ms).toFixed(3)).right(3));
						    a = a.replace(/\&19/g,$ts($n("0." + ms).toFixed(2)).right(2));
						    a = a.replace(/\&20/g,$ts($n("0." + ms).toFixed(2)).right(1));
							
						    return a;
						}
						else
						{
						    return null;
						}
                    },
                    /**
                    *   @function           SS.datetime.milliseconds
                    *   @description        Formats the number of milliseonds into a date/time string format
                    *   @param {Integer} ms Millisecond number to be formatted
                    *   @param {String} f   Format the date based on this string.
                    *   @returns {String}   Formatted string.
                    */
    milliseconds:   function(ms,f)
                    {
                        //sc:   seconds
                        //mm:   mintues
                        //hr:   hours
                        //da:   days
                        //msf:  milliseconds formatted
                        //a:    formatted
                        //l:    length of milliseconds formatted
	                    var sc = (Math.floor(ms/1000) % 60).toFixed(0), mm = (Math.floor(ms/60000) % 60).toFixed(0), hr = (Math.floor(ms/3600000) % 24).toFixed(0), da = Math.floor(ms/86400000).toFixed(0), msf = $ts(ms), a = SS.datetime.preFormat(f), l = $ln(msf);
						if(l < 4)
						{
						    msf = "0".repeat(4 - l) + msf;
						}
						
            	        
                        //format the string
                        a = a.replace(/\&05/g,(da<10) ? "0" + da : da);
	                    a = a.replace(/\&06/g,da);
	                    a = a.replace(/\&11/g,(hr < 10) ? hr : ((hr > 12 && hr < 22) ? "0" + $n(hr-12) : $n(hr-12)));
	                    a = a.replace(/\&12/g,(hr<=12) ? hr : $n(hr - 12));
	                    a = a.replace(/\&13/g,($ln($ts(hr)) == 1) ? "0"+hr : hr);
	                    a = a.replace(/\&14/g,hr);
	                    a = a.replace(/\&15/g,($ln($ts(mm)) == 1) ? "0" + mm : mm);
	                    a = a.replace(/\&16/g,($ln($ts(sc)) == 1) ? "0" + sc : sc);
	                    //a = a.replace(/\&17/g,$ts(msf).right(4));
	                    a = a.replace(/\&18/g,$ts(msf).right(3));
	                    a = a.replace(/\&19/g,$ts(msf).right(2));
	                    a = a.replace(/\&20/g,$ts(msf).right(1));
	                    
	                    return a;
                    },
                    /**
                    *   @function           SS.datetime.preFormat
                    *   @description        Takes a date/time format string and replaces the
                    *                       friendly format codes with program specific codes
                    *                       to ensure the date is rendered correctly as a string.
                    *   @param {String} f   Date/time format string
                    *   @private
                    */
    preFormat   :   function(f)
	                {
	                    if(!$ise(f))
	                    {
					        f = f.replace(/yyyy/g,"&01");
					        f = f.replace(/yy/g,"&02");
					        f = f.replace(/dddd/g,"&03");
					        f = f.replace(/ddd/g,"&04");
					        f = f.replace(/dd/g,"&05");
					        f = f.replace(/d/g,"&06");
					        f = f.replace(/MMMM/g,"&07");
					        f = f.replace(/MMM/g,"&08");
					        f = f.replace(/MM/g,"&09");
					        f = f.replace(/M/g,"&10");
					        f = f.replace(/hh/g,"&11");
					        f = f.replace(/h/g,"&12");
					        f = f.replace(/HH/g,"&13");
					        f = f.replace(/H/g,"&14");
					        f = f.replace(/mm/g,"&15");
					        f = f.replace(/ss/g,"&16");
					        //f = f.replace(/ffff/g,"&17");
					        f = f.replace(/fff/g,"&18");
					        f = f.replace(/ff/g,"&19");
					        f = f.replace(/f/g,"&20");   
					    }
					    
					    return f;
	                },
	            /**
	            *   @function           SS.datetime.difference
	            *   @description        Calculates the positive floored difference between two dates.
	            *                       If no format is specified, returns number of milliseconds as number.
	            *   @param {Date} d1    First date to compare
	            *   @param {Date} d2    Second date to compare
	            *   @param {String} f   Format - format to return the difference in. Default is milliseonds if not specified.
	            *                       ms : milliseconds
                                        s : seconds
                                        mi : minutes
                                        h : hours
                                        d : days
                                        mo : months
                                        y : years
	            *   @returns {Integer}  Difference as {Integer} if format is not specified.
	            *   @returns {String>}  Difference in requested format.
	            */
	difference: function(d1,d2,f)
	            {
            	    //returns the difference in milliseconds or if f is defined, that format
            	    
            	    //n1:   numeric value of d1
            	    //n2:   numeric value of d2
            	    //d:    difference
            	    var d = d2.valueOf() - d1.valueOf();
            	    if(d < 0)
            	    {
            	        d = d * -1;
            	    }
            	    
            	    if(!$ise(f))
            	    {
        	        	f = $lc(f);
        	        	/* Already in millisecond format */
        	        	//if(f == "ms")
        	        	//{
        	        	//    d = d * 1;  
        	        	//}
        	        	if(f == "s")
        	        	{
        	        	    d = d / 1000;
        	        	}
        	        	if(f == "mi")
        	        	{
        	        	    d = d / 60000;
        	        	}
        	        	if(f == "h")
        	        	{
        	        	    d = d / 3600000;
        	        	}
        	        	if(f == "d")
        	        	{
        	        	    d = d / 86400000;
        	        	}
        	        	
            	    }
            	    return d;
	            }
};

/**
*   @function       $datediff
*   @description    Pseudonym for {@link SS.datetime.difference}.
*   @param id Identifier as returned from the setInterval or {@link $st} functions.
*/

$datediff = SS.datetime.difference;/*
*   File Name:      SS.util.js
*   Description:    Extra functions
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.locale.js
*/

/**
*   @function           $reverse
*   @description        Reverse String. Returns the string passed but in reverse order
*   @param {String} s   String to reverse
*   @returns            Reversed string.
*/
function $reverse(s)
{
    var r = "";
    if(s)
    {
        r = s.reverse();
    }
    return r;
}

/**
*   @function           toHexColor
*   @description        Takes an integer parameter and converts it to a 6 digit hexadecmial string
*   @param {Integer} v  Integer value between 0 (#000000) and 16777215 (#FFFFFF)
*   @returns {String}   Hexidecimal colour string.
*/
function $toHexColor(v)
{
	v = $reverse(v.toString(16));
	for(var i = v.length; i < 6; i++)
	{
		v += "0";
	}
	
	return "#" + $uc(v);
}

/**
*   @function           fromHexColor
*   @description        Takes an hexadecimal colour string and converts it to its {Integer} equivalent.
*   @param {String} v   Hexidecimal colour string. E.g. #000000
*   @returns {Integer}  Integer representation of the hexadecimal colour string.
*/
function $fromHexColor(v)
{
	if(v)
	{
	    return parseInt("0x" + $reverse(v).replace(/#/g,""),16);
	}	
}
/*
*   File Name:      SS.htmlextension.js
*   Description:    Extends standard html element functionality
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.locale.js
*/

/**
 * @namespace Extends HTML element functionality
 */
SS.htmlextension =
{
   /*
        Defined valdation types
        number      :   any valid number including floats
        wholenumber :   whole +/- number
   
        Notes
        -----------------
        attributes:-
            validate = [int,decimal,reg ex,date,time]
            mandatory errormsg = [yes,no,true,false,1,0,y,n]
            default
            onerror - function called when there has been an error
        
        if not error control is specified then a msgbox is used to display the error msg
        allow different styles of error alert e.g. nominated label, msgbox, moninated div, background highlighting
    */
                        /**
                        *   @function               inputvalidation
                        *   @description            Validates the HTML Input / Select Element. The validation cirteria is defined
                        *                           by the elements attributes. Attributes:
                        *                           validate = [int,decimal,reg ex,date,time]
                        *                           mandatory = [yes,no,true,false,1,0,y,n]
                        *                           errortext = Message to output when in error.
                        *                           onerror - function called when there has been an error
                        *   @param {HTMLElement} l  Input element to be validated.
                        *   @returns {Boolean}      Flag indicating that the input is valid. true = valid, faled = invalid.
                        */
    inputvalidation :   function(l,ft)
                        {
                            //ma:   input into field is mandatory
                            //va:   predefined validation types
                            //vx:   custom regular expression validation
                            //iv:   does the control implement input validation
                            //oc:   {string} = "onchange"
                            
                            var ma = $ga(l,"mandatory"), va = $ga(l,"validate"), vx = $ga(l,"regex"), iv = 0, oc = "onchange";
                                                        
                            if(va)
                            {
                                //a predefined input validation method has been specified
                                
                                //r:    regular expression
                                //m:    display message
                                //x,y,z:regular expressions code reduction
                                //v:    predevined validation type
                                var r, m, x, y, z, v = $lc(va);
                                if(v == "number")
                                {
                                    r = "^([\\+\\-])?((([1-9]))\\d*|0)(\\.\\d+)?$";
                                    m = "Number";
                                }
                                if(v == "wholenumber")
                                {
                                    r = "^([\\+\\-]?[1-9]\\d*|[0])$";
                                    m = "Whole Number";
                                }
                                if(v == "time")
                                {
                                    r = "^((([0]?[1-9]|1[0-2])(:|\\.)[0-5][0-9]((:|\\.)[0-5][0-9])?( )?(AM|am|aM|Am|PM|pm|pM|Pm))|(([0]?[0-9]|1[0-9]|2[0-3])(:|\\.)[0-5][0-9]((:|\\.)[0-5][0-9])?))$";
                                    m = "Time";
                                }
                                if(v == "email")
                                {
                                    x = "[0-9a-zA-Z]";
                                    //regex:"^([0-9a-zA-Z]([-.\\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\\w]*[0-9a-zA-Z]\\.)+[a-zA-Z]{2,9})$";
                                    r = "^("+x+"([-.\\w]*"+x+")*@("+x+"[-\\w]*"+x+"\\.)+[a-zA-Z]{2,9})$";
                                    m = "Email Address";
                                }
                                if(v == "date")
                                {
                                    //regex="^((([0][1-9]|[12][0-9]|3[01])(\\.|-|\\/)(0[13578]|10|12)(\\.|-|\\/)(\\d{4}))|(([0][1-9]|[12][0-9]|30)(\\.|-|\\/)(0[469]|11)(\\.|-|\\/)(\\d{4}))|(([0][1-9]|1[0-9]|2[0-8])(\\.|-|\\/)(02)(\\.|-|\\/)(\\d{4}))|((29)(\\.|-|\\/)(02)(\\.|-|\\/)([02468][048]00))|((29)(\\.|-|\\/)(02)(\\.|-|\\/)([13579][26]00))|((29)(\\.|-|\\/)(02)(\\.|-|\\/)([0-9][0-9][0][48]))|((29)(\\.|-|\\/)(02)(\\.|-|\\/)([0-9][0-9][2468][048]))|((29)(\\.|-|\\/)(02)(\\.|-|\\/)([0-9][0-9][13579][26])))|(((0[13578]|10|12)(\\.|-|\\/)([0][1-9]|[12][0-9]|3[01])(\\.|-|\\/)(\\d{4}))|((0[469]|11)(\\.|-|\\/)([0][1-9]|[12][0-9]|30)(\\.|-|\\/)(\\d{4}))|((02)(\\.|-|\\/)([0][1-9]|1[0-9]|2[0-8])(\\.|-|\\/)(\\d{4}))|((02)(\\.|-|\\/)(29)(\\.|-|\\/)([02468][048]00))|((02)(\\.|-|\\/)(29)(\\.|-|\\/)([13579][26]00))|((02)(\\.|-|\\/)(29)(\\.|-|\\/)([0-9][0-9][0][48]))|((02)(\\.|-|\\/)(29)(\\.|-|\\/)([0-9][0-9][2468][048]))|((02)(\\.|-|\\/)(29)(\\.|-|\\/)([0-9][0-9][13579][26])))|(((\\d{4})(\\.|-|\\/)(0[13578]|10|12)(\\.|-|\\/)([0][1-9]|[12][0-9]|3[01]))|((\\d{4}))(\\.|-|\\/)(0[469]|11)(\\.|-|\\/)([0][1-9]|[12][0-9]|30)|((\\d{4})(\\.|-|\\/)(02)(\\.|-|\\/)([0][1-9]|1[0-9]|2[0-8]))|(([02468][048]00)(\\.|-|\\/)(02)(\\.|-|\\/)(29))|(([13579][26]00)(\\.|-|\\/)(02)(\\.|-|\\/)(29))|(([0-9][0-9][0][48])(\\.|-|\\/)(02)(\\.|-|\\/)(29))|(([0-9][0-9][2468][048])(\\.|-|\\/)(02)(\\.|-|\\/)(29))|(([0-9][0-9][13579][26])(\\.|-|\\/)(02)(\\.|-|\\/)(29)))$";
                                    x = "(\\.|-|\\/)";
                                    y = "(\\.|-|\\/)(02)" + x;
                                    r = "^((([0][1-9]|[12][0-9]|3[01])"+x+"(0[13578]|10|12)"+x+"(\\d{4}))|(([0][1-9]|[12][0-9]|30)"+x+"(0[469]|11)"+x+"(\\d{4}))|(([0][1-9]|1[0-9]|2[0-8])"+y+"(\\d{4}))|((29)"+y+"([02468][048]00))|((29)"+y+"([13579][26]00))|((29)"+y+"([0-9][0-9][0][48]))|((29)"+y+"([0-9][0-9][2468][048]))|((29)"+y+"([0-9][0-9][13579][26])))|(((0[13578]|10|12)"+x+"([0][1-9]|[12][0-9]|3[01])"+x+"(\\d{4}))|((0[469]|11)"+x+"([0][1-9]|[12][0-9]|30)"+x+"(\\d{4}))|((02)"+x+"([0][1-9]|1[0-9]|2[0-8])"+x+"(\\d{4}))|((02)"+x+"(29)"+x+"([02468][048]00))|((02)"+x+"(29)"+x+"([13579][26]00))|((02)"+x+"(29)"+x+"([0-9][0-9][0][48]))|((02)"+x+"(29)"+x+"([0-9][0-9][2468][048]))|((02)"+x+"(29)"+x+"([0-9][0-9][13579][26])))|(((\\d{4})"+x+"(0[13578]|10|12)"+x+"([0][1-9]|[12][0-9]|3[01]))|((\\d{4}))"+x+"(0[469]|11)"+x+"([0][1-9]|[12][0-9]|30)|((\\d{4})"+y+"([0][1-9]|1[0-9]|2[0-8]))|(([02468][048]00)"+y+"(29))|(([13579][26]00)"+y+"(29))|(([0-9][0-9][0][48])"+y+"(29))|(([0-9][0-9][2468][048])"+y+"(29))|(([0-9][0-9][13579][26])"+y+"(29)))$";
                                    m = "Date";
                                }
                                if(v == "money")
                                {
                                    r = "^([\\$\\u00A3\\u20AC\\u00A5\\u0192])?([\\+\\-])?([\\.,]\\d{3}|\\d{1,2})+([\\.,]\\d{2})?$";
                                    m = "Money";
                                }
                                
                                //add 'Invalid ' prefix to message
                                m = "Invalid " + m;
                                
                                if(r)
                                {
                                    //set the regular expression parameter equal to the predefined regex formula
                                    $sa(l,"regex",r);
                                }
                                if($ise($ga(l,"errortext")))
                                {
                                    //set the default error message if one hasn't already been specified
                                    $sa(l,"errortext",m);
                                }
                            }
                                                   
                            if($psb(ma) || va || vx)
                            {
                                $eehadd(l,oc,l[oc]);
                                $eehadd(l,oc,function(e){SS.htmlextension.validate(this);});
                                iv = 1; //control implements input validation
                            }
                            
                            
                            //add the id of the html control into an array for future use
    			            SS.htmlextension.addElement(l,ft);
    			            return $tb(iv);
                        
                        },
                    /**
                    *   @function               SS.htmlextension.textarea
                    *   @description            Extend functionality for the HTML textarea by adding
                    *                           support for the maxlength attribute and validation.
                    *   @param {HTMLElement} l  Text area element.   
                    *   @returns {Boolean}      True if validation is enabled.
                    */
    textarea    :   function(l)
                    {
                        //ml:   maxlength attribute value
                        //kd:   {string} = "onkeydown"
                        //ku:   {string} = "onkeyup"
                        //oc:   {string} = "onchange"
                        //f:    onkeydown function
                        //u:    onkeyup function
                        //h:    onchange function
                        var ml = $ga(l,"maxlength"), kd = "onkeydown", ku = "onkeyup", oc = "onchange", f = l[kd], u = l[ku], h = l[oc];
                        
                        if(ml)
                        {
                            //the maxlength attribute has been specified for the textarea
                            
                            var k = function(e)
                                    {
                                        e = $e(e);
                                        //m:    maximum length
                                        //c:    character code
                                        //x:    boolean flag to indicate if input is okay i.e. hasn't exceeded maximum limit
                                        var m = $ga(l,"maxlength"), c = $cc(e), x = 1, v = this.value;
                                        if(m && $ln(v) >= m && !($il("8,9,13,16,17,18,19,20,27,45,46,91,92,93,144,145",c) || c >= 33 && c <= 40 || c >= 112 && c <= 123 || e.ctrlKey || e.altKey || e.metaKey))
                                        {
                                            x = 0;
                                            this.value = v.left(m); //opera fix as it seems to ignore the cancelling of the event
                                        }
                                        return $tb(x);
                                    };
                            
                            l.onkeydown = k;  
                            l.onkeyup = k;  
                            $eehadd(l,kd,k);
                            $eehadd(l,kd,f);
                            $eehadd(l,ku,k); //added onkeyup function to fix issue in Opera with the onkeydown not working the same as other browsers
                            $eehadd(l,ku,u);
                            
                            var c = function(e)
                                    {
                                        //m:    maximum length
                                        //v:    this.value
                                        var m = $ga(l,"maxlength"), v = this.value;
                                        if(m && v.length > m)
                                        {
                                            v = v.left(m);
                                        }
                                        this.value = v;
                                        return 1;
                                    };
                            $eehadd(l,oc,c);
                            $eehadd(l,oc,h);
                        }
                        //return true if input validation is added to this control
                        return SS.htmlextension.inputvalidation(l);

                    },
                    /**
                    *   @function               SS.htmlextension.isvalid
                    *   @description            Extend functionality for the HTML textarea by adding
                    *                           support for the maxlength attribute.
                    *   @param {HTMLElement} l  Text area element.   
                    */
    isvalid    :    function(l)
                    {
                        //c:    check  - default = 1 (assumed pass)
                        //l:    element value
                        //ma:   mandatory attribute
                        //rx:   regular expression
                        //o:    linkto attribute (output)
                        //m:    errortext attribute (message)
                        var c = 1, v = l.value, ma = $ga(l,"mandatory"), rx = $ga(l,"regex"), o = $g($ga(l,"linkto")), m = $ga(l,"errortext");
                                                
                        if($ise(v) && $psb(ma))
                        {
                            //FAIL
                            //value is empty and field is mandatory
                            c = 0;
                        }
                        else if($ise(v))
                        {
                            //PASS
                            //value is empty which is okay as the field isn't mandatory therefore
                            //no further checks are needed
                            c = 1;
                        }
                        else if(rx)
                        {
                            //a regular expression has been specified
                            
                            if(v.match(rx))
                            {
                                //PASS
                                //regular expression match
                                c = 1;
                            }
                            else
                            {
                                //FAIL
                                c = 0;
                            }
                        }
                        /*
                        else
                        {
                            //PASS
                            //value is okay
                            c = 1;
                        }
                        */
                        
                        if(o && (ma || rx))
                        {
                            //output the error message to the label
                            o.innerHTML = (c) ? "" : $ts(m);
                        }

                        return $tb(c);
                    },
                    /**
                    *   @function           SS.htmlextension.validate
                    *   @description        Validates all the fields within the context of the current form or specified group name
                    *   @param {String}  g  Group Name (optional)
                    *   @returns {Boolean}  True if all fields in the form / group validate correctly, else false if one or more fields are in error.
                    */
    validate:       function(g)
                    {
                    
                        //i:    index
                        //v:    validated
                        //l:    html elements
                        //c:    html element
                        var i, v = 1, l = SS.global.htmels, c, f = $g(this.id), rx = new RegExp("(^" + g + "(,|$))|(,|$)" + g + "$|," + g + ",");
                        
                        for(i = 0; i < $ln(l); i++)
                        {
                            c = $g(l[i]);
                            //if the element is a descendant of the form or it has been marked to be in a group then check to see if it is validated
                            if(($isdc(f,c) || $ts($ga(c,"groupname")).match(rx)) && (!SS.htmlextension.isvalid(c)))
                            {
                                v = 0;
                            }
                        }
                        
                        if(!v)
                        {
                            //form is in error
                            $ef($ga(f,"onerror"),f,null);
                        }
                        return $tb(v);
                        
                    },
                    
                    /**
                    *   @function           SS.htmlextension.getElementsByGroupName
                    *   @description        Gets elements where the groupname attribute matches the sought after groupname (n).
                    *                       A groupname attribute can contain more than one group name by using a comma seperated list.
                    *   @param {String} g   Group Name. Name of the group of elements to return.
                    *   @returns {Array}    Array of {HTMLElement} objects, else empty array.
                    */
getElementsByGroupName : function(g)
                    {
                        var l = SS.global.htmels, r = [], i, n = $ln(l), rx = new RegExp("(^" + g + "(,|$))|(,|$)" + g + "$|," + g + ",");
                        
                        for(i = 0; i < n; i++)
                        {
                            c = $g(l[i]);
                            //check to see if there is a groupname attribute and it matches the sought after group name (g)
                            if($ts($ga(c,"groupname")).match(rx))
                            {
                                r.add(c);
                            }
                        }
                        
                        return r;
                    },
                    /**
                    *   @function           SS.htmlextension.getGroupValues
                    *   @description        Returns the values of elements which have been assigned a groupname.
                    *   @param {String} n   Group Name. Name of the group of element values to return.
                    *   @returns {Array}    Array of objects {HTMLElement.id : HTMLElement.value}
                    */
   getGroupValues : function(n)
                    {
                        //returns the values of elements which have been assigned a groupname
                        //n:	groupname
                        //a:	array of elements in the group
                        //o:	object built up that is returned
                        //l:	element
                        //i:	index pointer
                        //y:	type
                        //d:	element.id
                        var a = SS.htmlextension.getElementsByGroupName(n), o, l, i, y, d;

                        if(!$ise(a))
                        {
                            o = {};
                            //array contains elements, convert this into an object
                            for(i = 0; i < $ln(a); i++)
                            {
                                l = a[i];
                                d = l.id;
                                if(!$ise(d))
                                {
                                    y = $uc(l.type);
                                    if($iln("CHECKBOX,RADIO",y))
                                    {
                                        o[d] = l.checked;
                                    }
                                    else if($iln("TEXT,HIDDEN,PASSWORD",y) || $iln("TEXTAREA,SELECT",l.tagName))
                                    {
                                        o[d] = $ts(l.value);
                                    }
                                    else if(y == "IMAGE")
                                    {
                                        o[d].x = l.x;
                                        o[d].y = l.y;
                                    }
                                    else
                                    {
                                        o[d] = l.innerHTML;
                                    }
                                }
                            }
                        }

                        return o;	
                    },
                    /**
                    *   @function           SS.htmlextension.forminit
                    *   @description        Attaches a function to the form onsubmit event to perform validation before the page is submitted.
                    */
    forminit    :   function()
                    {
                        //df:   all forms
                        //f:    form
                        //os:   {string} = "onsubmit"
                        //i:    index
                        var df = document.forms, f, os = "onsubmit";
                        
                        var k = function(e)
                                {
                                    //i:    index
                                    //v:    validated
                                    //l:    html elements
                                    //c:    html element
                                    //d:    do default validation (default = true)
                                    var i, v = 1, l = SS.global.htmels, c, f = $g(this.id), d = $ga(f,"validate");
                                    
                                    if($ise(d))
                                    {
                                        //set default to perform validation
                                        d = 1;
                                    }
                                    
                                    if($psb(d) && l)
                                    {
                                        //validation has not been cancelled and there are elements that need to be investigated for validation
                                        for(i = 0; i < $ln(l); i++)
                                        {
                                            c = $g(l[i]);
                                            //if the element is a descendant of the form then check to see if it is validated
                                            if($isdc(f,c) && (!SS.htmlextension.isvalid(c)))
                                            {
                                                v = 0;
                                            }
                                        }
                                    }
                                    if(!v)
                                    {
                                        //form is in error
                                        $ef($ga(f,"onerror"),f,e);
                                    }
                                    
                                    return $tb(v);
                                };
                        if(df)
                        {
                            for(i = 0; i < $ln(df); i++)
                            {
                                f = df[i];                 
                                $eehadd(f,os,k);
                                $eehadd(f,os,f[os]);
                            }
                        }
                            
                        
                    },
                    /**
                    *   @function               SS.htmlextension.addElement
                    *   @description            Add element of interest for future use e.g. getting values from groupname.
                    *   @param {HTMLElement} l  Element to add
                    *   @param {Boolean} ft     First time. Flag to indicate that this has been called as part of the
                    *                           initial loading process. (Optional).
                    *   @returns                null
                    */
    addElement :    function(l,ft)
                    {
                        if(l)
                        {
                            if(!l.id)
                            {
                                l.id = l.tagName + $nid();
                            }
                            SS.global.htmels.add(l.id,(ft) ? 0 : 1);
                        }
                    }                    

};

/**
*   @function           $validate
*   @description        Validate fields. Pseudonym for {@link SS.htmlextension.validate}.
*   @param {String}  g  Group Name (optional)
*   @returns {Boolean}  True if all fields in the form / group validate correctly, else false if one or more fields are in error.
*/
var $validate = SS.htmlextension.validate;
                    
/**
*   @function           $gg
*   @description        Gets elements where the groupname attribute matches the sought after groupname (n).
*                       A groupname attribute can contain more than one group name by using a comma seperated list.
*                       Pseudonym for {@link SS.htmlextension.getElementsByGroupName}.
*   @param {String} g   Group Name. Name of the group of elements to return.
*   @returns {Array}    Array of {HTMLElement} objects, else empty array.
*/
var $gg = SS.htmlextension.getElementsByGroupName;
                    
/**
*   @function           $ggv
*   @description        Returns the values of elements which have been assigned a groupname.
*                       Pseudonym for {@link SS.htmlextension.getGroupValues}.
*   @param {String} n   Group Name. Name of the group of elements to return.
*   @returns {Array}    Array of objects {HTMLElement.id : HTMLElement.value}
*/
var $ggv = SS.htmlextension.getGroupValues;

 /**
*   @function               $headd
*   @description            Add element of intrest for future use e.g. getting values from groupname.
*                           Pseudonym {@link $headd}
*   @param {HTMLElement} l  Element to add
*   @param {Boolean} ft     First time. Flag to indicate that this has been called as part of the
*                           initial loading process. (Optional).
*   @returns                null
*/
var $headd = SS.htmlextension.addElement;

/**
*   @function       SS._heinit
*   @description    Adds extensions to the html control
*/
SS._heinit =    function(l,ft)
                {
                    //r:    does it implement inputvalidation
                    //c:    html element name name
                    //y:    input type
                    //h:    SS.htmlextension
                    var r = 0, c, y, h = SS.htmlextension;
                    if(l)
                    {
                        c = $lc(l.nodeName);
                        y = $lc(l.type);
                        
                        if(y == "text" || y == "hidden" || c == "select")
                        {
                            r = h.inputvalidation(l);
                        }
                        else if(c == "textarea")
                        {
                            r = h.textarea(l);  //adds maxlength and input validation
                        }
                        else if(!$ise($ga(l,"groupname")))
                        {
                           $headd(l,ft); //add but does not use any additional features such as validation. Useful when using $gg function
                        }
                    }
                    return $tb(r);
                };

/**
*   @function       SS._heinitfrm
*   @description    Initializes the form submit validation (only run once)
*/
SS._heinitfrm =     function()
                    {
                        SS.htmlextension.forminit();
                        SS._heinitfrm = null;   //remove this function so that it cannot be called again.
                    };

/**
*   @function       $submit
*   @description    Submits only a specific form.
*/
function $submit(f)
{
    if($iss(f))
    {
        f = $g(f);
    }
    
    if(f && f.submit)
    {
        if($ef(f.onsubmit,f,{type:"submit"}))
        {
            f.submit();
        }
    }
}
/*
*   File Name:      SS.control.js
*   Description:    Control Object
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*/

/**
*   @namespace Control
*/
SS.control = {};/*
*   File Name:      SS.geom.js
*   Description:    Page Geometry
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.locale.js
*/

/**
*   @namespace Geom. Holds functionality for positioning and sizing elements
*/
SS.geom = 
{
	
                /**
                *   @function $h
                *   @description Get / set height of an element
                *   @param l element
                *   @param h set height. Optional. Leave blank to only return the height without changing it.
                */
	height :	function(l,h)
				{
					if(l)
					{
						if($isd(h))
						{
							//set the element to this new height							
							if(isNaN(h))
							{
							    if(l.style.height != h)
							    {
								    l.style.height = h;
								    $ef(l.onresize,l);
								}
							}
							else if(l.style.height != h + 'px')
							{
								l.style.height = h + 'px';
								$ef(l.onresize,l);
							}
							
						}
						//return the height of the element
						return l.offsetHeight;
					}
					else
					{
						return -1;
					}
				},
                /**
                *   @function SS.geom.width
                *   @description Get / set width of an element.
                *   @param l element
                *   @param w set width. Optional. Leave blank to only return the width without changing it.
                */
	width :		function(l,w)
				{
					if(l)
					{
						if($isd(w))
						{
							//set the element to this new width							
							if(isNaN(w))
							{
							    if(l.style.width != w)
							    {
								    l.style.width = w;
								    $ef(l.onresize,l);
								}
							}
							else if(l.style.width != w + 'px')
							{
								l.style.width = w + 'px';
								$ef(l.onresize,l);
							}
						}
						//return the width of the element
						return l.offsetWidth;
					}
					else
					{
						return -1;
					}
				},
	            /**
                *   @function SS.geom.getXYZ
                *   @description            Element Position. Gets the absolute position of an element within the document including size dimensions.
                *   @param {HTMLElement} l  Element
                *   @returns {SS.coord}     Co-ordinates of the element (l).
                */
	getXYZ	:	function(l)
				{	
					var p = new SS.coord(0,0);
					
					if(l)
					{
					    var o = l, x = 0, y = 0;
	                    try
						{
	                        if(o && o.offsetParent)
	                        {
		                        while(o)
		                        {
			                        x += o.offsetLeft;
			                        y += o.offsetTop;
			                        o = o.offsetParent;
		                        }
	                        }
	                    }
	                    catch(z){}
					
						p.x = x;
						p.y = y;
						p.z = (l.style && l.style.zIndex) ? l.style.zIndex : null;
						p.w = l.offsetWidth;
						p.h = l.offsetHeight;
					}
					
					return p;
				},
                /**
                *   @function SS.geom.left
                *   @description    Get / Set the x-axis position of an element. In other words, how far left is it.
                *   @param l element
                *   @param p set position. Optional. Leave blank to only return the left / x-axis position without changing it.
                */
	left    :   function(l,p)
	            {
	                if(l)
					{	
						var o = l, x = null;
						
					    if($isd(p))
					    {
					        //set left position
						    var pX = (p.match && p.match("%")) ? null : p;
						    if((pX || $isn(p)) && pX != "null")
						    {
							    l.style.left = pX + 'px';
						    }
						    else
						    {
							    l.style.left = p;
						    }
						}
						else
						{
						    try
						    {
						        x = 0;
	                            if(o && o.offsetParent)
	                            {
		                            while(o)
		                            {
			                            x += o.offsetLeft;
			                            o = o.offsetParent;
		                            }
	                            }
	                        }
	                        catch(z){}
	                    }
	                    
	                    return x;
						
					}
	            },
                /**
                *   @function SS.geom.top
                *   @description        Get / set the y-axis position of an element. In other words, how far from the top is it.
                *   @param l element
                *   @param p set position. Optional. Leave blank to only return the top / y-axis position without changing it.
                */
	top     :   function(l,p)
	            {
	                if(l)
					{	
						var o = l, y = null;
						
					    if($isd(p))
					    {
						    var pY = (p.match && p.match("%")) ? null : p;
						    if((pY || $isn(p)) && pY != "null")
						    {
							    l.style.top = pY + 'px';
						    }
						    else
						    {
							    l.style.top = p;
						    }
						}
						else
						{
	                        try
						    {
	                            if(o && o.offsetParent)
	                            {
	                                y = 0;
		                            while(o)
		                            {
			                            y += o.offsetTop;
			                            o = o.offsetParent;
		                            }
	                            }
	                        }
	                        catch(z){}
        	            }
        	            
	                    return y;
					}
	            
	            },
	            /**
	            *   @function       SS.geom.zIndex
	            *   @description    Get / set the z-index property of the element. The z-index is used
	            *                   to determin the ordering of overlapping elements where the lower the number
	            *                   the further behind (deeper) the element is compare to those that overlap.
	            *   @param {HTMLElement} l  Element to get / set the z-Index style property of
	            *   @param {Integer}     z  z-Index value. z-Index range may be browser specific, some well known AJAX applications
	            *                           use ranges of -900000 to 900000.
	            *   @returns {Integer}  z-Index of the element, else 0.
	            */
	zIndex  :   function(l,z)
	            {
	                var r = 0;
	                if(l && l.style)
	                {
	                    if($isd(z))
	                    {
	                        l.style.zIndex = z;
	                    }
	                    
	                    r = l.style.zIndex;
	                }
	                return r;
	            },
                /**
                *   @function SS.geom.setPosition
                *   @description            Sets Element Position. Sets the x, y , z position of an element.
                *   @param {HTMLElement} l  Element
                *   @param {SS.coord}    p  Position. Co-ordinates to set for the element (l).
                *                           Alternatively use {x: value, y: value, z: value} syntax.
                *                           See {@link $t} and {@link $l} for setting only one axis.
                *   @returns null
                */
	setPosition:function(l,p)
				{
					if(l)
					{
					    //mX:   position X
					    //mY:   position Y
					    //s:    l.style
						var mX = $ts(p.x), mY = $ts(p.y), s = l.style, pX = mX.match("%") ? null : mX, pY = mY.match("%") ? null : mY;
						
						if(pX === null || pX == "null")
						{}
						else if(pX || $isn(p.x))
						{
							s.left = pX + 'px';
						}
						else
						{
							s.left = p.x;
						}
						
						if(pY === null || pY == "null")
						{}
						else if(pY || $isn(p.y))
						{
						    s.top = pY + 'px';
						}
						else
						{
							s.top = p.y;
						}
						
						if(p.z === null)
						{}
						else if($isd(p.z) && $isn(p.z))
						{
							s.zIndex = p.z;
						}		
					}

				},
				/**
				*   @function               SS.geom.opacity
				*   @description            Opacity. Get / set the opacity of an element.
				*   @param {HTMLElement} l  Element.
				*   @param {Integer} v      Opacity percentage between 0 and 100 where 0 is invisible and 100 is opaque.
				*   @returns    {Integer}   Opacity of the element.
				*/
		opacity:function(l, v)
				{
					//op:   opacity value
					//s:    l.style
					var op, s = l.style;
					
					if($isd(v))
					{
						v = ($isn(v) && v >= 0 && v <= 100) ? v : 100;	//check v is valid
					}
					
					if($isd(s.opacity))
					{
						if($isd(v))
						{	
							s.opacity = (v/100);
							op = v;
						}
					}
					else if($isd(s.filter))
					{
						if($isd(v))
						{
							s.filter = "alpha(opacity=" + (v) + ")";
						}
						if(s && s.filters && l.filters.alpha && $isd(l.filters.alpha.opacity))
						{
							op = l.filters.alpha.opacity;						
						}
						else
						{
							op = 100;
						}
					}
					else if($isd(s.MozOpacity))
					{
						if($isd(v))
						{
							s.MozOpacity = (v/100);
						}
						op = s.MozOpacity * 100;
					}
					else if($isd(s.KhtmlOpacity))
					{
						if($isd(v))
						{
							s.KhtmlOpacity = v;
						}
						op = s.KhtmlOpacity;
					}
					
					return op;				
				},
                /**
                *   @function               SS.geom.display
                *   @description            Set Element Visibility. Show / hide an element using the display (default) or visibility style sheet rules.
                *                           
                *   @param {HTMLElement} l  Element or {String} Element Id
                *   @param {Boolean}     v  Visibile flag. True for visible, false for hidden (display:none)
                *   @param {Boolean}     s  Static. Static display, uses the visibility style instead of the display style attribute.
                *                           This means that the space the element occupies remains filled when hidden.
                *   @returns null
                */
        display:function(l,v,s)
                {
                    if($iss(l))
                    {   //assume that the string passed is an id. convert string into element.
                        l = $g(l); 
                    }
                    if(l && l.style)
                    {
                        if(s)
                        {
                            l.style.visibility = (v) ? "visible" : "hidden";
                        }
                        else
                        {
                            s = (v) ? "" : "none";
                            if(l.style.display != s)
                            {
                                l.style.display = s;
                            }
                        }
                    }
                }				
};

//abreviated functions
/**
*   @function $h
*   @description Get / set height of an element. Pseudonym for {@link SS.geom.height}
*   @param l element
*   @param h set height. Optional. Leave blank to only return the height without changing it.
*/
$h = SS.geom.height;

/**
*   @function $w
*   @description Get / set width of an element. Pseudonym for {@link SS.geom.width}
*   @param l element
*   @param w set width. Optional. Leave blank to only return the width without changing it.
*/
$w = SS.geom.width;


/**
*   @function $l
*   @description    Get / Set the x-axis position of an element. In other words, how far left is it.
*                   Pseudonym for {@link SS.geom.left}
*   @param l element
*   @param p set position. Optional. Leave blank to only return the left / x-axis position without changing it.
*/
$l = SS.geom.left;


/**
*   @function               $op
*   @description            Opacity. Get / set the opacity of an element. Pseudonym for {@link SS.geom.opacity}.
*   @param {HTMLElement} l  Element.
*   @param {Integer} v      Opacity percentage between 0 and 100 where 0 is invisible and 100 is opaque.
*   @returns    {Integer}   Opacity of the element.
*/
$op = SS.geom.opacity;

/**
*   @function $t
*   @description        Get / set the y-axis position of an element. In other words, how far from the top is it.
*                       Pseudonym for {@link SS.geom.top}
*   @param l element
*   @param p set position. Optional. Leave blank to only return the top / y-axis position without changing it.
*/
$t = SS.geom.top;

/**
*   @function $xyz
*   @description            Element Position. Gets the absolute position of an element within the document including size dimensions.
*                           Pseudonym for {@link SS.geom.getXYZ}.
*   @param {HTMLElement} l  Element
*   @returns {SS.coord}     Co-ordinates of the element (l).
*/
$xyz = SS.geom.getXYZ;

/**
*   @function $sxyz
*   @description            Sets Element Position. Sets the x, y , z position of an element.
*                           Pseudonym for {@link SS.geom.setPosition}.
*   @param {HTMLElement} l  Element
*   @param {SS.coord}    p  Position. Co-ordinates to set for the element (l).
*                           Alternatively use {x: value, y: value, z: value} syntax.
*                           See {@link $t} and {@link $l} for setting only one axis.
*   @returns null
*/
$sxyz = SS.geom.setPosition;

/**
*   @function $v
*   @description            Set Element Visibility. Show / hide an element using the display (default) or visibility style sheet rules.
*                           Pseudonym for {@link SS.geom.display}.
*   @param {HTMLElement} l  Element or {String} Element Id
*   @param {Boolean}     v  Visible flag. True for visible, false for hidden (display:none)
*   @param {Boolean}     s  Static. Static display, uses the visibility style instead of the display style attribute.
*                           This means that the space the element occupies remains filled when hidden.
*   @returns null
*/
$v = SS.geom.display;

/**
*   @function $x
*   @description    Get / Set the x-axis position of an element. In other words, how far left is it.
*                   Pseudonym for {@link SS.geom.left}
*   @param l element
*   @param p set position. Optional. Leave blank to only return the left / x-axis position without changing it.
*/
$x = $l;


/**
*   @function $y
*   @description        Get / set the y-axis position of an element. In other words, how far from the top is it.
*                       Pseudonym for {@link SS.geom.top}
*   @param l element
*   @param p set position. Optional. Leave blank to only return the top / y-axis position without changing it.
*/
$y = $t;

/**
*   @function       $z
*   @description    Get / set z-Index. Pseudonym for {@link SS.geom.zIndex}.
*/
$z = SS.geom.zIndex;

/**
*   @function $dbsl     Document Body Scroll Left
*   @description        Document body scroll left
*   @returns {Integer}  Position of the horizontal scroll bar
*/
function $dbsl()
{
    //b:    document body
    //l:    scroll left
    var b = document.body, l = null;
    if(b)
    {
        l = b.scrollLeft;
    }
    return l;
}

/**
*   @function $dbst     Document Body Scroll Top
*   @description        Document body scroll top
*   @returns {Integer}  Position of the vertical scroll bar
*/
function $dbst()
{
    //b:    document body
    //t:    scroll top
    var b = document.body, t = null;
    if(b)
    {
        t = b.scrollTop || b.parentNode.scrollTop;   
    }
    return t;
}


/**
*   @function $dbd      Document Body Dimensions
*   @description        Returns the dimensions for the document. These dimensions refer to the
*                       content window and do not include the browser window including any toolbars.
*   @returns {Object}   {w = Width, h = Height}
*/
function $dbd()
{
    //x:    x dimension
    //y:    y dimension
    //w:    window
    //b:    document.body
    var x = 0, y = 0, w = window, b = document.body, d = document.documentElement;
    if(w && w.innerWidth)
    {
        x = w.innerWidth;
        y = w.innerHeight;
    }
	else if(d && d.clientWidth)
	{
        x = d.clientWidth;
        y = d.clientHeight;
	}
    else if(b && b.clientWidth)
    {
        x = b.clientWidth;
        y = b.clientHeight;  
    }

    return {w:x,h:y};
}

/*
Depreciated.
var _mzi = 0;
//set the maximum known z-index
function $mzis(z)
{
    if($isn(_mzi))
    {
        _mzi = (z > _mzi) ? z : _mzi;
    }
    return _mzi;
}
function  $mzig()
{
    return $n(_mzi);
}
*/


/**
*   @class          Co-ordinates. Holds co-ordinate information about an element
*   @constructor
*   @param          x x-axis position
*   @param          y y-axis position
*   @param          z z-index position
*   @param          w width
*   @param          h height
*/
SS.coord =  function(x,y,z,w,h)
            {
                /**
                    @property x 
                    @description x-axis
                */
	            this.x = $isd(x) ? x : 0;
	            
                /**
                    @property y 
                    @description y-axis
                */
	            this.y = $isd(y) ? y : 0;
	            
                /**
                    @property z 
                    @description z-Index
                */
	            this.z = $isd(z) ? z : 0;
	            
                /**
                    @property w
                    @description width
                */
	            this.w = $isd(w) ? w : 0;
	            
                /**
                    @property h
                    @description height
                */
	            this.h = $isd(h) ? h : 0;
            };

/*
*   File Name:      SS.net.js
*   Description:    Implements AJAX network functionality
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.geom
*   SS.htmlextension (optional - only needed for submitting fields using groupname attribute)
*/

/**
    @class Network requesting resources
    @static
*/
SS.net = 
{
    /*
        XMLHttpRequest States
        ------------------------------
	    _STATE_UNINITIALIZED    :	0
	    _STATE_LOADING		    :	1
	    _STATE_LOADED		    :	2
	    _STATE_INTERACTIVE	    :	3
	    _STATE_COMPLETE		    :	4
	*/
	
	/*
	    Request Types
	    ------------------------------
	    _ACTION_POST		:	"POST"
	    _ACTION_GET			:	"GET"
	*/
	
                /** 
                *   @property       dls
                *   @description    Array of SS.net.requestor data loaders which are active or waiting to be reused.
                */
	dls		:	[],
                /**
                *   @function                   getRequest
                *   @description                Get an XMLHTTPRequest object. Where possible, request objects that have
                *                               fully completed are reused.
                *   @param {String} y           (Optional) Type of Microsoft ActiveX Object Request to use. Default = null.
                *   @returns {XMLHTTPRequest}   XML Http Request Object for loading web resources asynchronously / synchronously in JavaScript.
                */                
 getRequest :   function(y)
                {
                    //r:    return XMLHTTPRequest Object
                    //h:    'XMLHTTP' (space saving)
                    //p:    'Msxml2.XMLHTTP' (space saving)
                    //x:    array of Microsoft XML ActiveX Object names
                    //y:
	                var r, h = 'XMLHTTP', i, p = 'Msxml2.' + h, x = [	p+'.5.0',               //Msxml2.XMLHTTP.5.0
					                                                    p+'.4.0',               //Msxml2.XMLHTTP.4.0
					                                                    p+'.3.0',               //Msxml2.XMLHTTP.3.0
					                                                    p,                      //Msxml2.XMLHTTP
					                                                    'Microsoft.' + h];      //Microsoft.XMLHTTP
                	
                	if(y)
                	{
                	     r = new ActiveXObject(y);
                	}
	                else if(window.XMLHttpRequest)
	                {
		                r = new XMLHttpRequest();
	                }
	                else
	                {
	                    for(i = 0; i < 5 && !r; i++)  //5 = x.length (set above)
		                {
			                try
			                {
				                r = new ActiveXObject(x[i]);
			                }
			                catch(e)
			                {
			                }
		                }
	                }
                	
	                return r;
                },	
                /**
                *   @function       SS.net.load
                *   @description    Requests are URI source using the XMLHTTPRequest object.
                *                   This function can also be called specifing the URL parameter as an
                *                   object. e.g. SS.events.load({url:"myurl.htm",onload:function(){alert("hello world");});
                *	@param {String} url Location of the document to load.
	            *   @param {Object} param Parameters to send to the url using POST method, else leave blank. e.g. {param1:"1",param2:"2" ...}.
	            *   @param {Function} onload Function to call after the document has loaded successfully
	            *   @param {Function} onerror Function to call if there was an error processing the request for the document
	            *   @param {Function} ontimeout Function to call if the request timed out
	            *   @param {Integer} timeout Number of seconds the request must be completed in before raising a timeout error
	            *   @param {Boolean} nocache Request the document using a random query parameter to prevent caching
	            *   @param {String} loadId	Id assigned to the request object used for fetching the data
	            *   @param {String} loadImageId Id of an element, typically an image, which is made visible / hidden during the fetching of data
                *   @param {String} title Data Loader Title Description. Optional use to hold a free text description of what the data loader is doing.
                *   @param {String} type (Optional) Define a particular Microsoft XML ActiveX Object to use instead of the prefinded defaults. Default = null.
                *   @returns    null
                */  
	load	:	function(url,param,onload,onerror,ontimeout,timeout,nocache,loadId,loadImageId,title,type)
				{
				    //loadId (loaderid) allows you to specify the id of the net requestor component
				    
				    if($iso(url))
				    {
                        param = param ? param : url.param;
                        onload = onload ? onload : url.onload;
                        onerror = onerror ? onerror : url.onerror;
                        ontimeout = ontimeout ? ontimeout : url.ontimeout;
                        timeout = timeout ? timeout : url.timeout;
                        nocache = nocache ? nocache : url.nocache;
                        loadId = loadId ? loadId : url.loadId;
                        loadImageId = loadImageId ? loadImageId : url.loadImageId;
                        type = type ? type : url.type;
				        url = url.url;  //destroy the url object
				    }
				    
				    if($isu(nocache))
				    {
				        nocache = 1;
				    }
				    
					if($iss(url) && $psb(nocache))
					{
					    //append random parameter onto the url to prevent it from being cached by the browser
					    url += ((url.indexOf("?") < 0) ? "?" : "&") + $rand(9999999);
					}
					
					//t:    this
					//r:    requestor object
					//i:    index pointer
					//d:    data loader
					//n:    t.dls.length
					var t = this, r, i, d, n = t.dls.length;
					for(i = 0; i < n && !type; i++)
					{
					    d = t.dls[i];
						if(d.req.readyState == 4) //net._STATE_COMPLETE)
						{
							r = d;
							break;
						}
					}
					
					if(!r)
					{
						//create a new request object
						r = new SS.net.requestor(url,param,onload,onerror,ontimeout,timeout,loadId,loadImageId,title,type);
						SS.net.dls.add(r);
					}
					else
					{
						//reuse a request object
						r.reinit(url,param,onload,onerror,ontimeout,timeout,loadId,loadImageId,title,type);
					}
								
					if(r)
					{   
						r.execute();
					}
				},
				
                /**
                *   @class Data Request object
                *   @constructor
                */
	requestor :	function(url,param,onload,onerror,ontimeout,timeout,loadId,loadImageId,title,type)
				{
                    /**
                    * @property {String} id
                    * @description Identifier for this requestor object.
                    */
					this.id         =   (loadId) ? loadId : $nid();
					
                    /**
                    * @property {String} id
                    * @description Identifier for this requestor object.
                    */
					this.loadimageid=   (loadImageId) ? loadImageId : "";
					this.url		=	url;
					this.req		=	null;
					
                    /**
                    * @property {Function} onerror
                    * @description Function called if the request of the specified resource resulted in an error, including timeout.
                    */
					this.onerror	=	(onerror) ? onerror : null;
					
                    /**
                    * @property {Function} onload
                    * @description Function called upon the successful completion of the request for the specified resource.
                    */
					this.onload	    =   (onload) ? onload : null;
					
                    /**
                    * @property {Function} ontimeout
                    * @description Function called if the request of the specified resource resulted in a timeout.
                    */
					this.ontimeout	=	(ontimeout) ? ontimeout : null; //fires if the request times outhis. onerror still fires on a timeout
					
					/**
					*   @property {Object}  param
					*   @description        Parameter object which is serialized and posted to the defined URL using the POST method.
					*/
					this.param		=	(param) ? param : null;
					
					/**
					*   @property {String}  _tId
					*   @description        Request Timer Id
					*   @private
					*/
					this._tId	    =	0;
					
					/**
					*   @property {Boolean} async
					*   @description        Request data asynchronously. When true, JavaScript script will continue to execute whilst the
					*                       request for the resource is being carried out. If false then script execution is paused until the
					*                       request has completed or resulted in an error. Default = true.
					*/
					this.async		=	true;
					
					/**
					*   @property {Integer} timeout
					*   @description        Number of seconds the request has to complete within before being cancelled and the ontimeout event is raised.
					*/
					this.timeout	=	(timeout) ? timeout : 30;
					
					/**
					*   @property {String}  title
					*   @description        Free text description of the request.
					*/
					this.title      =   $ts(title);
					
					/**
					*   @property {String}  type
					*   @description        Define Microsoft XML ActiveX Object type to use instead of defaults. Default = null.
					*                       Generally this property should always be null.
					*/
					this.type       =   (type) ? type : null;
				},
				/**
                *   @function               SS.net.active
                *   @description            Active Requests. Returns an array of active SS.net.requestor objects, or null.
                *                           An active SS.net.requestor is identified as any XMLHTTPRequest object where the
                *                           readyState != 4 (complete).
                *   @returns    {Array}     Array of {@link SS.net.requestor} objects, or null.
                */
    active  :   function()
                {                    
                    //i:    index pointer
					//d:    data loader
					//r:    return array of requestor objects
					
					var i, d, r;
					for(i = 0; i < $ln(this.dls); i++)
					{
					    d = this.dls[i];
						if(d.req.readyState != 4) //net._STATE_COMPLETE)
						{
							if(!r)
							{
							    r = [];
							}
							r.add(d);
						}
					}
					
					return r;
					
                }	
	
};


SS.net.requestor.prototype = {

        /**
        *   @function           SS.net.requestor.reinit
        *   @description        Re-Initialize. Resets this requestor object to its original state then applies the new parameters to make it ready for reuse
        *	@param {String}     url Location of the document to load.
        *   @param {Object}     param Parameters to send to the url using POST method, else leave blank. e.g. {param1:"1",param2:"2" ...}.
        *   @param {Function}   onload Function to call after the document has loaded successfully
        *   @param {Function}   onerror Function to call if there was an error processing the request for the document
        *   @param {Function}   ontimeout Function to call if the request timed out
        *   @param {Integer}    timeout Number of seconds the request must be completed in before raising a timeout error
        *   @param {String}     loadId	Id assigned to the request object used for fetching the data
        *   @param {String}     loadImageId Id of an element, typically an image, which is made visible / hidden during the fetching of data
        *   @param {String}     title Data Loader Title Description. Optional use to hold a free text description of what the data loader is doing.
        *   @returns            null
        */
		reinit	:	function(url,param,onload,onerror,ontimeout,timeout,loadId,loadImageId,title,type)
		{
		    var t = this;
			t.id        =   (loadId) ? loadId : t.id;
			t.loadimageid=  (loadImageId) ? loadImageId : "";
			t.url		=	url;
			t.req		=	null;
			t.onerror	=	(onerror) ? onerror : null;
			t.onload	=	(onload) ? onload : null;
			t.ontimeout	=	(ontimeout) ? ontimeout : null; //fires if the request times out. onerror still fires on a timeout
			t.param		=	(param) ? param : null;
			t._tId	    =	0;
			t.async		=	true;
			t.timeout	=	(timeout) ? timeout : 30;
			t.title     =   $ts(title);
		    t.type      =   (type) ? type : null;
		},
	
                    /**
                    *   @function               SS.net.requestor.execute
                    *   @description            Execute Request. Executes the request for retrieve the specified resource.
                    *   @returns                null
                    */
		execute	:	function()
					{
					    //t:    this
					    //p:    parameters to be passed (if there are any)
						var t = this, p;
						
						if(typeof t.url != "string")
					    {
					        //assume that t.url holds an XML document object
					        t.req = {
					                    responseXML     :       t.url,
					                    responseText    :       typeof XMLSerializer != "undefined" ? 
					                                                    new XMLSerializer().serializeToString(t.url)   :
					                                                    t.url.xml
					                };
							$ef(t.onload,t);
					    }
					    else
					    {
						
						    t.req = SS.net.getRequest(t.type);
    						
						    if(t.req)
						    {
    						    
						        try
						        {
							        $v(t.loadimageid,1);
    								
							        if(t.param)
							        {
								        //there are parameters to submit
								        if($iss(t.param) && $gg)
								        {
									        //using groupname - get the values of the elements in the group
									        t.param = $ggv(t.param);
								        }
								        p = t.p2s(t.param);
							        }
							        //set timer to make sure this request doesn't take longer than it's supposed to
							        t._tId = $si(function(){t.timedOut.call(t);} , t.timeout * 1000);
                                    /**
                                    *   @ignore
                                    */
							        t.req.onreadystatechange =	function()
														        {
															        t.stateChanged.call(t);
														        };
     
     
                                    if(typeof t.req.open != "undefined")
                                    {
							            t.req.open(((p) ? "POST" : "GET"),t.url,t.async);
        								
							            if(p) //net._ACTION_POST)
							            {
								            //set content type, this has to be done once the request is open
								            t.req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
							            }
        								
							            //send the parameters regardless if there are any
							            t.req.send(p);
						            }
						            else if(typeof t.req.load != "undefined")
						            {
						                //request object does not support the open command e.g. MSXML2.FreeThreadedDomDocument
						                //but supports the load command instead. Note: this does not support the posting of
						                //parameter data.
						                t.req.async = t.async;
						                t.req.load(t.url);
						            }
							        if(!t.async)
							        {
								        $ci(t._tId);
								        $ef(t.onload,t);
							        }
    								
						        }
						        catch(x)
						        {
							        $ef(t.onerror,t,x);
						        }
						    }
						    else
						    {
							    $ef(t.onerror,t);
						    }
						}
					},
					/**
                    *   @function               SS.net.requestor.stateChanged
                    *   @description            Handles the state changes of the requestor object.
                    *   @returns                null
                    */
    stateChanged :	function()
				    {	
				        //t:    this
				        //d:    timerId
				        //s:    status
				        var t = this, d = t._tId, s;
					    if(d && !t.hasTimedOut())
					    {
						    if(t.req.readyState == 4)
						    {
    						    
							    $v(t.loadimageid,0);	
    							
							    //cancel timer, look at status
							    $ci(d);
							    t._tId = 0;
							    try
							    {
							        if(typeof t.req.status != "undefined")
							        {
							            s = t.req.status;
							        }
							        else
							        {
							            s = 200;    //does not support the status attribute. blindly assume that the request was successful.
							        }
							    }
							    catch(x){s = -1; /*unknown error*/}
    							
							    if(s >= 200 && s < 300)
							    {
							        $ef(t.onload,t);
							    }
							    else
							    {
							        $ef(t.onerror,t);
							    }
						    }
					    }
    					
				    },
                    /**
                    *   @function           SS.net.requestor.hasTimedOut
                    *   @description	    Checks to see if the request has timed out.
                    *	@returns {Boolean}  Timed out = true, else false.
                    */				
     hasTimedOut :	function()
				    {
					    return this._tId < 0;
				    },
                    /**
                    *   @function           SS.net.requestor.timedOut
                    *   @description	    Handles the timeout event internally before calling registered {@link SS.net.requestor.ontimeout} and {@link SS.net.requestor.onerror} functions.
                    *	@returns            null
                    */
	    timedOut :	function()
				    {
				        //t:    this
				        //i:    timer id
				        var t = this, i = t._tId;
    				    
					    if(i)
					    {
						    //Current request has timed out, cancel request.
						    $ci(i);
						    t._tId = -1;
						    t.req.abort();
					    }
    					
					    $v(t.loadimageid,0);
				        $ef(t.ontimeout,t);
				        $ef(t.onerror,t);
				    },
    					
                    /**
                    *   @function           SS.net.requestor.p2s
                    *	@description        Takes a parameter object and recursively converts it into a string so that it can be
                    *                       posted to the specified destiantion.
                    *	                    E.g.	data.txtInput = 123
                    *			            data.txtInput2 = 345
                    *
                    *			            returns txtInput=123&txtInput2=354
                    *   @param {Object} p   Parameter object to be converted into a {String}.
                    *   @param {String} f   (Optional) Prefix. Used for recursive calls.
                    *   @returns {String}   Converted input object as string.
                    */
	        p2s:    function(p,f)
		            {
			            //p:	param
		                //f:	prefix
            		    
		                //s:    parsed
		                //k:    key
			            var s = "", k, u = encodeURIComponent;
			            for(k in p)
			            {
				            if($isd(p[k]) && (!$isf(p[k])))
				            {
					            s += ((s==="") ? "" : "&") + u(($ise(f) ? "" : f + ".") + k) + "=" + u(p[k]).replace(/\+/g,"%2b");
            					
					            if($iso(p[k]))
					            {
						            s += "&" + this.p2s(p[k],($ise(f) ? "" : f + ".") + k);
					            }
				            }
			            }
            							
			            return s;
		            }
};

/*
	$load javascript object parameter (used in place of url parameter e.g. $load({...});
	url			:	Location of the document to load
	param		:	Parameters to send to the url using POST method, else leave blank
	onload		:	Function to call after the document has loaded successfully
	onerror		:	Function to call if there was an error processing the request for the document
	ontimeout	:	Function to call if the request timed out
	timeout		:	Number of seconds the request must be completed in before raising a timeout error
	nocache		:	Request the document using a random query parameter to prevent caching
	loadId		:	Id assigned to the request object used for fetching the data
	loadImageId	:	Id of an element, typically an image, which is made visible / hidden during the fetching of data
*/
	
/**
*   @function       $load
*   @description    Requests are URI source using the XMLHTTPRequest object.
*                   This function can also be called specifiing the URL parameter as an
*                   object. e.g. SS.events.load({url:"myurl.htm",onload:function(){alert("hello world");});.
*                   Pseudonym for {@link SS.net.load}.
*	@param {String} url Location of the document to load.
*   @param {Object} param Parameters to send to the url using POST method, else leave blank. e.g. {param1:"1",param2:"2" ...}.
*   @param {Function} onload Function to call after the document has loaded successfully
*   @param {Function} onerror Function to call if there was an error processing the request for the document
*   @param {Function} ontimeout Function to call if the request timed out
*   @param {Integer} timeout Number of seconds the request must be completed in before raising a timeout error
*   @param {Boolean} nocache Request the document using a random query parameter to prevent caching
*   @param {String} loadId	Id assigned to the request object used for fetching the data
*   @param {String} loadImageId Id of an element, typically an image, which is made visible / hidden during the fetching of data
*   @param {String}     title Data Loader Title Description. Optional use to hold a free text description of what the data loader is doing.
*   @returns    null
*/ 
var $load = function(url,param,onload,onerror,ontimeout,timeout,nocache,loadImageId,loadId,title,type)
            {
                SS.net.load.call(SS.net,url,param,onload,onerror,ontimeout,timeout,nocache,loadId,loadImageId,title,type);
            };

/*
    $xload xml object parameter
    {
        xml             :   "XML File to load"
        xmlparam        :   Object of parameters posted on the xml request
        xsl             :   "XSLT sheet to transform the XML with",
        xslparam        :   Object of parameters posted on the xsl request
        element         :   Element to attach the resulting xml xslt transformation to
        onload          :   function called after loading both xml and xsl
        onerror         :   function called if there is an error in either xml or xsl request
        ontimeout       :   function called if the request for xml or xsl timesout
        timeout         :   maximum duration in seconds given to request either xml or xsl before the timeout function is called
        nocache         :   request xml and xsl using a random query parameter to prevent caching
        loadImageId     :   image / element to display whilst the request is loading
        loadId          :   id of the request
        title           :   title of the request
        xmlonload       :   function called after loading xml and before onload
        xmlonerror      :   function called if there is an error in the xml request
        xmlontimeout    :   function called if the request for xml times out
        xmltimeout      :   maximum duration in seconds given to request xml before the timeout function is called
        xmlnocache      :   request xml using a random query parameter to prevent caching
        xmlloadimage    :   image / element to display whilst the xml request is loading
        xmlid           :   id of the xml request
        xmltitle        :   title of the xml request
        xslonload       :   function called after loading xsl and before onload
        xslonerror      :   function called if there is an error in the xsl request
        xslontimeout    :   function called if the request for xml times out
        xsltimeout      :   maximum duration in seconds given to request xsl before the timeout function is called
        xslnocache      :   request xsl using a random query parameter to prevent caching
        xslloadimage    :   image / element to display whilst the xsl request is loading
        xslid           :   id of the xsl request
        xsltitle        :   title of the xsl request
        xslcharesc		:	XSL transformation character escaping. Needed in most browsers to render raw HTML elements on the page.
    }
*/
/**
*   @function                   $xload
*   @description                Asynchronously loads data from an XML datasource and applies the specified XSLT transformation template. The result of which is
*                               either rendered to the entire page or to a specified element.
*   @param {Object} xml         Either define xml as a URL {String} or alternatively define it as an object.
*                               {
*                                   xml             :   "URL XML File to load"
*                                   xmlparam        :   Object of parameters posted on the xml request
*                                   xsl             :   "URL XSLT sheet to transform the XML with",
*                                   xslparam        :   Object of parameters posted on the xsl request
*                                   xsltparam       :   Object of parameters made available to the XSLT transformation. If set the value xslparam is ignored in the request for the XSLT stylesheet for Internet Explorer only.
*                                   element         :   Element to attach the resulting xml xslt transformation to
*                                   onload          :   function called after loading both xml and xsl
*                                   onerror         :   function called if there is an error in either xml or xsl request
*                                   ontimeout       :   function called if the request for xml or xsl timesout
*                                   timeout         :   maximum duration in seconds given to request either xml or xsl before the timeout function is called
*                                   nocache         :   request xml and xsl using a random query parameter to prevent caching. default = true.
*                                   loadImageId     :   image / element to display whilst the request is loading
*                                   loadId          :   id of the request
*                                   title           :   title of the request
*                                   xmlonload       :   function called after loading xml and before onload
*                                   xmlonerror      :   function called if there is an error in the xml request
*                                   xmlontimeout    :   function called if the request for xml times out
*                                   xmltimeout      :   maximum duration in seconds given to request xml before the timeout function is called
*                                   xmlnocache      :   request xml using a random query parameter to prevent caching. default = {nocache} true.
*                                   xmlloadimage    :   image / element to display whilst the xml request is loading
*                                   xmlid           :   id of the xml request
*                                   xmltitle        :   title of the xml request
*                                   xslonload       :   function called after loading xsl and before onload
*                                   xslonerror      :   function called if there is an error in the xsl request
*                                   xslontimeout    :   function called if the request for xml times out
*                                   xsltimeout      :   maximum duration in seconds given to request xsl before the timeout function is called
*                                   xslnocache      :   request xsl using a random query parameter to prevent caching. default = {nocache} true.
*                                   xslloadimage    :   image / element to display whilst the xsl request is loading
*                                   xslid           :   id of the xsl request
*                                   xsltitle        :   title of the xsl request
*                                   xslcharesc		:	XSL transformation character escaping. Needed in non IE browsers to render raw HTML elements on the page.
*                               }
*   @param {String} xsl         URL XSLT sheet to transform the XML with
*   @param {Object} param       Object of parameters posted on the xml request
*   @param {Function} onload    Function called if the XML and XSLT transforms have loaded and been successfully transformed.
*   @param {Function} onerror   Function called if either the XML and XSLT transforms have not loaded or there was an error in the transformation.
*   @param {Function} ontimeout Function called if either the XML and XSLT transforms have exceeded the timeout limit.
*   @param {Integer} timeout    Number of seconds the request has to complete in before it is.
*   @param {Boolean} nocache    Request xml and xsl using a random query parameter to prevent caching.
*   @param {HTMLElement} element Element to attach the transformation to. If not specified, then the transformation will be applied to document.body.
*   @param {HTMLElement} loadImageId image / element to display whilst the xml and xsl request is loading.
*   @param {String} loadId      Name of the load object.
*   @param {String} title       Title of the xml and xsl request.
*/
var $xload =    function(xml,xsl,param,onload,onerror,ontimeout,timeout,nocache,element,loadImageId,loadId,title)
                {
                    if($iss(xml))
                    {
                        //arguments passed as defined in function, convert to object
                        xml =   {
                                    xml         :   xml,
                                    xsl         :   xsl,
                                    xmlparam    :   param,
                                    onload      :   onload,
                                    onerror     :   onerror,
                                    ontimeout   :   ontimeout,
                                    timeout     :   timeout,
                                    nocache     :   nocache,
                                    loadImageId :   loadImageId,
                                    id          :   loadId,
                                    title       :   title,
                                    element     :   element
                                };
                    }

                    $load({
                            url     :   xml.xml,
                            param   :   xml.xmlparam,
                            onload  :   function()
							            {
							                //xml document has loaded successfully. load xsl
								            var r = this.req, rx = r.responseXML;
            								
								            //load xsl file
								            $load({ 
								                    url     :   xml.xsl, 
								                    param   :   xml.xslparam,
								                    onload  :   function()
							                                    {
							                                        //l:    element to attach the resulting xml/xsl to
							                                        //p:    XSLTProcessor (non IE browsers)
							                                        //d:    xml document
							                                        //r:    request object
							                                        //s:    XSL xml document
							                                        //h:	html temporary variable holder
							                                        //k:    key in object
							                                        var l = xml.element ? xml.element : document.body, p, d, r = this.req, s = r.responseXML, h, k;
                        										    
							                                        if($iss(l))
							                                        {
							                                            //string id of element specified. look for the element using this as the id.
							                                            l = $g(l);
							                                        }
                        										    
							                                        if((l && $uc(l.tagName) == "IFRAME"))
							                                        {
							                                            l = l.contentWindow.document.body;
							                                        }
								                                    if(window.ActiveXObject)
								                                    {
								                                        //Internet Explorer way of applying xsl sheet
								                                        try
								                                        {
								                                            if(xml.xsltparam)
                                                                            {
                                                                                //use MSXML2.FreeThreadedDomDocument approach
                                                                                //xd:   XSL Stylesheet but using a Free Threaded XML Document
                                                                                var xd = new ActiveXObject("MSXML2.FreeThreadedDomDocument");
                                                                                xd.validateOnParse = false;
                                                                                xd.loadXML(r.responseText);
                                                                                
                                                                                //xc:   XSLT Compiled
                                                                                var xc = new ActiveXObject("MSXML2.XSLTemplate");
                								                                
                                                                                xc.stylesheet = xd.documentElement;
                                                                                
                                                                                //xp:   XSLTProcessor
                                                                                var xp = xc.createProcessor();
                                                                                xp.input = rx;
                                                                                
                                                                                //Set the parameters
                                                                                for(k in xml.xsltparam)
                                                                                {
                                                                                    if(!$isf(xml.xsltparam[k]))
                                                                                    {
                                                                                        xp.addParameter(k, xml.xsltparam[k]);
                                                                                    }
                                                                                }
                                                                                 
                                                                                //Perform the transform
                                                                                xp.transform();
                                                                                
                                                                                h = xp.output;
                                                                            }
                                                                            else
                                                                            {
                                                                                h =  rx.transformNode(s);
                                                                            }
            								                                
										                                    if($psb(xml.xslcharesc))
								                                            {
											                                    h = h.replace(/&amp;/g,"&");
											                                    h = h.replace(/&gt;/g,">");
											                                    h = h.replace(/&lt;/g,"<");
								                                            }
                        													
								                                            l.innerHTML = h;
            								                                
								                                        }
								                                        catch(x){$error(x,"$xload");}
								                                    }
								                                    else
								                                    {
								                                        //Every other browser way of applying xsl shhet
								                                        try
								                                        {
								                                            p = new XSLTProcessor();
								                                            p.importStylesheet(s);
            								                                
								                                            if(xml.xsltparam)
								                                            {
								                                                for(k in xml.xsltparam)
                                                                                {
                                                                                    if(!$isf(xml.xsltparam[k]))
                                                                                    {
                                                                                        p.setParameter("", k, xml.xsltparam[k]);
                                                                                    }
                                                                                }
                                                                            }
            								                                
								                                            d = p.transformToFragment(rx,document);
                        											        
								                                            $dc(l);
								                                            $ac(l,d);
                        											        
								                                            if($psb(xml.xslcharesc))
								                                            {
											                                    h = l.innerHTML;
                        														
											                                    h = h.replace(/&amp;/g,"&");
											                                    h = h.replace(/&amp;/g,"&");	//needed twice in Mozilla Firefox
											                                    h = h.replace(/&gt;/g,">");
											                                    h = h.replace(/&lt;/g,"<");
                        												        
											                                    l.innerHTML = h;
										                                    }										        
                        											        
								                                        }
								                                        catch(y){$error(y,"$xload");}
								                                    }
                        											
								                                    $ef(xml.xslonload,r);
								                                    $ef(xml.onload,r);
                        											
							                                    },
							                        onerror :   function(){$ef(xml.xslonerror,this.req);$ef(xml.onerror,this.req);},
				                                    ontimeout : function(){$ef(xml.xslontimeout,this.req);$ef(xml.ontimeout,this.req);},
				                                    timeout :   xml.xsltimeout ?  xml.xsltimeout : xml.timeout,
				                                    nocache :   xml.xslnocache ? xml.xslnocache : xml.nocache,
				                                    loadImageId:xml.xslloadimageid ? xml.xslloadimageid : xml.loadimageid,
				                                    loadId  :   xml.xslid ? xml.xslid : xml.id,
				                                    title   :   xml.xsltitle ? xml.xsltitle : xml.title
				                                });
            				                        
							                $ef(xml.xmlonload,r);
							            },
							onerror :   function(){$ef(xml.xmlonerror,this.req);$ef(xml.onerror,this.req);},
							ontimeout:  function(){$ef(xml.xmlontimeout,this.req);$ef(xml.ontimeout,this.req);},
							timeout :   xml.xmltimeout ? xml.xmltimeout : xml.timeout,
							nocache :   xml.xmlnocache ? xml.xmlnocache : xml.nocache,
							loadImageId:xml.xmlloadimageid ? xml.xmlloadimageid : xml.loadImageId,
							loadId      :   xml.xmlid ? xml.xmlid : xml.id,
							title   :   xml.xmltitle ? xml.xmltitle : xml.title
					});
                    
                };
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
};/*
*   File Name:      SS.control.moveable.js
*   Description:    Makes page elements moveable
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
*   @class          Moveable. Makes elements moveable within a page.
*   @constructor
*/
SS.control.moveable =   function()
                        {
                            /**
                            *   @property {String}      id 
                            *   @description            Identifier of the moveable control.
                            */
                            this.id             =   "";
                            
                            /** 
                            *   @property {Function}    onmousedown
                            *   @description            Function called or evaluated {String} whenever the mouse button is pressed.
                            */
                            this.onmousedown    =   "";
                            
                            /** 
                            *   @property {Function}    onmouseup
                            *   @description            Function called or evaluated {String} whenever the mouse button is released.
                            */
                            this.onmouseup      =   "";
                            
                            /** 
                            *   @property {Function}    onmousemove
                            *   @description            Function called or evaluated {String} whenever the object is moving.
                            */
                            this.onmousemove    =   "";        //fires when the object is moving
                            
                            /**
                            *   @property {Boolean}     moving 
                            *   @description            Flag to indicate if the div is in a moving state. Default = false.
                            */
                            this.moving         =   0;
                            
                            /**
                            *   @property {Boolean}     movedelay 
                            *   @description            Number of milliseconds the mouse pointer has to be moving before the object moves
                            *   @since                  v1.0.8.20090930
                            */
                            this.movedelay		=	0;
                            
                            /**
                            *   @property {String}      cursor_over 
                            *   @description            CSS cursor style to use when the mouse pointer is over the moveable element.
                            */
                            this.cursor_over    =   "pointer";
                            
                            /**
                            *   @property {String}      cursor_move 
                            *   @description            CSS cursor style to use when the mouse pointer is moving the moveable element.
                            */
                            this.cursor_move    =   "move";
                            
                            /**
                            *   @property {String}      direction 
                            *   @description            Direction the moveable control can be moved in. Values = ["xy","x","y"]. Default = "xy".
                            */
                            this.direction      =   "xy";

                            /**
                            *   @property {String}      _m 
                            *   @description            Moving event reference.
                            */
                            this._m             =   null;

                            /**
                            *   @property {String}      _u 
                            *   @description            Mouse up event reference.
                            */
                            this._u             =   null;

                            /**
                            *   @property {String}      _s 
                            *   @description            Scroll event reference.
                            */
                            this._s             =   null;      //scroll event reference

                            /**
                            *   @property {String}      _b 
                            *   @description            Next sibling node of the moveable element
                            */
                            this._b			    =   null;

                            /**
                            *   @property {String}      _p 
                            *   @description            Original parent node of the moveable element
                            */
                            this._p			    =	null;


                            /**
                            *   @property {String}      _d 
                            *   @description			Move delay id
                            *   @since                  v1.0.8.20090930
                            */
                            this._d			    =	null;

                            /**
                            *   @property {String}      cssText 
                            *   @description            Holds the elements original style
                            */
                            this.cssText        =   "";

                            /**
                            *   @property {String}      OffsetX 
                            *   @description            Moving event reference.
                            */
                            this.oX             =   0;

                            /**
                            *   @property {String}      OffsetY 
                            *   @description            Moving event reference.
                            */
                            this.oY             =   0;

                            /**
                            *   @property {String}      ScrollX
                            *   @description            Moving event reference.
                            */  
                            this.sX             =   0;

                            /**
                            *   @property {String}      sY 
                            *   @description            ScrollY.
                            */
                            this.sY             =   0;
                            
                            /**
                            *   @property {Boolean}     detach 
                            *   @description            Detach the element from its parent and attach it to the
                            *                           document body during movement. Default = false;
                            *   @since                  v1.0.7.20090731
	                        */
                            this.detach             =   0;
                            
                            /**
                            *   @property {Boolean}     anytype 
                            *   @description            Allows any type of control to be made moveable whereas by default,
                            *                           input control such as textboxes are not moveable. Default = false.
                            *   @since                  v1.0.7.20090731
	                        */
                            this.anytype            =   0;
                            
                        };

SS.control.moveable.prototype =
{
	/**
	*   @function       SS.control.moveable.render
	*   @description    Renders an element as being moveable on the page.
	*   @returns        null
	*/
	render	:	function()
				{	    
				    //t:    this
				    //l:    element
			        var t = this, l = $g(t.id);
			            
			        if(l)
			        {
			            /**
			            *   @ignore
			            */
				        l.onmousedown =    function(e)
                                           {
                                           
												t._d = $st(function(){t._d = 0;},t.movedelay); //move delay
                                           
			                                    e = $e(e);
		                                        var p, l = this, g = e.srcElement || e.target;
		                                        
		                                        if($psb(t.anytype) || !$iln("input,select,textarea",g.tagName))
		                                        {
		                                            if(!t.cssText)
		                                            {
		                                                 t.cssText = l.style.cssText;
		                                            }
			                                        l.style.zIndex = 32000;
    			                                    
	                                                t.MouseDown.call(t,e,l); 
		                                            l.style.position = "absolute";
    		                                        
    		                                        
    		                                        if(t.detach)
    		                                        {
		                                                //attach the moveable element to the document body, rather than a sub element
		                                                t._p = l.parentNode;
		                                                t._b = l.nextSibling;
		                                                $rc(t._p,l);
		                                                $ac(document.body,l);
		                                            }
		                                            
		                                            p = $xyz(l);
		                                            p.x = $n(e.dX - t.oX);
		                                            p.y = $n(e.dY - t.oY);
		                                            $sxyz(l,p);
    			                                    
			                                        //$ea("onselectstart",function(e){$ec(e);return false;});
			                                    }
			                                    return $ec(e);
                                            };
			            /**
			            *   @ignore
			            */
				        l.onmouseup  =     function(e)
		                                   {
												var l = this;
		                                        if(t.cssText)
		                                        {
		                                            this.style.cssText = t.cssText;
		                                            t.cssText = null;
		                                        }
		                                        
		                                        t.MouseUp.call(t,e,this);
		                                        
		                                        if(t.detach)
		                                        {
		                                            $st(function()
													    {
														    try
														    {
															    //restore orginal ordering
															    $rc(document.body,l);
															    if(t._p)
															    {
																    t._p.insertBefore(l,t._b);
															    }
														    }
														    catch(x)
														    {
														        //failed to restore ordering, has the element or parent element been deleted?
														    }
													    },1);
											    }
		                                        
		                                    };
                                            
                        l.style.cursor = t.cursor_over;
                        
			        }
			        
				},
	/**
	*   @function               SS.control.moveable.MouseDown
	*   @description            Handles the mouse down event attached to the moveable element.
	*   @param {Event} e        Event
	*   @param {HTMLElement} l  Moveable element.
	*   @param {Boolean} es     Exclude Scroll. Default = false.
	*   @returns                null
	*/
	MouseDown : function(e,l,es)
	            {
	                if(l)
	                {
                        e = $e(e);
                        
                        //t:    this
                        //p:    element position
                        //sx:   scroll x
                        //sy:   scroll y
                        var t = this, p = $xyz(l), lp = l.parentNode, sl = 0, st = 0;
                        
                        t.sX = 0;
                        t.sY = 0;
                        while(lp)
                        {						
                            if(!isNaN(lp.scrollLeft))
                            {
                                sl += $n(lp.scrollLeft);
                            }					
                            if(!isNaN(lp.scrollTop))
                            {
                                st += $n(lp.scrollTop);
                            }
                            lp = lp.parentNode;
                        }
                        if(!es)
                        {
                            t.sX += $dbsl();
                            t.sY += $dbst();
                        }
                        t.oX = e.clientX - p.x + sl;
                        t.oY = e.clientY - p.y + st;
                        t._m = $ea("onmousemove",function(e){t.MouseMove.call(t,e);});
                        t._u = $ea("onmouseup",function(e){t.MouseUp.call(t,e);});
                        t._s = $ea("onscroll",function(e){t.Scroll.call(t,e);});
                        t.moving = 1;
                        if(l)
                        {
                            l.style.cursor = t.cursor_move;
                            /**
				            *   @ignore
				            */
                            l.onselectstart = function(e){$ec(e);return false;};
                        }
                        
                        $ef(t.onmousedown,t,e);
                    }
	            },
	/**
	*   @function               SS.control.moveable.MouseMove
	*   @description            Handles the mouse move event attached to the moveable element when it is being dragged around (in a moving state).
	*   @param {Event} e        Event
	*   @returns                null
	*/
	MouseMove : function(e)
	            {
	                //t:    this
	                //l:    element
	                var t = this, l, d = $lc(t.direction);
	                if(t._m && !t._d)
	                {
	                    e = $e(e);
	                    l = $g(t.id);
	                    
	                    if(l)
	                    {
	                        $sxyz(l,new SS.coord((d == "xy" || d == "x") ? (e.clientX - t.oX + t.sX) : null, (d == "xy" || d == "y") ? (e.clientY - t.oY + t.sY) : null, $n(l.style.zIndex)));
	                    }
	                    $ef(t.onmousemove,t,e);
                    }
	            },
	/**
	*   @function               SS.control.moveable.MouseUp
	*   @description            Handles the mouse up event attached to the moveable element.
	*   @param {Event} e        Event
	*   @param {HTMLElement} l  Moveable element.
	*   @returns                null
	*/
    MouseUp :   function(e,l)
                {
                    e = $e(e);
                    
                    //t:    this
                    var t = this;
                    
                    t.moving = 0;
                    $erid(t._m);
                    t._m = null;
                    $erid(t._u);
                    t._u = null;
                    $erid(t._s);
                    t._s = null;
                                        
                    if(l)
                    {
                        l.style.cursor = t.cursor_over;
                        l.onselectstart = null;
                    }
                    $ef(t.onmouseup,t,e);
                },
	/**
	*   @function               SS.control.moveable.Scroll
	*   @description            Stores the current document scroll positions.
	*   @returns                null
	*/
     Scroll :   function()
                {
                    this.sX = $dbsl();
                    this.sY = $dbst();
                }
};/*
*   File Name:      SS.control.dropzone.js
*   Description:    Creates areas on a page that moveable objects can be dropped into
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.locale.js
*   SS.events.js
*   SS.control.js
*   SS.geom.js
*   SS.addon.js
*/

/**
*   @class          Drop Zone. Areas on a page that moveable objects can be dropped into
*   @constructor
*/
SS.control.dropzone =   function()
                        {
                            /**
                            *   @property {String}  id 
                            *   @description        Identifier of the dropzone control.
                            */
                            this.id             =   "";
                            
                            /**
                            *   @property {Object}  lastDropped
                            *   @description        Contains the last item dropped in the drop zone
                            */
                            this.lastDropped    =   null;  //contains the last item dropped in the drop zone
                            
                            /**
                            *   @property {Object}  inFocus
                            *   @description        Contains the item that is in focus
                            */
                            this.inFoucs        =   null;
                            
                            /**
                            *   @property {Object}  onfocus
                            *   @description        Function called or evaluated {String} whenever the drop zone is in focus.
                            *                       This occurs when a moveable object has is dragged over the drop zone.
                            */
                            this.onfocus        =   "";    //fires when object enters the drop zone
                            
                            /**
                            *   @property {Object}  onblur
                            *   @description        Function called or evaluated {String} whenever the component leaves the drop zone.
                            */
                            this.onblur         =   "";    //fires when object leaves the drop zone
                            
                            /**
                            *   @property {Object}  ondrop
                            *   @description        Function called or evaluated {String} whenever a component is dropped / released in 
                            *                       the drop zone.
                            */
                            this.ondrop         =   "";
                            
                            /**
                            *   @property {Object}  onleave
                            *   @description        Function called or evaluated {String} whenever a component leaves the drop zone.
                            */
                            this.onleave         =   "";
                            
                            /**
                            *   @property {Node}    lastParent
                            *   @description        Parent node that the element was previously attached to
                            */
                            this.lastParent     =   null;
                            
                            /**
                            *   @property {Node}    lastNextSibling
                            *   @description        Next Sibling to the move that is currently being moved.
                            */
                            this.lastNextSibling =  null;
                        };


SS.control.dropzone.prototype = 
{
    /**
	*	renders the control in the form
	*/
	            /**
	            *   @function       render
	            *   @description    Registers the drop zone control on the page so that it can receive events.
	            */
	render	:	function()
				{
				    //t:    this,
				    //l:    drop zone element
				    //v:    ss.events
		            var t = this, l = $g(t.id), v = SS.events;
		            if(l)
		            {
		                v.dzr(t);
		                v.add("onresize",function(e){v.dzr(t);});
		                /**
		                *   @ignore
		                */
		                l.onresize = function(e){v.dzr(t);};    //capture resizing of the dropzone through SS.geom.height and SS.geom.width functions
		            }
			    },
			    /**
			    *   @function           DragFocus
			    *   @description        Function called when a control is dragged into the focus of the drop zone.
			    *                       This handles the calling of the function {@link SS.control.dropzone.onfocus}.
			    *   @param {Event} e    Event.
			    *   @param {HTMLElement} c Element that has been dragged into the drop zone.
			    *   @returns            null
			    */
    DragFocus:  function(e,c)
                {
                    var t = this;
                    t.inFocus = c;
                    $ef(t.onfocus,t,e);
                },
			    /**
			    *   @function           DragBlur
			    *   @description        Function called when a control is dragged out of focus from the drop zone.
			    *                       This handles the calling of the function {@link SS.control.dropzone.onblur}.
			    *   @param {Event} e    Event.
			    *   @param {HTMLElement} c Element that has been dragged into the drop zone.
			    *   @returns            null
			    */
    DragBlur:   function(e,c)
                {
                    var t = this;
                    t.inFocus = null;
                    $ef(t.onblur,t,e);
                },
			    /**
			    *   @function           DragDrop
			    *   @description        Function called when a control is dropped in the drop zone.
			    *                       This handles the calling of the function {@link SS.control.dropzone.ondrop}.
			    *   @param {Event} e    Event.
			    *   @param {HTMLElement} c Element that has been dragged into the drop zone.
			    *   @returns            null
			    */
    DragDrop:   function(e,c)
                {
                    var t = this;
                    t.lastDropped = c;
                    t.inFocus = null;
                    
                    //get the component, then the html rendered element
                    //and detatch element in the DOM from its parent and reattach
                    //it to the drop zone
                    if(c)
                    {
                        var l = $g(c.id), d = $g(t.id), pn;
                        if(l && d)
                        {
                            pn = l.parentNode;
                            t.lastNextSibling = l.nextSibling;
                            t.lastParent = pn;
                            $rc(pn,l);
                            $ac(d,l);
                        }
                    }
                    $ef(t.ondrop,t,e);
                },
			    /**
			    *   @function           DragLeave
			    *   @description        Function called when a control is removed from the drop zone.
			    *                       This handles the calling of the function {@link SS.control.dropzone.onleave}.
			    *   @param {Event} e    Event.
			    *   @param {HTMLElement} c Element that has left the drop zone.
			    *   @returns            null
			    */
    DragLeave:  function(e,c)
                {
                    $ef(this.onleave,this,e);
                },
			    /**
			    *   @function           cancelDrop
			    *   @description        Function called to cancel the dropping of an element and return it to its original position
			    *                       in the document tree.
			    *   @returns            null
			    */
    cancelDrop: function()
                {
                    var t = this, l;
                    if(t.lastDropped && t.lastParent)
                    {
                        l = $g(t.lastDropped.id);
                        if(l)
                        {
                            $rc(l.parentNode,l);
                            t.lastParent.insertBefore(l,t.lastNextSibling);
                        }
                    }
                }
	
};
/*
*   File Name:      SS.control.slider.js
*   Description:    A slider / scroll bar control
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
*   @class Slider control.
*   @constructor
*/
SS.control.slider   =   function()
                        {
                            /**
                            *   @property id 
                            *   @description Identifier of the slider control.
                            */
                            this.id             =   "";
                            
                            /** 
                            *   @property {Function}    onclick
                            *   @description            Function called or evaluated {String} when the slider is clicked.
                            *                           This occurs after the onmousedown and onmouseup events.
                            */
                            this.onclick        =   "";
                            
                            /** 
                            *   @property {Function}    onchange
                            *   @description            Function called or evaluated {String} whenever the slider has changed position.
                            */
                            this.onchange       =   "";
                            
                            /**
                            *   @property {String}      css 
                            *   @description            Style sheet class applied to the slider.
                            *                           Default = ""
                            */
                            this.css            =   "";
                            
                            /**
                            *   @property {String}      css_pick 
                            *   @description            Style sheet class applied to the pick inside the slider.
                            *                           Default = ""
                            */
                            this.css_pick       =   "";
                            
                            /**
                            *   @property {String}      css_bar 
                            *   @description            Style sheet class applied to the slider bar.
                            *                           Default = ""
                            */
                            this.css_bar        =   "";
	                        
	                        /**
                            *   @property {String}      orientation 
                            *   @description            Direction of the slider bar.
                            *                           Values : [horizontal|vertial]. Default = "horizontal".
                            */
                            this.orientation    =   "horizontal";   //determins the direction the slider should be displayed
                            
	                        /**
                            *   @property {Integer}     minvalue 
                            *   @description            Minimum value that the slider can select.
                            *                           Default = 0.
                            */
                            this.minvalue       =   0;              //value from
                            
	                        /**
                            *   @property {Integer}     maxvalue 
                            *   @description            Maximum value that the slider can select.
                            *                           Default = 100.
                            */
                            this.maxvalue       =   100;            //value to
                            
	                        /**
                            *   @property {Integer}     value 
                            *   @description            Selected Value.
                            *                           Default = 0.
                            */
                            this.value          =   0;              //selected value
                            
	                        /**
                            *   @property {String}      pickwidth 
                            *   @description            Override CSS width rule for the pick width.
                            *                           Minimum pick width = 8 px when pick width is set to auto.
                            *                           Default = "auto".
                            */
                            this.pickwidth      =   "auto";
                            
	                        /**
                            *   @property {String}      pickheight 
                            *   @description            Override CSS width rule for the pick height.
                            *                           Minimum pick height = 8 px when pick height is set to auto.
                            *                           Default = "auto".
                            */
                            this.pickheight     =   "auto";
                            
	                        /**
                            *   @property {String}      pickalign 
                            *   @description            Override CSS width rule for the pick alignment.
                            *                           Default = "center".
                            */
                            this.pickalign      =   "center";
                        
                            /** 
                            *   @property {String}      linkto
                            *   @description            Id of element that will hold the current selected slider value
                            */
                            this.linkto         =   "";
                            
                            //run time only properties
                            //------------------------
                            
                            /** 
                            *   @property {String}      _m
                            *   @description            Pointer to page events -> slider move function.
                            *   @private
                            */
                            this._m             =   0;
                            
                            /** 
                            *   @property {String}      _st
                            *   @description            Pointer to page events -> slider stopped function.
                            *   @private
                            */
                            this._st            =   0;
                            
                            /** 
                            *   @property {String}      _x
                            *   @description            Mouse pointer offset x onmousedown event.
                            *   @private
                            */
                            this._x             =   0;
                            
                            /** 
                            *   @property {String}      _y
                            *   @description            Mouse pointer offset y onmousedown event.
                            *   @private
                            */
                            this._y             =   0;
                            
                            /** 
                            *   @property {Boolean}     _sc
                            *   @description            Enable the wheel on the mouse to move the scroll bar.
                            *                           Default = true.
                            *   @private
                            */
                            this._sc         =   1;
                            
                            /** 
                            *   @property {String}      _ic
                            *   @description            Container Id.
                            *   @private
                            */
                            this._ic            =   "";
                            
                            /** 
                            *   @property {String}      _ib
                            *   @description            Bar Id.
                            *   @private
                            */
                            this._ib            =   "";
                            
                            /** 
                            *   @property {String}      _ip
                            *   @description            Pick Id.
                            *   @private
                            */
                            this._ip            =   "";
                            
                            /** 
                            *   @property {String}      _s
                            *   @description            onmousescroll event reference.
                            *   @private
                            */
                            this._s             =   "";
                            
                        };


SS.control.slider.prototype =
{
                /**
	            *   @function       SS.control.slider.render
	            *   @description    Renders the slider on the page.
	            *   @returns        null
	            */
    render  :   function()
                {
                    //t:    this
                    //l:    element
                    //
                    var t = this, l = $g(t.id);
			        if(l)
			        {
			            $dc(l); //if element has already been drawn, clear all children to allow for the element to be redrawn
			            
				        //draw the object
				        
				        //cn:   container
				        //br:   bar
				        //pk:   pick
				        //p:    classname predix
				        //f:    linkto field
				        var cn = $c(), br = $c(), pk = $c(), p = "SS_control_slider", f;
				        
                        /**
                        *   @ignore
                        */
				        cn.onselectstart = function(e){$ec(e); return false;};
                        
                        //link the slider to the control specified
                        if(t.linkto)
                        {
                            f = $g(t.linkto);
                            if(f)
                            {
                                t.value = f.value;
                                
                                /**
                                *   @ignore
                                */
                                f.onchange =    function(e)
                                                {
                                                    t.value = this.value;
                                                    t.move.call(t,e,1);
                                                };
                            }
                        }
				        
				        $cl(cn,p + " " + t.css);
				        $cl(br,p + "_bar" + " " + t.css_bar);
				        $cl(pk,p + "_pick" + " " + t.css_pick);
                        
				        t._ic = cn.id;
				        t._ib = br.id;
				        t._ip = pk.id;
				        
				        //default styles for br
				        $w(br,"100%");
				        $h(br,"100%");
				        br.style.position = "relative";
				        
				        pk.style.position = "absolute";
				        $w(pk,t.pickwidth);
				        $h(pk,t.pickheight);
				        pk.style.zIndex = br.style.zIndex + 1;
				        pk.style.top = "0px";
				        
                        /**
                        *   @ignore
                        */
				        pk.onmousedown =    function(e)
				                            {
                                                e = $e(e);
                                                var p = $xyz(this);
                                                t._x = e.clientX - p.x + $dbsl();
                                                t._y = e.clientY - p.y + $dbst();
				                                t._m = $ea("onmousemove",function(e){if(t._m){t.move.call(t,e);}$ec(e);});
				                                t._st = $ea("onmouseup",function(e){t.mouseup.call(t,e);});
				                                $ec(e);
				                            };
                        /**
                        *   @ignore
                        */
                        pk.onmouseup =      function(e)
                                            {
				                                return t.mouseup.call(t,e);
                                            };
                        /**
                        *   @ignore
                        */
                        br.onclick =        function(e)
                                            {
                                                t.move.call(t,e);
                                            };
				        if(!$ise(t.onclick))
                        {
                            //onclick function defined, call the defined function
                            /**
                            *   @ignore
                            */
                            pk.onclick =    function(e)
                                            {
                                                $ef(t.onclick,t,e);
                                                $ec(e);
                                            };
                        }
				        
				        $ac(cn,br);
				        $ac(br,pk);        
				        $ac(l,cn);
				        
				        
				        
				        if($psb(t._sc) && $ise(t._s))
				        {
				            //enable changing of the visible month by the mouse scroll
				            t._s = $ea("onmousewheel",  function(e)
		                                                {
		                                                
		                                                    //p:    position of the calendar
		                                                    //x:    mouse co-ordinate X
		                                                    //y:    mouse co-ordinate Y
		                                                    var p = $xyz($g(t.id)), x = e.dX, y = e.dY;
                                                            //if mouse scroll event occurred inside the control, update
                                                            if(x >= p.x && x <= (p.x + p.w) && y >= p.y && y < (p.y + p.h))
                                                            {
		                                                        //the mouse pointer is inside the calendar area
		                                                        t.value = $n(t.value) + e.delta;
		                                                        t.move.call(t,e,1); //update the scroll bar to reflect the change in the value
		                                                        
		                                                        $ec(e);
		                                                        return false;
		                                                    }
		                                                });
				        }
				        
				        
				        
				        t.move(window.event,1);
				    }
                    $sa(l,"value",t.value);
				    
                },
                /**
                *   @function           SS.control.slider.move
                *   @description        Handles movement of the pick.
                *   @param {Boolean} u  Update flag. Ignores the event position co-ordindates when set to true.
                *   @returns            null
                */
    move    :   function(e,u)
                {
                
                    //t:    this
                    //l:    element
                    //pk:   pick
                    //br:   bar
                    //brp:  bar position
                    //pd:   pick displacement
                    //pw:   pick width
                    //ph:   pick height
                    //bw:   bar width
                    //bh:   bar height
                    //ov:   old value
                    //pp:   pick position
                    //pu:   pick unit
                    //f:    linkto field
                    //pa:   pick align
                    e = $e(e);                    
                    var t = this, l = $g(t.id), pk = $g(t._ip), br = $g(t._ib), brp = $xyz(br), pd = 0, pw, ph, bw = $w(br), bh = $h(br), ov = t.value, pp, pu, f = $g(t.linkto), pa = $lc(t.pickalign);
                    
	                if(t.orientation == "vertical")
	                {
	                    //vertical alignment
	                    
	                    //set the pick height and width
		                if($lc(t.pickheight) == "auto")
			            {
			                if(pu > 8)
			                {
			                    $h(pk,$rnd(pu));
			                }
			                else
			                {
			                    $h(pk,8);
			                }
			            }
			            if($lc(t.pickwidth) == "auto")
			            {
			                $w(pk,"100%");
			            }
			            ph = $h(pk);
	                    
	                    if(pa == "left")
		                {
		                    pd = ph; 
		                }
		                if(pa == "center")
		                {
		                    pd = ph / 2;
		                }

	                    pu = bh / (t.maxvalue - t.minvalue);
	                    if(!u)
	                    {   //set the position based on the co-ordindates in the event
	                        pp = e.clientY - t._y - brp.y - $dbst();
	                        t.value = $rnd(((pp + pd) / pu) + $n(t.minvalue));
	                    }
	                    if($n(t.value) < $n(t.minvalue))
	                    {
	                        t.value = t.minvalue;
	                    }
	                    if($n(t.value) > $n(t.maxvalue))
	                    {
	                        t.value = t.maxvalue;
	                    }
	                    $sxyz(pk,new SS.coord(null,$rnd(((t.value - t.minvalue) * pu) - pd)));	                    
	                }
	                else
	                {
	                    //horizontal alignment
	                    
	                    //set the pick width & height
                        if($lc(t.pickwidth) == "auto")
			            {
			                if(pu > 8)
			                {
			                    $w(pk,$rnd(pu));
			                }
			                else
			                {
			                    $w(pk,8);
			                }
			            }
			            if($lc(t.pickheight) == "auto")
			            {
			                $h(pk,"100%");
			            }
                        pw = $w(pk);
	                    
	                    if(pa == "left")
		                {
		                    pd = pw; 
		                }
		                if(pa == "center")
		                {
		                    pd = pw / 2;
		                }

	                    pu = bw / (t.maxvalue - t.minvalue);
	                    
	                    if(!u)
	                    {   //set the position based on the co-ordindates in the event
	                        pp = e.clientX - t._x - brp.x - $dbsl();
	                        t.value = $rnd(((pp + pd) / pu) + $n(t.minvalue));
	                    }
	                    
	                    if($n(t.value) < $n(t.minvalue))
	                    {
	                        t.value = t.minvalue;
	                    }
	                    if($n(t.value) > $n(t.maxvalue))
	                    {
	                        t.value = t.maxvalue;
	                    }
	                    $sxyz(pk,new SS.coord($rnd(((t.value - t.minvalue) * pu) - pd),null));
	                    
	                }
    
                    if(f)
                    {
                        f.value = t.value;
                    }
                    
                    $sa(l,"value",t.value);
                    
                    if(t.value != ov || u)
                    {
                        //value has changed, call the onchange function if is has been defined
                        $ef(t.onchange,l,e);
                    }
                },
                /**
                *   @function           SS.control.slider.mouseup
                *   @description        Handles the onmouseup event
                *   @param {Event} e    Event.
                *   @returns            null
                */
    mouseup :   function(e)
                {
                    var t = this;
                    $erid(t._m);
                    $erid(t._st);
                    t._m = null;
                    t._st = null;
                    $ec(e);
                    return false;
                }

};
/*
*   File Name:      SS.control.window.js
*   Description:    A moveable window control
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
*   SS.control.moveable.js
*   SS.addon.js
*/


/**
*   @class Moveable Window - Includes modal option
*   @constructor
*/
SS.control.window  =    function()
                        {
                            /**
                            *   @property id 
                            *   @description Identifier of the window control.
                            */
                            this.id             =   "";
                            
                            /** 
                            *   @property {Function}    onclose
                            *   @description            Function called or evaluated {String} whenever the window has been closed.
                            */
                            this.onclose        =   "";
                            
                            /** 
                            *   @property {Function}    onshow
                            *   @description            Function called or evaluated {String} whenever the window has been made visible.
                            */
                            this.onshow         =   "";
                            
                            /** 
                            *   @property {Function}    onhide
                            *   @description            Function called or evaluated {String} whenever the window has been made invisible (hidden).
                            */
                            this.onhide         =   "";
                            
                            /** 
                            *   @property {Function}    onresize
                            *   @description            Function called or evaluated {String} whenever the window is resized.
                            */
                            this.onresize       =   "";
                            
                            /**
                            *   @property {String}      css 
                            *   @description            Style sheet class applied to the window.
                            *                           Default = ""
                            */
                            this.css            =   "";
                            
                            /**
                            *   @property {String}      css_title
                            *   @description            Style sheet class applied to the title.
                            *                           Default = ""
                            */
                            this.css_title      =   "";
                            
                            /**
                            *   @property {Boolean}     titlebar
                            *   @description            Flag to indicate if the window should have a title bar.
                            *                           Default = true.
                            */
                            this.titlebar       =   1;          //sets if a title bar should be applied to the window
                            
                            /**
                            *   @property {Boolean}     button_close
                            *   @description            Flag to indicate if there should be a close button in the title bar.
                            *                           Default = true.
                            */
                            this.button_close   =   1;          //display a close window button in the title bar
                            
                            /**
                            *   @property {Boolean}     button_max
                            *   @description            Flag to indicate if there should be a maximize button in the title bar.
                            *                           Default = false.
                            */
                            this.button_max     =   0;
                            
                            /**
                            *   @ignore
                            *   property {Boolean}     button_min
                            *   description            To be implemented. Flag to indicate if there should be a minimize button in the title bar.
                            *                           Default = false.
                            */
                            this.button_min     =   0;          //display a minimize button in the title bar
                            
                            /**
                            *   @property {String}      title
                            *   @description            Title text to appear in the title bar.
                            *                           Default = ""
                            */
                            this.title          =   "";
                            
                            /**
                            *   @property {String}      width
                            *   @description            Width of the window in any supported size unit. E.g. px or %
                            *                           Default = ""
                            */
                            this.width          =   "";
                            
                            /**
                            *   @property {String}      height
                            *   @description            Height of the window in any supported size unit. E.g. px or %
                            *                           Default = ""
                            */
                            this.height         =   "";
                            
                            /** 
                            *   @property {Boolean}   visible
                            *   @description          Flag to indicate whether or not the window is currently visible. Overrides style="display:none;" rule on initial render.
                            *                         Default = true.
                            */
                            this.visible        =   1;
                            
                            /** 
                            *   @property {Boolean}   resize
                            *   @description          Flag to indicate whether or not the window can be resized by using the resize pick in the bottom right of the window.
                            *                         Default = false.
                            */
                            this.resize         =   0;          //defines if the window can be resized
                            
                            /** 
                            *   @property {Boolean}   background
                            *   @description          Flag to indicate whether or not a background with a semi-transparent colour that covers the screen should be used.
                            *                         Default = true.
                            */
                            this.background     =   1;          //covers the screen 
                            
                            
                            /** 
                            *   @property {Integer}   bgopacity
                            *   @description          Opacity of the background blanket (if enabled). Valid values range from 0 (invisible) to 100 (opaque).
                            *                         Default = 50.
                            */
                            this.bgopacity      =   50;         //how tansparent the background should be
                            
                            /** 
                            *   @property {String}    _in
                            *   @description          Container Id
                            */
                            this._in            =   "";
                             
                            /** 
                            *   @property {String}    _ib
                            *   @description          Titlebar Id
                            */
                            this._ib            =   "";
                             
                            /** 
                            *   @property {String}    _ig
                            *   @description          Background Id
                            */
                            this._ig            =   "";
                        };


SS.control.window.prototype = 
{
	            /**
	            *   @function       SS.control.window.render
	            *   @description    Renders the window on the page.
	            *   @returns        null
	            */
    render  :   function()
                {
                    //t:    this
                    //l:    window element (outermost)
                    //m:    moveable control
                    //n:    content payne
                    //b:    title bar
                    //g:    background
                    //p:    classname prefix
                    //pt:   classname prefix titlebutton
                    //d:    dimensions
                    //r:    resizeable movement control
                    //v:    visibility
                    //c:    child nodes
                    var t = this, l = $g(t.id), m = new SS.control.moveable(), n = $c(), p = "SS_control_window", pt = p + "_titlebutton", i, d, r = new SS.control.moveable(), g, c;
                    if(!l)
                    {
                        /**
                        *   @ignore
                        */
                        l = $c();
                        l.id = t.id;
                        //attach to document.body
                        $ac(document.body,l);
                    }
                    
                    m.id = l.id;
                    m.render.call(m);
                    
                    /**
				    *   @ignore
				    */
					l.onmouseup =	function(e)
                                    {
                                        if(r)
                                        {
                                            r.MouseUp.call(r);
                                        }
                                        m.MouseUp.call(m);

                                        $ec(e);
                                    };
                                    
                    //cancel movement of the window if it is currently being scrolled
                    /**
				    *   @ignore
				    */
					l.onscroll =        function(e)
                                        {
                                            if(r)
                                            {
                                                r.MouseUp.call(r);
                                            }
                                            m.MouseUp.call(m);                                    
                                        };
                    /**
				    *   @ignore
				    */
					l.onselectstart =   function(e)
                                        {
                                            if(r)
                                            {
                                                r.MouseUp.call(r);
                                            }
                                            m.MouseUp.call(m);                                    
                                        };

                    $cl(l,p + " " + (t.css ? t.css : ""));
                    if(t.height)
                    {
                        $h(l,t.height);
                    }
                    if(t.width)
                    {
                        $w(l,t.width);
                    }


                    //<- at this point we have an empty window
                    if(!t._ib && $psb(t.titlebar))
                    {
                        //a title bar has been specified
                        //tb: titlebar
                        //bt: bar text
                        //bc: button close
                        //tt: title text
                        //bx: button maximize
                        //bn: button minimize

                        b = $c();
                        var bt = $c(), bc = $c(), tt = t.title, bx = $c(), bn = $c();
                        t._ib = b.id;
                        $cl(b,p + "_title " + (t.css_title ? t.css_title : ""));

                        $cl(bt,p + "_titletext");
                        bt.innerHTML = (tt) ? tt : "";

                        $ac(b,bt);

                        if($psb(t.button_close))
                        {
                            $cl(bc,p + "_titlebutton " + pt + "_close");
                            /**
                            *   @ignore
                            */
                            bc.onmousedown  = function(e)
                                              {
                                                  //$cl(this,pt + "_pressed " + pt + " " + pt + "_red");
                                                  //m.MouseDown.call(m,e,$g(t.id));
                                                  $ec(e);
                                              };
                            /**
                            *   @ignore
                            */
                            bc.onmouseup =    function()
                                              {
                                                  $cl(this,pt + " " + pt + "_close");
                                              };
                            /**
                            *   @ignore
                            */
                            bc.onclick =    function(e)
                                            {
                                                t.hide.call(t);
                                                $ef(t.onclose,t,e);
                                                $ec(e);
                                            };
                            bc.title = "Close";
                            $ac(b,bc);
                        }

                        if($psb(t.button_max))
                        {
                            $cl(bx,p + "_titlebutton " + pt + "_max");
                            /**
                            *   @ignore
                            */
                            bx.onmousedown=   function(e)
                                              {
                                                  $cl(this,pt + "_pressed " + pt + " " + pt + "_max");
                                              };
                            /**
                            *   @ignore
                            */
                            bx.onmouseup =function()
                                          {
                                              $cl(this,pt + " " + pt + "_max");
                                              t.size.call(t,$dbd().w-10,$dbd().h-10);
                                          };
                            /**
                            *   @ignore
                            */
                            bx.onclick =function(e)
                                        {
                                            $ec(e);
                                        };
                            bx.title = "Maximize";

                            $ac(b,bx);
                        }

                        if($psb(t.button_min))
                        {

                        }
                        
                        l.insertBefore(b,l.childNodes[0] ? l.childNodes[0] : null);

                        /**
                        *   @ignore
                        */
                        n.onmousedown = function(e)
                                        {
                                            $ec(e);
                                            return true;
                                        };

                    }

                    //attach the container to the empty window shell
                    $ac(l,n);

					var ls = $gd(l), sl;
					var sf =    function(e)
						        {
							        if(r)
							        {
								        r.MouseUp.call(r);
							        }
							        m.MouseUp.call(m);
						        };       
                    for(i = 0; i < $ln(ls); i++)
                    {
                        sl = ls[i];
						if($isd(sl.onscroll))
						{
							sl.onscroll = sf;
						}
                    }
                    
                    if($psb($lc(t.resize)))
                    {
                        //resizeable window
                        d = $xyz(l);
                        //nw: north-west pick control
                        //pd: pick dimensions
                        var nw = $c(), pd, nws = 20;
                        nw.className = p + "_pick_nwresize";            
                        $ac(n,nw);

                        pd = $xyz(nw);
                        pd.x = d.w - nws - 1;
                        pd.y = d.h - nws - 1;
                        $sxyz(nw,pd);

                        r.id = nw.id;
                        r.cursor_over = "nw-resize";
                        r.cursor_move = "nw-resize";
                        /**
                        *   @ignore
                        */
                        r.onmousemove = function(e)
                                        {
                                            //l:    window
                                            //d:    window dimensions
                                            //x:    mouse event ordinate x
                                            //y:    mouse event ordinate y
                                            var l = $g(t.id),d = $xyz(l), x = e.dX, y = e.dY;
                                            if(d)
                                            {
                                                $h(l,y - d.y + 5);
                                                $w(l,x - d.x + 5);                                                                                                 
                                            }
                                        };
                        /**
                        *   @ignore
                        */
                        r.onmouseup =   function(e)
                                        {
                                            //l:    this element
                                            //nw:   north-west resize
                                            //pd:   pick dimensions
                                            //d:    element dimension
                                            //nws:  north-west resize offset
                                            var l = $g(t.id),nw = $g(this.id), pd = $xyz(nw),d = $xyz(l), nws = 20;

                                            pd = $xyz(nw);
                                            pd.x = d.w - nws - 1;
                                            pd.y = d.h - nws - 1;
                                            $sxyz(nw,pd);

                                            if($isd(r.overflow))
                                            {
                                                l.style.overflow = r.overflow;
                                            }
                                        };
                        r.render();

                        /**
                        *   @ignore
                        */
                        nw.onmousedown =function(e)
                                        {
                                           var l = $g(t.id);
                                           r.overflow = l.style.overflow;
                                           l.style.overflow = "hidden";
                                           r.MouseDown.call(r,e,$g(r.id));
                                           $ec(e);
                                        };
                        /**
                        *   @ignore
                        */
                        nw.onmouseup =  function(e)
                                        {
                                           r.MouseUp.call(r,e,$g(r.id));
                                           $ec(e);
                                        };

                    }

                    //update id mappings
                    t._in = n.id;
                    v = $ga(l,"visible");
                    if($ise(v))
                    {
                        v = 1;
                    }

                    if(!t._ig && $psb(t.background))
                    {
                        g = $c();
                        t._ig = g.id;
                        g.className = p + "_background";
                        g.style.zIndex = 1;  //$mzis($mzig() - 10);
                        $op(g,t.bgopacity);
                        $w(g,$dbd().w + $dbsl());
                        $h(g,$dbd().h + $dbst());

                        $ac(document.body,$c()); //IE fix. Without this, setting the opacity on the background was taking significant time to render.
                        $ac(document.body,g);

                        //resize the background in the window is resized or scrolled
                        var _fbgrz =function()
                                    {
                                        var g = $g(t._ig);
                                        if(g)
                                        {
                                            $w(g,$dbd().w + $dbsl());
                                            $h(g,$dbd().h + $dbst());
                                        }                                                                        
                                    };
                        $ea("onresize",_fbgrz);
                        $ea("onscroll",_fbgrz);
                    }

                    t.display($psb(v));
                    
                },
                /**
                *   @function           display
                *   @description        Set the visibility  of the window.
                *   @param {Boolean} v  Visible flag. true to make visible, false to hide.
                *   @param {Event}   e  Event
                */
    display :   function(v,e)
                {
                    var t = this, l = $g(t.id),b,d;
                    if(l && l.style)
                    {
                        $v(l,v);
                        //set the window position (default center screen)
                        d = $xyz(l);
                        d.x = $rnd(($dbd().w - d.w) / 2) + $dbsl();
                        d.y = $rnd(($dbd().h - d.h) / 2) + $dbst();
                        d.z = null; //do not set the zIndex
                        if(!d.x || d.x < 0)
                        {
                            d.x = 0;
                        }
                        if(!d.y || d.y < 0)
                        {
                            d.y = 0;
                        }
                        $sxyz(l,d);
                    }
                    if(t._ig)
                    {
                        b = $g(t._ig);
                        if(b)
                        {
                           $v(b,v);
                           $w(b,$dbd().w + $dbsl());
                           $h(b,$dbd().h + $dbst());
                        }
                    }
                    t.visible = v;
                    if(v)
                    {
                        $ef(t.onshow,t,e);
                    }
                    else
                    {
                        $ef(t.onhide,t,e);
                    }
                    
                },
                /**
                *   @function           display
                *   @description        Make the window visible.
                *   @param {Event}   e  Event
                */
    show    :   function(e)
                {
                    this.display(1,e);
                },
                /**
                *   @function           display
                *   @description        Make the window invisible but without destroying it.
                *   @param {Event}   e  Event
                */
    hide    :   function(e)
                {
                    this.display(0,e);
                },
                /**
                *   @function           destroy
                *   @description        Destroy the window, releasing any elements used. This window cannot
                *                       be made visible again.
                */
    destroy :   function()
                {
                    var t = this,l = $g(t.id), b;
                    t.display(0);
                    
                    if(l)
                    {
                        $d(l);
                    }

                    if(t._ig)
                    {
                        //destroy the background as well
                        b = $g(t._ig);
                        $d(b);
                    }
				    
				                t._in = "";
				                t._ig = "";
				                //remove reference to this control from the global controls array
				                SS.global.controls.remove(t);
                },
                /**
                *   @function           size
                *   @description        Set the window height and width.
                *   @param {String} w   Width. Width of the window. E.g. 100, 100px, 100%
                *   @param {String} h   Height. Height of the window. E.g. 100, 100px, 100%
                */
        size :  function(w,h)
                {
                    //w:    width (e.g. 100, 100px, 100%)
                    //h:    height (e.g. 100, 100px, 100%)
                    //t:    this
                    //l:    window element
                    //d:    dimensions
                    var t = this, l = $g(t.id), d;
                    
                    if(!$ise(w))
                    {
                        t.width = w;
                        $w(l,w);  
                    }
                    
                    if(!$ise(h))
                    {
                        t.height = h;
                        $h(l,h); 
                    }
                    
                    //set the window position (default center screen)
                    d = $xyz(l);
                    d.x = $rnd(($dbd().w - d.w) / 2) + $dbsl() - 9;
                    d.y = $rnd(($dbd().h - d.h) / 2) + $dbst() - 9;
                    d.z = null; //do not set the zIndex
                    if(!d.x || d.x < 0)
                    {
                        d.x = 0;
                    }
                    if(!d.y || d.y < 0)
                    {
                        d.y = 0;
                    }
                    $sxyz(l,d);  
                }
};





/****
*   functions directly linked to controls
*   
*   @param  s   :   string      -   text to display OR
*   @param  s   :   msgboxparam -   Msgbox parameters
*   @param  t   :   string      -   window title text
*   @param  b   :   int         -   type of buttons to display
*   @param  evc :   function    -   function called when the window closes as the result of a button click.
*                                   first parameter of the function contains the int number of the button pressed
*
*   MsgBox Button Types
*   ------------------------------
*   0:  OK  (default)       0
*   1:  OK, Cancel          0,1
*   2:  Yes, No             2,3
*   3:  Yes, No, Cancel     2,3,1
*
*/


/**
*   msgbox Globals
*   ----------------------------------
*                                   //
    msgbox._RET_CLOSED = -1;        //
    msgbox._RET_OK = 0;             //
    msgbox._RET_CANCEL = 1;         //
    msgbox._RET_YES = 2;            //
    msgbox._RET_NO = 3;             //
    msgbox._RET_ACCEPT = 4;         //
    msgbox._RET_DECLINE = 5;        //
                                    //
    msgbox._BUT_OK = 0;             //
    msgbox._BUT_OK_CANCEL = 1;      //
    msgbox._BUT_YES_NO = 2;         //
    msgbox._BUT_YES_NO_CANCEL = 3;  //
    msgbox._BUT_ACCEPT_DECLINE = 4; //
                                    //
*   ----------------------------------
*/

/**
*
*   @class  msgboxparam Parameters object used to configure the look and feel of a msgbox
*   @construtor
*   
*/
SS.msgboxparam =    function()
                    {
                        this.text = "";
                        this.title = "";
                        this.button = 0;        //msgbox._BUT_OK
                        this.onclose = null;
                        this.focus = true;
                        this.attachElement = null;
                    };

/**
*   Display the message box
*/
function $msgbox(s,b,evc,t)
{
    //d:    dialogue
    //f:    focus
    //al:   attach element
    //mb:   message box window
    var d, f, al, mb = new SS.control.window(al);
    
    if($iso(s))
    {
        d = s.text;
        b = s.button;
        evc = s.onclose;
        t = s.title;
        f = s.focus;    
        al = s.attachElement;    
    }
    else
    {
       d = s;
       f = true;
    }
    mb.id = $nid();    
    mb.titlebar = 1;
    mb.title = (t) ? t : document.title + " Says:";
    mb.choice = null;

    /**
    *   @ignore
    */
    mb.onclose =    function(e)
                    {
                        mb.choice = -1;             //msgbox._RET_CLOSED
                        $ef(evc,mb,e);
                        mb.destroy.call(mb);    
                        mb = null;
                    };
    
    mb.render(al);
    
    //w:    window
    //n:    content payne
    //tb:   titlebar
    //dm:   dimensions of text
    //r:    
    var w = $g(mb.id), n = $g(mb._in), tb = $g(mb._ib), dm, r = $c();
    
    r.id = r.id + "_r";
    r.style.width = "auto";
    r.style.cssFloat = "left";
    r.style.overflow = "auto";
    
    //c1: image
    //c2: text column
    //b1: button holder
    //x: actual text
    //pc: panel class prefix
    var c1 = $c(), c2 = $c(), b1 = $c(), x = $c(), pc = "SS_control_msgbox_panel_";
    
    c1.className = pc + "image";
    c2.className = pc + "text";
    b1.className = pc + "button";
        
    x.innerHTML = d.replace(/\u0020/g,"_");
    $cl(x,c2.className);
    $sa(x,"align","center");
    c1.innerHTML = "&nbsp";
    
    $ac(c2,x);
    
    $ac(r,c1);
    $ac(r,c2);
    
    $ac(n,r);
    $ac(n,b1);
    
    //calculate the correct size of the message box
        
    //change message spacing back
    x.innerHTML = d.replace(/\n/g,"<br/>");
    x.style.cssFloat = "left";
    
    
    //add buttons
    if(!b)
    {
        b = 0;
    }
    
    var bok, bcanc, byes, bno, baccept, bdecline, y = "button", bc = "SS_control_msgbox_button_";
    
    //ok button
    if(b != 2 && b != 3)
    {
        bok = $c("input");
        bok.type = y;
        bok.value = "OK";
        $cl(bok,bc + "ok");
        
        /**
        *   @ignore
        */
        bok.onclick =   function(e)
                        {
                            mb.choice = 0;              //msgbox._RET_OK;
                            $ef(evc,mb,e);
                            mb.destroy.call(mb);    
                            mb = null;                     
                        };
        if(f)
        {
            $st(function(){bok.focus();},1);
        }
    }
    
    //cancel button
    if(b == 1 || b == 3)
    {
        bcanc = $c("input");
        bcanc.type = y;
        bcanc.value = "Cancel";
        $cl(bcanc,bc + "cancel");
        /**
        *   @ignore
        */
        bcanc.onclick = function(e)
                        {      
                            mb.choice = 1;              //msgbox._RET_CANCEL;
                            $ef(evc,mb,e);
                            mb.destroy.call(mb);
                            mb = null;
                        };
    }
    
    //yes and no buttons
    if(b == 2 || b == 3)
    {
        byes = $c("input");
        byes.type = y;
        byes.value = "Yes";
        $cl(byes,bc + "yes");
        /**
        *   @ignore
        */
        byes.onclick =  function(e)
                        {
                            mb.choice = 2;              //msgbox._RET_YES;
                            $ef(evc,mb,e);
                            mb.destroy.call(mb);
                            mb = null;
                        };
        if(f)
        {
            $st(function(){byes.focus();},1);
        }
                        
        bno = $c("input");
        bno.type = y;
        bno.value = "No";
        $cl(bno,bc + "no");
        /**
        *   @ignore
        */
        bno.onclick =   function(e)
                        {
                            mb.choice = 3;              //msgbox._RET_NO;
                            $ef(evc,mb,e);
                            mb.destroy.call(mb);
                            mb = null;
                        };
    
    }
           
    //accept and decline buttons
    if(b == 4)
    {
        baccept = $c("input");
        baccept.type = y;
        baccept.value = "Accept";
        $cl(baccept,bc + "accept");  
        /**
        *   @ignore
        */
        baccept.onclick =  function(e)
                            {
                                mb.choice = 4;              //msgbox._RET_ACCEPT;
                                $ef(evc,mb,e);
                                mb.destroy.call(mb);
                                mb = null;
                            };
        if(f)
        {
            $st(function(){baccept.focus();},1);
        }
                        
        bdecline = $c("input");
        bdecline.type = y;
        bdecline.value = "Decline";
        $cl(bdecline,bc + "decline");
        /**
        *   @ignore
        */
        bdecline.onclick =   function(e)
                            {
                                mb.choice = 5;              //msgbox._RET_DECLINE
                                $ef(evc,mb,e);
                                mb.destroy.call(mb);
                                mb = null;
                            };
    
    }
           
    var _b = function(l){$ac(b1,l);};
    
    switch(b)
    {
        case 1:
            //_BUT_OK_CANCEL
            _b(bok);
            _b(bcanc);
            break;
        case 2:
            //_BUT_YES_NO
            _b(byes);
            _b(bno);
            break;
        case 3:
            //_BUT_YES_NO_CANCEL
            _b(byes);
            _b(bno);
            _b(bcanc);
            break;
        case 4:
            //_BUT_ACCEPT_DECLINE
            _b(baccept);
            _b(bdecline);
            break;
        default:
            //_BUT_OK
            _b(bok);
            break;
    }
    
    dm = $xyz(r);
    dm.w += 50;
    dm.h += 70;
    $w(w,dm.w);
    $h(w,dm.h);
    
    mb.render();
}


/**
*   Capture input from the user
*
*   ask question
*   capture answer
*   match input dependent upon type e.g. integer, date, string length etc
*   
*   @param  q   :   string      -   text displayed to the user
*   @param  t   :   string      -   window title text
*   @param  f   :   function    -   call this function when the input box closes
*   @param  v   :   int         -   input validation type
*   @param  l   :   int         -   maximum input length
*/

function $input(q,f,v,t,l)
{
    v = $isd(v) ? v : 0;
    var ml = $isd(l) ? 'maxlength="' + l + '"' : ''; //max length attribute
    var ipid = "ip" + $nid();
    var ipf =   function(e)
                {
                    var ip = $g(ipid),  vm = v % 1024;
                    if(ip)
                    {
                        this.choice = 0;    //input._RET_OK;
                        if((v >= 1024 && ip.value === "" ) && e === 0)
                        {
                            //invalid input
                            $input(q,f,v,t,l);
                        }
                        else if(vm == 1)
                        {
                            //input._VAL_INT
                        }
                        else
                        {
                            //valid input
                            $ef(f,this,(e === 0) ? ip.value : null,ip);                        
                        }
                    }
                    
                              
                };
    $msgbox(q + '<input type="text" value="" id="' + ipid + '" style="width:95%;" ' + ml + '/>',1,ipf);
    
    
}


/**
*   Display Popup window - (window with iframe inside)
*
*   
*   @param  u   :   string | object -   url to open or object of parameters
*   @param  ti  :   string      -   window title
*   @param  dw  :   string      -   width dimension e.g. 450px or 90%
*   @param  dh  :   string      -   height dimension e.g. 450px or 90%
*   @param  oc  :   function    -   onclose - function called when the window is closed
*   @param  id  :   string      -   window Id
*   @param  fid :   string      -   iframe Id. Iframe is used to open the document inside the popup window.
*/

function $popup(u,ti,dw,dh,oc,id,fid)
{
    
    //w:    window control
    //tb:   title bar visibility (default = true)
    //n:    content payne
    //f:    iframe
    //l:    window element
    //lt:   window title
    var w = new SS.control.window(document.body) ,tb = 1, n, f = $c("iframe"), l, lt;
    
    if($iso(u))
    {
        id = $isd(u.id) ? u.id : "";                //id
        ti = $isd(u.title) ? u.title : "";          //title
        tb = $isd(u.titlebar) ? u.titlebar : 1;     //titlebar
        dw = $isd(u.width) ? u.width : null;        //width
        dh = $isd(u.height) ? u.height : null;      //height
        oc = u.onclose;                             //onclose
        u = u.url;                                  //url
        fid = $isd(u.fid) ? fid.id : "";            //iframe id
    }
    w.id = (id) ? id : "SSPopup";
    tb = (tb) ? 1 : 0;
    
    w.titlebar = tb;
    w.title = ti;
    if(dw)
    {
        w.width = dw;
    }
    if(dh)
    {
        w.height = dh;
    }
    
    /**
    *   @ignore
    */
    w.onclose =    function(e)
                    {
                        $ef(oc,w,e);
                        w.hide.call(w);
                        w.destroy.call(w);    
                        w = null;
                    };
    w.render();
    SS.global.controls.add(w);
    
    //get content payne
    n = $g(w._in);
    l = $g(w.id);
    lt = $g(w._ib);
    
    //style content payne
    l.style.overflow = "hidden";
    
    //style iframe
    $w(f,$w(l)-10);
    $h(f,$h(l)-(tb * $h(lt) + 10));
    
    f.id = (fid) ? fid : f.id;
    f.frameBorder = 0;
    
    $ac(n,f);
    f.src = u;
    
}


/**
*   Close a Popup window - (window with iframe inside)
*
*   
*   @param  id   :  string      -   id of the window to close (default = "SSPopup")
*/
function $popupClose(id)
{
    //w:    window
    var w = $gc(id);
    
    if(!id)
    {
        id = "SSPopup";
    }
    if(w)
    {
        w.destroy.call(w);
    }
    
}


/**
*   input Globals
*   ----------------------------------
*                                   //
    input._RET_CLOSED = -1;         //
    input._RET_OK = 0;              //
                                    //
    //values > 1024 imply mandatory //
    //data requirement              //
                                    //
    input._VAL_INT = 1;             //
    input._VAL_NUMBER = 1;          //
    input._VAL_INT = 2;             //
    input._VAL_REQ = 1024;          //
    input._VAL_REQ_INT = 1025;      //
                                    //
*   ----------------------------------
*/
//number, reg ex, date (dd/mm/yyyy,mm/dd/yyyy,yyyy/mm/dd), time (HH:mm,HH:mm:ss)
//

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
/*
*   File Name:      SS.control.tree.js
*   Description:    Tree
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   SS.global.js
*   SS.core.js
*   SS.locale.js
*   SS.geom.js
*   SS.net.js
*   SS.control.js
*   SS.addon.js
*/


/**
*   @class          SS.control.tree
*   @constructor
*/
SS.control.tree =   function(name, value, title, css, id)
                    {
                        var p = "SS_control_tree", m = p + "_icon";
                        
                        /**
                        *   @property id 
                        *   @description Identifier of the tree control.
                        */
                        this.id                =   $ise(id) ? $nid() : id;
                        
                        /**
                        *   @property {String}      css 
                        *   @description            Style sheet class applied to the tree.
                        *                           Default = "".
                        */
                        this.css               =   (css) ? css : "";
                        
                        /**
                        *   @property {String}      css_iconopen 
                        *   @description            Style sheet class for an open branch icon.
                        *                           Default = "SS_control_tree_icon_open".
                        */
                        this.css_iconopen      =   m + "open";     //css style applied to the icon object
                        
                        /**
                        *   @property {String}      css_iconclosed 
                        *   @description            Style sheet class for a closed branch icon.
                        *                           Default = "SS_control_tree_icon_closed".
                        */
                        this.css_iconclosed    =   m + "closed";     //css style applied to the icon object
                        
                        /**
                        *   @property {String}      css_selected 
                        *   @description            Style sheet class for a closed branch icon.
                        *                           Default = "SS_control_tree_branch_selected".
                        */
                        this.css_selected      =   p + "_branch_selected";
                        
                        /**
                        *   @property {Integer}     iconmode 
                        *   @description            Sets how and when the icon should be displayed.
                        *                           0: Do not display an icon.
                        *                           1: Always display an icon.
                        *                           2: Display an icon if sub-nodes exist. Negative Boolean Value: Do not display icon.
                        *                           Positive Boolean Value: Display icon.
                        *                           Default = 2.
                        */
                        this.iconmode          =   2;
                        
                        this.name              =   (name) ? name : "";
                        this.title             =   (title) ? title : "";
                        this.value             =   (value) ? value : "";
                        
                        /**
                        *   @property {Array}       node 
                        *   @description            Array of trees. a single noded item is a valid tree
                        *                           Default = [].
                        */
                        this.node              =   [];     //array of trees. a single noded item is a valid tree
                        
                        /**
                        *   @property {SS.control.tree} node 
                        *   @description                Parent tree. Null if this is the root tree.
                        */
                        this.parent            =   null;
                        
                        /**
                        *   @property {Boolean}     open
                        *   @description            Flag indicating if the node is open.
                        *                           Default = "false".
                        */
                        this.open              =   0;
                        
                        /**
                        *   @property {String}      node 
                        *   @description            URL which when called should return a list of nodes that can be added to the tree.
                        */
                        this.src               =   "";
                        
                        /**
                        *   @property {String}      srcparam 
                        *   @description            Name of the parameter which is attached to the URL containing the value of the parent node.
                        *                           Default = "v".
                        */
                        this.srcparam          =   "v";
                        
                        /**
                        *   @property {Boolean}     cache
                        *   @description            Boolean flag. If true then nodes are cached when using data from a URL. Setting this to false will always cause the nodes to be refreshed by the data returned by the action of querying the URL as defined in src.
                        *                           Default = "false".
                        */
                        this.cache             =   1;
                        
                        /** 
                        *   @property {String}      xpath_nodes
                        *   @description            Defines the path to the list of nodes.
                        *                           Default = "".
                        */
                        this.xpath_nodes	    =	"";
                        
                        /** 
                        *   @property {String}      xnode_name
                        *   @description            XML node name.
                        *                           Default = "".
                        */
                        this.xnode_name		    =	"";
                        
                        /** 
                        *   @property {String}      xnode_title
                        *   @description            XML node title.
                        *                           Default = "".
                        */
                        this.xnode_title	    =	"";
                        
                        /** 
                        *   @property {String}      xnode_value
                        *   @description            XML node vaule.
                        *                           Default = "".
                        */
                        this.xnode_value	    =	"";
                        
                        /** 
                        *   @property {String}      xnode_iconmode
                        *   @description            XML override icon mode.
                        *                           Default = "".
                        */
                        this.xnode_iconmode    =	"";
                        
                        /**
                        *   @property               root
                        *   @description            Root element.
                        */
                        this.root			    =	null;
                        
                        /**
                        *   @property               selected
                        *   @description            Selected element.
                        */
                        this.selected		    =	null;
                        
                        /** 
                        *   @property {Function}    onclick
                        *   @description            Function called or evaluated {String} whenever a tree node has been clicked.
                        */
                        this.onclick           =   null;
                        
                        /** 
                        *   @property {Function}    oncontextmenu
                        *   @description            Function called or evaluated {String} when a right click mouse event occurs.
                        */
                        this.oncontextmenu     =   null;
                    };
                        
SS.control.tree.prototype = {
                    
    render      :   function(al)
                    {
                        //p:    parent
                        //t:    this
                        //l:    element (may not exist)
                        //n:    node
                        //i:    index pointer                  
                        //c:    icon
                        //b:    branch
                        //s:    style prefix
                        var t = this, l = $g(t.id), p, n, i, c, b, s = "SS_control_tree";
                        
                        if(l)
                        {
                            l.id = t.id;
                            l.onclick = "";
                            l.oncontextmenu = "";
                            //tree node already exists
                            p = $g(l.parentNode.id);
                            if($ga(p,"ext") != "tree")
                            {
                                p = null;
                            }
                            else
                            {
                                p = $gc(p.id);
                            }
                        }
                        
                        
                        if(l && !p)
                        {
                            //element already exists but unknown parent
                            p = $gc(l.parentNode.id);
                            if(p)
                            {
                                p.addNode(t);
                            }
                            if(p)
                            {
                                l = $g(p.id);
                            }
                        }
                        
                        if(!l && al)
                        {
                            //element does not exist. create the element
                            l = $c();
                            l.id = t.id;
                            $ac(al,l);
                        }
                        
                        
                        if(p)
                        {
                            //we have a parent tree node. is this node in the parent tree node?
                            p.addNode(t);
                        }
                        else if(!t.parent)
                        {
                            //no parent therefore node must be a root
                            t.open = 1;
                            t.root = t;
                            if(!$ise(t.src) && (t.node.length <= 0 || !t.cache))
                            {
                                //look for child nodes
                                t.getNodes.call(t,t.value);
                            }
                        }
                            
                        
                        if(l)
                        {
                            //create the display label
                            n = $g(t.id + "_n");
                            c = $g(t.id + "_i");
                            if(!n)
                            {
                                b = $c();
                                b.className = s + "_branch";
                                                                
                                n = $c();
                                n.id = t.id + "_n";
                                n.className = s + "_node";
                                /**
                                *   @ignore
                                */
                                n.onclick = function(e)
                                            {
                                                //n: element node
                                                var n;
                                                if(t.root.selected)
                                                {
                                                    n = $g(t.root.selected.id + "_n");
                                                    if(n)
                                                    {
                                                        n.className = "SS_control_tree_node";
                                                    }
                                                }
                                                n = $g(t.id + "_n");
                                                if(n)
                                                {
													n.className += " " + t.css_selected;
												}
                                                                                          
                                                t.open = !t.open;
                                                t.root.selected = t;
                                                if(!$ise(t.src) && (t.node.length <= 0 || !t.cache))
                                                {
                                                    //look for child nodes
                                                    t.getNodes.call(t,t.value);
                                                }
                                                else
                                                {
                                                    t.render.call(t);
                                                }
                                                return $ef(t.onclick,this,e);
                                            };      
                                if(t.oncontextmenu)
                                {
                                    /**
                                    *   @ignore
                                    */
                                    n.oncontextmenu =   function(e)
                                                        {
                                                            $ef(t.oncontextmenu,this,e);
                                                            $ec(e);
                                                            return false;
                                                        };
                                }    
                                if(t.root && t.root.selected && t.root.selected.id == t.id)
                                {
			                        n.className += " " + t.css_selected; 
			                    }  
                                $sa(n,"value",t.value);                                      
                                $ac(b,n);
                                l.insertBefore(b,l.firstChild);
                                if(!($ise(t.css_iconopen) || $ise(t.css_iconclosed)))
                                {
                                    //icon class has been defined. create a div to hold this icon class
                                    c = $c();
                                    c.id = t.id + "_i";
                                    c.onclick = n.onclick;
                                    b.insertBefore(c,b.firstChild);
                                }
                            }
                            if(c)
                            {
                                c.className = t.open ? t.css_iconopen : t.css_iconclosed;
                                $v(c,((t.iconmode == 1 || (t.iconmode == 2 && t.node.length) || $psb(t.iconmode)) && t.parent),1); //set the visibility of the icon depending upon the iconmode
                            }
                            n.innerHTML = t.name;
                            n.title = t.title;
                            
                            
                            if(t.parent)
                            {
                                l.className = s + (t.css ? " " + t.css : "");
                                $v(l,t.parent.open);
                            }
                            else
                            {
                                l.className = $ts(t.css);
                            }
                            
                        }
                        
                        for(i = 0; i < t.node.length; i++)
                        {
                            t.node[i].render.call(t.node[i],l);
                        }
                    },
                    /**
                    *   @function                   addNode
                    *   @description                Add tree as a child node
                    *   @param {SS.control.tree}    n
                    *   @returns                    null
                    */
        addNode :   function(n)
                    {
                        //add tree as a child node
                        var t = this;
                        if(n && t.node && !t.node.contains(n))
                        {
                            n.parent = t;
                            n.oncontextmenu = t.oncontextmenu;
                            n.onclick = t.onclick;
                            n.root = t.root ? t.root : t;
                            t.node.add(n,1);
                        }
                        
                    },
                    /**
                    *   @function                   addNode
                    *   @description                Opens up all parent nodes in the path of this node until the
                    *                               root is reach of the rendered tree.
                    *   @returns                    null
                    */
        openPath:   function()
                    {
                        var t = this;
                        
                        t.open = 1;
                        
                        if(t.parent)
                        {
                            t.parent.openPath.call(t.parent);
                        }
                    },
                    /**
                    *   @function                   getNodes
                    *   @description                Inital requests for tree nodes from the data source.
                    *   @param {String} v           Value of the selected node.
                    *   @returns                    null
                    */
       getNodes:    function(v)
                    {
                        //t:    this
                        //u:    source URL
                        //p:    srcparam
                        //s:    escaped value v
                        //a:    url param and value
                        var t = this, u = t.src, p = t.srcparam, s = $esc($ts(v)), a = p + "=" + s;
                        if(!$ise(u))
                        {
                            //add/replace srcparam with new value in src
                            u = u.replace(new RegExp("([\\?&])" + t.srcparam + "=([^&#]*)","g"),"$1" + p + "=" + s);
                            if(u.indexOf(a) < 0)
                            {
                                u += ((u.indexOf("?") < 0) ? "?" : "&") + a;
                            }
                            $load({url : u, nocache : 1, onload : function(){t.loadNodes.call(t,this.req);}, onerror : function(){$error(this.req);}});
                        }
                        
                    },
                    /**
                    *   @function                   loadNodes
                    *   @description                Parses the nodes loaded from the data source and stores them in an internal array.
                    *   @param {SS.net.requestor} r Requestor object from a valid request.
                    *   @returns                    null
                    */
       loadNodes:   function(r)
                    {
                        //t:    this
                        //x:    xml object
                        //w:    rows / lines
                        //i:    index pointer
                        //c:    cells
                        //n:    new tree node
                        //p:	xpath nodes
                        //pn:	xnode name;
                        //pt:	xnode title;
                        //pv:	xnode value;
                        //pi:	xnode iconmode;
                        var t = this, x, w, i, c, n, p = t.xpath_nodes, pn = t.xnode_name, pt = t.xnode_title, pv = t.xnode_value, pi = t.xnode_iconmode;
                        
                        if(r.getResponseHeader("content-type").match(/text\/xml/i))
                        {
                            //xml return
                            x = $x2o(r.responseXML);
                                                        
                            if(x && !$ise(p) && (!($ise(pn) && $ise(pt) && $ise(pv))))
                            {
								p = p.split(/\.|\\/);
								w = x;
								
								for(i = 0; i < p.length; i++)
								{
									if(w){w = w[p[i]];}
								}
								w = $ta(w);	//xml path to list of nodes
								if(w)
								{
								
									for(i = 0; i < w.length; i++)
									{
										//we have a list of nodes
										n = new SS.control.tree();
										$cmom(t,n,"name,value,title,id,node,open");
										
										if(w[i])
										{
											n.name = $ts(w[i][pn]);
											n.value = $ts(w[i][pv]);
											n.title = $ts(w[i][pt]);
											n.iconmode = (!$ise($ts(w[i][pi]))) ? $ts(w[i][pi]) : (n.iconmode ? n.iconmode : 2);
																
											t.addNode(n);
										}
									}
									if(t.node.length)
									{
										t.render();
									}
									
								}
								
                            }
                        }
                        else if(r.responseText)
                        {
                            //text return
                            w = r.responseText.split("\n");
                            if(w)
                            {
                                for(i = 0; i < w.length; i++)
                                {
                                    if(w[i].indexOf("\t") >= 0)
                                    {
                                        c = w[i].split("\t");
                                    }
                                    else if(w.indexOf(",") >= 0)
                                    {
                                        c = w[i].split(",");
                                    }
                                    else
                                    {
                                        c = [w[i]];
                                    }
                                    
                                    if(c)
                                    {
                                        n = new SS.control.tree();
										$cmom(t,n,"name,value,title,id,node,open");
																			
										n.name = $ts(c[0]);
										n.value = $ts(c[1]);
										n.title = $ts(c[3]);
										n.css = c[4] || n.css;
										n.iconmode = $isd(c[5]) ? $isd(c[5]) : n.iconmode;
															
                                        t.addNode(n);
                                    }
                                }
								if(t.node.length)
								{
									t.render();
								}
                            }
                        }   
                    },
                    /**
                    *   @function                   getSelected
                    *   @description                Returns the current selected node.
                    *   @returns                    Current selected node
                    */
      getSelected:	function()
					{
						//r:	selected node to return
						var r;
						if(this.root)
						{
							r = this.root.selected;
						}
						return r;
					},
                    /**
                    *   @function                   clear
                    *   @description                Clears the tree.
                    *   @returns                    null
                    */
		clear	:	function()
					{
						//t: this
						//i: index pointer
						//n: node
						//s: nodes
						var t = this, i, n, s = t.node;
						if(s)
						{
							//clears all child nodes
							for(i = 0; i < s.length; i++)
							{
								n = s[i];
								if(n && n.clear && n.id != t.id)
								{
									n.clear.call(n);
									$d($g(n.id));
								}
							}
						}
						t.open = 0;
						t.node = [];
						t.selected = null;
						
						if(t.parent)
						{
							t.render.call(t,$g(t.parent.id));
						}
					}

};/*
*   File Name:      SS.control.passwordmeter.js
*   Description:    Password strength. Displays a bar and message indicating how secure the password
*                   that has been entered is
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
*   @class          Password Strength Meter. Displays a bar and message indicating how secure the password that has been entered is.
*   @constructor
*/
SS.control.passwordmeter =  function()
                            {
                                //p:    classname prefix
                                var p = "SS_control_passwordmeter";
                                
                                /**
                                *   @property {String}      id 
                                *   @description            Identifier of the passwordmeter control.
                                */
                                this.id        =   "";
                                
                                /**
                                *   @property {String}      linkto
                                *   @description            Id of the input control to link the password meter to. Typically this will be a password input {HTMLElement}.
                                */
                                this.linkto    =   "";     //input control password field
                                
                                /**
                                *   @property {String}      maxlength
                                *   @description            Maximum number of characters the password should be. 0 = unlimited.
                                */
                                this.maxlength =   0;
                                
                                /**
                                *   @property {String}      minlength
                                *   @description            Minimum number of characters the password should be.
                                */
                                this.minlength =   6;
                                
                                /**
                                *   @property {String}      msg_weak
                                *   @description            Message to display if the password is considered to be "weak". Default = "Weak".
                                */
                                this.msg_weak  =   "Weak";
                                
                                /**
                                *   @property {String}      msg_medium
                                *   @description            Message to display if the password is considered to be of "medium" strength. Default = "Medium".
                                */
                                this.msg_medium=   "Medium";
                                
                                /**
                                *   @property {String}      msg_strong
                                *   @description            Message to display if the password is considered to be "strong". Default = "Strong".
                                */
                                this.msg_strong=   "Strong";
                                
                                /**
                                *   @property {String}      msg_short
                                *   @description            Message to display if the number of characters in the password entered does not
                                *                           equal or exceed the minimum number of characters required, as defined in {@link minlength}.
                                *                           Default = "Too Short".
                                */
                                this.msg_short =   "Too Short";
                                
                                /**
                                *   @property {String}      msg_long
                                *   @description            Message to display if the number of characters in the password entered exceeds the
                                *                           maximum number of characters required, as defined in {@link maxlength}.
                                *                           Default = "Too Long".
                                */
                                this.msg_long  =   "Too Long";
                                
                                /**
                                *   @property {String}      msg_invalid
                                *   @description            Message to display if the password is does not match the regular expression
                                *                           as defined in {@link regex}. Default = "Invalid Password".
                                */
                                this.msg_invalid=  "Invalid Password";
                                
                                /**
                                *   @property {String}      css
                                *   @description            Class name to apply to the outer most element of the password meter control
                                *                           once it has rendered. Default = "SS_control_passwordmeter"
                                */
                                this.css       =   p;
                                
                                /**
                                *   @property {String}      css
                                *   @description            Class name to apply to the strength bar element of the password meter control
                                *                           once it has rendered. Default = "SS_control_passwordmeter_bar"
                                */
                                this.css_bar   =   p + "_bar";
                                
                                /**
                                *   @property {String}      css_text
                                *   @description            Class name to apply to the message text of the password meter control
                                *                           once it has rendered. Default = "SS_control_passwordmeter_text"
                                */
                                this.css_text  =   p + "_text";
                                
                                /**
                                *   @property {String}      css_weak
                                *   @description            Class name to apply to the message text element of the password meter control
                                *                           once it has rendered and the password entered is current considered to be weak
                                *                           Default = "SS_control_passwordmeter_weak".
                                */
                                this.css_weak  =   p + "_weak";
                                
                                /**
                                *   @property {String}      css_medium
                                *   @description            Class name to apply to the message text element of the password meter control
                                *                           once it has rendered and the password entered is current considered to be weak.
                                *                           Default = "SS_control_passwordmeter_medium".
                                */
                                this.css_medium=   p + "_medium";
                                
                                /**
                                *   @property {String}      css_strong
                                *   @description            Class name to apply to the message text element of the password meter control
                                *                           once it has rendered and the password entered is current considered to be of 
                                *                           medium strength. Default = "SS_control_passwordmeter_strong".
                                */
                                this.css_strong=   p + "_strong";
                                
                                /**
                                *   @property {String}      css_error
                                *   @description            Class name to apply to the message text element of the password meter control
                                *                           once it has rendered and the password entered is in a state of errpr. Typically
                                *                           this is when the password eneterd does not match the defined password regular
                                *                           expression, see {@link regex}.
                                *                           Default = "SS_control_passwordmeter_error".
                                */
                                this.css_error =   p + "_error";
                                
                                /**
                                *   @property {Number}      value
                                *   @description            Holds password strength value.
                                */
                                this.value     =   0;
                                
                                /**
                                *   @property {String}      pass
                                *   @description            Holds the entered password.
                                */
                                this.pass      =   "";
                                
                                /**
                                *   @property {String}      regex
                                *   @description            Regular expression to validate the password against.
                                *                           Default = "^.*$" which allows for a password containing any printable
                                *                           character.
                                */
                                this.regex     =   "^.*$";
                                
                                /**
                                *   @property {Number}      weight
                                *   @description            Weighting used in the algorithm that calculates the strength of a
                                *                           password. Increasing this value allows for weaker passwords to be
                                *                           considered stronger, whereas decreasing this value makes it harder
                                *                           to get a password that is considered "Strong". Default = 0.12.
                                */
                                this.weight    =   0.12;
                            };

SS.control.passwordmeter.prototype = {

        
	        /**
	        *   @function       SS.control.passwordmeter.render
	        *   @description    Renders the passwordmeter control on the page and links it to the input password field.
	        *   @returns        null
	        */
	render: function()
                {
                    //t:    this
                    //l:    element
                    //s:    status text
                    //c:    bar classname
                    //h:    strength
                    //n:    length of current password
                    var t = this, l = $g(t.id), s, c, n = $ln(t.pass), h = t.strength();
                    if(l)
			        {
			            $dc(l); //if element has already been drawn, clear all children to allow for the element to be redrawn
		                t.value = h;
			            if(h < 0)
			            {
			                s = t.msg_invalid;
			                c = t.css_error;
			            }
			            else if(n < t.minlength)
			            {
			                s = t.msg_short;
			                c = t.css_error;
			            }
			            else if(n > t.maxlength && t.maxlength)
			            {
			                s = t.msg_long;
			                c = t.css_error;
			            }
			            else if(h > 66)
			            {
			                s = t.msg_strong;
			                c = t.css_strong;
			            }
			            else if(h > 33)
			            {
			                s = t.msg_medium;
			                c = t.css_medium;
			            }
			            else
			            {
			                s = t.msg_weak;
			                c = t.css_weak;
			            }
			            
			            //b:    bar
			            //m:    message holder
			            //x:    text
			            //p:    password field
			            //v:    value bar
			            //w:    width
			            var b = $c(), m = $c(), x = $ctn(s), p = $g(t.linkto), v = $c(), w = 0;
			           
			            $cl(b,t.css);
			            $cl(v,t.css_bar + " " + c);			           
			            $cl(m,t.css_text);
			            
			            $ac(b,v);
			            if(n)
			            {
			                $ac(m,x);
			            }
			            $ac(l,b);
			            $ac(l,m);
			            
			            w = $rnd(($xyz(b).w/100) * h);
			            if(w < 0)
			            {
			                w = 0;
			            }
			            $w(v,w);
			            
			            //set up linkto control
			            if(p)
			            {
			                /**
			                *   @ignore
			                */
			                p.onkeydown =   function()
			                                {
			                                    //using timeout instead on onkeydown, onkeypress and onchange is significantly more space efficient.
			                                    $st(function(){t.pass = $g(t.linkto).value; t.render();},10);
			                                };
			            }
			        }
                    
                    
                },
                
                /**
	            *   @function               SS.control.passwordmeter.strength
	            *   @description            Calculates the strength of the current password in the range -1 to 100 where
	            *                           -1 = "invalid", 0 = "weakest", and 100 = "strongest". 
	            *   @returns {Integer}      Strength of the password.
	            */
	strength : function()
                {
                    //t:    this
                    //v:    calculated strength
                    //m:    min char range
                    //x:    max char range
                    //i:    index
                    //p:    pass
                    //c:    char code
                    //l:    length of pass
                    var t = this, v = 0, m = 255, x = 0, i, p = t.pass, c, l = $ln(p);
                    for(i = 0; i < l; i++)
                    {
                        c = p.charCodeAt(i);
                        if(c < m)
                        {
                            m = c;
                        }
                        if(c > x)
                        {
                            x = c;
                        }
                    }
                    
                    v = $rnd(Math.pow(x - m,l*t.weight));
                    
                    if(v > 100)
                    {
                        v = 100;
                    }
                    if(x < 0 || $ise(p))
                    {
                        v = 0;
                    }
                    if(!p.match(new RegExp(t.regex)))
                    {
                        //password is invalid
                        v = -1;
                    }
                    
                    return v;
                }
};
/*
*   File Name:      SS.control.richtextbox.js
*   Description:    Rich HTML Based Textbox
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
*   @class          SS.control.richtextbox  Rich HTML Based Textbox
*   @constructor
*/
SS.control.richtextbox =    function()
                            {
                                //t:    this
                                //P:    classname prefix
                                
                                /**
                                *   @property {String}      id 
                                *   @description            Identifier of the rich textbox control.
                                */
                                this.id        =   "";
                                
                                /**
                                *   @property {String}      css 
                                *   @description            Style sheet class applied to the rich textbox.
                                *                           Default = "SS_control_richtextbox"
                                */
                                this.css       =   "SS_control_richtextbox";
                                
                                /**
                                *   @property {Boolean}     readonly 
                                *   @description            Prevents input / change when set to true
                                *                           Default = false
                                */
                                this.readonly  =   0;
                                
                                /**
                                *   @property {String}      value 
                                *   @description            Holds the value of the rich textbox.
                                */
                                this.value     =   "";
                                
                                /** 
                                *   @property {Boolean}   visible
                                *   @description          Flag to indicate whether or not the richtextbox contrl is currently visible. Overrides style="display:none;" rule on initial render.
                                *                         Default = true.
                                */
                                this.visible   =   1;
                                
                                /** 
                                *   @property {Function}    onchange
                                *   @description            Function called or evaluated {String} whenever the contents of the rich textbox is changed.
                                */
                                this.onchange  =   "";
                                
                                /**
                                *   @property {String}      canvascolor 
                                *   @description            Background canvas colour of the text input area.
                                *                           Default = white
                                */
                                this.canvascolor = "#FFF";
                                
                                /**
                                *   @property {String}      font 
                                *   @description            Default font type to use. Default = "Arial".
                                */
                                this.font      =   "Arial";
                                
                                /**
                                *   @property {String}      fontsize
                                *   @description            Default font size to use. Default = "small".
                                *                           Valid fontsize values are: xx-small, x-small, small, medium, large, x-large, xx-large.
                                */
                                this.fontsize  =   "small";
                                
                                /**
                                *   @property {Array}       buttons
                                *   @description            Buttons available on the rich textbox toolbar
                                *                           Valid fontsize values are: xx-small, x-small, small, medium, large, x-large, xx-large.
                                */
                                this.buttons   =   [
                                                    [
                                                        ["Bold",100],
                                                        ["Italic",120],
                                                        ["Underline",140]
                                                    ],
                                                    [
                                                        ["Align Left",160,"JustifyLeft"],
                                                        ["Align Center",180,"JustifyCenter"],
                                                        ["Align Right",200,"JustifyRight"]
                                                    ],
                                                    [
                                                        ["Bullet Points",220,"InsertUnorderedList"],
                                                        ["Numbering",240,"InsertOrderedList"]
                                                    ],
                                                    [
                                                        ["Outdent",280,0,1],
                                                        ["Indent",260,0,1]
                                                    ],
                                                    [
                                                        ["Font Type",300,"Font",1,"pft"],
                                                        ["Font Size",320,"Size",1,"pfs"]
                                                    ],
                                                    [
                                                        ["Font Color",340,"forecolor",1,"pfc"],
                                                        ["Highlight Color",360,"backgroundcolor",1,"pfb"],
                                                        ["Remove Formatting",380,"removeFormat",1]                                
                                                    ]
                                                 ];
                                
                                /**
                                *   @property {String}      idb
                                *   @description            Id of the buttons bar.
                                *   @private
                                */
                                this.idb       =   ""; //id of the buttons bar
                                
                                /**
                                *   @property {String}      idg
                                *   @description            Id of the control grouping.
                                *   @private
                                */
                                this.idg       =   "";
                                
                                /**
                                *   @property {String}      idi
                                *   @description            Id of the iframe which contains the document element.
                                *   @private
                                */
                                this.idi       =   "";
                                
                                /**
                                *   @property {Boolean}     _i
                                *   @description            Initial render flag.
                                *   @private
                                */
                                this._i        =   1;
                                
                                /**
                                *   @property {String}      _u
                                *   @description            Update value timeout id.
                                *   @private
                                */
                                this._u        =   0;
                                
                                /**
                                *   @property {Boolean}     _f
                                *   @description            Flag to indicate that the textbox is currently in focus.
                                *   @private
                                */
                                this._f        =   0;
                                
                            };

SS.control.richtextbox.prototype = {

                /**
	            *   @function       SS.control.richtextbox.render
	            *   @description    Renders the richtextbox on the page.
	            *   @returns        null
	            */
    render  :   function()
                {
                    //t:    this
                    //l:    this element / linkto element
                    //g:    control group
                    //f:    iframe
                    //w:    iframe window
                    //d:    iframe document
                    //b:    button bar
                    //c:    button group
                    //fp:   font popup
                    //fl:   font list
                    //fn:   font name
                    //fi:   font image
                    //fs:   font size
                    //fc:   font forecolor
                    //fb:   font background color
                    //h:    index pointer
                    //i:    index pointer
                    //j:    index pointer
                    //k:    index pointer
                    //m:    index pointer
                    //n:    l.parentNode
                    //v:    value
                    //H:    height of the control
                    //W:    width of the control
                    //HB:   button bar height
                    //P:    classname prefix
                    //PG:   classname button group
                    //PF:   classname font popup
                    //hc:   hex color
                    //ba:   button array
                    //bb:   button group
                    //bc:   actual button parameters
                    var t = this, l = $g(t.id), g = $g(t.idg) || $c(), f = $g(t.idi) || $c("iframe"), w, d, b = $g(t.idb) || $c(), c, fp, fl = ["Arial", "Arial Black", "Arial Narrow", "Brush Script MT", "Courier New", "Garamond", "Times New Roman", "Verdana"], fn, fi, fs, fz = ["Tiny", "xx-small", "Small", "x-small", "Normal", "small", "Medium", "medium", "Large", "large", "Larger", "x-large", "Giant", "xx-large"],fc,fb,h,i,j,k,v,H,W,HB,P="SS_control_richtextbox_", PG = P + "buttongroup", PF = P + "fontpopup", hc, ba = t.buttons, bb, bc;
                                                
                    if(l && f)
                    {
                        n = l.parentNode;
                        if(t._i && n)
                        {
                            //initial load
                            t.idi = f.id;
                            t.idg = g.id;
                            t.idb = b.id;
                            f.frameBorder = 0;
                            
                            //set class names
                            $cl(g,t.css); 
                            $cl(f,P + "canvas");
                            $cl(b,P + "buttonbar");
                            
                            //font name popup
                            fp = $c();
                            fp.id = t.id + "pft";
                            $v(fp,0);
                            
                            var fnoc =  function(e)
                                        {
                                            t.command.call(t,"fontname",$ga(this,"f"));
                                            t.hidemenu.call(t);
                                        };
                            for(i = 0; i < $ln(fl); i++)
                            {
                                fn = $c();
                                fi = $c("img");
                                $w(fn,"90%");
                                $w(fi,"90%");
                                $h(fi,"20px");
                                fi.style.position = "absolute";
                                $op(fi,0);
                                $ac(fn,fi);
                                $ac(fn,$ctn(fl[i]));
                                fn.style.fontSize = "16px";
                                fn.style.fontFamily = fl[i];
                                $sa(fn,"f",fl[i]); //store font name in tag for ease of use later
                                fn.onclick = fnoc;
                                $cl(fn,P + "option");
                                $ac(fp,fn);
                            }
                            
                            var fsoc =  function(e)
                                        {
                                            t.command.call(t,"fontsize",$n($ga(this,"size")));
                                            t.hidemenu.call(t);
                                        };
                            //font size popup
                            fs = $c();
                            fs.id = t.id + "pfs";
                            $v(fs,0);
                            for(i = 0; i < $ln(fz); i+=2)
                            {
                                fn = $c();
                                fi = $c("img");
                                $w(fn,"90%");
                                $w(fi,"90%");
                                $h(fi,"20px");
                                fi.style.position = "absolute";
                                $op(fi,0);
                                $ac(fn,fi);
                                $ac(fn,$ctn(fz[i]));
                                fn.style.fontSize = fz[i+1]; //use the old style font size method as execCommand only supports font sizes in the range 1 - 7
                                $sa(fn,"size",(i/2) + 1);
                                fn.onclick = fsoc;
                                $cl(fn,P + "option");
                                $ac(fs,fn);
                            }
                            
                            var fcoc =  function(e)
                                        {
                                            t.command.call(t,"ForeColor",$ga(this,"v"));
                                            t.hidemenu.call(t);
                                        };
                            var fboc =  function(e)
                                        {
                                            t.command.call(t,((e) ? "hiliteColor" : "BackColor"),$ga(this,"v"));
                                            t.hidemenu.call(t);
                                        };
                            //font forecolor 
                            fc = $c();
                            fc.id = t.id + "pfc";
                            fb = $c();
                            fb.id = t.id + "pfb";
                            $v(fc,0);
                            $v(fb,0);
                            k = 256;
                            for(h = 0; h <= 256; h+=128)
                            {
                                k = (k) ? 0 : 256;
                                for(i = k; i >= 0 && i <= 256; i+=(64 *((!k)?1:-1)))
                                {
                                    for(j = 0; j <= 256; j+=64)
                                    {
                                        hc = "#" + ((h<16) ? "0" : "") + ((h==256) ? 255 : h).toString(16) + ((i<16) ? "0" : "") + ((i==256) ? 255 : i).toString(16) + ((j<16) ? "0" : "") + ((j==256) ? 255 : j).toString(16);
                                       
                                        fn = $c();
                                        fi = $c("img");
                                        $w(fi,"30px");
                                        $h(fi,"14px");
                                        fi.style.position = "absolute";
                                        $op(fi,0);
                                        $ac(fn,fi);
                                        
                                        fn.style.backgroundColor = hc;
                                        fn.title = hc;
                                        $sa(fn,"v",hc);
                                        
                                        $cl(fn,P + "color");
                                        fn.onclick = fcoc;
                                        $ac(fc,fn);
                                        
                                        
                                        fn = $c();
                                        fi = $c("img");
                                        $w(fi,"30px");
                                        $h(fi,"14px");
                                        fi.style.position = "absolute";
                                        $op(fi,0);
                                        $ac(fn,fi);
                                        
                                        
                                        fn.style.backgroundColor = hc;
                                        fn.title = hc;
                                        $sa(fn,"v",hc);
                                        fn.onclick = fboc;
                                        $cl(fn,P + "color");
                                        $ac(fb,fn);
                                        
                                    }
                                    
                                }
                            
                            }
                            
                            
                            //attach the popup menus to the parent of the element. this gets around
                            //the different positioning schemes implemented in different browsers
                            $ac(n,fp);
                            $ac(n,fs);
                            $ac(n,fc);
                            $ac(n,fb);
                            
                            $ac(g,b);
                            $ac(g,f);
                            
                            n.insertBefore(g,l);
                            
                            for(i = 0; i < $ln(ba); i++)
                            {
                                c = $c(0,PG);
                                bb = ba[i];
                                $ac(b,c);
                                $w(c,21*$ln(bb)); //ie fix - last button group turned into a column. 21 = width of image (20px) + border (1px)
                                for(j = 0; j < $ln(bb); j++)
                                {
                                    bc = bb[j];
                                    t.button(c,t,bc[0],bc[1],bc[2] ? bc[2] : bc[0],bc[3],bc[4],bc[5]);
                                }
                            }
                            
                            t.hidemenu();
                            
                            $v(l,0);        //hide the element (this forms the linkto element)
                            t._i = 0;       //clear inital render flag
                        }
                        
                        //update style of the iframe
                        $cmom(l.style,g.style);
                        $cn(g,l.className);
                        $v(g,t.visible);
                        
                        w = f.contentWindow;
                        d = w.document;
                        
                        //control is now inserted into the document
                        //size the iframe element
                        
                        H = $h(g);
                        W = $w(g);
                        HB = $h(b) + 2; //+2 for border margin allowance
                        if(!H || H < HB)
                        {
                            H = HB + 20;
                        }
                        
                        
                        if(d)
                        {
                            //have successfully got the document element inside the iframe
                            d.write("<html><head><style type='text/css'>BODY{padding:0px;margin:3px;overflow:auto;background-color:" + t.canvascolor + ";font-family:" + t.font + ";font-size:" + t.fontsize + ";}P,BLOCKQUOTE,UL,OL,LI{margin-bottom:0px;margin-top:0px;line-height:1;}</style></head><body>" + t.value + "</body></html>");
                            d.close();
                            d.designMode = "on";
                            w.focus();
                            t._u = $si(function(){var v = $g(t.idi).contentWindow.document.body.innerHTML; if(!t.update.call(t,v)){$st(function(){var v = $g(t.id).value; if(t.update.call(t,v)){$g(t.idi).contentWindow.document.body.innerHTML = v;}},25);}},100);
                        }
                        
                        
                        /*Internet Explorer Fix - Using the queryCommandState returns a combined state for all
                        the elements with designMode = "on". This fix sets a flag using IE specific events to indicate help
                        determine which richtextbox is being edited. Default is to query.
                        Also includes style fixes.*/
                        if($isd(d.onactivate))
                        {
                            //IE
                            /**
                            *   @ignore
                            */
                            d.onactivate =  function()
                                            {
                                                t._f = 1;
                                            };
                            /**
                            *   @ignore
                            */
                            d.ondeactivate =    function()
                                                {
                                                    t._f = 0;
                                                };
                            if(W)
                            {
                                $w(b,W-3);
                                $w(f,W-3);
                            }
                            if($h(g))
                            {
                                $h(f,H - HB - 3);
                            }
                            g.style.borderTop = "none";
                        }
                        else
                        {
                            //Non IE
                            t._f = 1;    
                            if(W)
                            {
                                $w(b,W);
                                $w(f,W);
                            }
                            if($h(g))
                            {
                                $h(f,H - HB);
                            }
                        }
                    }
                    
                    $ea("onresize",function(){t.resize.call(t);});
                    
                },
                /**
	            *   @function       SS.control.richtextbox.hidemenu
	            *   @description    Hides any currently open menu from the richtextbox e.g. font size menu.
	            *   @returns        null
	            */
    hidemenu:   function()
                {
                    //k:    key
                    //m:    menus
                    var k, m = this.P;
                    
                    if(m)
                    {
                        for(k in m)
                        {
                            if(!$isf(m[k]) && m[k].hide)
                            {
                                m[k].hide();
                            }
                        }
                    }
                    
                },
                /**
	            *   @function           SS.control.richtextbox.update
	            *   @description        Check to see if the content has changed. If so, update the HTML
	            *                       element that stores the value and call any registered update functions.
	            *   @param {String} v   Value to compare internal value against to see if it has changed.
	            *   @param {Event} e    Event
	            *   @returns {Boolean}  Flag to indicate if the text has changed in some way. true = changed, false = no change.
	            */
    update  :   function(v,e)
                {
                    //v:    current value
                    //e:    arbitrary event
                    //t:    this
                    //r:    return value 0 = no change, 1 = changed
                    var t = this, r = 0;
                    v = $ts(v);
                    if(v.replace(/[\n\r]*/g,"") != t.value.replace(/[\n\r]*/g,""))
                    {
                        t.hidemenu();
                        if(t.readonly)
                        {
                            $g(t.idi).contentWindow.document.body.innerHTML = t.value;
                        }
                        else
                        {
                            $g(t.id).value = v;
                            t.value = v;
                            $ef(t.onchange,t,e);
                        }
                        r = 1;
                    }
                    return r;
                },
                /**
                *   @function           SS.control.richtextbox.command
                *   @description        Handles commands raised from the rich textbox control buttons.
                *   @param {String} a   Action. Name of the command action. e.g. fontsize.
                *   @param {String} p   Parameter value. Parameter related to the {@link Action}, is applicable. e.g. "medium"
                *   @param {Event} e    Event from the triggering of the command. e.g. onclick.
                *   @returns            null
                */
    command :   function(a,p,e)
                {
                    //a:    action
                    //p:    parameter
                    //t:    this
                    //d:    document
                    var w = $g(this.idi).contentWindow, d = w.document;
                    w.focus();
                    try
                    {
		                d.execCommand(a,false,(p) ? p : null);
		            }
		            catch(x){}
                },
                /**
                *   @function           SS.control.richtextbox.query
                *   @description        Queries the current value of a rich HTML action. e.g. fontsize
                *                       relative to the context of the text input cursor.
                *   @param {String} a   Action. Name of the command action. e.g. fontsize.
                *   @returns {String}   Value of the command action.
                */
    query   :   function(a)
                {
                    try
                    {
                        return this.document.queryCommandState(a);
                    }catch(x){}                    
                },
                /**
                *   @function               SS.control.richtextbox.button
                *   @description            Creates a new button to add to the button bar.
                *   @param {HTMLElement} el Attach element point.
                *   @param {Object} t       This object
                *   @param {String} l       Title / alternate text
                *   @param {Integer} y      Vertical position of the button
                *   @param {String} a       Command Action.
                *   @param {Boolean} q      Disable querying of the button to update up / down status.
                *   @param {SS.control.popup} c Popup control which handles the displaing of the menu from the button.
                *   @param {String} p       Parameter
                *   @returns {HTMLElement}  HTML element button to use in the rich textbox.
                */
    button  :   function(el,t,l,y,a,q,c,p)
                {
                    //el:   attach element point
                    //t:    this object
                    //l:    title / alternate text
                    //y:    vertical position of the button
                    //a:    action
                    //q:    disable querying of the button to update up / down status
                    //c:    popup control
                    //p:    param
                    
                    //buttons are based on a fixed 20 x 20 size.
                    //image is needed to prevent loss of focus in IE
                    //P:    Class name Prefix {String} = "SS_control_richtextbox_"
                    //b:    button
                    //i:    button image fix
                    //o:    popup
                    //oc:   {String} = "onclick"
                    var P = "SS_control_richtextbox_", b = $c(0,P + "button"), i = $c("img"),o,oc = "onclick";
                    
                    /**
                    *   @ignore
                    */
                    b.onclick = function(e)
                                {
                                    t.command.call(t,a,p,$e(e));
                                    
                                };
                    $sa(b,"u","0px -" + y + "px");
                    $sa(b,"d","-20px -" + y + "px");
                    $sa(b,"a",a);
                    b.title = l;    
                    b.style.backgroundPosition = "0px -" + y + "px";
                    $ac(b,i);
                    
                    $op(i,0);
                    
                    if(!q)
                    {
                       
                        //query the status of this button
                        $si(function()
                            {
                                try
                                {
                                    //u:    background position for up
                                    //d:    background position for down
                                    //a:    action
                                    var u = $ga(b,"u"), d = $ga(b,"d"), a = $ga(b,"a");
                                    
                                    if(a && t._f)
                                    {
                                        b.style.backgroundPosition = t.query.call($g(t.idi).contentWindow,a) ? d : u;
                                    }
                                    
                                }
                                catch(ex){}
                                
                            },333);
                    }
                    
                    $ac(el,b);
                    if(c)
                    {
                        t.P = $ta(t.P);
                        o = new SS.control.popup();
                        o.id = t.id + c;
                        o.callid = b.id;
                        o.onevent = oc; 
                        o.offevent = oc;
                        o.css = P + "popup";
                        o.render.call(o);
                        t.P[a] = o;
                    }
                    
                    return b;
                },
    resize  :   function()
                {
                    var t = this,
                        g = $g(t.idg),
                        f = $g(t.idi),
                        b = $g(t.idb),
                        gw = $w(g),
                        gh = $h(g),
                        fw = $w(f);
                    
                        
                        if(gw > 0)
                        {
                            $w(f,gw - 4);
                        }
                        
                        if(gh > 0)
                        {
                            $h(f,gh - $h(b) - 2);
                        }
                }
            

};
/*
*   File Name:      SS.control.tab.js
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
*   SS.control.tabbar.js
*   SS.addon.js
*/


/**
*   @class Tab control used by the tab bar control.
*   @constructor
*/
SS.control.tab =    function()
                    {
                        /**
                        *   @property id 
                        *   @description Identifier of the tab control.
                        */
                        this.id            =   "";
                        
                        /**
                        *   @property {String}      css 
                        *   @description            Style sheet class applied to the tab.
                        *                           Default = "SS_control_tab"
                        */
                        this.css           =   "SS_control_tab";
                        
                        /**
                        *   @property {String}      css_on 
                        *   @description            Style sheet class applied to the tab.
                        *                           Default = "SS_control_tab_on"
                        */
                        this.css_on        =   "SS_control_tab_on";
                        
                        /** 
                        *   @property {Function}    onselect
                        *   @description            Function called or evaluated {String} when the tab is selected (clicked on).
                        */
                        this.onselect      =   "";
                        
                        /** 
                        *   @property {Function}    ondeselect
                        *   @description            Function called or evaluated {String} when this tab loses it selected status.
                        */
                        this.ondeselect    =   "";
                         
                        /** 
                        *   @property {Boolean}     selected
                        *   @description            Flag indicating if the tab is in the selected state.
                        *                           Default = false.
                        */
                        this.selected      =   0;      
                         
                        /** 
                        *   @property {Boolean}     visible
                        *   @description            Flag indicating if the tab is visible in the tab bar.
                        *                           Default = true.
                        */
                        this.visible       =   1;
                        
                        /**
                        *   @property {String}      value 
                        *   @description            Arbitary value of the tab.
                        *                           Default = "".
                        */
                        this.value		   =	"";
                    };
                        
SS.control.tab.prototype = {
                    /**
	                *   @function       SS.control.tab.render
	                *   @description    Renders the tab inside the parent tab bar.
	                *   @returns        null
	                */
    render      :   function()
                    {
                        //t:    this
                        //l:    element
                        //s:    css style (element level)
                        var t = this, l = $g(t.id), s;
                        s = l.className;
                        if(!$ise(s))
                        {
                            t.css = s;
                        }
                        
                        $cl(l,t.css + ($psb(t.selected) ? " " + t.css_on : ""));
                        /**
					    *   @ignore
					    */
						l.onclick = function(e)
                                    {
                                        t.select.call(t,e);
                                    };
                        
                    },
                    /**
	                *   @function           SS.control.tab.select
	                *   @description        Handles the selecting of the tab and activating the
	                *                       deselect function of the previosuly selected tab.
	                *   @param {Event} e    Raised event.
	                *   @returns            null
	                */
    select      :   function(e)
                    {
                        //t:    this
                        //l:    this element
                        //p:    parent tab bar
                        //i:    index pointer
                        //b:    tab
                        //a:    array of tabs
                        var t = this, l = $g(t.id), p = $gc(l.parentNode.id), i, b, a = p.tabs();
                        e = $e(e);
                        if(p)
                        {
                            for(i = 0; i < $ln(a); i++)
                            {
                                b = a[i];
                                if(b.selected)
                                {
                                    b.deselect.call(b,e);
                                }
                            }
                        }
                        
                        t.selected = 1;
                        $cl(l,t.css + " " + t.css_on);
                        $ef(t.onselect,t,e);
                        $ef(p.onselect,p,e);
                        $ef(p.onchange,p,e);
                    },
                    /**
	                *   @function           SS.control.tab.deselect
	                *   @description        Handles the deselecting of this tab.
	                *   @param {Event} e    Raised event.
	                *   @returns            null
	                */
    deselect    :   function(e)
                    {
                        //t:    this
                        //l:    this element
                        var t = this, l = $g(t.id), p = $gc(l.parentNode.id);
                        e = $e(e);
                        t.selected = 0;
                        $cl(l,t.css);
                        $ef(t.ondeselect,t,e);     
                        $ef(p.ondeselect,p,e);                   
                    }
  
};

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
