/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.window.js				
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

