/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.datetime.js				
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

$datediff = SS.datetime.difference;