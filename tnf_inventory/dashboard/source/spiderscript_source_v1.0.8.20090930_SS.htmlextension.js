/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.htmlextension.js				
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
