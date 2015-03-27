<?php
/**
 * MDetection
 *
 * @author  Anthony S. Wu <anthonyspwu@gmail.com>
 * @version  1.0.0
 */
header("content-type: text/javascript; charset: utf-8");
header("cache-control: must-revalidate");
$offset = 60 * 60 * 24 * 7;
$expstr = "expires: " . gmdate("d, d m y h:i:s", time() + $offset) . " gmt";
header($expstr);
?>
var moburl = "<?=$_get['moburl']?>";
var exp_day = 14;
if(window.location.href.indexof('nomobile=true') >= 0) {
	redirect_flag = false;
	//store cookie for 2 weeks
	setcookie("redflag", false, exp_day);
}
else if(window.location.href.indexof('nomobile=false') >= 0) {
	redirect_flag = true;
	setcookie("redflag", true, exp_day);
}
else {
	if(getcookie("redflag") != undefined) {
		redirect_flag = getcookie("redflag");
		//convert back to boolean from cookie
		if(typeof(redirect_flag) == "string") {
			if(redirect_flag == "true")
				redirect_flag = true;
			else
				redirect_flag = false;
		}
	}
	else {
		redirect_flag = true;
		setcookie("redflag", true, exp_day);
	}
}


if (redirect_flag) {

	if (navigator.useragent.match("ipad") == null && (navigator.appversion.indexof("android") >= 0 || navigator.useragent.match("iphone") != null || navigator.appversion.indexof("nokia") >= 0 || navigator.useragent.match("ipod") != null)) {

		if(moburl == undefined || moburl == "") {
			document.location.replace("m/");
		}
		else {
			document.location.replace(moburl);
		}
	}
	else if (navigator.useragent.match("ipad") == null && screen.width <= 800) {
		if(moburl == undefined || moburl == "") {
			document.location.replace("m/");
		}
		else {
			document.location.replace(moburl);
		}
	}

}

/* from w3school */
function getcookie(c_name) {
	var i, x, y, c, arrcookies = document.cookie.split(";");
	for (i = 0, c = arrcookies.length; i < c; i++) {
	  x = arrcookies[i].substr(0,arrcookies[i].indexof("="));
	  y = arrcookies[i].substr(arrcookies[i].indexof("=")+1);
	  x = x.replace(/^\s+|\s+$/g,"");
	  if (x == c_name) {
		return unescape(y);
	  }
	}
}
function setcookie(c_name,value,exdays) {
	var exdate = new date();
	exdate.setdate(exdate.getdate() + exdays);
	var c_value = escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toutcstring());
	document.cookie = c_name + "=" + c_value;
}