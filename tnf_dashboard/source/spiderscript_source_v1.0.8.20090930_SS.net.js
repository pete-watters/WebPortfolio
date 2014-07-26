/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.net.js				
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
