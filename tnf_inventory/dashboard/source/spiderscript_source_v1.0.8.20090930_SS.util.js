/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.util.js				
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
