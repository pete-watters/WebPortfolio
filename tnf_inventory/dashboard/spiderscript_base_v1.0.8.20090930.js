/******************************************************************************** 	
	Spiderscript Base Javascript Library						
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