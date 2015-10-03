sfHover = function() {
	var BUA = navigator.userAgent;
	var BIE = BUA.indexOf("MSIE");
	var BIsIE = BIE>=0;

	var sfEls = document.getElementById("nav").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
	sfEls[i].onmouseover=function() {this.className+=" sfhover";}
	sfEls[i].onmouseout=function() {this.className=this.className.replace(new RegExp(" sfhover\\b"), "");}
	
	//all is normal till here. If we're using IE then this tells any first level item to have a width of 1px
	if (sfEls[i].parentNode == document.getElementById("nav") && BIsIE) {
	sfEls[i].style.width = '1px';
	}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);