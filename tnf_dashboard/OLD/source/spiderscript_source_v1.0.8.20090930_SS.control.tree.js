/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.control.tree.js			
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

};