<SCRIPT TYPE="text/javascript">
<!--function popup(mylink, windowname)
{if (! window.focus)return true;
											var href;
if (typeof(mylink) == 'string')   
										href=mylink;
else   href=mylink.href;
window.open(href, windowname, 'width=425,height=540,scrollbars=yes');
return false;}//-->
</SCRIPT>
<script type="text/javascript" src="jquery-1.2.2.pack.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript" src="js/image-slideshow.js"></script>

<script type="text/javascript">


ddaccordion.init({

	headerclass: "expandable", //Shared CSS class name of headers group that are expandable

	contentclass: "categoryitems", //Shared CSS class name of contents group

	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 

	defaultexpanded: [1], //index of content(s) open by default [index1, index2, etc]. [] denotes no content

	animatedefault: true, //Should contents open by default be animated into view?

	persiststate: true, //persist state of opened contents within browser session?

	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]

	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)

	animatespeed: "normal" //speed of animation: "fast", "normal", or "slow"

})

function MM_openBrWindow(theURL,winName,features) { //v2.0

  window.open(theURL,winName,features);

}

</script>