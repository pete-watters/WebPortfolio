/******************************************************************************** 	
	Spiderscript Javascript Library						
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




var SS={};SS.global={controls:[],loaded:0,nid:1,htmels:[],eeh:[],url:"http://www.spiderscript.net/",trash:[]};
var $ci=clearInterval;var $ct=clearTimeout;var $si=setInterval;var $st=setTimeout;function $lc(s)
{var r="";if(s&&s.toLowerCase)
{r=s.toLowerCase();}
else if(s&&s.toString)
{r=s.toString().toLowerCase();}
return r;}
function $uc(s)
{var r="";if(s&&s.toUpperCase)
{r=s.toUpperCase();}
else if(s&&s.toString)
{r=s.toString().toUpperCase();}
return r;}
function $isf(o)
{return typeof o=="function";}
function $iso(o)
{return(o&&typeof o=="object")||$isf(o);}
function $iss(o)
{return typeof o=="string";}
function $isu(o)
{return typeof o=="undefined";}
function $ln(l)
{var r=0;if(typeof l!="undefined"&&l.length)
{r=l.length;}
return r;}
function $il(l,v,d)
{var f=0;if(!d)
{d=",";}
if(!l||$isu(v))
{}
else if(l==v)
{f=1;}
else if(!l.split)
{}
else
{var s=l.split(d),i,a=$ln(s);if(a)
{for(i=0;i<a&&!f;i++)
{if(s[i]==v)
{f=1;}}}}
return(f)?true:false;}
function $iln(l,v,d)
{return $il($lc(l),$lc(v),$lc(d));}
function $psb(v)
{return $iln("yes,true,1,y,on",v);}
function $tb(v)
{var r=false;if(v!==0&&(v==1||$psb(v)))
{r=true;}
return r;}
function $isdc(r,c)
{var o=0;if(r&&c)
{if(r==c)
{o=1;}
else
{o=$isdc(r,c.parentNode);}}
return $tb(o);}
function $isa(o)
{return $iso(o)&&o.constructor==Array;}
function $isb(o)
{return typeof o=="boolean";}
function $isd(o)
{return typeof o!="undefined";}
function $ise(o)
{var y=typeof o;return(y=="undefined"||o===null||(y=="string"&&o==="")||(y=="object"&&o.constructor==Array&&!o.length));}
function $isn(o)
{return(typeof o=="number"||(!isNaN(o)))&&(!$ise(o));}
function $g(id)
{var r=null;if(id)
{r=document.getElementById(id);if(!r&&id.match&&id.match(/[\:\$]/g))
{r=$g(id.replace(/[\:\$]/g,"_"));}}
return r;}
function $n(o)
{return Number(o);}
function $nid()
{return SS.global.nid++;}
function $c(t,cn,id)
{var l;if(typeof t=="object")
{id=t.id?t.id:null;cn=t.className?t.className:"";t=t.tagName?t.tagName:null;}
t=(t)?t:"div";id=(id)?id:t+SS.global.nid++;l=document.createElement(t);l.id=id;if(cn)
{l.className=cn;}
return l;}
function $ctn(t)
{return document.createTextNode(t);}
function $rc(p,c)
{if(p&&p.removeChild)
{return p.removeChild(c);}}
function $rp(l)
{if(l)
{return $rc(l.parentNode,l);}}
function $ta(o)
{var r;if($isd(o))
{if($isa(o))
{r=o;}
else
{r=[o];}}
else
{r=[];}
return r;}
function $trim(s)
{if(s&&s.replace)
{s=s.replace(/^(\s)+|(\s)+$/g,"");}
return s;}
function $ts(s)
{var r="";if((!$ise(s))&&s.toString)
{r=s.toString();if($lc(r)=="[object object]")
{r="";}}
return r;}
Array.prototype.indexOf=function(o)
{var r=-1,i,t=this;for(i=0;i<t.length;i++)
{if(t[i]==o)
{r=i;i=t.length;}}
return r;};Array.prototype.contains=function(o)
{return this.indexOf(o)>=0;};Array.prototype.add=function(o,n)
{if(!(n&&this.contains(o)))
{this[this.length]=o;}};Array.prototype.remove=function(o)
{var i=this.indexOf(o),r=null;if(i>=0)
{r=this.splice(i,1);}
return r;};Array.prototype.removeAt=function(i)
{var r=null;if(i>=0&&i<this.length)
{r=this.splice(i,1);}
return r;};Array.prototype.copy=function()
{var i,r=[];for(i=0;i<this.length;i++)
{r.push(this[i]);}
return r;};String.prototype.left=function(x)
{return this.substring(0,x);};String.prototype.right=function(x)
{return this.substring(this.length-x);};String.prototype.repeat=function(x)
{var r=this,i;for(i=1;i<x;i++)
{r+=this;}
return r;};String.prototype.reverse=function()
{return this.split("").reverse().join("");};Date.prototype.add=function(v,i)
{var t=this,u=$lc(i);if(!(!i||v===0))
{if(u=="ms")
{t.setMilliseconds(t.getMilliseconds()+v);}
if(u=="s")
{t.setSeconds(t.getSeconds()+v);}
if(u=="mi")
{t.setMinutes(t.getMinutes()+v);}
if(u=="h")
{t.setHours(t.getHours()+v);}
if(u=="d")
{t.setDate(t.getDate()+v);}
if(u=="mo")
{t.setMonth(t.getMonth()+v);}
if(u=="y")
{t.setFullYear(t.getFullYear()+v);}}
return t;};function $x2o(x)
{var r=null,o={},cn,i,c,n,fc,s,v,m,nn,nv,l,on,y;if(x)
{cn=x.childNodes;l=cn.length;for(i=0;i<l;i++)
{c=cn[i];n=c.tagName;if(typeof n!="undefined")
{fc=c.firstChild;if(fc)
{s=fc.nextSibling;nn=fc.nodeName;nv=fc.nodeValue;if(nn=="#text")
{v=((nv&&nv.length)?nv.length:0)?nv:null;while(s&&s.nodeName=="#text")
{fc=s;s=fc.nextSibling;nv=fc.nodeValue;v+=((nv&&nv.length)?nv.length:0)?nv:null;}}
else
{v=null;}
on=o[n];y=typeof v;if((!(y=="undefined"||v===null||(y=="string"&&v==="")||(y=="object"&&v.constructor==Array&&!v.length)))&&y=="string"&&!s)
{y=typeof on;if(y!="undefined")
{if(!(y=="object"&&on.constructor==Array))
{o[n]=[on];on=o[n];}
if(!isNaN(v))
{v=Number(v);}
on[on.length]=v;}
else
{if(!isNaN(v))
{v=Number(v);}
o[n]=v;}}
else
{y=typeof on;if(on)
{if(!(y=="object"&&on.constructor==Array))
{o[n]=[on];on=o[n];}
on[on.length]=$x2o(c);}
else
{o[n]=$x2o(c);}}}
else
{o[n]=null;}}}
r=o;}
return r;}
function $o2x(o,rt,ns,f)
{var d,pf="",tn,i,k,v,n;if(o)
{rt=rt?rt:"";ns=ns?ns:"";if(document.implementation&&document.implementation.createDocument)
{d=document.implementation.createDocument(ns,rt,null);}
else
{d=new ActiveXObject("MSXML2.DOMDocument");tn=rt;if(rt)
{i=rt.indexOf(":");}
if(i>=0)
{pf=rt.substring(0,i);tn=rt.substring(i+1);}
d.loadXML("<"+(pf?pf+":":"")+tn+(ns?" xmlns:"+pf+"=\""+ns+"\"":"")+"/>");}
if(d)
{var _p=function(d,p,o,ns)
{var k,v,i,ln,n,fk,y=typeof o;if(y!="undefined")
{if(y=="string"||y=="number")
{p.appendChild(d.createTextNode((o.toString?o.toString():o)));}
else
{for(k in o)
{if(typeof o[k]!="function"||f)
{v=o[k];y=typeof v;fk=k;if(!isNaN(k))
{fk="_"+k;}
n=d.createElementNS?d.createElementNS(ns,fk):d.createNode(1,fk,ns);if(y!="undefined")
{if(y=="object")
{if(v&&v.constructor==Array)
{ln=v.length;for(i=0;i<ln;i++)
{n=d.createElementNS?d.createElementNS(ns,fk):d.createNode(1,fk,ns);_p(d,n,v[i],ns);p.appendChild(n);}}
else
{_p(d,n,v,ns);p.appendChild(n);}}
else
{n.appendChild(d.createTextNode((v.toString?v.toString():v)));p.appendChild(n);}}}}}}};_p(d,d.firstChild||d,o,ns);}}
return d;}
function $ef(f,c,event)
{if(f)
{event=$e(event);var e=event;if($isf(f))
{return f.call(c,event);}
else
{eval("function _f(event){"+f+"};");return _f.call((c)?$g(c.id):c,event);}}}
function $lg2()
{var n=navigator,l=n.language||n.userLanguage;return $lc(l.substring(0,2));}
function $ac(p,c,b)
{if(p&&p.appendChild&&c)
{if(b&&p.insertBefore)
{p.insertBefore(c,b);}
else
{p.appendChild(c);}}}
var $rnd=Math.round;function $rand(m)
{return $rnd((Math.random()*m));}
function $ga(l,a)
{if(l&&l.getAttribute)
{return l.getAttribute($lc(a),1);}}
function $sa(l,a,v)
{if(l&&l.setAttribute)
{l.setAttribute($lc(a),v);}}
function $gt(n)
{return document.getElementsByTagName(n);}
function $keys(o)
{var k,a=[];for(k in o)
{if(!$isf(o[k]))
{a.add(k);}}
return a;}
function $asort(a,c)
{c=$ta(c);var n=$ln(a),o=$ln(c),m,k,d,w,i,q,p;for(q=n-1;q>0;q--)
{for(p=0;p<q;p++)
{w=0;if(o)
{for(i=0;i<o;i++)
{m=$keys(c[i]);k=m[0];d=c[i][k];if(a[p][k]>a[p+1][k])
{if(d)
{w=1;}
break;}
else if(a[p][k]<a[p+1][k])
{if(d===0)
{w=1;}
break;}}}
else if(a[p]>a[p+1])
{w=1;}
if(w)
{m=a[p];a[p]=a[p+1];a[p+1]=m;}}}
return a;}
function $gc(id)
{var c,r,s=SS.global.controls,n=(s)?s.length:0,l=0,u=n-1,i;while(n>9)
{i=Math.floor((l+u)/2);c=s[i];if(c)
{k=c.id;k2=c.idtb;if(k==id||k2==id)
{r=c;break;}
else if(l>u)
{r=null;break;}
else
{if(k<id)
{l=i+1;}
else
{u=i-1;}}}
else
{break;}}
if(!r&&n)
{for(i=0;i<n;i++)
{c=s[i];if(c.id==id||c.idtb==id)
{r=c;break;}}
if(r&&n>9)
{$st(function(){$asort(SS.global.controls,{id:1});},0);}}
return r;}
function $gd(l,t,a)
{var i,n,g;if($iss(l))
{l=$g(l);}
if(l)
{if(!a)
{a=[];}
else if($ise(t)||$uc(l.tagName)==$uc(t))
{a.add(l);}
g=$ln(l.childNodes);for(i=0;i<g;i++)
{n=l.childNodes[i];a=$gd(n,t,a);}}
return a;}
function $d(l)
{if(l)
{$rp(l);SS.global.trash=$ta(SS.global.trash).concat($gd(l));}}
function $dc(l)
{if(l)
{var n=l.childNodes;if(n)
{while(n.length>0)
{$d(n[0]);}}}}
var $esc=encodeURIComponent;var $uesc=decodeURIComponent;function $eschtml(s)
{var l=$c(),r="";$ac(l,$ctn(s));r=l.innerHTML;$d(l);return r;}
var $min=Math.min;var $max=Math.max;function $cmom(f,t,x)
{if(f&&t)
{for(var k in t)
{if(!$isf(t[k])&&$isd(f[k])&&!$il(x,k))
{try
{t[k]=f[k];}catch(X){}}}}}
function $up(p,u)
{if(!u)
{u=window.location.href;}
var r=new RegExp("[\\?&]"+p+"=([^&#]*)","i").exec(u),v="";if(!$ise(r))
{v=r[1];}
return v;}
function $upa(u,p,v)
{var r=new RegExp("([\\?&])"+p+"=([^&#]*)","i");if(!$ise(r.exec(u)))
{u=u.replace(r,"$1"+p+"="+v);}
else
{u+=(u.indexOf("?")<0?"?":"&")+p+"="+v;}
return u;}
function $anchor(u)
{if(!u)
{u=window.location.href;}
var r=/(#)([^?\n]*)/,v;if(u)
{v=u.match(r);if($ln(v)==3)
{v=v[2];}
else
{v=null;}}
return v;}
function $cn(l)
{var r=null;if(l)
{r=l.childNodes;}
return r;}
function $hcn(l)
{return $ln($cn(l))>0;}
function $pn(l)
{var r=null;if(l)
{r=l.parentNode;}
return r;}
function $cc(e)
{var c=0;e=e||window.event;if(e)
{c=e.charCode||e.keyCode;}
return c;}
function $cl(l,n)
{if(l)
{if($isd(n))
{l.className=n;}
n=l.className;}
return n;}
function $cookie(n,v,d)
{var m,r,x=new Date(),s;if(!$ise(n))
{n=$esc(n);if($isd(v))
{if($isu(d))
{d=28;}
s=n+"="+$esc(v);if(d)
{if(d.toGMTString)
{x=d;}
else
{x=x.add(d,"d");}
if(x&&x.toGMTString)
{s+=";expires="+x.toGMTString();}}
document.cookie=s;}
else
{m=document.cookie.match("(^|;)?("+n+")=([^;]*)(;|$)");if(m)
{r=$uesc(m[3]);}
return r;}}}
function $cookie_delete(n)
{$cookie(n,"",-1);}
function $css(n,ci,si)
{var s=document.styleSheets,l=$ln(s),i,j,r,y=[],t;if(si)
{l=si+1;}
if($iss(n))
{n=new RegExp("^"+n+"$|^"+n+"|\\s"+n+"\\s|"+n+"$",(ci)?"i":"");}
for(i=(si)?si:0;i<l;i++)
{r=s[i].rules||s[i].cssRules;m=$ln(r);for(j=0;j<m;j++)
{t=r[j].selectorText;if(t&&t.match(n))
{y.add(r[j].style);}}}
l=$ln(y);if(!l)
{y=null;}
else if(l===1)
{y=y[0];}
return y;}
function $cssvalue(n,a,ci,si)
{var v=null,s=$css(n,ci,si),l=$ln(s),m;if(s)
{if($isa(s))
{for(var i=0;i<l;i++)
{var so=s[i];m=s[i][a];if(!$ise(m))
{v=m;}}}
else
{v=s[a];}}
return v;}
function $ev(s)
{eval(s);}
function $dw(s)
{document.write(s);}
function $isIElt7()
{var r=0,a=navigator.appVersion;if(a&&a.match(/MSIE\s[1,2,3,4,5,6]/))
{r=1;}
return $psb(r);}
function $isIE()
{var r=0,a=navigator.appVersion;if(a&&a.match(/MSIE/))
{r=1;}
return $psb(r);}
function $ruid()
{var r=[],i;for(i=0;i<36;i++)
{r[i]=$rand(15).toString(16);if(i==7||i==12||i==17||i==22)
{i++;r[i]="-";}}
return r.join("");}
function $error(x,l,o)
{if(typeof $debug!="undefined")
{if(l)
{$debug("Excecption Occured In: "+l);$debug("-".repeat($ln(l)+80));}
$debug(x);}} 
/*********************************************************		
	JSON								
	------------------------------------------------------		
	http://www.JSON.org/json2.js					
	2009-04-16							
	Public Domain.							
	NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.		
	See http://www.JSON.org/js.html 				
**********************************************************/ 	

if(!this.JSON){JSON={};}
(function(){function f(n){return n<10?'0'+n:n;}
if(typeof Date.prototype.toJSON!=='function'){Date.prototype.toJSON=function(key){return this.getUTCFullYear()+'-'+
f(this.getUTCMonth()+1)+'-'+
f(this.getUTCDate())+'T'+
f(this.getUTCHours())+':'+
f(this.getUTCMinutes())+':'+
f(this.getUTCSeconds())+'Z';};String.prototype.toJSON=Number.prototype.toJSON=Boolean.prototype.toJSON=function(key){return this.valueOf();};}
var cx=/[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,escapable=/[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,gap,indent,meta={'\b':'\\b','\t':'\\t','\n':'\\n','\f':'\\f','\r':'\\r','"':'\\"','\\':'\\\\'},rep;function quote(string){escapable.lastIndex=0;return escapable.test(string)?'"'+string.replace(escapable,function(a){var c=meta[a];return typeof c==='string'?c:'\\u'+('0000'+a.charCodeAt(0).toString(16)).slice(-4);})+'"':'"'+string+'"';}
function str(key,holder){var i,k,v,length,mind=gap,partial,value=holder[key];if(value&&typeof value==='object'&&typeof value.toJSON==='function'){value=value.toJSON(key);}
if(typeof rep==='function'){value=rep.call(holder,key,value);}
switch(typeof value){case'string':return quote(value);case'number':return isFinite(value)?String(value):'null';case'boolean':case'null':return String(value);case'object':if(!value){return'null';}
gap+=indent;partial=[];if(Object.prototype.toString.apply(value)==='[object Array]'){length=value.length;for(i=0;i<length;i+=1){partial[i]=str(i,value)||'null';}
v=partial.length===0?'[]':gap?'[\n'+gap+
partial.join(',\n'+gap)+'\n'+
mind+']':'['+partial.join(',')+']';gap=mind;return v;}
if(rep&&typeof rep==='object'){length=rep.length;for(i=0;i<length;i+=1){k=rep[i];if(typeof k==='string'){v=str(k,value);if(v){partial.push(quote(k)+(gap?': ':':')+v);}}}}else{for(k in value){if(Object.hasOwnProperty.call(value,k)){v=str(k,value);if(v){partial.push(quote(k)+(gap?': ':':')+v);}}}}
v=partial.length===0?'{}':gap?'{\n'+gap+partial.join(',\n'+gap)+'\n'+
mind+'}':'{'+partial.join(',')+'}';gap=mind;return v;}}
if(typeof JSON.stringify!=='function'){JSON.stringify=function(value,replacer,space){var i;gap='';indent='';if(typeof space==='number'){for(i=0;i<space;i+=1){indent+=' ';}}else if(typeof space==='string'){indent=space;}
rep=replacer;if(replacer&&typeof replacer!=='function'&&(typeof replacer!=='object'||typeof replacer.length!=='number')){throw new Error('JSON.stringify');}
return str('',{'':value});};}
if(typeof JSON.parse!=='function'){JSON.parse=function(text,reviver){var j;function walk(holder,key){var k,v,value=holder[key];if(value&&typeof value==='object'){for(k in value){if(Object.hasOwnProperty.call(value,k)){v=walk(value,k);if(v!==undefined){value[k]=v;}else{delete value[k];}}}}
return reviver.call(holder,key,value);}
cx.lastIndex=0;if(cx.test(text)){text=text.replace(cx,function(a){return'\\u'+
('0000'+a.charCodeAt(0).toString(16)).slice(-4);});}
if(/^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,'@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,']').replace(/(?:^|:|,)(?:\s*\[)+/g,''))){j=eval('('+text+')');return typeof reviver==='function'?walk({'':j},''):j;}
throw new SyntaxError('JSON.parse');};}}()); 
/*********************************************************/	

SS.locale=function(ul,cc,df)
{var t=this;t.decimalpoint=".";t.currencysymbol="$";t.days=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];t.days_abrv2=[];t.days_abrv3=[];t.days_letter=[];t.months=["January","February","March","April","May","June","July","August","September","October","November","December"];t.months_abrv2=[];t.months_abrv3=[];t.months_letter=[];t.userlanguage=$isd(ul)?ul:"";t.countrycode=$isd(cc)?cc:"";t.dateformat="MM/dd/yyyy";if($iln("de,es,fr,gb,it",ul))
{t.dateformat="dd/MM/yyyy";}
t.days_de=["Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag"];t.days_es=["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"];t.days_fr=["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];t.days_it=["Domenica","Lunedi","Martedi","Mercoledi","Giovedi","Venerdi","Sabato"];t.months_de=["Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember"];t.months_es=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];t.months_fr=["Janvier","Fèvrier","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Dècembre"];t.months_it=["Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre"];if(!ul)
{ul=$lg2();}
var id="days_"+ul,im="months_"+ul;if(t[id])
{t.days=t[id];}
if(t[im])
{t.months=t[im];}
var d=t.days,m=t.months,i;for(i=0;i<$ln(d);i++)
{t.days_abrv2.add(d[i].left(2));t.days_abrv3.add(d[i].left(3));t.days_letter.add(d[i].left(1));}
for(i=0;i<$ln(m);m++)
{t.months_abrv2.add(d[i].left(2));t.months_abrv3.add(d[i].left(3));t.months_letter.add(d[i].left(1));}
if($isd(df))
{df=$lc(df);var dl="/",mt=df.match(/[\/\.\-]/);if(mt)
{dl=mt[0];}
df=df.replace(dl,"").replace(dl,"");if(df=="yyyymmdd")
{t.dateformat="yyyy"+dl+"MM"+dl+"dd";}
if(df=="mmddyyyy")
{t.dateformat="MM"+dl+"dd"+dl+"yyyy";}
if(df=="ddmmyyyy")
{t.dateformat="dd"+dl+"MM"+dl+"yyyy";}}};
SS.events={dbd:$dbd(),lstrs:{},dropzone:null,add:function(y,f)
{if(y)
{var t=SS.events,l=t.lstrs,d=document,b=d.body,w=window,m="onmouse",ty=y.replace(/^on/i,"");if(!l[y])
{l[y]=[];var a=function(e){t.called.call(t,this,e,y);};if($iln("keydown,keypress,keyup,mousemove,mousedown,mouseup,mousewheel,mousescroll",ty))
{if(d.addEventListener)
{if(ty=="mousewheel"||ty=="mousescroll")
{ty="DOMMouseScroll";}
d.addEventListener(ty,a,false);}
else if(d.attachEvent)
{d.attachEvent("on"+ty,a);}
else
{d["on"+ty]=a;}}
else if($iln("onresize,onscroll",y))
{w[y]=a;}
else if($isd(d[y]))
{d[y]=a;}
else if($isd(b[y]))
{b[y]=a;}
else if(y=="ssonload"&&SS.global.loaded&&$isf(f))
{f.call(document.body);}
else
{b[y]=a;}}
if(l[y])
{l[y].add(f);}
return y+'_'+($ln(l[y])-1);}},remove:function(y,f)
{var a=SS.events.lstrs[y];if(a)
{a.remove(f);}},removeById:function(id)
{if(id)
{var z=id.split("_"),a=SS.events.lstrs[z[0]];if(a)
{a.removeAt(z[1]);}}},called:function(r,e,y)
{var l=SS.events.lstrs,i,d,e=$e(e),a=l[y],n=$ln(a),m;for(i=0;i<n;i++)
{if($isf(a[i]))
{if(y=="onmousewheel"||y=="onmousescroll")
{d=e.wheelDelta||e.detail;if(d>-120&&d<120)
{d=d*-40;}
e.delta=(d>0)?-1:1;}
else if(y=="onresize")
{m=$dbd();if(m.h==SS.events.dbd.h&&m.w==SS.events.dbd.w)
{break;}}
a[i].call(r,e);}}
if(y=="onresize")
{SS.events.dbd=$dbd();}},dzr:function(dz)
{if(dz)
{var t=SS.events,p,d=t.dropzone;if(!d)
{t.add("onmousemove",function(e){SS.events.dze.call(SS.events,e);});t.add("onmouseup",function(e){SS.events.dze.call(SS.events,e);});t.dropzone=[];d=t.dropzone;}
else
{for(var i=0;i<$ln(d)&&!p;i++)
{z=d[i];if(z.id==dz.id)
{p=i;}}}
if($isd(p))
{d[p]=new t.dzc(dz);}
else
{d.add(new t.dzc(dz));}}},dze:function(e)
{e=$e(e);var z=SS.events.dropzone,cs=SS.global.controls,c,i,j,d,ad,x,y;if($ln(z)&&$ln(cs))
{x=e.dX;y=e.dY;for(i=0;i<$ln(z)&&!ad;i++)
{d=z[i];var p=d.coord;if(x>=p.x&&x<=(p.x+p.w)&&y>=p.y&&y<(p.y+p.h))
{if(d.active&&e.type=="mouseup")
{for(j=0;j<$ln(d.pids);j++)
{var pid=d.pids[j];d.pids.remove(pid);d.cids.add(pid);d.DragDrop.call($gc(d.id),e,$gc(pid));}
d.active=0;}
else
{for(j=0;j<$ln(cs)&&!ad;j++)
{c=cs[j];if(c._m)
{if(!d.active)
{d.DragFocus.call($gc(d.id),e,c);d.active=1;if(d.pids.indexOf(c.id)<0)
{d.pids.add(c.id);}}
ad=d;}}}}
else
{if($ln(d.cids))
{for(j=0;j<$ln(cs)&&!ad;j++)
{c=cs[j];if(c._m)
{if(d.cids.indexOf(c.id)>=0)
{d.DragLeave.call($gc(d.id),e,c);d.cids.remove(c.id);}}}}}}
for(i=0;i<$ln(z);i++)
{d=z[i];for(j=0;j<$ln(cs)&&!ad;j++)
{c=cs[j];if(c._m)
{if(d.active)
{if(d.pids.indexOf(c.id)>=0)
{d.pids.remove(c.id);}
else
{d.pids.add(c.id);}
d.DragBlur.call($gc(d.id),e,c);d.active=0;}}}}}},dzc:function(dz)
{var t=this;t.id=dz.id;t.coord=$xyz($g(dz.id));t.active=0;t.cids=[];t.pids=[];t.DragBlur=dz.DragBlur;t.DragFocus=dz.DragFocus;t.DragDrop=dz.DragDrop;t.DragLeave=dz.DragLeave;}};var $ea=SS.events.add;var $erid=SS.events.removeById;function $e(e)
{e=e||window.event;if(e)
{e.dX=e.clientX+$dbsl();e.dY=e.clientY+$dbst();if(e.detail&&e.type=="DOMMouseScroll")
{e.dX=$min(e.dX,e.screenX+$dbsl());e.dY=$min(e.dY,e.screenY+$dbst());}}
return e;}
function $ec(e)
{if(e&&$isd(e.stopPropagation))
{if(e.preventDefault)
{e.preventDefault();}
e.stopPropagation();}
else if(window.event)
{e=window.event;e.returnValue=false;e.cancelBubble=true;}
return false;}
function $eehadd(l,v,f)
{if(l&&!l.id)
{l.id=$nid();}
if(l&&l.id&&v&&f)
{var i,x,c,h=SS.global.eeh;v=v.replace(/^on/,"");for(i=0;i<$ln(h);i++)
{x=h[i];if(x&&x.id&&x.id==l.id)
{c=x;break;}}
if(!c)
{c={};c.id=l.id;h.add(c);}
if(c[v])
{c[v].add(f);}
else
{c[v]=[];c[v].add(f);}
l["on"+v]=function(e)
{return $eehcalled(this,e);};}}
function $eehclear(l,v)
{if(l&&l.id)
{var h=SS.global.eeh,i,x;if(v)
{v=v.replace(/^on/,"");}
for(i=0;i<$ln(h);i++)
{x=h[i];if(x&&x.id&&x.id==l.id)
{c=x;break;}}
if(c)
{h.remove(c);}}}
function $eehcalled(l,e)
{e=$e(e);if(l&&l.id&&e)
{var c,i,m,h=SS.global.eeh,t=e.type,r,f,o,a;for(i=0;i<$ln(h);i++)
{c=h[i];if(c&&c.id==l.id)
{m=c;break;}}
if(m&&m[t])
{a=m[t];for(i=0;i<$ln(a);i++)
{f=a[i];if($isf(f))
{o=f.call(l,e);if(!$ise(o))
{r=o;break;}}
else
{return $ef(f,this,e);}}}
return r;}}
SS.datetime={formats:[["yyyy/MM/dd","^(((\\d{4})([/|\\.|-])(0?[13578]|10|12)([/|\\.|-])(0?[1-9]|[12][0-9]|3[01]))|((\\d{4})([/|\\.|-])(0?[469]|11)([/|\\.|-])(0?[1-9]|[12][0-9]|30))|((\\d{4})([/|\\.|-])(0?2)([/|\\.|-])(0?[1-9]|1[0-9]|2[0-8]))|(([02468][048]00)(\\.|-|\\/)(0?2)([/|\\.|-])(29))|(([13579][26]00)([/|\\.|-])(0?2)([/|\\.|-])(29))|(([0-9][0-9][0][48])([/|\\.|-])(0?2)([/|\\.|-])(29))|(([0-9][0-9][2468][048])([/|\\.|-])(0?2)([/|\\.|-])(29))|(([0-9][0-9][13579][26])([/|\\.|-])(0?2)([/|\\.|-])(29)))$"],["MM/dd/yyyy","^(((0?[13578]|10|12)([/|\\.|-])(0?[1-9]|[12][0-9]|3[01])([/|\\.|-])(\\d{4}))|((0?[469]|11)([/|\\.|-])(0?[1-9]|[12][0-9]|30)([/|\\.|-])(\\d{4}))|((0?2)([/|\\.|-])(0?[1-9]|1[0-9]|2[0-8])([/|\\.|-])(\\d{4}))|((0?2)([/|\\.|-])(29)(\\.|-|\\/)([02468][048]00))|((0?2)([/|\\.|-])(29)([/|\\.|-])([13579][26]00))|((0?2)([/|\\.|-])(29)([/|\\.|-])([0-9][0-9][0][48]))|((0?2)([/|\\.|-])(29)([/|\\.|-])([0-9][0-9][2468][048]))|((0?2)([/|\\.|-])(29)([/|\\.|-])([0-9][0-9][13579][26])))$"],["dd/MM/yyyy","^(((0?[1-9]|[12][0-9]|3[01])([/|\\.|-])(0?[13578]|10|12)([/|\\.|-])(\\d{4}))|((0?[1-9]|[12][0-9]|30)([/|\\.|-])(0?[469]|11)([/|\\.|-])(\\d{4}))|((0?[1-9]|1[0-9]|2[0-8])([/|\\.|-])(0?2)([/|\\.|-])(\\d{4}))|((29)(\\.|-|\\/)(0?2)([/|\\.|-])([02468][048]00))|((29)([/|\\.|-])(0?2)([/|\\.|-])([13579][26]00))|((29)([/|\\.|-])(0?2)([/|\\.|-])([0-9][0-9][0][48]))|((29)([/|\\.|-])(0?2)([/|\\.|-])([0-9][0-9][2468][048]))|((29)([/|\\.|-])(0?2)([/|\\.|-])([0-9][0-9][13579][26])))$"],["HH:mm:ss.ffff","^(((([0]?[1-9]|1[0-2]))(:|\\.)([0-5][0-9])((:|\\.)([0-5][0-9]))?(AM|am|aM|Am|PM|pm|pM|Pm))|(([0]?[0-9]|1[0-9]|2[0-3])(:|\\.)([0-5][0-9])((:|\\.)([0-5][0-9]))?(\\.(\\d{1,4}))?))$"]],getFormat:function(dt,df)
{df=($isd(df)?df:null);var f=SS.datetime.formats,i,r=null,m;if($iss(dt)&&dt!=="")
{for(i=0;i<$ln(f);i++)
{if(dt.match(f[i][1]))
{m=f[i][0];if($isd(df)&&df!==null&&$lc(df).replace(/[\/|\.|\-]/g,"")==$lc(f[i][0]).replace(/[\/|\.|\-]/g,""))
{r=m;break;}
else if(!$isd(df))
{if(r)
{r=[r,m];}
else
{r=m;}}
else if(!r&&$isd(df))
{r=m;}}}}
return r;},fromString:function(s,df,d)
{if($ise(s))
{return null;}
else
{var ds=s.split(" "),p=SS.datetime,i,t,g=SS.global,l=$ln(ds);if(l>1)
{for(i=0;i<l;i++)
{t=p.fromString(ds[i],df,d);if(d)
{d.setHours(t.getHours());d.setMinutes(t.getMinutes());d.setSeconds(t.getSeconds());d.setMilliseconds(t.getMilliseconds());}
else
{d=t;}}}
else
{if($ise(df)&&g&&g.locale)
{df=g.locale.dateformat;}
df=p.getFormat(s,df);if($isa(df)&&df[0])
{df=df[0];}
d=null;if(df)
{df=$lc(df).replace(/[\/|\.|\-|:]/g,"");if(df=="ddmmyyyy")
{d=new Date(s.substring(s.search(/\d{4}/))+"/"+s.substring(s.search(/[\/|\.|\-]/)+1,s.search(/[\/|\.|\-]\d{4}$/))+"/"+s.substring(s.search(/^\d{1,2}/),s.search(/[\/|\.|\-]/)));}
if(df=="mmddyyyy")
{d=new Date(s.substring(s.search(/\d{4}/))+"/"+s.substring(s.search(/^\d{1,2}/),s.search(/[\/|\.|\-]/))+"/"+s.substring(s.search(/[\/|\.|\-]/)+1,s.search(/[\/|\.|\-]\d{4}$/)));}
if(df=="yyyymmdd")
{d=new Date(s.replace(/\./g,"/").replace(/\-/g,"/"));}
if(df=="hhmmssffff")
{d=(d)?d:new Date("1970/01/01 00:00:00");var a=s.match(SS.datetime.formats[3][1]),th=$ise(a[4])?a[12]:a[4],tm=$ise(a[6])?a[14]:a[6],ts=$ise(a[9])?a[17]:a[9],tf=a[19];if($lc(a[10])=="pm"&&th&&th<12)
{th=$n(th)+12;}
d.setHours(th);d.setMinutes(tm);if(ts)
{d.setSeconds(ts);}
if(tf)
{d.setMilliseconds(tf);}}}}
return d;}},format:function(d,f,lc)
{if(d&&!$ise(f))
{var a=f,y=$ts(d.getFullYear()),M=d.getMonth()+1,da=d.getDate(),sc=d.getSeconds(),mm=d.getMinutes(),ms=$ts(d.getMilliseconds())+"00",h=d.getHours(),g=SS.global,l;ms=ms.left(3);if($isd(lc))
{l=lc;}
else if(g&&g.locale)
{l=g.locale;}
else
{l=new SS.locale();}
var dsf=l.days,msf=l.months,dsa=l.days_abrv3,msa=l.months_abrv3;a=SS.datetime.preFormat(a);a=a.replace(/\&01/g,y);a=a.replace(/\&02/g,y.right(2));a=a.replace(/\&03/g,dsf[d.getDay()]);a=a.replace(/\&04/g,dsa[d.getDay()]);a=a.replace(/\&05/g,(da<10)?"0"+da:da);a=a.replace(/\&06/g,da);a=a.replace(/\&07/g,msf[M-1]);a=a.replace(/\&08/g,msa[M-1]);a=a.replace(/\&09/g,(M<10)?"0"+M:M);a=a.replace(/\&10/g,M);a=a.replace(/\&11/g,(h<10)?h:((h>12&&h<22)?"0"+$n(h-12):$n(h-12)));a=a.replace(/\&12/g,(h<=12)?h:$n(h-12));a=a.replace(/\&13/g,(h<10)?"0"+h:h);a=a.replace(/\&14/g,h);a=a.replace(/\&15/g,(mm<10)?"0"+mm:mm);a=a.replace(/\&16/g,(sc<10)?"0"+sc:sc);a=a.replace(/\&18/g,$ts($n("0."+ms).toFixed(3)).right(3));a=a.replace(/\&19/g,$ts($n("0."+ms).toFixed(2)).right(2));a=a.replace(/\&20/g,$ts($n("0."+ms).toFixed(2)).right(1));return a;}
else
{return null;}},milliseconds:function(ms,f)
{var sc=(Math.floor(ms/1000)%60).toFixed(0),mm=(Math.floor(ms/60000)%60).toFixed(0),hr=(Math.floor(ms/3600000)%24).toFixed(0),da=Math.floor(ms/86400000).toFixed(0),msf=$ts(ms),a=SS.datetime.preFormat(f),l=$ln(msf);if(l<4)
{msf="0".repeat(4-l)+msf;}
a=a.replace(/\&05/g,(da<10)?"0"+da:da);a=a.replace(/\&06/g,da);a=a.replace(/\&11/g,(hr<10)?hr:((hr>12&&hr<22)?"0"+$n(hr-12):$n(hr-12)));a=a.replace(/\&12/g,(hr<=12)?hr:$n(hr-12));a=a.replace(/\&13/g,($ln($ts(hr))==1)?"0"+hr:hr);a=a.replace(/\&14/g,hr);a=a.replace(/\&15/g,($ln($ts(mm))==1)?"0"+mm:mm);a=a.replace(/\&16/g,($ln($ts(sc))==1)?"0"+sc:sc);a=a.replace(/\&18/g,$ts(msf).right(3));a=a.replace(/\&19/g,$ts(msf).right(2));a=a.replace(/\&20/g,$ts(msf).right(1));return a;},preFormat:function(f)
{if(!$ise(f))
{f=f.replace(/yyyy/g,"&01");f=f.replace(/yy/g,"&02");f=f.replace(/dddd/g,"&03");f=f.replace(/ddd/g,"&04");f=f.replace(/dd/g,"&05");f=f.replace(/d/g,"&06");f=f.replace(/MMMM/g,"&07");f=f.replace(/MMM/g,"&08");f=f.replace(/MM/g,"&09");f=f.replace(/M/g,"&10");f=f.replace(/hh/g,"&11");f=f.replace(/h/g,"&12");f=f.replace(/HH/g,"&13");f=f.replace(/H/g,"&14");f=f.replace(/mm/g,"&15");f=f.replace(/ss/g,"&16");f=f.replace(/fff/g,"&18");f=f.replace(/ff/g,"&19");f=f.replace(/f/g,"&20");}
return f;},difference:function(d1,d2,f)
{var d=d2.valueOf()-d1.valueOf();if(d<0)
{d=d*-1;}
if(!$ise(f))
{f=$lc(f);if(f=="s")
{d=d/1000;}
if(f=="mi")
{d=d/60000;}
if(f=="h")
{d=d/3600000;}
if(f=="d")
{d=d/86400000;}}
return d;}};$datediff=SS.datetime.difference;
function $reverse(s)
{var r="";if(s)
{r=s.reverse();}
return r;}
function $toHexColor(v)
{v=$reverse(v.toString(16));for(var i=v.length;i<6;i++)
{v+="0";}
return"#"+$uc(v);}
function $fromHexColor(v)
{if(v)
{return parseInt("0x"+$reverse(v).replace(/#/g,""),16);}}
SS.htmlextension={inputvalidation:function(l,ft)
{var ma=$ga(l,"mandatory"),va=$ga(l,"validate"),vx=$ga(l,"regex"),iv=0,oc="onchange";if(va)
{var r,m,x,y,z,v=$lc(va);if(v=="number")
{r="^([\\+\\-])?((([1-9]))\\d*|0)(\\.\\d+)?$";m="Number";}
if(v=="wholenumber")
{r="^([\\+\\-]?[1-9]\\d*|[0])$";m="Whole Number";}
if(v=="time")
{r="^((([0]?[1-9]|1[0-2])(:|\\.)[0-5][0-9]((:|\\.)[0-5][0-9])?( )?(AM|am|aM|Am|PM|pm|pM|Pm))|(([0]?[0-9]|1[0-9]|2[0-3])(:|\\.)[0-5][0-9]((:|\\.)[0-5][0-9])?))$";m="Time";}
if(v=="email")
{x="[0-9a-zA-Z]";r="^("+x+"([-.\\w]*"+x+")*@("+x+"[-\\w]*"+x+"\\.)+[a-zA-Z]{2,9})$";m="Email Address";}
if(v=="date")
{x="(\\.|-|\\/)";y="(\\.|-|\\/)(02)"+x;r="^((([0][1-9]|[12][0-9]|3[01])"+x+"(0[13578]|10|12)"+x+"(\\d{4}))|(([0][1-9]|[12][0-9]|30)"+x+"(0[469]|11)"+x+"(\\d{4}))|(([0][1-9]|1[0-9]|2[0-8])"+y+"(\\d{4}))|((29)"+y+"([02468][048]00))|((29)"+y+"([13579][26]00))|((29)"+y+"([0-9][0-9][0][48]))|((29)"+y+"([0-9][0-9][2468][048]))|((29)"+y+"([0-9][0-9][13579][26])))|(((0[13578]|10|12)"+x+"([0][1-9]|[12][0-9]|3[01])"+x+"(\\d{4}))|((0[469]|11)"+x+"([0][1-9]|[12][0-9]|30)"+x+"(\\d{4}))|((02)"+x+"([0][1-9]|1[0-9]|2[0-8])"+x+"(\\d{4}))|((02)"+x+"(29)"+x+"([02468][048]00))|((02)"+x+"(29)"+x+"([13579][26]00))|((02)"+x+"(29)"+x+"([0-9][0-9][0][48]))|((02)"+x+"(29)"+x+"([0-9][0-9][2468][048]))|((02)"+x+"(29)"+x+"([0-9][0-9][13579][26])))|(((\\d{4})"+x+"(0[13578]|10|12)"+x+"([0][1-9]|[12][0-9]|3[01]))|((\\d{4}))"+x+"(0[469]|11)"+x+"([0][1-9]|[12][0-9]|30)|((\\d{4})"+y+"([0][1-9]|1[0-9]|2[0-8]))|(([02468][048]00)"+y+"(29))|(([13579][26]00)"+y+"(29))|(([0-9][0-9][0][48])"+y+"(29))|(([0-9][0-9][2468][048])"+y+"(29))|(([0-9][0-9][13579][26])"+y+"(29)))$";m="Date";}
if(v=="money")
{r="^([\\$\\u00A3\\u20AC\\u00A5\\u0192])?([\\+\\-])?([\\.,]\\d{3}|\\d{1,2})+([\\.,]\\d{2})?$";m="Money";}
m="Invalid "+m;if(r)
{$sa(l,"regex",r);}
if($ise($ga(l,"errortext")))
{$sa(l,"errortext",m);}}
if($psb(ma)||va||vx)
{$eehadd(l,oc,l[oc]);$eehadd(l,oc,function(e){SS.htmlextension.validate(this);});iv=1;}
SS.htmlextension.addElement(l,ft);return $tb(iv);},textarea:function(l)
{var ml=$ga(l,"maxlength"),kd="onkeydown",ku="onkeyup",oc="onchange",f=l[kd],u=l[ku],h=l[oc];if(ml)
{var k=function(e)
{e=$e(e);var m=$ga(l,"maxlength"),c=$cc(e),x=1,v=this.value;if(m&&$ln(v)>=m&&!($il("8,9,13,16,17,18,19,20,27,45,46,91,92,93,144,145",c)||c>=33&&c<=40||c>=112&&c<=123||e.ctrlKey||e.altKey||e.metaKey))
{x=0;this.value=v.left(m);}
return $tb(x);};l.onkeydown=k;l.onkeyup=k;$eehadd(l,kd,k);$eehadd(l,kd,f);$eehadd(l,ku,k);$eehadd(l,ku,u);var c=function(e)
{var m=$ga(l,"maxlength"),v=this.value;if(m&&v.length>m)
{v=v.left(m);}
this.value=v;return 1;};$eehadd(l,oc,c);$eehadd(l,oc,h);}
return SS.htmlextension.inputvalidation(l);},isvalid:function(l)
{var c=1,v=l.value,ma=$ga(l,"mandatory"),rx=$ga(l,"regex"),o=$g($ga(l,"linkto")),m=$ga(l,"errortext");if($ise(v)&&$psb(ma))
{c=0;}
else if($ise(v))
{c=1;}
else if(rx)
{if(v.match(rx))
{c=1;}
else
{c=0;}}
if(o&&(ma||rx))
{o.innerHTML=(c)?"":$ts(m);}
return $tb(c);},validate:function(g)
{var i,v=1,l=SS.global.htmels,c,f=$g(this.id),rx=new RegExp("(^"+g+"(,|$))|(,|$)"+g+"$|,"+g+",");for(i=0;i<$ln(l);i++)
{c=$g(l[i]);if(($isdc(f,c)||$ts($ga(c,"groupname")).match(rx))&&(!SS.htmlextension.isvalid(c)))
{v=0;}}
if(!v)
{$ef($ga(f,"onerror"),f,null);}
return $tb(v);},getElementsByGroupName:function(g)
{var l=SS.global.htmels,r=[],i,n=$ln(l),rx=new RegExp("(^"+g+"(,|$))|(,|$)"+g+"$|,"+g+",");for(i=0;i<n;i++)
{c=$g(l[i]);if($ts($ga(c,"groupname")).match(rx))
{r.add(c);}}
return r;},getGroupValues:function(n)
{var a=SS.htmlextension.getElementsByGroupName(n),o,l,i,y,d;if(!$ise(a))
{o={};for(i=0;i<$ln(a);i++)
{l=a[i];d=l.id;if(!$ise(d))
{y=$uc(l.type);if($iln("CHECKBOX,RADIO",y))
{o[d]=l.checked;}
else if($iln("TEXT,HIDDEN,PASSWORD",y)||$iln("TEXTAREA,SELECT",l.tagName))
{o[d]=$ts(l.value);}
else if(y=="IMAGE")
{o[d].x=l.x;o[d].y=l.y;}
else
{o[d]=l.innerHTML;}}}}
return o;},forminit:function()
{var df=document.forms,f,os="onsubmit";var k=function(e)
{var i,v=1,l=SS.global.htmels,c,f=$g(this.id),d=$ga(f,"validate");if($ise(d))
{d=1;}
if($psb(d)&&l)
{for(i=0;i<$ln(l);i++)
{c=$g(l[i]);if($isdc(f,c)&&(!SS.htmlextension.isvalid(c)))
{v=0;}}}
if(!v)
{$ef($ga(f,"onerror"),f,e);}
return $tb(v);};if(df)
{for(i=0;i<$ln(df);i++)
{f=df[i];$eehadd(f,os,k);$eehadd(f,os,f[os]);}}},addElement:function(l,ft)
{if(l)
{if(!l.id)
{l.id=l.tagName+$nid();}
SS.global.htmels.add(l.id,(ft)?0:1);}}};var $validate=SS.htmlextension.validate;var $gg=SS.htmlextension.getElementsByGroupName;var $ggv=SS.htmlextension.getGroupValues;var $headd=SS.htmlextension.addElement;SS._heinit=function(l,ft)
{var r=0,c,y,h=SS.htmlextension;if(l)
{c=$lc(l.nodeName);y=$lc(l.type);if(y=="text"||y=="hidden"||c=="select")
{r=h.inputvalidation(l);}
else if(c=="textarea")
{r=h.textarea(l);}
else if(!$ise($ga(l,"groupname")))
{$headd(l,ft);}}
return $tb(r);};SS._heinitfrm=function()
{SS.htmlextension.forminit();SS._heinitfrm=null;};function $submit(f)
{if($iss(f))
{f=$g(f);}
if(f&&f.submit)
{if($ef(f.onsubmit,f,{type:"submit"}))
{f.submit();}}}
SS.control={};
SS.geom={height:function(l,h)
{if(l)
{if($isd(h))
{if(isNaN(h))
{if(l.style.height!=h)
{l.style.height=h;$ef(l.onresize,l);}}
else if(l.style.height!=h+'px')
{l.style.height=h+'px';$ef(l.onresize,l);}}
return l.offsetHeight;}
else
{return-1;}},width:function(l,w)
{if(l)
{if($isd(w))
{if(isNaN(w))
{if(l.style.width!=w)
{l.style.width=w;$ef(l.onresize,l);}}
else if(l.style.width!=w+'px')
{l.style.width=w+'px';$ef(l.onresize,l);}}
return l.offsetWidth;}
else
{return-1;}},getXYZ:function(l)
{var p=new SS.coord(0,0);if(l)
{var o=l,x=0,y=0;try
{if(o&&o.offsetParent)
{while(o)
{x+=o.offsetLeft;y+=o.offsetTop;o=o.offsetParent;}}}
catch(z){}
p.x=x;p.y=y;p.z=(l.style&&l.style.zIndex)?l.style.zIndex:null;p.w=l.offsetWidth;p.h=l.offsetHeight;}
return p;},left:function(l,p)
{if(l)
{var o=l,x=null;if($isd(p))
{var pX=(p.match&&p.match("%"))?null:p;if((pX||$isn(p))&&pX!="null")
{l.style.left=pX+'px';}
else
{l.style.left=p;}}
else
{try
{x=0;if(o&&o.offsetParent)
{while(o)
{x+=o.offsetLeft;o=o.offsetParent;}}}
catch(z){}}
return x;}},top:function(l,p)
{if(l)
{var o=l,y=null;if($isd(p))
{var pY=(p.match&&p.match("%"))?null:p;if((pY||$isn(p))&&pY!="null")
{l.style.top=pY+'px';}
else
{l.style.top=p;}}
else
{try
{if(o&&o.offsetParent)
{y=0;while(o)
{y+=o.offsetTop;o=o.offsetParent;}}}
catch(z){}}
return y;}},zIndex:function(l,z)
{var r=0;if(l&&l.style)
{if($isd(z))
{l.style.zIndex=z;}
r=l.style.zIndex;}
return r;},setPosition:function(l,p)
{if(l)
{var mX=$ts(p.x),mY=$ts(p.y),s=l.style,pX=mX.match("%")?null:mX,pY=mY.match("%")?null:mY;if(pX===null||pX=="null")
{}
else if(pX||$isn(p.x))
{s.left=pX+'px';}
else
{s.left=p.x;}
if(pY===null||pY=="null")
{}
else if(pY||$isn(p.y))
{s.top=pY+'px';}
else
{s.top=p.y;}
if(p.z===null)
{}
else if($isd(p.z)&&$isn(p.z))
{s.zIndex=p.z;}}},opacity:function(l,v)
{var op,s=l.style;if($isd(v))
{v=($isn(v)&&v>=0&&v<=100)?v:100;}
if($isd(s.opacity))
{if($isd(v))
{s.opacity=(v/100);op=v;}}
else if($isd(s.filter))
{if($isd(v))
{s.filter="alpha(opacity="+(v)+")";}
if(s&&s.filters&&l.filters.alpha&&$isd(l.filters.alpha.opacity))
{op=l.filters.alpha.opacity;}
else
{op=100;}}
else if($isd(s.MozOpacity))
{if($isd(v))
{s.MozOpacity=(v/100);}
op=s.MozOpacity*100;}
else if($isd(s.KhtmlOpacity))
{if($isd(v))
{s.KhtmlOpacity=v;}
op=s.KhtmlOpacity;}
return op;},display:function(l,v,s)
{if($iss(l))
{l=$g(l);}
if(l&&l.style)
{if(s)
{l.style.visibility=(v)?"visible":"hidden";}
else
{s=(v)?"":"none";if(l.style.display!=s)
{l.style.display=s;}}}}};$h=SS.geom.height;$w=SS.geom.width;$l=SS.geom.left;$op=SS.geom.opacity;$t=SS.geom.top;$xyz=SS.geom.getXYZ;$sxyz=SS.geom.setPosition;$v=SS.geom.display;$x=$l;$y=$t;$z=SS.geom.zIndex;function $dbsl()
{var b=document.body,l=null;if(b)
{l=b.scrollLeft;}
return l;}
function $dbst()
{var b=document.body,t=null;if(b)
{t=b.scrollTop||b.parentNode.scrollTop;}
return t;}
function $dbd()
{var x=0,y=0,w=window,b=document.body,d=document.documentElement;if(w&&w.innerWidth)
{x=w.innerWidth;y=w.innerHeight;}
else if(d&&d.clientWidth)
{x=d.clientWidth;y=d.clientHeight;}
else if(b&&b.clientWidth)
{x=b.clientWidth;y=b.clientHeight;}
return{w:x,h:y};}
SS.coord=function(x,y,z,w,h)
{this.x=$isd(x)?x:0;this.y=$isd(y)?y:0;this.z=$isd(z)?z:0;this.w=$isd(w)?w:0;this.h=$isd(h)?h:0;};
SS.net={dls:[],getRequest:function(y)
{var r,h='XMLHTTP',i,p='Msxml2.'+h,x=[p+'.5.0',p+'.4.0',p+'.3.0',p,'Microsoft.'+h];if(y)
{r=new ActiveXObject(y);}
else if(window.XMLHttpRequest)
{r=new XMLHttpRequest();}
else
{for(i=0;i<5&&!r;i++)
{try
{r=new ActiveXObject(x[i]);}
catch(e)
{}}}
return r;},load:function(url,param,onload,onerror,ontimeout,timeout,nocache,loadId,loadImageId,title,type)
{if($iso(url))
{param=param?param:url.param;onload=onload?onload:url.onload;onerror=onerror?onerror:url.onerror;ontimeout=ontimeout?ontimeout:url.ontimeout;timeout=timeout?timeout:url.timeout;nocache=nocache?nocache:url.nocache;loadId=loadId?loadId:url.loadId;loadImageId=loadImageId?loadImageId:url.loadImageId;type=type?type:url.type;url=url.url;}
if($isu(nocache))
{nocache=1;}
if($iss(url)&&$psb(nocache))
{url+=((url.indexOf("?")<0)?"?":"&")+$rand(9999999);}
var t=this,r,i,d,n=t.dls.length;for(i=0;i<n&&!type;i++)
{d=t.dls[i];if(d.req.readyState==4)
{r=d;break;}}
if(!r)
{r=new SS.net.requestor(url,param,onload,onerror,ontimeout,timeout,loadId,loadImageId,title,type);SS.net.dls.add(r);}
else
{r.reinit(url,param,onload,onerror,ontimeout,timeout,loadId,loadImageId,title,type);}
if(r)
{r.execute();}},requestor:function(url,param,onload,onerror,ontimeout,timeout,loadId,loadImageId,title,type)
{this.id=(loadId)?loadId:$nid();this.loadimageid=(loadImageId)?loadImageId:"";this.url=url;this.req=null;this.onerror=(onerror)?onerror:null;this.onload=(onload)?onload:null;this.ontimeout=(ontimeout)?ontimeout:null;this.param=(param)?param:null;this._tId=0;this.async=true;this.timeout=(timeout)?timeout:30;this.title=$ts(title);this.type=(type)?type:null;},active:function()
{var i,d,r;for(i=0;i<$ln(this.dls);i++)
{d=this.dls[i];if(d.req.readyState!=4)
{if(!r)
{r=[];}
r.add(d);}}
return r;}};SS.net.requestor.prototype={reinit:function(url,param,onload,onerror,ontimeout,timeout,loadId,loadImageId,title,type)
{var t=this;t.id=(loadId)?loadId:t.id;t.loadimageid=(loadImageId)?loadImageId:"";t.url=url;t.req=null;t.onerror=(onerror)?onerror:null;t.onload=(onload)?onload:null;t.ontimeout=(ontimeout)?ontimeout:null;t.param=(param)?param:null;t._tId=0;t.async=true;t.timeout=(timeout)?timeout:30;t.title=$ts(title);t.type=(type)?type:null;},execute:function()
{var t=this,p;if(typeof t.url!="string")
{t.req={responseXML:t.url,responseText:typeof XMLSerializer!="undefined"?new XMLSerializer().serializeToString(t.url):t.url.xml};$ef(t.onload,t);}
else
{t.req=SS.net.getRequest(t.type);if(t.req)
{try
{$v(t.loadimageid,1);if(t.param)
{if($iss(t.param)&&$gg)
{t.param=$ggv(t.param);}
p=t.p2s(t.param);}
t._tId=$si(function(){t.timedOut.call(t);},t.timeout*1000);t.req.onreadystatechange=function()
{t.stateChanged.call(t);};if(typeof t.req.open!="undefined")
{t.req.open(((p)?"POST":"GET"),t.url,t.async);if(p)
{t.req.setRequestHeader("Content-Type","application/x-www-form-urlencoded");}
t.req.send(p);}
else if(typeof t.req.load!="undefined")
{t.req.async=t.async;t.req.load(t.url);}
if(!t.async)
{$ci(t._tId);$ef(t.onload,t);}}
catch(x)
{$ef(t.onerror,t,x);}}
else
{$ef(t.onerror,t);}}},stateChanged:function()
{var t=this,d=t._tId,s;if(d&&!t.hasTimedOut())
{if(t.req.readyState==4)
{$v(t.loadimageid,0);$ci(d);t._tId=0;try
{if(typeof t.req.status!="undefined")
{s=t.req.status;}
else
{s=200;}}
catch(x){s=-1;}
if(s>=200&&s<300)
{$ef(t.onload,t);}
else
{$ef(t.onerror,t);}}}},hasTimedOut:function()
{return this._tId<0;},timedOut:function()
{var t=this,i=t._tId;if(i)
{$ci(i);t._tId=-1;t.req.abort();}
$v(t.loadimageid,0);$ef(t.ontimeout,t);$ef(t.onerror,t);},p2s:function(p,f)
{var s="",k,u=encodeURIComponent;for(k in p)
{if($isd(p[k])&&(!$isf(p[k])))
{s+=((s==="")?"":"&")+u(($ise(f)?"":f+".")+k)+"="+u(p[k]).replace(/\+/g,"%2b");if($iso(p[k]))
{s+="&"+this.p2s(p[k],($ise(f)?"":f+".")+k);}}}
return s;}};var $load=function(url,param,onload,onerror,ontimeout,timeout,nocache,loadImageId,loadId,title,type)
{SS.net.load.call(SS.net,url,param,onload,onerror,ontimeout,timeout,nocache,loadId,loadImageId,title,type);};var $xload=function(xml,xsl,param,onload,onerror,ontimeout,timeout,nocache,element,loadImageId,loadId,title)
{if($iss(xml))
{xml={xml:xml,xsl:xsl,xmlparam:param,onload:onload,onerror:onerror,ontimeout:ontimeout,timeout:timeout,nocache:nocache,loadImageId:loadImageId,id:loadId,title:title,element:element};}
$load({url:xml.xml,param:xml.xmlparam,onload:function()
{var r=this.req,rx=r.responseXML;$load({url:xml.xsl,param:xml.xslparam,onload:function()
{var l=xml.element?xml.element:document.body,p,d,r=this.req,s=r.responseXML,h,k;if($iss(l))
{l=$g(l);}
if((l&&$uc(l.tagName)=="IFRAME"))
{l=l.contentWindow.document.body;}
if(window.ActiveXObject)
{try
{if(xml.xsltparam)
{var xd=new ActiveXObject("MSXML2.FreeThreadedDomDocument");xd.validateOnParse=false;xd.loadXML(r.responseText);var xc=new ActiveXObject("MSXML2.XSLTemplate");xc.stylesheet=xd.documentElement;var xp=xc.createProcessor();xp.input=rx;for(k in xml.xsltparam)
{if(!$isf(xml.xsltparam[k]))
{xp.addParameter(k,xml.xsltparam[k]);}}
xp.transform();h=xp.output;}
else
{h=rx.transformNode(s);}
if($psb(xml.xslcharesc))
{h=h.replace(/&amp;/g,"&");h=h.replace(/&gt;/g,">");h=h.replace(/&lt;/g,"<");}
l.innerHTML=h;}
catch(x){$error(x,"$xload");}}
else
{try
{p=new XSLTProcessor();p.importStylesheet(s);if(xml.xsltparam)
{for(k in xml.xsltparam)
{if(!$isf(xml.xsltparam[k]))
{p.setParameter("",k,xml.xsltparam[k]);}}}
d=p.transformToFragment(rx,document);$dc(l);$ac(l,d);if($psb(xml.xslcharesc))
{h=l.innerHTML;h=h.replace(/&amp;/g,"&");h=h.replace(/&amp;/g,"&");h=h.replace(/&gt;/g,">");h=h.replace(/&lt;/g,"<");l.innerHTML=h;}}
catch(y){$error(y,"$xload");}}
$ef(xml.xslonload,r);$ef(xml.onload,r);},onerror:function(){$ef(xml.xslonerror,this.req);$ef(xml.onerror,this.req);},ontimeout:function(){$ef(xml.xslontimeout,this.req);$ef(xml.ontimeout,this.req);},timeout:xml.xsltimeout?xml.xsltimeout:xml.timeout,nocache:xml.xslnocache?xml.xslnocache:xml.nocache,loadImageId:xml.xslloadimageid?xml.xslloadimageid:xml.loadimageid,loadId:xml.xslid?xml.xslid:xml.id,title:xml.xsltitle?xml.xsltitle:xml.title});$ef(xml.xmlonload,r);},onerror:function(){$ef(xml.xmlonerror,this.req);$ef(xml.onerror,this.req);},ontimeout:function(){$ef(xml.xmlontimeout,this.req);$ef(xml.ontimeout,this.req);},timeout:xml.xmltimeout?xml.xmltimeout:xml.timeout,nocache:xml.xmlnocache?xml.xmlnocache:xml.nocache,loadImageId:xml.xmlloadimageid?xml.xmlloadimageid:xml.loadImageId,loadId:xml.xmlid?xml.xmlid:xml.id,title:xml.xmltitle?xml.xmltitle:xml.title});};
SS.control.searchbox=function()
{var p="SS_control_searchbox_";this.id="";this.idtb="";this.css="";this.css_list=p+"list";this.css_match=p+"match";this.css_highlight=p+"highlight";this.css_listitem=p+"listitem";this.datasource="";this.src="";this.srcparam="v";this.postvalue=0;this.cache=1;this.cacheresults=1;this.data=[];this.demlimiter="\n";this.value="";this.delay=350;this.matchmode=0;this.casesensitive=0;this.minchars=3;this.selectedvalue=null;this.selectedtext=null;this.selectedindex=-1;this.maxresults=25;this.visibleitems=6;this.linkto="";this.onchange=null;this.onresults=null;this.onlistshow=null;this.onlisthide=null;this.xpath_nodes="list";this.xnode_name="item";this.xnode_title="text";this.xnode_value="value";this._k=0;this._o=null;this._tid=0;};SS.control.searchbox.prototype={render:function()
{var t=this,l=$g(t.id),tb,hd=$c(),ap,nd=$c(),n,s;if(l)
{$dc(l);if(l.nodeName=="INPUT"||l.tagName=="TEXTAREA")
{ap=l.parentNode;tb=l;$cl(tb,t.css);s=tb.nextSibling;$rc(ap,tb);$ac(nd,tb);ap.insertBefore(nd,s);t.idtb=tb.id;t.id=nd.id;l=nd;tb.onchange=null;}
else
{l.onchange=null;tb=$c("input",t.css);tb.type="text";t.idtb=t.id+"_t";tb.id=t.idtb;}
$sa(tb,"autocomplete","off");tb.onkeydown=function(e)
{var c=$cc(e);if(c==8||c==9||c==13||c==38||c==40)
{if(c>9)
{t._k=$st(function(){t._k=0;},9);}
return tb.onkeypress.call(this,e,1);}};tb.onkeypress=function(e,o)
{if(!t._k||o)
{t.selectedvalue=null;t.selectedtext=null;var v=t.value,c=$cc(e),p=null,s=t.datasource||t.src,l=$ln(v),tb=$g(t.idtb);if(c==8&&l)
{t._tid=$st(function()
{var tb=$g(t.idtb);t.value=tb.value;if($ln(t.value)>=t.minchars)
{t.search.call(t);}},t.delay);}
else if(c>=37&&c<=40)
{if(c==38)
{t.selectedindex--;}
else if(c==40)
{t.selectedindex++;}}
else if(c==9)
{}
else if(c==13)
{$ct(t._tid);$ec(e);}
else
{v=tb.value+String.fromCharCode(c);t.value=v;$ct(t._tid);}
if($ln(v)>=t.minchars)
{if(c==38||c==40||c==9||c==13)
{return t.search.call(t,c,e);}
else if($iss(s))
{if(t.postvalue)
{p={};p[t.idtb]=t.value;}
else
{s=$upa(s,t.srcparam,$esc(t.value));}
t._tid=$st(function(){$load(s,p,function(){t.dataload.call(t,this.req);},function(){$error("error");},function(){$error("timeout");},this.timeout,!t.cache);},t.delay);}
else
{t._tid=$st(function(){t.search.call(t);},t.delay);}}
else
{t.clear();return true;}}
else
{$ec(e);return false;}};if(!$ise(t.linkto))
{tb.onblur=function()
{var v=this.value,i,m,k,d,l=$g(t.linkto);if(l&&t._o&&$isa(t._o)&&$ln(v)>0)
{for(i=0;i<t._o.length;i++)
{d=t._o[i];if(d&&$iso(d))
{for(k in d)
{if(!$isf(d[k]))
{var kl=k,dl=d[k],mm=t.matchmode;if(!t.casesensitive)
{v=$lc(v);kl=$lc(k);dl=$lc(dl);}
if((kl==v&&mm!=1)||(dl==v&&mm!==0)||mm==3)
{m=1;l.value=dl;}}}}}
if(!m)
{l.value="";}}
else if(l)
{l.value="";}};}
$ac(hd,tb);$ac(l,hd);$ea("onclick",function(){t.clear();});}},dataload:function(dl)
{var t=this,i,o,w,p=t.xpath_nodes,pn=t.xnode_name,pt=t.xnode_title,pv=t.xnode_value,x,a;t.data=[];t.selectedindex=-1;if(dl)
{if(dl.getResponseHeader("content-type").match(/text\/xml/i))
{x=$x2o(dl.responseXML);if(x&&!$ise(p)&&(!($ise(pn)&&$ise(pt)&&$ise(pv))))
{p=p.split(/\.|\\/);p.add(t.xnode_name);w=x;for(i=0;w&&i<p.length;i++)
{w=w[p[i]];}
w=$ta(w);if(w)
{for(i=0;i<$ln(w);i++)
{a=w[i];if(a)
{o={};if($isd(a[pt])&&$isd(a[pv]))
{o[a[pt]]=a[pv];}
t.data.add(o);}}}
t.search();}}
else if(dl.responseText)
{li=dl.responseText.split(/\n/);if($ln(li))
{for(i=0;i<$ln(li);i++)
{o={};o[li[i]]=li[i];t.data.add(o);}
t.search();}}}},search:function(c,e)
{var t=this,v=t.value,i,k,d;if(c==38||c==40)
{}
else
{$ct(t._tid);t._tid=null;t._o=[];if(t.data&&$isa(t.data)&&$ln(v))
{for(i=0;i<t.data.length;i++)
{d=t.data[i];if(d&&$iso(d))
{for(k in d)
{if(!$isf(d[k]))
{var kl=k,dl=d[k],mm=t.matchmode;if(!t.casesensitive)
{v=$lc(v);kl=$lc(k);dl=$lc(dl);}
if((kl.indexOf(v)>=0&&mm!=1)||(dl.indexOf(v)>=0&&mm!==0)||mm==3)
{t._o.add(d);}}}}}}}
if($isa(t._o))
{return t.output(c,e);}},output:function(c,e)
{var t=this,pn=$g(t.id),lid=t.id+"_l",l=$g(lid),tb=$g(t.idtb),i,n,vi=t.visibleitems,mr=t.maxresults,r=0,o=t._o,k;if(pn)
{if(l)
{$d(l);}
l=$c();l.id=lid;l.style.overflow="hidden";$ac(pn,l);i=t.selectedindex;if(!o||($ln(o)<=0))
{$v(l,0);}
else if(l&&l.appendChild)
{n=t._o.length;if(i>=n||(mr&&i>=mr))
{i=n-1;}
else if(i<-1)
{i=-1;}
else if(c==9||c==13)
{if(n==1)
{i=0;}
$ct(t._tid);for(k in t._o[i])
{if(!$isf(t._o[i][k]))
{t.selectedtext=k;t.selectedvalue=o[i][k];$g(t.idtb).value=k;if(t.linkto)
{var vf=$g(t.linkto);if(vf)
{vf.value=o[i][k];}}}}
$ef(t.onchange,$g(t.idtb),e);t.data=null;}
else
{var ic=0,eh,ph,p,d=$xyz(tb);$cl(l,t.css_list);$w(l,d.w);$t(l,d.y+d.h);$l(l,d.x);$rp(l);$ac(document.body,l);var ltoc=function(e)
{$ct(t._tid);var x=$ga(this,"dt"),v=$ga(this,"dv"),tb=$g(t.idtb),vf;t.selectedtext=x;t.selectedvalue=v;tb.value=x;t.value=x;tb.focus();t.clear();if(t.linkto)
{vf=$g(t.linkto);if(vf)
{vf.value=v;}}
$ef(t.onchange,$g(t.idtb),e);};var ltomf=function()
{this.className+=" SS_control_searchbox_highlight";};var ltomb=function()
{this.className=this.className.replace(/(\s+)SS_control_searchbox_highlight/,"");};for(p=0;p<n&&p<t.maxresults;p++)
{var lt=$c();for(k in t._o[p])
{if(!$isf(t._o[p][k]))
{var rx=new RegExp(t.value,"i"),rr=new RegExp(t.value,"gi");lt.innerHTML=k.replace(rr,"<span class='"+t.css_match+"'>"+k.match(rx)+"</span>");$sa(lt,"dt",k);$sa(lt,"dv",t._o[p][k]);lt.onclick=ltoc;}}
if(p==i)
{$cl(lt,t.css_highlight);}
else{$cl(lt,t.css_listitem);}
ic++;if(ic>vi&&!eh)
{eh=$h(l);$h(l,eh);l.style.overflow="auto";ph=$rnd(eh/vi);}
lt.onmouseover=ltomf;lt.onmouseout=ltomb;$ac(l,lt);}
$v(l,1);$ef(t.onlistshow,$g(t.idtb),e);if(ph&&(i*ph>=eh))
{l.scrollTop=i*ph;}}}
t.selectedindex=i;$ef(t.onresults,t,e);}
if(c==9)
{r=1;}
else if(c==13&&!r)
{r=1;}
return $psb(r);},clear:function()
{$d($g(this.id+"_l"));$ef(this.onlisthide,$g(this.idtb),null);},set:function(a,v)
{if(a&&!a.match(/^\_/)&&$isd(this[a]))
{this[a]=v;$sa($g(this.id),a,v);}}};
SS.control.calendar=function()
{this.id="";this.selecteddate=new Date();this.visiblemonth=new Date();this.dayformat="1";this.monthformat="full";this.localecode="";this.onchange="";this.onvisiblemonthchange="";var p="SS_control_calendar",m=p+"_daysmonth",n=p+"_title";this.css=p;this.css_title=n;this.css_titledays=n+"days";this.css_selecteddate=p+"_selecteddate";this.css_weekend=p+"_weekend";this.css_disabled=p+"_disabled";this.css_daysmonth=m;this.css_daysmonthlast=m+"last";this.css_daysmonthnext=m+"next";this.css_navigate=p+"_navigate";this.sundaylast=1;this.sevenweek=0;this.linkto="";this.linktoformat="";this.height="";this.width="";this.visible=1;this.keys=0;this.scroll=1;this.datemin="";this.datemax="";this._idt="";this._idh="";this._idb="";this._f="yyyy/MM/dd";this._i=1;};SS.control.calendar.prototype={render:function()
{var t=this,l=$g(t.id),i,dd,dm,r,pd=SS.datetime.fromString,fd=SS.datetime.format,lc=SS.global.locale,k=$g(t.linkto),v,f=t.linktoformat,tc=t.localecode,mi,mx;if(l)
{if($lc(t.localecode)!=="")
{lc=new SS.locale(tc);}
if(!f)
{f=lc.dateformat;t.linktoformat=f;}
mi=pd(t.datemin,f);mx=pd(t.datemax,f);if(t._i&&k)
{v=k.value;if($ise(v))
{t.selecteddate=new Date();t.visiblemonth=new Date();}
else
{t.selecteddate=pd(v,f);t.visiblemonth=pd(v,f);}
$sa($g(t.id),"date",fd(t.selecteddate,t._f));if(!k.onchange)
{k.onchange=function(e)
{var l=this,s=SS.datetime,pd=s.fromString,fd=s.format,f=t.linktoformat,d,v=l.value;if(v)
{d=pd(v,f);if(!d)
{d=new Date();}
t.selecteddate=d;t.visiblemonth=new Date(d);l.value=fd(t.selecteddate,f);}
else
{t.selecteddate=new Date();t.visiblemonth=new Date();}
$sa($g(t.id),"date",fd(t.selecteddate,t._f));$ef(t.onvisiblemonthchange,t,e);$ef(t.onchange,t,e);t.render();};if(t.keys)
{k.onkeydown=function(e)
{e=$e(e);var c=$cc(e),d;if(c)
{if(c==13)
{d=0;$ec(e);}
if(c==37)
{d=-1;}
if(c==38)
{d=-7;}
if(c==39)
{d=1;}
if(c==40)
{d=7;}
if($isd(d))
{t.dayChange(d);}}};}}}
var c=$g(t._idt)||$c("table"),th=$g(t._idh)||$c("thead"),tb=$g(t._idb)||$c("tbody"),sl=$psb(t.sundaylast)?1:0,df=t.dayformat,mf=t.monthformat;$cl(c,t.css);c.cellPadding=0;c.cellSpacing=0;if(t.height)
{$h(l,t.height);}
if(t.width)
{$w(l,t.width);}
dd=lc.days;if(df=="1")
{dd=lc.days_letter;}
if(df=="2")
{dd=lc.days_abrv2;}
if(df=="3")
{dd=lc.days_abrv3;}
dd=dd.copy();dm=lc.months;if(mf=="1")
{dm=lc.months_letter;}
if(mf=="2")
{dm=lc.months_abrv2;}
if(mf=="3")
{dm=lc.months_abrv3;}
dm=dm.copy();var sc=t.selecteddate,vc=t.visiblemonth,h1=$cn(th)[0]||$c("tr"),h2=$cn(th)[1]||$c("tr"),h1c1=$cn(h1)[0]||$c("th"),h1c2=$cn(h1)[1]||$c("th"),h1c3=$cn(h1)[2]||$c("th"),nb=$c(),nf=$c(),cl;if(!sc)
{sc=new Date();}
if(!vc)
{vc=new Date();}
if($iss(sc))
{sc=pd(sc);t.selecteddate=sc;}
if($iss(vc))
{vc=pd(vc);t.visiblemonth=vc;}
if(sl)
{dd.push(dd[0]);dd.shift();}
for(i=0;i<7;i++)
{cl=$cn(h2)[i]||$c("td");cl.innerHTML=dd[i];if(t._i)
{$ac(h2,cl);}}
if(t._i)
{t._idt=c.id;t._idh=th.id;t._idb=tb.id;$ac(nb,$ctn("<<"));h1c1.onclick=function(e)
{t.visiblemonthchange.call(t,-1);return $ec(e);};$ac(nf,$ctn(">>"));h1c3.onclick=function(e)
{t.visiblemonthchange.call(t,1);return $ec(e);};h1c2.colSpan=5;$cl(nb,t.css_navigate);$cl(h1c2,t.css_title);$cl(nf,t.css_navigate);$cl(h2,t.css_titledays);$ac(h1c1,nb);$ac(h1c3,nf);$ac(h1,h1c1);$ac(h1,h1c2);$ac(h1,h1c3);$ac(th,h1);$ac(th,h2);$ac(c,th);}
h1c2.innerHTML=fd(vc,"MMMM yyyy",lc);var sy=sc.getFullYear(),sm=sc.getMonth(),sd=sc.getDate(),vy=vc.getFullYear(),vm=vc.getMonth(),w;var sp=0,sv,z=1,s=new Date(vy,vm,-1*new Date(vy,vm,1).getDay()+sl);if($psb(t.sevenweek))
{sv=7;s=s.add(-7,"d");}
else
{sv=6;}
var uoc=function(e)
{t.setDate(SS.datetime.fromString($ga(this,"date")),e);};for(r=0;r<sv;r++)
{w=$cn(tb)[r]||$c("tr");for(i=0;i<7;i++)
{s=s.add(1,"d");if(z&&(s.getDate()==1||s.getDate()==2))
{s=s.add(-7,"d");}
z=0;var py=s.getFullYear(),pm=s.getMonth(),pdt=s.getDate(),u=$cn(w)[i]||$c("td"),cn=t.css_daysmonth;if(pm<vm)
{cn+=" "+t.css_daysmonthlast;}
if(pm>vm)
{cn+=" "+t.css_daysmonthnext;}
if(py==sy&&pm==sm&&pdt==sd)
{cn+=" "+t.css_selecteddate;}
else if((i>4&&sl)||(!sl&&(i===0||i==6)))
{cn+=" "+t.css_weekend;}
u.innerHTML=fd(s,"dd");u.onclick=uoc;if((mi&&s<mi)||(mx&&s>mx))
{cn+=" "+t.css_disabled;u.onclick="";}
$sa(u,"date",fd(s,t._f));$cl(u,cn);if(t._i)
{$ac(w,u);}}
if(t._i)
{$ac(tb,w);}}
$ac(c,tb);$ac(l,c);if($psb(t.scroll)&&t._i)
{$ea("onmousewheel",function(e)
{var p=$xyz($g(t.id)),x=e.dX,y=e.dY;if(x>=p.x&&x<=(p.x+p.w)&&y>=p.y&&y<(p.y+p.h))
{t.visiblemonthchange.call(t,e.delta,e);$ec(e);return false;}});}
$v(l,t.visible);t._i=0;}},visiblemonthchange:function(d,e)
{var t=this;t.visiblemonth=t.visiblemonth.add(d,"mo");t.render();$ef(t.onvisiblemonthchange,t,e);},dayChange:function(d)
{this.setDate(this.selecteddate.add(d,"d"));},setDate:function(d,e)
{var t=this,df=SS.datetime.format,k=$g(t.linkto);if(d)
{t.selecteddate=d;t.visiblemonth=new Date(d);}
else
{t.selecteddate=new Date();t.visiblemonth=new Date();}
$sa($g(t.id),"date",df(t.selecteddate,t._f));if(k)
{k.value=df(d,t.linktoformat);try
{$ef(k.onchange,k,e);}
catch(x){}}
else
{t.render();}
$ef(t.onvisiblemonthchange,t,e);$ef(t.onchange,t,e);},setLocaleCode:function(ul)
{var t=this,l,f,c;if(!$ise(ul))
{l=$g(t.id);t.localecode=ul;$sa(l,"localecode",ul);c=new SS.locale(ul);f=c.dateformat;t.linktoformat=f;$sa(l,"linktoformat",f);}
t.render();},display:function(d)
{this.visible=d;this.render();},show:function()
{this.display(1);},hide:function()
{this.display(0);}};
SS.control.moveable=function()
{this.id="";this.onmousedown="";this.onmouseup="";this.onmousemove="";this.moving=0;this.movedelay=0;this.cursor_over="pointer";this.cursor_move="move";this.direction="xy";this._m=null;this._u=null;this._s=null;this._b=null;this._p=null;this._d=null;this.cssText="";this.oX=0;this.oY=0;this.sX=0;this.sY=0;this.detach=0;this.anytype=0;};SS.control.moveable.prototype={render:function()
{var t=this,l=$g(t.id);if(l)
{l.onmousedown=function(e)
{t._d=$st(function(){t._d=0;},t.movedelay);e=$e(e);var p,l=this,g=e.srcElement||e.target;if($psb(t.anytype)||!$iln("input,select,textarea",g.tagName))
{if(!t.cssText)
{t.cssText=l.style.cssText;}
l.style.zIndex=32000;t.MouseDown.call(t,e,l);l.style.position="absolute";if(t.detach)
{t._p=l.parentNode;t._b=l.nextSibling;$rc(t._p,l);$ac(document.body,l);}
p=$xyz(l);p.x=$n(e.dX-t.oX);p.y=$n(e.dY-t.oY);$sxyz(l,p);}
return $ec(e);};l.onmouseup=function(e)
{var l=this;if(t.cssText)
{this.style.cssText=t.cssText;t.cssText=null;}
t.MouseUp.call(t,e,this);if(t.detach)
{$st(function()
{try
{$rc(document.body,l);if(t._p)
{t._p.insertBefore(l,t._b);}}
catch(x)
{}},1);}};l.style.cursor=t.cursor_over;}},MouseDown:function(e,l,es)
{if(l)
{e=$e(e);var t=this,p=$xyz(l),lp=l.parentNode,sl=0,st=0;t.sX=0;t.sY=0;while(lp)
{if(!isNaN(lp.scrollLeft))
{sl+=$n(lp.scrollLeft);}
if(!isNaN(lp.scrollTop))
{st+=$n(lp.scrollTop);}
lp=lp.parentNode;}
if(!es)
{t.sX+=$dbsl();t.sY+=$dbst();}
t.oX=e.clientX-p.x+sl;t.oY=e.clientY-p.y+st;t._m=$ea("onmousemove",function(e){t.MouseMove.call(t,e);});t._u=$ea("onmouseup",function(e){t.MouseUp.call(t,e);});t._s=$ea("onscroll",function(e){t.Scroll.call(t,e);});t.moving=1;if(l)
{l.style.cursor=t.cursor_move;l.onselectstart=function(e){$ec(e);return false;};}
$ef(t.onmousedown,t,e);}},MouseMove:function(e)
{var t=this,l,d=$lc(t.direction);if(t._m&&!t._d)
{e=$e(e);l=$g(t.id);if(l)
{$sxyz(l,new SS.coord((d=="xy"||d=="x")?(e.clientX-t.oX+t.sX):null,(d=="xy"||d=="y")?(e.clientY-t.oY+t.sY):null,$n(l.style.zIndex)));}
$ef(t.onmousemove,t,e);}},MouseUp:function(e,l)
{e=$e(e);var t=this;t.moving=0;$erid(t._m);t._m=null;$erid(t._u);t._u=null;$erid(t._s);t._s=null;if(l)
{l.style.cursor=t.cursor_over;l.onselectstart=null;}
$ef(t.onmouseup,t,e);},Scroll:function()
{this.sX=$dbsl();this.sY=$dbst();}};
SS.control.dropzone=function()
{this.id="";this.lastDropped=null;this.inFoucs=null;this.onfocus="";this.onblur="";this.ondrop="";this.onleave="";this.lastParent=null;this.lastNextSibling=null;};SS.control.dropzone.prototype={render:function()
{var t=this,l=$g(t.id),v=SS.events;if(l)
{v.dzr(t);v.add("onresize",function(e){v.dzr(t);});l.onresize=function(e){v.dzr(t);};}},DragFocus:function(e,c)
{var t=this;t.inFocus=c;$ef(t.onfocus,t,e);},DragBlur:function(e,c)
{var t=this;t.inFocus=null;$ef(t.onblur,t,e);},DragDrop:function(e,c)
{var t=this;t.lastDropped=c;t.inFocus=null;if(c)
{var l=$g(c.id),d=$g(t.id),pn;if(l&&d)
{pn=l.parentNode;t.lastNextSibling=l.nextSibling;t.lastParent=pn;$rc(pn,l);$ac(d,l);}}
$ef(t.ondrop,t,e);},DragLeave:function(e,c)
{$ef(this.onleave,this,e);},cancelDrop:function()
{var t=this,l;if(t.lastDropped&&t.lastParent)
{l=$g(t.lastDropped.id);if(l)
{$rc(l.parentNode,l);t.lastParent.insertBefore(l,t.lastNextSibling);}}}};
SS.control.slider=function()
{this.id="";this.onclick="";this.onchange="";this.css="";this.css_pick="";this.css_bar="";this.orientation="horizontal";this.minvalue=0;this.maxvalue=100;this.value=0;this.pickwidth="auto";this.pickheight="auto";this.pickalign="center";this.linkto="";this._m=0;this._st=0;this._x=0;this._y=0;this._sc=1;this._ic="";this._ib="";this._ip="";this._s="";};SS.control.slider.prototype={render:function()
{var t=this,l=$g(t.id);if(l)
{$dc(l);var cn=$c(),br=$c(),pk=$c(),p="SS_control_slider",f;cn.onselectstart=function(e){$ec(e);return false;};if(t.linkto)
{f=$g(t.linkto);if(f)
{t.value=f.value;f.onchange=function(e)
{t.value=this.value;t.move.call(t,e,1);};}}
$cl(cn,p+" "+t.css);$cl(br,p+"_bar"+" "+t.css_bar);$cl(pk,p+"_pick"+" "+t.css_pick);t._ic=cn.id;t._ib=br.id;t._ip=pk.id;$w(br,"100%");$h(br,"100%");br.style.position="relative";pk.style.position="absolute";$w(pk,t.pickwidth);$h(pk,t.pickheight);pk.style.zIndex=br.style.zIndex+1;pk.style.top="0px";pk.onmousedown=function(e)
{e=$e(e);var p=$xyz(this);t._x=e.clientX-p.x+$dbsl();t._y=e.clientY-p.y+$dbst();t._m=$ea("onmousemove",function(e){if(t._m){t.move.call(t,e);}$ec(e);});t._st=$ea("onmouseup",function(e){t.mouseup.call(t,e);});$ec(e);};pk.onmouseup=function(e)
{return t.mouseup.call(t,e);};br.onclick=function(e)
{t.move.call(t,e);};if(!$ise(t.onclick))
{pk.onclick=function(e)
{$ef(t.onclick,t,e);$ec(e);};}
$ac(cn,br);$ac(br,pk);$ac(l,cn);if($psb(t._sc)&&$ise(t._s))
{t._s=$ea("onmousewheel",function(e)
{var p=$xyz($g(t.id)),x=e.dX,y=e.dY;if(x>=p.x&&x<=(p.x+p.w)&&y>=p.y&&y<(p.y+p.h))
{t.value=$n(t.value)+e.delta;t.move.call(t,e,1);$ec(e);return false;}});}
t.move(window.event,1);}
$sa(l,"value",t.value);},move:function(e,u)
{e=$e(e);var t=this,l=$g(t.id),pk=$g(t._ip),br=$g(t._ib),brp=$xyz(br),pd=0,pw,ph,bw=$w(br),bh=$h(br),ov=t.value,pp,pu,f=$g(t.linkto),pa=$lc(t.pickalign);if(t.orientation=="vertical")
{if($lc(t.pickheight)=="auto")
{if(pu>8)
{$h(pk,$rnd(pu));}
else
{$h(pk,8);}}
if($lc(t.pickwidth)=="auto")
{$w(pk,"100%");}
ph=$h(pk);if(pa=="left")
{pd=ph;}
if(pa=="center")
{pd=ph/2;}
pu=bh/(t.maxvalue-t.minvalue);if(!u)
{pp=e.clientY-t._y-brp.y-$dbst();t.value=$rnd(((pp+pd)/pu)+$n(t.minvalue));}
if($n(t.value)<$n(t.minvalue))
{t.value=t.minvalue;}
if($n(t.value)>$n(t.maxvalue))
{t.value=t.maxvalue;}
$sxyz(pk,new SS.coord(null,$rnd(((t.value-t.minvalue)*pu)-pd)));}
else
{if($lc(t.pickwidth)=="auto")
{if(pu>8)
{$w(pk,$rnd(pu));}
else
{$w(pk,8);}}
if($lc(t.pickheight)=="auto")
{$h(pk,"100%");}
pw=$w(pk);if(pa=="left")
{pd=pw;}
if(pa=="center")
{pd=pw/2;}
pu=bw/(t.maxvalue-t.minvalue);if(!u)
{pp=e.clientX-t._x-brp.x-$dbsl();t.value=$rnd(((pp+pd)/pu)+$n(t.minvalue));}
if($n(t.value)<$n(t.minvalue))
{t.value=t.minvalue;}
if($n(t.value)>$n(t.maxvalue))
{t.value=t.maxvalue;}
$sxyz(pk,new SS.coord($rnd(((t.value-t.minvalue)*pu)-pd),null));}
if(f)
{f.value=t.value;}
$sa(l,"value",t.value);if(t.value!=ov||u)
{$ef(t.onchange,l,e);}},mouseup:function(e)
{var t=this;$erid(t._m);$erid(t._st);t._m=null;t._st=null;$ec(e);return false;}};
SS.control.window=function()
{this.id="";this.onclose="";this.onshow="";this.onhide="";this.onresize="";this.css="";this.css_title="";this.titlebar=1;this.button_close=1;this.button_max=0;this.button_min=0;this.title="";this.width="";this.height="";this.visible=1;this.resize=0;this.background=1;this.bgopacity=50;this._in="";this._ib="";this._ig="";};SS.control.window.prototype={render:function()
{var t=this,l=$g(t.id),m=new SS.control.moveable(),n=$c(),p="SS_control_window",pt=p+"_titlebutton",i,d,r=new SS.control.moveable(),g,c;if(!l)
{l=$c();l.id=t.id;$ac(document.body,l);}
m.id=l.id;m.render.call(m);l.onmouseup=function(e)
{if(r)
{r.MouseUp.call(r);}
m.MouseUp.call(m);$ec(e);};l.onscroll=function(e)
{if(r)
{r.MouseUp.call(r);}
m.MouseUp.call(m);};l.onselectstart=function(e)
{if(r)
{r.MouseUp.call(r);}
m.MouseUp.call(m);};$cl(l,p+" "+(t.css?t.css:""));if(t.height)
{$h(l,t.height);}
if(t.width)
{$w(l,t.width);}
if(!t._ib&&$psb(t.titlebar))
{b=$c();var bt=$c(),bc=$c(),tt=t.title,bx=$c(),bn=$c();t._ib=b.id;$cl(b,p+"_title "+(t.css_title?t.css_title:""));$cl(bt,p+"_titletext");bt.innerHTML=(tt)?tt:"";$ac(b,bt);if($psb(t.button_close))
{$cl(bc,p+"_titlebutton "+pt+"_close");bc.onmousedown=function(e)
{$ec(e);};bc.onmouseup=function()
{$cl(this,pt+" "+pt+"_close");};bc.onclick=function(e)
{t.hide.call(t);$ef(t.onclose,t,e);$ec(e);};bc.title="Close";$ac(b,bc);}
if($psb(t.button_max))
{$cl(bx,p+"_titlebutton "+pt+"_max");bx.onmousedown=function(e)
{$cl(this,pt+"_pressed "+pt+" "+pt+"_max");};bx.onmouseup=function()
{$cl(this,pt+" "+pt+"_max");t.size.call(t,$dbd().w-10,$dbd().h-10);};bx.onclick=function(e)
{$ec(e);};bx.title="Maximize";$ac(b,bx);}
if($psb(t.button_min))
{}
l.insertBefore(b,l.childNodes[0]?l.childNodes[0]:null);n.onmousedown=function(e)
{$ec(e);return true;};}
$ac(l,n);var ls=$gd(l),sl;var sf=function(e)
{if(r)
{r.MouseUp.call(r);}
m.MouseUp.call(m);};for(i=0;i<$ln(ls);i++)
{sl=ls[i];if($isd(sl.onscroll))
{sl.onscroll=sf;}}
if($psb($lc(t.resize)))
{d=$xyz(l);var nw=$c(),pd,nws=20;nw.className=p+"_pick_nwresize";$ac(n,nw);pd=$xyz(nw);pd.x=d.w-nws-1;pd.y=d.h-nws-1;$sxyz(nw,pd);r.id=nw.id;r.cursor_over="nw-resize";r.cursor_move="nw-resize";r.onmousemove=function(e)
{var l=$g(t.id),d=$xyz(l),x=e.dX,y=e.dY;if(d)
{$h(l,y-d.y+5);$w(l,x-d.x+5);}};r.onmouseup=function(e)
{var l=$g(t.id),nw=$g(this.id),pd=$xyz(nw),d=$xyz(l),nws=20;pd=$xyz(nw);pd.x=d.w-nws-1;pd.y=d.h-nws-1;$sxyz(nw,pd);if($isd(r.overflow))
{l.style.overflow=r.overflow;}};r.render();nw.onmousedown=function(e)
{var l=$g(t.id);r.overflow=l.style.overflow;l.style.overflow="hidden";r.MouseDown.call(r,e,$g(r.id));$ec(e);};nw.onmouseup=function(e)
{r.MouseUp.call(r,e,$g(r.id));$ec(e);};}
t._in=n.id;v=$ga(l,"visible");if($ise(v))
{v=1;}
if(!t._ig&&$psb(t.background))
{g=$c();t._ig=g.id;g.className=p+"_background";g.style.zIndex=1;$op(g,t.bgopacity);$w(g,$dbd().w+$dbsl());$h(g,$dbd().h+$dbst());$ac(document.body,$c());$ac(document.body,g);var _fbgrz=function()
{var g=$g(t._ig);if(g)
{$w(g,$dbd().w+$dbsl());$h(g,$dbd().h+$dbst());}};$ea("onresize",_fbgrz);$ea("onscroll",_fbgrz);}
t.display($psb(v));},display:function(v,e)
{var t=this,l=$g(t.id),b,d;if(l&&l.style)
{$v(l,v);d=$xyz(l);d.x=$rnd(($dbd().w-d.w)/2)+$dbsl();d.y=$rnd(($dbd().h-d.h)/2)+$dbst();d.z=null;if(!d.x||d.x<0)
{d.x=0;}
if(!d.y||d.y<0)
{d.y=0;}
$sxyz(l,d);}
if(t._ig)
{b=$g(t._ig);if(b)
{$v(b,v);$w(b,$dbd().w+$dbsl());$h(b,$dbd().h+$dbst());}}
t.visible=v;if(v)
{$ef(t.onshow,t,e);}
else
{$ef(t.onhide,t,e);}},show:function(e)
{this.display(1,e);},hide:function(e)
{this.display(0,e);},destroy:function()
{var t=this,l=$g(t.id),b;t.display(0);if(l)
{$d(l);}
if(t._ig)
{b=$g(t._ig);$d(b);}
t._in="";t._ig="";SS.global.controls.remove(t);},size:function(w,h)
{var t=this,l=$g(t.id),d;if(!$ise(w))
{t.width=w;$w(l,w);}
if(!$ise(h))
{t.height=h;$h(l,h);}
d=$xyz(l);d.x=$rnd(($dbd().w-d.w)/2)+$dbsl()-9;d.y=$rnd(($dbd().h-d.h)/2)+$dbst()-9;d.z=null;if(!d.x||d.x<0)
{d.x=0;}
if(!d.y||d.y<0)
{d.y=0;}
$sxyz(l,d);}};SS.msgboxparam=function()
{this.text="";this.title="";this.button=0;this.onclose=null;this.focus=true;this.attachElement=null;};function $msgbox(s,b,evc,t)
{var d,f,al,mb=new SS.control.window(al);if($iso(s))
{d=s.text;b=s.button;evc=s.onclose;t=s.title;f=s.focus;al=s.attachElement;}
else
{d=s;f=true;}
mb.id=$nid();mb.titlebar=1;mb.title=(t)?t:document.title+" Says:";mb.choice=null;mb.onclose=function(e)
{mb.choice=-1;$ef(evc,mb,e);mb.destroy.call(mb);mb=null;};mb.render(al);var w=$g(mb.id),n=$g(mb._in),tb=$g(mb._ib),dm,r=$c();r.id=r.id+"_r";r.style.width="auto";r.style.cssFloat="left";r.style.overflow="auto";var c1=$c(),c2=$c(),b1=$c(),x=$c(),pc="SS_control_msgbox_panel_";c1.className=pc+"image";c2.className=pc+"text";b1.className=pc+"button";x.innerHTML=d.replace(/\u0020/g,"_");$cl(x,c2.className);$sa(x,"align","center");c1.innerHTML="&nbsp";$ac(c2,x);$ac(r,c1);$ac(r,c2);$ac(n,r);$ac(n,b1);x.innerHTML=d.replace(/\n/g,"<br/>");x.style.cssFloat="left";if(!b)
{b=0;}
var bok,bcanc,byes,bno,baccept,bdecline,y="button",bc="SS_control_msgbox_button_";if(b!=2&&b!=3)
{bok=$c("input");bok.type=y;bok.value="OK";$cl(bok,bc+"ok");bok.onclick=function(e)
{mb.choice=0;$ef(evc,mb,e);mb.destroy.call(mb);mb=null;};if(f)
{$st(function(){bok.focus();},1);}}
if(b==1||b==3)
{bcanc=$c("input");bcanc.type=y;bcanc.value="Cancel";$cl(bcanc,bc+"cancel");bcanc.onclick=function(e)
{mb.choice=1;$ef(evc,mb,e);mb.destroy.call(mb);mb=null;};}
if(b==2||b==3)
{byes=$c("input");byes.type=y;byes.value="Yes";$cl(byes,bc+"yes");byes.onclick=function(e)
{mb.choice=2;$ef(evc,mb,e);mb.destroy.call(mb);mb=null;};if(f)
{$st(function(){byes.focus();},1);}
bno=$c("input");bno.type=y;bno.value="No";$cl(bno,bc+"no");bno.onclick=function(e)
{mb.choice=3;$ef(evc,mb,e);mb.destroy.call(mb);mb=null;};}
if(b==4)
{baccept=$c("input");baccept.type=y;baccept.value="Accept";$cl(baccept,bc+"accept");baccept.onclick=function(e)
{mb.choice=4;$ef(evc,mb,e);mb.destroy.call(mb);mb=null;};if(f)
{$st(function(){baccept.focus();},1);}
bdecline=$c("input");bdecline.type=y;bdecline.value="Decline";$cl(bdecline,bc+"decline");bdecline.onclick=function(e)
{mb.choice=5;$ef(evc,mb,e);mb.destroy.call(mb);mb=null;};}
var _b=function(l){$ac(b1,l);};switch(b)
{case 1:_b(bok);_b(bcanc);break;case 2:_b(byes);_b(bno);break;case 3:_b(byes);_b(bno);_b(bcanc);break;case 4:_b(baccept);_b(bdecline);break;default:_b(bok);break;}
dm=$xyz(r);dm.w+=50;dm.h+=70;$w(w,dm.w);$h(w,dm.h);mb.render();}
function $input(q,f,v,t,l)
{v=$isd(v)?v:0;var ml=$isd(l)?'maxlength="'+l+'"':'';var ipid="ip"+$nid();var ipf=function(e)
{var ip=$g(ipid),vm=v%1024;if(ip)
{this.choice=0;if((v>=1024&&ip.value==="")&&e===0)
{$input(q,f,v,t,l);}
else if(vm==1)
{}
else
{$ef(f,this,(e===0)?ip.value:null,ip);}}};$msgbox(q+'<input type="text" value="" id="'+ipid+'" style="width:95%;" '+ml+'/>',1,ipf);}
function $popup(u,ti,dw,dh,oc,id,fid)
{var w=new SS.control.window(document.body),tb=1,n,f=$c("iframe"),l,lt;if($iso(u))
{id=$isd(u.id)?u.id:"";ti=$isd(u.title)?u.title:"";tb=$isd(u.titlebar)?u.titlebar:1;dw=$isd(u.width)?u.width:null;dh=$isd(u.height)?u.height:null;oc=u.onclose;u=u.url;fid=$isd(u.fid)?fid.id:"";}
w.id=(id)?id:"SSPopup";tb=(tb)?1:0;w.titlebar=tb;w.title=ti;if(dw)
{w.width=dw;}
if(dh)
{w.height=dh;}
w.onclose=function(e)
{$ef(oc,w,e);w.hide.call(w);w.destroy.call(w);w=null;};w.render();SS.global.controls.add(w);n=$g(w._in);l=$g(w.id);lt=$g(w._ib);l.style.overflow="hidden";$w(f,$w(l)-10);$h(f,$h(l)-(tb*$h(lt)+10));f.id=(fid)?fid:f.id;f.frameBorder=0;$ac(n,f);f.src=u;}
function $popupClose(id)
{var w=$gc(id);if(!id)
{id="SSPopup";}
if(w)
{w.destroy.call(w);}}
SS.control.menu=function()
{this.id="";this.css="";this.submenu=0;this.orientation="vertical";this.mouseover=0;this.visible=1;};SS.control.menu.prototype={render:function()
{var t=this,mp,m=$g(t.id),cp="SS_control_menu";if(m)
{$v(m,t.visible);mp=m.parentNode;m.className=cp+" "+cp+"_"+t.orientation+" "+t.css;t.submenu=(m&&$lc($ga(mp,"ext"))=="menuitem")?1:0;$v(m,!t.submenu);m.className+=t.submenu?" SS_control_submenu":"";}},close:function()
{var i,m=$g(this.id),n,c,l=$cn(m);if(m)
{for(i=0;i<$ln(l);i++)
{n=l[i];if(n)
{c=$gc(n.id);if(c&&c.childMenu)
{c.close.call(c);}}}}}};
SS.control.menuitem=function()
{this.id="";this.css="";this.orientation="vertical";this.onclick="";this.onmouseover="";this.url="";this.target="_self";};SS.control.menuitem.prototype={render:function()
{var t=this,m=$g(t.id),pc;if(m)
{mp=m.parentNode;pc=$gc(mp.id);if($lc($ga(mp,"ext"))=="menu")
{t.orientation=$ga(mp,"orientation")||"vertical";}
m.className="SS_control_menuitem "+"SS_control_menuitem_"+t.orientation+" "+t.css;m.onclick=function(e)
{t.Click.call(t,e,this);};if($psb(pc.mouseover)&&t.childMenu(m))
{m.onmouseover=function(e)
{t.Click.call(t,e,this);};}
else
{m.onmouseover=function(e)
{$ec(e);return false;};if(t.onmouseover)
{$eehadd(m,"onmouseover",function(e){$ef(t.onmouseover,t,e);$ec(e);});}}
$ea("onclick",function(){pc.close.call(pc);});}},childMenu:function(m)
{var i,n,cm,c=$cn(m),g=$ln(c);for(i=0;i<g;i++)
{n=c[i];if($lc($ga(n,"ext"))=="menu")
{cm=n;break;}}
return cm;},Click:function(e,m)
{var t=this,mp=m.parentNode,cm=t.childMenu(m),p=$xyz(m);if(cm)
{if($lc($ga(mp,"orientation"))=="horizontal")
{p.x=m.offsetLeft;p.y=m.offsetTop+$xyz(m).h;}
else
{p.x=p.w;}
$sxyz(cm,p);if(cm.style.display==="")
{$v(cm,0);}
else
{var sb=$cn(mp),i,c,g=$ln(sb);for(i=0;i<g;i++)
{c=$gc(sb[i].id);if(c&&c.close)
{c.close.call(c);}}
$v(cm,1);$ec(e);}}
else
{var pm=$gc(mp.id);if(pm&&pm.close)
{pm.close();}
$ef(t.onclick,t,e);if(t.url)
{window.open(t.url,t.target);}}},close:function()
{var c,m=this.childMenu($g(this.id));if(m)
{c=$gc(m.id);if(m.style.display!="none")
{$v(m,0);if(c&&c.close)
{c.close.call(c);}}}}};
SS.control.logo=function()
{this.id="";this.url=SS.global.url;this.image=this.url+"SSlogo.png";this.src="";this.redirect=1;};SS.control.logo.prototype={render:function()
{var n,m,t=this,l=$g(t.id),w=window;if(l)
{$dc(l);m=$c("img");m.src=t.src||t.image;if(!$ise(t.url))
{m.onclick=function()
{if($psb(t.redirect))
{w.location.href=t.url;}
else
{w.open(t.url);}};m.style.cursor="pointer";}
$ac(l,m);}}};
SS.control.popup=function()
{this.id="";this.callid="";this.css="";this.offsetx=7;this.offsety=5;this.onevent="onfocus";this.offevent="onblur";this.onshow="";this.onhide="";this.hidedelay=9;this.x=null;this.y=null;this._h=0;this._i=1;};SS.control.popup.prototype={render:function()
{var t=this,l=$g(t.id),n=$g(t.callid),o=t.onevent.split(","),f=t.offevent.split(","),i;if(l&&t._i)
{l.className="SS_control_popup"+($ise(t.css)?"":" "+t.css);$v(l,0);var sf=function(e){t.show.call(t,e);$ec(e);},hf=function(e){t.hide(e);},hfc=function(e){t.hide.call(t,e);$ec(e);};if(n)
{for(i=0;i<$ln(o);i++)
{$eehadd(n,o[i],sf);}}
for(i=0;i<$ln(f);i++)
{if(f[i]=="onclick")
{$ea(f[i],hf);}
else
{if(n)
{$eehadd(n,f[i],hf);}}}
$eehadd(l,"onclick",function(e){$ec(e);});}
t._i=0;},show:function(e)
{e=$e(e);var t=this,l=$g(t.id);if($isu(e)||$lc(e.type)=="focus")
{var k=$g(t.callid);if(k)
{p=$xyz(k);if(p)
{p.y+=p.h;}}}
else
{p=new SS.coord(e.dX+t.offsetx,e.dY+t.offsety);}
if(t.x!==null)
{p.x=t.x;}
if(t.y!==null)
{p.y=t.y;}
if(l)
{$sxyz(l,p);$v(l,1);$ef(t.onshow,t,e);}},hide:function()
{var t=this,l=$g(t.id);if(l&&$ise(l.style.display))
{if(t.hidedelay)
{t._h=$st(function(){$v($g(t.id),0);$ef(t.onhide,t);},t.hidedelay);}
else
{$v(l,0);$ef(t.onhide,t);}}}};
SS.control.popupcalendar=function()
{var k,p=new SS.control.popup(),c=new SS.control.calendar(),oc=",onclick";this.onevent=oc;this.offevent=oc;for(k in c)
{if(!$isf(c[k]))
{this[k]=c[k];}}
p.onevent+=","+this.onevent;p.offevent+=","+this.offevent;p.hidedelay=250;for(k in p)
{if(!$isf(p[k]))
{this[k]=p[k];}}
this.PP=p;this.CL=c;this.css=c.css;};SS.control.popupcalendar.prototype={render:function()
{var t=this,k,l=$g(t.id),c=$c();$cmom(t,t.PP,"id");t.PP.id=t.id;$cmom(t,t.CL,"id,_idt,_idh,_idb,selecteddate,visiblemonth");if(t._i)
{t.CL.id=t.id+"_c";c.id=t.CL.id;t.CL.onvisiblemonthchange=function()
{$ct(t.PP._h);};t.CL.onchange=function()
{t.PP.hide.call(t);};$ac(l,c);}
t.CL.render.call(t.CL);t.PP.render.call(t.PP);t._i=0;}};
SS.control.tree=function(name,value,title,css,id)
{var p="SS_control_tree",m=p+"_icon";this.id=$ise(id)?$nid():id;this.css=(css)?css:"";this.css_iconopen=m+"open";this.css_iconclosed=m+"closed";this.css_selected=p+"_branch_selected";this.iconmode=2;this.name=(name)?name:"";this.title=(title)?title:"";this.value=(value)?value:"";this.node=[];this.parent=null;this.open=0;this.src="";this.srcparam="v";this.cache=1;this.xpath_nodes="";this.xnode_name="";this.xnode_title="";this.xnode_value="";this.xnode_iconmode="";this.root=null;this.selected=null;this.onclick=null;this.oncontextmenu=null;};SS.control.tree.prototype={render:function(al)
{var t=this,l=$g(t.id),p,n,i,c,b,s="SS_control_tree";if(l)
{l.id=t.id;l.onclick="";l.oncontextmenu="";p=$g(l.parentNode.id);if($ga(p,"ext")!="tree")
{p=null;}
else
{p=$gc(p.id);}}
if(l&&!p)
{p=$gc(l.parentNode.id);if(p)
{p.addNode(t);}
if(p)
{l=$g(p.id);}}
if(!l&&al)
{l=$c();l.id=t.id;$ac(al,l);}
if(p)
{p.addNode(t);}
else if(!t.parent)
{t.open=1;t.root=t;if(!$ise(t.src)&&(t.node.length<=0||!t.cache))
{t.getNodes.call(t,t.value);}}
if(l)
{n=$g(t.id+"_n");c=$g(t.id+"_i");if(!n)
{b=$c();b.className=s+"_branch";n=$c();n.id=t.id+"_n";n.className=s+"_node";n.onclick=function(e)
{var n;if(t.root.selected)
{n=$g(t.root.selected.id+"_n");if(n)
{n.className="SS_control_tree_node";}}
n=$g(t.id+"_n");if(n)
{n.className+=" "+t.css_selected;}
t.open=!t.open;t.root.selected=t;if(!$ise(t.src)&&(t.node.length<=0||!t.cache))
{t.getNodes.call(t,t.value);}
else
{t.render.call(t);}
return $ef(t.onclick,this,e);};if(t.oncontextmenu)
{n.oncontextmenu=function(e)
{$ef(t.oncontextmenu,this,e);$ec(e);return false;};}
if(t.root&&t.root.selected&&t.root.selected.id==t.id)
{n.className+=" "+t.css_selected;}
$sa(n,"value",t.value);$ac(b,n);l.insertBefore(b,l.firstChild);if(!($ise(t.css_iconopen)||$ise(t.css_iconclosed)))
{c=$c();c.id=t.id+"_i";c.onclick=n.onclick;b.insertBefore(c,b.firstChild);}}
if(c)
{c.className=t.open?t.css_iconopen:t.css_iconclosed;$v(c,((t.iconmode==1||(t.iconmode==2&&t.node.length)||$psb(t.iconmode))&&t.parent),1);}
n.innerHTML=t.name;n.title=t.title;if(t.parent)
{l.className=s+(t.css?" "+t.css:"");$v(l,t.parent.open);}
else
{l.className=$ts(t.css);}}
for(i=0;i<t.node.length;i++)
{t.node[i].render.call(t.node[i],l);}},addNode:function(n)
{var t=this;if(n&&t.node&&!t.node.contains(n))
{n.parent=t;n.oncontextmenu=t.oncontextmenu;n.onclick=t.onclick;n.root=t.root?t.root:t;t.node.add(n,1);}},openPath:function()
{var t=this;t.open=1;if(t.parent)
{t.parent.openPath.call(t.parent);}},getNodes:function(v)
{var t=this,u=t.src,p=t.srcparam,s=$esc($ts(v)),a=p+"="+s;if(!$ise(u))
{u=u.replace(new RegExp("([\\?&])"+t.srcparam+"=([^&#]*)","g"),"$1"+p+"="+s);if(u.indexOf(a)<0)
{u+=((u.indexOf("?")<0)?"?":"&")+a;}
$load({url:u,nocache:1,onload:function(){t.loadNodes.call(t,this.req);},onerror:function(){$error(this.req);}});}},loadNodes:function(r)
{var t=this,x,w,i,c,n,p=t.xpath_nodes,pn=t.xnode_name,pt=t.xnode_title,pv=t.xnode_value,pi=t.xnode_iconmode;if(r.getResponseHeader("content-type").match(/text\/xml/i))
{x=$x2o(r.responseXML);if(x&&!$ise(p)&&(!($ise(pn)&&$ise(pt)&&$ise(pv))))
{p=p.split(/\.|\\/);w=x;for(i=0;i<p.length;i++)
{if(w){w=w[p[i]];}}
w=$ta(w);if(w)
{for(i=0;i<w.length;i++)
{n=new SS.control.tree();$cmom(t,n,"name,value,title,id,node,open");if(w[i])
{n.name=$ts(w[i][pn]);n.value=$ts(w[i][pv]);n.title=$ts(w[i][pt]);n.iconmode=(!$ise($ts(w[i][pi])))?$ts(w[i][pi]):(n.iconmode?n.iconmode:2);t.addNode(n);}}
if(t.node.length)
{t.render();}}}}
else if(r.responseText)
{w=r.responseText.split("\n");if(w)
{for(i=0;i<w.length;i++)
{if(w[i].indexOf("\t")>=0)
{c=w[i].split("\t");}
else if(w.indexOf(",")>=0)
{c=w[i].split(",");}
else
{c=[w[i]];}
if(c)
{n=new SS.control.tree();$cmom(t,n,"name,value,title,id,node,open");n.name=$ts(c[0]);n.value=$ts(c[1]);n.title=$ts(c[3]);n.css=c[4]||n.css;n.iconmode=$isd(c[5])?$isd(c[5]):n.iconmode;t.addNode(n);}}
if(t.node.length)
{t.render();}}}},getSelected:function()
{var r;if(this.root)
{r=this.root.selected;}
return r;},clear:function()
{var t=this,i,n,s=t.node;if(s)
{for(i=0;i<s.length;i++)
{n=s[i];if(n&&n.clear&&n.id!=t.id)
{n.clear.call(n);$d($g(n.id));}}}
t.open=0;t.node=[];t.selected=null;if(t.parent)
{t.render.call(t,$g(t.parent.id));}}};
SS.control.passwordmeter=function()
{var p="SS_control_passwordmeter";this.id="";this.linkto="";this.maxlength=0;this.minlength=6;this.msg_weak="Weak";this.msg_medium="Medium";this.msg_strong="Strong";this.msg_short="Too Short";this.msg_long="Too Long";this.msg_invalid="Invalid Password";this.css=p;this.css_bar=p+"_bar";this.css_text=p+"_text";this.css_weak=p+"_weak";this.css_medium=p+"_medium";this.css_strong=p+"_strong";this.css_error=p+"_error";this.value=0;this.pass="";this.regex="^.*$";this.weight=0.12;};SS.control.passwordmeter.prototype={render:function()
{var t=this,l=$g(t.id),s,c,n=$ln(t.pass),h=t.strength();if(l)
{$dc(l);t.value=h;if(h<0)
{s=t.msg_invalid;c=t.css_error;}
else if(n<t.minlength)
{s=t.msg_short;c=t.css_error;}
else if(n>t.maxlength&&t.maxlength)
{s=t.msg_long;c=t.css_error;}
else if(h>66)
{s=t.msg_strong;c=t.css_strong;}
else if(h>33)
{s=t.msg_medium;c=t.css_medium;}
else
{s=t.msg_weak;c=t.css_weak;}
var b=$c(),m=$c(),x=$ctn(s),p=$g(t.linkto),v=$c(),w=0;$cl(b,t.css);$cl(v,t.css_bar+" "+c);$cl(m,t.css_text);$ac(b,v);if(n)
{$ac(m,x);}
$ac(l,b);$ac(l,m);w=$rnd(($xyz(b).w/100)*h);if(w<0)
{w=0;}
$w(v,w);if(p)
{p.onkeydown=function()
{$st(function(){t.pass=$g(t.linkto).value;t.render();},10);};}}},strength:function()
{var t=this,v=0,m=255,x=0,i,p=t.pass,c,l=$ln(p);for(i=0;i<l;i++)
{c=p.charCodeAt(i);if(c<m)
{m=c;}
if(c>x)
{x=c;}}
v=$rnd(Math.pow(x-m,l*t.weight));if(v>100)
{v=100;}
if(x<0||$ise(p))
{v=0;}
if(!p.match(new RegExp(t.regex)))
{v=-1;}
return v;}};
SS.control.imagetoggle=function()
{this.id="";this.linkto="";this.value="";this.van="id";this.onchange="";this.visible=1;};SS.control.imagetoggle.prototype={render:function()
{var t=this,l=$g(t.id),c,i,o,oc;$v(l,t.visible);c=l.childNodes;if(c)
{oc=function(e)
{t.nextImage.call(t);$ef(t.onchange,t,e);};for(i=0;i<$ln(c);i++)
{o=c[i];if(o.nodeName!="#text")
{try
{o.onclick=oc;}
catch(x){}}}
t.nextImage(0,1);}},nextImage:function(f,q,v)
{var t=this,l=$g(t.id),c,i,o,p,s,r,a;c=l.childNodes;if(c)
{for(i=0;i<$ln(c);i++)
{o=c[i];p=o;if($uc(o.tagName)!="IMG")
{o=$gd(o,"IMG");if(o)
{o=o[0];}}
if(o&&($uc(o.tagName)=="IMG"))
{a=$ga(o,"selected");a=(a!==null&&($psb(a)||a===""))?1:0;if(v)
{if(o==v||$ga(o,t.van)==v)
{a=1;}
else
{a=0;}}
$v(p,a);if(q)
{if(a)
{r=o;}}
else if($isd(v))
{$sa(o,"selected",a);}
else
{if((s&&!r)||f)
{f=0;r=o;$sa(o,"selected",1);$v(p,1);}
else
{$sa(o,"selected",0);$v(p,0);}
if(a)
{s=o;}}}}}
if(!v)
{t.value=$ga(r,t.van);if(t.linkto)
{k=$g(t.linkto);if(k)
{k.onchange=function(e)
{t.selected(this.value,e);};k.value=t.value;}}
if(!r)
{r=t.nextImage(1,q);}}
return r;},selected:function(v,e)
{var t=this,o=t.nextImage(0,$isd(v)?0:1,v);if(v)
{$ef(t.onchange,t,e);}
return o;}};
SS.control.richtextbox=function()
{this.id="";this.css="SS_control_richtextbox";this.readonly=0;this.value="";this.visible=1;this.onchange="";this.canvascolor="#FFF";this.font="Arial";this.fontsize="small";this.buttons=[[["Bold",100],["Italic",120],["Underline",140]],[["Align Left",160,"JustifyLeft"],["Align Center",180,"JustifyCenter"],["Align Right",200,"JustifyRight"]],[["Bullet Points",220,"InsertUnorderedList"],["Numbering",240,"InsertOrderedList"]],[["Outdent",280,0,1],["Indent",260,0,1]],[["Font Type",300,"Font",1,"pft"],["Font Size",320,"Size",1,"pfs"]],[["Font Color",340,"forecolor",1,"pfc"],["Highlight Color",360,"backgroundcolor",1,"pfb"],["Remove Formatting",380,"removeFormat",1]]];this.idb="";this.idg="";this.idi="";this._i=1;this._u=0;this._f=0;};SS.control.richtextbox.prototype={render:function()
{var t=this,l=$g(t.id),g=$g(t.idg)||$c(),f=$g(t.idi)||$c("iframe"),w,d,b=$g(t.idb)||$c(),c,fp,fl=["Arial","Arial Black","Arial Narrow","Brush Script MT","Courier New","Garamond","Times New Roman","Verdana"],fn,fi,fs,fz=["Tiny","xx-small","Small","x-small","Normal","small","Medium","medium","Large","large","Larger","x-large","Giant","xx-large"],fc,fb,h,i,j,k,v,H,W,HB,P="SS_control_richtextbox_",PG=P+"buttongroup",PF=P+"fontpopup",hc,ba=t.buttons,bb,bc;if(l&&f)
{n=l.parentNode;if(t._i&&n)
{t.idi=f.id;t.idg=g.id;t.idb=b.id;f.frameBorder=0;$cl(g,t.css);$cl(f,P+"canvas");$cl(b,P+"buttonbar");fp=$c();fp.id=t.id+"pft";$v(fp,0);var fnoc=function(e)
{t.command.call(t,"fontname",$ga(this,"f"));t.hidemenu.call(t);};for(i=0;i<$ln(fl);i++)
{fn=$c();fi=$c("img");$w(fn,"90%");$w(fi,"90%");$h(fi,"20px");fi.style.position="absolute";$op(fi,0);$ac(fn,fi);$ac(fn,$ctn(fl[i]));fn.style.fontSize="16px";fn.style.fontFamily=fl[i];$sa(fn,"f",fl[i]);fn.onclick=fnoc;$cl(fn,P+"option");$ac(fp,fn);}
var fsoc=function(e)
{t.command.call(t,"fontsize",$n($ga(this,"size")));t.hidemenu.call(t);};fs=$c();fs.id=t.id+"pfs";$v(fs,0);for(i=0;i<$ln(fz);i+=2)
{fn=$c();fi=$c("img");$w(fn,"90%");$w(fi,"90%");$h(fi,"20px");fi.style.position="absolute";$op(fi,0);$ac(fn,fi);$ac(fn,$ctn(fz[i]));fn.style.fontSize=fz[i+1];$sa(fn,"size",(i/2)+1);fn.onclick=fsoc;$cl(fn,P+"option");$ac(fs,fn);}
var fcoc=function(e)
{t.command.call(t,"ForeColor",$ga(this,"v"));t.hidemenu.call(t);};var fboc=function(e)
{t.command.call(t,((e)?"hiliteColor":"BackColor"),$ga(this,"v"));t.hidemenu.call(t);};fc=$c();fc.id=t.id+"pfc";fb=$c();fb.id=t.id+"pfb";$v(fc,0);$v(fb,0);k=256;for(h=0;h<=256;h+=128)
{k=(k)?0:256;for(i=k;i>=0&&i<=256;i+=(64*((!k)?1:-1)))
{for(j=0;j<=256;j+=64)
{hc="#"+((h<16)?"0":"")+((h==256)?255:h).toString(16)+((i<16)?"0":"")+((i==256)?255:i).toString(16)+((j<16)?"0":"")+((j==256)?255:j).toString(16);fn=$c();fi=$c("img");$w(fi,"30px");$h(fi,"14px");fi.style.position="absolute";$op(fi,0);$ac(fn,fi);fn.style.backgroundColor=hc;fn.title=hc;$sa(fn,"v",hc);$cl(fn,P+"color");fn.onclick=fcoc;$ac(fc,fn);fn=$c();fi=$c("img");$w(fi,"30px");$h(fi,"14px");fi.style.position="absolute";$op(fi,0);$ac(fn,fi);fn.style.backgroundColor=hc;fn.title=hc;$sa(fn,"v",hc);fn.onclick=fboc;$cl(fn,P+"color");$ac(fb,fn);}}}
$ac(n,fp);$ac(n,fs);$ac(n,fc);$ac(n,fb);$ac(g,b);$ac(g,f);n.insertBefore(g,l);for(i=0;i<$ln(ba);i++)
{c=$c(0,PG);bb=ba[i];$ac(b,c);$w(c,21*$ln(bb));for(j=0;j<$ln(bb);j++)
{bc=bb[j];t.button(c,t,bc[0],bc[1],bc[2]?bc[2]:bc[0],bc[3],bc[4],bc[5]);}}
t.hidemenu();$v(l,0);t._i=0;}
$cmom(l.style,g.style);$cn(g,l.className);$v(g,t.visible);w=f.contentWindow;d=w.document;H=$h(g);W=$w(g);HB=$h(b)+2;if(!H||H<HB)
{H=HB+20;}
if(d)
{d.write("<html><head><style type='text/css'>BODY{padding:0px;margin:3px;overflow:auto;background-color:"+t.canvascolor+";font-family:"+t.font+";font-size:"+t.fontsize+";}P,BLOCKQUOTE,UL,OL,LI{margin-bottom:0px;margin-top:0px;line-height:1;}</style></head><body>"+t.value+"</body></html>");d.close();d.designMode="on";w.focus();t._u=$si(function(){var v=$g(t.idi).contentWindow.document.body.innerHTML;if(!t.update.call(t,v)){$st(function(){var v=$g(t.id).value;if(t.update.call(t,v)){$g(t.idi).contentWindow.document.body.innerHTML=v;}},25);}},100);}
if($isd(d.onactivate))
{d.onactivate=function()
{t._f=1;};d.ondeactivate=function()
{t._f=0;};if(W)
{$w(b,W-3);$w(f,W-3);}
if($h(g))
{$h(f,H-HB-3);}
g.style.borderTop="none";}
else
{t._f=1;if(W)
{$w(b,W);$w(f,W);}
if($h(g))
{$h(f,H-HB);}}}
$ea("onresize",function(){t.resize.call(t);});},hidemenu:function()
{var k,m=this.P;if(m)
{for(k in m)
{if(!$isf(m[k])&&m[k].hide)
{m[k].hide();}}}},update:function(v,e)
{var t=this,r=0;v=$ts(v);if(v.replace(/[\n\r]*/g,"")!=t.value.replace(/[\n\r]*/g,""))
{t.hidemenu();if(t.readonly)
{$g(t.idi).contentWindow.document.body.innerHTML=t.value;}
else
{$g(t.id).value=v;t.value=v;$ef(t.onchange,t,e);}
r=1;}
return r;},command:function(a,p,e)
{var w=$g(this.idi).contentWindow,d=w.document;w.focus();try
{d.execCommand(a,false,(p)?p:null);}
catch(x){}},query:function(a)
{try
{return this.document.queryCommandState(a);}catch(x){}},button:function(el,t,l,y,a,q,c,p)
{var P="SS_control_richtextbox_",b=$c(0,P+"button"),i=$c("img"),o,oc="onclick";b.onclick=function(e)
{t.command.call(t,a,p,$e(e));};$sa(b,"u","0px -"+y+"px");$sa(b,"d","-20px -"+y+"px");$sa(b,"a",a);b.title=l;b.style.backgroundPosition="0px -"+y+"px";$ac(b,i);$op(i,0);if(!q)
{$si(function()
{try
{var u=$ga(b,"u"),d=$ga(b,"d"),a=$ga(b,"a");if(a&&t._f)
{b.style.backgroundPosition=t.query.call($g(t.idi).contentWindow,a)?d:u;}}
catch(ex){}},333);}
$ac(el,b);if(c)
{t.P=$ta(t.P);o=new SS.control.popup();o.id=t.id+c;o.callid=b.id;o.onevent=oc;o.offevent=oc;o.css=P+"popup";o.render.call(o);t.P[a]=o;}
return b;},resize:function()
{var t=this,g=$g(t.idg),f=$g(t.idi),b=$g(t.idb),gw=$w(g),gh=$h(g),fw=$w(f);if(gw>0)
{$w(f,gw-4);}
if(gh>0)
{$h(f,gh-$h(b)-2);}}};
SS.control.tab=function()
{this.id="";this.css="SS_control_tab";this.css_on="SS_control_tab_on";this.onselect="";this.ondeselect="";this.selected=0;this.visible=1;this.value="";};SS.control.tab.prototype={render:function()
{var t=this,l=$g(t.id),s;s=l.className;if(!$ise(s))
{t.css=s;}
$cl(l,t.css+($psb(t.selected)?" "+t.css_on:""));l.onclick=function(e)
{t.select.call(t,e);};},select:function(e)
{var t=this,l=$g(t.id),p=$gc(l.parentNode.id),i,b,a=p.tabs();e=$e(e);if(p)
{for(i=0;i<$ln(a);i++)
{b=a[i];if(b.selected)
{b.deselect.call(b,e);}}}
t.selected=1;$cl(l,t.css+" "+t.css_on);$ef(t.onselect,t,e);$ef(p.onselect,p,e);$ef(p.onchange,p,e);},deselect:function(e)
{var t=this,l=$g(t.id),p=$gc(l.parentNode.id);e=$e(e);t.selected=0;$cl(l,t.css);$ef(t.ondeselect,t,e);$ef(p.ondeselect,p,e);}};
SS.control.tabbar=function()
{this.id="";this.onchange="";this.onselect="";this.ondeselect="";this.visible=1;};SS.control.tabbar.prototype={render:function()
{$v(this.id,$psb(this.visible));},tabs:function()
{var t=this,l=$g(t.id),n=l.childNodes,i,b,a=[];for(i=0;i<$ln(n);i++)
{if($uc($ga(n[i],"ext"))=="TAB")
{b=$gc(n[i].id);if(b)
{a.add(b);}}}
return a;},selectedTab:function()
{var t=this,a=t.tabs(),i,b,r;for(i=0;i<$ln(a);i++)
{b=a[i];if($psb(b.selected))
{r=b;break;}}
return r;},selectTab:function(i)
{var t=this,a=t.tabs(),j,b,r;if(isNaN(i))
{for(j=0;j<$ln(a);j++)
{b=a[j];if(b.id==i)
{r=b;break;}}}
else
{r=a[i];}
if(r)
{r.select();}
return r;}};
SS._bc=function(l,c,tn,ft)
{if(!l.id)
{l.id=((tn)?tn:l.tagName)+SS.global.nid++;}
$sa(l,"ss","ss");var a=l.attributes,i,b,k,v,n=$ln(a),h;for(i=0;i<n;i++)
{b=a[i];k=$lc(b.nodeName);v=b.nodeValue;if(typeof c[k]!="undefined")
{c[k]=v;}
else if(k=="class"&&typeof c.classname!="undefined")
{c.classname=v;}}
if(!ft)
{h=$gc(c.id);if(h)
{SS.global.controls.remove(h);}}
SS.global.controls.add(c);return c;};SS._bcs=function(ft)
{var ls,ln,i,l,g,fi,tn,id,y,h=SS.htmlextension,cy=["div","input","textarea","select"],j,c=SS.global.controls,gn,rc=[];for(j=0;j<4;j++)
{ls=$gt(cy[j]);ln=(ls)?ls.length:0;for(i=0;i<ln;i++)
{l=ls[i];g=$ga(l,"ext");gn=$ga(l,"groupname");tn=cy[j];if(tn=="input")
{y=$lc(l.type);}
else
{y="";}
if(g&&(ft||($ga(l,"ss")!="ss")))
{g=g.toLowerCase();if(SS.control[g])
{rc.add(SS._bc(l,new SS.control[g](),tn,ft));}}
if(h&&(ft||((y=="text"||y=="hidden"||tn=="select"||tn=="textarea"||gn)&&!SS.global.htmels.contains(l.id))))
{if(y=="text"||y=="hidden"||tn=="select")
{fi=h.inputvalidation(l);}
else if(tn=="textarea")
{fi=h.textarea(l);}
else if(gn)
{$headd(l,ft);}}}}
if(ft&&fi&&SS._heinitfrm)
{SS._heinitfrm();}
ln=rc.length;if(ln)
{$asort(c,{id:1});for(i=0;i<ln;i++)
{l=rc[i];l.render.call(l);if(l.oninit)
{$st(l.oninit,1);}}}};SS._dommap=function(l)
{if(l)
{var k=$ln(document.getElementsByTagName("*"));if(SS.HK!=k)
{SS._bcs();SS.HK=k;}}};SS._trashClear=function()
{if(SS.global.trash&&SS.global.trash.length)
{var l=SS.global.trash.removeAt(0),k;if(1)
{try
{for(k in l)
{if(1)
{if(k.match(/^on/i))
{l[k]=null;}
else if(k=="className"||k=="innerHTML")
{l[k]="";}
else if(k=="src")
{k.src="about:blank";}}}}
catch(X){}
l=null;}}
$st(SS._trashClear,9);};SS._main=function()
{if(typeof _environment!="undefined")
{SS.global.locale=_environment.locale;}
if(!SS.global.locale)
{SS.global.locale=new SS.locale();}
SS.HK=0;SS._bcs(1);_ss_ls=null;$si(function()
{_ss_ls=SS._dommap(document.body,_ss_ls,0);},20);SS.global.loaded=1;SS.events.called(document.body,null,"ssonload");SS._trashClear();};function $buildControl(l,c)
{var n,r;if($ise(c))
{c=$ga(l,"ext");}
if(l&&c)
{if(!$gc(l.id)||$ga(l,"ss")!="ss")
{c=$lc(c);if(SS.control[c])
{n=new SS.control[c]();if($lc($ga(l,"ext"))!=c)
{$sa(l,"ext",c);}
n.id=l.id;r=SS._bc(l,n);}
if(r)
{if(r.oninit)
{$st(r.oninit,0);}
r.render.call(r);}}}
return r;}
function $destroyControl(id)
{var c=$gc(id);if(c)
{$d($g(c.id));SS.global.controls.remove(c);}}
SS._init=function()
{var d=document,s=$lc(d.readyState),a=d.addEventListener;if(a&&!s)
{a("DOMContentLoaded",SS._main,false);}
else if(!(s=="complete"||s=="loaded"))
{$st(function(){SS._init();},0);}
else
{SS._main();}};SS._init();