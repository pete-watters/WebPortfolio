/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.slider.js				
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
