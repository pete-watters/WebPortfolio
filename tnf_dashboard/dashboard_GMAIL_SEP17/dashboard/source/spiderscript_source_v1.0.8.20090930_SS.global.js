/******************************************************************************** 	
	Spiderscript Javascript Library	File:	SS.global.js				
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
*   File Name:      SS.global.js
*   Description:    Global Variable Declarations
*   Author:         Allen Evans
*/

/*
*   Dependencies
*   ----------------------------------------
*   None
*/

/**
* @namespace SS Spiderscript Namespace
*/
var SS = {};

SS.global = {

    controls    :       [],
    loaded      :       0,      //flag to indicate that the Spiderscript library has loaded ([0|1])
    nid         :       1,      //new id counter
    htmels      :       [],
    eeh         :       [],      //element event handler holder,
    url         :       "http://www.spiderscript.net/",
    trash       :       []      //array of elements to be destroyed
};

/**
*   @namespace  Boolean Data Type. [True | False]
*/