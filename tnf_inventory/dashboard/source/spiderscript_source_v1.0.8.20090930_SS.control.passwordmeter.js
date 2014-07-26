/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.passwordmeter.js		
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
