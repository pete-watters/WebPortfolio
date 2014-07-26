/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.richtextbox.js		
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
