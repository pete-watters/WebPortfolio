/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.locale.js				
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
            